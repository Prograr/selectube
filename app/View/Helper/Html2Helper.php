<?php

/**
 * CakePHP Html2Helper
 * @author Florian Ajir <florianajir@gmail.com>
 */
class Html2Helper extends AppHelper {

    public $helpers = array('Html', 'Form', 'Youtube');
    
    public function media($media, $creator, $infosSup, $child = null){
        $block = $this->Html->tag('div', null, array('class' => 'media'));
            $block .= $this->Html->link(
                    $this->Youtube->thumbnail($media['url'], 'thumb',array('class' => 'media-object', 'data-src' => $media['url'])),
                    "/musiques/voir/".$media['id'], 
                    array('class' => 'pull-left', 'escape'=>false));
            $block .= $this->Html->tag('div', null, array('class' => 'media-body'));
            
                 $block .=   $this->Html->tag('h4', $this->Html->link(
                         $media['titre'],
                    "/musiques/voir/".$media['id'], 
                    array( 'escape'=>false)), array('class' => 'media-heading'));
                 
                $block .= "<p>".$infosSup."</p>";
                $block .= "<p class='media-footer'><i class='icon-info-sign'></i> Sélectionné par : ". $this->Html->link(
                    "<i class='icon-user'></i> ".$creator,
                    "/profil/pseudo/".$creator, 
                    array('escape'=>false))." le ". date_format(new DateTime($media['created']), "d/m/Y") .".</p>";
                if ($child != null){
                    $block .= $child;
                }
            $block .= $this->Html->tag('/div', null);
        $block .= $this->Html->tag('/div', null);
        return $block;
    }
    
    public function email($options = array()){
        $default_options=array(
            'label'=>'Adresse e-mail',
            'fieldName'=>'email',
            'id'=>'email',
            'value'=>'');
        
        $options = array_merge($default_options,$options);
        
        $input = $this->Html->tag("div", null, array('class' => 'input-prepend'));
        $input .= $this->Html->tag("label", $options['label'], array('for' => $options['id']));
        $input .= $this->Html->tag("label", '@', array('class' => 'add-on', 'for' => $options['id']));
        $input .= $this->Form->input($options['fieldName'], array('id' => $options['id'], 'class' => 'add-on', "placeholder" => $options['label'], 'value'=>$options['value'], 'label'=> false, 'div' => false));
        $input .= $this->Html->tag("/div", null);

        return $input;
    }
    
    public function password($options = array()){
        $default_options=array(
            'label'=>'Mot de passe',
            'fieldName'=>'password',
            'id'=>'password');
        $options = array_merge($default_options,$options);
        
        $input = $this->Html->tag("div", null, array('class' => 'input-prepend'));
        $input .= $this->Html->tag("label", $options['label'], array('for' => $options['id']));
        $input .= $this->Html->tag("label", '<i class="icon-lock"></i> ', array('class' => 'add-on', 'for' => $options['id']));
        $input .= $this->Form->input($options['fieldName'], array('id' => $options['id'], 'class' => 'add-on', "placeholder" => $options['label'], 'label'=> false, 'div' => false));
        $input .= $this->Html->tag("/div", null);

        return $input;
    }
    
    public function login($options = array()){
        $default_options=array(
            'label'=>'Identifiant',
            'fieldName'=>'pseudo',
            'id'=>'pseudo');
        $options = array_merge($default_options,$options);
        
        $input = $this->Html->tag("div", null, array('class' => 'input-prepend'));
        $input .= $this->Html->tag("label", $options['label'], array('for' => $options['id']));
        $input .= $this->Html->tag("label", '<i class="icon-user"></i> ', array('class' => 'add-on', 'for' => $options['id']));
        $input .= $this->Form->input($options['fieldName'], array('id' => $options['id'], 'class' => 'add-on', "placeholder" => $options['label'], 'label'=> false, 'div' => false));
        $input .= $this->Html->tag("/div", null);

        return $input;
    }
    
    public function print_date($date){
        return date_format(new DateTime($date), "d/m/Y");
    }
    
}
