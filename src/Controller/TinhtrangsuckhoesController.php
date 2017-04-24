<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tinhtrangsuckhoes Controller
 *
 * @property \App\Model\Table\TinhtrangsuckhoesTable $Tinhtrangsuckhoes
 */
class TinhtrangsuckhoesController extends AppController
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
        $tinhtrangsuckhoes = $this->paginate($this->Tinhtrangsuckhoes);

        $this->set(compact('tinhtrangsuckhoes'));
        $this->set('_serialize', ['tinhtrangsuckhoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Tinhtrangsuckho id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tinhtrangsuckho = $this->Tinhtrangsuckhoes->get($id, [
            'contain' => ['Schools', 'Khois']
        ]);

        $this->set('tinhtrangsuckho', $tinhtrangsuckho);
        $this->set('_serialize', ['tinhtrangsuckho']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tinhtrangsuckho = $this->Tinhtrangsuckhoes->newEntity();
        if ($this->request->is('post')) {
            $tinhtrangsuckho = $this->Tinhtrangsuckhoes->patchEntity($tinhtrangsuckho, $this->request->getData());
            if ($this->Tinhtrangsuckhoes->save($tinhtrangsuckho)) {
                $this->Flash->success(__('The tinhtrangsuckho has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tinhtrangsuckho could not be saved. Please, try again.'));
        }
        $schools = $this->Tinhtrangsuckhoes->Schools->find('list', ['limit' => 200]);
        $khois = $this->Tinhtrangsuckhoes->Khois->find('list', ['limit' => 200]);
        $this->set(compact('tinhtrangsuckho', 'schools', 'khois'));
        $this->set('_serialize', ['tinhtrangsuckho']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tinhtrangsuckho id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tinhtrangsuckho = $this->Tinhtrangsuckhoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tinhtrangsuckho = $this->Tinhtrangsuckhoes->patchEntity($tinhtrangsuckho, $this->request->getData());
            if ($this->Tinhtrangsuckhoes->save($tinhtrangsuckho)) {
                $this->Flash->success(__('The tinhtrangsuckho has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tinhtrangsuckho could not be saved. Please, try again.'));
        }
        $schools = $this->Tinhtrangsuckhoes->Schools->find('list', ['limit' => 200]);
        $khois = $this->Tinhtrangsuckhoes->Khois->find('list', ['limit' => 200]);
        $this->set(compact('tinhtrangsuckho', 'schools', 'khois'));
        $this->set('_serialize', ['tinhtrangsuckho']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tinhtrangsuckho id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tinhtrangsuckho = $this->Tinhtrangsuckhoes->get($id);
        if ($this->Tinhtrangsuckhoes->delete($tinhtrangsuckho)) {
            $this->Flash->success(__('The tinhtrangsuckho has been deleted.'));
        } else {
            $this->Flash->error(__('The tinhtrangsuckho could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
