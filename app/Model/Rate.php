<?php
App::uses('AppModel', 'Model');
/**
 * Rate Model
 *
 * @property TwitterStatus $TwitterStatus
 * @property FacebookPost $FacebookPost
 * @property FacebookStatus $FacebookStatus
 * @property FacebookLink $FacebookLink
 * @property FacebookComment $FacebookComment
 */
class Rate extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TwitterStatus' => array(
			'className' => 'TwitterStatus',
			'foreignKey' => 'twitter_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FacebookPost' => array(
			'className' => 'FacebookPost',
			'foreignKey' => 'facebook_post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FacebookStatus' => array(
			'className' => 'FacebookStatus',
			'foreignKey' => 'facebook_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FacebookLink' => array(
			'className' => 'FacebookLink',
			'foreignKey' => 'facebook_link_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FacebookComment' => array(
			'className' => 'FacebookComment',
			'foreignKey' => 'facebook_comment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
