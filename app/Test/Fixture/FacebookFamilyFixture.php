<?php
/**
 * FacebookFamilyFixture
 *
 */
class FacebookFamilyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'facebook_family';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'family_user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'relationship' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_family_idx' => array('unique' => true, 'column' => array('user_id', 'family_user_id'))
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
			'family_user_id' => 'Lorem ipsum dolor sit amet',
			'relationship' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2015-02-23 15:58:18',
			'modified' => '2015-02-23 15:58:18'
		),
	);

}
