

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>CAMBIO DE CONTRASEÑA!</h2>
           
        </div>
        <?= $this->Form->create($user, ['novalidate']) ?>
        <fieldset>
            <?php
                echo $this->Form->input('password', ['label' => 'Contraseña', 'value' => '']);
            ?>
        </fieldset>
        <?= $this->Form->button('Editar',['class' => 'btn btn-primary btn-lg btn-block']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>