<?php
/**
 * FacebookPhotoFixture
 *
 */
class FacebookPhotoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary'),
		'album_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'backdated_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'backdated_time_granularity' => array('type' => 'text', 'null' => true, 'default' => null),
		'created_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'height' => array('type' => 'integer', 'null' => true, 'default' => null),
		'icon' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'link' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'name' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'page_story_id' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'picture' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'place' => array('type' => 'string', 'null' => true, 'default' => null),
		'position' => array('type' => 'integer', 'null' => true, 'default' => null),
		'source' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'updated_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'width' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_photos_idx' => array('unique' => true, 'column' => 'id')
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
			'album_id' => 'Lorem ipsum dolor sit amet',
			'backdated_time' => '2015-02-23 16:11:21',
			'backdated_time_granularity' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_time' => '2015-02-23 16:11:21',
			'user_id' => 'Lorem ipsum dolor sit amet',
			'page_id' => 'Lorem ipsum dolor sit amet',
			'height' => 1,
			'icon' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'link' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'page_story_id' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'picture' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'place' => 'Lorem ipsum dolor sit amet',
			'position' => 1,
			'source' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'updated_time' => '2015-02-23 16:11:21',
			'width' => 1,
			'created' => '2015-02-23 16:11:21',
			'modified' => '2015-02-23 16:11:21'
		),
	);

}
