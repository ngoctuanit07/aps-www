<?php
App::uses('FacebookImagesSource', 'Model');

/**
 * FacebookImagesSource Test Case
 *
 */
class FacebookImagesSourceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_images_source',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookImagesSource = ClassRegistry::init('FacebookImagesSource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookImagesSource);

		parent::tearDown();
	}

}
