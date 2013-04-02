<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="/"><i class="icon-comments"></i> <?php echo __('Selectube'); ?></a>
            <ul class="nav">
                <li class="divider-vertical"></li>
                <li>
                    <a href="/musiques"><i class="icon-music"></i> Musique</a>
                </li>
                <li>
                    <a href="/videos"><i class="icon-film"></i> Vidéo</a>
                </li>
                <li>
                    <a href="/sites"><i class="icon-globe"></i> Sites</a>
                </li>
                
            </ul>
            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
                <!-- .nav, .navbar-search, .navbar-form, etc -->
            </div>
            
            <form class="navbar-search pull-right">
                    <input type="search" class="search-query" placeholder="Recherche">
                    <button type="submit" id='bouton_recherche' class="btn btn-link"><i class='icon-search'></i>&nbsp;</button>
            </form>
            
            <ul class="nav pull-right">
                <li id="activityMonitor" class="loading-glyph"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <?php 
                        if (!$this->Session->read('Auth.User')) //SI NON CONNECTE
                            echo "<span id='menu_moncompte'><i class='icon-user'></i> Mon espace</span>";
                        else
                            echo "<span id='menu_moncompte'><i class='icon-user'></i> ".$this->Session->read('Auth.User.pseudo')."</span>"; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                        if (!$this->Session->read('Auth.User')){ //SI NON CONNECTE
                        ?>
                        <li><a href='#' data-toggle="modal" data-target="#loginModal"><i class="icon-unlock"></i> Connexion</a></li>
                        <li><a href='/users/inscription'><i class="icon-signin"></i> Inscription</a></li>
                        <?php 
                        }else{ // SI CONNECTE
                        ?>
                        <li><a href='/profils/pseudo/<?php echo $this->Session->read('Auth.User.pseudo') ?>'><i class="icon-edit"></i> Mon profil</a></li>
                        <li><a href='/users/logout'><i class="icon-signout"></i> Déconnexion</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                
                <li class="divider-vertical"></li>
            </ul>
        </div>
    </div>
</div>