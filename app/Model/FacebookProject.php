<?php
App::uses('AppModel', 'Model');
/**
 * FacebookProject Model
 *
 * @property FacebookUser $FacebookUser
 */
class FacebookProject extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'FacebookUser' => array(
			'className' => 'FacebookUser',
			'joinTable' => 'facebook_projects_facebook_users',
			'foreignKey' => 'facebook_project_id',
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
