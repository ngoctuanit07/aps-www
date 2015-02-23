<?php
/**
 * FacebookCommentFixture
 *
 */
class FacebookCommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary'),
		'can_comment' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'can_remove' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'can_hide' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'comment_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'like_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'message' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'parent' => array('type' => 'string', 'null' => true, 'default' => null),
		'achivement_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'albums_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'comment_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'link_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'milestone_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'photo_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'post_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'status_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'video_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_comments_idx' => array('unique' => true, 'column' => 'id')
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
			'id' => 'Lorem ipsum dolor sit amet',
			'can_comment' => 1,
			'can_remove' => 1,
			'can_hide' => 1,
			'comment_count' => 1,
			'created_time' => '2015-02-23 15:55:30',
			'like_count' => 1,
			'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'parent' => 'Lorem ipsum dolor sit amet',
			'achivement_id' => 'Lorem ipsum dolor sit amet',
			'albums_id' => 'Lorem ipsum dolor sit amet',
			'comment_id' => 'Lorem ipsum dolor sit amet',
			'link_id' => 'Lorem ipsum dolor sit amet',
			'milestone_id' => 'Lorem ipsum dolor sit amet',
			'photo_id' => 'Lorem ipsum dolor sit amet',
			'post_id' => 'Lorem ipsum dolor sit amet',
			'status_id' => 'Lorem ipsum dolor sit amet',
			'user_id' => 'Lorem ipsum dolor sit amet',
			'video_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 15:55:30',
			'modified' => '2015-02-23 15:55:30'
		),
	);

}
