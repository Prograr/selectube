<!--Fenêtres modales-->
<!--Login modal-->
<?php if (!($this->params['controller'] == "users" && $this->params['action'] == "connexion")) { ?> 
    <div class="modal hide fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="users form">
            <div class="modal-header">
                <a class="close" data-dismiss="modal" aria-hidden="true">×</a>
                <h3 id="loginModalLabel"><?php echo __('Connexion'); ?></h3>
            </div>
            <div class="modal-body">

                <?php echo $this->Form->create('User', array('action' => 'connexion')); ?>
                <?php
                echo $this->Html2->email();
                echo $this->Html2->password();
                echo $this->Form->input('rememberme', array('label' => 'Se souvenir de moi', 'type' => 'checkbox'));
                ?>
            </div>
            <div class="modal-footer">
                <a class="btn" data-dismiss="modal" aria-hidden="true">Fermer</a>
                <?php
                echo $this->Form->button("<i class='icon-unlock'></i> " . __('Connexion'), array('type' => 'submit', 'class' => 'btn btn-primary'));
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
<?php } if (!($this->params['controller'] == "users" && ($this->params['action'] == "inscription" || $this->params['action'] == "creer"))) { ?> 
    <!--inscription modal-->
    <div class="modal hide fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
        <div class="users form">
            <div class="modal-header">
                <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
                <h3 id="usersModalLabel"><?php echo __('Inscription'); ?></h3>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('User', array('action' => 'inscription')); ?>
                <?php
                echo $this->Html2->email();
                echo $this->Html2->password();
                ?>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
                <?php
                echo $this->Form->button("<i class='icon-signin'></i> " . __('Inscription'), array('type' => 'submit', 'class' => 'btn btn-primary'));
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
<?php } ?>
<!--restricted modal-->
<div class="modal hide fade" id="restrictedModal" tabindex="-1" role="dialog" aria-labelledby="restrictedModalLabel" aria-hidden="true">
    <div class="users form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="usersModalLabel"><i class='icon-lock'></i> <?php echo __('Accès interdit'); ?></h3>
        </div>
        <div class="modal-body">
            Vous devez vous connecter ou vous inscrire si vous n'avez pas encore de compte pour accéder à cette fonctionnalité
        </div>
        <div class="modal-footer">
            <a class="btn pull-left" data-dismiss="modal" aria-hidden="true">Fermer</a>
            <a href='/selecteur/inscription' class="btn btn-success" aria-hidden="true"><i class="icon-signin"></i> M'inscrire</a>
            <a href='/selecteur/connexion' class="btn btn-primary" aria-hidden="true"><i class="icon-unlock"></i> Me connecter</a>
        </div>
    </div>
</div>
<!--En travaux-->
<div class="modal hide fade" id="blockedModal" tabindex="-1" role="dialog" aria-labelledby="blockedModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="blockedModalLabel"><i class='icon-lock'></i> <?php echo __('Accès Vérouillé'); ?></h3>
    </div>
    <div class="modal-body">
        <p>
            Cet endroid est bien trop sélect. Désolé<br>
            Vous ne pouvez pas encore accèder à cette partie du site, un jour peut-être...
        </p>
    </div>
    <div class="modal-footer">
        <a class="btn" data-dismiss="modal" aria-hidden="true">Fermer</a>
    </div>
</div>

<!--Catégorie Edition-->
<div class="modal hide fade" id="categorieModal" tabindex="-1" role="dialog" aria-labelledby="categorieModalLabel" aria-hidden="true">
    <div class="categories form">
        <div class="modal-header">
            <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            <h3 id="categoriesModalLabel"><?php echo __('Catégorie'); ?></h3>
        </div>
        <div class="modal-body">
            <?php 
            echo $this->Form->create('Categorie', array('action' => 'editRest'));

            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('titre');
                echo $this->Html->tag('span', $this->Form->label('titre',$this->Html->tag('i', '', array('class' => 'icon-folder-open-alt'))), array('class' => 'add-on'));
                echo $this->Form->input('titre', array('label' => false, 'div' => false));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-categorie'));
            echo $this->Html->tag('/div');

            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('parent_titre', 'Sous-Catégorie de');
                echo $this->Html->tag('span', $this->Form->label('parent_titre',$this->Html->tag('i', '', array('class' => 'icon-sitemap'))), array('class' => 'add-on'));
                echo $this->Form->input('parent_titre', array('label' => false, 'div' => false));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-parentcategorie'));
            echo $this->Html->tag('/div');

            echo $this->Form->hidden('id', array('value' => '0'));
            echo $this->Form->hidden('parent_id', array('value' => '1'));

            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('tags', 'Tags (séparer par des virgules)');
                echo $this->Html->tag('span', $this->Form->label('tags',$this->Html->tag('i', '', array('class' => 'icon-tags'))), array('class' => 'add-on'));
                echo $this->Form->input('tags', array('label' => false, 'div' => false));
            echo $this->Html->tag('/div');
            ?>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
            <?php
            echo $this->Form->button("<i class='icon-save'></i> " . __('Enregistrer'), array('class' => 'btn btn-primary', 'type' =>'submit'));
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>

