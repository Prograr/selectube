<div class="actions">
    <ul class="nav nav-list bs-docs-sidenav">
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Musique'), array('controller' => 'musiques', 'action' => 'accueil'), array('class' => '', 'escape' => false)); ?></li> 
<!--        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Artistes'), array('controller' => 'artistes', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Albums'), array('controller' => 'albums', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Videos'), array('controller' => 'videos', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Sites'), array('controller' => 'sites', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> 
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '', 'escape' => false)); ?></li> -->
        <li><?php echo $this->Html->link("<i class='icon-list'></i> " . __('Lister les Sélecteurs'), array('controller' => 'users', 'action' => 'liste'), array('class' => '', 'escape' => false)); ?></li> 
        <!--Menu Partager-->
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager une Musique'), array('controller' => 'musiques', 'action' => 'partager'), array('class' => 'restricted', 'escape' => false)); ?></li>				
<!--        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager une Vidéo'), array('controller' => 'videos', 'action' => 'partager'), array('class' => 'restricted', 'escape' => false)); ?></li>	
        <li><?php echo $this->Html->link("<i class='icon-share'></i> " . __('Partager un Site web'), array('controller' => 'sites', 'action' => 'partager'), array('class' => 'restricted', 'escape' => false)); ?></li>-->
    </ul><!-- .nav nav-list bs-docs-sidenav -->
</div><!-- .actions -->