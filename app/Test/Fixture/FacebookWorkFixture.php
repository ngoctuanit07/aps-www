<?php
/**
 * FacebookWorkFixture
 *
 */
class FacebookWorkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'employer' => array('type' => 'string', 'null' => true, 'default' => null),
		'location' => array('type' => 'string', 'null' => true, 'default' => null),
		'position' => array('type' => 'string', 'null' => true, 'default' => null),
		'start_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'end_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_works_idx' => array('unique' => true, 'column' => 'id')
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
			'id' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet',
			'employer' => 'Lorem ipsum dolor sit amet',
			'location' => 'Lorem ipsum dolor sit amet',
			'position' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2015-02-23 16:22:46',
			'end_date' => '2015-02-23 16:22:46',
			'created' => '2015-02-23 16:22:46',
			'modified' => '2015-02-23 16:22:46'
		),
	);

}
