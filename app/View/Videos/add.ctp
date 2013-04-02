<div class="videos form">

    <?php echo $this->Form->create('Video', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
    <fieldset>
        <h2><?php echo __('Add Video'); ?></h2>
        <div class="control-group">
            <?php echo $this->Form->label('user_id', 'user_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('user_id', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('titre', 'titre', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('titre', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('description', 'description', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('description', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('url', 'url', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('url', array('class' => 'span12')); ?>
            </div><!-- .controls -->
        </div><!-- .control-group -->

        <div class="control-group">
            <?php echo $this->Form->label('tags', 'tags', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $this->Form->input('tags', array('class' => 'span12')); ?>
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