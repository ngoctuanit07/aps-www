<?php
/**
 * FacebookMilestoneFixture
 *
 */
class FacebookMilestoneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'created_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'start_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'end_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_milestones_idx' => array('unique' => true, 'column' => 'id')
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
			'title' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'page_id' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_time' => '2015-02-23 16:07:04',
			'updated_time' => '2015-02-23 16:07:04',
			'start_time' => '2015-02-23 16:07:04',
			'end_time' => '2015-02-23 16:07:04',
			'created' => '2015-02-23 16:07:04',
			'modified' => '2015-02-23 16:07:04'
		),
	);

}
