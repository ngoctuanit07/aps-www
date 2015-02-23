<?php
App::uses('FacebookCategory', 'Model');

/**
 * FacebookCategory Test Case
 *
 */
class FacebookCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_category',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookCategory = ClassRegistry::init('FacebookCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookCategory);

		parent::tearDown();
	}

}
