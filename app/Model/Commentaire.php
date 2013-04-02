<?php
App::uses('AppModel', 'Model');
/**
 * Commentaire Model
 *
 * @property User $User
 * @property Target $Target
 */
class Commentaire extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'commentaire';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'commentaire' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'target_type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Target' => array(
			'className' => 'User',
			'foreignKey' => 'target_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
