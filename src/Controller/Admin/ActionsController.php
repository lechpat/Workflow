<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * Actions Controller
 *
 * @property \Workflow\Model\Table\ActionsTable $Actions
 */
class ActionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('actions', $this->paginate($this->Actions));
        $this->set('_serialize', ['actions']);
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $action = $this->Actions->get($id, [
            'contain' => ['Rules']
        ]);
        $this->set('action', $action);
        $this->set('_serialize', ['action']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $action = $this->Actions->newEntity();
        if ($this->request->is('post')) {
            $action = $this->Actions->patchEntity($action, $this->request->data);
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The action could not be saved. Please, try again.'));
            }
        }
        $rules = $this->Actions->Rules->find('list', ['limit' => 200]);
        $this->set(compact('action', 'rules'));
        $this->set('_serialize', ['action']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $action = $this->Actions->get($id, [
            'contain' => ['Rules']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = $this->Actions->patchEntity($action, $this->request->data);
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The action could not be saved. Please, try again.'));
            }
        }
        $rules = $this->Actions->Rules->find('list', ['limit' => 200]);
        $this->set(compact('action', 'rules'));
        $this->set('_serialize', ['action']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $action = $this->Actions->get($id);
        if ($this->Actions->delete($action)) {
            $this->Flash->success(__('The action has been deleted.'));
        } else {
            $this->Flash->error(__('The action could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
