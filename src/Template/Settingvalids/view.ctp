<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Settingvalid'), ['action' => 'edit', $settingvalid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Settingvalid'), ['action' => 'delete', $settingvalid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settingvalid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settingvalids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Settingvalid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Caphocs'), ['controller' => 'Caphocs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caphoc'), ['controller' => 'Caphocs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settingvalids view large-9 medium-8 columns content">
    <h3><?= h($settingvalid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mapping Table') ?></th>
            <td><?= h($settingvalid->mapping_table) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mapping Column') ?></th>
            <td><?= h($settingvalid->mapping_column) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caphoc') ?></th>
            <td><?= $settingvalid->has('caphoc') ? $this->Html->link($settingvalid->caphoc->caphoc, ['controller' => 'Caphocs', 'action' => 'view', $settingvalid->caphoc->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sheet Name') ?></th>
            <td><?= h($settingvalid->sheet_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cell') ?></th>
            <td><?= h($settingvalid->cell) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validate') ?></th>
            <td><?= h($settingvalid->validate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($settingvalid->id) ?></td>
        </tr>
    </table>
</div>
