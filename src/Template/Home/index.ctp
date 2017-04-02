<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete School'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schools view large-9 medium-8 columns content">
    <h3><?= h($school->id) ?></h3>
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mã trường') ?></th>
            <td><?= $this->Number->format($school->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tên trường') ?></th>
            <td><?= h($school->ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Địa chỉ') ?></th>
            <td><?= h($school->diachi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loại trường') ?></th>
            <td><?= h($school->loaitruong->loaitruong) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Địa chỉ email') ?></th>
            <td><?= h($school->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số điện thoại') ?></th>
            <td><?= h($school->sodienthoai) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cấp học') ?></th>
            <td><?= h($school->caphoc->caphoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Năm thành lập') ?></th>
            <td><?= $this->Number->format($school->namthanhlap) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reports') ?></h4>
        <?php if (!empty($school->reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('School Id') ?></th>
                <th scope="col"><?= __('Phienbanbaocao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($school->reports as $reports): ?>
            <tr>
                <td><?= h($reports->id) ?></td>
                <td><?= h($reports->school_id) ?></td>
                <td><?= h($reports->phienbanbaocao) ?></td>
                <td>
                    <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
    <div class="related">
        <h4><?= __('Related Lops') ?></h4>
        <?= $this->Html->link(
            __('Tạo khối lớp'),
            ['controller' => 'Lops', 'action' => 'add', $school->id ],
            ['class' => 'button']
        );  ?>
        <?php if (!empty($lops)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Khối lớp') ?></th>
                <th scope="col"><?= __('Số lớp') ?></th>
                <th scope="col"><?= __('Số học sinh') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lops as $lop): ?>
            <tr>
                <td><?= h($lop->id) ?></td>
                <td><?= h($lop->khois->tenkhoi) ?></td>
                <td><?= h($lop->solop) ?></td>
                <td><?= h($lop->sohocsinh) ?></td>
                <td>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lops', 'action' => 'edit', $lop->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
