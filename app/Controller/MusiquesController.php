<?php
App::uses('AppController', 'Controller');
/**
 * Musiques Controller
 *
 * @property Musique $Musique
 */
class MusiquesController extends AppController {
    public $helpers = array('Youtube');
    
    public function beforeFilter() {
        parent::beforeFilter();
//        $this->Auth->allow('add');
    }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Musique->recursive = 0;
		$this->set('musiques', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Musique->exists($id)) {
			throw new NotFoundException(__('Invalid musique'));
		}
		$options = array('conditions' => array('Musique.' . $this->Musique->primaryKey => $id));
		$this->set('musique', $this->Musique->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Musique->create();
			if ($this->Musique->save($this->request->data)) {
//				$this->Session->setFlash(__('Merci'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Un bug est survenu'));
			}
		}
		$users = $this->Musique->User->find('list');
		$artistes = $this->Musique->Artiste->find('list');
		$albums = $this->Musique->Album->find('list');
		$categories = $this->Musique->Categorie->find('list');
		$this->set(compact('users', 'artistes', 'albums', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Musique->exists($id)) {
			throw new NotFoundException(__('Musique introuvable'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Musique->save($this->request->data)) {
				$this->Session->setFlash(__('Changements sauvegardés'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La musique n\'a pas été sauvegardé, Veuillez réessayer.'));
			}
		} else {
			$options = array('conditions' => array('Musique.' . $this->Musique->primaryKey => $id));
			$this->request->data = $this->Musique->find('first', $options);
		}
		$users = $this->Musique->User->find('list');
		$artistes = $this->Musique->Artiste->find('list');
		$albums = $this->Musique->Album->find('list');
		$categories = $this->Musique->Categorie->find('list');
		$this->set(compact('users', 'artistes', 'albums', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Musique->id = $id;
		if (!$this->Musique->exists()) {
			throw new NotFoundException(__('Musique introuvable'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Musique->delete()) {
			$this->Session->setFlash(__('Musique supprimée'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La musique n\'a pas été supprimée'));
		$this->redirect(array('action' => 'index'));
	}
        
        
    
    public function isAuthorized($user) {
        // Tous les users inscrits peuvent ajouter des musiques
        if ($this->action === 'add') {
            return true;
        }

        // Le propriétaire du post peut l'éditer et le supprimer
        if (in_array($this->action, array('edit', 'delete'))) {
            $musiqueId = $this->request->params['pass'][0];
            if ($this->Musique->isOwnedBy($musiqueId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}
