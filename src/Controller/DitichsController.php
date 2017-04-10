<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ditichs Controller
 *
 * @property \App\Model\Table\DitichsTable $Ditichs
 */
class DitichsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reports']
        ];
        $ditichs = $this->paginate($this->Ditichs);

        $this->set(compact('ditichs'));
        $this->set('_serialize', ['ditichs']);
    }

    /**
     * View method
     *
     * @param string|null $id Ditich id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ditich = $this->Ditichs->get($id, [
            'contain' => ['Reports']
        ]);

        $this->set('ditich', $ditich);
        $this->set('_serialize', ['ditich']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ditich = $this->Ditichs->newEntity();
        if ($this->request->is('post')) {
            $ditich = $this->Ditichs->patchEntity($ditich, $this->request->getData());
            if ($this->Ditichs->save($ditich)) {
                $this->Flash->success(__('The ditich has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ditich could not be saved. Please, try again.'));
        }
        $reports = $this->Ditichs->Reports->find('list', ['limit' => 200]);
        $this->set(compact('ditich', 'reports'));
        $this->set('_serialize', ['ditich']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ditich id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ditich = $this->Ditichs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ditich = $this->Ditichs->patchEntity($ditich, $this->request->getData());
            if ($this->Ditichs->save($ditich)) {
                $this->Flash->success(__('The ditich has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ditich could not be saved. Please, try again.'));
        }
        $reports = $this->Ditichs->Reports->find('list', ['limit' => 200]);
        $this->set(compact('ditich', 'reports'));
        $this->set('_serialize', ['ditich']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ditich id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ditich = $this->Ditichs->get($id);
        if ($this->Ditichs->delete($ditich)) {
            $this->Flash->success(__('The ditich has been deleted.'));
        } else {
            $this->Flash->error(__('The ditich could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
