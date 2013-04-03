<?php
App::uses('AppController', 'Controller');
/**
 * Profils Controller
 *
 * @property Profil $Profil
 */
class ProfilsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
//		$this->Profil->recursive = 0;
//		$this->set('profils', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function voir($id = null) {
		if (!$this->Profil->exists($id)) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$options = array('conditions' => array('Profil.'.$this->Profil->primaryKey => $id));
		$this->set('profil', $this->Profil->find('first', $options));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $userId
 * @return void
 */
	public function user($userId = null) {
		if (!$this->Profil->User->exists($userId)) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$options = array('conditions' => array('Profil.user_id' => $userId));
		$this->set('profil', $this->Profil->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $userPseudo
 * @return void
 */
	public function pseudo($userPseudo = null) {
		$options = array('conditions' => array('User.pseudo' => $userPseudo));
                $user =  $this->Profil->User->find('first', $options);
		if ($user == null) {
			throw new NotFoundException(__('Profil introuvable'));
		}
                $profil = $this->Profil->find('first', array('conditions'=> array('Profil.user_id' => $user['User']['id'])));
		$this->set('profil', $profil);
                $this->render("view");
	}
/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Profil->create();
//			if ($this->Profil->save($this->request->data)) {
//				$this->Session->setFlash(__('The profil has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The profil could not be saved. Please, try again.'));
//			}
//		}
//		$users = $this->Profil->User->find('list');
//		$this->set(compact('users'));
//	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editer($id = null) {
		if (!$this->Profil->exists($id)) {
			throw new NotFoundException(__('Profil introuvable'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Profil->save($this->request->data)) {
				$this->Session->setFlash(__('Le profil a été sauvegardé'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Une erreur a eu lieu pendant la sauvegarde'));
			}
		} else {
			$options = array('conditions' => array('Profil.' . $this->Profil->primaryKey => $id));
			$this->request->data = $this->Profil->find('first', $options);
		}
		$user = $this->Profil->User->find('first');
		$this->set(compact('user'));
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
		$this->Profil->id = $id;
		if (!$this->Profil->exists()) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Profil->delete()) {
			$this->Session->setFlash(__('Profil deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Profil was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
