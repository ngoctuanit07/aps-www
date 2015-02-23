<?php
/**
 * FacebookConcentrationFixture
 *
 */
class FacebookConcentrationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'education_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'page_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_concentrations_idx' => array('unique' => true, 'column' => 'id')
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
			'education_id' => 1,
			'page_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 15:55:55',
			'modified' => '2015-02-23 15:55:55'
		),
	);

}
