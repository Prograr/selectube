<div class="profil users view">
    <h2><?php echo h(ucfirst($user['User']['pseudo'])); ?></h2>
    <table class="table table-striped table-bordered">
        <tr>		
            <td><strong><?php echo __('Email'); ?></strong></td>
            <td>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		
            <td><strong><?php echo __('Score'); ?></strong></td>
            <td>
                <?php echo h($user['User']['score']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		
            <td><strong><?php echo __('Role'); ?></strong></td>
            <td>
                <?php echo h($user['User']['role']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		
            <td><strong><?php echo __('Inscription'); ?></strong></td>
            <td>
                <?php echo h($user['User']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		
            <td><strong><?php echo __('Dernière connexion'); ?></strong></td>
            <td>
                <?php echo h($user['User']['lastconnect']); ?>
                &nbsp;
            </td>
        </tr>			
    </table><!-- .table table-striped table-bordered -->

</div><!-- .view -->

<div class="related">

    <?php if (!empty($user['Musique'])): ?>
        <h3><?php echo __('Musiques partagées'); ?></h3>
        <?php
        foreach ($musiques as $musique) {
            echo $this->Html2->media($musique);
        }
        ?>

    <?php else: ?>
        <em>Cet utilisateur n'a partagé aucune musique.</em>
    <?php endif; ?>

</div><!-- .related -->

<!--
<div class="related">

    <h3><?php echo __('Sites partagés'); ?></h3>

<?php if (!empty($user['Site'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Nom'); ?></th>
                        <th><?php echo __('Description'); ?></th>
                        <th><?php echo __('Lien'); ?></th>
                        <th><?php echo __('Miniature'); ?></th>
                        <th><?php echo __('Categorie Id'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Site'] as $site):
        ?>
                                <tr>
                                    <td><?php echo $site['nom']; ?></td>
                                    <td><?php echo $site['description']; ?></td>
                                    <td><?php echo $site['lien']; ?></td>
                                    <td><?php echo $site['miniature']; ?></td>
                                    <td><?php echo $site['categorie_id']; ?></td>
                                    <td><?php echo $site['created']; ?></td>
                                    <td><?php echo $site['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'sites', 'action' => 'view', $site['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'sites', 'action' => 'edit', $site['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sites', 'action' => 'delete', $site['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $site['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>
</div> .related 


<div class="related">

    <h3><?php echo __('Videos partagées'); ?></h3>

<?php if (!empty($user['Video'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Titre'); ?></th>
                        <th><?php echo __('Description'); ?></th>
                        <th><?php echo __('Url'); ?></th>
                        <th><?php echo __('Tags'); ?></th>
                        <th><?php echo __('Categorie Id'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Video'] as $video):
        ?>
                                <tr>
                                    <td><?php echo $video['titre']; ?></td>
                                    <td><?php echo $video['description']; ?></td>
                                    <td><?php echo $video['url']; ?></td>
                                    <td><?php echo $video['tags']; ?></td>
                                    <td><?php echo $video['categorie_id']; ?></td>
                                    <td><?php echo $video['created']; ?></td>
                                    <td><?php echo $video['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'videos', 'action' => 'view', $video['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'videos', 'action' => 'edit', $video['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'videos', 'action' => 'delete', $video['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $video['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>

</div> .related 


<div class="related">

    <h3><?php echo __('Categories créées'); ?></h3>

<?php if (!empty($user['Category'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Titre'); ?></th>
                        <th><?php echo __('Parent Id'); ?></th>
                        <th><?php echo __('Url'); ?></th>
                        <th><?php echo __('Tags'); ?></th>
                        <th><?php echo __('Miniature'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Category'] as $category):
        ?>
                                <tr>
                                    <td><?php echo $category['titre']; ?></td>
                                    <td><?php echo $category['parent_id']; ?></td>
                                    <td><?php echo $category['url']; ?></td>
                                    <td><?php echo $category['tags']; ?></td>
                                    <td><?php echo $category['miniature']; ?></td>
                                    <td><?php echo $category['created']; ?></td>
                                    <td><?php echo $category['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $category['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>


    <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div> .actions 

</div> .related 


<div class="related">

    <h3><?php echo __('Albums favoris'); ?></h3>

<?php if (!empty($user['Album'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Titre'); ?></th>
                        <th><?php echo __('Artiste Id'); ?></th>
                        <th><?php echo __('Annee'); ?></th>
                        <th><?php echo __('Jaquette'); ?></th>
                        <th><?php echo __('Categorie Id'); ?></th>
                        <th><?php echo __('User Id'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Album'] as $album):
        ?>
                                <tr>
                                    <td><?php echo $album['id']; ?></td>
                                    <td><?php echo $album['titre']; ?></td>
                                    <td><?php echo $album['artiste_id']; ?></td>
                                    <td><?php echo $album['annee']; ?></td>
                                    <td><?php echo $album['jaquette']; ?></td>
                                    <td><?php echo $album['categorie_id']; ?></td>
                                    <td><?php echo $album['user_id']; ?></td>
                                    <td><?php echo $album['created']; ?></td>
                                    <td><?php echo $album['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'albums', 'action' => 'view', $album['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'albums', 'action' => 'edit', $album['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'albums', 'action' => 'delete', $album['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $album['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>


</div> .related 


<div class="related">

    <h3><?php echo __('Artistes favoris'); ?></h3>

<?php if (!empty($user['Artiste'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Nom'); ?></th>
                        <th><?php echo __('Pays'); ?></th>
                        <th><?php echo __('Ville'); ?></th>
                        <th><?php echo __('Naissance'); ?></th>
                        <th><?php echo __('Bio'); ?></th>
                        <th><?php echo __('Photo'); ?></th>
                        <th><?php echo __('Categorie Id'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Artiste'] as $artiste):
        ?>
                                <tr>
                                    <td><?php echo $artiste['nom']; ?></td>
                                    <td><?php echo $artiste['pays']; ?></td>
                                    <td><?php echo $artiste['ville']; ?></td>
                                    <td><?php echo $artiste['naissance']; ?></td>
                                    <td><?php echo $artiste['bio']; ?></td>
                                    <td><?php echo $artiste['photo']; ?></td>
                                    <td><?php echo $artiste['categorie_id']; ?></td>
                                    <td><?php echo $artiste['created']; ?></td>
                                    <td><?php echo $artiste['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'artistes', 'action' => 'view', $artiste['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'artistes', 'action' => 'edit', $artiste['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'artistes', 'action' => 'delete', $artiste['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $artiste['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>

</div> .related 


<div class="related">

    <h3><?php echo __('Favoris'); ?></h3>

<?php if (!empty($user['Favori'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('User Id'); ?></th>
                        <th><?php echo __('Target Id'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Favori'] as $favori):
        ?>
                                <tr>
                                    <td><?php echo $favori['user_id']; ?></td>
                                    <td><?php echo $favori['target_id']; ?></td>
                                    <td><?php echo $favori['type']; ?></td>
                                    <td><?php echo $favori['created']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'favoris', 'action' => 'view', $favori['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'favoris', 'action' => 'edit', $favori['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'favoris', 'action' => 'delete', $favori['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $favori['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>

</div> .related 


<div class="related">

    <h3><?php echo __('Messages'); ?></h3>

<?php if (!empty($user['Message'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Message'); ?></th>
                        <th><?php echo __('User Id'); ?></th>
                        <th><?php echo __('Destinataire Id'); ?></th>
                        <th><?php echo __('Pj Id'); ?></th>
                        <th><?php echo __('Pj Type'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Message'] as $message):
        ?>
                                <tr>
                                    <td><?php echo $message['message']; ?></td>
                                    <td><?php echo $message['user_id']; ?></td>
                                    <td><?php echo $message['destinataire_id']; ?></td>
                                    <td><?php echo $message['pj_id']; ?></td>
                                    <td><?php echo $message['pj_type']; ?></td>
                                    <td><?php echo $message['created']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'messages', 'action' => 'view', $message['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'messages', 'action' => 'edit', $message['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'messages', 'action' => 'delete', $message['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $message['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>


    <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Message'), array('controller' => 'messages', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div> .actions 

</div> .related 


<div class="related">

    <h3><?php echo __('Moderations'); ?></h3>

<?php if (!empty($user['Moderation'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Approuve'); ?></th>
                        <th><?php echo __('User Id'); ?></th>
                        <th><?php echo __('Target Id'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Moderation'] as $moderation):
        ?>
                                <tr>
                                    <td><?php echo $moderation['approuve']; ?></td>
                                    <td><?php echo $moderation['user_id']; ?></td>
                                    <td><?php echo $moderation['target_id']; ?></td>
                                    <td><?php echo $moderation['type']; ?></td>
                                    <td><?php echo $moderation['created']; ?></td>
                                    <td><?php echo $moderation['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'moderations', 'action' => 'view', $moderation['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'moderations', 'action' => 'edit', $moderation['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'moderations', 'action' => 'delete', $moderation['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $moderation['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>


</div> .related 


<div class="related">

    <h3><?php echo __('Notes'); ?></h3>

<?php if (!empty($user['Note'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Note'); ?></th>
                        <th><?php echo __('Target Id'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th><?php echo __('Creation'); ?></th>
                        <th><?php echo __('Modification'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
    <?php
    $i = 0;
    foreach ($user['Note'] as $note):
        ?>
                                <tr>
                                    <td><?php echo $note['note']; ?></td>
                                    <td><?php echo $note['target_id']; ?></td>
                                    <td><?php echo $note['type']; ?></td>
                                    <td><?php echo $note['created']; ?></td>
                                    <td><?php echo $note['modified']; ?></td>
                                    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'notes', 'action' => 'view', $note['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'notes', 'action' => 'edit', $note['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notes', 'action' => 'delete', $note['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $note['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                </table> .table table-striped table-bordered 

<?php endif; ?>

</div> .related -->
