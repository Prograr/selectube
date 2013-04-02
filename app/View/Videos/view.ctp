<div class="videos view">

    <h2><?php echo __('Video'); ?></h2>

    <table class="table table-striped table-bordered">
        <tr>		<td><strong><?php echo __('User'); ?></strong></td>
            <td>
                <?php echo $this->Html->link($video['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $video['User']['id']), array('class' => '')); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Titre'); ?></strong></td>
            <td>
                <?php echo h($video['Video']['titre']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Description'); ?></strong></td>
            <td>
                <?php echo h($video['Video']['description']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Url'); ?></strong></td>
            <td>
                <?php echo h($video['Video']['url']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Tags'); ?></strong></td>
            <td>
                <?php echo h($video['Video']['tags']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Categorie'); ?></strong></td>
            <td>
                <?php echo $this->Html->link($video['Categorie']['id'], array('controller' => 'categories', 'action' => 'view', $video['Categorie']['id']), array('class' => '')); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Creation'); ?></strong></td>
            <td>
                <?php echo h($video['Video']['creation']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>		<td><strong><?php echo __('Modification'); ?></strong></td>
            <td>
                <?php echo h($video['Video']['modification']); ?>
                &nbsp;
            </td>
        </tr>			</table><!-- .table table-striped table-bordered -->

</div><!-- .view -->
