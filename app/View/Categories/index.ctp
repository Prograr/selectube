<div class="categories index">

    <h2><?php echo __('Categories'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('titre'); ?></th>
            <th><?php echo $this->Paginator->sort('parent_id'); ?></th>
            <th><?php echo $this->Paginator->sort('url'); ?></th>
            <th><?php echo $this->Paginator->sort('tags'); ?></th>
            <th><?php echo $this->Paginator->sort('miniature'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($category['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $category['User']['id'])); ?>
                </td>
                <td><?php echo h($category['Category']['titre']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($category['ParentCategory']['titre'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
                </td>
                <td><?php echo h($category['Category']['url']); ?>&nbsp;</td>
                <td><?php echo h($category['Category']['tags']); ?>&nbsp;</td>
                <td><?php echo h($category['Category']['miniature']); ?>&nbsp;</td>
                <td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
                <td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
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