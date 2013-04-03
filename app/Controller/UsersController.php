<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


    public function beforeFilter() {
        parent::beforeFilter();
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
    public function voir($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function creer() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Inscription enregistrée !'), 'flash/success');
                $this->Auth->login();
//                debug($this->User);
                $this->User->Profil->create(array(
                    "user_id" => $this->User->id,
                    "public" => true
                ));
                $this->User->Profil->save();
                $this->redirect("/profil/pseudo/".$this->Auth->user('pseudo'));
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
            $this->set('User.email', $this->request->data('User.email'));
            $this->set('User.password', $this->request->data('User.password'));
            $this->render('creer');
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
//                $this->Session->setFlash(__('Bienvenue')." ". $this->Auth->user('pseudo'), 'flash/success');
                $this->redirect($this->Auth->redirect("/profil/pseudo/".$this->Auth->user('pseudo')));
            } else {
                $this->Session->setFlash(__('Pseudo ou mot de passe invalide, réessayez'), 'flash/error');
            }
        }
    }

    public function deconnexion() {
        $this->redirect($this->Auth->logout());
    }
    
    public function facebook(){
        
        require APPLIBS.'Facebook'.DS.'facebook.php';
        $facebook = new Facebook(array(
            'appId' => '448385471909603',
            'secret' => '1fa9d5b6cf8dc5a22a7a8c4936768431'
        ));
        $user = $facebook->getUser();
        debug($user);
        
        die('Heho');
    }

}
