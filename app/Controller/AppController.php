<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
//    public $theme = "Cakestrap";
    public $helpers = array('Html', 'Form', 'Html2', 'Facebook.Facebook' => array('locale' => 'fr_FR'));
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'connexion'
            ),
            'authError' => "Cette fonctionnalité est reservée aux utilisateurs inscrits.",
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        ),
        'Facebook.Connect' => array('model' => 'User')
    );

    public function beforeFilter() {
        $this->Auth->allow('index', 'voir', 'display', 'accueil', 'liste');
        //Get all the details on the facebook user
        try {
            $fb_user = $this->Connect->user();
            $this->set('facebookUser', $fb_user);
            $this->set('facebook_id', $fb_user['id']);
//            $this->log($fb_user);
        } catch (FacebookApiException $e) {
            $this->log('FacebookApiException : '.$e);
        }
//        if (!$this->Auth->loggedIn() && $fb_user != null && !isset($fb_user['error_code'])) {
//            $this->loadModel('User');
//            $this->User->recursive = -1;
//            $user = $this->User->find('first', array('recursive' => -1, 'conditions' => array(
//                'OR' => array( 'email' => $fb_user['email'], 'facebook_id' => $fb_user['id'] )
//            )));
//            if (!empty($user)){
//                $this->log('login selectube');
////                $this->log($user);
//                $this->Auth->login($user['User']);
//                $this->log("login :".$this->Session->read('Auth.User.id'));
//            }
//        }else if($this->Auth->loggedIn()){
//            $this->set('user', $this->Auth->user());
//        }
    }

    public function isAuthorized($user) {
        // Admin peut accéder à toute action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        // Refus par défaut
        return false;
    }

    function beforeFacebookSave() {
        try {
            $fb_user = $this->Connect->user();
        } catch (FacebookApiException $e) {
            $this->log('FacebookApiException : '.$e);
        }
        $this->loadModel('User');
        $exists = $this->User->find('first', array(
            'conditions' => array(
                'OR' => array(
                    'email' => $fb_user['email'],
                    'facebook_id' => $fb_user['id']
                )
            )
        ));

        if(!empty($exists)){
            $this->log('Mise à jour utilisateur à partir des données Facebook');
//            // do however you want to handle your update or whatever. Just make sure you fill in $FBComp->authUser['User'] which is used for authentication
            $this->Connect->authUser = $exists;
            $this->Connect->authUser['User']['facebook_id'] = $this->Connect->user('id');
            $this->Connect->authUser['User']['facebook_url'] = $this->Connect->user('link');
//            $this->Connect->authUser['User']['pseudo'] = $this->Connect->user('name');
            $this->Connect->authUser['User']['lastconnect'] = gmdate("Y-m-d H:i:s");
//
//            // do this if you want to update the record
            $this->User->id = $exists['User']['id'];
            $this->User->save($this->Connect->authUser);
//
            $this->Auth->login($this->Connect->authUser['User']);
            return false; // return false to stop creating new entry
        }
        else{
            $this->log('Création utilisateur avec les données Facebook');
//            // continue creating new entry
            $this->Connect->authUser['User']['email'] = $this->Connect->user('email');
            $this->Connect->authUser['User']['pseudo'] = $this->Connect->user('name');
            $this->Connect->authUser['User']['created'] = gmdate("Y-m-d H:i:s");
            $this->Connect->authUser['User']['lastconnect'] = gmdate("Y-m-d H:i:s");
            $this->Connect->authUser['User']['facebook_url'] = $this->Connect->user('link');
            $this->Connect->authUser['User']['facebook_id'] = $this->Connect->user('id');
            $this->User->create($this->Connect->authUser);
            $this->User->save();
            $this->Connect->authUser['User']['id'] = $this->User->id;
            $this->Auth->login($this->Connect->authUser['User']);
            return false; // return true to create new entry
        }
    }

    function afterFacebookLogin() {
        $this->log("update last connect");
        //Logic to happen after successful facebook login.
        $this->loadModel('User');
        $this->User->id = $this->Session->read('Auth.User.id');
        $this->User->saveField('lastconnect', gmdate("Y-m-d H:i:s"));
        $this->redirect("/musiques");
    }

}
