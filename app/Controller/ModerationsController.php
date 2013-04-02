<?php
App::uses('AppController', 'Controller');
/**
 * Moderations Controller
 *
 * @property Moderation $Moderation
 */
class ModerationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Moderation->recursive = 0;
		$this->set('moderations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Moderation->exists($id)) {
			throw new NotFoundException(__('Invalid moderation'));
		}
		$options = array('conditions' => array('Moderation.' . $this->Moderation->primaryKey => $id));
		$this->set('moderation', $this->Moderation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Moderation->create();
			if ($this->Moderation->save($this->request->data)) {
				$this->Session->setFlash(__('The moderation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The moderation could not be saved. Please, try again.'));
			}
		}
		$users = $this->Moderation->User->find('list');
		$targets = $this->Moderation->Target->find('list');
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
		if (!$this->Moderation->exists($id)) {
			throw new NotFoundException(__('Invalid moderation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Moderation->save($this->request->data)) {
				$this->Session->setFlash(__('The moderation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The moderation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Moderation.' . $this->Moderation->primaryKey => $id));
			$this->request->data = $this->Moderation->find('first', $options);
		}
		$users = $this->Moderation->User->find('list');
		$targets = $this->Moderation->Target->find('list');
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
		$this->Moderation->id = $id;
		if (!$this->Moderation->exists()) {
			throw new NotFoundException(__('Invalid moderation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Moderation->delete()) {
			$this->Session->setFlash(__('Moderation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Moderation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
