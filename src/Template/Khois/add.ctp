<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Khois'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Caphocs'), ['controller' => 'Caphocs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caphoc'), ['controller' => 'Caphocs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="khois form large-9 medium-8 columns content">
    <?= $this->Form->create($khois) ?>
    <fieldset>
        <legend><?= __('Add Khois') ?></legend>
        <?php
            echo $this->Form->control('caphoc_id', ['options' => $caphocs]);
            echo $this->Form->control('tenkhoi');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
