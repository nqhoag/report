<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class DemoController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('Report');

    
    
    public function index() {
//        $email = new \Cake\Mailer\Email();
//        $email
//            ->setTemplate('welcome')
////            ->setLayout('fancy')
//            ->setEmailFormat('both')
//            ->setSubject('This is a subject')
//            ->setTo('nqhoang1991@gmail.com')
//            ->setFrom('demo@demo.com')
//            ->send("My message");
        
        $query = TableRegistry::get('ReportDetails')->find()->innerJoin(
            ['rp' => 'reports'],
            ['rp.report_id = ReportDetails.report_id'])->select(['rp.name'])->all();      
        
    }
    
    /**
     * Displays a view
     *
     * @return \Cake\Network\Response|null
     * @throws ForbiddenException When a directory traversal attempt.
     * @throws NotFoundException When the view file could not be found
     *   or MissingViewException in debug mode.
     */
    
    
    
    public function input($report_id = 1) {
        if($this->request->is('post')){
            $requestData = $this->request->getData();
            $script = $this->validateInput($requestData);
            if(empty($script)){
                $this->updateOrInsertReportDetail($requestData, $report_id);
            }
            
            $this->set('script', $script);
            //$tempalteDetails = TableRegistry::get('TemplateDetails')->find()->toArray();
        }
        
        $query = TableRegistry::get('Reports')->find();
        $query->innerJoinWith('Templates', function ($q) {
            return $q->where(['Templates.id' => 'Reports.template_id']);
        });
        
        $inputFileName = TEMPLATE_EXCEL_ROOT . 'B12.xls';
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
        echo '<pre>'; var_dump($objPHPExcel->getActiveSheet()->getCell('D9')->getDataValidation()); echo '</pre>';
        $style = $objWriter->generateStyles(true);
        $valid = $objPHPExcel->getActiveSheet()->getCell('D9')->getDataValidation();
        
        $template_details = TableRegistry::get('TemplateDetails')->find()->toArray();
        $report_details = TableRegistry::get('ReportDetails')->find()->toArray();
        $html = $objWriter->generateSheetData($this->convertToListCell($template_details, $report_details));
        $this->set('sheetData', $html);
        $this->set('style', $style);
    }
    
    
    public function setting($template_id = 1) {
        if($this->request->is('post')){
            $requestData = $this->request->getData();
            $this->updateOrInsertTemplateDetail($requestData, $template_id);
            //$tempalteDetails = TableRegistry::get('TemplateDetails')->find()->toArray();
        }
        $inputFileName = TEMPLATE_EXCEL_ROOT . 'B12.xls';
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
        $style = $objWriter->generateStyles(true);
        $demo = TableRegistry::get('TemplateDetails')->find()->toArray();
//        var_dump($this->convertToListCellList($demo));
        $html = $objWriter->generateSheetData($this->convertToListCell($demo), true);
        //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $this->set('sheetData', $html);
        $this->set('style', $style);
    }
    
    private function validateInput($requestData= array()){
        $inputFileName = TEMPLATE_EXCEL_ROOT . 'B12.xls';
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
        $script = "";
        foreach ($requestData as $key => $request){
            $valid = $objPHPExcel->getActiveSheet()->getCell($key)->getDataValidation();
            if($valid->getType() == "whole"){
                if($request != "" && !(is_numeric($request))){
                    // show error
                    $script .= "setError('". $valid->getError() ."', '". $key ."')";
                } else {
                    if( !($valid->getOperator() == "between" && intval($request) >= $valid->getFormula1() && intval($request) <= $valid->getFormula2())){
                        //show error
                        $script .= "setError('". $valid->getError() ."', '". $key ."')";
                    }
                }
                //var_dump($valid);
            } 
            
        }
        return $script;
//        foreach ($valid)
        
    }
            
    
    private function convertToListCell($dataType = array(), $dataValue = array()){
        $result = array();
        if(count($dataValue) == 0){
            foreach( $dataType as $detail){
                $result[$detail["cell"]] = $detail;
            }
        } else {
            $temp = array();
            foreach( $dataType as $detail){
                $temp[$detail["cell"]] = $detail;
            }
            foreach( $dataValue as $detail){
                $detail["type"] = $temp[$detail["cell"]]["type"];
                $result[$detail["cell"]] = $detail;
            }
        }
        return $result;
    }
    
    private function updateOrInsertReportDetail($requestData, $report_id){
        foreach ( $requestData as $key => $data){
               $report_data = TableRegistry::get('ReportDetails')->find("all")
                        ->where(["cell" => $key])
                        ->andWhere(["report_id" => $report_id]);
               $report = TableRegistry::get('ReportDetails');
               if(count($report_data->toArray()) > 0){
                   $report_data = $report_data->first();
                   $report_data->value = $data;
                   $report->save($report_data);
               } else {
                   $new_rep =  ["cell" => $key, 'value' => $data, 'report_id' => $report_id];
                   $entity = $report->newEntity($new_rep);
                   $report->save($entity);
               }
        }
    }
    
    private function updateOrInsertTemplateDetail($requestData, $template_id){
        foreach ( $requestData as $key => $data){
               $temp_data = TableRegistry::get('TemplateDetails')->find("all")
                        ->where(["cell" => $key])
                        ->andWhere(["template_id" => $template_id]);
               $temp = TableRegistry::get('TemplateDetails');
               if(count($temp_data->toArray()) > 0){
                   $temp_data = $temp_data->first();
                   $temp_data->type = $data;
                   $temp->save($temp_data);
               } else {
                   $new_temp =  ["cell" => $key, 'type' => $data, 'template_id' => $template_id];
                   $entity = $temp->newEntity($new_temp);
                   $temp->save($entity);
               }
        }
    }


    
    public function download($id = null) {
        $this->autoRender = false;
//            $reports = $this->Report->find('first',
//                    array('conditions'=>
//                         'id  = "1"'
//          ));

        $inputFileName = TEMPLATE_EXCEL_ROOT . 'B12.xls';
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $objPHPExcel->getProperties()
                    ->setCreator("SGDDT Quang Nam")
                    ->setLastModifiedBy("SGDDT Quang Nam")
                    ->setTitle("BAO CAO B12")
                    ->setSubject("BAO CAO B12")
                    ->setDescription("BAO CAO B12.")
                    ->setCategory("BAO CAO B12");
        // Add some data
        
        $report_details = TableRegistry::get('ReportDetails')->find()->toArray();
        foreach( $report_details as $detail){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($detail["cell"], $detail["value"]);
        }
//                    ->setCellValue('C17', 'Hoàng');

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="B12.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}
