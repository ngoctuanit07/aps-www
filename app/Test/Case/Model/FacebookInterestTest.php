<?php
App::uses('FacebookInterest', 'Model');

/**
 * FacebookInterest Test Case
 *
 */
class FacebookInterestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_interest',
		'app.user',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookInterest = ClassRegistry::init('FacebookInterest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookInterest);

		parent::tearDown();
	}

}
