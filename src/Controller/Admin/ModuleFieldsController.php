<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * ModuleFields Controller
 *
 * @property \Workflow\Model\Table\ModuleFieldsTable $ModuleFields
 */
class ModuleFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modules']
        ];
        $this->set('moduleFields', $this->paginate($this->ModuleFields));
        $this->set('_serialize', ['moduleFields']);
    }

    /**
     * View method
     *
     * @param string|null $id Module Field id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moduleField = $this->ModuleFields->get($id, [
            'contain' => ['Modules']
        ]);
        $this->set('moduleField', $moduleField);
        $this->set('_serialize', ['moduleField']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moduleField = $this->ModuleFields->newEntity();
        if ($this->request->is('post')) {
            $moduleField = $this->ModuleFields->patchEntity($moduleField, $this->request->data);
            if ($this->ModuleFields->save($moduleField)) {
                $this->Flash->success(__('The module field has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The module field could not be saved. Please, try again.'));
            }
        }
        $modules = $this->ModuleFields->Modules->find('list', ['limit' => 200]);
        $this->set(compact('moduleField', 'modules'));
        $this->set('_serialize', ['moduleField']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Module Field id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moduleField = $this->ModuleFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moduleField = $this->ModuleFields->patchEntity($moduleField, $this->request->data);
            if ($this->ModuleFields->save($moduleField)) {
                $this->Flash->success(__('The module field has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The module field could not be saved. Please, try again.'));
            }
        }
        $modules = $this->ModuleFields->Modules->find('list', ['limit' => 200]);
        $this->set(compact('moduleField', 'modules'));
        $this->set('_serialize', ['moduleField']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Module Field id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moduleField = $this->ModuleFields->get($id);
        if ($this->ModuleFields->delete($moduleField)) {
            $this->Flash->success(__('The module field has been deleted.'));
        } else {
            $this->Flash->error(__('The module field could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
