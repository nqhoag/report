<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cosovatchats Controller
 *
 * @property \App\Model\Table\CosovatchatsTable $Cosovatchats
 */
class CosovatchatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reports', 'Khois', 'Kieuphongs']
        ];
        $cosovatchats = $this->paginate($this->Cosovatchats);

        $this->set(compact('cosovatchats'));
        $this->set('_serialize', ['cosovatchats']);
    }

    /**
     * View method
     *
     * @param string|null $id Cosovatchat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cosovatchat = $this->Cosovatchats->get($id, [
            'contain' => ['Reports', 'Khois', 'Kieuphongs']
        ]);

        $this->set('cosovatchat', $cosovatchat);
        $this->set('_serialize', ['cosovatchat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cosovatchat = $this->Cosovatchats->newEntity();
        if ($this->request->is('post')) {
            $cosovatchat = $this->Cosovatchats->patchEntity($cosovatchat, $this->request->getData());
            if ($this->Cosovatchats->save($cosovatchat)) {
                $this->Flash->success(__('The cosovatchat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cosovatchat could not be saved. Please, try again.'));
        }
        $reports = $this->Cosovatchats->Reports->find('list', ['limit' => 200]);
        $khois = $this->Cosovatchats->Khois->find('list', ['limit' => 200]);
        $kieuphongs = $this->Cosovatchats->Kieuphongs->find('list', ['limit' => 200]);
        $this->set(compact('cosovatchat', 'reports', 'khois', 'kieuphongs'));
        $this->set('_serialize', ['cosovatchat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cosovatchat id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cosovatchat = $this->Cosovatchats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cosovatchat = $this->Cosovatchats->patchEntity($cosovatchat, $this->request->getData());
            if ($this->Cosovatchats->save($cosovatchat)) {
                $this->Flash->success(__('The cosovatchat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cosovatchat could not be saved. Please, try again.'));
        }
        $reports = $this->Cosovatchats->Reports->find('list', ['limit' => 200]);
        $khois = $this->Cosovatchats->Khois->find('list', ['limit' => 200]);
        $kieuphongs = $this->Cosovatchats->Kieuphongs->find('list', ['limit' => 200]);
        $this->set(compact('cosovatchat', 'reports', 'khois', 'kieuphongs'));
        $this->set('_serialize', ['cosovatchat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cosovatchat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cosovatchat = $this->Cosovatchats->get($id);
        if ($this->Cosovatchats->delete($cosovatchat)) {
            $this->Flash->success(__('The cosovatchat has been deleted.'));
        } else {
            $this->Flash->error(__('The cosovatchat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
