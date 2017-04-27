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
    
    public function admin() {
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $sql = "SELECT (CASE WHEN SUM(`da_nhap_bao_cao`) > 0 THEN 1 ELSE 0 END) AS 'da_nhap', `namhoc`, `dau_nam` FROM `reports` GROUP BY `namhoc`, `dau_nam`";
        $this->set('reports', $conn->query($sql)->fetchAll('assoc'));
    }

    public function export() {
        $dau_nam = isset($this->request->query['dau_nam']) ? $this->request->query['dau_nam'] : null;
        $year = isset($this->request->query['year']) ? $this->request->query['year'] : null;
        if (is_null($dau_nam || is_null($year))) {
            echo 'giá trị không đúng. Không thể tải xuống.';
            exit;
        }
        $inputFileName = TEMPLATE_EXCEL_ROOT . 'export.xls';
        $inputFileType = \PHPExcel_IOFactory::identify($inputFileName);
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $objPHPExcel->getProperties()
                ->setCreator("SGDDT Quang Nam")
                ->setLastModifiedBy("SGDDT Quang Nam");
        $this->generateSheet3($objPHPExcel, $year, $dau_nam);
        $this->generateSheet1($objPHPExcel, $year, $dau_nam);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="export.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, $inputFileType);
        $objWriter->save('php://output');
        exit;
    }

    /**
     * return ['1' => ['A2' => '1', 'B2' => '2'], '2' => []];
     */
    private function getDataSheet3($year, $dau_nam) {
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $sql = "SELECT `schools`.`loaitruong_id` , `tinhtrangsuckhoes`.`khoi_id` , COUNT(`tinhtrangsuckhoes`.`school_id` ) AS D,
                SUM(`tinhtrangsuckhoes`.`tong_nhom_lop`) AS E, SUM(`tinhtrangsuckhoes`.`tong_so_tre`) AS F,
                SUM(`tinhtrangsuckhoes`.`so_kham_suc_khoe_dinh_ki`) AS G, SUM(`tinhtrangsuckhoes`.`so_theo_doi_bd_can_nang`) AS I,
                SUM(`tinhtrangsuckhoes`.`so_theo_doi_bd_chieu_cao`) AS K, SUM(`tinhtrangsuckhoes`.`so_SDD_the_nhe_can`) AS M,
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

    private function generateSheet3(&$objPHPExcel, $year, $dau_nam) {
        // Add some data
        $objPHPExcel->setActiveSheetIndex(3);

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
    }
    
    
    /**
     * return ['1' => ['A2' => '1', 'B2' => '2'], '2' => []];
     */
    private function getDataSheet1School($year, $dau_nam) {
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $sql = "SELECT `schools`.`caphoc_id`, `reports`.`namhoc` AS 'None', `reports`.`dau_nam` AS 'None', 'None' AS 'khoi_id',
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` = '1' THEN `schools`.`id` ELSE 0 END) AS E,
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `schools`.`id` ELSE 0 END) AS F,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `hocsinhs`.`tong_so_lop` ELSE 0 END) AS H,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `hocsinhs`.`tong_so_lop` ELSE 0 END) AS I,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `hocsinhs`.`tong_so_hs` ELSE 0 END) AS K,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `hocsinhs`.`tong_so_hs` ELSE 0 END) AS L
                FROM `reports` INNER JOIN `schools` ON `reports`.`school_id` = `schools`.`id`
                INNER JOIN `hocsinhs` ON `reports`.`id` = `hocsinhs`.`report_id`
                WHERE  `reports`.`namhoc` = '$year' AND `reports`.`dau_nam` = '$dau_nam' 
                GROUP BY  `schools`.`caphoc_id`, `reports`.`namhoc`, `reports`.`dau_nam`
                
                UNION
                
                SELECT 'None' AS 'caphoc_id', `reports`.`namhoc` AS 'None', `reports`.`dau_nam` AS 'None', `tinhtrangsuckhoes`.`khoi_id`,
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` = '1' THEN `schools`.`id` ELSE 0 END) AS E,
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `schools`.`id` ELSE 0 END) AS F,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `tinhtrangsuckhoes`.`tong_nhom_lop` ELSE 0 END) AS H,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `tinhtrangsuckhoes`.`tong_nhom_lop` ELSE 0 END) AS I,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `tinhtrangsuckhoes`.`tong_so_tre` ELSE 0 END) AS K,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `tinhtrangsuckhoes`.`tong_so_tre` ELSE 0 END) AS L
                FROM `reports` INNER JOIN `schools` ON `reports`.`school_id` = `schools`.`id`
                INNER JOIN `tinhtrangsuckhoes` ON `reports`.`id` = `tinhtrangsuckhoes`.`report_id`
                WHERE  `reports`.`namhoc` = '$year' AND `reports`.`dau_nam` = '$dau_nam' 
                GROUP BY  `reports`.`namhoc`, `reports`.`dau_nam`, `tinhtrangsuckhoes`.`khoi_id`";
        return $conn->query($sql)->fetchAll('assoc');
    }
    
    /**
     * return ['1' => ['A2' => '1', 'B2' => '2'], '2' => []];
     */
    private function getDataSheet1Increse($year, $dau_nam) {
        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $sql = "SELECT `schools`.`caphoc_id`, `reports`.`namhoc` AS 'None', `reports`.`dau_nam` AS 'None', 'None' AS 'khoi_id',
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` = '1' THEN `schools`.`id` ELSE 0 END) AS E,
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `schools`.`id` ELSE 0 END) AS F,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `hocsinhs`.`tong_so_lop` ELSE 0 END) AS H,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `hocsinhs`.`tong_so_lop` ELSE 0 END) AS I,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `hocsinhs`.`tong_so_hs` ELSE 0 END) AS K,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `hocsinhs`.`tong_so_hs` ELSE 0 END) AS L
                FROM `reports` INNER JOIN `schools` ON `reports`.`school_id` = `schools`.`id`
                INNER JOIN `hocsinhs` ON `reports`.`id` = `hocsinhs`.`report_id`
                WHERE  `reports`.`namhoc` = '$year' AND `reports`.`dau_nam` = '$dau_nam' 
                GROUP BY  `schools`.`caphoc_id`, `reports`.`namhoc`, `reports`.`dau_nam`
                
                UNION
                
                SELECT 'None' AS 'caphoc_id', `reports`.`namhoc` AS 'None', `reports`.`dau_nam` AS 'None', `tinhtrangsuckhoes`.`khoi_id`,
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` = '1' THEN `schools`.`id` ELSE 0 END) AS E,
                COUNT(DISTINCT CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `schools`.`id` ELSE 0 END) AS F,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `tinhtrangsuckhoes`.`tong_nhom_lop` ELSE 0 END) AS H,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `tinhtrangsuckhoes`.`tong_nhom_lop` ELSE 0 END) AS I,
                SUM( CASE WHEN `schools`.`loaitruong_id` = '1' THEN `tinhtrangsuckhoes`.`tong_so_tre` ELSE 0 END) AS K,
                SUM( CASE WHEN `schools`.`loaitruong_id` <> '1' THEN `tinhtrangsuckhoes`.`tong_so_tre` ELSE 0 END) AS L
                FROM `reports` INNER JOIN `schools` ON `reports`.`school_id` = `schools`.`id`
                INNER JOIN `tinhtrangsuckhoes` ON `reports`.`id` = `tinhtrangsuckhoes`.`report_id`
                WHERE  `reports`.`namhoc` = '$year' AND `reports`.`dau_nam` = '$dau_nam' 
                GROUP BY  `reports`.`namhoc`, `reports`.`dau_nam`, `tinhtrangsuckhoes`.`khoi_id`";
        return $conn->query($sql)->fetchAll('assoc');
    }

    private function generateSheet1(&$objPHPExcel, $year, $dau_nam) {
        // Add some data
        $objPHPExcel->setActiveSheetIndex(1);

        $sheet1 = $this->getDataSheet1($year, $dau_nam);

        foreach ($sheet1 as $columns) {
            $row = null;
            if ($columns["khoi_id"] == 'None') {
                switch ($columns["caphoc_id"]) {
                    case '2':
                        $row = '14';
                        break;
                    case '5':
                        $row = '16';
                        break;
                    case '6':
                        $row = '18';
                        break;
                    default :
                        break;
                }
            } else {
                switch ($columns["khoi_id"]) {
                    case '8':
                        $row = '10';
                        break;
                    case '7':
                        $row = '12';
                        break;
                    default :
                        break;
                }
            }
            
            if (!empty($row)) {
                foreach ($columns as $column => $value) {
                    if (!($column == 'caphoc_id' || $column == 'khoi_id' || $column == 'None'))
                        $objPHPExcel->getActiveSheet()->setCellValue($column . $row, $value);
                }
            }
        }
    }

    

}
