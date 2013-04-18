<div class="users form">

    <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
    <fieldset>
        <h2><?php echo __('Modifier mes informations'); ?></h2>

        <div class="control-group">
            <?php echo $this->Form->label('nom', 'nom', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('nom', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('prenom', 'prenom', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('prenom', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('pseudo', 'pseudo', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('pseudo', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('email', 'email', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('email', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('password', 'Mot de passe actuel', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('password', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('new-password', 'Nouveau mot de passe', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('new-password', array('class' => 'span12', 'type' => 'password')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->
        
        <div class="control-group">
            <?php echo $this->Form->label('confirm-password', 'Confirmez le nouveau mot de passe', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('confirm-password', array('class' => 'span12', 'type' => 'password')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

<!--        <div class="control-group">
            <?php echo $this->Form->label('role', 'role', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('role', array('class' => 'span12')); ?>
            </div> .controls 
        </div> .control-group -->

    </fieldset>
    <?php echo $this->Form->submit('Modifier', array('class' => 'btn btn-large btn-primary')); ?>
    <?php echo $this->Form->end(); ?>

</div>