<?php
/**
 * FacebookAchievementFixture
 *
 */
class FacebookAchievementFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'publish_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'application_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'no_feed_story' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'facebook_achievements_idx' => array('unique' => true, 'column' => 'id')
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
			'publish_time' => '2015-02-23 15:47:51',
			'application_id' => 'Lorem ipsum dolor sit amet',
			'no_feed_story' => 1,
			'created' => '2015-02-23 15:47:51',
			'modified' => '2015-02-23 15:47:51'
		),
	);

}
