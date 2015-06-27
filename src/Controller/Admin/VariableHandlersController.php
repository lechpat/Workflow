<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * VariableHandlers Controller
 *
 * @property \Workflow\Model\Table\VariableHandlersTable $VariableHandlers
 */
class VariableHandlersController extends AppController
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
        $this->set('variableHandlers', $this->paginate($this->VariableHandlers));
        $this->set('_serialize', ['variableHandlers']);
    }

    /**
     * View method
     *
     * @param string|null $id Variable Handler id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $variableHandler = $this->VariableHandlers->get($id, [
            'contain' => ['Workflows']
        ]);
        $this->set('variableHandler', $variableHandler);
        $this->set('_serialize', ['variableHandler']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $variableHandler = $this->VariableHandlers->newEntity();
        if ($this->request->is('post')) {
            $variableHandler = $this->VariableHandlers->patchEntity($variableHandler, $this->request->data);
            if ($this->VariableHandlers->save($variableHandler)) {
                $this->Flash->success(__('The variable handler has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The variable handler could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->VariableHandlers->Workflows->find('list', ['limit' => 200]);
        $this->set(compact('variableHandler', 'workflows'));
        $this->set('_serialize', ['variableHandler']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Variable Handler id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $variableHandler = $this->VariableHandlers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $variableHandler = $this->VariableHandlers->patchEntity($variableHandler, $this->request->data);
            if ($this->VariableHandlers->save($variableHandler)) {
                $this->Flash->success(__('The variable handler has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The variable handler could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->VariableHandlers->Workflows->find('list', ['limit' => 200]);
        $this->set(compact('variableHandler', 'workflows'));
        $this->set('_serialize', ['variableHandler']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Variable Handler id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $variableHandler = $this->VariableHandlers->get($id);
        if ($this->VariableHandlers->delete($variableHandler)) {
            $this->Flash->success(__('The variable handler has been deleted.'));
        } else {
            $this->Flash->error(__('The variable handler could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
