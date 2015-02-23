<?php
/**
 * AdminFixture
 *
 */
class AdminFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null),
		'username_canonical' => array('type' => 'string', 'null' => false, 'default' => null),
		'email' => array('type' => 'string', 'null' => true, 'default' => null),
		'email_canonical' => array('type' => 'string', 'null' => true, 'default' => null),
		'enabled' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'salt' => array('type' => 'string', 'null' => true, 'default' => null),
		'password' => array('type' => 'string', 'null' => false, 'default' => null),
		'last_login' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'locked' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'expired' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'expires_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'confirmation_token' => array('type' => 'string', 'null' => true, 'default' => null),
		'password_requested_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'roles' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'credentials_expired' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'credentials_expire_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status' => array('type' => 'text', 'null' => false, 'default' => null),
		'phone_number' => array('type' => 'string', 'null' => true, 'default' => null),
		'mobile_number' => array('type' => 'string', 'null' => true, 'default' => null),
		'address' => array('type' => 'string', 'null' => true, 'default' => null),
		'permission' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'admins_idx' => array('unique' => true, 'column' => 'id')
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
			'username' => 'Lorem ipsum dolor sit amet',
			'username_canonical' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'email_canonical' => 'Lorem ipsum dolor sit amet',
			'enabled' => 1,
			'salt' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'last_login' => '2015-02-23 15:47:33',
			'locked' => 1,
			'expired' => 1,
			'expires_at' => '2015-02-23 15:47:33',
			'confirmation_token' => 'Lorem ipsum dolor sit amet',
			'password_requested_at' => '2015-02-23 15:47:33',
			'roles' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'credentials_expired' => 1,
			'credentials_expire_at' => '2015-02-23 15:47:33',
			'status' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'phone_number' => 'Lorem ipsum dolor sit amet',
			'mobile_number' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'permission' => 1,
			'created' => '2015-02-23 15:47:33',
			'modified' => '2015-02-23 15:47:33'
		),
	);

}
