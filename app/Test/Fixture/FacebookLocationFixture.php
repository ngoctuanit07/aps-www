<?php
/**
 * FacebookLocationFixture
 *
 */
class FacebookLocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'location' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_locations_idx' => array('unique' => true, 'column' => array('page_id', 'location'))
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
			'location' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:06:03',
			'modified' => '2015-02-23 16:06:03'
		),
	);

}
