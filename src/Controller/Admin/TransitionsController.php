<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * Transitions Controller
 *
 * @property \Workflow\Model\Table\TransitionsTable $Transitions
 */
class TransitionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('transitions', $this->paginate($this->Transitions));
        $this->set('_serialize', ['transitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Transition id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transition = $this->Transitions->get($id, [
            'contain' => []
        ]);
        $this->set('transition', $transition);
        $this->set('_serialize', ['transition']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transition = $this->Transitions->newEntity();
        if ($this->request->is('post')) {
            $transition = $this->Transitions->patchEntity($transition, $this->request->data);
            if ($this->Transitions->save($transition)) {
                $this->Flash->success(__('The transition has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transition could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transition'));
        $this->set('_serialize', ['transition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transition id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transition = $this->Transitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transition = $this->Transitions->patchEntity($transition, $this->request->data);
            if ($this->Transitions->save($transition)) {
                $this->Flash->success(__('The transition has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transition could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transition'));
        $this->set('_serialize', ['transition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transition id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transition = $this->Transitions->get($id);
        if ($this->Transitions->delete($transition)) {
            $this->Flash->success(__('The transition has been deleted.'));
        } else {
            $this->Flash->error(__('The transition could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
