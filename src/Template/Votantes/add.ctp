<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
</nav>
<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend>
            <?= __('Agregar Votantes') ?>
        </legend>
        <?php
        echo $this->Form->input('cedula', ['label' => 'Cédula']);
        echo $this->Form->input('nombre', ['label' => 'Nombre']);
        echo $this->Form->input('celular', ['label' => 'Celular']);
        echo $this->Form->input('direccion', ['label' => 'Dirección']);
        ?>
    </fieldset>
    <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
    <?= $this->Form->end() ?>
</div>