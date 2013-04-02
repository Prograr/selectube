<div class="artistes form">

    <?php echo $this->Form->create('Artiste', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
    <fieldset>
        <h2><?php echo __('Add Artiste'); ?></h2>
        <div class="control-group">
            <?php echo $this->Form->label('nom', 'nom', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('nom', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('pays', 'pays', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('pays', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('ville', 'ville', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('ville', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('naissance', 'naissance', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('naissance', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('bio', 'bio', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('bio', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('photo', 'photo', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('photo', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('categorie_id', 'categorie_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('categorie_id', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('user_id', 'user_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('user_id', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('creation', 'creation', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('creation', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('modification', 'modification', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('modification', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

    </fieldset>
    <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
    <?php echo $this->Form->end(); ?>

</div>