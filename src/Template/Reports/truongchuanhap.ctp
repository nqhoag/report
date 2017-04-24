<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="reports index large-9 medium-8 columns content">
    <h3><?= __('Reports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ten', 'Tên trường') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diachi', 'Địa chỉ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'Địa chỉ email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sodienthoai', 'Số điện thoại') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
            <tr>
                <td><?= $report->has('school') ? $this->Html->link($report->school->ten, ['controller' => 'Home', 'action' => 'index', $report->school->id]) : '' ?></td>
                <td><?= h($report->school->diachi) ?></td>
                <td><?= h($report->school->email) ?></td>
                <td><?= h($report->school->sodienthoai) ?></td>
                <td class="actions">
                    <?= $this->Html->link(h('Nhập báo cáo'), ['controller' => 'Reports', 'action' => 'view', $report->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
