<?php
App::uses('FacebookFriendlist', 'Model');

/**
 * FacebookFriendlist Test Case
 *
 */
class FacebookFriendlistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_friendlist'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookFriendlist = ClassRegistry::init('FacebookFriendlist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookFriendlist);

		parent::tearDown();
	}

}
