<?php
App::uses('FacebookProjectsFacebookUser', 'Model');

/**
 * FacebookProjectsFacebookUser Test Case
 *
 */
class FacebookProjectsFacebookUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_projects_facebook_user',
		'app.project',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookProjectsFacebookUser = ClassRegistry::init('FacebookProjectsFacebookUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookProjectsFacebookUser);

		parent::tearDown();
	}

}
