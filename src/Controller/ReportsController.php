<?php

namespace App\Controller;

use App\Logic\TinhtrangsuckhoeLogic;
use App\Controller\AppController;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 */
class ReportsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Schools']
        ];
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports'));
        $this->set('_serialize', ['reports']);
    }

    public function import($report_id) {
        //Check valid spreadsheet has been uploaded
        ini_set('memory_limit', '-1');
        if ($this->request->is('post')) {
            if (!isset($this->request->data['spreadsheet'])) {
                $this->Flash->error(__('Phải nhập file EXCEL.'));
                return $this->redirect(
                                ['controller' => 'home', 'action' => 'index']
                );
            }
            if ($this->request->data['spreadsheet']['error']) {
                $this->Flash->error(__($this->request->data['spreadsheet']['error']));
                return $this->redirect(
                                ['controller' => 'home', 'action' => 'index']
                );
            }
            if ($this->request->data['spreadsheet']['tmp_name']) {
                $inputFile = $this->request->data['spreadsheet']['tmp_name'];

                $report = $this->Reports->get($report_id, [
                    'contain' => ['Schools']
                ]);
                $filepath = 'uploads' . DS . $report->namhoc;
                //Check if the directory already exists.
                if (!is_dir($filepath)) {
                    mkdir($filepath, 0777, true);
                }

                $mabaocao = $report->namhoc . "_" . $report->school_id . "_" . ($report->dau_nam == 1 ? "002" : "001");
                $extension = strtolower(pathinfo($this->request->data['spreadsheet']["name"], PATHINFO_EXTENSION));
                $uploadPath = $filepath . DS . $mabaocao . "." . $extension;
                if (move_uploaded_file($inputFile, $uploadPath)) {
                    if ($extension == 'xlsx' || $extension == 'xls') {
                        //Read spreadsheeet workbook
                        try {
                            $inputFileType = \PHPExcel_IOFactory::identify($uploadPath);
                            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                            $objPHPExcel = $objReader->load($uploadPath);
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }
                        //Get worksheet dimensions




                        if ($this->validateAllSheet($objPHPExcel, $report->school->caphoc_id)) {
                            $this->saveAllSheet($objPHPExcel, $report);
                        }
                        $report->da_nhap_bao_cao = "0";
                        $report->file_input = $uploadPath;
                        $report->phienbanbaocao = $mabaocao . "_" . date("mdHi");
                        $this->Reports->save($report);
                    } else {
                        $this->Flash->error(__('Phải nhập file EXCEL.'));
                    }
                } else {
                    $this->Flash->error(__('Có lỗi xảy ra, xin thử lại sau.'));
                }
            }
        }

        return $this->redirect(
                        ['controller' => 'reports', 'action' => 'view', $report_id]
        );
    }

    public function getTemplate($caphoc_id) {
        ini_set('memory_limit', '-1');
        $this->loadModel('Caphocs');
        $caphoc = $this->Caphocs->get($caphoc_id);
        $url = TEMPLATE_EXCEL_ROOT . $caphoc->template_file;
        //$file_url = 'http://www.myremoteserver.com/file.exe';
        // Redirect output to a client’s web browser (Excel5)
        header('Cache-control: private');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Length: ' . filesize($url));
        header('Content-Disposition: attachment;filename="' . $caphoc->template_file . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        readfile($url); // do the double-download-dance (dirty but worky)
    }

    public function getLastImport($report_id) {
        ini_set('memory_limit', '-1');
        $report = $this->Reports->get($report_id);
        $url = $report->file_input;
        $extension = strtolower(pathinfo($url, PATHINFO_EXTENSION));
        //$file_url = 'http://www.myremoteserver.com/file.exe';
        // Redirect output to a client’s web browser (Excel5)
        header('Cache-control: private');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Length: ' . filesize($url));
        header('Content-Disposition: attachment;filename="' . $report->phienbanbaocao . "." . $extension . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Pragma: public'); // HTTP/1.0
        readfile($url); // do the double-download-dance (dirty but worky)
    }

    private function saveAllSheet($objPHPExcel, $report) {
        $this->loadModel("Settingvalids");
        $i = 0;
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $settings = $this->Settingvalids->getSetting($report->school->caphoc_id, $i);
            if (!empty($settings->toArray())) {
                $tables = $settings->select(['mapping_table'])
                                ->distinct(['mapping_table'])->toArray();
                foreach ($tables as $table) {
//                    $value = $worksheet->getCell($setting["cell"])->getValue();
//                    $table = TableRegistry::get($setting['table_mapping']);
                    if (!empty($table["mapping_table"])) {
                        $tableModel = \Cake\ORM\TableRegistry::get($table["mapping_table"]);
//                    var_dump($table["mapping_table"]);
                        $index_tbls = $settings->select(['table_index'])
                                        ->distinct(['table_index'])->toArray();
                        foreach ($index_tbls as $index) {
                            $tableModel->saveAllSheet(
                                    $this->Settingvalids->getSetting($report->school->caphoc_id, $i), $worksheet, $report, $index["table_index"], isset($index["khoi_id"]) ? $index["khoi_id"] : null);
                        }
                    }
                }
            }
            $i++;
        }
    }

    private function validateAllSheet($objPHPExcel, $caphoc_id) {
        $this->loadModel("Settingvalids");
        $valid_return = true;
        $i = 0;
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $settings = $this->Settingvalids->getSetting($caphoc_id, $i);
            if (!empty($settings)) {
                foreach ($settings as $setting) {
                    $value = $worksheet->getCell($setting["cell"])->getValue();
                    $valid = explode("|", $setting["validate"]);

                    switch ($valid[0]) {
                        case "integer" :
                            if (!is_int(intval($value))) {
                                $error = __("Cell {0} trong sheet '{1}' phải là 1 số tự nhiên", array($setting["cell"], $i));
                                $valid_return = false;
                            } else if (count($valid) > 0) {
                                foreach ($valid as $key => $v) {
                                    if ($key != 0) {
                                        foreach (explode(":", $v) as $ex) {
                                            if (strtolower($ex[0]) == 'max' && intval($ex[1]) < intval($value)) {
                                                $error = __("Cell {0} trong sheet '{1}' phải là nhỏ hơn {2}", array($setting["cell"], $i, $ex[1]));
                                                $valid_return = false;
                                            }
                                            if (strtolower($ex[0]) == 'min' && intval($ex[1]) > intval($value)) {
                                                $error = __("Cell {0} trong sheet '{1}' phải là lớn hơn {2}", array($setting["cell"], $i, $ex[1]));
                                                $valid_return = false;
                                            }
                                        }
                                    }
                                }
                            }
                            if (isset($error)) {
                                echo $error;
                                $this->Flash->error($error);
                            }
                            break;
                        case "string":
                            break;
                        case "text":
                            break;
                        default :
                            break;
                    }
                }
            }
            $i++;
        }
        return $valid_return;
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $report = $this->Reports->get($id, [
            'contain' => ['Schools']
        ]);

        $this->set('report', $report);
        $this->set('_serialize', ['report']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel("Schools");
            $schools = $this->Schools->find('all');
            if ($this->Reports->generateReport($schools, $this->request->getData("namhoc"))) {
                $this->Flash->success(__('The report has been saved.'));
                return $this->redirect(['controller' => 'home', 'action' => 'admin']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
        $this->set('_serialize', ['report']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $report = $this->Reports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $schools = $this->Reports->Schools->find('list', ['limit' => 200]);
        $this->set(compact('report', 'schools'));
        $this->set('_serialize', ['report']);
    }

    /**
     * 
     *
     * 
     */
    public function truongchuanhap() {
        $dau_nam = isset($this->request->query['dau_nam']) ? $this->request->query['dau_nam'] : null;
        $year = isset($this->request->query['year']) ? $this->request->query['year'] : null;
        if (is_null($dau_nam || is_null($year))) {
            echo 'giá trị không đúng. Xin thử lại sau.';
            exit;
        }

        $reports = $this->Reports->find('all', ['limit' => 200, 'contain' => ['Schools']])->where(['Reports.namhoc' => $year, 'Reports.dau_nam' => $dau_nam, 'Reports.da_nhap_bao_cao' => '1']);

        $this->set('reports', $reports->toArray());
    }

}
