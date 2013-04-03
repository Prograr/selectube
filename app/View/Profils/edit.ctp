<div id="page-container" class="row-fluid">

    <div id="sidebar" class="span3">

        <div class="actions">

            <ul class="nav nav-list bs-docs-sidenav">
                <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Profil.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Profil.id'))); ?></li>
                <li><?php echo $this->Html->link(__('List Profils'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
            </ul><!-- .nav nav-list bs-docs-sidenav -->

        </div><!-- .actions -->

    </div><!-- #sidebar .span3 -->

    <div id="page-content" class="span9">

        <div class="profils form">

            <?php echo $this->Form->create('Profil', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
            <fieldset>
                <h2><?php echo __('Edit Profil'); ?></h2>
                <div class="control-group">
                    <?php echo $this->Form->label('id', 'id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('id', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('user_id', 'user_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('user_id', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('public', 'public', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('public', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('avatar', 'avatar', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('avatar', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

            </fieldset>
            <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
