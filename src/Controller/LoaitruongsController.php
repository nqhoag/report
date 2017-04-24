<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Loaitruongs Controller
 *
 * @property \App\Model\Table\LoaitruongsTable $Loaitruongs
 */
class LoaitruongsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $loaitruongs = $this->paginate($this->Loaitruongs);

        $this->set(compact('loaitruongs'));
        $this->set('_serialize', ['loaitruongs']);
    }

    /**
     * View method
     *
     * @param string|null $id Loaitruong id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loaitruong = $this->Loaitruongs->get($id, [
            'contain' => ['Schools']
        ]);

        $this->set('loaitruong', $loaitruong);
        $this->set('_serialize', ['loaitruong']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loaitruong = $this->Loaitruongs->newEntity();
        if ($this->request->is('post')) {
            $loaitruong = $this->Loaitruongs->patchEntity($loaitruong, $this->request->getData());
            if ($this->Loaitruongs->save($loaitruong)) {
                $this->Flash->success(__('The loaitruong has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loaitruong could not be saved. Please, try again.'));
        }
        $this->set(compact('loaitruong'));
        $this->set('_serialize', ['loaitruong']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Loaitruong id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loaitruong = $this->Loaitruongs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loaitruong = $this->Loaitruongs->patchEntity($loaitruong, $this->request->getData());
            if ($this->Loaitruongs->save($loaitruong)) {
                $this->Flash->success(__('The loaitruong has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loaitruong could not be saved. Please, try again.'));
        }
        $this->set(compact('loaitruong'));
        $this->set('_serialize', ['loaitruong']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Loaitruong id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loaitruong = $this->Loaitruongs->get($id);
        if ($this->Loaitruongs->delete($loaitruong)) {
            $this->Flash->success(__('The loaitruong has been deleted.'));
        } else {
            $this->Flash->error(__('The loaitruong could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
