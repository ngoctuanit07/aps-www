<?php
App::uses('TwitterUser', 'Model');

/**
 * TwitterUser Test Case
 *
 */
class TwitterUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.twitter_user',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TwitterUser = ClassRegistry::init('TwitterUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TwitterUser);

		parent::tearDown();
	}

}
