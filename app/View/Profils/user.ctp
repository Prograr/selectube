
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Profil'), array('action' => 'edit', $profil['Profil']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profil'), array('action' => 'delete', $profil['Profil']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $profil['Profil']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="profils view">

			<h2><?php  echo __('Profil'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($profil['Profil']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($profil['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $profil['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Public'); ?></strong></td>
		<td>
			<?php echo h($profil['Profil']['public']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Avatar'); ?></strong></td>
		<td>
			<?php echo h($profil['Profil']['avatar']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($profil['Profil']['creation']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modification'); ?></strong></td>
		<td>
			<?php echo h($profil['Profil']['modification']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
