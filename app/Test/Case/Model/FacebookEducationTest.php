<?php
App::uses('FacebookEducation', 'Model');

/**
 * FacebookEducation Test Case
 *
 */
class FacebookEducationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_education',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookEducation = ClassRegistry::init('FacebookEducation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookEducation);

		parent::tearDown();
	}

}
