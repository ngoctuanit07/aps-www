<?php
/**
 * TwitterFriendshipFixture
 *
 */
class TwitterFriendshipFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'decimal', 'null' => true, 'default' => null),
		'friend' => array('type' => 'decimal', 'null' => true, 'default' => null),
		'still_friend' => array('type' => 'boolean', 'null' => true, 'default' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'twitter_friendships_idx' => array('unique' => true, 'column' => array('user_id', 'friend'))
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
			'user_id' => '',
			'friend' => '',
			'still_friend' => 1,
			'created' => '2015-02-23 16:25:07',
			'modified' => '2015-02-23 16:25:07'
		),
	);

}
