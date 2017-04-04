<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tinhtrangsuckhoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tinhtrangsuckhoes form large-9 medium-8 columns content">
    <?= $this->Form->create($tinhtrangsuckho) ?>
    <fieldset>
        <legend><?= __('Add Tinhtrangsuckho') ?></legend>
        <?php
            echo $this->Form->control('school_id', ['options' => $schools]);
            echo $this->Form->control('khoi_id', ['options' => $khois]);
            echo $this->Form->control('tong_nhom_lop');
            echo $this->Form->control('tong_so_tre');
            echo $this->Form->control('so_kham_suc_khoe_dinh_ki');
            echo $this->Form->control('so_theo_doi_bd_can_nang');
            echo $this->Form->control('so_theo_doi_bd_chieu_cao');
            echo $this->Form->control('so_SDD_the_nhe_can');
            echo $this->Form->control('so_SDD_the_thap_coi');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
