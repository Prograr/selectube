

<div class="videos index">

    <h2><?php echo __('Videos'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('titre'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('url'); ?></th>
            <th><?php echo $this->Paginator->sort('tags'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
            <th><?php echo $this->Paginator->sort('creation'); ?></th>
            <th><?php echo $this->Paginator->sort('modification'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($videos as $video): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($video['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $video['User']['id'])); ?>
                </td>
                <td><?php echo h($video['Video']['titre']); ?>&nbsp;</td>
                <td><?php echo h($video['Video']['description']); ?>&nbsp;</td>
                <td><?php echo h($video['Video']['url']); ?>&nbsp;</td>
                <td><?php echo h($video['Video']['tags']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($video['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $video['Categorie']['id'])); ?>
                </td>
                <td><?php echo h($video['Video']['creation']); ?>&nbsp;</td>
                <td><?php echo h($video['Video']['modification']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $video['Video']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $video['Video']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $video['Video']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?>
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
