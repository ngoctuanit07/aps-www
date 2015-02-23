<?php
App::uses('FacebookTag', 'Model');

/**
 * FacebookTag Test Case
 *
 */
class FacebookTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_tag',
		'app.photo',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookTag = ClassRegistry::init('FacebookTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookTag);

		parent::tearDown();
	}

}
