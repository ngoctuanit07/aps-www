<?php
	/**
	 * Source file for the Validation2AutovalidateBehavior class.
	 *
	 * PHP 5.3
	 *
	 * @package Validation
	 * @subpackage Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	require_once dirname( __FILE__ ).DS.'..'.DS.'..'.DS.'Lib'.DS.'basics.php';
	App::uses( 'Validation2UtilitiesBehavior', 'Validation2.Model/Behavior' );

	/**
	 * Validation2AutovalidateBehavior class.
	 *
	 * @package Validation
	 * @subpackage Model.Behavior
	 */
	class Validation2AutovalidateBehavior extends Validation2UtilitiesBehavior
	{
		/**
		 * Configuration.
		 *
		 * @var array
		 */
		public $settings = array();

		/**
		 * Configuration par défaut.
		 *
		 * @var array
		 */
		public $defaultConfig = array(
			'rules' => array(
				'notEmpty' => true,
				'maxLength' => true,
				'integer' => true,
				'numeric' => true,
				'date' => true,
				'datetime' => true,
				'time' => true,
				'isUnique' => true,
			),
			'domain' => 'default',
			'translate' => true
		);

		/**
		 * Not null -> notEmpty
		 *
		 * @param Model $model
		 * @param array $fieldParams
		 * @return boolean
		 */
		protected function _isNotEmptyField( Model $model, $fieldParams ) {
			return ( $this->settings[$model->alias]['rules']['notEmpty'] && Hash::check( $fieldParams, 'null' ) && $fieldParams['null'] == false );
		}

		/**
		 * string -> maxLength
		 *
		 * @param Model $model
		 * @param array $fieldParams
		 * @return boolean
		 */
		protected function _isMaxLengthField( Model $model, $fieldParams ) {
			return ( $this->settings[$model->alias]['rules']['maxLength'] && ( $fieldParams['type'] == 'string' ) && Hash::check( $fieldParams, 'length' ) && is_numeric( $fieldParams['length'] ) );
		}

		/**
		 * unique index -> isUnique
		 *
		 * @param Model $model
		 * @param string $field
		 * @param array $indexes
		 * @return boolean
		 */
		protected function _isUniqueField( Model $model, $field, $indexes ) {
			return ( $this->settings[$model->alias]['rules']['isUnique'] && in_array( $field, $indexes ) );
		}

		/**
		 * integer -> integer
		 * date -> date
		 * time -> time
		 * datetime -> datetime
		 *
		 * @param Model $model
		 * @param string $type
		 * @param array $fieldParams
		 * @return boolean
		 */
		protected function _isTypeField( Model $model, $type, $fieldParams ) {
			return ( $this->settings[$model->alias]['rules'][$type] && $fieldParams['type'] == $type );
		}

		/**
		 * float -> numeric
		 *
		 * @param Model $model
		 * @param array $fieldParams
		 * @return boolean
		 */
		protected function _isNumericField( Model $model, $fieldParams ) {
			return ( $this->settings[$model->alias]['rules']['numeric'] && $fieldParams['type'] == 'float' );
		}

		/**
		 * Déduction des règles de validation pour un champ d'un modèle donné.
		 *
		 * @param Model $model
		 * @param string $field
		 * @param array $params
		 * @param array $indexes
		 * @return array
		 */
		public function deduceFieldValidationRules( Model $model, $field, $params, $indexes = array() ) {
			$rules = array();

			if( $this->_isNotEmptyField( $model, $params ) && ( $field != $model->primaryKey ) ) {
				$rule = $this->normalizeValidationRule( $model, array( 'rule' => 'notEmpty', 'allowEmpty' => false ) );
				$rules[$rule['rule'][0]] = $rule;
			}

			if( $this->_isMaxLengthField( $model, $params ) ) {
				$rule = $this->normalizeValidationRule( $model, array( 'rule' => array( 'maxLength', $params['length'] ), 'allowEmpty' => true ) );
				$rules[$rule['rule'][0]] = $rule;
			}

			if( $this->_isUniqueField( $model, $field, $indexes ) ) {
				$rule = $this->normalizeValidationRule( $model, array( 'rule' => 'isUnique', 'allowEmpty' => true ) );
				$rules[$rule['rule'][0]] = $rule;
			}

			// Par type de champ
			if( $this->_isNumericField( $model, $params ) ) {
				$rule = $this->normalizeValidationRule( $model, array( 'rule' => 'numeric', 'allowEmpty' => true ) );
				$rules[$rule['rule'][0]] = $rule;
			}
			else if( in_array( $params['type'], array( 'integer', 'date', 'datetime', 'time' ) ) && $this->_isTypeField( $model, $params['type'], $params ) ) {
				$rule = $this->normalizeValidationRule( $model, array( 'rule' => $params['type'], 'allowEmpty' => true ) );
				$rules[$rule['rule'][0]] = $rule;
			}

			return $rules;
		}

		/**
		 * Retourne la liste des champs sur lesquels se trouve un index unique
		 * en base.
		 *
		 * @param Model $model
		 * @param boolean $cache
		 * @return array
		 */
		public function uniqueColumnIndexes( Model $model, $cache = true ) {
			if( $cache ) {
				$cacheKey = cacheKey( array( $model->useDbConfig, __CLASS__, $model->alias, __FUNCTION__ ) );
				$uniqueColumnIndexes = Cache::read( $cacheKey );
			}

			if( !$cache || $uniqueColumnIndexes === false ) {
				$uniqueColumnIndexes = array();

				$indexes = $model->getDataSource()->index( $model );
				foreach( $indexes as $name => $index ) {
					if( $index['unique'] && ( $name != 'PRIMARY' ) && count( (array)$index['column'] ) == 1 ) {
						$uniqueColumnIndexes[] = $index['column'];
					}
				}

				if( $cache ) {
					Cache::write( $cacheKey, $uniqueColumnIndexes );
				}
			}

			return $uniqueColumnIndexes;
		}

		/**
		 * Liste des règles de validation déduites d'un modèle.
		 *
		 * @param Model $model
		 * @param boolean $cache
		 * @return array
		 */
		public function deduceValidationRules( Model $model, $cache = true ) {
			if( $cache ) {
				$cacheKey = cacheKey( array( $model->useDbConfig, __CLASS__, $model->alias, __FUNCTION__ ) );
				$validate = Cache::read( $cacheKey );
			}

			if( !$cache || $validate === false ) {
				$validate = array();
				$indexes = $this->uniqueColumnIndexes( $model );

				foreach( $model->schema() as $field => $params ) {
					$validate[$field] = $this->deduceFieldValidationRules(
						$model,
						$field,
						$params,
						$indexes
					);
				}

				if( $cache ) {
					Cache::write( $cacheKey, $validate );
				}
			}

			return $validate;
		}

		/**
		 * Regroupement des règles de validation présentes dans le modèle et des
		 * règles de validation déduites.
		 *
		 * @param Model $model
		 * @param boolean $cache
		 * @return void
		 */
		public function mergeDeducedValidationRules( Model $model, $cache = true ) {
			if( $cache ) {
				$cacheKey = cacheKey( array( $model->useDbConfig, __CLASS__, $model->alias, __FUNCTION__ ) );
				$validate = Cache::read( $cacheKey );
			}

			if( !$cache || $validate === false ) {
				$model->validate = Hash::normalize( $model->validate );

				$model->validate = Hash::merge(
					$model->validate,
					$this->deduceValidationRules( $model )
				);

				$validate = $model->validate;
				if( $cache ) {
					Cache::write( $cacheKey, $validate );
				}
			}

			$model->validate = $validate;
		}

		/**
		 * Configuration du behavior.
		 *
		 * @param Model $model Le modèle qui utilise ce behavior
		 * @param array $config La configuration à appliquer
		 */
		public function setup( Model $model, $config = array() ) {
			parent::setup( $model, $config );
			$config = Hash::merge( $this->defaultConfig, $config );

			$this->settings[$model->alias] = array_merge(
				(array)$this->settings[$model->alias],
				(array)Hash::normalize( $config )
			);

			// INFO: on en a besoin avant d'utiliser les formulaires
			// pour les dates, pas pour les maxLength apparemment
			$this->mergeDeducedValidationRules( $model );
		}
	}
?>