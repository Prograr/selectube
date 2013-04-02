<?php
App::uses('AppController', 'Controller');
/**
 * Favoris Controller
 *
 * @property Favori $Favori
 */
class FavorisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Favori->recursive = 0;
		$this->set('favoris', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Favori->exists($id)) {
			throw new NotFoundException(__('Invalid favori'));
		}
		$options = array('conditions' => array('Favori.' . $this->Favori->primaryKey => $id));
		$this->set('favori', $this->Favori->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Favori->create();
			if ($this->Favori->save($this->request->data)) {
				$this->Session->setFlash(__('The favori has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favori could not be saved. Please, try again.'));
			}
		}
		$users = $this->Favori->User->find('list');
		$targets = $this->Favori->Target->find('list');
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
		if (!$this->Favori->exists($id)) {
			throw new NotFoundException(__('Invalid favori'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Favori->save($this->request->data)) {
				$this->Session->setFlash(__('The favori has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favori could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favori.' . $this->Favori->primaryKey => $id));
			$this->request->data = $this->Favori->find('first', $options);
		}
		$users = $this->Favori->User->find('list');
		$targets = $this->Favori->Target->find('list');
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
		$this->Favori->id = $id;
		if (!$this->Favori->exists()) {
			throw new NotFoundException(__('Invalid favori'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Favori->delete()) {
			$this->Session->setFlash(__('Favori deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Favori was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
