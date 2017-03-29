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
            <th scope="row"><?= __('School') ?></th>
            <td><?= $report->has('school') ? $this->Html->link($report->school->id, ['controller' => 'Schools', 'action' => 'view', $report->school->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phienbanbaocao') ?></th>
            <td><?= h($report->phienbanbaocao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lydogiam') ?></th>
            <td><?= h($report->lydogiam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lydobo') ?></th>
            <td><?= h($report->lydobo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tendtlsvh') ?></th>
            <td><?= h($report->tendtlsvh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diachidtlsvh') ?></th>
            <td><?= h($report->diachidtlsvh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ghichudtlsvh') ?></th>
            <td><?= h($report->ghichudtlsvh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nhamang') ?></th>
            <td><?= h($report->nhamang) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Congnghe') ?></th>
            <td><?= h($report->congnghe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($report->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Solop') ?></th>
            <td><?= $this->Number->format($report->solop) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhnam') ?></th>
            <td><?= $this->Number->format($report->hocsinhnam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhnu') ?></th>
            <td><?= $this->Number->format($report->hocsinhnu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dansotrongdotuoi') ?></th>
            <td><?= $this->Number->format($report->dansotrongdotuoi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhmienhocphi') ?></th>
            <td><?= $this->Number->format($report->hocsinhmienhocphi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sotienmien') ?></th>
            <td><?= $this->Number->format($report->sotienmien) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhgiamhocphi') ?></th>
            <td><?= $this->Number->format($report->hocsinhgiamhocphi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sotiengiam') ?></th>
            <td><?= $this->Number->format($report->sotiengiam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhnhanhocbong') ?></th>
            <td><?= $this->Number->format($report->hocsinhnhanhocbong) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sotiennhanhocbong') ?></th>
            <td><?= $this->Number->format($report->sotiennhanhocbong) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhgiam') ?></th>
            <td><?= $this->Number->format($report->hocsinhgiam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhbohoc') ?></th>
            <td><?= $this->Number->format($report->hocsinhbohoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bohocnu') ?></th>
            <td><?= $this->Number->format($report->bohocnu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bohocdantoc') ?></th>
            <td><?= $this->Number->format($report->bohocdantoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhluuban') ?></th>
            <td><?= $this->Number->format($report->hocsinhluuban) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhluubannu') ?></th>
            <td><?= $this->Number->format($report->hocsinhluubannu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hocsinhluubandantoc') ?></th>
            <td><?= $this->Number->format($report->hocsinhluubandantoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hsduthitotnghiep') ?></th>
            <td><?= $this->Number->format($report->hsduthitotnghiep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hstotnghiep') ?></th>
            <td><?= $this->Number->format($report->hstotnghiep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hstotnghiepkhagioi') ?></th>
            <td><?= $this->Number->format($report->hstotnghiepkhagioi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cointernet') ?></th>
            <td><?= $this->Number->format($report->cointernet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conhanchamsocdtlsvh') ?></th>
            <td><?= $report->conhanchamsocdtlsvh ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
