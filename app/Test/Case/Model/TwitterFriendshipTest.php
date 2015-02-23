<?php
App::uses('TwitterFriendship', 'Model');

/**
 * TwitterFriendship Test Case
 *
 */
class TwitterFriendshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.twitter_friendship',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TwitterFriendship = ClassRegistry::init('TwitterFriendship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TwitterFriendship);

		parent::tearDown();
	}

}
