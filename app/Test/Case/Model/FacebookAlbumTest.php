<?php
App::uses('FacebookAlbum', 'Model');

/**
 * FacebookAlbum Test Case
 *
 */
class FacebookAlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_album',
		'app.user',
		'app.facebook_user',
		'app.facebook_users_facebook_album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookAlbum = ClassRegistry::init('FacebookAlbum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookAlbum);

		parent::tearDown();
	}

}
