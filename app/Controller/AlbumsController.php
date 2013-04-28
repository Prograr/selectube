<?php

App::uses('AppController', 'Controller');

/**
 * Albums Controller
 *
 * @property Album $Album
 */
class AlbumsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function liste() {
        $this->Album->recursive = 0;
        $this->set('albums', $this->paginate());
    }
    
    /**
     * listeJson method
     *
     * @return json albums au format json pour autocomplete
     */
    public function listeJson($query=null) {
        if ($query==null){
            $query = $_GET['query'];
        }
        $albums = $this->Album->find('list', array(
            'fields' => array('titre'),
            'conditions' => array('Album.titre LIKE' => "%".$query."%")));
        $liste = array();
        foreach ($albums as $key => $value) {
            $liste[] = $value;
        }
        echo json_encode($liste);
        die;
    }
    
    /**
     * listeJson method
     *
     * @return json albums au format json pour autocomplete
     */
    public function listeAllJson() {
        
        $albums = $this->Album->find('all', array(
            'fields' => array('id','titre'),
            'recursive' => -1
            ));
        $liste = array();
        foreach ($albums as $value) {
            $liste[] = array(
                "id" => $value['Album']['id'],
                "titre" => $value['Album']['titre']
            );
        }
        echo json_encode($liste);
        die;
    }
    
    /**
     * existRest method
     *
     * @return false si l'album n'existe pas, son id sinon
     */
    public function existRest($query=null) {
        if ($query==null){
            $query = $_GET['query'];
        }
        $exist = $this->Album->find('first', array(
            'recursive' => -1,
            'fields' => array('id'),
            'conditions' => array('Album.titre' => $query)));
        if ($exist == null)
            echo "false";
        else
            echo $exist['Album']['id'];
        exit;
    }
    
    /**
     * ajouter method
     *
     * @return void
     */
    public function editRest() {
        unset($this->request->data['Album']['categorie']);
        unset($this->request->data['Album']['artiste']);
        
        if($this->request->data['Album']['sortie']['year'] == '') 
                $this->request->data['Album']['sortie']['year'] = date('Y');
        if($this->request->data['Album']['sortie']['month'] == '') 
                $this->request->data['Album']['sortie']['month'] = date('m');
        if($this->request->data['Album']['sortie']['day'] == '') 
                $this->request->data['Album']['sortie']['day'] = date('d');
        
        $this->request->data['Album']['user_id'] = $this->Session->read("Auth.User.id");
        if ($this->request->data['Album']['id'] == 1
                || !$this->Album->exists($this->request->data['Album']['id'])) { //Création
            unset($this->request->data['Album']['id']);
            $this->Album->create($this->request->data['Album']);
            if ($this->Album->save()) {
                echo $this->Album->id;
            } else {
                echo 'KO';
            }
        }else{ //Modification
            $myAlbum = $this->Album->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'user_id' => $this->Session->read("Auth.User.id"),
                    'id' => $this->data['Album']['id']
                )
            ));
            if ($myAlbum !== null || $this->Session->read("Auth.User.role") == 'admin'){
                $this->Album->id = $this->data['Album']['id'];
                if ($this->Album->save($this->request->data['Album'])) {
                    echo $this->Album->id;
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
        if (!$this->Album->exists($id)) {
            throw new NotFoundException(__('Invalid album'));
        }
        $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
        $this->set('album', $this->Album->find('first', $options));
        $this->set('musiques', $this->Album->Musique->find('all', array("conditions" => array('Musique.album_id' => $id))));
    }

    /**
     * ajouter method
     *
     * @return void
     */
    public function ajouter() {
        if ($this->request->is('post')) {
            $this->Album->create();
            if ($this->Album->save($this->request->data)) {
                $this->Session->setFlash(__('The album has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
            }
        }
        $artistes = $this->Album->Artiste->find('list');
        $categories = $this->Album->Categorie->find('list');
        $users = $this->Album->User->find('list');
        $this->set(compact('artistes', 'categories', 'users'));
    }

    /**
     * modifier method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function modifier($id = null) {
        if (!$this->Album->exists($id)) {
            throw new NotFoundException(__('Invalid album'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Album->save($this->request->data)) {
                $this->Session->setFlash(__('The album has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
            $this->request->data = $this->Album->find('first', $options);
        }
        $artistes = $this->Album->Artiste->find('list');
        $categories = $this->Album->Categorie->find('list');
        $users = $this->Album->User->find('list');
        $this->set(compact('artistes', 'categories', 'users'));
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
        $this->Album->id = $id;
        if (!$this->Album->exists()) {
            throw new NotFoundException(__('Invalid album'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Album->delete()) {
            $this->Session->setFlash(__('Album deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Album was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
