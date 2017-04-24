<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Settingvalids Controller
 *
 * @property \App\Model\Table\SettingvalidsTable $Settingvalids
 */
class SettingvalidsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($caphoc_id) {
        
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
//            var_dump($requestData);
            $this->Settingvalids->saveSetting($requestData, $caphoc_id);
//            exit;
            //$tempalteDetails = TableRegistry::get('TemplateDetails')->find()->toArray();
        }
        ini_set('memory_limit', '-1');
        $this->loadModel('Caphocs');
        $caphoc = $this->Caphocs->get($caphoc_id);
        $inputFileName = TEMPLATE_EXCEL_ROOT . $caphoc->template_file;
        $objPHPExcel = \PHPExcel_IOFactory::load($inputFileName);
        $i = 0;
        $html = "";
        $style = "";
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
            $objWriter->setSheetIndex($i);
            $style .= $objWriter->generateStyles(true);
            $setting = $this->Settingvalids->find()->where(['sheet_index' => $i, 'caphoc_id' => $caphoc_id])->toArray();
            $html .= $objWriter->generateSheetData($this->convertToListCell($setting));
            $i++;

        }
        $tab = $objWriter->generateNavigation();
        $this->set('sheetData', $html);
        $this->set('tab', $tab);
        $this->set('style', $style);
    }

    private function convertToListCell($dataType = array(), $dataValue = array()) {
        $result = array();
        if (count($dataValue) == 0) {
            foreach ($dataType as $detail) {
                $result[$detail["cell"]] = $detail;
            }
        } else {
            $temp = array();
            foreach ($dataType as $detail) {
                $temp[$detail["cell"]] = $detail;
            }
            foreach ($dataValue as $detail) {
                $detail["type"] = $temp[$detail["cell"]]["type"];
                $result[$detail["cell"]] = $detail;
            }
        }
        return $result;
    }

}
