<?php
App::uses('AppController', 'Controller');
/**
 * Artistes Controller
 *
 * @property Artiste $Artiste
 */
class ArtistesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Artiste->recursive = 0;
		$this->set('artistes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Artiste->exists($id)) {
			throw new NotFoundException(__('Invalid artiste'));
		}
		$options = array('conditions' => array('Artiste.' . $this->Artiste->primaryKey => $id));
		$this->set('artiste', $this->Artiste->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Artiste->create();
			if ($this->Artiste->save($this->request->data)) {
				$this->Session->setFlash(__('The artiste has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artiste could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Artiste->Categorie->find('list');
		$users = $this->Artiste->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Artiste->exists($id)) {
			throw new NotFoundException(__('Invalid artiste'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artiste->save($this->request->data)) {
				$this->Session->setFlash(__('The artiste has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artiste could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Artiste.' . $this->Artiste->primaryKey => $id));
			$this->request->data = $this->Artiste->find('first', $options);
		}
		$categories = $this->Artiste->Categorie->find('list');
		$users = $this->Artiste->User->find('list');
		$this->set(compact('categories', 'users'));
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
		$this->Artiste->id = $id;
		if (!$this->Artiste->exists()) {
			throw new NotFoundException(__('Invalid artiste'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Artiste->delete()) {
			$this->Session->setFlash(__('Artiste deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artiste was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
