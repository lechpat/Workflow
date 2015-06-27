<?php
namespace Workflow\Controller\Admin;

use Workflow\Controller\AppController;

/**
 * Nodes Controller
 *
 * @property \Workflow\Model\Table\NodesTable $Nodes
 */
class NodesController extends AppController
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
        $this->set('nodes', $this->paginate($this->Nodes));
        $this->set('_serialize', ['nodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Node id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => ['Workflows', 'OutNodes']
        ]);
        $this->set('node', $node);
        $this->set('_serialize', ['node']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $node = $this->Nodes->newEntity();
        if ($this->request->is('post')) {
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The node could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->Nodes->Workflows->find('list', ['limit' => 200]);
        $outNodes = $this->Nodes->OutNodes->find('list', ['limit' => 200]);
        $this->set(compact('node', 'workflows', 'outNodes'));
        $this->set('_serialize', ['node']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Node id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => ['OutNodes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The node could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->Nodes->Workflows->find('list', ['limit' => 200]);
        $outNodes = $this->Nodes->OutNodes->find('list', ['limit' => 200]);
        $this->set(compact('node', 'workflows', 'outNodes'));
        $this->set('_serialize', ['node']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Node id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $node = $this->Nodes->get($id);
        if ($this->Nodes->delete($node)) {
            $this->Flash->success(__('The node has been deleted.'));
        } else {
            $this->Flash->error(__('The node could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
