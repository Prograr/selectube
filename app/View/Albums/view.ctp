
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Album'), array('action' => 'edit', $album['Album']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Album'), array('action' => 'delete', $album['Album']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artistes'), array('controller' => 'artistes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artiste'), array('controller' => 'artistes', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categorie'), array('controller' => 'categories', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Musiques'), array('controller' => 'musiques', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Musique'), array('controller' => 'musiques', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="albums view">

			<h2><?php  echo __('Album'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($album['Album']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Titre'); ?></strong></td>
		<td>
			<?php echo h($album['Album']['titre']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Artiste'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($album['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'view', $album['Artiste']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Annee'); ?></strong></td>
		<td>
			<?php echo h($album['Album']['annee']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Jaquette'); ?></strong></td>
		<td>
			<?php echo h($album['Album']['jaquette']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Categorie'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($album['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $album['Categorie']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($album['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $album['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
		<td>
			<?php echo h($album['Album']['creation']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modification'); ?></strong></td>
		<td>
			<?php echo h($album['Album']['modification']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Musiques'); ?></h3>
				
				<?php if (!empty($album['Musique'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Titre'); ?></th>
		<th><?php echo __('Artiste Id'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Miniature'); ?></th>
		<th><?php echo __('Categorie Id'); ?></th>
		<th><?php echo __('Creation'); ?></th>
		<th><?php echo __('Modification'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($album['Musique'] as $musique): ?>
		<tr>
			<td><?php echo $musique['id']; ?></td>
			<td><?php echo $musique['user_id']; ?></td>
			<td><?php echo $musique['titre']; ?></td>
			<td><?php echo $musique['artiste_id']; ?></td>
			<td><?php echo $musique['album_id']; ?></td>
			<td><?php echo $musique['url']; ?></td>
			<td><?php echo $musique['tags']; ?></td>
			<td><?php echo $musique['miniature']; ?></td>
			<td><?php echo $musique['categorie_id']; ?></td>
			<td><?php echo $musique['creation']; ?></td>
			<td><?php echo $musique['modification']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'musiques', 'action' => 'view', $musique['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'musiques', 'action' => 'edit', $musique['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'musiques', 'action' => 'delete', $musique['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $musique['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Musique'), array('controller' => 'musiques', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
