<?php
App::uses('AppModel', 'Model');
/**
 * FacebookAlbum Model
 *
 * @property User $User
 * @property FacebookUser $FacebookUser
 */
class FacebookAlbum extends AppModel {

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
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'FacebookUser' => array(
			'className' => 'FacebookUser',
			'joinTable' => 'facebook_users_facebook_albums',
			'foreignKey' => 'facebook_album_id',
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
