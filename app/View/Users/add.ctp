<script>
    $(document).ready(function() {
        notification('Bravo !', 'Votre inscription est presque terminée', 'info');
    });
</script>
<div class="users form">
    <?php echo $this->Form->create('User', array('class' => 'form form-horizontal', 'action' => 'add')); ?>
    <fieldset>
        <!--<h2><?php echo __('Inscription phase 2'); ?></h2>-->
        <legend>Informations supplémentaires</legend>
        <table> 
            <tr>
                <td><?php echo $this->Form->input('email', array('class' => '', 'label' => 'Adresse email', 'type' => 'email', 'readonly' => true)); ?></td>
                <td><?php echo $this->Form->input('password', array('class' => '', 'label' => 'Mot de passe', 'type' => 'password', 'readonly' => true));?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('pseudo', array('class' => '', 'label' => 'Pseudo')); ?> </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('prenom', array('class' => '', 'label' => 'Prenom')); ?></td>
                <td><?php echo $this->Form->input('nom', array('class' => '', 'label' => 'Nom'));?> </td>
            </tr>
               
        </table>     
        <div class="btn-group">
                    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> Retour', '/users/inscription' , array('class' => 'btn', 
                                                                                                'escape'=> false, 
                                                                                                'style' => 'margin-left:20px;')); ?>
                    <?php echo $this->Form->button('<i class="icon-ok"></i> Valider', array('class' => 'btn btn-primary', 
                                                                                                'escape'=> false, 
                                                                                                'type' => 'submit')); ?>
        </div>
    </fieldset>


    <?php echo $this->Form->end(); ?>
    
    <div id="inscriptionFacebook">    
        <iframe src="https://www.facebook.com/plugins/registration?
             client_id=448385471909603&
             redirect_uri=http%3A%2F%2Fselectube.org/users/login
             fb_register=true
             fields=first_name,last_name,password,email,captcha"
        scrolling="auto"
        frameborder="no"
        style="border:none"
        allowTransparency="true"
        width="100%"
        height="330">
</iframe>
    </div>
</div>