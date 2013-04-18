<div class="musiques index">

    <?php
    if ($this->Session->read('Auth.User.id') != null) //Si connecter : charger le formulaire de partage
        echo $this->element("YoutubeUpload", array());
    ?>

    <h2><?php echo __('Musiques les plus récentes'); ?></h2>

    <?php
    foreach ($musiques as $musique) {
        echo $this->Html2->media($musique);
    }
    ?>
    <p><small>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} / {:pages}, {:current} élements sur un total de {:count}, musiques {:start} à {:end}.')
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
