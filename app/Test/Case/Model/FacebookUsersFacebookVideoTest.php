<?php
App::uses('FacebookUsersFacebookVideo', 'Model');

/**
 * FacebookUsersFacebookVideo Test Case
 *
 */
class FacebookUsersFacebookVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_users_facebook_video',
		'app.user',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUsersFacebookVideo = ClassRegistry::init('FacebookUsersFacebookVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUsersFacebookVideo);

		parent::tearDown();
	}

}
