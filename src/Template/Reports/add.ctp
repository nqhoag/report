<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">
            <?= __('Actions') ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <?php
        echo $this->Form->control('namhoc', ['label' => 'tạo báo cáo cho năm học']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Lưu')) ?>
    <?= $this->Form->end() ?>

</div>
<?= $this->Html->script('common.js') ?>
        