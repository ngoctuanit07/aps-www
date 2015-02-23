<?php
App::uses('FacebookAchievement', 'Model');

/**
 * FacebookAchievement Test Case
 *
 */
class FacebookAchievementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_achievement',
		'app.user',
		'app.application'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookAchievement = ClassRegistry::init('FacebookAchievement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookAchievement);

		parent::tearDown();
	}

}
