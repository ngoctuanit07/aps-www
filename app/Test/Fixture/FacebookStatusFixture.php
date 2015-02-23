<?php
/**
 * FacebookStatusFixture
 *
 */
class FacebookStatusFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'group_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'event_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'application_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'message' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'place' => array('type' => 'string', 'null' => true, 'default' => null),
		'updated_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_statuses_idx' => array('unique' => true, 'column' => 'id')
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
			'page_id' => 'Lorem ipsum dolor sit amet',
			'group_id' => 'Lorem ipsum dolor sit amet',
			'event_id' => 'Lorem ipsum dolor sit amet',
			'application_id' => 'Lorem ipsum dolor sit amet',
			'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'place' => 'Lorem ipsum dolor sit amet',
			'updated_time' => '2015-02-23 16:14:59',
			'created' => '2015-02-23 16:14:59',
			'modified' => '2015-02-23 16:14:59'
		),
	);

}
