<?php
App::uses('FacebookNamesTag', 'Model');

/**
 * FacebookNamesTag Test Case
 *
 */
class FacebookNamesTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_names_tag',
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
		$this->FacebookNamesTag = ClassRegistry::init('FacebookNamesTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookNamesTag);

		parent::tearDown();
	}

}
