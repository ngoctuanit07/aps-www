<?php
	/**
	 * AllDatabaseTests file
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Test.Case
	 */
	CakePlugin::load( 'Database', array( 'bootstrap' => true ) );

	/**
	 * AllDatabaseTests class
	 *
	 * This test group will run all tests.
	 *
	 * @package Database
	 * @subpackage Test.Case
	 */
	class AllDatabaseTests extends PHPUnit_Framework_TestSuite
	{
		/**
		 * Test suite with all test case files.
		 *
		 * @return void
		 */
		public static function suite() {
			$suite = new CakeTestSuite( 'All Database tests' );
			$suite->addTestDirectoryRecursive( dirname( __FILE__ ).DS.'..'.DS.'Case'.DS );
			return $suite;
		}
	}
?>