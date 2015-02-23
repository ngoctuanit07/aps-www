<?php
App::uses('FacebookPostsPrivacy', 'Model');

/**
 * FacebookPostsPrivacy Test Case
 *
 */
class FacebookPostsPrivacyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_posts_privacy',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPostsPrivacy = ClassRegistry::init('FacebookPostsPrivacy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPostsPrivacy);

		parent::tearDown();
	}

}
