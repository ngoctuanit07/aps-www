<?php
App::uses('FacebookPostsWithTag', 'Model');

/**
 * FacebookPostsWithTag Test Case
 *
 */
class FacebookPostsWithTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_posts_with_tag',
		'app.post',
		'app.user',
		'app.page',
		'app.groups',
		'app.event',
		'app.application'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPostsWithTag = ClassRegistry::init('FacebookPostsWithTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPostsWithTag);

		parent::tearDown();
	}

}
