<?php
/**
 * FacebookTagFixture
 *
 */
class FacebookTagFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'facebook_tag';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'photo_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'name' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'created_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'tagging_user' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_tag_idx' => array('unique' => true, 'column' => array('photo_id', 'user_id'))
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
			'photo_id' => 'Lorem ipsum dolor sit amet',
			'user_id' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_time' => '2015-02-23 16:15:17',
			'tagging_user' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:15:17',
			'modified' => '2015-02-23 16:15:17'
		),
	);

}
