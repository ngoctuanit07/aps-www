<?php
	/**
	 * Code source de la classe DatabaseTableBehavior.
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	App::import( 'Model', 'Model' );


	/**
	 * La classe DatabaseTableBehavior ...
	 *
	 * @package Database
	 * @subpackage Model.Behavior
	 */
	class DatabaseTableBehavior extends ModelBehavior
	{
		/**
		 * Contient une configuration à utiliser, par alias du modèle.
		 *
		 * @var array
		 */
//		public $settings = array();

		/**
		 * Le cache de l'ensemble des modèles.
		 *
		 * @var array
		 */
		protected $_cache = array();

		/**
		 * Permet de savoir si le cache à été modifié.
		 *
		 * @var boolean
		 */
		protected $_cacheChanged = false;

		/**
		 * Le nom de la clé de cache.
		 *
		 * @var string
		 */
		protected $_cacheKey = null;

		/**
		 * A la destruction de la classe, si le cache a été modifié, on
		 * l'enregistre.
		 */
		public function __destruct() {
			if( $this->_cacheChanged ) {
				Cache::write( $this->_cacheKey, $this->_cache );
			}
		}

		/**
		 * Retourne la liste des indexes uniques de la table du modèle, en clé
		 * le nom de l'index, en valeur le ou les champs qui font partie de
		 * l'index unique.
		 *
		 * @param Model $model
		 * @return array
		 * @throws LogicException
		 */
		public function uniqueIndexes( Model $model ) {
			if( $model->useTable === false ) {
				$msgstr = __d( 'cake_dev', "Cannot get unique indexes for model \"%s\" since it does not use a table." );
				$message = sprintf( $msgstr, $model->alias );
				throw new LogicException( $message );
				return array();
			}

			if( Hash::check( $this->_cache, $model->alias ) ) {
				return $this->_cache[$model->alias];
			}

			$this->_cacheKey = cacheKey( array( $model->useDbConfig, __CLASS__, $model->alias ) );
			$cache = Cache::read( $this->_cacheKey );

			if( $cache === false ) {
				$indexes = $model->getDataSource( $model->useDbConfig )->index( $model );
				$this->_cache[$model->alias] = array();

				foreach( $indexes as $name => $index ) {
					if( $index['unique'] ) {
						$this->_cache[$model->alias][$name] = $index['column'];
					}
				}

				// Ecriture du cache en différé dans le destructeur.
				$this->_cacheChanged = true;
			}
			else {
				$this->_cache = $cache;
			}

			return $this->_cache[$model->alias];
		}

		/**
		 * Permet de savoir si une colonne d'un modèle donné a un index unique,
		 * éventuellement avec un nom d'index donné.
		 *
		 * @param Model $model La classe du modèle lié à la table sur laquelle
		 * 	l'index s'applique.
		 * @param mixed $columns La colonne (ou un array contenant les colonnes)
		 * 	sur laquelle l'index s'applique.
		 * @param string $expectedName Le nom de l'index (null pour ne pas vérifier)
		 * @return boolean
		 * @throws LogicException
		 */
		public function hasUniqueIndex( Model $model, $columns, $expectedName = null ) {
			if( $model->useTable === false ) {
				$msgstr = __d( 'cake_dev', "Cannot check unique index for model \"%s\" since it does not use a table." );
				$message = sprintf( $msgstr, $model->alias );
				throw new LogicException( $message );
				return false;
			}

			$unique = $this->uniqueIndexes( $model );

			if( !is_null( $expectedName ) ) {
				return ( Hash::get( $unique, $expectedName ) === $columns );
			}

			foreach( $unique as $indexName => $indexColumns ) {
				if( $columns === $indexColumns ) {
					return ( is_null( $expectedName ) || ( $indexName === $expectedName ) );
				}
			}

			return false;
		}

		/**
		 * Transforme les $querydata d'un appel "find all" en requête SQL,
		 * ce qui permet de faire des sous-requêtes moins dépendantes du SGBD.
		 *
		 * Les fields sont échappés.
		 *
		 * INFO: http://book.cakephp.org/view/74/Complex-Find-Conditions (Sub-queries)
		 *
		 * @param Model $model
		 * @param array $querydata
		 * @return string
		 * @throws LogicException
		 */
		public function sql( Model $model, array $querydata ) {
			if( $model->useTable === false ) {
				$msgstr = __d( 'cake_dev', "Cannot generate a subquery for model \"%s\" since it does not use a table." );
				$message = sprintf( $msgstr, $model->alias );
				throw new LogicException( $message );
				return 'NULL';
			}

			$Dbo = $model->getDataSource( $model->useDbConfig );
			$fullTableName = $Dbo->fullTableName( $model, true, true );

			$aliasTableName = Inflector::tableize( $model->alias );
			$defaults = array(
				'fields' => array( "{$aliasTableName}.{$model->primaryKey}" ),
				'order' => null,
				'group' => null,
				'limit' => null,
				'table' => $fullTableName,
				'alias' => $aliasTableName,
				'conditions' => array(),
			);

			$querydata = array_merge( $defaults, $querydata );
			$querydata['fields'] = $Dbo->fields( $model, null, $querydata['fields'] );

			return $Dbo->buildStatement( $querydata, $model );
		}

		/**
		 * Retourne la liste des champs du modèle.
		 *
		 * @param Model $model
		 * @return array
		 */
		public function fields( Model $model ) {
			if( $model->useTable === false ) {
				$msgstr = __d( 'cake_dev', "Cannot get fields for model \"%s\" since it does not use a table." );
				$message = sprintf( $msgstr, $model->alias );
				throw new LogicException( $message );

				return array( );
			}

			$fields = array( );
			foreach( array_keys( $model->schema() ) as $field ) {
				$fields[] = "{$model->alias}.{$field}";
			}

			return $fields;
		}

		/**
		 * Merges a mixed set of string/array conditions
		 *
		 * @see Cake.Model.Datasource.DboSource::_mergeConditions()
		 *
		 * @param mixed $query
		 * @param mixed $assoc
		 * @return array
		 */
		protected function _mergeConditions( $query, $assoc ) {
			if( empty( $assoc ) ) {
				return $query;
			}

			if (is_array($query)) {
				return array_merge((array)$assoc, $query);
			}

			if (!empty($query)) {
				$query = array($query);
				if (is_array($assoc)) {
					$query = array_merge($query, $assoc);
				} else {
					$query[] = $assoc;
				}
				return $query;
			}

			return $assoc;
		}

		/**
		 * Retourne l'alias du modèle lié ayant le nom de modèle passé en
		 * paramètre correspondant à la clé "with" de l'association.
		 *
		 * @param Model $model
		 * @param string $needleModelName
		 * @return string
		 */
		protected function _whichHabtmModel( Model $model, $needleModelName ) {
			foreach( $model->hasAndBelongsToMany as $habtmModel => $habtmAssoc ) {
				if( $habtmAssoc['with'] == $needleModelName ) {
					return $habtmModel;
				}
			}

			return null;
		}

		/**
		 * Retourne les données d'association avec le modèle aliasé.
		 *
		 * @param Model $model
		 * @param string $assocModelAlias
		 * @return array
		 * @throws LogicException
		 */
		public function joinAssociationData( Model $model, $assocModelAlias ) {
			$exceptionMessage = null;

			// Is the assoc model really associated ?
			if( $model->useTable === false ) {
				$exceptionMessage = sprintf( "Cannot generate a join from model \"%s\" since it does not use a table.", $model->alias );
			}
			else if( !isset( $model->{$assocModelAlias} ) ) {
				$exceptionMessage = sprintf( "Unknown association \"%s\" for model \"%s\"", $assocModelAlias, $model->alias );
			}
			else if( $model->{$assocModelAlias}->useTable === false ) {
				$exceptionMessage = sprintf( "Cannot generate a join from model \"%s\" to model \"%s\" since it does not use a table.", $model->alias, $model->{$assocModelAlias}->alias );
			}
			// Is the assoc model using the same DbConfig as the model's ?
			else if( $model->useDbConfig != $model->{$assocModelAlias}->useDbConfig ) {
				$exceptionMessage = sprintf( "Database configuration differs: \"%s\" (%s) and \"%s\" (%s)", $model->alias, $model->useDbConfig, $assocModelAlias, $model->{$assocModelAlias}->useDbConfig );
			}

			if( !is_null( $exceptionMessage ) ) {
				throw new LogicException( $exceptionMessage );
				return array();
			}

			$assocModelData = $model->getAssociated( $assocModelAlias );

			if( empty( $assocModelData ) ) {
				$whichHabtmModel = $this->_whichHabtmModel( $model, $assocModelAlias );

				if( !empty( $whichHabtmModel ) ) {
					$assocModelData = Hash::get( $model->hasAndBelongsToMany, $whichHabtmModel );
					$assocModelData['association'] = 'hasAndBelongsToMany';
				}
				else {
					$exceptionMessage = sprintf( "Unknown association \"%s\" for model \"%s\"", $assocModelAlias, $model->alias );
					throw new LogicException( $exceptionMessage );
					return array();
				}
			}

			return $assocModelData;
		}

		/**
		 * Retourne un array permettant de faire la jointure en CakePHP.
		 *
		 * @param Model $model
		 * @param string $assocModelAlias
		 * @param array $params
		 * @return string
		 */
		public function join( Model $model, $assocModelAlias, array $params = array() ) {
			$assocModelData = Hash::merge(
				(array)$this->joinAssociationData( $model, $assocModelAlias ),
				(array)$params
			);

			// hasOne, belongsTo: OK
			$association = Hash::get( $assocModelData, 'association' );
			if( $association === 'hasMany' ) {
				$assocModelData['association'] = 'hasOne';
			}
			else if( $association === 'hasAndBelongsToMany' ) {
				$assocModelData['association'] = 'hasOne';
				$assocModelData['className'] = 'with';
			}

			$Dbo = $model->getDataSource();

			$join = array(
				'table' => $Dbo->fullTableName( $model->{$assocModelAlias}, true, false ),
				'alias' => $assocModelAlias,
				'type' => ( isset( $assocModelData['type'] ) ? $assocModelData['type'] : 'LEFT' ),
				'conditions' => trim(
					$Dbo->conditions(
							$this->_mergeConditions(
								@$assocModelData['conditions'],
								$Dbo->getConstraint(
									@$assocModelData['association'],
									$model,
									$model->{$assocModelAlias},
									$assocModelAlias,
									$assocModelData
								)
							),
						true,
						false,
						$model
					)
				)
			);

			return $join;
		}

		/**
		 * <pre>
		 * array(
		 * 	'Seance.id' => 'integer',
		 * 	'Seance.created' => 'datetime',
		 * 	'Seance.commentaire' => 'string',
		 * 	'Seance.debat_global' => 'binary',
		 * )
		 * </pre>
		 *
		 * @param Model $model
		 * @return array
		 * @throws LogicException
		 */
		public function types( Model $model ) {
			if( $model->useTable === false ) {
				$msgstr = __d( 'cake_dev', "Cannot get field types for model \"%s\" since it does not use a table." );
				$message = sprintf( $msgstr, $model->alias );
				throw new LogicException( $message );

				return array( );
			}

			$schema = $model->schema();

			$return = array_combine( array_keys( $schema ), Hash::extract( $schema, '{s}.type' ) );
			$return = Hash::flatten( array( $model->alias => $return ) );

			return $return;
		}

		/**
		 *
		 * @param string $type
		 * @param array $querydata
		 */
		/*public function querydataModels( Model $model, $type, array $querydata = array() ) {

		}*/
	}
?>