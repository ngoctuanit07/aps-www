<?php
App::uses('FacebookMovie', 'Model');

/**
 * FacebookMovie Test Case
 *
 */
class FacebookMovieTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_movie',
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
		$this->FacebookMovie = ClassRegistry::init('FacebookMovie');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookMovie);

		parent::tearDown();
	}

}
