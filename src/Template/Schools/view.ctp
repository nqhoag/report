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
                <th scope="col"><?= __('Solop') ?></th>
                <th scope="col"><?= __('Hocsinhnam') ?></th>
                <th scope="col"><?= __('Hocsinhnu') ?></th>
                <th scope="col"><?= __('Dansotrongdotuoi') ?></th>
                <th scope="col"><?= __('Hocsinhmienhocphi') ?></th>
                <th scope="col"><?= __('Sotienmien') ?></th>
                <th scope="col"><?= __('Hocsinhgiamhocphi') ?></th>
                <th scope="col"><?= __('Sotiengiam') ?></th>
                <th scope="col"><?= __('Hocsinhnhanhocbong') ?></th>
                <th scope="col"><?= __('Sotiennhanhocbong') ?></th>
                <th scope="col"><?= __('Hocsinhgiam') ?></th>
                <th scope="col"><?= __('Lydogiam') ?></th>
                <th scope="col"><?= __('Hocsinhbohoc') ?></th>
                <th scope="col"><?= __('Lydobo') ?></th>
                <th scope="col"><?= __('Bohocnu') ?></th>
                <th scope="col"><?= __('Bohocdantoc') ?></th>
                <th scope="col"><?= __('Hocsinhluuban') ?></th>
                <th scope="col"><?= __('Hocsinhluubannu') ?></th>
                <th scope="col"><?= __('Hocsinhluubandantoc') ?></th>
                <th scope="col"><?= __('Hsduthitotnghiep') ?></th>
                <th scope="col"><?= __('Hstotnghiep') ?></th>
                <th scope="col"><?= __('Hstotnghiepkhagioi') ?></th>
                <th scope="col"><?= __('Conhanchamsocdtlsvh') ?></th>
                <th scope="col"><?= __('Tendtlsvh') ?></th>
                <th scope="col"><?= __('Diachidtlsvh') ?></th>
                <th scope="col"><?= __('Ghichudtlsvh') ?></th>
                <th scope="col"><?= __('Cointernet') ?></th>
                <th scope="col"><?= __('Nhamang') ?></th>
                <th scope="col"><?= __('Congnghe') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($school->reports as $reports): ?>
            <tr>
                <td><?= h($reports->id) ?></td>
                <td><?= h($reports->school_id) ?></td>
                <td><?= h($reports->phienbanbaocao) ?></td>
                <td><?= h($reports->solop) ?></td>
                <td><?= h($reports->hocsinhnam) ?></td>
                <td><?= h($reports->hocsinhnu) ?></td>
                <td><?= h($reports->dansotrongdotuoi) ?></td>
                <td><?= h($reports->hocsinhmienhocphi) ?></td>
                <td><?= h($reports->sotienmien) ?></td>
                <td><?= h($reports->hocsinhgiamhocphi) ?></td>
                <td><?= h($reports->sotiengiam) ?></td>
                <td><?= h($reports->hocsinhnhanhocbong) ?></td>
                <td><?= h($reports->sotiennhanhocbong) ?></td>
                <td><?= h($reports->hocsinhgiam) ?></td>
                <td><?= h($reports->lydogiam) ?></td>
                <td><?= h($reports->hocsinhbohoc) ?></td>
                <td><?= h($reports->lydobo) ?></td>
                <td><?= h($reports->bohocnu) ?></td>
                <td><?= h($reports->bohocdantoc) ?></td>
                <td><?= h($reports->hocsinhluuban) ?></td>
                <td><?= h($reports->hocsinhluubannu) ?></td>
                <td><?= h($reports->hocsinhluubandantoc) ?></td>
                <td><?= h($reports->hsduthitotnghiep) ?></td>
                <td><?= h($reports->hstotnghiep) ?></td>
                <td><?= h($reports->hstotnghiepkhagioi) ?></td>
                <td><?= h($reports->conhanchamsocdtlsvh) ?></td>
                <td><?= h($reports->tendtlsvh) ?></td>
                <td><?= h($reports->diachidtlsvh) ?></td>
                <td><?= h($reports->ghichudtlsvh) ?></td>
                <td><?= h($reports->cointernet) ?></td>
                <td><?= h($reports->nhamang) ?></td>
                <td><?= h($reports->congnghe) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
