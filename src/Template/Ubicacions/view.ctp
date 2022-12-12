<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actiones') ?></li>
        <li><?= $this->Html->link(__('Editar Ubicacion'), ['action' => 'edit', $ubicacion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Ubicacion'), ['action' => 'delete', $ubicacion->id], ['confirm' => __('Desea borrar registro # {0}?', $ubicacion->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listado Ubicacions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Ubicacion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listafo Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ubicacions view large-9 medium-8 columns content">
    <h3><?= h($ubicacion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $ubicacion->has('user') ? $this->Html->link($ubicacion->user->id, ['controller' => 'Users', 'action' => 'view', $ubicacion->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localizacion') ?></th>
            <td><?= h($ubicacion->localizacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($ubicacion->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ubicacion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fechasct') ?></th>
            <td><?= h($ubicacion->fechasct) ?></td>
        </tr>
    </table>
</div>
