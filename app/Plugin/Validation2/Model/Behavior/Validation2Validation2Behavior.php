<?php
	/**
	 * Code source de la classe Validation2Validation2Behavior.
	 *
	 * PHP 5.3
	 *
	 * @package Validation2
	 * @subpackage Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */

	/**
	 * La classe Validation2Validation2Behavior ...
	 *
	 * @package Validation2
	 * @subpackage Model.Behavior
	 */
	class Validation2Validation2Behavior extends ModelBehavior
	{
		/**
		 * Contains configuration settings for use with individual model objects.  This
		 * is used because if multiple models use this Behavior, each will use the same
		 * object instance.  Individual model settings should be stored as an
		 * associative array, keyed off of the model name.
		 *
		 * @var array
		 * @see Model::$alias
		 */
		public $settings = array();

		/**
		 * Permet de savoir si les behaviors de validation ont déjà été chargés.
		 *
		 * @var array
		 */
		protected $_loadedBehaviors = array();

		/**
		 * beforeFind(Model $model, $query)
		 * afterFind(Model $model, $results, $primary)
		 * beforeValidate(Model $model)
		 * afterValidate(Model $model)
		 * beforeSave(Model $model)
		 * afterSave(Model $model, $created)
		 * beforeDelete(Model $model, $cascade = true)
		 * afterDelete(Model $model)
		 * onError(Model $model, $error)
		 *
		 * @var array
		 */
		/*public $wish = array(
			'configs' => array(
				'Validation2.Validation2Formattable' => array(
					'Validation2.Validation2DefaultFormatter' => array(
						'trim' => array( 'NOT' => array( 'binary' ) ),
						'null' => true,
						'numeric' => array( 'float', 'integer' ),
						'suffix'  => '/_id$/'
					)
				)
			),
			'triggers' => array(
				'beforeValidate' => array(
					'Validation2.Validation2Formattable',
					'Validation2.Validation2RulesComparison',
					'Validation2.Validation2RulesFieldtypes',
				),
				'beforeSave' => array(
					'Validation2.Validation2Formattable',
					'Validation2.Validation2RulesComparison',
					'Validation2.Validation2RulesFieldtypes',
				),
			)
		);*/

		/**
		 * En premier lieu, le behavior de formattage avec pour chacune des
		 * classes de formattage utilisées, la liste des fonctions de formattage
		 * (ordonnées) avec en paramètre, les champs à prendre en compte.
		 *
		 * Plus bas, les deux behaviors contenant exclusivement des règles
		 * de validation supplémentaires.
		 *
		 * @var array
		 */
		public $defaultSettings = array(
			'Validation2.Validation2Formattable' => array(
				'Validation2.Validation2DefaultFormatter' => array(
					'trim' => array( 'NOT' => array( 'binary' ) ),
					'null' => true,
					'numeric' => array( 'float', 'integer' ),
					'suffix'  => '/_id$/'
				)
			),
			'Validation2.Validation2RulesComparison',
			'Validation2.Validation2RulesFieldtypes',
		);

		/**
		 * Configuration du behavior.
		 *
		 * @param Model $model Le modèle qui utilise ce behavior
		 * @param array $config La configuration à appliquer
		 */
		public function setup( Model $model, $config = array() ) {
			$config = Hash::merge( $this->defaultSettings, $config );

			if( !isset( $this->settings[$model->alias] ) ) {
				$this->settings[$model->alias] = array( );
			}

			$this->settings[$model->alias] = Hash::merge(
				$this->settings[$model->alias],
				(array)Hash::normalize( $config )
			);
		}

		/**
		 * Chargement à la volée d'un behavior avec sa configuration éventuelle.
		 *
		 * @param Model $model
		 * @param string $behaviorName
		 * @param array $config
		 * @return boolean
		 * @throws MissingBehaviorException
		 */
		protected function _lazyLoadBehavior( Model $model, $behaviorName, array $config ) {
			$loaded = true;

			if( !$model->Behaviors->attached( $behaviorName ) ) {
				$loaded = $model->Behaviors->attach( $behaviorName, $config ) && $loaded;

				list( $pluginName, $behaviorName ) = pluginSplit( $behaviorName );

				if( !class_exists( "{$behaviorName}Behavior" ) ) {
					throw new MissingBehaviorException(
						array(
							'class' => "{$behaviorName}Behavior",
							'plugin' => $pluginName
						)
					);
				}
			}

			return $loaded;
		}

		/**
		 * Chargement à la volée d'un ensemble de behaviors avec leurs
		 * configurations éventuelles.
		 *
		 * @param Model $model
		 * @param string $callback
		 * @param array $args
		 * @return boolean
		 */
		protected function _lazyTriggerBehaviors( Model $model, $callback, $args ) {
			$success = true;

			if( !Hash::get( $this->_loadedBehaviors, $callback ) ) {
				$this->_loadedBehaviors[$callback] = true;

				$behaviors = (array)Hash::get( $this->settings, $model->alias );
				if( !empty( $behaviors ) ) {
					foreach( $behaviors as $behaviorName => $config ) {
						$success = $this->_lazyLoadBehavior( $model, $behaviorName, (array)$config ) && $success;

						list( , $behaviorName ) = pluginSplit( $behaviorName );
						$Behavior = $model->Behaviors->{$behaviorName};
						$success = !empty( $Behavior )
								&& call_user_func_array( array( $Behavior, $callback ), $args )
								&& $success;
					}
				}
			}

			return $success;
		}

		/**
		 * beforeValidate is called before a model is validated, you can use this callback to
		 * add behavior validation rules into a models validate array.  Returning false
		 * will allow you to make the validation fail.
		 *
		 * @param Model $model Model using this behavior
                 * @param array $options Options passed from Model::save().
		 * @return mixed False or null will abort the operation. Any other result will continue.
		 */
		public function beforeValidate( Model $model, $options = array() ) {
			$return = parent::beforeValidate( $model, $options );

			$args = func_get_args();
			$return = $this->_lazyTriggerBehaviors( $model, __FUNCTION__, $args ) && $return;

			return $return;
		}

		/**
		 * beforeSave is called before a model is saved.  Returning false from a beforeSave callback
		 * will abort the save operation.
		 *
		 * @param Model $model Model using this behavior
                 * @param array $options Options passed from Model::save().
		 * @return mixed False if the operation should abort. Any other result will continue.
		 */
		public function beforeSave( Model $model, $options = array() ) {
			$return = parent::beforeSave( $model, $options );

			$args = func_get_args();
			$return = $this->_lazyTriggerBehaviors( $model, __FUNCTION__, $args ) && $return;

			return $return;
		}
	}
?>