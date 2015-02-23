<?php
	/**
	 * Code source de la classe PostgresAutovalidateBehavior.
	 *
	 * PHP 5.3
	 *
	 * @package Postgres
	 * @subpackage Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	App::uses( 'Validation2AutovalidateBehavior', 'Validation2.Model/Behavior' );

	/**
	 * La classe PostgresAutovalidateBehavior ajoute aux fonctionnalités de la
	 * classe Validation2AutovalidateBehavior la possibilité de lire des
	 * règles de validation à partir de contraintes postgresql.
	 *
	 * Ces contraintes doivent porter un nom commençant par cakephp_validate_
	 * pour être automatiquement ajoutées aux contraintes du modèle.
	 *
	 * @see Pgsqlcake.PgsqlAutovalidateBehavior (sera dépréciée par cette classe-ci)
	 *
	 * @package Postgres
	 * @subpackage Model.Behavior
	 */
	class PostgresAutovalidateBehavior extends Validation2AutovalidateBehavior
	{
		/**
		 * Liste des règles cakephp_validate_ groupées par alias du modèle.
		 *
		 * @var array
		 */
		protected $_checkRules = array();

		/**
		 * Lecture des contraintes dont le nom commence par cakephp_validate_.
		 *
		 * @param Model $model
		 */
		protected function _readTableConstraints( Model $model ) {
			$cacheKey = $this->methodCacheKey( $model, __CLASS__, __FUNCTION__ );
			$this->_checkRules[$model->alias] = Cache::read( $cacheKey );

			if( $this->_checkRules[$model->alias] === false ) {
				if( !$model->Behaviors->attached( 'Postgres.PostgresTable' ) ) {
					$model->Behaviors->attach( 'Postgres.PostgresTable' );
				}
				$checks = $model->getPostgresCheckConstraints();

				$this->_checkRules[$model->alias] = array();
				foreach( $checks as $check ) {
					$this->_checkRules[$model->alias] = $this->_addGuessedPostgresConstraint(
						$model,
						$this->_checkRules[$model->alias],
						$check['Constraint']['clause']
					);
				}

				Cache::write( $cacheKey, $this->_checkRules[$model->alias] );
			}
		}

		/**
		 * Configuration du behavior.
		 *
		 * @param Model $model Le modèle qui utilise ce behavior
		 * @param array $config La configuration à appliquer
		 */
		public function setup( Model $model, $config = array() ) {
			$datasourceName = Hash::get( $model->getDataSource()->config, 'datasource' );
			if( stristr( $datasourceName, 'Postgres' ) !== false ) {
				$this->defaultConfig['rules']['postgres_constraints'] = true;
			}

			$this->_readTableConstraints( $model );
			parent::setup( $model, $config );
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
			$rules = parent::deduceFieldValidationRules( $model, $field, $params, $indexes );

			if( Hash::get( $this->settings, "{$model->alias}.rules.postgres_constraints" ) ) {
				if( isset( $this->_checkRules[$model->alias][$field] ) && !empty( $this->_checkRules[$model->alias][$field] ) ) {
					foreach( $this->_checkRules[$model->alias][$field] as $rule ) {
						$rules[$rule['rule'][0]] = $rule;
					}
				}
			}

			return $rules;
		}

		/**
		 * Lecture des paramètres de la contrainte postgresql.
		 *
		 * @param array $parameters
		 * @return array
		 */
		protected function _extractPostgresParams( array $parameters ) {
			$params = array();

			if( isset( $parameters['params'] ) ) {
				if( preg_match( '/^ARRAY\[(.*)\]$/', $parameters['params'], $matches ) ) {
					if( preg_match_all( '/([^, ]+)/', $matches[1], $values ) ) {
						$params = array( $values[1] );
					}
				}
				else if( preg_match_all( '/([^, ]+),{0,1}/', $parameters['params'], $matches ) ) {
					$params = $matches[1];
				}
			}

			foreach( $params as $i => $param ) {
				if( is_string( $param ) && strtolower( $param ) == 'null' ) {
					$params[$i] = null;
				}
			}

			return $params;
		}

		/**
		 * Complète les $règles avec les règles déduites des contraintes postgresql.
		 *
		 * @param Model $model
		 * @param array $rules
		 * @param string $code
		 * @return array
		 */
		protected function _addGuessedPostgresConstraint( Model $model, array $rules, $code ) {
			// INFO: IIF the check is "xx()" or "xx() AND xx()" etc.
			// Remove extra parenthesis
			$code = preg_replace( '/^( *\(+ *)? *(.+) *(?(1) *\)+ *)$/', '\2', $code );
			// Transform '.*'::text
			$code = preg_replace( '/\'([^\']+)\'::[^,\)\]]+/', '\1', $code );
			// Transform (0)::numeric
			$code = preg_replace( '/\(([^\(\)]+)\)::[^,\)\]]+/', '\1', $code );
			// Transform ((-1))::double precision
			$code = preg_replace( '/\(\(([^\(\)]+)\)\)::[^,\)\]]+/', '\1', $code );
			// Transform NULL::character varying
			$code = preg_replace( '/NULL::[^,\)]+/', 'NULL', $code );

			if( preg_match_all( '/cakephp_validate_.*\((\(.+\).*|.+)\)/U', $code, $matches, PREG_PATTERN_ORDER ) ) {
				foreach( $matches[0] as $rule ) {
					// INFO: '.*'::text, (0)::numeric and ((-1))::double precision are transformed above
					// if( preg_match( '/^cakephp_validate_(?<function>[^\(]+)\((?<field>\(.*\)::\w+|\w+)(, *(?<params>.*)){0,1}\)$/', $rule, $parameters ) ) {
					if( preg_match( '/^cakephp_validate_(?<function>[^\(]+)\((?<field>\(.*\)|\w+)(, *(?<params>.*)){0,1}\)$/', $rule, $parameters ) ) {
						$ruleName = Inflector::camelize( $parameters['function'] );
						$ruleName[0] = strtolower( $ruleName[0] );

						$field = trim( $parameters['field'] );
						$params = $this->_extractPostgresParams( $parameters );

						$rules[$field][$ruleName] = $this->normalizeValidationRule( $model, array( 'rule' => array_merge( array( $ruleName ), $params ), 'allowEmpty' => true ) );
					}
				}
			}

			return $rules;
		}
	}
?>