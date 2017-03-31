<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Caphocs Controller
 *
 * @property \App\Model\Table\CaphocsTable $Caphocs
 */
class CaphocsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $caphocs = $this->paginate($this->Caphocs);

        $this->set(compact('caphocs'));
        $this->set('_serialize', ['caphocs']);
    }

    /**
     * View method
     *
     * @param string|null $id Caphoc id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caphoc = $this->Caphocs->get($id, [
            'contain' => ['Schools']
        ]);

        $this->set('caphoc', $caphoc);
        $this->set('_serialize', ['caphoc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caphoc = $this->Caphocs->newEntity();
        if ($this->request->is('post')) {
            $caphoc = $this->Caphocs->patchEntity($caphoc, $this->request->getData());
            if ($this->Caphocs->save($caphoc)) {
                $this->Flash->success(__('The caphoc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The caphoc could not be saved. Please, try again.'));
        }
        $this->set(compact('caphoc'));
        $this->set('_serialize', ['caphoc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caphoc id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caphoc = $this->Caphocs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caphoc = $this->Caphocs->patchEntity($caphoc, $this->request->getData());
            if ($this->Caphocs->save($caphoc)) {
                $this->Flash->success(__('The caphoc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The caphoc could not be saved. Please, try again.'));
        }
        $this->set(compact('caphoc'));
        $this->set('_serialize', ['caphoc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caphoc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caphoc = $this->Caphocs->get($id);
        if ($this->Caphocs->delete($caphoc)) {
            $this->Flash->success(__('The caphoc has been deleted.'));
        } else {
            $this->Flash->error(__('The caphoc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
