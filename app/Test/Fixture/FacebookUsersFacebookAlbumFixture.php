<?php
/**
 * FacebookUsersFacebookAlbumFixture
 *
 */
class FacebookUsersFacebookAlbumFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'album_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_users_facebook_albums_idx' => array('unique' => true, 'column' => array('user_id', 'album_id'))
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
			'album_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:19:28',
			'modified' => '2015-02-23 16:19:28'
		),
	);

}
