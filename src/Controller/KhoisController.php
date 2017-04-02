<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Khois Controller
 *
 * @property \App\Model\Table\KhoisTable $Khois
 */
class KhoisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Caphocs']
        ];
        $khois = $this->paginate($this->Khois);

        $this->set(compact('khois'));
        $this->set('_serialize', ['khois']);
    }

    /**
     * View method
     *
     * @param string|null $id Khois id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $khois = $this->Khois->get($id, [
            'contain' => ['Caphocs']
        ]);

        $this->set('khois', $khois);
        $this->set('_serialize', ['khois']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $khois = $this->Khois->newEntity();
        if ($this->request->is('post')) {
            $khois = $this->Khois->patchEntity($khois, $this->request->getData());
            if ($this->Khois->save($khois)) {
                $this->Flash->success(__('The khois has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khois could not be saved. Please, try again.'));
        }
        $caphocs = $this->Khois->Caphocs->find('list', ['limit' => 200]);
        $this->set(compact('khois', 'caphocs'));
        $this->set('_serialize', ['khois']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Khois id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $khois = $this->Khois->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $khois = $this->Khois->patchEntity($khois, $this->request->getData());
            if ($this->Khois->save($khois)) {
                $this->Flash->success(__('The khois has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khois could not be saved. Please, try again.'));
        }
        $caphocs = $this->Khois->Caphocs->find('list', ['limit' => 200]);
        $this->set(compact('khois', 'caphocs'));
        $this->set('_serialize', ['khois']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Khois id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $khois = $this->Khois->get($id);
        if ($this->Khois->delete($khois)) {
            $this->Flash->success(__('The khois has been deleted.'));
        } else {
            $this->Flash->error(__('The khois could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
