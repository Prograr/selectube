<script>
    $(document).ready(function() {
        notification('Bravo !', 'Votre inscription est presque terminée', 'info');
    });
</script>
<div class="users form">
    <?php echo $this->Form->create('User', array('class' => 'form form-horizontal', 'action' => 'creer')); ?>
    <fieldset>
        <!--<h2><?php echo __('Inscription'); ?></h2>-->
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
                <td><?php echo $this->Form->input('prenom', array('class' => '', 'label' => 'Prenom', 'value' => $facebook_prenom)); ?></td>
                <td><?php echo $this->Form->input('nom', array('class' => '', 'label' => 'Nom', 'value' => $facebook_nom));?> </td>
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
</div>