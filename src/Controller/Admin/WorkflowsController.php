<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Workflows Controller
 *
 * @property \Workflow\Model\Table\WorkflowsTable $Workflows
 */
class WorkflowsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('workflows', $this->paginate($this->Workflows));
        $this->set('_serialize', ['workflows']);
    }

    /**
     * View method
     *
     * @param string|null $id Workflow id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workflow = $this->Workflows->get($id, [
            'contain' => ['Nodes', 'VariableHandlers']
        ]);
        $this->set('workflow', $workflow);
        $this->set('_serialize', ['workflow']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workflow = $this->Workflows->newEntity();
        if ($this->request->is('post')) {
            $workflow = $this->Workflows->patchEntity($workflow, $this->request->data);
            if ($this->Workflows->save($workflow)) {
                $this->Flash->success(__('The workflow has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflow could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workflow'));
        $this->set('_serialize', ['workflow']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workflow id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workflow = $this->Workflows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workflow = $this->Workflows->patchEntity($workflow, $this->request->data);
            if ($this->Workflows->save($workflow)) {
                $this->Flash->success(__('The workflow has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflow could not be saved. Please, try again.'));
            }
        }
        $activities = TableRegistry::get('Workflow.Activities')->find('all');
        $this->set(compact('workflow','activities'));
        $this->set('_serialize', ['workflow']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workflow id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workflow = $this->Workflows->get($id);
        if ($this->Workflows->delete($workflow)) {
            $this->Flash->success(__('The workflow has been deleted.'));
        } else {
            $this->Flash->error(__('The workflow could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
