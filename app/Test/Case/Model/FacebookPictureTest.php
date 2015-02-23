<?php
App::uses('FacebookPicture', 'Model');

/**
 * FacebookPicture Test Case
 *
 */
class FacebookPictureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_picture',
		'app.user',
		'app.event',
		'app.album',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPicture = ClassRegistry::init('FacebookPicture');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPicture);

		parent::tearDown();
	}

}
