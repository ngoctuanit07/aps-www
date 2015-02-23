<?php
	/**
	 * Validation2DefaultFormatterTest file
	 *
	 * PHP 5.3
	 *
	 * @package Validation
	 * @subpackage Test.Case.Utility.Validation2Formatters
	 */
	App::uses( 'Validation2DefaultFormatter', 'Validation2.Utility/Validation2Formatters' );

	/**
	 * Validation2DefaultFormatterTest class
	 *
	 * @package Validation
	 * @subpackage Test.Case.Utility.Validation2Formatters
	 */
	class Validation2DefaultFormatterTest extends CakeTestCase
	{
		/**
		 * Test de la méthode Validation2DefaultFormatter::trim();
		 */
		public function testTrim() {
			$result = Validation2DefaultFormatter::trim( null );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::trim( '' );
			$expected = '';
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::trim( '  ' );
			$expected = '';
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::trim( ' 0 ' );
			$expected = '0';
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::trim( 0.00 );
			$expected = 0.00;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode Validation2DefaultFormatter::null();
		 */
		public function testNull() {
			$result = Validation2DefaultFormatter::null( null );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::null( '' );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::null( '  ' );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::null( 0.00 );
			$expected = 0.00;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode Validation2DefaultFormatter::numeric();
		 */
		public function testNumeric() {
			$result = Validation2DefaultFormatter::numeric( null );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::numeric( '' );
			$expected = '';
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::numeric( '  ' );
			$expected = '  ';
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::numeric( 0.00 );
			$expected = 0.00;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::numeric( '0,00' );
			$expected = 0.00;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::numeric( '6 661' );
			$expected = 6661;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::numeric( '-10 123,67' );
			$expected = -10123.67;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}

		/**
		 * Test de la méthode Validation2DefaultFormatter::suffix();
		 */
		public function testSuffix() {
			$result = Validation2DefaultFormatter::suffix( null );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::suffix( '_15' );
			$expected = 15;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::suffix( '11_21_150_666' );
			$expected = 666;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::suffix( '11_' );
			$expected = null;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );

			$result = Validation2DefaultFormatter::suffix( 33 );
			$expected = 33;
			$this->assertEquals( $result, $expected, var_export( $result, true ) );
		}
	}
?>