
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Musique.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Musique.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Musiques'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artistes'), array('controller' => 'artistes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artiste'), array('controller' => 'artistes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categorie'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="musiques form">
		
			<?php echo $this->Form->create('Musique', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit Musique'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('id', 'id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('user_id', 'user_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('user_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('titre', 'titre', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('titre', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('artiste_id', 'artiste_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('artiste_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('album_id', 'album_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('album_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('url', 'url', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('url', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('tags', 'tags', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('tags', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('miniature', 'miniature', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('miniature', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('categorie_id', 'categorie_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('categorie_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('created', 'creation', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('created', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('modification', 'modification', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('modification', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
