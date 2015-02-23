<?php
/**
 * FacebookCategoryFixture
 *
 */
class FacebookCategoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'category' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_categories_ixd' => array('unique' => true, 'column' => array('page_id', 'category'))
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'page_id' => 'Lorem ipsum dolor sit amet',
			'category' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 15:54:40',
			'modified' => '2015-02-23 15:54:40'
		),
	);

}