<!--Artiste Edition-->
<div class="modal hide fade" id="artisteModal" tabindex="-1" role="dialog" aria-labelledby="artisteModalLabel" aria-hidden="true">
    <div class="artistes form">
        <div class="modal-header">
            <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            <h3 id="artistesModalLabel"><?php echo __('Artiste'); ?></h3>
        </div>
        <div class="modal-body">
            <?php 
            echo $this->Form->create('Artiste', array('action' => 'editRest'));

            echo $this->Form->hidden('id', array('value' => '0'));
            
            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('nom');
                echo $this->Html->tag('span', $this->Form->label('nom',$this->Html->tag('i', '', array('class' => 'icon-user'))), array('class' => 'add-on'));
                echo $this->Form->input('nom', array('label' => false, 'div' => false));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-artiste'));
            echo $this->Html->tag('/div');
            
            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('categorie', 'Catégorie');
                echo $this->Html->tag('span', $this->Form->label('categorie',$this->Html->tag('i', '', array('class' => 'icon-sitemap'))), array('class' => 'add-on'));
                echo $this->Form->input('categorie', array('label' => false, 'div' => false, 'type' => 'text'));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-categorie-artiste'));
            echo $this->Html->tag('/div');
            
            echo $this->Form->hidden('categorie_id', array('value' => '1'));
            ?>
            <table>
                <tr>
                    <?php
                    echo $this->Html->tag('td', null);
                        echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                            echo $this->Form->label('pays');
                            echo $this->Html->tag('span', $this->Form->label('pays',$this->Html->tag('i', '', array('class' => 'icon-flag'))), array('class' => 'add-on'));
                            echo $this->Form->input('pays', array('label' => false, 'div' => false));
                        echo $this->Html->tag('/div');
                    echo $this->Html->tag('/td');
            
                    echo $this->Html->tag('td', null);
                        echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                            echo $this->Form->label('ville');
                            echo $this->Html->tag('span', $this->Form->label('ville',$this->Html->tag('i', '', array('class' => 'icon-home'))), array('class' => 'add-on'));
                            echo $this->Form->input('ville', array('label' => false, 'div' => false));
                        echo $this->Html->tag('/div');
                    echo $this->Html->tag('/td');
                    ?>
                </tr>
            </table>
            <?php
                echo $this->Form->input('naissance', array('label' => 'Date de naissance / formation', 'dateFormat' => 'dmY', 'minYear' => date('Y') - 1000, 'maxYear' => date('Y') ));
                echo $this->Form->input('bio', array('label' => "Biographie"));
            ?>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
            <?php
            echo $this->Form->button("<i class='icon-save'></i> " . __('Enregistrer'), array('class' => 'btn btn-primary', 'type' =>'submit'));
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>

<!--Album Edition-->
<div class="modal hide fade" id="albumModal" tabindex="-1" role="dialog" aria-labelledby="albumModalLabel" aria-hidden="true">
    <div class="albums form">
        <div class="modal-header">
            <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            <h3 id="albumsModalLabel"><?php echo __('Album'); ?></h3>
        </div>
        <div class="modal-body">
            <?php 
            echo $this->Form->create('Album', array('action' => 'editRest'));

            echo $this->Form->hidden('id', array('value' => '0'));
            
            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('titre', 'Titre de l\'album');
                echo $this->Html->tag('span', $this->Form->label('titre',$this->Html->tag('i', '', array('class' => 'icon-user'))), array('class' => 'add-on'));
                echo $this->Form->input('titre', array('label' => false, 'div' => false));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-album'));
            echo $this->Html->tag('/div');
            
            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('artiste', 'Artiste / Groupe');
                echo $this->Html->tag('span', $this->Form->label('artiste',$this->Html->tag('i', '', array('class' => 'icon-user'))), array('class' => 'add-on'));
                echo $this->Form->input('artiste', array('label' => false, 'div' => false, 'type' => 'text'));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-artiste-album'));
            echo $this->Html->tag('/div');
            echo $this->Form->hidden('artiste_id', array('value' => '1'));
            
            echo $this->Html->tag('div', null, array('class' => 'input-prepend'));
                echo $this->Form->label('categorie', 'Catégorie');
                echo $this->Html->tag('span', $this->Form->label('categorie',$this->Html->tag('i', '', array('class' => 'icon-sitemap'))), array('class' => 'add-on'));
                echo $this->Form->input('categorie', array('label' => false, 'div' => false, 'type' => 'text'));
                echo $this->Html->tag('i', '', array('class' => '', 'id' => 'icon-exist-categorie-album'));
            echo $this->Html->tag('/div');
            echo $this->Form->hidden('categorie_id', array('value' => '1'));

            echo $this->Form->input('sortie', array('label' => 'Date de sortie', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' => date('Y')));
            ?>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
            <?php
            echo $this->Form->button("<i class='icon-save'></i> " . __('Enregistrer'), array('class' => 'btn btn-primary', 'type' =>'submit'));
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>