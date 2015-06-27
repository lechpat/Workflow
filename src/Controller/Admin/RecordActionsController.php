<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * RecordActions Controller
 *
 * @property \Workflow\Model\Table\RecordActionsTable $RecordActions
 */
class RecordActionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('recordActions', $this->paginate($this->RecordActions));
        $this->set('_serialize', ['recordActions']);
    }

    /**
     * View method
     *
     * @param string|null $id Record Action id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recordAction = $this->RecordActions->get($id, [
            'contain' => []
        ]);
        $this->set('recordAction', $recordAction);
        $this->set('_serialize', ['recordAction']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recordAction = $this->RecordActions->newEntity();
        if ($this->request->is('post')) {
            $recordAction = $this->RecordActions->patchEntity($recordAction, $this->request->data);
            if ($this->RecordActions->save($recordAction)) {
                $this->Flash->success(__('The record action has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The record action could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recordAction'));
        $this->set('_serialize', ['recordAction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Record Action id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recordAction = $this->RecordActions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recordAction = $this->RecordActions->patchEntity($recordAction, $this->request->data);
            if ($this->RecordActions->save($recordAction)) {
                $this->Flash->success(__('The record action has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The record action could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recordAction'));
        $this->set('_serialize', ['recordAction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Record Action id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recordAction = $this->RecordActions->get($id);
        if ($this->RecordActions->delete($recordAction)) {
            $this->Flash->success(__('The record action has been deleted.'));
        } else {
            $this->Flash->error(__('The record action could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
