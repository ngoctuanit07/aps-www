<?php
App::uses('FacebookPostsProperty', 'Model');

/**
 * FacebookPostsProperty Test Case
 *
 */
class FacebookPostsPropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_posts_property',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPostsProperty = ClassRegistry::init('FacebookPostsProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPostsProperty);

		parent::tearDown();
	}

}
