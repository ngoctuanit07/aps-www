<?php
App::uses('FacebookMessagesTag', 'Model');

/**
 * FacebookMessagesTag Test Case
 *
 */
class FacebookMessagesTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_messages_tag',
		'app.tagging_post',
		'app.user',
		'app.event',
		'app.album',
		'app.page',
		'app.post',
		'app.status',
		'app.achivement',
		'app.comment',
		'app.link',
		'app.milestone',
		'app.photo',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookMessagesTag = ClassRegistry::init('FacebookMessagesTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookMessagesTag);

		parent::tearDown();
	}

}
