<?php
/**
 * FacebookUsersFacebookPhotoFixture
 *
 */
class FacebookUsersFacebookPhotoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'photo_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_users_facebook_photos_idx' => array('unique' => true, 'column' => array('user_id', 'photo_id'))
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
			'photo_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:21:33',
			'modified' => '2015-02-23 16:21:33'
		),
	);

}
