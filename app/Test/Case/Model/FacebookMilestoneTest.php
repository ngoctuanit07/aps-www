<?php
App::uses('FacebookMilestone', 'Model');

/**
 * FacebookMilestone Test Case
 *
 */
class FacebookMilestoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_milestone',
		'app.page',
		'app.facebook_photo',
		'app.facebook_photos_facebook_milestone'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookMilestone = ClassRegistry::init('FacebookMilestone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookMilestone);

		parent::tearDown();
	}

}
