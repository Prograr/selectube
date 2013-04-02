<?php
App::uses('AppModel', 'Model');
/**
 * Follower Model
 *
 * @property Suivi $Suivi
 * @property Suiveur $Suiveur
 */
class Follower extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Suivi' => array(
			'className' => 'User',
			'foreignKey' => 'suivi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Suiveur' => array(
			'className' => 'User',
			'foreignKey' => 'suiveur_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
