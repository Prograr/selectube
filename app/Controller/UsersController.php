<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
//        parent::beforeFilter();
        $this->Auth->allow('inscription', 'creer', 'facebook');
    }

    /**
     * index method
     *
     * @return void
     */
    public function liste() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function profil($pseudo = null) {
        if (is_numeric($pseudo)){
            $user = $this->User->findById($pseudo);
        }else{
            $user = $this->User->findByPseudo($pseudo);
        }
        if ($user == null) {
            throw new NotFoundException(__('Le sélecteur recherché est introuvable'));
        }
        $this->set('user', $user);
        $this->set('musiques', $this->User->Musique->find('all', array('recursive' => -1,"conditions" => array('Musique.user_id' => $user['User']['id']))));
    }

    /**
     * add method
     *
     * @return void
     */
    public function creer() {
        if ($this->request->is('post')) {
            $this->User->create();
            
            if (isset($this->request->data['name']))
                $this->request->data['pseudo'] = $this->request->data['name'];
            
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Inscription enregistrée !'), 'flash/success');
                $this->Auth->login();
//                debug($this->User);
                $this->redirect("/selecteur/profil/" . $this->Auth->user('pseudo'));
            } else {
                $this->Session->setFlash(__('Erreur lors de l\'inscription'), 'flash/error');
            }
        } 
    }

    /**
     * methode inscription
     *
     * @return void
     */
    public function inscription() {
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                // La logique est validée
                $this->set('User.email', $this->request->data('User.email'));
                $this->set('User.password', $this->request->data('User.password'));
                $this->render('creer');
            } else {
                // La logique n'est pas validée
//                $error = $this->User->validationErrors["email"][0];
//                $this->Session->setFlash($error, 'flash/error');
            }
        }
    }
    function inscriptionFacebook(){
        if($user = $this->Connect->registrationData()){
            //We have a registered user, look at it and do something with it.
            print_r($user);
        }
    }
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function editer($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Utilisateur introuvable'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Modification enregistrée'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La modification a échoué. Merci de réessayer ultérieurement.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function desinscrire($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur introuvable'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Utilisateur supprimé'), "flash/success");
            $this->redirect(array('action' => 'liste'));
        }
        $this->Session->setFlash(__('l\'Utilisateur n\'a pas été supprimé'), "flash/error");
        $this->redirect(array('action' => 'index'));
    }

    public function connexion() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->User->id = $this->Session->read('Auth.User.id');
                $this->User->saveField('lastconnect', gmdate("Y-m-d H:i:s"));
//                $this->Session->setFlash(__('Bienvenue')." ". $this->Auth->user('pseudo'), 'flash/success');
                $this->redirect($this->Auth->redirect("/selecteur/profil/" . $this->Auth->user('pseudo')));
            } else {
                $this->Session->setFlash(__('Pseudo ou mot de passe invalide, réessayez'), 'flash/error');
            }
        }
    }

    public function deconnexion() {
        if ($this->Connect->FB->getUser() !== 0) {
            $this->Connect->FB->destroysession();
            session_destroy();
        }
        $this->redirect($this->Auth->logout());
    }

}