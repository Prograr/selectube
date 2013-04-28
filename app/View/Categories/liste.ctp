<div class="categories index">

    <h2><?php echo __('Categories'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('titre'); ?></th>
            <th><?php echo $this->Paginator->sort('parent_id'); ?></th>
            <th><?php echo $this->Paginator->sort('tags'); ?></th>
<!--            <th class="actions"><?php echo __('Actions'); ?></th>-->
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link(h($category['Category']['titre']), array('action' => 'voir', $category['Category']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($category['ParentCategory']['titre'], array('controller' => 'categories', 'action' => 'voir', $category['ParentCategory']['id'])); ?>
                </td>
                <td><?php echo h($category['Category']['tags']); ?>&nbsp;</td>
<!--                <td class="actions">
                    <?php echo $this->Html->link(__('Voir'), array('action' => 'voir', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Modifier'), array('action' => 'modifier', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'supprimer', $category['Category']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </table>

    <p><small>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} sur {:pages}, affichage de {:current} catégories sur un total de {:count}, éléments {:start} à {:end}')
            ));
            ?>			</small></p>

    <div class="pagination">
        <ul>
            <?php
            echo $this->Paginator->prev('< ' . __('Page Précédente'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '</li><li>', 'currentClass' => 'disabled', 'before' => '<li>', 'after' => '</li>'));
            echo $this->Paginator->next(__('Page Suivante') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            ?>
        </ul>
    </div><!-- .pagination -->

</div><!-- .index -->