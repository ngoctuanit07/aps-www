<?php
App::uses('FacebookUsersFacebookGroup', 'Model');

/**
 * FacebookUsersFacebookGroup Test Case
 *
 */
class FacebookUsersFacebookGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_users_facebook_group',
		'app.user',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUsersFacebookGroup = ClassRegistry::init('FacebookUsersFacebookGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUsersFacebookGroup);

		parent::tearDown();
	}

}
