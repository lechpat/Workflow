<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * ActivityDialogs Controller
 *
 * @property \Workflow\Model\Table\ActivityDialogsTable $ActivityDialogs
 */
class ActivityDialogsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('activityDialogs', $this->paginate($this->ActivityDialogs));
        $this->set('_serialize', ['activityDialogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Activity Dialog id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activityDialog = $this->ActivityDialogs->get($id, [
            'contain' => []
        ]);
        $this->set('activityDialog', $activityDialog);
        $this->set('_serialize', ['activityDialog']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activityDialog = $this->ActivityDialogs->newEntity();
        if ($this->request->is('post')) {
            $activityDialog = $this->ActivityDialogs->patchEntity($activityDialog, $this->request->data);
            if ($this->ActivityDialogs->save($activityDialog)) {
                $this->Flash->success(__('The activity dialog has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity dialog could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('activityDialog'));
        $this->set('_serialize', ['activityDialog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity Dialog id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activityDialog = $this->ActivityDialogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activityDialog = $this->ActivityDialogs->patchEntity($activityDialog, $this->request->data);
            if ($this->ActivityDialogs->save($activityDialog)) {
                $this->Flash->success(__('The activity dialog has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity dialog could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('activityDialog'));
        $this->set('_serialize', ['activityDialog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity Dialog id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activityDialog = $this->ActivityDialogs->get($id);
        if ($this->ActivityDialogs->delete($activityDialog)) {
            $this->Flash->success(__('The activity dialog has been deleted.'));
        } else {
            $this->Flash->error(__('The activity dialog could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
