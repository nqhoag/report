<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ditich->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ditich->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ditichs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ditichs form large-9 medium-8 columns content">
    <?= $this->Form->create($ditich) ?>
    <fieldset>
        <legend><?= __('Edit Ditich') ?></legend>
        <?php
            echo $this->Form->control('report_id', ['options' => $reports]);
            echo $this->Form->control('tenditich');
            echo $this->Form->control('diachi');
            echo $this->Form->control('ghichu');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
