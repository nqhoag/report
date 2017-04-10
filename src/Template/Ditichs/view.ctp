<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ditich'), ['action' => 'edit', $ditich->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ditich'), ['action' => 'delete', $ditich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ditich->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ditichs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ditich'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ditichs view large-9 medium-8 columns content">
    <h3><?= h($ditich->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Report') ?></th>
            <td><?= $ditich->has('report') ? $this->Html->link($ditich->report->id, ['controller' => 'Reports', 'action' => 'view', $ditich->report->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tenditich') ?></th>
            <td><?= h($ditich->tenditich) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diachi') ?></th>
            <td><?= h($ditich->diachi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ditich->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ghichu') ?></h4>
        <?= $this->Text->autoParagraph(h($ditich->ghichu)); ?>
    </div>
</div>
