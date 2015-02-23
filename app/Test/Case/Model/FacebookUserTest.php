<?php
App::uses('FacebookUser', 'Model');

/**
 * FacebookUser Test Case
 *
 */
class FacebookUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_user',
		'app.user',
		'app.third_party',
		'app.facebook_project',
		'app.facebook_projects_facebook_user',
		'app.facebook_album',
		'app.facebook_users_facebook_album',
		'app.facebook_event',
		'app.page',
		'app.group',
		'app.facebook_users_facebook_event',
		'app.facebook_group',
		'app.owner_user',
		'app.owner_page',
		'app.parent_group',
		'app.parent_page',
		'app.parent_user',
		'app.facebook_users_facebook_group',
		'app.facebook_photo',
		'app.album',
		'app.page_story',
		'app.facebook_milestone',
		'app.facebook_photos_facebook_milestone',
		'app.facebook_users_facebook_photo',
		'app.facebook_video',
		'app.facebook_users_facebook_video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUser = ClassRegistry::init('FacebookUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUser);

		parent::tearDown();
	}

}
