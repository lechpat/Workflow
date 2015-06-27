<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * TriggerTypes Controller
 *
 * @property \Workflow\Model\Table\TriggerTypesTable $TriggerTypes
 */
class TriggerTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('triggerTypes', $this->paginate($this->TriggerTypes));
        $this->set('_serialize', ['triggerTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Trigger Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $triggerType = $this->TriggerTypes->get($id, [
            'contain' => []
        ]);
        $this->set('triggerType', $triggerType);
        $this->set('_serialize', ['triggerType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $triggerType = $this->TriggerTypes->newEntity();
        if ($this->request->is('post')) {
            $triggerType = $this->TriggerTypes->patchEntity($triggerType, $this->request->data);
            if ($this->TriggerTypes->save($triggerType)) {
                $this->Flash->success(__('The trigger type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trigger type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('triggerType'));
        $this->set('_serialize', ['triggerType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trigger Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $triggerType = $this->TriggerTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $triggerType = $this->TriggerTypes->patchEntity($triggerType, $this->request->data);
            if ($this->TriggerTypes->save($triggerType)) {
                $this->Flash->success(__('The trigger type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trigger type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('triggerType'));
        $this->set('_serialize', ['triggerType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trigger Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $triggerType = $this->TriggerTypes->get($id);
        if ($this->TriggerTypes->delete($triggerType)) {
            $this->Flash->success(__('The trigger type has been deleted.'));
        } else {
            $this->Flash->error(__('The trigger type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
