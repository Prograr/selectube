<div class="albums form">

    <?php echo $this->Form->create('Album', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
    <fieldset>
        <h2><?php echo __('Add Album'); ?></h2>
        <div class="control-group">
            <?php echo $this->Form->label('titre', 'titre', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('titre', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('artiste_id', 'artiste_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('artiste_id', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('annee', 'annee', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('annee', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('jaquette', 'jaquette', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('jaquette', array('class' => 'span12')); ?>
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