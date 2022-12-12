<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ubicacions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ubicacions form large-9 medium-8 columns content">
    <?= $this->Form->create($ubicacion) ?>
    <fieldset>
        <legend><?= __('Add Ubicacion') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('localizacion');
            echo $this->Form->input('ip');
            echo $this->Form->input('fechasct');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
