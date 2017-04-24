<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lop'), ['action' => 'edit', $lop->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lop'), ['action' => 'delete', $lop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lop->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lops'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lop'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lops view large-9 medium-8 columns content">
    <h3><?= h($lop->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('School') ?></th>
            <td><?= $lop->has('school') ? $this->Html->link($lop->school->ten, ['controller' => 'Schools', 'action' => 'view', $lop->school->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Khois') ?></th>
            <td><?= $lop->has('khois') ? $this->Html->link($lop->khois->id, ['controller' => 'Khois', 'action' => 'view', $lop->khois->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lop->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Solop') ?></th>
            <td><?= $this->Number->format($lop->solop) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sohocsinh') ?></th>
            <td><?= $this->Number->format($lop->sohocsinh) ?></td>
        </tr>
    </table>
</div>
