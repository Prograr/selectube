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
    public function liste() {
        $this->Artiste->recursive = 0;
        $this->set('artistes', $this->paginate());
    }

    /**
     * listeJson method
     *
     * @return json artistes au format json pour autocomplete
     */
    public function listeJson($query=null) {
        if ($query==null){
            $query = $_GET['query'];
        }
        $artistes = $this->Artiste->find('list', array(
            'fields' => array('nom'),
            'conditions' => array('Artiste.nom LIKE' => "%".$query."%")));
        $liste = array();
        foreach ($artistes as $key => $value) {
            $liste[] = $value;
        }
        echo json_encode($liste);
        die;
    }
    
    /**
     * listeJson method
     *
     * @return json catégories au format json pour autocomplete
     */
    public function listeAllJson() {
        
        $artistes = $this->Artiste->find('all', array(
            'fields' => array('id','nom'),
            'recursive' => -1
            ));
        $liste = array();
        foreach ($artistes as $value) {
            $liste[] = array(
                "id" => $value['Artiste']['id'],
                "name" => $value['Artiste']['nom']
            );
        }
        echo json_encode($liste);
        die;
    }
    
    /**
     * existRest method
     *
     * @return false si la catégorie n'existe pas, son id sinon
     */
    public function existRest($query=null) {
        if ($query==null){
            $query = $_GET['query'];
        }
        $exist = $this->Artiste->find('first', array(
            'recursive' => -1,
            'fields' => array('id'),
            'conditions' => array('Artiste.nom' => $query)));
        if ($exist == null)
            echo "false";
        else
            echo $exist['Artiste']['id'];
        exit;
    }
    
    /**
     * ajouter method
     *
     * @return void
     */
    public function editRest() {
        $this->log($this->request->data);
        unset($this->request->data['Artiste']['categorie']);
        if($this->request->data['Artiste']['naissance']['year'] == '') 
                $this->request->data['Artiste']['naissance']['year'] = date('Y');
        if($this->request->data['Artiste']['naissance']['month'] == '') 
                $this->request->data['Artiste']['naissance']['month'] = date('m');
        if($this->request->data['Artiste']['naissance']['day'] == '') 
                $this->request->data['Artiste']['naissance']['day'] = date('d');
        
        $this->log($this->request->data);
        $this->request->data['Artiste']['user_id'] = $this->Session->read("Auth.User.id");
        if ($this->request->data['Artiste']['id'] == 1 
                || !$this->Artiste->exists($this->request->data['Artiste']['id'])) { //Création
            unset($this->request->data['Artiste']['id']);
            $this->Artiste->create($this->request->data['Artiste']);
            if ($this->Artiste->save()) {
                echo $this->Artiste->id;
            } else {
                echo 'KO';
            }
        }else{ //Modification
            $myArtiste = $this->Artiste->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'user_id' => $this->Session->read("Auth.User.id"),
                    'id' => $this->data['Artiste']['id']
                )
            ));
            if ($myArtiste !== null || $this->Session->read("Auth.User.role") == 'admin'){
                $this->Artiste->id = $this->data['Artiste']['id'];
                if ($this->Artiste->save($this->request->data['Artiste'])) {
                    echo $this->Artiste->id;
                } else {
                    echo 'KO';
                }
            }else{
                echo 'KO';
            }
        }
        exit;
    }
    
    /**
     * voir method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function voir($id = null) {
        if (!$this->Artiste->exists($id)) {
            throw new NotFoundException(__('Artiste introuvable'));
        }
        $options = array('conditions' => array('Artiste.' . $this->Artiste->primaryKey => $id));
        $this->set('artiste', $this->Artiste->find('first', $options));
        $this->set('musiques', $this->Artiste->Musique->find('all', array("conditions" => array('Musique.artiste_id' => $id))));
    }

    /**
     * ajouter method
     *
     * @return void
     */
    public function ajouter() {
        if ($this->request->is('post')) {
            $this->Artiste->create();
            if ($this->Artiste->save($this->request->data)) {
                $this->Session->setFlash(__('L\'artiste à été enregistré'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erreur lors de l\'enregistrement.'));
            }
        }
        $artistes = $this->Artiste->Artiste->find('list');
        $users = $this->Artiste->User->find('list');
        $this->set(compact('artistes', 'users'));
    }

    /**
     * modifier method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function modifier($id = null) {
        if (!$this->Artiste->exists($id)) {
            throw new NotFoundException(__('Invalid artiste'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Artiste->save($this->request->data)) {
                $this->Session->setFlash(__('L\'artiste à été enregistré'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erreur lors de l\'enregistrement.'));
            }
        } else {
            $options = array('conditions' => array('Artiste.' . $this->Artiste->primaryKey => $id));
            $this->request->data = $this->Artiste->find('first', $options);
        }
        $artistes = $this->Artiste->Artiste->find('list');
        $users = $this->Artiste->User->find('list');
        $this->set(compact('artistes', 'users'));
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
        $this->Artiste->id = $id;
        if (!$this->Artiste->exists()) {
            throw new NotFoundException(__('Invalid artiste'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Artiste->delete()) {
            $this->Session->setFlash(__('Artiste supprimé'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Erreur lors de la suppression de l\'artiste'));
        $this->redirect(array('action' => 'index'));
    }

}
