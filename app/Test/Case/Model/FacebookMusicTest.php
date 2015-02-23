<?php
App::uses('FacebookMusic', 'Model');

/**
 * FacebookMusic Test Case
 *
 */
class FacebookMusicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_music',
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
		$this->FacebookMusic = ClassRegistry::init('FacebookMusic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookMusic);

		parent::tearDown();
	}

}
