<div class="sites index">

    <h2><?php echo __('Sites'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('nom'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('lien'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('creation'); ?></th>
            <th><?php echo $this->Paginator->sort('modification'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($sites as $site): ?>
            <tr>
                <td><?php echo h($site['Site']['nom']); ?>&nbsp;</td>
                <td><?php echo h($site['Site']['description']); ?>&nbsp;</td>
                <td><?php echo h($site['Site']['lien']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($site['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $site['Categorie']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($site['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $site['User']['id'])); ?>
                </td>
                <td><?php echo h($site['Site']['creation']); ?>&nbsp;</td>
                <td><?php echo h($site['Site']['modification']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $site['Site']['id'])); ?>
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