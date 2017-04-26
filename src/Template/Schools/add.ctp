<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schools form large-9 medium-8 columns content">
    <?= $this->Form->create($school) ?>
    <fieldset>
        <legend><?= __('Add School') ?></legend>
        <?php
            echo $this->Form->control('Schools.ten', [ 'label' => 'Tên trường']);
            echo $this->Form->control('Users.username', [ 'label' => 'Tên đăng nhập']);
            echo $this->Form->control('Schools.diachi', [ 'label' => 'Địa chỉ']);
            echo $this->Form->control('Schools.caphoc_id', [ 'label' => 'cấp học']);
            echo $this->Form->control('Schools.loaitruong_id', [ 'label' => 'Loại trường']);
            echo $this->Form->control('Schools.namthanhlap', [ 'label' => 'Năm thành lập']);
            echo $this->Form->control('Schools.email', [ 'label' => 'Địa chỉ email']);
            echo $this->Form->control('Schools.sodienthoai', [ 'label' => 'Số điện thoại']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
