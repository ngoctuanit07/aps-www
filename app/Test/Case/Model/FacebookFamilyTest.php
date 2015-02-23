<?php
App::uses('FacebookFamily', 'Model');

/**
 * FacebookFamily Test Case
 *
 */
class FacebookFamilyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_family',
		'app.user',
		'app.family_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookFamily = ClassRegistry::init('FacebookFamily');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookFamily);

		parent::tearDown();
	}

}
