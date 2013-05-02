<?php

App::uses('AppModel', 'Model');

/**
 * Preference Model
 *
 */
class Preference extends AppModel {

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        )
    );

}
