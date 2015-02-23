<?php
/**
 * FacebookUsersFacebookGroupFixture
 *
 */
class FacebookUsersFacebookGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'group_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'administrator' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_users_facebook_groups_idx' => array('unique' => true, 'column' => array('user_id', 'group_id'))
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
			'user_id' => 'Lorem ipsum dolor sit amet',
			'group_id' => 'Lorem ipsum dolor sit amet',
			'administrator' => 1,
			'created' => '2015-02-23 16:20:39',
			'modified' => '2015-02-23 16:20:39'
		),
	);

}
