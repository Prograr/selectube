<div class="users form">
    <div id="inscriptionClassique">
        <?php echo $this->Form->create(); ?>
        <fieldset>
            <legend><?php echo __('Inscription'); ?></legend>
            <?php
            echo $this->Html2->email(array('value' => $facebook_email));
            echo $this->Html2->password();
            ?>
            <?php
//            $this->Facebook->registration(array(
//                'fields' => 'name,email,location,gender,favorite_team',
//                'width' => '500'
//            ));
            ?>
        </fieldset>
        <?php
        echo $this->Form->button("<i class='icon-signin'></i> " . __('Valider'), array('type' => 'submit', 'class' => 'btn btn-primary'));
        echo $this->Form->end();
        ?>
    </div>
</div>