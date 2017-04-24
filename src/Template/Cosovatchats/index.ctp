<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cosovatchat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cosovatchats index large-9 medium-8 columns content">
    <h3><?= __('Cosovatchats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('khoi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kieuphong_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kien_co') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ban_kien_co') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cap_4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phong_tam') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phong_muon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phong_thua') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phong_thieu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phong_xay_moi_trong_nam') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ca_3') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cosovatchats as $cosovatchat): ?>
            <tr>
                <td><?= $this->Number->format($cosovatchat->id) ?></td>
                <td><?= $cosovatchat->has('report') ? $this->Html->link($cosovatchat->report->id, ['controller' => 'Reports', 'action' => 'view', $cosovatchat->report->id]) : '' ?></td>
                <td><?= $cosovatchat->has('khois') ? $this->Html->link($cosovatchat->khois->tenkhoi, ['controller' => 'Khois', 'action' => 'view', $cosovatchat->khois->id]) : '' ?></td>
                <td><?= $this->Number->format($cosovatchat->kieuphong_id) ?></td>
                <td><?= $this->Number->format($cosovatchat->kien_co) ?></td>
                <td><?= $this->Number->format($cosovatchat->ban_kien_co) ?></td>
                <td><?= $this->Number->format($cosovatchat->cap_4) ?></td>
                <td><?= $this->Number->format($cosovatchat->phong_tam) ?></td>
                <td><?= $this->Number->format($cosovatchat->phong_muon) ?></td>
                <td><?= $this->Number->format($cosovatchat->phong_thua) ?></td>
                <td><?= $this->Number->format($cosovatchat->phong_thieu) ?></td>
                <td><?= $this->Number->format($cosovatchat->phong_xay_moi_trong_nam) ?></td>
                <td><?= $this->Number->format($cosovatchat->ca_3) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cosovatchat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cosovatchat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cosovatchat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cosovatchat->id)]) ?>
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
