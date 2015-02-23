<?php
/**
 * FacebookPhotosFacebookMilestoneFixture
 *
 */
class FacebookPhotosFacebookMilestoneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'milestone_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'photo_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'facebook_photos_facebook_milestones_idx' => array('unique' => true, 'column' => array('milestone_id', 'photo_id'))
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
			'milestone_id' => 'Lorem ipsum dolor sit amet',
			'photo_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-02-23 16:11:40',
			'modified' => '2015-02-23 16:11:40'
		),
	);

}
