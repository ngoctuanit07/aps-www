<?php
/**
 * FacebookSharedpostFixture
 *
 */
class FacebookSharedpostFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'sharing_post' => array('type' => 'string', 'null' => true, 'default' => null),
		'album_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'video_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'status_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'post_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_sharedposts_idx' => array('unique' => true, 'column' => 'id')
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
			'sharing_post' => 'Lorem ipsum dolor sit amet',
			'album_id' => 'Lorem ipsum dolor sit amet',
			'video_id' => 'Lorem ipsum dolor sit amet',
			'status_id' => 'Lorem ipsum dolor sit amet',
			'post_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:14:33',
			'modified' => '2015-02-23 16:14:33'
		),
	);

}
