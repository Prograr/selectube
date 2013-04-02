<?php
App::uses('AppController', 'Controller');
/**
 * Commentaires Controller
 *
 * @property Commentaire $Commentaire
 */
class CommentairesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Commentaire->recursive = 0;
		$this->set('commentaires', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Commentaire->exists($id)) {
			throw new NotFoundException(__('Invalid commentaire'));
		}
		$options = array('conditions' => array('Commentaire.' . $this->Commentaire->primaryKey => $id));
		$this->set('commentaire', $this->Commentaire->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Commentaire->create();
			if ($this->Commentaire->save($this->request->data)) {
				$this->Session->setFlash(__('The commentaire has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commentaire could not be saved. Please, try again.'));
			}
		}
		$users = $this->Commentaire->User->find('list');
		$targets = $this->Commentaire->Target->find('list');
		$this->set(compact('users', 'targets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Commentaire->exists($id)) {
			throw new NotFoundException(__('Invalid commentaire'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Commentaire->save($this->request->data)) {
				$this->Session->setFlash(__('The commentaire has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commentaire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Commentaire.' . $this->Commentaire->primaryKey => $id));
			$this->request->data = $this->Commentaire->find('first', $options);
		}
		$users = $this->Commentaire->User->find('list');
		$targets = $this->Commentaire->Target->find('list');
		$this->set(compact('users', 'targets'));
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
		$this->Commentaire->id = $id;
		if (!$this->Commentaire->exists()) {
			throw new NotFoundException(__('Invalid commentaire'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Commentaire->delete()) {
			$this->Session->setFlash(__('Commentaire deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Commentaire was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
