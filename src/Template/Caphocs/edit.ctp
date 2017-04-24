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
                ['action' => 'delete', $caphoc->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $caphoc->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Caphocs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caphocs form large-9 medium-8 columns content">
    <?= $this->Form->create($caphoc) ?>
    <fieldset>
        <legend><?= __('Edit Caphoc') ?></legend>
        <?php
            echo $this->Form->control('caphoc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
