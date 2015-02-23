<?php
App::uses('FacebookApplication', 'Model');

/**
 * FacebookApplication Test Case
 *
 */
class FacebookApplicationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_application'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookApplication = ClassRegistry::init('FacebookApplication');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookApplication);

		parent::tearDown();
	}

}
