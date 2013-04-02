
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="categories view">

			<h2><?php  echo __('Category'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($category['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $category['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Titre'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['titre']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Parent Category'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($category['ParentCategory']['titre'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Url'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['url']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tags'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['tags']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Miniature'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['miniature']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['creation']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modification'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['modification']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Categories'); ?></h3>
				
				<?php if (!empty($category['ChildCategory'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Titre'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Miniature'); ?></th>
		<th><?php echo __('Creation'); ?></th>
		<th><?php echo __('Modification'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($category['ChildCategory'] as $childCategory): ?>
		<tr>
			<td><?php echo $childCategory['id']; ?></td>
			<td><?php echo $childCategory['user_id']; ?></td>
			<td><?php echo $childCategory['titre']; ?></td>
			<td><?php echo $childCategory['parent_id']; ?></td>
			<td><?php echo $childCategory['url']; ?></td>
			<td><?php echo $childCategory['tags']; ?></td>
			<td><?php echo $childCategory['miniature']; ?></td>
			<td><?php echo $childCategory['creation']; ?></td>
			<td><?php echo $childCategory['modification']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $childCategory['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $childCategory['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $childCategory['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $childCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Child Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
