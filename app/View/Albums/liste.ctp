<div class="albums index">

    <h2><?php echo __('Albums'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('titre'); ?></th>
            <th><?php echo $this->Paginator->sort('artiste_id'); ?></th>
            <th><?php echo $this->Paginator->sort('annee'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
<!--            <th class="actions"><?php echo __('Actions'); ?></th>-->
        </tr>
        <?php foreach ($albums as $album): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link(h($album['Album']['titre']), array('action' => 'voir', $album['Album']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($album['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'view', $album['Artiste']['id'])); ?>
                </td>
                <td><?php echo h($album['Album']['sortie']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($album['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $album['Categorie']['id'])); ?>
                </td>
<!--                <td class="actions">
                    <?php echo $this->Html->link(__('Voir'), array('action' => 'voir', $album['Album']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Modifier'), array('action' => 'modifier', $album['Album']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php // echo $this->Form->postLink(__('Supprimer'), array('action' => 'supprimer', $album['Album']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </table>

    <p><small>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} / {:pages}, {:current} albums sur un total de {:count}, éléments {:start} à {:end}.')
            ));
            ?>			</small></p>

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