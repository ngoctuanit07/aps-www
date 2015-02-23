<?php
App::uses('FacebookStatus', 'Model');

/**
 * FacebookStatus Test Case
 *
 */
class FacebookStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_status',
		'app.user',
		'app.page',
		'app.group',
		'app.event',
		'app.application',
		'app.rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookStatus = ClassRegistry::init('FacebookStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookStatus);

		parent::tearDown();
	}

}
