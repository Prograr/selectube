
<div class="albums view">

    <h2><?php echo h(ucfirst($album['Album']['titre'])); ?></h2>
    <?php if (isset($album['Artiste']['nom'])){ ?>
    <p>
        <strong><?php echo __('Artiste'); ?> : </strong>
        <?php echo $this->Html->link($album['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'view', $album['Artiste']['id']), array('class' => '')); ?>
    </p>
    <?php } ?>
    
    <?php if (isset($album['Categorie']['id'])){ ?>
    
    <p>
        <strong>Catégorie : </strong>
        <?php echo $this->Html->link($album['Categorie']['titre'], array('controller' => 'categories', 'action' => 'voir', $album['Categorie']['id']), array('class' => '')); ?>

    </p>
    <?php } ?>
    
    <?php if (isset($album['Album']['sortie'])){ ?>
    <p>
        <strong><?php echo __('Date de sortie'); ?> : </strong>
        <?php echo h($this->Time->format('d/m/Y',$album['Album']['sortie'])); ?>
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

