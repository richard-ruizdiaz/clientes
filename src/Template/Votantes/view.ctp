<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Votante $votante
 */
?><nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('EditVotante'), ['action' => 'edit',$votante->id]) ?> </li>
        <li><?= $this->Form->postLink(__('DeleteVotante'), ['action' => 'delete',$votante->id], ['confirm' => __('Are you sure you want to delete # {0}?',$votante->id)]) ?> </li>
        <li><?= $this->Html->link(__('ListVotantes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('NewVotante'), ['action' => 'add']) ?> </li>        <li><?= $this->Html->link(__('ListUsers'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('NewUser'), ['controller' => 'Users', 'action' => 'add']) ?> </li>    </ul>
</nav>
<div class="votantes view large-9 medium-8 columns content">
    <h3><?= h($votante->nombre) ?></h3>
    <table class="vertical-table">        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $votante->has('user') ? $this->Html->link($votante->user->label, ['controller' => 'Users', 'action' => 'view', $votante->user->id]) : '' ?></td>
        </tr>        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($votante->id) ?></td>
        </tr>    </table>    <div class="row">
        <h4><?= __('Cedula') ?></h4>
        <?= $this->Text->autoParagraph(h($votante->cedula)); ?>
    </div>    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($votante->nombre)); ?>
    </div>    <div class="row">
        <h4><?= __('Direccion') ?></h4>
        <?= $this->Text->autoParagraph(h($votante->direccion)); ?>
    </div>    <div class="row">
        <h4><?= __('Fecha') ?></h4>
        <?= $this->Text->autoParagraph(h($votante->fecha)); ?>
    </div>    <div class="row">
        <h4><?= __('Celular') ?></h4>
        <?= $this->Text->autoParagraph(h($votante->celular)); ?>
    </div></div>
