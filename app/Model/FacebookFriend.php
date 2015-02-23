<?php
App::uses('AppModel', 'Model');
/**
 * FacebookFriend Model
 *
 * @property User $User
 * @property Friendlist $Friendlist
 */
class FacebookFriend extends AppModel {

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
		'Friendlist' => array(
			'className' => 'Friendlist',
			'foreignKey' => 'friendlist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
