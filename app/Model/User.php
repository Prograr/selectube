<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Album $Album
 * @property Artiste $Artiste
 * @property Category $Category
 * @property Favori $Favori
 * @property Message $Message
 * @property Moderation $Moderation
 * @property Musique $Musique
 * @property Note $Note
 * @property Site $Site
 * @property Video $Video
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'pseudo';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'pseudo' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Un pseudo est requis',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Ce pseudo est déjà utilisé par un utilisateur du site',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minLength' => array(
                'rule' => array('minLength', '4'),
                'message' => 'Le pseudo doit contenir 4 caractères minimum'
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Veuillez saisir une adresse email correcte',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Veuillez saisir une adresse email',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Cet adresse mail est déjà enregistrée sur le site',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Un mot de passe est requis',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minLength' => array(
                'rule' => array('minLength', '4'),
                'message' => 'Le mot de passe doit contenir 4 caractères minimum'
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'normal')),
                'allowEmpty' => false
            )
        ),
        'facebook_id' => array(
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

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Musique' => array(
            'className' => 'Musique',
            'foreignKey' => 'user_id',
            'dependent' => false,
        ),
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'user_id',
            'dependent' => false,
        ),
        'Artiste' => array(
            'className' => 'Artiste',
            'foreignKey' => 'user_id',
            'dependent' => false,
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'user_id',
            'dependent' => false,
        ),
        'Preference' => array(
            'className' => 'Preference',
            'foreignKey' => 'user_id',
            'dependent' => true
        )
//        'Commentaire' => array(
//            'className' => 'Commentaire',
//            'foreignKey' => 'user_id',
//            'dependent' => true,
//        ),
//        'Favori' => array(
//            'className' => 'Favori',
//            'foreignKey' => 'user_id',
//            'dependent' => true,
//        ),
//        'Message' => array(
//            'className' => 'Message',
//            'foreignKey' => 'user_id',
//            'dependent' => false,
//        ),
//        'Moderation' => array(
//            'className' => 'Moderation',
//            'foreignKey' => 'user_id',
//            'dependent' => true,
//        ),
//        'Note' => array(
//            'className' => 'Note',
//            'foreignKey' => 'user_id',
//            'dependent' => false,
//        ),
//        'Site' => array(
//            'className' => 'Site',
//            'foreignKey' => 'user_id',
//            'dependent' => false,
//        ),
//        'Video' => array(
//            'className' => 'Video',
//            'foreignKey' => 'user_id',
//            'dependent' => false,
//        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

}
