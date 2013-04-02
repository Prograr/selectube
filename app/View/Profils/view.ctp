<div class="profils view">

    <h2><?php echo __('Profil'); ?></h2>

    <table class="table table-striped table-bordered">
        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
            <td>
                <?php echo h($profil['Profil']['id']); ?>
                &nbsp;
            </td>
        </tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
            <td>
                <?php echo $this->Html->link($profil['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $profil['User']['id']), array('class' => '')); ?>
                &nbsp;
            </td>
        </tr><tr>		<td><strong><?php echo __('Public'); ?></strong></td>
            <td>
                <?php echo h($profil['Profil']['public']); ?>
                &nbsp;
            </td>
        </tr><tr>		<td><strong><?php echo __('Avatar'); ?></strong></td>
            <td>
                <?php echo h($profil['Profil']['avatar']); ?>
                &nbsp;
            </td>
        </tr><tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
            <td>
                <?php echo h($profil['Profil']['creation']); ?>
                &nbsp;
            </td>
        </tr><tr>		<td><strong><?php echo __('Modification'); ?></strong></td>
            <td>
                <?php echo h($profil['Profil']['modification']); ?>
                &nbsp;
            </td>
        </tr>			</table><!-- .table table-striped table-bordered -->

</div><!-- .view -->