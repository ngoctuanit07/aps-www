<?php
	/**
	 * Code source de la classe DatabaseTableBehaviorTest.
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Test.Case.Model.Behavior
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	CakePlugin::load( 'Database', array( 'bootstrap' => true ) );
	// INFO: il faut le require_once() plutôt que App::uses() car on a déjà une classe DatabaseTableBehavior dans app
	// App::uses( 'DatabaseTableBehavior', 'Database.Model/Behavior' );
	require_once( dirname( __FILE__ ).DS.'..'.DS.'..'.DS.'..'.DS.'..'.DS.'Model'.DS.'Behavior'.DS.'DatabaseTableBehavior.php' );
	require_once( dirname( __FILE__ ).DS.'..'.DS.'..'.DS.'blog_models.php' );

	/**
	 * La classe DatabaseTableBehaviorTest ...
	 *
	 *
	 * @package Database
	 * @subpackage Test.Case.Model.Behavior
	 */
	class DatabaseTableBehaviorTest extends CakeTestCase
	{
		/**
		 *
		 * @var AppModel
		 */
		public $Site = null;

		/**
		 *
		 * @var AppModel
		 */
		public $Post = null;

		/**
		 * Fixtures utilisés par ces tests unitaires.
		 *
		 * @var array
		 */
		public $fixtures = array(
			'core.User',
			'core.Post',
			'core.Comment',
			'core.Author',
			'core.Tag',
			'core.PostsTag',
		);

		protected function _attach( Model $model ) {
			$attachedAliases = array_unique( Hash::extract( $model->Behaviors->methods(), '{s}.0' ) );
			foreach( $attachedAliases as $attachedAlias ) {
				$model->Behaviors->detach( $attachedAlias );
			}

//			$model->Behaviors->attach( 'FooBar', array( 'className' => 'Database.DatabaseTable' ) );
			$model->Behaviors->attach( 'Database.DatabaseTable' );
		}

		/**
		 * Préparation du test.
		 *
		 * INFO: ne pas utiliser parent::setUp();
		 */
		public function setUp() {
			$this->Post = ClassRegistry::init(
				array(
					'class' => 'TestPost',
					'alias' => 'Post'
				)
			);

			// On attache le bon behavior -> FIXME....
			$models = array(
				$this->Post,
				$this->Post->Author,
				$this->Post->Comment,
				$this->Post->TestPostTag,
				$this->Post->Tag,
			);
			foreach( $models as $model ) {
				$this->_attach( $model );
			}
		}

		/**
		 * Nettoyage postérieur au test.
		 */
		public function tearDown() {
			unset( $this->Post );
			ClassRegistry::flush();
			parent::tearDown();
		}

		/**
		 * Test de la fonction cacheKey()
		 */
		public function testCacheKey() {
			$result = cacheKey( array( 'ClassName', 'methodName' ) );
			$expected = 'ClassName_methodName';
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$result = cacheKey( array( 'ClassName', 'methodName' ), true );
			$expected = 'class_name_method_name';
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la fonction preg_replace_array()
		 */
		public function testPregReplaceArray() {
			$array = array( 0 => 1, 1 => 'woot', '2' => array( 'Foo' => 5, '1' => 'Bar' ) );
			$replacements = array( '/([0-9]+)/' => '\1\1' );
			$result = preg_replace_array( $array, $replacements );
			$expected = array(
				'00' => '11',
				11 => 'woot',
				22 =>
				array(
					'Foo' => '55',
					11 => 'Bar',
				),
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la fonction alias_querydata()
		 */
		public function testAliasQuerydata() {
			$querydata = array(
				'table' => '"authors"',
				'alias' => 'Author',
				'type' => 'LEFT',
				'conditions' => '"Post"."author_id" = "Author"."id"'
			);
			$result = alias_querydata( $querydata, array( 'Author' => 'authors', 'Post' => 'posts' ) );
			$expected = array(
				'table' => '"authors"',
				'alias' => 'authors',
				'type' => 'LEFT',
				'conditions' => '"posts"."author_id" = "authors"."id"',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$querydata = array(
				'fields' => array(
					'Post.id'
				),
				'joins' => array(
					array(
						'table' => '"authors"',
						'alias' => 'Author',
						'type' => 'LEFT',
						'conditions' => '"Post"."author_id" = "Author"."id"'
					)
				),
				'order' => array( 'Post.created DESC' ),
				'limit' => 1
			);
			$result = alias_querydata( $querydata, array( 'Author' => 'authors', 'Post' => 'posts' ) );
			$expected = array(
				'fields' => array(
					'posts.id',
				),
				'joins' => array(
					array(
						'table' => '"authors"',
						'alias' => 'authors',
						'type' => 'LEFT',
						'conditions' => '"posts"."author_id" = "authors"."id"',
					),
				),
				'order' => array(
					'posts.created DESC',
				),
				'limit' => '1',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::hasUniqueIndex()
		 */
		public function testHasUniqueIndex() {
			// Ajout d'un index unique sur la colonne tag du modèle Tag
			$Dbo = $this->Post->Tag->getDatasource();
			$tableName = $Dbo->fullTableName( $this->Post->Tag, false, true );
			$indexName = $Dbo->fullTableName( $this->Post->Tag, false, false ).'_tag_idx';

			$indexes = $Dbo->index( $this->Post->Tag );
			if( !isset( $indexes[$indexName] ) ) {
				$dontCache = '/* '.microtime( true ).' */';
				$sql = "CREATE UNIQUE INDEX {$indexName} ON {$tableName} ( tag ); {$dontCache}";
				$Dbo->query( $sql );
			}

//			$indexes = $this->Post->Tag->getDatasource()->index( $this->Post->Tag );
//			debug( $indexes );

			$result = $this->Post->Tag->hasUniqueIndex( 'tag' );
			$expected = true;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$result = $this->Post->Tag->hasUniqueIndex( 'tag', 'tags_tag_idx' );
			$expected = true;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$result = $this->Post->Tag->hasUniqueIndex( 'created' );
			$expected = false;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::hasUniqueIndex() lorsque le
		 * modèle n'est pas lié à une table et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testHasUniqueIndexException() {
			$this->Post->Tag->useTable = false;
			$this->Post->Tag->hasUniqueIndex( 'tag' );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::sql()
		 */
		public function testSql() {
			$result = trim( $this->Post->sql( array() ) );
			$expected = 'SELECT "posts"."id" AS "posts__id" FROM "public"."posts" AS "posts"   WHERE 1 = 1';
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$result = trim( $this->Post->sql( array( 'conditions' => array( 'posts.id' => '4' ) ) ) );
			$expected = 'SELECT "posts"."id" AS "posts__id" FROM "public"."posts" AS "posts"   WHERE "posts"."id" = 4';
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$result = trim(
				$this->Post->sql(
					array(
						'fields' => array(
							'posts.title'
						),
						'conditions' => array(
							'posts.published' => '1'
						),
						'limit' => 1,
						'order' => array( 'posts.id ASC' )
					)
				)
			);
			$expected = 'SELECT "posts"."title" AS "posts__title" FROM "public"."posts" AS "posts"   WHERE "posts"."published" = \'1\'   ORDER BY "posts"."id" ASC  LIMIT 1';
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::sql() lorsque le
		 * modèle n'est pas lié à une table et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testSqException() {
			$this->Post->useTable = false;
			$this->Post->sql( array( ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::fields()
		 */
		public function testFields() {
			$result = $this->Post->fields();
			$expected = array(
				'Post.id',
				'Post.author_id',
				'Post.title',
				'Post.body',
				'Post.published',
				'Post.created',
				'Post.updated',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::fields() lorsque le
		 * modèle n'est pas lié à une table et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testFieldsException() {
			$this->Post->useTable = false;
			$this->Post->fields();
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::uniqueIndexes()
		 */
		public function testUniqueIndexes() {
			$result = $this->Post->Tag->uniqueIndexes();
			$expected = array(
				'PRIMARY' => 'id',
				'tags_tag_idx' => 'tag',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::uniqueIndexes() lorsque le
		 * modèle n'est pas lié à une table et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testUniqueIndexesException() {
			$this->Post->Tag->useTable = false;
			$this->Post->Tag->uniqueIndexes();
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::uniqueIndexes()
		 * avec activation du cache.
		 */
		public function testCachedUniqueIndexes() {
			Configure::write( 'debug', 0 );
			Configure::write( 'Cache.disable', false );

			$result = $this->Post->Tag->uniqueIndexes();
			$expected = array (
				'PRIMARY' => 'id',
				'tags_tag_idx' => 'tag',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$this->Post->Tag->Behaviors->detach( 'DatabaseTable' );
			unset( $this->Post->Tag );
			$this->setUp();

			$result = $this->Post->Tag->uniqueIndexes();
			$expected = array (
				'PRIMARY' => 'id',
				'tags_tag_idx' => 'tag',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			Configure::write( 'debug', 2 );
			Configure::write( 'Cache.disable', true );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::joinAssociationData()
		 */
		public function testJoinAssociationData() {
			// belongsTo
			$result = $this->Post->joinAssociationData( 'Author' );
			$expected = array(
				'className' => 'TestAuthor',
				'foreignKey' => 'author_id',
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'counterCache' => '',
				'association' => 'belongsTo',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			// hasMany
			$result = $this->Post->joinAssociationData( 'Comment' );
			$expected = array(
				'className' => 'TestComment',
				'foreignKey' => 'post_id',
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'dependent' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => '',
				'association' => 'hasMany',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			// hasAndBelongsToMany
			$result = $this->Post->joinAssociationData( 'TestPostTag' );
			$expected = array(
				'className' => 'TestTag',
				'joinTable' => 'posts_tags',
				'foreignKey' => 'post_id',
				'associationForeignKey' => 'tag_id',
				'unique' => true,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
				'deleteQuery' => '',
				'insertQuery' => '',
				'with' => 'TestPostTag',
				'association' => 'hasAndBelongsToMany',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::joinAssociationData() lorsque le
		 * modèle n'est pas lié à une table et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testJoinAssociationDataExceptionNoModelTable() {
			$this->Post->useTable = false;
			$this->Post->joinAssociationData( 'Author' );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::joinAssociationData() lorsque le
		 * modèle n'est pas lié à l'autre modèle et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testJoinAssociationDataExceptionNotBoundAssociatedModel() {
			$this->Post->joinAssociationData( 'Site' );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::joinAssociationData() lorsque le
		 * modèle n'est pas lié à l'autre modèle et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testJoinAssociationDataExceptionNoAssociatedModelTable() {
			$this->Post->Author->useTable = false;
			$this->Post->joinAssociationData( 'Author' );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::joinAssociationData() lorsque le
		 * modèle et l'autre modèle n'utilisent pas le même et qu'une exception
		 * est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testJoinAssociationDataExceptionDifferentDbConfigs() {
			$this->Post->useDbConfig = 'foo';
			$this->Post->joinAssociationData( 'Author' );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::join()
		 */
		public function testJoin() {
			// belongsTo
			$result = $this->Post->join( 'Author' );
			$expected = array(
				'table' => '"authors"',
				'alias' => 'Author',
				'type' => 'LEFT',
				'conditions' => '"Post"."author_id" = "Author"."id"'
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			// belongsTo avec clés supplémentaires
			$result = $this->Post->join(
				'Author',
				array(
					'type' => 'INNER',
					'conditions' => array( 'Author.id >' => 4 )
				)
			);
			$expected = array(
				'table' => '"authors"',
				'alias' => 'Author',
				'type' => 'INNER',
				'conditions' => '"Post"."author_id" = "Author"."id" AND "Author"."id" > 4',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			// hasMany
			$result = $this->Post->join( 'Comment' );
			$expected = array(
				'table' => '"comments"',
				'alias' => 'Comment',
				'type' => 'LEFT',
				'conditions' => '"Comment"."post_id" = "Post"."id"'
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			// hasAndBelongsToMany
			$result = $this->Post->join( 'TestPostTag' );
			$expected = array(
				'table' => '"posts_tags"',
				'alias' => 'TestPostTag',
				'type' => 'LEFT',
				'conditions' => '"TestPostTag"."post_id" = "Post"."id"',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::types()
		 */
		public function testTypes() {
			$result = $this->Post->types();
			$expected = array(
				'Post.id' => 'integer',
				'Post.author_id' => 'integer',
				'Post.title' => 'string',
				'Post.body' => 'text',
				'Post.published' => 'string',
				'Post.created' => 'datetime',
				'Post.updated' => 'datetime',
			);
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseTableBehavior::types() lorsque le
		 * modèle n'est pas lié à une table et qu'une exception est renvoyée.
		 *
		 * @expectedException LogicException
		 */
		public function testTypesException() {
			$this->Post->useTable = false;
			$this->Post->types();
		}
	}
?>