<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cosovatchat'), ['action' => 'edit', $cosovatchat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cosovatchat'), ['action' => 'delete', $cosovatchat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cosovatchat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cosovatchats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cosovatchat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cosovatchats view large-9 medium-8 columns content">
    <h3><?= h($cosovatchat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Report') ?></th>
            <td><?= $cosovatchat->has('report') ? $this->Html->link($cosovatchat->report->id, ['controller' => 'Reports', 'action' => 'view', $cosovatchat->report->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Khois') ?></th>
            <td><?= $cosovatchat->has('khois') ? $this->Html->link($cosovatchat->khois->tenkhoi, ['controller' => 'Khois', 'action' => 'view', $cosovatchat->khois->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cosovatchat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kieuphong Id') ?></th>
            <td><?= $this->Number->format($cosovatchat->kieuphong_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kien Co') ?></th>
            <td><?= $this->Number->format($cosovatchat->kien_co) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ban Kien Co') ?></th>
            <td><?= $this->Number->format($cosovatchat->ban_kien_co) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cap 4') ?></th>
            <td><?= $this->Number->format($cosovatchat->cap_4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phong Tam') ?></th>
            <td><?= $this->Number->format($cosovatchat->phong_tam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phong Muon') ?></th>
            <td><?= $this->Number->format($cosovatchat->phong_muon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phong Thua') ?></th>
            <td><?= $this->Number->format($cosovatchat->phong_thua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phong Thieu') ?></th>
            <td><?= $this->Number->format($cosovatchat->phong_thieu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phong Xay Moi Trong Nam') ?></th>
            <td><?= $this->Number->format($cosovatchat->phong_xay_moi_trong_nam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ca 3') ?></th>
            <td><?= $this->Number->format($cosovatchat->ca_3) ?></td>
        </tr>
    </table>
</div>
