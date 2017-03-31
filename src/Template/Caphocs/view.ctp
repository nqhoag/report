<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Caphoc'), ['action' => 'edit', $caphoc->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caphoc'), ['action' => 'delete', $caphoc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caphoc->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Caphocs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caphoc'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="caphocs view large-9 medium-8 columns content">
    <h3><?= h($caphoc->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Caphoc') ?></th>
            <td><?= h($caphoc->caphoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($caphoc->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Schools') ?></h4>
        <?php if (!empty($caphoc->schools)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ten') ?></th>
                <th scope="col"><?= __('Diachi') ?></th>
                <th scope="col"><?= __('Caphoc Id') ?></th>
                <th scope="col"><?= __('Loaitruong Id') ?></th>
                <th scope="col"><?= __('Namthanhlap') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Sodienthoai') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($caphoc->schools as $schools): ?>
            <tr>
                <td><?= h($schools->id) ?></td>
                <td><?= h($schools->ten) ?></td>
                <td><?= h($schools->diachi) ?></td>
                <td><?= h($schools->caphoc_id) ?></td>
                <td><?= h($schools->loaitruong_id) ?></td>
                <td><?= h($schools->namthanhlap) ?></td>
                <td><?= h($schools->email) ?></td>
                <td><?= h($schools->sodienthoai) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schools', 'action' => 'view', $schools->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schools', 'action' => 'edit', $schools->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schools', 'action' => 'delete', $schools->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schools->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
