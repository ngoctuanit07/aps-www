<?php
App::uses('AppModel', 'Model');
/**
 * FacebookImagesSource Model
 *
 * @property Photo $Photo
 */
class FacebookImagesSource extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'photo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
