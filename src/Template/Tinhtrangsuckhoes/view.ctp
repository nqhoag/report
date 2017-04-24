<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tinhtrangsuckho'), ['action' => 'edit', $tinhtrangsuckho->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tinhtrangsuckho'), ['action' => 'delete', $tinhtrangsuckho->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tinhtrangsuckho->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tinhtrangsuckhoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tinhtrangsuckho'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tinhtrangsuckhoes view large-9 medium-8 columns content">
    <h3><?= h($tinhtrangsuckho->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('School') ?></th>
            <td><?= $tinhtrangsuckho->has('school') ? $this->Html->link($tinhtrangsuckho->school->ten, ['controller' => 'Schools', 'action' => 'view', $tinhtrangsuckho->school->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Khois') ?></th>
            <td><?= $tinhtrangsuckho->has('khois') ? $this->Html->link($tinhtrangsuckho->khois->tenkhoi, ['controller' => 'Khois', 'action' => 'view', $tinhtrangsuckho->khois->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tong Nhom Lop') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->tong_nhom_lop) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tong So Tre') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->tong_so_tre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So Kham Suc Khoe Dinh Ki') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->so_kham_suc_khoe_dinh_ki) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So Theo Doi Bd Can Nang') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->so_theo_doi_bd_can_nang) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So Theo Doi Bd Chieu Cao') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->so_theo_doi_bd_chieu_cao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So SDD The Nhe Can') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->so_SDD_the_nhe_can) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So SDD The Thap Coi') ?></th>
            <td><?= $this->Number->format($tinhtrangsuckho->so_SDD_the_thap_coi) ?></td>
        </tr>
    </table>
</div>
