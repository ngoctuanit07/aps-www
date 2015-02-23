<?php
App::uses('FacebookProject', 'Model');

/**
 * FacebookProject Test Case
 *
 */
class FacebookProjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_project',
		'app.facebook_user',
		'app.facebook_projects_facebook_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookProject = ClassRegistry::init('FacebookProject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookProject);

		parent::tearDown();
	}

}
