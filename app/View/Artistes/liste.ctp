<div class="artistes index">

    <h2><?php echo __('Artistes'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('nom'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
<!--            <th class="actions"><?php echo __('Actions'); ?></th>-->
        </tr>
        <?php foreach ($artistes as $artiste): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link(h($artiste['Artiste']['nom']), array('action' => 'voir', $artiste['Artiste']['id'])); ?>
                <td>
                    <?php echo $this->Html->link($artiste['Categorie']['titre'], array('controller' => 'categories', 'action' => 'voir', $artiste['Categorie']['id'])); ?>
                </td>
<!--                <td class="actions">
                    <?php echo $this->Html->link(__('Voir'), array('action' => 'voir', $artiste['Artiste']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Modifier'), array('action' => 'modifier', $artiste['Artiste']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php // echo $this->Form->postLink(__('Supprimer'), array('action' => 'supprimer', $artiste['Artiste']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $artiste['Artiste']['id'])); ?>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </table>

    <p>
        <small>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} / {:pages}, {:current} élements sur un total de {:count}, musiques {:start} à {:end}.')
            ));
            ?>			
        </small>
    </p>

    <div class="pagination">
        <ul>
            <?php
            echo $this->Paginator->prev('< ' . __('Précédents'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '</li><li>', 'currentClass' => 'disabled', 'before' => '<li>', 'after' => '</li>'));
            echo $this->Paginator->next(__('Suivants') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            ?>
        </ul>
    </div><!-- .pagination -->

</div><!-- .index -->
