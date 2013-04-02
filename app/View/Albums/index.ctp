<div class="albums index">

    <h2><?php echo __('Albums'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('titre'); ?></th>
            <th><?php echo $this->Paginator->sort('artiste_id'); ?></th>
            <th><?php echo $this->Paginator->sort('annee'); ?></th>
            <th><?php echo $this->Paginator->sort('jaquette'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('creation'); ?></th>
            <th><?php echo $this->Paginator->sort('modification'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($albums as $album): ?>
            <tr>
                <td><?php echo h($album['Album']['id']); ?>&nbsp;</td>
                <td><?php echo h($album['Album']['titre']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($album['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'view', $album['Artiste']['id'])); ?>
                </td>
                <td><?php echo h($album['Album']['annee']); ?>&nbsp;</td>
                <td><?php echo h($album['Album']['jaquette']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($album['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $album['Categorie']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($album['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $album['User']['id'])); ?>
                </td>
                <td><?php echo h($album['Album']['creation']); ?>&nbsp;</td>
                <td><?php echo h($album['Album']['modification']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $album['Album']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $album['Album']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $album['Album']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><small>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>			</small></p>

    <div class="pagination">
        <ul>
            <?php
            echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '</li><li>', 'currentClass' => 'disabled', 'before' => '<li>', 'after' => '</li>'));
            echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            ?>
        </ul>
    </div><!-- .pagination -->

</div><!-- .index -->