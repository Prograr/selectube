
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artistes'), array('controller' => 'artistes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artiste'), array('controller' => 'artistes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Commentaires'), array('controller' => 'commentaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Commentaire'), array('controller' => 'commentaires', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Favoris'), array('controller' => 'favoris', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favori'), array('controller' => 'favoris', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Moderations'), array('controller' => 'moderations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Moderation'), array('controller' => 'moderations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Musiques'), array('controller' => 'musiques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Musique'), array('controller' => 'musiques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="users form">
		
			<?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit User'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('id', 'id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('nom', 'nom', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('nom', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('prenom', 'prenom', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('prenom', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('pseudo', 'pseudo', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('pseudo', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('email', 'email', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('email', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('password', 'password', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('password', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('score', 'score', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('score', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('role', 'role', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('role', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('creation', 'creation', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('creation', array('class' => 'span12')); ?>
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
