<?php
App::uses('FacebookActivity', 'Model');

/**
 * FacebookActivity Test Case
 *
 */
class FacebookActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_activity',
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
		$this->FacebookActivity = ClassRegistry::init('FacebookActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookActivity);

		parent::tearDown();
	}

}
