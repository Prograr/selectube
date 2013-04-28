<div class="artistes view">

    <h2><?php echo h($artiste['Artiste']['nom']); ?></h2>
    <p>
        <strong>Catégorie : </strong>
        <?php echo $this->Html->link($artiste['Categorie']['titre'], array('controller' => 'categories', 'action' => 'voir', $artiste['Categorie']['id']), array('class' => '')); ?>
    </p>
    
    
    <?php if (isset($artiste['Artiste']['pays'])){ ?>
    <p>
        <strong><?php echo __('Pays'); ?> : </strong>
        <?php echo h($artiste['Artiste']['pays']); ?>
    </p>
    <?php } ?>
    
    <?php if (isset($artiste['Artiste']['ville'])){ ?>
    <p>
        <strong><?php echo __('Ville'); ?> : </strong>
        <?php echo h($artiste['Artiste']['ville']); ?>
    </p>
    <?php } ?>
    
    <?php if (isset($artiste['Artiste']['naissance'])){ ?>
    <p>
        <strong><?php echo __('Naissance'); ?> : </strong>
        <?php echo h($this->Time->format('d/m/Y', $artiste['Artiste']['naissance'])); ?>
    </p>
    <?php } ?>
    
</div><!-- .view -->


<div class="related">

    <?php if (!empty($artiste['Album'])): ?>

        <h3><?php echo __('Albums'); ?></h3>

        <table class="table table-striped table-bordered">
            <tr>
                <th><?php echo __('Titre'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($artiste['Album'] as $album):
                ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($album['titre'], array('controller' => 'albums', 'action' => 'voir', $album['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table><!-- .table table-striped table-bordered -->

    <?php endif; ?>

</div><!-- .related -->


<div class="related">

    <?php if (!empty($artiste['Musique'])): ?>
        <h3><?php echo __('Musiques'); ?></h3>
        <?php
        foreach ($musiques as $musique) {
            echo $this->Html2->media($musique);
        }
        ?>
    <?php endif; ?>

</div><!-- .related -->