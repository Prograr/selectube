<div class="selecteurs form span12">
        
    <div class="page-header">
        <h1>Se connecter</h1>
    </div>
    
    <?php $this->Session->flash('auth'); ?>
        
    <div id="connexionClassique" class='span8'>
    
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend><?php echo "<i class='icon-key'></i> ".__('Connexion classique'); ?></legend>
            <?php
            
            echo $this->Html2->email();
            echo $this->Html2->password();
            echo $this->Form->input('rememberme', array('label' => 'Se souvenir de moi', 'type' => 'checkbox'));
            
        echo $this->Form->button("<i class='icon-unlock'></i> ".__('Connexion'), array('type' => 'submit', 'class' => 'btn btn-primary'));
        echo $this->Form->end();
            ?>
        </fieldset>
        <?php
        ?>
        <a href='/users/inscription'>Je n'ai pas encore de compte. Je souhaite en créer un.</a>
    </div>
<!--    <div id='connexionFacebook' class='span8'>
        <h1>Se connecter avec Facebook</h1>
        <a href="<?php echo $this->Html->url(array('action' => 'facebook')) ?>" class="facebookConnect">Me connecter avec Facebook</a>
        <br>
        <div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>
        
    </div>-->
</div>