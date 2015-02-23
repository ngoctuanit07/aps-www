<?php
App::uses('FacebookGame', 'Model');

/**
 * FacebookGame Test Case
 *
 */
class FacebookGameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_game',
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
		$this->FacebookGame = ClassRegistry::init('FacebookGame');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookGame);

		parent::tearDown();
	}

}
