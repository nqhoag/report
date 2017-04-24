<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cosovatchats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Khois'), ['controller' => 'Khois', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khois'), ['controller' => 'Khois', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cosovatchats form large-9 medium-8 columns content">
    <?= $this->Form->create($cosovatchat) ?>
    <fieldset>
        <legend><?= __('Add Cosovatchat') ?></legend>
        <?php
            echo $this->Form->control('report_id', ['options' => $reports]);
            echo $this->Form->control('khoi_id', ['options' => $khois]);
            echo $this->Form->control('kieuphong_id');
            echo $this->Form->control('kien_co');
            echo $this->Form->control('ban_kien_co');
            echo $this->Form->control('cap_4');
            echo $this->Form->control('phong_tam');
            echo $this->Form->control('phong_muon');
            echo $this->Form->control('phong_thua');
            echo $this->Form->control('phong_thieu');
            echo $this->Form->control('phong_xay_moi_trong_nam');
            echo $this->Form->control('ca_3');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
