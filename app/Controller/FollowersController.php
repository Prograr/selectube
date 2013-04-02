<?php
App::uses('AppController', 'Controller');
/**
 * Followers Controller
 *
 * @property Follower $Follower
 */
class FollowersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Follower->recursive = 0;
		$this->set('followers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Follower->exists($id)) {
			throw new NotFoundException(__('Invalid follower'));
		}
		$options = array('conditions' => array('Follower.' . $this->Follower->primaryKey => $id));
		$this->set('follower', $this->Follower->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Follower->create();
			if ($this->Follower->save($this->request->data)) {
				$this->Session->setFlash(__('The follower has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The follower could not be saved. Please, try again.'));
			}
		}
		$suivis = $this->Follower->Suivi->find('list');
		$suiveurs = $this->Follower->Suiveur->find('list');
		$this->set(compact('suivis', 'suiveurs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Follower->exists($id)) {
			throw new NotFoundException(__('Invalid follower'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Follower->save($this->request->data)) {
				$this->Session->setFlash(__('The follower has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The follower could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Follower.' . $this->Follower->primaryKey => $id));
			$this->request->data = $this->Follower->find('first', $options);
		}
		$suivis = $this->Follower->Suivi->find('list');
		$suiveurs = $this->Follower->Suiveur->find('list');
		$this->set(compact('suivis', 'suiveurs'));
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
		$this->Follower->id = $id;
		if (!$this->Follower->exists()) {
			throw new NotFoundException(__('Invalid follower'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Follower->delete()) {
			$this->Session->setFlash(__('Follower deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Follower was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
