<?php
App::uses('AppModel', 'Model');
/**
 * FacebookTelevision Model
 *
 * @property User $User
 * @property Page $Page
 */
class FacebookTelevision extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'facebook_television';

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
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
