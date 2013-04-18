<div class="selecteurs form span12">

    <div class="page-header">
        <h1>Se connecter</h1>
    </div>

    <?php $this->Session->flash('auth'); ?>

    <div id="connexion" class='span10'>
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend><?php echo "<i class='icon-key'></i> " . __('Connexion'); ?></legend>
            <div class="span4">
                <?php
                echo $this->Html2->email();
                echo $this->Html2->password();
                echo $this->Form->input('rememberme', array('label' => 'Se souvenir de moi', 'type' => 'checkbox'));

                echo $this->Form->button("<i class='icon-unlock'></i> " . __('Connexion'), array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
                echo $this->Form->end();
                ?>
                <a href='/users/inscription' class="btn btn-success btn-block">Créer un compte</a>
            </div>
            
            <div class="span4" style="margin-top: 30px; text-align: center;">
                <i class="icon-hand-right icon-2x"></i>
            </div>
            <div class="span2" style="margin-top: 30px;">
                <?php
                echo $this->Facebook->login(array(
                    'perms' => 'email,read_stream,publish_stream',
                    'size' => 'large'
                ));
                ?>
            </div>
        </fieldset>
    </div>
</div>