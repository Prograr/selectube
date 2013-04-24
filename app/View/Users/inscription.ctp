<div class="users form">
    <h2>Rejoindre la communauté</h2>
    <div id='inscriptionFacebook'>
        <h3>Inscription via Facebook</h3>
        <?php
            echo $this->Facebook->registration(array(
                'fields' => 'name,email,location',
                'width' => 300,
                'redirect-uri' => 'http://selectube.org/users/creer'
            )); 
        ?>
    </div>
    <!--<div class="span1"></div>-->
    <div id="inscriptionClassique">
        <h3>Inscription normale</h3>
        <?php echo $this->Form->create(); ?>
        <fieldset>
            <?php
            echo $this->Html2->email();
            echo $this->Html2->password();
            ?>
        </fieldset>
        <?php
        echo $this->Form->button("<i class='icon-signin'></i> " . __('Valider'), array('type' => 'submit', 'class' => 'btn btn-primary'));
        echo $this->Form->end();
        ?>
    </div>
</div>