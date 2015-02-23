<?php
App::uses('FacebookFormat', 'Model');

/**
 * FacebookFormat Test Case
 *
 */
class FacebookFormatTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_format',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookFormat = ClassRegistry::init('FacebookFormat');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookFormat);

		parent::tearDown();
	}

}
