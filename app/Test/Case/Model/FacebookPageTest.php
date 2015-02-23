<?php
App::uses('FacebookPage', 'Model');

/**
 * FacebookPage Test Case
 *
 */
class FacebookPageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPage = ClassRegistry::init('FacebookPage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPage);

		parent::tearDown();
	}

}
