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
    <h3><?= h($report->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mã biểu mẫu') ?></th>
            <td><?= $this->Number->format($report->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tên trường') ?></th>
            <td><?= $report->has('school') ? $this->Html->link($report->school->id, ['controller' => 'Schools', 'action' => 'view', $report->school->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phiên bản báo cáo') ?></th>
            <td><?= h($report->phienbanbaocao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số lớp') ?></th>
            <td><?= $this->Number->format($report->solop) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh nam') ?></th>
            <td><?= $this->Number->format($report->hocsinhnam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh nữ') ?></th>
            <td><?= $this->Number->format($report->hocsinhnu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số HS trong độ tuổi') ?></th>
            <td><?= $this->Number->format($report->dansotrongdotuoi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh miễn học phí') ?></th>
            <td><?= $this->Number->format($report->hocsinhmienhocphi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số tiền đã miễn học phí') ?></th>
            <td><?= $this->Number->format($report->sotienmien) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh giảm học phí') ?></th>
            <td><?= $this->Number->format($report->hocsinhgiamhocphi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số tiền đã giảm học phí') ?></th>
            <td><?= $this->Number->format($report->sotiengiam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh nhận học bổng') ?></th>
            <td><?= $this->Number->format($report->hocsinhnhanhocbong) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số tiền cho học bổng') ?></th>
            <td><?= $this->Number->format($report->sotiennhanhocbong) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học giảm so với đầu năm') ?></th>
            <td><?= $this->Number->format($report->hocsinhgiam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lý do giảm so với đầu năm') ?></th>
            <td><?= h($report->lydogiam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh bỏ học') ?></th>
            <td><?= $this->Number->format($report->hocsinhbohoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lý do bỏ học') ?></th>
            <td><?= h($report->lydobo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh bỏ học là nữ') ?></th>
            <td><?= $this->Number->format($report->bohocnu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh bỏ học là hs dân tộc') ?></th>
            <td><?= $this->Number->format($report->bohocdantoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học bị lưu ban') ?></th>
            <td><?= $this->Number->format($report->hocsinhluuban) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học lưu ban là nữ') ?></th>
            <td><?= $this->Number->format($report->hocsinhluubannu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh lưu ban là hs dân tộc') ?></th>
            <td><?= $this->Number->format($report->hocsinhluubandantoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh dự thi tốt nghiệp') ?></th>
            <td><?= $this->Number->format($report->hsduthitotnghiep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh tốt nghiệp') ?></th>
            <td><?= $this->Number->format($report->hstotnghiep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số học sinh tốt nghiệp khá/giỏi') ?></th>
            <td><?= $this->Number->format($report->hstotnghiepkhagioi) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('có nhận chăm sóc di tích lịch sử, văn hóa tại địa phương ?') ?></th>
            <td><?= $report->conhanchamsocdtlsvh ? __('Yes') : __('No'); ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Tên di tích lịch sử, văn hóa tại địa phương được trường nhận chăm sóc') ?></th>
            <td><?= h($report->tendtlsvh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Địa chỉ di tích lịch sử, văn hóa được đơn vị nhận chăm sóc') ?></th>
            <td><?= h($report->diachidtlsvh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ghi chú di tích lịch sử, văn hóa được đơn vị nhận chăm sóc') ?></th>
            <td><?= h($report->ghichudtlsvh) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Có internet') ?></th>
            <td><?= $this->Number->format($report->cointernet) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Nhà cung cấp mạng') ?></th>
            <td><?= h($report->nhamang) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Công nghệ') ?></th>
            <td><?= h($report->congnghe) ?></td>
        </tr>
        
        
        
        
    </table>
</div>
