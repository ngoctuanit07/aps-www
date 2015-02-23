<?php
App::uses('FacebookPost', 'Model');

/**
 * FacebookPost Test Case
 *
 */
class FacebookPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_post',
		'app.user',
		'app.page',
		'app.group',
		'app.event',
		'app.application',
		'app.photo',
		'app.video',
		'app.rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPost = ClassRegistry::init('FacebookPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPost);

		parent::tearDown();
	}

}
