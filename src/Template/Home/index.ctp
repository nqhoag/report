<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="schools view large-12 medium-12 columns content">
    <h3><?= h($school->ten) ?></h3>
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Địa chỉ') ?></th>
            <td><?= h($school->diachi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loại trường') ?></th>
            <td><?= h($school->loaitruong->loaitruong) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Địa chỉ email') ?></th>
            <td><?= h($school->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Số điện thoại') ?></th>
            <td><?= h($school->sodienthoai) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cấp học') ?></th>
            <td><?= h($school->caphoc->caphoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Năm thành lập') ?></th>
            <td><?= $this->Number->format($school->namthanhlap) ?></td>
        </tr>
    </table>
    <div class="related">
        
        <h4><?= __('Các báo cáo của trường') ?></h4>
        <?= $this->Html->link(__('Tạo báo cáo mới'), ['controller' => 'reports', 'action' => 'add', $school->id], ['class' => 'button']) ?> 
        <?php if (!empty($school->reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Tên báo cáo') ?></th>
                <th scope="col"><?= __('Năm học báo cáo') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
            <?php foreach ($school->reports as $reports): ?>
            <tr>
                <td><?= h($reports->tenbaocao) ?></td>
                <td><?= h($reports->namhoc) ?></td>
                <td>
                    <?= $this->Html->link(__('Nhập báo cáo'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
    
    
    
    
</div>
