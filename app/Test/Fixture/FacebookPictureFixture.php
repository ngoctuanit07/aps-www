<?php
/**
 * FacebookPictureFixture
 *
 */
class FacebookPictureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'event_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'album_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'url' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'is_silhouette' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'height' => array('type' => 'integer', 'null' => true, 'default' => null),
		'width' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_pictures_idx' => array('unique' => true, 'column' => 'id')
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
			'user_id' => 'Lorem ipsum dolor sit amet',
			'event_id' => 'Lorem ipsum dolor sit amet',
			'album_id' => 'Lorem ipsum dolor sit amet',
			'page_id' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'is_silhouette' => 1,
			'height' => 1,
			'width' => 1,
			'created_time' => '2015-02-23 16:11:59',
			'created' => '2015-02-23 16:11:59',
			'modified' => '2015-02-23 16:11:59'
		),
	);

}
