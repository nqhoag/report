<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ditich'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ditichs index large-9 medium-8 columns content">
    <h3><?= __('Ditichs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tenditich') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diachi') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ditichs as $ditich): ?>
            <tr>
                <td><?= $this->Number->format($ditich->id) ?></td>
                <td><?= $ditich->has('report') ? $this->Html->link($ditich->report->id, ['controller' => 'Reports', 'action' => 'view', $ditich->report->id]) : '' ?></td>
                <td><?= h($ditich->tenditich) ?></td>
                <td><?= h($ditich->diachi) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ditich->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ditich->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ditich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ditich->id)]) ?>
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
