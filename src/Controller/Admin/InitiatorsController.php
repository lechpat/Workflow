<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * Initiators Controller
 *
 * @property \Workflow\Model\Table\InitiatorsTable $Initiators
 */
class InitiatorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Workflows']
        ];
        $this->set('initiators', $this->paginate($this->Initiators));
        $this->set('_serialize', ['initiators']);
    }

    /**
     * View method
     *
     * @param string|null $id Initiator id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $initiator = $this->Initiators->get($id, [
            'contain' => ['Workflows']
        ]);
        $this->set('initiator', $initiator);
        $this->set('_serialize', ['initiator']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $initiator = $this->Initiators->newEntity();
        if ($this->request->is('post')) {
            $initiator = $this->Initiators->patchEntity($initiator, $this->request->data);
            if ($this->Initiators->save($initiator)) {
                $this->Flash->success(__('The initiator has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The initiator could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->Initiators->Workflows->find('list', ['limit' => 200]);
        $this->set(compact('initiator', 'workflows'));
        $this->set('_serialize', ['initiator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Initiator id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $initiator = $this->Initiators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $initiator = $this->Initiators->patchEntity($initiator, $this->request->data);
            if ($this->Initiators->save($initiator)) {
                $this->Flash->success(__('The initiator has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The initiator could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->Initiators->Workflows->find('list', ['limit' => 200]);
        $this->set(compact('initiator', 'workflows'));
        $this->set('_serialize', ['initiator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Initiator id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $initiator = $this->Initiators->get($id);
        if ($this->Initiators->delete($initiator)) {
            $this->Flash->success(__('The initiator has been deleted.'));
        } else {
            $this->Flash->error(__('The initiator could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
