<?php
App::uses('FacebookComment', 'Model');

/**
 * FacebookComment Test Case
 *
 */
class FacebookCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_comment',
		'app.achivement',
		'app.albums',
		'app.comment',
		'app.link',
		'app.milestone',
		'app.photo',
		'app.post',
		'app.status',
		'app.user',
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
		$this->FacebookComment = ClassRegistry::init('FacebookComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookComment);

		parent::tearDown();
	}

}
