<?php
App::uses('AppModel', 'Model');
/**
 * FacebookPostsPrivacy Model
 *
 * @property Post $Post
 */
class FacebookPostsPrivacy extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'facebook_posts_privacy';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
