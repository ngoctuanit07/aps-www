<?php
/**
 * FacebookFriendFixture
 *
 */
class FacebookFriendFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'friend' => array('type' => 'string', 'null' => true, 'default' => null),
		'still_friend' => array('type' => 'boolean', 'null' => true, 'default' => true),
		'friendlist_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_friends_idx' => array('unique' => true, 'column' => array('user_id', 'friend', 'friendlist_id'))
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
			'friend' => 'Lorem ipsum dolor sit amet',
			'still_friend' => 1,
			'friendlist_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 15:59:23',
			'modified' => '2015-02-23 15:59:23'
		),
	);

}
