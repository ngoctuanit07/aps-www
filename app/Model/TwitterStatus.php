<?php
App::uses('AppModel', 'Model');
/**
 * TwitterStatus Model
 *
 * @property User $User
 * @property InReplyToUser $InReplyToUser
 * @property InReplyToStatus $InReplyToStatus
 * @property Rate $Rate
 */
class TwitterStatus extends AppModel {


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
		'InReplyToUser' => array(
			'className' => 'InReplyToUser',
			'foreignKey' => 'in_reply_to_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InReplyToStatus' => array(
			'className' => 'InReplyToStatus',
			'foreignKey' => 'in_reply_to_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Rate' => array(
			'className' => 'Rate',
			'foreignKey' => 'twitter_status_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
