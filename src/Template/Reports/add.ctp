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
            echo $this->Form->control('school_id', ['options' => $schools, 'label' => 'Tên trường']);
            echo $this->Form->control('phienbanbaocao', [ 'label' => 'Phiên bản báo cáo']);
            echo $this->Form->control('solop', [ 'label' => 'Số lớp']);
            echo $this->Form->control('hocsinhnam', [ 'label' => 'Số học sinh nam']);
            echo $this->Form->control('hocsinhnu', [ 'label' => 'Số học sinh nữ']);
            echo $this->Form->control('dansotrongdotuoi', [ 'label' => 'Số HS trong đọ tuổi']);
            echo $this->Form->control('hocsinhmienhocphi', [ 'label' => 'Số học sinh miễn học phí']);
            echo $this->Form->control('sotienmien', [ 'label' => 'Số tiền đã miễn học phí']);
            echo $this->Form->control('hocsinhgiamhocphi', [ 'label' => 'Số học sinh giảm học phí']);
            echo $this->Form->control('sotiengiam', [ 'label' => 'Số tiền đã giảm học phí']);
            echo $this->Form->control('hocsinhnhanhocbong', [ 'label' => 'Số học sinh nhận học bổng']);
            echo $this->Form->control('sotiennhanhocbong', [ 'label' => 'Số tiền cho học bổng']);
            echo $this->Form->control('hocsinhgiam', [ 'label' => 'Số học giảm so với đầu năm']);
            echo $this->Form->control('lydogiam', [ 'label' => 'Lý do giảm so với đầu năm']);
            echo $this->Form->control('hocsinhbohoc', [ 'label' => 'Số học sinh bỏ học']);
            echo $this->Form->control('lydobo', [ 'label' => 'Lý do bỏ học']);
            echo $this->Form->control('bohocnu', [ 'label' => 'Số học sinh bỏ học là nữ']);
            echo $this->Form->control('bohocdantoc', [ 'label' => 'Số học sinh bỏ học là hs dân tộc']);
            echo $this->Form->control('hocsinhluuban', [ 'label' => 'Số học bị lưu ban']);
            echo $this->Form->control('hocsinhluubannu', [ 'label' => 'Số học lưu ban là nữ']);
            echo $this->Form->control('hocsinhluubandantoc', [ 'label' => 'Số học sinh lưu ban là hs dân tộc']);
            echo $this->Form->control('hsduthitotnghiep', [ 'label' => 'Số học sinh dự thi tốt nghiệp']);
            echo $this->Form->control('hstotnghiep', [ 'label' => 'Số học sinh tốt nghiệp']);
            echo $this->Form->control('hstotnghiepkhagioi', [ 'label' => 'Số học sinh tốt nghiệp khá/giỏi']);
            echo "<legend>THÔNG TIN BỔ SUNG</legend><br/>";
            echo $this->Form->control('conhanchamsocdtlsvh', [ 'label' => 'có nhận chăm sóc di tích lịch sử, văn hóa tại địa phương ?']);
            echo $this->Form->control('tendtlsvh', [ 'label' => 'Tên di tích lịch sử, văn hóa tại địa phương được trường nhận chăm sóc']);
            echo $this->Form->control('diachidtlsvh', [ 'label' => 'Địa chỉ di tích lịch sử, văn hóa được đơn vị nhận chăm sóc']);
            echo $this->Form->control('ghichudtlsvh', [ 'label' => 'Ghi chú di tích lịch sử, văn hóa được đơn vị nhận chăm sóc']);
            echo $this->Form->control('cointernet', [ 'label' => 'Có internet']);
            echo $this->Form->control('nhamang', [ 'label' => 'Nhà cung cấp mạng']);
            echo $this->Form->control('congnghe', [ 'label' => 'Công nghệ']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Lưu')) ?>
    <?= $this->Form->end() ?>
    
</div>
<?= $this->Html->script('common.js') ?>
<script>
var checkbox1 = new CheckBox("#conhanchamsocdtlsvh", ["#tendtlsvh", "#diachidtlsvh", "#ghichudtlsvh"]);
checkbox1.disableorenable();
var checkbox2 = new CheckBox("#cointernet", ["#nhamang", "#congnghe"]);
checkbox2.disableorenable();
$('#conhanchamsocdtlsvh').change(function() {
     checkbox1.disableorenable();
 });
 $('#cointernet').change(function() {
     checkbox2.disableorenable();
 });
 
var reasion1 = new ReasionOfStudent("#hocsinhgiam", ["#lydogiam"]);
var reasion2 = new ReasionOfStudent("#hocsinhbohoc", ["#lydobo"]);
reasion1.disableorenable();
reasion2.disableorenable();
$('#hocsinhgiam').change(function() {
     reasion1.disableorenable();
 });
 $('#hocsinhbohoc').change(function() {
     reasion2.disableorenable();
 });


</script>