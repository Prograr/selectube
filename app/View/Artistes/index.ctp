<div class="artistes index">

    <h2><?php echo __('Artistes'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('nom'); ?></th>
            <th><?php echo $this->Paginator->sort('pays'); ?></th>
            <th><?php echo $this->Paginator->sort('ville'); ?></th>
            <th><?php echo $this->Paginator->sort('naissance'); ?></th>
            <th><?php echo $this->Paginator->sort('bio'); ?></th>
            <th><?php echo $this->Paginator->sort('photo'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($artistes as $artiste): ?>
            <tr>
                <td><?php echo h($artiste['Artiste']['id']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['nom']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['pays']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['ville']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['naissance']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['bio']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['photo']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($artiste['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $artiste['Categorie']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($artiste['User']['pseudo'], array('controller' => 'users', 'action' => 'voir', $artiste['User']['id'])); ?>
                </td>
                <td><?php echo h($artiste['Artiste']['created']); ?>&nbsp;</td>
                <td><?php echo h($artiste['Artiste']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $artiste['Artiste']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $artiste['Artiste']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $artiste['Artiste']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $artiste['Artiste']['id'])); ?>
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
