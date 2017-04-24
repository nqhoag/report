<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Report'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reports index large-9 medium-8 columns content">
    <h3><?= __('Reports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'Mã') ?></th>
                <th scope="col"><?= $this->Paginator->sort('school_id', 'Mã trường') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phienbanbaocao', "Phiên bản báo cáo") ?></th>
                <th scope="col"><?= $this->Paginator->sort('solop', 'Số lớp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hocsinhnam', 'Số học sinh nam') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hocsinhnu', 'Số học sinh nữ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dansotrongdotuoi', 'Số HS trong độ tuổi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hocsinhmienhocphi', 'Số học sinh miễn học phí') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sotienmien', 'Số tiền đã miễn học phí') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hocsinhgiamhocphi', 'Số học sinh giảm học phí') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sotiengiam', 'Số tiền đã giảm học phí') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hocsinhnhanhocbong', 'Số học sinh nhận học bổng') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sotiennhanhocbong', 'Số tiền cho học bổng') ?></th>
                
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
            <tr>
                <td><?= $this->Number->format($report->id) ?></td>
                <td><?= $report->has('school') ? $this->Html->link($report->school->id, ['controller' => 'Schools', 'action' => 'view', $report->school->id]) : '' ?></td>
                <td><?= h($report->phienbanbaocao) ?></td>
                <td><?= $this->Number->format($report->solop) ?></td>
                <td><?= $this->Number->format($report->hocsinhnam) ?></td>
                <td><?= $this->Number->format($report->hocsinhnu) ?></td>
                <td><?= $this->Number->format($report->dansotrongdotuoi) ?></td>
                <td><?= $this->Number->format($report->hocsinhmienhocphi) ?></td>
                <td><?= $this->Number->format($report->sotienmien) ?></td>
                <td><?= $this->Number->format($report->hocsinhgiamhocphi) ?></td>
                <td><?= $this->Number->format($report->sotiengiam) ?></td>
                <td><?= $this->Number->format($report->hocsinhnhanhocbong) ?></td>
                <td><?= $this->Number->format($report->sotiennhanhocbong) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Trang số {{page}} trong {{pages}} trang, hiển thị {{current}} dòng trong số {{count}} dòng.')]) ?></p>
    </div>
</div>
