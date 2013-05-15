<?php

App::uses('AppModel', 'Model');

/**
 * Musique Model
 *
 * @property User $User
 * @property Artiste $Artiste
 * @property Album $Album
 * @property Categorie $Categorie
 */
class Musique extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'titre';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'titre' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'url' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'url' => array(
                'rule' => array('url'),
            ),
        )
    );

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        ),
        'Artiste' => array(
            'className' => 'Artiste',
            'foreignKey' => 'artiste_id',
        ),
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'album_id',
        ),
        'Categorie' => array(
            'className' => 'Categorie',
            'foreignKey' => 'categorie_id',
        )
    );

}
