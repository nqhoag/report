<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lops Controller
 *
 * @property \App\Model\Table\LopsTable $Lops
 */
class LopsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Schools', 'Khois']
        ];
        $lops = $this->paginate($this->Lops);

        $this->set(compact('lops'));
        $this->set('_serialize', ['lops']);
    }

    /**
     * View method
     *
     * @param string|null $id Lop id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lop = $this->Lops->get($id, [
            'contain' => ['Schools', 'Khois']
        ]);

        $this->set('lop', $lop);
        $this->set('_serialize', ['lop']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($school_id=null)
    {
        $lop = $this->Lops->newEntity();
        if ($this->request->is('post')) {
            $lop = $this->Lops->patchEntity($lop, $this->request->getData());
            if ($this->Lops->save($lop)) {
                $this->Flash->success(__('The lop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lop could not be saved. Please, try again.'));
        }
        $schools = $this->Lops->Schools->get($school_id);
        $khois = $this->Lops->Khois->find('list', ['limit' => 200])->where(['caphoc_id' => $schools->caphoc_id]);
        $this->set(compact('lop', 'schools', 'khois'));
        $this->set('_serialize', ['lop']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lop id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lop = $this->Lops->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lop = $this->Lops->patchEntity($lop, $this->request->getData());
            if ($this->Lops->save($lop)) {
                $this->Flash->success(__('The lop has been saved.'));

                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            }
            $this->Flash->error(__('The lop could not be saved. Please, try again.'));
        }
        $schools = $this->Lops->Schools->get($lop->school_id);
        $khois = $this->Lops->Khois->find('list', ['limit' => 200])->where(['caphoc_id' => $schools->caphoc_id]);
        $this->set(compact('lop', 'schools', 'khois'));
        $this->set('_serialize', ['lop']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lop id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lop = $this->Lops->get($id);
        if ($this->Lops->delete($lop)) {
            $this->Flash->success(__('The lop has been deleted.'));
        } else {
            $this->Flash->error(__('The lop could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
