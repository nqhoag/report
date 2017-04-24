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
                ['action' => 'delete', $school->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schools form large-9 medium-8 columns content">
    <?= $this->Form->create($school) ?>
    <fieldset>
        <legend><?= __('Edit School') ?></legend>
        <?php
            echo $this->Form->control('ten', [ 'label' => 'Tên trường']);
            echo $this->Form->control('diachi', [ 'label' => 'Địa chỉ']);
            echo $this->Form->control('caphoc_id', [ 'label' => 'cấp học']);
            echo $this->Form->control('loaitruong_id', [ 'label' => 'Loại trường']);
            echo $this->Form->control('namthanhlap', [ 'label' => 'Năm thành lập']);
            echo $this->Form->control('email', [ 'label' => 'Địa chỉ email']);
            echo $this->Form->control('sodienthoai', [ 'label' => 'Số điện thoại']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
