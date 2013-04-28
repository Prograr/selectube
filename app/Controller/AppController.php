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
        $this->set('facebookUser', $this->Connect->user());
        $this->set('facebook_id', $this->Connect->user('id'));
        try {
            $user = $this->Auth->user();
            $this->set('user', $user);
            $fb_user = $this->Connect->user();
//                debug($fb_user);
        } catch (FacebookApiException $e) {
            debug($e);
        }
        if (!$this->Auth->loggedIn() && $fb_user != null && !isset($fb_user['error_code'])) {
            $this->loadModel('User');
            $this->User->recursive = -1;
            $user = $this->User->findByFacebookId($fb_user['id']);
            if ($user != null){
                $this->Auth->login($user['User']);
            }else{
                $user = $this->User->findByEmail($fb_user['email']);
                if ($user != null){
                    $this->Auth->login($user['User']);
                }
            }
        }
//                debug($this->Session->read('Auth.User'));
    }

    public function isAuthorized($user) {
        // Admin peut accéder à toute action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Refus par défaut
        return false;
    }

    //Add an email field to be saved along with creation.
    function beforeFacebookSave() {
        $this->loadModel('User');
        $exists = $this->User->find('first', array(
            'conditions' => array(
                'OR' => array(
                    'email' => $this->Connect->user('email')
                )
            )
        ));

        if(!empty($exists)){
            // do however you want to handle your update or whatever. Just make sure you fill in $FBComp->authUser['User'] which is used for authentication
            $this->Connect->authUser = $exists;
            $this->Connect->authUser['User']['facebook_id'] = $this->Connect->user('id');

            // do this if you want to update the record
//            $this->id = $exists['User'][$this->primaryKey];
//            $this->save($this->Connect->authUser);

            return false; // return false to stop creating new entry
        }
        else{
            // continue creating new entry
            $this->Connect->authUser['User']['email'] = $this->Connect->user('email');
            $this->Connect->authUser['User']['pseudo'] = $this->Connect->user('name');
            $this->Connect->authUser['User']['created'] = gmdate("Y-m-d H:i:s");
            $this->Connect->authUser['User']['facebook_url'] = $this->Connect->user('link');
            $this->Connect->authUser['User']['facebook_id'] = $this->Connect->user('id');
            return true; // return true to create new entry
        }
        return true; //Must return true or will not save.
    }

    function beforeFacebookLogin($user) {
        //Logic to happen before a facebook login
        $this->log($user);
    }

    function afterFacebookLogin() {
        //Logic to happen after successful facebook login.
        $this->log("Facebook login. redirect");
        $this->redirect($this->Auth->loginRedirect);
    }

}
