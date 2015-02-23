<?php
App::uses('FacebookPhotosFacebookMilestone', 'Model');

/**
 * FacebookPhotosFacebookMilestone Test Case
 *
 */
class FacebookPhotosFacebookMilestoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_photos_facebook_milestone',
		'app.milestone',
		'app.photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookPhotosFacebookMilestone = ClassRegistry::init('FacebookPhotosFacebookMilestone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPhotosFacebookMilestone);

		parent::tearDown();
	}

}
