<?php
App::uses('AppModel', 'Model');
/**
 * FacebookFamily Model
 *
 * @property User $User
 * @property FamilyUser $FamilyUser
 */
class FacebookFamily extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'facebook_family';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'modified';


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
		'FamilyUser' => array(
			'className' => 'FamilyUser',
			'foreignKey' => 'family_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
