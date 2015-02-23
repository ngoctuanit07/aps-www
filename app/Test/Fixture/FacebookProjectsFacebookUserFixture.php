<?php
/**
 * FacebookProjectsFacebookUserFixture
 *
 */
class FacebookProjectsFacebookUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_projects_facebook_users_idx' => array('unique' => true, 'column' => array('project_id', 'user_id'))
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
			'project_id' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:14:16',
			'modified' => '2015-02-23 16:14:16'
		),
	);

}
