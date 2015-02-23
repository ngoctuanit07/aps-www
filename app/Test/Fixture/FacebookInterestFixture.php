<?php
/**
 * FacebookInterestFixture
 *
 */
class FacebookInterestFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_interests_idx' => array('unique' => true, 'column' => array('user_id', 'page_id'))
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
			'page_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:04:50',
			'modified' => '2015-02-23 16:04:50'
		),
	);

}
