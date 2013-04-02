
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Moderation'), array('action' => 'edit', $moderation['Moderation']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Moderation'), array('action' => 'delete', $moderation['Moderation']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $moderation['Moderation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Moderations'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Moderation'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="moderations view">

			<h2><?php  echo __('Moderation'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($moderation['Moderation']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Approuve'); ?></strong></td>
		<td>
			<?php echo h($moderation['Moderation']['approuve']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($moderation['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $moderation['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Target'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($moderation['Target']['pseudo'], array('controller' => 'users', 'action' => 'view', $moderation['Target']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo h($moderation['Moderation']['type']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($moderation['Moderation']['creation']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modification'); ?></strong></td>
		<td>
			<?php echo h($moderation['Moderation']['modification']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
