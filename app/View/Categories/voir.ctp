<div class="categories view">

    <h2><?php echo h($category['Category']['titre']); ?></h2>
    
    <?php if (isset($category['Category']['tags'])){ ?>
    <p>
    <strong><?php echo __('Catégorie parente'); ?></strong>
    <?php echo $this->Html->link($category['ParentCategory']['titre'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id']), array('class' => '')); ?>
    </p>
    <?php } ?>
    
    <?php if (isset($category['Category']['tags'])){ ?>
    <p>
    <strong><?php echo __('Tags'); ?></strong>
    <?php echo h($category['Category']['tags']); ?>
    </p>
    <?php } ?>
</div><!-- .view -->


<div class="related">

    <?php if (!empty($category['ChildCategory'])): ?>
    <h3><?php echo __('Sous-Categories'); ?></h3>


        <table class="table table-striped table-bordered">
            <tr>
                <th><?php echo __('Titre'); ?></th>
                <th><?php echo __('Parent Id'); ?></th>
                <th><?php echo __('Tags'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($category['ChildCategory'] as $childCategory):
                ?>
                <tr>
                    <td><?php echo $childCategory['titre']; ?></td>
                    <td><?php echo $childCategory['parent_id']; ?></td>
                    <td><?php echo $childCategory['tags']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Voir'), array('controller' => 'categories', 'action' => 'voir', $childCategory['id']), array('class' => 'btn btn-mini')); ?>
                        <?php echo $this->Html->link(__('Modifier'), array('controller' => 'categories', 'action' => 'modifier', $childCategory['id']), array('class' => 'btn btn-mini')); ?>
                        <?php echo $this->Form->postLink(__('Supprimer'), array('controller' => 'categories', 'action' => 'supprimer', $childCategory['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $childCategory['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table><!-- .table table-striped table-bordered -->

    <?php endif; ?>
        
</div><!-- .related -->

<div class="related">

    <?php if (!empty($artistes)): ?>

        <h3><?php echo __('Artistes/Groupes'); ?></h3>

        <table class="table table-striped table-bordered">
            <tr>
                <th><?php echo __('Nom'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($artistes as $artiste): 
                $artiste=$artiste['Artiste'];
                ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($artiste['nom'], array('controller' => 'artistes', 'action' => 'voir', $artiste['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table><!-- .table table-striped table-bordered -->

    <?php endif; ?>

</div><!-- .related -->

<div class="related">

    <?php if (!empty($albums)): ?>

        <h3><?php echo __('Albums'); ?></h3>

        <table class="table table-striped table-bordered">
            <tr>
                <th><?php echo __('Titre'); ?></th>
<!--                <th><?php echo __('Annee'); ?></th>-->
            </tr>
            <?php
            $i = 0;
            foreach ($albums as $album): 
                $album=$album['Album'];
                ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($album['titre'], array('controller' => 'albums', 'action' => 'voir', $album['id'])); ?>
                    </td>
<!--                    <td><?php echo $album['annee']; ?></td>-->
                </tr>
            <?php endforeach; ?>
        </table><!-- .table table-striped table-bordered -->

    <?php endif; ?>

</div><!-- .related -->

<div class="related">

    <h3><?php echo __('Musiques'); ?></h3>

    <?php
    foreach ($musiques as $musique)
        echo $this->Html2->media($musique);
    ?>

</div><!-- .related -->
