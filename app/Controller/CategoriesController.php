<?php

App::uses('AppController', 'Controller');

/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {
    public $ĉomponents = array("Tools");
    /**
     * liste method
     *
     * @return void
     */
    public function liste() {
        $this->Category->recursive = 0;
        $this->set('categories', $this->paginate());
    }
    
    /**
     * listeJson method
     *
     * @return json catégories au format json pour autocomplete
     */
    public function listeJson($query=null) {
        $categories = $this->Category->find('list', array(
            'fields' => array('titre'),
            'conditions' => array('Category.titre LIKE' => "%".$_GET['query']."%")));
        $liste = array();
        foreach ($categories as $key => $value) {
            $liste[] = $value;
        }
        echo json_encode($liste);
        die;
    }

    /**
     * voir method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function voir($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
        $this->set('category', $this->Category->find('first', $options));
        App::import('Model', 'Musique');
        $Musique = new Musique;
        $this->set('musiques', $Musique->find('all', array("conditions" => array('Musique.categorie_id' => $id))));
        App::import('Model', 'Artiste');
        $Artiste = new Artiste;
        $this->set('artistes', $Artiste->find('all', array("conditions" => array('Artiste.categorie_id' => $id))));
        App::import('Model', 'Album');
        $Album = new Album;
        $this->set('albums', $Album->find('all', array("conditions" => array('Album.categorie_id' => $id))));
    }

    /**
     * ajouter method
     *
     * @return void
     */
    public function ajouter() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        }
        $users = $this->Category->User->find('list');
        $parentCategories = $this->Category->ParentCategory->find('list');
        $this->set(compact('users', 'parentCategories'));
    }

    /**
     * modifier method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function modifier($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
        }
        $users = $this->Category->User->find('list');
        $parentCategories = $this->Category->ParentCategory->find('list');
        $this->set(compact('users', 'parentCategories'));
    }

    /**
     * supprimer method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function supprimer($id = null) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('Category deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Category was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
