<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tinhtrangsuckho'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tinhtrangsuckhoes index large-9 medium-8 columns content">
    <h3><?= __('Tinhtrangsuckhoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('school_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('khoi_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tong_nhom_lop') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tong_so_tre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_kham_suc_khoe_dinh_ki') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_theo_doi_bd_can_nang') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_theo_doi_bd_chieu_cao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_SDD_the_nhe_can') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so_SDD_the_thap_coi') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tinhtrangsuckhoes as $tinhtrangsuckho): ?>
            <tr>
                <td><?= $this->Number->format($tinhtrangsuckho->id) ?></td>
                <td><?= $tinhtrangsuckho->has('school') ? $this->Html->link($tinhtrangsuckho->school->ten, ['controller' => 'Schools', 'action' => 'view', $tinhtrangsuckho->school->id]) : '' ?></td>
                <td><?= $tinhtrangsuckho->has('khois') ? $this->Html->link($tinhtrangsuckho->khois->tenkhoi, ['controller' => 'Khois', 'action' => 'view', $tinhtrangsuckho->khois->id]) : '' ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->tong_nhom_lop) ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->tong_so_tre) ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->so_kham_suc_khoe_dinh_ki) ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->so_theo_doi_bd_can_nang) ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->so_theo_doi_bd_chieu_cao) ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->so_SDD_the_nhe_can) ?></td>
                <td><?= $this->Number->format($tinhtrangsuckho->so_SDD_the_thap_coi) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tinhtrangsuckho->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tinhtrangsuckho->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tinhtrangsuckho->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tinhtrangsuckho->id)]) ?>
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
