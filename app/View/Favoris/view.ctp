
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Favori'), array('action' => 'edit', $favori['Favori']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Favori'), array('action' => 'delete', $favori['Favori']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $favori['Favori']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Favoris'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favori'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="favoris view">

			<h2><?php  echo __('Favori'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($favori['Favori']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($favori['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $favori['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Target'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($favori['Target']['pseudo'], array('controller' => 'users', 'action' => 'view', $favori['Target']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo h($favori['Favori']['type']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($favori['Favori']['creation']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
