<?php
App::uses('FacebookUsersFacebookAlbum', 'Model');

/**
 * FacebookUsersFacebookAlbum Test Case
 *
 */
class FacebookUsersFacebookAlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_users_facebook_album',
		'app.user',
		'app.album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUsersFacebookAlbum = ClassRegistry::init('FacebookUsersFacebookAlbum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUsersFacebookAlbum);

		parent::tearDown();
	}

}
