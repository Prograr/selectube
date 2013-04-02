
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Commentaire'), array('action' => 'edit', $commentaire['Commentaire']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Commentaire'), array('action' => 'delete', $commentaire['Commentaire']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $commentaire['Commentaire']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Commentaires'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Commentaire'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="commentaires view">

			<h2><?php  echo __('Commentaire'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($commentaire['Commentaire']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Commentaire'); ?></strong></td>
		<td>
			<?php echo h($commentaire['Commentaire']['commentaire']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($commentaire['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $commentaire['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Target'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($commentaire['Target']['pseudo'], array('controller' => 'users', 'action' => 'view', $commentaire['Target']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Target Type'); ?></strong></td>
		<td>
			<?php echo h($commentaire['Commentaire']['target_type']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($commentaire['Commentaire']['creation']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
