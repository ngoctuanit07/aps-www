<?php
/**
 * TwitterUserFixture
 *
 */
class TwitterUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'name' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'profile_image_url' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'created_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'location' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'favourites_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'listed_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'followers_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'verified' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'geo_enabled' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'time_zone' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'statuses_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'friends_count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'following' => array('type' => 'integer', 'null' => true, 'default' => null),
		'screen_name' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'twitter_users_idx' => array('unique' => true, 'column' => 'id')
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
			'id' => '',
			'user_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'profile_image_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_at' => '2015-02-23 16:25:40',
			'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'favourites_count' => 1,
			'listed_count' => 1,
			'followers_count' => 1,
			'verified' => 1,
			'geo_enabled' => 1,
			'time_zone' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'statuses_count' => 1,
			'friends_count' => 1,
			'following' => 1,
			'screen_name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2015-02-23 16:25:40',
			'modified' => '2015-02-23 16:25:40'
		),
	);

}
