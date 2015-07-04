<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * TransitionActions Controller
 *
 * @property \Workflow\Model\Table\TransitionActionsTable $TransitionActions
 */
class TransitionActionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('transitionActions', $this->paginate($this->TransitionActions));
        $this->set('_serialize', ['transitionActions']);
    }

    /**
     * View method
     *
     * @param string|null $id Transition Action id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transitionAction = $this->TransitionActions->get($id, [
            'contain' => []
        ]);
        $this->set('transitionAction', $transitionAction);
        $this->set('_serialize', ['transitionAction']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transitionAction = $this->TransitionActions->newEntity();
        if ($this->request->is('post')) {
            $transitionAction = $this->TransitionActions->patchEntity($transitionAction, $this->request->data);
            if ($this->TransitionActions->save($transitionAction)) {
                $this->Flash->success(__('The transition action has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transition action could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transitionAction'));
        $this->set('_serialize', ['transitionAction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transition Action id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transitionAction = $this->TransitionActions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transitionAction = $this->TransitionActions->patchEntity($transitionAction, $this->request->data);
            if ($this->TransitionActions->save($transitionAction)) {
                $this->Flash->success(__('The transition action has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transition action could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transitionAction'));
        $this->set('_serialize', ['transitionAction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transition Action id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transitionAction = $this->TransitionActions->get($id);
        if ($this->TransitionActions->delete($transitionAction)) {
            $this->Flash->success(__('The transition action has been deleted.'));
        } else {
            $this->Flash->error(__('The transition action could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
