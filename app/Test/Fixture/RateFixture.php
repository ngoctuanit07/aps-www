<?php
/**
 * RateFixture
 *
 */
class RateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'twitter_status_id' => array('type' => 'decimal', 'null' => true, 'default' => null),
		'facebook_post_id' => array('type' => 'text', 'null' => true, 'default' => null),
		'facebook_status_id' => array('type' => 'text', 'null' => true, 'default' => null),
		'facebook_link_id' => array('type' => 'text', 'null' => true, 'default' => null),
		'facebook_comment_id' => array('type' => 'text', 'null' => true, 'default' => null),
		'rate' => array('type' => 'integer', 'null' => true, 'default' => null),
		'anorexia' => array('type' => 'integer', 'null' => true, 'default' => null),
		'depression' => array('type' => 'integer', 'null' => true, 'default' => null),
		'harassment' => array('type' => 'integer', 'null' => true, 'default' => null),
		'uncategorized' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
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
			'twitter_status_id' => '',
			'facebook_post_id' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'facebook_status_id' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'facebook_link_id' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'facebook_comment_id' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'rate' => 1,
			'anorexia' => 1,
			'depression' => 1,
			'harassment' => 1,
			'uncategorized' => 1,
			'created' => '2015-02-23 16:23:54',
			'modified' => '2015-02-23 16:23:54'
		),
	);

}
