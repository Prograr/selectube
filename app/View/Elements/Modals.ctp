<!--Fenêtres modales-->
<!--Login modal-->
<?php if (!($this->params['controller'] == "users" && $this->params['action']== "login")){ ?> 
<div class="modal hide fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="users form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="loginModalLabel"><?php echo __('Connexion'); ?></h3>
        </div>
        <div class="modal-body">
            
            <?php echo $this->Form->create('User', array('action' => 'login')); ?>
            <?php
            echo $this->Html2->login();
            echo $this->Html2->password();
            echo $this->Form->input('rememberme', array('label' => 'Se souvenir de moi', 'type' => 'checkbox'));
            ?>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <?php
            echo $this->Form->button("<i class='icon-unlock'></i> " . __('Connexion'), array('type' => 'submit', 'class' => 'btn btn-primary'));
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
<?php } if (!($this->params['controller'] == "users" && ($this->params['action']== "inscription" || $this->params['action'] == "add"))){ ?> 
<!--inscription modal-->
<div class="modal hide fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
    <div class="users form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="usersModalLabel"><?php echo __('Inscription'); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo $this->Form->create('User', array('action' => 'inscription')); ?>
            <?php
                echo $this->Html2->email();
                echo $this->Html2->password();
            ?>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <?php
            echo $this->Form->button("<i class='icon-signin'></i> ".__('Inscription'), array('type' => 'submit', 'class' => 'btn btn-primary'));
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
<?php } ?>
<!--restricted modal-->
<div class="modal hide fade" id="restrictedModal" tabindex="-1" role="dialog" aria-labelledby="restrictedModalLabel" aria-hidden="true">
    <div class="users form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="usersModalLabel"><i class='icon-lock'></i> <?php echo __('Accès interdit'); ?></h3>
        </div>
        <div class="modal-body">
            Vous devez vous connecter ou vous inscrire si vous n'avez pas encore de compte pour accéder à cette fonctionnalité
        </div>
        <div class="modal-footer">
            <button class="btn pull-left btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
            <a href='/users/inscription' class="btn btn-success" aria-hidden="true"><i class="icon-signin"></i> M'inscrire</a>
            <a href='/users/login' class="btn btn-primary" aria-hidden="true"><i class="icon-unlock"></i> Me connecter</a>
        </div>
    </div>
</div>