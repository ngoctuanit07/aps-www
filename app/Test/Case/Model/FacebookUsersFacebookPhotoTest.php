<?php
App::uses('FacebookUsersFacebookPhoto', 'Model');

/**
 * FacebookUsersFacebookPhoto Test Case
 *
 */
class FacebookUsersFacebookPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_users_facebook_photo',
		'app.user',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUsersFacebookPhoto = ClassRegistry::init('FacebookUsersFacebookPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUsersFacebookPhoto);

		parent::tearDown();
	}

}
