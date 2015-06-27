<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * Rules Controller
 *
 * @property \Workflow\Model\Table\RulesTable $Rules
 */
class RulesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modules', 'TriggerTypes', 'RecordActions', 'ModuleFields']
        ];
        $this->set('rules', $this->paginate($this->Rules));
        $this->set('_serialize', ['rules']);
    }

    /**
     * View method
     *
     * @param string|null $id Rule id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => ['Modules', 'TriggerTypes', 'RecordActions', 'ModuleFields', 'Actions', 'RuleConditions']
        ]);
        $this->set('rule', $rule);
        $this->set('_serialize', ['rule']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rule = $this->Rules->newEntity();
        if ($this->request->is('post')) {
            $rule = $this->Rules->patchEntity($rule, $this->request->data);
            if ($this->Rules->save($rule)) {
                $this->Flash->success(__('The rule has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rule could not be saved. Please, try again.'));
            }
        }
        $modules = $this->Rules->Modules->find('list', ['limit' => 200]);
        $triggerTypes = $this->Rules->TriggerTypes->find('list', ['limit' => 200]);
        $recordActions = $this->Rules->RecordActions->find('list', ['limit' => 200]);
        $moduleFields = $this->Rules->ModuleFields->find('list', ['limit' => 200]);
        $actions = $this->Rules->Actions->find('list', ['limit' => 200]);
        $this->set(compact('rule', 'modules', 'triggerTypes', 'recordActions', 'moduleFields', 'actions'));
        $this->set('_serialize', ['rule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rule id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => ['Actions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rule = $this->Rules->patchEntity($rule, $this->request->data);
            if ($this->Rules->save($rule)) {
                $this->Flash->success(__('The rule has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rule could not be saved. Please, try again.'));
            }
        }
        $modules = $this->Rules->Modules->find('list', ['limit' => 200]);
        $triggerTypes = $this->Rules->TriggerTypes->find('list', ['limit' => 200]);
        $recordActions = $this->Rules->RecordActions->find('list', ['limit' => 200]);
        $moduleFields = $this->Rules->ModuleFields->find('list', ['limit' => 200]);
        $actions = $this->Rules->Actions->find('list', ['limit' => 200]);
        $this->set(compact('rule', 'modules', 'triggerTypes', 'recordActions', 'moduleFields', 'actions'));
        $this->set('_serialize', ['rule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rule id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rule = $this->Rules->get($id);
        if ($this->Rules->delete($rule)) {
            $this->Flash->success(__('The rule has been deleted.'));
        } else {
            $this->Flash->error(__('The rule could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
