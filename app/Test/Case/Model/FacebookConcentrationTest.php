<?php
App::uses('FacebookConcentration', 'Model');

/**
 * FacebookConcentration Test Case
 *
 */
class FacebookConcentrationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_concentration',
		'app.education',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookConcentration = ClassRegistry::init('FacebookConcentration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookConcentration);

		parent::tearDown();
	}

}
