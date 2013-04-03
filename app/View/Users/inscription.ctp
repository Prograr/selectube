<div class="users form">
    <div id="inscriptionClassique">
    <?php echo $this->Form->create(); ?>
    <fieldset>
        <legend><?php echo __('Inscription'); ?></legend>
        <?php
        echo $this->Html2->email();
        echo $this->Html2->password();
        ?>
    </fieldset>
    <?php
    echo $this->Form->button("<i class='icon-signin'></i> ".__('Valider'), array('type' => 'submit', 'class' => 'btn btn-primary'));
    echo $this->Form->end();
    ?>
    </div>
</div>