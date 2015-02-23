<?php
App::uses('FacebookPostsTo', 'Model');

/**
 * FacebookPostsTo Test Case
 *
 */
class FacebookPostsToTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_posts_to',
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
		$this->FacebookPostsTo = ClassRegistry::init('FacebookPostsTo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPostsTo);

		parent::tearDown();
	}

}
