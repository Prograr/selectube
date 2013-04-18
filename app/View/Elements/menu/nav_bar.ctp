<div class="actions">
    <ul class="nav nav-list bs-docs-sidenav">
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Musiques'), array('controller' => 'musiques', 'action' => 'accueil'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Artistes'), array('controller' => 'artistes', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Albums'), array('controller' => 'albums', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> 
<!--        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Videos'), array('controller' => 'videos', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Sites'), array('controller' => 'sites', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> -->
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Catégories'), array('controller' => 'categories', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Communauté'), array('controller' => 'users', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> 
        <!--Menu Partager-->
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager une Musique'), array('controller' => 'musiques', 'action' => 'partager'), array('class' => 'restricted', 'escape' => false)); ?></li>				
<!--        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager une Vidéo'), array('controller' => 'videos', 'action' => 'partager'), array('class' => 'restricted', 'escape' => false)); ?></li>	
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager un Site web'), array('controller' => 'sites', 'action' => 'partager'), array('class' => 'restricted', 'escape' => false)); ?></li>-->
    </ul><!-- .nav nav-list bs-docs-sidenav -->
</div><!-- .actions -->