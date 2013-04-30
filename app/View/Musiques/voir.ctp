<div class="musiques voir" id="player">

    <h2 id="playerYoutubeTitre"><?php echo $musique['Musique']['titre']; ?></h2>

    <div id="playerYoutube"><?php echo $this->Youtube->video($musique['Musique']['url']); ?></div>
    
    <?php echo $this->Facebook->comments(array('width' => '624', 'numposts' => 5, "class" => "fb-comments", 'href'=> $this->Html->url(null, true))); ?>
    <div id="playerYoutubeSocial">
    <?php  echo $this->Facebook->sendButton(); ?>
    
    <?php
    echo $this->Facebook->like( array("show_faces" => false, 'layout' => 'button_count'));
//    echo $this->Facebook->share(); 
    ?>
    </div>
    <div id="playerYoutubeDescription" class="musique-meta">
        <strong><i class="icon-edit"></i> Description : </strong>
        <p><?php 
            echo $musique['Musique']['description']; 
        ?></p>
    </div>
    <!--<div id="playerYoutubeUrl"><i class="icon-link"></i> Lien direct : <?php echo $this->Html->link($musique['Musique']['url'], $musique['Musique']['url']); ?></div>-->
    
    <div id="playerYoutubeCategorie" class="musique-meta">
        <strong><i class="icon-folder-open"></i> Catégorie : </strong>
                <?php echo $this->Html->link($musique['Categorie']['titre'], array('controller' => 'categories', 'action' => 'voir', $musique['Categorie']['id']), array('class' => '')); ?>
    </div>
    
    <div id="playerYoutubeArtiste" class="musique-meta">
        <strong><i class="icon-star"></i> Artiste : </strong>
        <?php echo $this->Html->link($musique['Artiste']['nom'], array('controller' => 'artistes', 'action' => 'voir', $musique['Artiste']['id']), array('class' => '')); ?>
    </div>
    
    <div id="playerYoutubeAlbum" class="musique-meta">
        <strong><i class="icon-headphones"></i> Album : </strong>
        <?php echo $this->Html->link($musique['Album']['titre'], array('controller' => 'albums', 'action' => 'voir', $musique['Album']['id']), array('class' => '')); ?>
    </div>
    
    <div id="playerYoutubeTags" class="musique-meta">
        <strong><i class="icon-tags"></i> Mots-clés : </strong>
        <?php 
            if ($musique['Musique']['tags'] != ''){
                $tags="";
                foreach (explode(",", $musique['Musique']['tags']) as $tag) {
                    $tags .= '<span class="label label-info">'.trim($tag).'</span> ';
                }
                echo $tags; 
            }else{
                echo "Aucun";
            }
        ?>
    </div>
    
    <div id="playerYoutubeDate" class="musique-meta">
                <?php 
                echo "<i class=\"icon-share-alt\"></i> Partagé le ".h($this->Html2->print_date($musique['Musique']['created']));
                if ($musique['Musique']['created'] !== $musique['Musique']['modified'])
                    echo ", Modifié le ".h($this->Html2->print_date($musique['Musique']['modified'])); 
                ?>
    </div>
</div><!-- .voir -->