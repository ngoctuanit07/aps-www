<?php
App::uses('FacebookLink', 'Model');

/**
 * FacebookLink Test Case
 *
 */
class FacebookLinkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_link',
		'app.user',
		'app.rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookLink = ClassRegistry::init('FacebookLink');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookLink);

		parent::tearDown();
	}

}
