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
                ['action' => 'delete', $report->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <legend><?= __('Edit Report') ?></legend>
        <?php
            echo $this->Form->control('school_id', ['options' => $schools]);
            echo $this->Form->control('phienbanbaocao');
            echo $this->Form->control('solop');
            echo $this->Form->control('hocsinhnam');
            echo $this->Form->control('hocsinhnu');
            echo $this->Form->control('dansotrongdotuoi');
            echo $this->Form->control('hocsinhmienhocphi');
            echo $this->Form->control('sotienmien');
            echo $this->Form->control('hocsinhgiamhocphi');
            echo $this->Form->control('sotiengiam');
            echo $this->Form->control('hocsinhnhanhocbong');
            echo $this->Form->control('sotiennhanhocbong');
            echo $this->Form->control('hocsinhgiam');
            echo $this->Form->control('lydogiam');
            echo $this->Form->control('hocsinhbohoc');
            echo $this->Form->control('lydobo');
            echo $this->Form->control('bohocnu');
            echo $this->Form->control('bohocdantoc');
            echo $this->Form->control('hocsinhluuban');
            echo $this->Form->control('hocsinhluubannu');
            echo $this->Form->control('hocsinhluubandantoc');
            echo $this->Form->control('hsduthitotnghiep');
            echo $this->Form->control('hstotnghiep');
            echo $this->Form->control('hstotnghiepkhagioi');
            echo $this->Form->control('conhanchamsocdtlsvh');
            echo $this->Form->control('tendtlsvh');
            echo $this->Form->control('diachidtlsvh');
            echo $this->Form->control('ghichudtlsvh');
            echo $this->Form->control('cointernet');
            echo $this->Form->control('nhamang');
            echo $this->Form->control('congnghe');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
