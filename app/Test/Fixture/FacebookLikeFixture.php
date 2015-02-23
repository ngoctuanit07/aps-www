<?php
/**
 * FacebookLikeFixture
 *
 */
class FacebookLikeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'event_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'album_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'post_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'status_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'achivement_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'comment_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'link_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'milestone_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'photo_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'video_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_likes_idx' => array('unique' => true, 'column' => 'id')
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
			'event_id' => 'Lorem ipsum dolor sit amet',
			'album_id' => 'Lorem ipsum dolor sit amet',
			'page_id' => 'Lorem ipsum dolor sit amet',
			'post_id' => 'Lorem ipsum dolor sit amet',
			'status_id' => 'Lorem ipsum dolor sit amet',
			'achivement_id' => 'Lorem ipsum dolor sit amet',
			'comment_id' => 'Lorem ipsum dolor sit amet',
			'link_id' => 'Lorem ipsum dolor sit amet',
			'milestone_id' => 'Lorem ipsum dolor sit amet',
			'photo_id' => 'Lorem ipsum dolor sit amet',
			'video_id' => 'Lorem ipsum dolor sit amet',
			'created_time' => '2015-02-23 16:05:25',
			'created' => '2015-02-23 16:05:25',
			'modified' => '2015-02-23 16:05:25'
		),
	);

}
