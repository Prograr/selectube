
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Follower'), array('action' => 'edit', $follower['Follower']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Follower'), array('action' => 'delete', $follower['Follower']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $follower['Follower']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Followers'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Follower'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Suivi'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="followers view">

			<h2><?php  echo __('Follower'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($follower['Follower']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Suivi'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($follower['Suivi']['pseudo'], array('controller' => 'users', 'action' => 'view', $follower['Suivi']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Suiveur'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($follower['Suiveur']['pseudo'], array('controller' => 'users', 'action' => 'view', $follower['Suiveur']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($follower['Follower']['creation']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
