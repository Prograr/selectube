<div class="sites form">

    <?php echo $this->Form->create('Site', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
    <fieldset>
        <h2><?php echo __('Add Site'); ?></h2>
        <div class="control-group">
            <?php echo $this->Form->label('nom', 'nom', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('nom', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('description', 'description', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('description', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('lien', 'lien', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('lien', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('miniature', 'miniature', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('miniature', array('class' => 'span12')); ?>
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