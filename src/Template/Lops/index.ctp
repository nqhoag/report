<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lops index large-9 medium-8 columns content">
    <h3><?= __('Lops') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('school_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('khoi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('solop') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sohocsinh') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lops as $lop): ?>
            <tr>
                <td><?= $this->Number->format($lop->id) ?></td>
                <td><?= $lop->has('school') ? $this->Html->link($lop->school->ten, ['controller' => 'Schools', 'action' => 'view', $lop->school->id]) : '' ?></td>
                <td><?= $lop->has('khois') ? $this->Html->link($lop->khois->id, ['controller' => 'Khois', 'action' => 'view', $lop->khois->id]) : '' ?></td>
                <td><?= $this->Number->format($lop->solop) ?></td>
                <td><?= $this->Number->format($lop->sohocsinh) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lop->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lop->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lop->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
