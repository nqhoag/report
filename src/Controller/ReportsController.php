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
                $uploadPath = 'uploads' . DS . $this->request->data['spreadsheet']['name'];

                if (move_uploaded_file($inputFile, $uploadPath)) {
                    $extension = strtoupper(pathinfo($uploadPath, PATHINFO_EXTENSION));
                    if ($extension == 'XLSX' || $extension == 'XLS') {
                        //Read spreadsheeet workbook
                        try {
                            $inputFileType = \PHPExcel_IOFactory::identify($uploadPath);
                            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                            $objPHPExcel = $objReader->load($uploadPath);
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }
                        //Get worksheet dimensions

                        $this->loadModel("Reports");

                        $report = $this->Reports->get($report_id, [
                            'contain' => ['Schools']
                        ]);
                        $this->SaveMamNon($objPHPExcel, $report);
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

    /**
     * check Validate
     */
    private function checkValid($objPHPExcel, $school_id = 1) {
        return true;
    }

    /**
     * check Validate
     */
    private function SaveMamNon($objPHPExcel, $report) {
        if ($this->checkValid($objPHPExcel, $report->school->caphoc_id)) {
            $this->loadModel("Tinhtrangsuckhoes");
//            $this->Tinhtrangsuckhoes->begin();
            $sheet1 = $objPHPExcel->getSheetByName("Tre-PH");
            try {
                $this->Tinhtrangsuckhoes->Savetinhtrangsk($sheet1, $report);
//                $this->Tinhtrangsuckhoes->commit(); 
            } catch (Exception $e) {
//                $this->Tinhtrangsuckhoes->rollback();
                die($e->getMessage());
            }
            $this->Flash->success(__('Đã lưu.'));
        }
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
    public function add($school_id = null) {
        $this->loadModel('Lops');
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $schools = $this->Reports->Schools->get($school_id);
        $lops = $this->Lops->find('all', ['contain' => ['Khois']])->where(['school_id' => $schools->id]);
//        $khois = $this->Khois->find('all')->where(['caphoc_id' => $schools->caphoc_id]);
        $this->set(compact('report', 'schools'));
        $this->set(compact('lops'));
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
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
