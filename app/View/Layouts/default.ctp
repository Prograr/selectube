<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'Selectube: Amitié-Partage');
$connecte = ($this->Session->read('Auth.User.id') != null);

?>
<?= $this->Facebook->html(); ?>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>

        <!--  meta info -->
        <?php
        echo $this->Html->meta(array("name" => "viewport",
            "content" => "width=device-width,  initial-scale=1.0"));
        echo $this->Html->meta(array("name" => "description",
            "content" => "Partage multimédia"));
        echo $this->Html->meta(array("name" => "author",
            "content" => "florianajir.com - @FlorianAjir"));
//        Open Graph metas
        echo $this->Html->meta(array("name" => "og:title",
            "content" => "Selectube.org - Partage de musique"));
        echo $this->Html->meta(array("name" => "og:type",
            "content" => "website"));
        echo $this->Html->meta(array("name" => "og:url",
            "content" => $this->Html->url( null, true )));
        echo $this->Html->meta(array("name" => "og:locale",
            "content" => "fr_FR"));
        echo $this->Html->meta(array("name" => "og:site_name",
            "content" => "Selectube"));
        echo $this->Html->meta(array("name" => "og:description",
            "content" => "Partagez vos meilleurs découvertes"));
//        echo $this->Html->meta(array("name" => "og:image",
//            "content" => "http://selectube.org/images/logo.jpg"));
//        echo $this->Html->meta(array("name" => "og:image:width",
//            "content" => "180"));
//        echo $this->Html->meta(array("name" => "og:image:height",
//            "content" => "180"));
        echo $this->Html->meta(array("name" => "fb:admins",
            "content" => "448385471909603"));
        echo $this->Html->meta(array("name" => "fb:app_id",
            "content" => "448385471909603"));
        echo $this->Html->meta(array("name" => "twitter:card",
            "content" => "summary"));
//        echo $this->Html->meta(array("name" => "twitter:site",
//            "content" => "@selectube"));
//        echo $this->Html->meta(array("name" => "twitter:creator",
//            "content" => "@selectube"));

        echo $this->Html->meta('icon');

        echo $this->fetch('meta');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('jquery.pnotify.default');
        echo $this->Html->css('jquery.pnotify.default.icons');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('selectube');
        echo $this->Html->css('core');

        echo $this->fetch('css');

        echo $this->Html->script('jquery-1.9.1.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('swfobject');
        echo $this->Html->script('youtube');
        echo $this->Html->script('jquery.pnotify.min');
        echo $this->Html->script('app-helper');
        echo $this->Html->script('init-app');
        if (!$connecte) 
            echo $this->Html->script('lock');
        echo $this->fetch('script');
        ?>
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>

    <body>

        <div id="main-container">

            <div id="header" class="container">
                <?php echo $this->element('menu/top_menu'); ?>
            </div><!-- #header .container -->
            <div class="container-fluid">

                <?php
                $flash = $this->Session->flash();
                if ($flash != "")
                    echo $flash;
                ?>

                <div class="row-fluid">

                    <div class="span12">
                        <ul class="breadcrumb">
                            <li><a href="/">Selectube</a> <span class="divider">/</span></li>
                            <li><a href="/<?php echo($this->params['controller']); ?>"><?php echo(ucfirst($this->params['controller'])); ?></a> <span class="divider">/</span></li>
                            <li class="active"><?php echo(ucfirst($this->params['action'])); ?></li>
                        </ul>
                    </div>

                </div>

            </div><!-- #content .container -->
            <div class="container-fluid">
                <div class="row-fluid">

                    <div class="span3" id="sidebar" >
                        <!--Sidebar content-->
                        <?php echo $this->element('menu/nav_bar'); ?>
                        <?php // echo $this->Facebook->fanbox(array('stream' => true, 'logobar' => true, 'connections' => true)); ?>
                    </div>
                    
                    <div class="span9" id="content-wrapper">
                        <div id="content">
                            <?php echo $this->fetch('content'); ?>
                        </div>
                    </div>
                </div>

            </div><!-- #content .container -->

            <div id="footer" class="container">
                <!--LIKE THE PAGE - FACEBOOK-->
                <div class="fb-like pull-left" id="fb_page_like" data-href="http://selectube.org" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>

                <p class="pull-right"><strong>© Selectube beta 2013</strong></p>
            </div><!-- #footer .container -->

        </div><!-- #main-container -->

        <?php echo $this->element('Modals'); ?>
        <?= $this->Facebook->init(); ?>
    </body>

</html>