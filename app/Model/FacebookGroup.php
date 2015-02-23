<?php
App::uses('AppModel', 'Model');
/**
 * FacebookGroup Model
 *
 * @property OwnerUser $OwnerUser
 * @property OwnerPage $OwnerPage
 * @property ParentGroup $ParentGroup
 * @property ParentPage $ParentPage
 * @property ParentUser $ParentUser
 * @property FacebookUser $FacebookUser
 */
class FacebookGroup extends AppModel {

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
		'OwnerUser' => array(
			'className' => 'OwnerUser',
			'foreignKey' => 'owner_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OwnerPage' => array(
			'className' => 'OwnerPage',
			'foreignKey' => 'owner_page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentGroup' => array(
			'className' => 'ParentGroup',
			'foreignKey' => 'parent_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentPage' => array(
			'className' => 'ParentPage',
			'foreignKey' => 'parent_page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentUser' => array(
			'className' => 'ParentUser',
			'foreignKey' => 'parent_user_id',
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
			'joinTable' => 'facebook_users_facebook_groups',
			'foreignKey' => 'facebook_group_id',
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
