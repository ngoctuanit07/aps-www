<?php
	/**
	 * Code source de la classe PostgresTableBehavior.
	 *
	 * PHP 5.3
	 *
	 * @package Postgres
	 * @subpackage Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */

	/**
	 * La classe PostgresTableBehavior fournit des méthodes permettant d'interroger
	 * les propriétés de tables PostgreSQL.
	 *
	 * @package Postgres
	 * @subpackage Model.Behavior
	 */
	class PostgresTableBehavior extends ModelBehavior
	{
		/**
		 * On s'assure que le DataSource lié au modèle soit bien la classe
		 * PostgresPostgres ou une de ses descendantes.
		 *
		 * @param Model $model
		 * @param array $config
		 * @throws FatalErrorException
		 */
		public function setup( Model $model, $config = array( ) ) {
			parent::setup( $model, $config );

			if( !( $model->getDataSource() instanceof PostgresPostgres ) ) {
				$msgid = "%s: datasource non supporté par le behavior %s (datasource 'Postgres.Database/PostgresPostgres' attendu).";
				$message = sprintf( __( $msgid ), __CLASS__, $model->alias );
				throw new FatalErrorException( $message );
			}
		}

		/**
		 * Retourne la liste des contraintes de type check concernant la table
		 * liée au modèle.
		 *
		 * @param Model $model
		 * @return array
		 */
		public function getPostgresCheckConstraints( Model $model ) {
			$Dbo = $model->getDataSource();

			$conditions = array(
				'pg_namespace.nspname' => $Dbo->config['schema'],
				'pg_class.relname' => $Dbo->fullTableName( $model, false, false )
			);

			return $Dbo->getPostgresCheckConstraints( $conditions );
		}

		/**
		 * Retourne le nom de la clé de cache pour une table contenue dans la même
		 * connection à la base de données que le modèle passé en paramètre.
		 *
		 * @param Model $model
		 * @param string $tableName
		 * @return string
		 */
		protected function _foreignKeysCacheKey( Model $model, $tableName ) {
			return sprintf(
				"%s_%s_%s_%s",
				$model->useDbConfig,
				__CLASS__,
				'getPostgresForeignKeys',
				$tableName
			);
		}

		/**
		 * Transforme les résultats pour les stocker en cache.
		 *
		 * @param array $foreignKeys
		 * @return array
		 */
		protected function _queryResultsTo( array $foreignKeys ) {
			$return = array();

			foreach( $foreignKeys as $foreignKey ) {
				$return = Hash::insert(
					$return,
					"{$foreignKey['From']['table']}.from.{$foreignKey['Foreignkey']['name']}",
					$foreignKey
				);
				$return = Hash::insert(
					$return,
					"{$foreignKey['To']['table']}.to.{$foreignKey['Foreignkey']['name']}",
					$foreignKey
				);
			}

			return $return;
		}

		/**
		 * Préchargement de l'ensemble des clés étrangères dans le cache (mémoire).
		 *
		 * @param Model $model
		 * @return array
		 */
		public function getAllPostgresForeignKeys( Model $model ) {
			$Dbo = $model->getDataSource();

			$conditions = array(
				'From.table_schema' => $model->schemaName,
				'To.table_schema' => $model->schemaName
			);

			$foreignKeys = $Dbo->getPostgresForeignKeys( $conditions );
			$return = $this->_queryResultsTo( $foreignKeys );

			foreach( $return as $tableName => $tableData ) {
				$cacheKey = $this->_foreignKeysCacheKey( $model, $tableName );
				Cache::write( $cacheKey, $tableData );
			}

			return $return;
		}

		/**
		 * Retourne la liste des clés étrangères depuis ou vers les champs de la
		 * table à laquelle le modèle est lié.
		 *
		 * INFO: 45 secondes pour l'ensemble des tables du schéma public, 5
		 * secondes par table.
		 *
		 * @param Model $model
		 * @return array
		 */
		public function getPostgresForeignKeys( Model $model ) {
			$Dbo = $model->getDataSource();
			$tableName = $Dbo->fullTableName( $model, false, false );
			$cacheKey = $this->_foreignKeysCacheKey( $model, $tableName );

			$return = Cache::read( $cacheKey );

			if( $return === false ) {
				$conditions = array(
					'From.table_schema' => $model->schemaName,
					'To.table_schema' => $model->schemaName,
					'OR' => array(
						'From.table_name' => $tableName,
						'To.table_name' => $tableName,
					)
				);

				$foreignKeys = $Dbo->getPostgresForeignKeys( $conditions );
				$return = $this->_queryResultsTo( $foreignKeys );
				$return = (array)Hash::get( $return, $tableName );
				Cache::write( $cacheKey, $return );
			}

			return $return;
		}

		/**
		 * Retourne la liste des clés étrangères définies depuis les champs de
		 * la table à laquelle le modèle est lié.
		 *
		 * @param Model $model
		 * @return array
		 */
		public function getPostgresForeignKeysFrom( Model $model ) {
			$return = $this->getPostgresForeignKeys( $model );
			return Hash::get( $return, 'from' );
		}

		/**
		 * Retourne la liste des clés étrangères définies vers les champs de
		 * la table à laquelle le modèle est lié.
		 *
		 * @param Model $model
		 * @return array
		 */
		public function getPostgresForeignKeysTo( Model $model ) {
			$return = $this->getPostgresForeignKeys( $model );
			return Hash::get( $return, 'to' );
		}
	}
?>