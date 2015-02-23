<?php
	/**
	 * Code source de la classe Validation2FormattableBehavior.
	 *
	 * PHP 5.3
	 *
	 * @package Validation2
	 * @subpackage Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	require_once dirname( __FILE__ ).DS.'..'.DS.'..'.DS.'Lib'.DS.'basics.php';

	/**
	 * La classe Validation2FormattableBehavior permet d'appliquer des méthodes
	 * de classes utilitaires aux valeurs avant enregistrement.
	 *
	 * Les classes utilitaires doivent se trouver dans Utility/Validation2Formatters.
	 *
	 * Accepte en valeurs:
	 * 	- true/null
	 * 	- false
	 * 	- array()
	 *  - string (expression rationnelle pour le nom du champ)
	 *
	 * Une clé NOT est possible dans l'array pour prendre tous les types,
	 * moins ce qui est en valeur de cette clé.
	 *
	 * Les types (PostgreSQL) sont:
	 * - binary
	 * - boolean
	 * - date
	 * - datetime
	 * - float
	 * - inet
	 * - integer
	 * - string
	 * - text
	 * - time
	 *
	 * Configuration par défaut:
	 * <pre>
	 * 'Validation2.Validation2DefaultFormatter' => array(
	 *	'trim' => array( 'NOT' => array( 'binary' ) ),
	 *	'null' => true,
	 *	'numeric' => array( 'float', 'integer' ),
	 *	'suffix'  => '/_id$/'
	 * )
	 * </pre>
	 *
	 * @package Validation2
	 * @subpackage Model.Behavior
	 */
	class Validation2FormattableBehavior extends ModelBehavior
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
		 * Liste des fonctions de formattage, ordonnées, avec en paramètre,
		 * le type de champs à prendre en compte.
		 *
		 * @var array
		 */
		public $defaultSettings = array(
			'Validation2.Validation2DefaultFormatter' => array(
				'trim' => array( 'NOT' => array( 'binary' ) ),
				'null' => true,
				'numeric' => array( 'float', 'integer' ),
				'suffix'  => '/_id$/'
			)
		);

		/**
		 * Permet de savoir si le cache a été chargé.
		 *
		 * @var boolean
		 */
		protected $_cacheLoaded = array();

		/**
		 * Liste des objets formatteurs.
		 *
		 * @var array
		 */
		protected $_oFormatters = array();

		/**
		 * Cache des noms de champ, groupés par type.
		 *
		 * @var array
		 */
		protected $_fieldsByType = array();

		/**
		 * Cache des noms de champ, avec leur type en valeur.
		 *
		 * @var array
		 */
		protected $_typeByField = array();

		/**
		 * Cache des expressions rationnelles par modèle, formatteur et méthode.
		 *
		 * @var array
		 */
		protected $_regexes = array();

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
		 * Retourne la liste des champs en clé et le type en valeur.
		 *
		 * @param Model $model
		 * @return array
		 */
		protected function _getTypeByField( Model $model ) {
			$schema = $model->schema();
			$fields = array_keys( $schema );
			$types = Hash::extract( $schema, '{s}.type' );

			return array_combine( $fields, $types );
		}

		/**
		 * Retourne tous les noms de champs du modèles des types passés en
		 * paramètres.
		 *
		 * @param Model $model
		 * @param array $types
		 * @return array
		 */
		protected function _getFieldsByType( Model $model, array $types ) {
			$return = array();

			foreach( $types as $type ) {
				$tmp = (array)Hash::get( $this->_fieldsByType, "{$model->alias}.{$type}" );
				$return = array_merge( $return, $tmp );
			}

			return $return;
		}


		/**
		 * Liste des champs par type (suivant la configuration).
		 *
		 * @param Model $model
		 * @param mixed $types
		 * @return array
		 */
		protected function _getFields( Model $model, $types ) {
			$fields = array();

			// On prend tous les champs en compte
			if( $types === true || is_null( $types ) ) {
				$fields = array_keys( $this->_typeByField[$model->alias] );
			}
			// Sinon, on applique une expression rationnelle sur les noms de champs
			else if( is_string( $types ) ) {
				$tmp = array_keys( $this->_typeByField[$model->alias] );
				foreach( $tmp as $field ) {
					if( preg_match( $types, $field ) ) {
						$fields[] = $field;
					}
				}
			}
			// Si c'est un array
			else if( is_array( $types ) ) {
				// Si la clé NOT, on enlèver les champs des types spécifiés
				if( isset( $types['NOT'] ) ) {
					$except = $this->_getFieldsByType( $model, $types['NOT'] );
					$fields = array_keys( $this->_typeByField[$model->alias] );
					$fields = array_diff( $fields, $except );
				}
				// Sinon, on prend tous les champs des types spécifiés
				else {
					$fields = $this->_getFieldsByType( $model, $types );
				}
			}

			return array_unique( $fields );
		}

		/**
		 * Retourne, pour chaque classe, chaque méthode, la regex sur le flatten
		 * du nom du champ.
		 *
		 * Il faut que $_typeByField[$model->alias] et $_fieldsByType[$model->alias]
		 * aient la bonne valeur.
		 *
		 * @param Model $model
		 * @return array
		 */
		protected function _getRegexes( Model $model ) {
			$regexes = array();

			foreach( $this->settings[$model->alias] as $fullClassName => $params ) {
				foreach( $params as $formatter => $types ) {
					$fields = $this->_getFields( $model, $types );

					if( !empty( $fields ) ) {
						$fields = '('.implode( '|', $fields ).')';
						$regex = "/(?<!\w){$model->alias}(\.|\.[0-9]+\.){$fields}$/";
						$regexes[$fullClassName][$formatter] = $regex;
					}
				}
			}

			return $regexes;
		}

		/**
		 * Chargement du cache.
		 *
		 * @param Model $model
		 * @param boolean $force
		 */
		protected function _loadCache( Model $model, $force = false ) {
			if( !Hash::get( $this->_cacheLoaded, $model->alias ) || $force ) {
				$cacheKey = array( $model->useDbConfig, __CLASS__, $model->alias, __FUNCTION__ );
				$cacheKey = cacheKey( $cacheKey );

				$cache = Cache::read( $cacheKey );
				if( $cache === false ) {
					$this->_typeByField[$model->alias] = $this->_getTypeByField( $model );
					$this->_fieldsByType[$model->alias] = groupKeysByValues( $this->_typeByField[$model->alias] );
					$this->_regexes[$model->alias] = $this->_getRegexes( $model );

					$cache = array(
						'fields' => $this->_typeByField[$model->alias],
						'types' => $this->_fieldsByType[$model->alias],
						'regexes' => $this->_regexes[$model->alias],
					);
					Cache::write( $cacheKey, $cache );
				}

				$this->_typeByField[$model->alias] = $cache['fields'];
				$this->_fieldsByType[$model->alias] = $cache['types'];
				$this->_regexes[$model->alias] = $cache['regexes'];

				$this->_cacheLoaded[$model->alias] = true;
			}
		}

		/**
		 * Application d'un formattage d'une classe à une valeur.
		 *
		 * @param string $fullClassName
		 * @param string $formatter
		 * @param mixed $value
		 * @return mixed
		 * @throws MissingUtilityException
		 */
		protected function _formatField( $fullClassName, $formatter, $value ) {
			if( !Hash::check( $this->_oFormatters, $fullClassName ) ) {
				list( $pluginName, $className ) = pluginSplit( $fullClassName );

				App::uses( $className, implode( '.', array( $pluginName, 'Utility/Validation2Formatters' ) ) );
				if( !class_exists( $className ) ) {
					throw new MissingUtilityException(
						array(
							'class' => $className,
							'plugin' => $pluginName
						)
					);
				}

				$this->_oFormatters[$fullClassName] = new $className();
			}

			return $this->_oFormatters[$fullClassName]->{$formatter}( $value );
		}

		/**
		 * Format data according to rules defined in the settings for the
		 * current model
		 *
		 * @param Model $model
		 * @param array $data
		 * @return array
		 */
		public function doFormatting( Model $model, $data ) {
			$this->_loadCache( $model );

			$data = Hash::flatten( $data );

			foreach( $this->_regexes[$model->alias] as $fullClassName => $params ) {
				foreach( $params as $formatter => $regex ) {
					foreach( $data as $key => $value ) {
						if( preg_match( $regex, $key ) ) {
							$data[$key] = $this->_formatField( $fullClassName, $formatter, $value );
						}
					}
				}
			}

			$data = Hash::expand( $data );

			return $data;
		}

		/**
		 * Formatte les champs avant la validation.
		 *
		 * @param Model $model
		 * @return boolean
		 */
		public function beforeValidate( Model $model, $options = array() ) {
			$return = parent::beforeValidate( $model, $options );
			$model->data = $this->doFormatting( $model, $model->data );

			return $return;
		}

		/**
		 * Formatte les champs avant l'enregistrement.
		 *
		 * @param Model $model
		 * @return boolean
		 */
		public function beforeSave( Model $model, $options = array() ) {
			$return = parent::beforeSave( $model, $options );
			$model->data = $this->doFormatting( $model, $model->data );

			return $return;
		}
	}
?>