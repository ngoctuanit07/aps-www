<?php
	/**
	 * Validation2RulesFieldtypesBehaviorTest file
	 *
	 * PHP 5.3
	 *
	 * @package Validation2
	 * @subpackage Test.Case.Model.Behavior
	 */
	App::uses( 'Model', 'Model' );
	App::uses( 'AppModel', 'Model' );

	/**
	 * ExtraBasicValidation2RulesTest class
	 *
	 * @package Validation2
	 * @subpackage Test.Case.Model.Behavior
	 */
	class Validation2RulesFieldtypesBehaviorTest extends CakeTestCase
	{
		/**
		 * Fixtures associated with this test case
		 *
		 * @var array
		 */
		public $fixtures = array(
//			'app.site',
			'plugin.Validation2.Validation2Site',
		);

		/**
		 * Method executed before each test
		 */
		public function setUp() {
			parent::setUp();
			$this->Site = ClassRegistry::init( array('class' => 'Validation2.Validation2Site', 'alias' => 'Site') );
			$this->Site->Behaviors->attach( 'Validation2.Validation2RulesFieldtypes' );
		}

		/**
		 * Method executed after each test
		 */
		public function tearDown() {
			unset( $this->Site );
			parent::tearDown();
		}

		/**
		 * Test de la méthode Validation2RulesFieldtypes::integer()
		 *
		 * @return void
		 */
		public function testInteger() {
			$result = $this->Site->integer( null );
			$expected = false;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$data = array( 'Site' => array( 'user_id' => 666 ) );
			$this->Site->create( $data );
			$result = $this->Site->integer( $data['Site'] );
			$expected = true;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$data = array( 'Site' => array( 'user_id' => 'foo' ) );
			$this->Site->create( $data );
			$result = $this->Site->integer( $data['Site'] );
			$expected = false;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );

			$data = array( 'Site' => array( 'user_id' => 666.1 ) );
			$this->Site->create( $data );
			$result = $this->Site->integer( $data['Site'] );
			$expected = false;
			$this->assertEqual( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode Validation2RulesFieldtypes::boolean()
		 *
		 * @return void
		 */
		public function testBoolean() {
			$result = $this->Site->boolean( null );
			$this->assertEqual( $result, false, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => true ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => false ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => 0 ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => 1 ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => '0' ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => '1' ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => 'true' ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => 'false' ) );
			$this->assertEqual( $result, true, var_export( $result, true ) );

			$result = $this->Site->boolean( array( 'published' => '2' ) );
			$this->assertEqual( $result, false, var_export( $result, true ) );
		}
	}
?>