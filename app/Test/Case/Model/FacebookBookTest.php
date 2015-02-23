<?php
App::uses('FacebookBook', 'Model');

/**
 * FacebookBook Test Case
 *
 */
class FacebookBookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_book',
		'app.user',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookBook = ClassRegistry::init('FacebookBook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookBook);

		parent::tearDown();
	}

}
