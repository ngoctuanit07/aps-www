<?php
App::uses('AppModel', 'Model');
/**
 * FacebookPhoto Model
 *
 * @property Album $Album
 * @property User $User
 * @property Page $Page
 * @property PageStory $PageStory
 * @property FacebookMilestone $FacebookMilestone
 * @property FacebookUser $FacebookUser
 */
class FacebookPhoto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PageStory' => array(
			'className' => 'PageStory',
			'foreignKey' => 'page_story_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'FacebookMilestone' => array(
			'className' => 'FacebookMilestone',
			'joinTable' => 'facebook_photos_facebook_milestones',
			'foreignKey' => 'facebook_photo_id',
			'associationForeignKey' => 'facebook_milestone_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'FacebookUser' => array(
			'className' => 'FacebookUser',
			'joinTable' => 'facebook_users_facebook_photos',
			'foreignKey' => 'facebook_photo_id',
			'associationForeignKey' => 'facebook_user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
