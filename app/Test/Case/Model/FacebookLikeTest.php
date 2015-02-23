<?php
App::uses('FacebookLike', 'Model');

/**
 * FacebookLike Test Case
 *
 */
class FacebookLikeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_like',
		'app.user',
		'app.event',
		'app.album',
		'app.page',
		'app.post',
		'app.status',
		'app.achivement',
		'app.comment',
		'app.link',
		'app.milestone',
		'app.photo',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookLike = ClassRegistry::init('FacebookLike');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookLike);

		parent::tearDown();
	}

}
