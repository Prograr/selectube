
<div class="albums view">

    <h2><?php echo h($album['Album']['titre']); ?></h2>

    <?php if (isset($category['Artiste']['nom'])){ ?>
    <p>
        <strong><?php echo __('Artiste'); ?></strong>
        <?php echo $this->Html->link($album['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'view', $album['Artiste']['id']), array('class' => '')); ?>
    </p>
    <?php } ?>
    <?php if (isset($category['Album']['annee'])){ ?>
    <p>
        <strong><?php echo __('Annee'); ?></strong>
        <?php echo h($album['Album']['annee']); ?>
    </p>
    <?php } ?>
    <?php if (isset($category['Categorie']['id'])){ ?>
    <p>
        <strong><?php echo __('Categorie'); ?></strong>
        <?php echo $this->Html->link($album['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $album['Categorie']['id']), array('class' => '')); ?>
    </p>
    <?php } ?>
    
</div><!-- .view -->


<div class="related">

    <h3><?php echo __('Musiques'); ?></h3>

    <?php
    foreach ($musiques as $musique)
        echo $this->Html2->media($musique);
    ?>

</div><!-- .related -->

