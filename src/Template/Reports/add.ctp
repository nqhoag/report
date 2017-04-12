<?php

/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <h2><?= $this->Html->link($schools->ten, ['controller' => 'Schools', 'action' => 'view', $schools->id]) ?></h2>
        <?php
            echo $this->Form->control('namhoc', [ 'label' => 'tạo báo cáo cho năm học']);
            ?>
        

    </fieldset>
    <?= $this->Form->button(__('Lưu')) ?>
    <?= $this->Form->end() ?>

</div>
<?= $this->Html->script('common.js') ?>
<script>
    var checkbox1 = new CheckBox("#reports-conhanchamsocdtlsvh", ["#reports-tendtlsvh", "#reports-diachidtlsvh", "#reports-ghichudtlsvh"]);
    checkbox1.disableorenable();
    var checkbox2 = new CheckBox("#reports-cointernet", ["#reports-nhamang", "#reports-congnghe"]);
    checkbox2.disableorenable();
    $('#reports-conhanchamsocdtlsvh').change(function () {
        checkbox1.disableorenable();
    });
    $('#reports-cointernet').change(function () {
        checkbox2.disableorenable();
    });

    var reasion1 = new ReasionOfStudent("#reports-hocsinhgiam", ["#reports-lydogiam"]);
    var reasion2 = new ReasionOfStudent("#reports-hocsinhbohoc", ["#reports-lydobo"]);
    reasion1.disableorenable();
    reasion2.disableorenable();
    $('#reports-hocsinhgiam').change(function () {
        reasion1.disableorenable();
    });
    $('#reports-hocsinhbohoc').change(function () {
        reasion2.disableorenable();
    });


</script>