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
        'Facebook.Connect',
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
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('index', 'voir', 'display', 'accueil', 'liste');
//        $this->Auth->authorize("display");
        //Get all the details on the facebook user
        $this->set('facebookUser', $this->Connect->user());
        $this->set('user', $this->Auth->user());

        //retrieve only the id from the facebook user
        $this->set('facebook_id', $this->Connect->user('id'));

        //retrieve only the email from the facebook user
        $this->set('facebook_email', $this->Connect->user('email'));
        $this->set('facebook_prenom', $this->Connect->user('first_name'));
        $this->set('facebook_nom', $this->Connect->user('last_name'));
        try {
            $user = $this->Auth->user();
            $fb_user = $this->Connect->user();
        } catch (FacebookApiException $e) {
            
        }
        if ($fb_user = $this->Connect->user()) {
            if (!$this->Auth->loggedIn()) {
                if (!isset($fb_user['error_code'])) {
                    $this->loadModel('User');
                    $this->User->recursive = -1;
                    if (($user = $this->User->findByFacebookId($fb_user['id'])) ||
                            ($user = $this->User->findByEmail($fb_user['email']))) {
                        $this->Auth->login($user);
                    }
                }
            }
        }
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
        $this->Connect->authUser['User']['email'] = $this->Connect->user('email');
        return true; //Must return true or will not save.
    }

    function beforeFacebookLogin($user) {
        //Logic to happen before a facebook login
        $this->log($user);
    }

    function afterFacebookLogin() {
        //Logic to happen after successful facebook login.
        $this->redirect($this->Auth->loginRedirect);
    }

}
