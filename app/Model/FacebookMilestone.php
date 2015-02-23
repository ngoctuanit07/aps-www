<?php
App::uses('AppModel', 'Model');
/**
 * FacebookMilestone Model
 *
 * @property Page $Page
 * @property FacebookPhoto $FacebookPhoto
 */
class FacebookMilestone extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
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
		'FacebookPhoto' => array(
			'className' => 'FacebookPhoto',
			'joinTable' => 'facebook_photos_facebook_milestones',
			'foreignKey' => 'facebook_milestone_id',
			'associationForeignKey' => 'facebook_photo_id',
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
