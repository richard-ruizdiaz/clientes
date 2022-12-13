<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Votante[]|\Cake\Collection\CollectionInterface $votantes
 */
?><nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('NewVotante'), ['action' => 'add']) ?></li>        <li><?= $this->Html->link(__('ListUsers'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('NewUser'), ['controller' => 'Users', 'action' => 'add']) ?></li>    </ul>
</nav>
<div class="votantes index large-9 medium-8 columns content">
    <h3><?= __('Votantes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>                <th scope="col"><?= $this->Paginator->sort('id') ?></th>                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votantes as $votante): ?>
            <tr>                <td><?= $this->Number->format($votante->id) ?></td>                <td><?= $votante->has('user') ? $this->Html->link($votante->user->label, ['controller' => 'Users', 'action' => 'view', $votante->user->id]) : '' ?></td>                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view',$votante->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',$votante->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete',$votante->id], ['confirm' => __('Are you sure you want to delete # {0}?',$votante->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page{{page}} of{{pages}}, showing{{current}} record(s) out of{{count}} total')]) ?></p>
    </div>
</div>
