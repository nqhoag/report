<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New School'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schools index large-9 medium-8 columns content">
    <h3><?= __('Schools') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'Mã trường') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ten', 'Tên trường') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diachi', 'Địa chỉ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caphoc_id', 'Cấp học') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loaitruong_id', 'Loại trường') ?></th>
                <th scope="col"><?= $this->Paginator->sort('namthanhlap', 'Năm thành lập') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'Địa chỉ email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sodienthoai', 'Số điện thoại') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            
            
            <?php foreach ($schools as $school): ?>
            <tr>
                <td><?= $this->Number->format($school->id) ?></td>
                <td><?= h($school->ten) ?></td>
                <td><?= h($school->diachi) ?></td>
                <td><?= h($school->caphoc->caphoc) ?></td>
                <td><?= h($school->loaitruong->loaitruong) ?></td>
                <td><?= $this->Number->format($school->namthanhlap) ?></td>
                <td><?= h($school->email) ?></td>
                <td><?= h($school->sodienthoai) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Home', 'action' => 'index', $school->id]) ?>
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
