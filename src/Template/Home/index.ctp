<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <h4>
                                    Trường
                                    <?= h($school->caphoc->caphoc) ?>
                                        <?= h($school->ten) ?>
                                </h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <?= __('Địa chỉ') ?>
                            </th>
                            <td>
                                <?= h($school->diachi) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?= __('Loại trường') ?>
                            </th>
                            <td>
                                <?= h($school->loaitruong->loaitruong) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?= __('Địa chỉ email') ?>
                            </th>
                            <td>
                                <?= h($school->email) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?= __('Số điện thoại') ?>
                            </th>
                            <td>
                                <?= h($school->sodienthoai) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?= __('Cấp học') ?>
                            </th>
                            <td>
                                <?= h($school->caphoc->caphoc) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?= __('Năm thành lập') ?>
                            </th>
                            <td>
                                <?= $this->Time->format($school->namthanhlap, "Y") ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12">
                <?= $this->Html->link(__('Tạo báo cáo mới'), ['controller' => 'reports', 'action' => 'add', $school->id], ['class' => 'btn btn-primary']) ?>
                    <?php if (!empty($school->reports)): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="10">
                                    <h4>
                                        <?= __('Các báo cáo của trường') ?>
                                    </h4>
                                </th>
                            </tr>
                        </thead>
                        <tr>
                            <th scope="col">
                                <?= __('Tên báo cáo') ?>
                            </th>
                            <th scope="col">
                                <?= __('Năm học báo cáo') ?>
                            </th>
                            <th scope="col">
                                Tình trạng
                            </th>
                            <th scope="col" class="actions">
                                <?= __('') ?>
                            </th>
                        </tr>
                        <?php foreach ($school->reports as $reports):  ?>
                        <tr>
                            <td>
                                <?= h($reports->tenbaocao) ?>
                            </td>
                            <td>
                                <?= h($reports->namhoc) ?>
                            </td>
                            <td>
                                <?= h(( $reports->da_nhap_bao_cao !== 1 )? "Đã nhập" : "Chưa nhập") ?>
                            </td>
                            <td>
                                <?= $this->Html->link(__('Nhập báo cáo'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>  
                                <?=  $reports->da_nhap_bao_cao !== 1 ? "| ". $this->Html->link(__('Tải báo cáo đã nhập'), ['controller' => 'Reports', 'action' => 'getLastImport', $reports->id] ) : "" ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
            </div>
        </div>
    </div>