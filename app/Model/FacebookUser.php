<?php
App::uses('AppModel', 'Model');
/**
 * FacebookUser Model
 *
 * @property User $User
 * @property ThirdParty $ThirdParty
 * @property FacebookProject $FacebookProject
 * @property FacebookAlbum $FacebookAlbum
 * @property FacebookEvent $FacebookEvent
 * @property FacebookGroup $FacebookGroup
 * @property FacebookPhoto $FacebookPhoto
 * @property FacebookVideo $FacebookVideo
 */
class FacebookUser extends AppModel {

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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ThirdParty' => array(
			'className' => 'ThirdParty',
			'foreignKey' => 'third_party_id',
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
		'FacebookProject' => array(
			'className' => 'FacebookProject',
			'joinTable' => 'facebook_projects_facebook_users',
			'foreignKey' => 'facebook_user_id',
			'associationForeignKey' => 'facebook_project_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'FacebookAlbum' => array(
			'className' => 'FacebookAlbum',
			'joinTable' => 'facebook_users_facebook_albums',
			'foreignKey' => 'facebook_user_id',
			'associationForeignKey' => 'facebook_album_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'FacebookEvent' => array(
			'className' => 'FacebookEvent',
			'joinTable' => 'facebook_users_facebook_events',
			'foreignKey' => 'facebook_user_id',
			'associationForeignKey' => 'facebook_event_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'FacebookGroup' => array(
			'className' => 'FacebookGroup',
			'joinTable' => 'facebook_users_facebook_groups',
			'foreignKey' => 'facebook_user_id',
			'associationForeignKey' => 'facebook_group_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'FacebookPhoto' => array(
			'className' => 'FacebookPhoto',
			'joinTable' => 'facebook_users_facebook_photos',
			'foreignKey' => 'facebook_user_id',
			'associationForeignKey' => 'facebook_photo_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'FacebookVideo' => array(
			'className' => 'FacebookVideo',
			'joinTable' => 'facebook_users_facebook_videos',
			'foreignKey' => 'facebook_user_id',
			'associationForeignKey' => 'facebook_video_id',
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
