<?php
/**
 * FacebookImagesSourceFixture
 *
 */
class FacebookImagesSourceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'photo_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'height' => array('type' => 'integer', 'null' => true, 'default' => null),
		'source' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'width' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_images_sources_idx' => array('unique' => true, 'column' => 'id')
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
			'photo_id' => 'Lorem ipsum dolor sit amet',
			'height' => 1,
			'source' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'width' => 1,
			'created' => '2015-02-23 16:03:05',
			'modified' => '2015-02-23 16:03:05'
		),
	);

}
