<div class="selecteurs form span12">

    <!--<div class="page-header">-->
        <h2><i class='icon-key'></i> Se connecter à Selectube</h2>
    <!--</div>-->

    <?php $this->Session->flash('auth'); ?>

    <div id="connexion" class='span10'>
        
        <div class="span5">
        <?php echo $this->Form->create('User'); ?>
            <fieldset style='padding-top: 1px;'>
                <legend>Connexion classique</legend>
                <?php
                echo $this->Html2->email(array('class'=>'span10'));
                echo $this->Html2->password(array('class'=>'span10'));
                echo $this->Form->input('rememberme', array('label' => 'Se souvenir de moi', 'type' => 'checkbox'));
//                echo $this->Form->button('Se souvenir de moi', array('name' => 'rememberme', 'type' => 'button', 'data-toggle' => 'button', 'class' => 'btn'));
                echo $this->Form->button("<i class='icon-unlock'></i> " . __('Connexion'), array('type' => 'submit', 'class' => 'btn btn-primary btn-block span11', 'data-loading-text' => "<i class='icon-spinner icon-spin'></i> Connexion..."));
                echo $this->Form->end();
                ?>
                <a href='/users/inscription' class="btn btn-success btn-block span11">Créer un compte</a>
                
            </fieldset>
            
        <?php echo $this->Form->end(); ?>
        </div>
        <div class="span5">
            <fieldset>
            <legend>Connexion Facebook</legend>
            <?php
            echo $this->Facebook->login(array(
                'perms' => 'email,read_stream,publish_stream',
                'size' => 'large'
            ));
            ?>
            </fieldset>
        </div>
    </div>
</div>