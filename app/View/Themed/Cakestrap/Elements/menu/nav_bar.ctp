<?php
$iconlock="";
//if ($lock == "yes")
//    $iconlock = " <i class='icon-lock pull-right'></i> ";
?>
<div class="actions">
    <ul class="nav nav-list bs-docs-sidenav">
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Musique'), array('controller' => 'musiques', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Artistes'), array('controller' => 'artistes', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Albums'), array('controller' => 'albums', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Videos'), array('controller' => 'videos', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Sites'), array('controller' => 'sites', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Sélecteurs'), array('controller' => 'users', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
    </ul>

    <ul class="nav nav-list bs-docs-sidenav">
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager une Musique'), array('controller' => 'musiques', 'action' => 'add'), array('class' => 'restricted', 'escape' => false)); ?></li>				
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager une Vidéo'), array('controller' => 'videos', 'action' => 'add'), array('class' => 'restricted', 'escape' => false)); ?></li>	
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager un Site web'), array('controller' => 'sites', 'action' => 'add'), array('class' => 'restricted', 'escape' => false)); ?></li>
    </ul><!-- .nav nav-list bs-docs-sidenav -->
</div><!-- .actions -->