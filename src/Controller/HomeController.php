<?php
namespace App\Controller;

use App\Controller\AppController;
//use \App\Model\Table\SchoolsTable;
/**
 * Schools Controller
 *
 * @property \App\Model\Table\SchoolsTable $Schools
 */
class HomeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       $this->loadModel('Schools');
       $this->loadModel('Lops');
       $id= 1;
       $school = $this->Schools->get($id, [
            'contain' => ['Reports', 'Caphocs', 'Loaitruongs']
        ]);
        $lops = $this->Lops->find('all', ['contain' => ['Khois']])->where(['school_id' => $school->id]);
        $this->set(compact('school'));
        $this->set(compact('lops'));
        $this->set('_serialize', ['school']);
    }
    

}
