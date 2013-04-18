<?php

/*
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */

/**
 * CakePHP Tools
 * @author Florian Ajir <florianajir@gmail.com>
 */
class Tools extends Component {

    public $components = array();
    
    public function arrayToJson($array){
        foreach ($array as $key => $value) {
            
        }
        
        return json_encode($value);
    }

    public function initialize($controller) {
        
    }

    public function startup($controller) {
        
    }

    public function beforeRender($controller) {
        
    }

    public function shutDown($controller) {
        
    }

    public function beforeRedirect($controller, $url, $status = null, $exit = true) {
        
    }

}
