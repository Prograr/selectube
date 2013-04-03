<div class="musiques index">

    <?php 
    
    if ($this->Session->read('Auth.User.id') != null) //Si connecter : charger le formulaire de partage
        echo $this->element("YoutubeUpload", array());

    ?>
    
    <h2><?php echo __('Musiques les plus récentes'); ?></h2>
    
        <?php foreach($musiques as $musique){
            $description = "";
            if ($musique['Artiste']['nom'] != '')
                $description .= "Artiste : ". $musique['Artiste']['nom'].".<br>";
            if ($musique['Album']['titre'] != '')
                $description .= "Album : ". $musique['Album']['titre'] .".<br>";
            if ($musique['Musique']['tags'] != ''){
                $tags="";
                foreach (explode(",", $musique['Musique']['tags']) as $tag) {
                    $tags .= '<span class="label label-info">'.trim($tag).'</span> ';
                }
                $description .= "<p class='tags'><i class='icon-tags'></i> Tags : ". $tags ."</p>";
            }
            echo $this->Html2->media($musique['Musique'], $musique['User']['pseudo'], $description);
        echo "<hr>";
        
                }
        ?>
<!--    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('titre'); ?></th>
            <th><?php echo $this->Paginator->sort('artiste_id'); ?></th>
            <th><?php echo $this->Paginator->sort('album_id'); ?></th>
            <th><?php echo $this->Paginator->sort('url'); ?></th>
            <th><?php echo $this->Paginator->sort('tags'); ?></th>
            <th><?php echo $this->Paginator->sort('miniature'); ?></th>
            <th><?php echo $this->Paginator->sort('categorie_id'); ?></th>
            <th><?php echo $this->Paginator->sort('creation'); ?></th>
            <th><?php echo $this->Paginator->sort('modification'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
            <tr>
                <td><?php echo h($musique['Musique']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($musique['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $musique['User']['id'])); ?>
                </td>
                <td><?php echo h($musique['Musique']['titre']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($musique['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'view', $musique['Artiste']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($musique['Album']['titre'], array('controller' => 'albums', 'action' => 'view', $musique['Album']['id'])); ?>
                </td>
                <td><?php echo h($musique['Musique']['url']); ?>&nbsp;</td>
                <td><?php echo h($musique['Musique']['tags']); ?>&nbsp;</td>
                <td><?php echo h($musique['Musique']['miniature']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($musique['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $musique['Categorie']['id'])); ?>
                </td>
                <td><?php echo h($musique['Musique']['creation']); ?>&nbsp;</td>
                <td><?php echo h($musique['Musique']['modification']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $musique['Musique']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $musique['Musique']['id']), array('class' => 'btn btn-mini')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $musique['Musique']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $musique['Musique']['id'])); ?>
                </td>
            </tr>
        <?php // endforeach; ?>
    </table>-->

    <p><small>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} / {:pages}, {:current} élements sur un total de {:count}, musiques {:start} à {:end}.')
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
