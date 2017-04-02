<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lop->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lop->id)]
            )
        ?></li>
        
    </ul>
</nav>
<div class="lops form large-9 medium-8 columns content">
    <?= $this->Form->create($lop) ?>
    <fieldset>
        <legend><?= __('Edit Lop') ?></legend>
        <?php
            echo $this->Form->input('school_name', ['value' => $schools->ten, 'disabled' => 'true']);
            echo $this->Form->hidden('school_id', ['value'=>$schools->id]);
            echo $this->Form->control('khoi_id', ['options' => $khois]);
            echo $this->Form->control('solop');
            echo $this->Form->control('sohocsinh');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
