<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Report'), ['action' => 'edit', $report->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Report'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reports view large-9 medium-8 columns content">
    <h3><?= h($report->tenbaocao);  ?></h3>
    <h4 >  <?= $this->Html->link(__('Tải Mẫu báo cáo'), ['action' => 'getTemplate', $report->school->caphoc_id], ["style" => "color: blue; text-decoration: underline;"]) ?> </h4>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Tên trường báo cáo') ?></th>
            <td><?= $report->has('school') ? $this->Html->link($report->school->ten, ['controller' => 'Schools', 'action' => 'view', $report->school->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phiên bản báo cáo') ?></th>
            <td><?= h($report->phienbanbaocao) ?></td>
        </tr>
        
        
    </table>

    <div class="related">
        <h4><?= __('Thêm thông tin báo cáo') ?></h4>
        <?= $this->Form->create('upload', ['url' => array('controller' => 'reports', 'action' => 'import', $report->id), 'type' => 'file']); ?>
        Upload File: 
        <!--<input type="file" name="spreadsheet"/>-->
        <?= $this->Form->file('spreadsheet', ['class' => 'form-control input-upload', 'style' => 'height:100px']) ?>
        <?= $this->Form->button(__('Lưu')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

