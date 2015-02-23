<?php
App::uses('FacebookPhoto', 'Model');

/**
 * FacebookPhoto Test Case
 *
 */
class FacebookPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_photo',
		'app.album',
		'app.user',
		'app.page',
		'app.page_story',
		'app.facebook_milestone',
		'app.facebook_photos_facebook_milestone',
		'app.facebook_user',
		'app.facebook_users_facebook_photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPhoto = ClassRegistry::init('FacebookPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPhoto);

		parent::tearDown();
	}

}
