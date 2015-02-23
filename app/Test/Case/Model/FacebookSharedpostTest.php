<?php
App::uses('FacebookSharedpost', 'Model');

/**
 * FacebookSharedpost Test Case
 *
 */
class FacebookSharedpostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_sharedpost',
		'app.album',
		'app.video',
		'app.status',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookSharedpost = ClassRegistry::init('FacebookSharedpost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookSharedpost);

		parent::tearDown();
	}

}
