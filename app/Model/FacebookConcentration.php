<?php
App::uses('AppModel', 'Model');
/**
 * FacebookConcentration Model
 *
 * @property Education $Education
 * @property Page $Page
 */
class FacebookConcentration extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'education_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Education' => array(
			'className' => 'Education',
			'foreignKey' => 'education_id',
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
