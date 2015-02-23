<?php
	/**
	 * Code source de la classe DatabaseRelationsTest.
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Test.Case.Utility
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	CakePlugin::load( 'Database', array( 'bootstrap' => true ) );
	App::uses( 'DatabaseRelations', 'Database.Utility' );
	require_once( dirname( __FILE__ ).DS.'..'.DS.'blog_models.php' );

	/**
	 * La classe DatabaseRelationsTest ...
	 *
	 * @package Database
	 * @subpackage Test.Case.Utility
	 */
	class DatabaseRelationsTest extends CakeTestCase
	{
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
		}

		/**
		 * Nettoyage postérieur au test.
		 */
		public function tearDown() {
			unset( $this->Post );
			parent::tearDown();
		}

		/**
		 * Test de la méthode DatabaseRelations::from()
		 */
		public function testFrom() {
			$result = DatabaseRelations::from( $this->Post->Author );
			$expected = array();
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::from( $this->Post->Comment );
			$expected = array( 'Comment.post_id' => 'Post.id' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::from( $this->Post );
			$expected = array( 'Post.author_id' => 'Author.id' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::from( $this->Post->Tag );
			$expected = array();
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::from( $this->Post->TestPostTag );
			$expected = array(
				'TestPostTag.post_id' => 'Post.id',
				'TestPostTag.tag_id' => 'Tag.id',
			);
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseRelations::to()
		 */
		public function testTo() {
			$result = DatabaseRelations::to( $this->Post->Author );
			$expected = array( 'Post.author_id' => 'Author.id' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::to( $this->Post->Comment );
			$expected = array();
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::to( $this->Post );
			$expected = array(
				'Comment.post_id' => 'Post.id',
				'TestPostTag.post_id' => 'Post.id',
			);
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::to( $this->Post->Tag );
			$expected = array( 'TestPostTag.tag_id' => 'Tag.id' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::to( $this->Post->TestPostTag );
			$expected = array();
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseRelations::links()
		 */
		public function testLinks() {
			$result = DatabaseRelations::links( $this->Post->Author );
			$expected = array( 'Post' => 'TestPost' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::links( $this->Post->Comment );
			$expected = array( 'Post' => 'TestPost' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::links( $this->Post );
			$expected = array(
				'Author' => 'TestAuthor',
				'Comment' => 'TestComment',
				'TestPostTag' => 'TestPostTag',
			);
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::links( $this->Post->Tag );
			$expected = array( 'TestPostTag' => 'TestPostTag' );
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = DatabaseRelations::links( $this->Post->TestPostTag );
			$expected = array(
				'Post' => 'TestPost',
				'Tag' => 'TestTag',
			);
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseRelations::aliases()
		 */
		public function testAliases() {
			$relations = array(
				'Author' => DatabaseRelations::relations( $this->Post->Author ),
				'Comment' => DatabaseRelations::relations( $this->Post->Comment ),
				'Post' => DatabaseRelations::relations( $this->Post ),
				'Tag' => DatabaseRelations::relations( $this->Post->Tag ),
				'TestPostTag' => DatabaseRelations::relations( $this->Post->TestPostTag ),
			);

			$result = DatabaseRelations::aliases( $relations );
			$expected = array(
				'Author' => array( 'Author', 'TestAuthor', ),
				'Comment' => array( 'Comment', 'TestComment', ),
				'Post' => array( 'Post', 'TestPost', ),
				'Tag' => array( 'Tag', 'TestTag', ),
				'TestAuthor' => array( 'TestAuthor', 'Author', ),
				'TestComment' => array( 'TestComment', 'Comment', ),
				'TestPost' => array( 'TestPost', 'Post', ),
				'TestPostTag' => array( 'TestPostTag', ),
				'TestTag' => array( 'TestTag', 'Tag', ),
			);
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode DatabaseRelations::missing()
		 */
		public function testMethod() {
			// Aucune relation manquante
			$relations = array(
				'Author' => DatabaseRelations::relations( $this->Post->Author ),
				'Comment' => DatabaseRelations::relations( $this->Post->Comment ),
				'Post' => DatabaseRelations::relations( $this->Post ),
				'Tag' => DatabaseRelations::relations( $this->Post->Tag ),
				'TestPostTag' => DatabaseRelations::relations( $this->Post->TestPostTag ),
			);

			$result = DatabaseRelations::missing( $relations );
			$expected = array();
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			// Suppression de certaines relations
			$empty = array( 'from' => array(), 'to' => array(), 'links' => array() );
			$relations['TestAuthor'] = $relations['Author'] = $empty;
			$relations['TestComment'] = $relations['Comment'] = $empty;
			$relations['TestPost'] = $relations['Post'] = array(
				'from' => array( 'Post.author_id' => 'Author.id' ),
				'to' => array( 'Comment.post_id' => 'Post.id' ),
				'links' => array(
					'Author' => 'TestAuthor',
					'Comment' => 'TestComment',
				)
			);
			$relations['TestTag'] = $relations['Tag'] = $empty;

			$result = DatabaseRelations::missing( $relations );
			$expected = array(
				'from' => array(
					'Comment.post_id' => 'Post.id',
				),
				'to' => array(
					'Post.author_id' => 'Author.id',
					'TestPostTag.post_id' => 'Post.id',
					'TestPostTag.tag_id' => 'Tag.id',
				),
			);
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}
	}
?>
