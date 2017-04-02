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
        <?php
            echo "<legend>THÔNG TIN HỌC SINH</legend>";
            echo $this->Form->control('Reports.school_id', ['options' => $schools, 'label' => 'Tên trường']);
            echo $this->Form->control('Reports.phienbanbaocao', [ 'label' => 'Phiên bản báo cáo']);
            echo $this->Form->control('Reports.solop', [ 'label' => 'Số lớp']);
            ?>
        <table>
            <legend><?= __('Số lớp') ?></legend>
            <tr>
                <th scope="col"><?= __('Khối lớp') ?></th>
                <th scope="col"><?= __('Số lớp') ?></th>
                <th scope="col"><?= __('Số học sinh') ?></th>
            </tr>
                <?php
                var_dump($lops);
                    foreach ($lops as $key => $khoi){ 
                ?>
            <tr>
                                <?= $this->Form->hidden('Lops.'. $key .'.school_id', ['value'=>$schools->id]) ?>
                                <?= $this->Form->hidden('Lops.'. $key .'.khoi_id', ['value'=>$khoi->khoi_id]) ?>
                <td>
                                <?= $this->Form->input('Lops.'. $key .'.tenkhoi', ['value' => $khoi->khois->tenkhoi, 'disabled' => true]) ?>
                </td>   
                <td>    
                                <?= $this->Form->control('Lops.'. $key .'.solop') ?>
                </td>
                <td>
                                <?= $this->Form->control('Lops.'. $key .'.sohocsinh', ['class' => 'input number require']) ?>
                </td>
                <?php    
                    }
                ?>
        </table>

            <?php
            echo $this->Form->control('Reports.hocsinhnam', [ 'label' => 'Số học sinh nam']);
            echo $this->Form->control('Reports.hocsinhnu', [ 'label' => 'Số học sinh nữ']);
            echo $this->Form->control('Reports.dansotrongdotuoi', [ 'label' => 'Số HS trong đọ tuổi']);
            echo $this->Form->control('Reports.hocsinhmienhocphi', [ 'label' => 'Số học sinh miễn học phí']);
            echo $this->Form->control('Reports.sotienmien', [ 'label' => 'Số tiền đã miễn học phí']);
            echo $this->Form->control('Reports.hocsinhgiamhocphi', [ 'label' => 'Số học sinh giảm học phí']);
            echo $this->Form->control('Reports.sotiengiam', [ 'label' => 'Số tiền đã giảm học phí']);
            echo $this->Form->control('Reports.hocsinhnhanhocbong', [ 'label' => 'Số học sinh nhận học bổng']);
            echo $this->Form->control('Reports.sotiennhanhocbong', [ 'label' => 'Số tiền cho học bổng']);
            echo $this->Form->control('Reports.hocsinhgiam', [ 'label' => 'Số học giảm so với đầu năm']);
            echo $this->Form->control('Reports.lydogiam', [ 'label' => 'Lý do giảm so với đầu năm']);
            echo $this->Form->control('Reports.hocsinhbohoc', [ 'label' => 'Số học sinh bỏ học']);
            echo $this->Form->control('Reports.lydobo', [ 'label' => 'Lý do bỏ học']);
            echo $this->Form->control('Reports.bohocnu', [ 'label' => 'Số học sinh bỏ học là nữ']);
            echo $this->Form->control('Reports.bohocdantoc', [ 'label' => 'Số học sinh bỏ học là hs dân tộc']);
            echo $this->Form->control('Reports.hocsinhluuban', [ 'label' => 'Số học bị lưu ban']);
            echo $this->Form->control('Reports.hocsinhluubannu', [ 'label' => 'Số học lưu ban là nữ']);
            echo $this->Form->control('Reports.hocsinhluubandantoc', [ 'label' => 'Số học sinh lưu ban là hs dân tộc']);
            echo $this->Form->control('Reports.hsduthitotnghiep', [ 'label' => 'Số học sinh dự thi tốt nghiệp']);
            echo $this->Form->control('Reports.hstotnghiep', [ 'label' => 'Số học sinh tốt nghiệp']);
            echo $this->Form->control('Reports.hstotnghiepkhagioi', [ 'label' => 'Số học sinh tốt nghiệp khá/giỏi']);
            echo "<legend>THÔNG TIN BỔ SUNG</legend><br/>";
            echo $this->Form->control('Reports.conhanchamsocdtlsvh', [ 'label' => 'có nhận chăm sóc di tích lịch sử, văn hóa tại địa phương ?']);
            echo $this->Form->control('Reports.tendtlsvh', [ 'label' => 'Tên di tích lịch sử, văn hóa tại địa phương được trường nhận chăm sóc']);
            echo $this->Form->control('Reports.diachidtlsvh', [ 'label' => 'Địa chỉ di tích lịch sử, văn hóa được đơn vị nhận chăm sóc']);
            echo $this->Form->control('Reports.ghichudtlsvh', [ 'label' => 'Ghi chú di tích lịch sử, văn hóa được đơn vị nhận chăm sóc']);
            echo $this->Form->control('Reports.cointernet', [ 'label' => 'Có internet']);
            echo $this->Form->control('Reports.nhamang', [ 'label' => 'Nhà cung cấp mạng']);
            echo $this->Form->control('Reports.congnghe', [ 'label' => 'Công nghệ']);
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