<?php

namespace App\Controller;

use App\Controller\AppController;

//use \App\Model\Table\SchoolsTable;
/**
 * Schools Controller
 *
 * @property \App\Model\Table\SchoolsTable $Schools
 */
class HomeController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id) {
        $this->loadModel('Schools');
        $this->loadModel('Lops');
        $school = $this->Schools->get($id, [
            'contain' => ['Reports', 'Caphocs', 'Loaitruongs']
        ]);
        $lops = $this->Lops->find('all', ['contain' => ['Khois']])->where(['school_id' => $school->id]);
        $this->set(compact('school'));
        $this->set(compact('lops'));
        $this->set('_serialize', ['school']);
    }

    public function export() {
        $dau_nam = isset($this->request->query['dau_nam']) ? $this->request->query['dau_nam'] : null;
        $year = isset($this->request->query['year']) ? $this->request->query['year'] : null;
        if(empty($dau_nam || empty($year))){
            echo 'giá trị không đúng. Không thể tải xuống.';
        }
        $inputFileName = TEMPLATE_EXCEL_ROOT . 'B3.xlsx';
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $objPHPExcel->getProperties()
                ->setCreator("SGDDT Quang Nam")
                ->setLastModifiedBy("SGDDT Quang Nam");
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0);

        $sheet3 = $this->getDataSheet3($year, $dau_nam);

        foreach ($sheet3 as $columns) {
            $row = null;
            if ($columns["khoi_id"] == 8) {
                switch ($columns["loaitruong_id"]) {
                    case '1':
                        $row = '13';
                        break;
                    case '2':
                        $row = '12';
                        break;
                    case '3':
                        foreach ($columns as $column => $value) {
                            if (!($column == 'loaitruong_id' || $column == 'khoi_id' || $column == 'D'))
                                $objPHPExcel->getActiveSheet()->setCellValue($column . "11", $value);
                        }
                        break;
                    default :
                        break;
                }
            } elseif ($columns["khoi_id"] == 7) {
                switch ($columns["loaitruong_id"]) {
                    case '1':
                        $row = '15';
                        break;
                    case '4':
                        foreach ($columns as $column => $value) {
                            if (!($column == 'loaitruong_id' || $column == 'khoi_id' || $column == 'D'))
                                $objPHPExcel->getActiveSheet()->setCellValue($column . "17", $value);
                        }
                    default :
                        foreach ($columns as $column => $value) {
                            if (!($column == 'loaitruong_id' || $column == 'khoi_id')) {
                                $oldVal = $objPHPExcel->getActiveSheet()->getCell($column . "16")->getValue();
                                $objPHPExcel->getActiveSheet()->setCellValue($column . "16", intval($oldVal) + intval($value));
                            }
                        }
                        break;
                }
            }
            if (!empty($row)) {
                foreach ($columns as $column => $value) {
                    if (!($column == 'loaitruong_id' || $column == 'khoi_id'))
                        $objPHPExcel->getActiveSheet()->setCellValue($column . $row, $value);
                }
            }
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="B3.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    /**
     * return ['1' => ['A2' => '1', 'B2' => '2'], '2' => []];
     */
    private function getDataSheet3($year, $dau_nam) {
//        $year = (date("Y-m-d") < date("Y")."-08-15") ? intval(date("Y")) : date("Y") + 1;
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $sql = "SELECT `schools`.`loaitruong_id` , `tinhtrangsuckhoes`.`khoi_id` ,
                COUNT(`tinhtrangsuckhoes`.`school_id` ) AS D,
                SUM(`tinhtrangsuckhoes`.`tong_nhom_lop`) AS E,
                SUM(`tinhtrangsuckhoes`.`tong_so_tre`) AS F,
                SUM(`tinhtrangsuckhoes`.`so_kham_suc_khoe_dinh_ki`) AS G,
                SUM(`tinhtrangsuckhoes`.`so_theo_doi_bd_can_nang`) AS I,
                SUM(`tinhtrangsuckhoes`.`so_theo_doi_bd_chieu_cao`) AS K,
                SUM(`tinhtrangsuckhoes`.`so_SDD_the_nhe_can`) AS M,
                SUM(`tinhtrangsuckhoes`.`so_SDD_the_thap_coi`) AS O,
                SUM(`cosovatchats`.`kien_co`) AS R,
                SUM(`cosovatchats`.`ban_kien_co`) AS S,
                SUM(`cosovatchats`.`phong_tam`) AS T,
                SUM(`cosovatchats`.`phong_muon`) AS U, 
                SUM(`cosovatchats`.`phong_thua`) AS V,
                SUM(`cosovatchats`.`phong_xay_moi_trong_nam`) AS W 
                FROM `tinhtrangsuckhoes` INNER JOIN `schools` ON `schools`.`id` = `tinhtrangsuckhoes`.`school_id` 
                INNER JOIN `cosovatchats` ON `cosovatchats`.`report_id` = `tinhtrangsuckhoes`.`report_id` AND `cosovatchats`.`khoi_id` = `tinhtrangsuckhoes`.`khoi_id`
                INNER JOIN `reports` ON `tinhtrangsuckhoes`.`report_id` = `reports`.`id`
                WHERE `schools`.`caphoc_id` in ('1', '2', '3') AND `reports`.`namhoc` = '$year' AND `reports`.`dau_nam` = '$dau_nam'
                GROUP BY  `schools`.`loaitruong_id` , `tinhtrangsuckhoes`.`khoi_id`";
        return $conn->query($sql)->fetchAll('assoc');
    }

    public function admin() {
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $sql = "SELECT (CASE WHEN SUM(`da_nhap_bao_cao`) > 0 THEN 1 ELSE 0 END) AS 'da_nhap', `namhoc`, `dau_nam` FROM `reports` GROUP BY `namhoc`, `dau_nam`";
        $this->set('reports', $conn->query($sql)->fetchAll('assoc'));
    }

}
