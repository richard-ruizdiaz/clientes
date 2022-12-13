<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Votante $votante
 */
?><nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $votante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $votante->id)]
            )
        ?></li>        <li><?= $this->Html->link(__('ListVotantes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('ListUsers'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('NewUser'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="votantes form large-9 medium-8 columns content">
    <?= $this->Form->create($votante) ?>
    <fieldset>
        <legend><?= __('EditVotante') ?></legend>
        <?php            echo $this->Form->control('cedula');
            echo $this->Form->control('nombre');
            echo $this->Form->control('direccion');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('fecha');
            echo $this->Form->control('celular');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
