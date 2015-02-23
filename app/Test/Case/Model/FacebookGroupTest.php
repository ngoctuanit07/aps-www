<?php
App::uses('FacebookGroup', 'Model');

/**
 * FacebookGroup Test Case
 *
 */
class FacebookGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_group',
		'app.owner_user',
		'app.owner_page',
		'app.parent_group',
		'app.parent_page',
		'app.parent_user',
		'app.facebook_user',
		'app.facebook_users_facebook_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookGroup = ClassRegistry::init('FacebookGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookGroup);

		parent::tearDown();
	}

}
