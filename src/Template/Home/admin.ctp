<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="schools view large-12 medium-12 columns content">
    
    <div class="related">
        <h4><?= __('Các báo cáo') ?></h4>
        <?php  if (!empty($reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Năm học báo cáo') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
            <?php foreach ($reports as $report): ?>
            <tr>
                <td><?= $report["dau_nam"] == 1 ?   h("Báo cáo cuối năm ". $report['namhoc'] ." - " . ($report['namhoc'] + 1)) : h("Báo cáo đầu năm ".$report['namhoc']." - " . ($report['namhoc'] + 1)) ?></td>
                <td>
                    <?= $report["da_nhap"] == 0 ? $this->Html->link(__('Tải báo cáo'), ['controller' => 'Home', 'action' => 'export', "year" => $report["namhoc"],
                      "dau_nam" => $report["dau_nam"]]): "Báo cáo chưa hoàn thành" ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
    
    
    
    
</div>
