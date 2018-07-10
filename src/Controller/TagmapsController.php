<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tagmaps Controller
 *
 * @property \App\Model\Table\TagmapsTable $Tagmaps
 *
 * @method \App\Model\Entity\Tagmap[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagmapsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookmarks', 'Tags']
        ];
        $tagmaps = $this->paginate($this->Tagmaps);

        $this->set(compact('tagmaps'));
    }

    /**
     * View method
     *
     * @param string|null $id Tagmap id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tagmap = $this->Tagmaps->get($id, [
            'contain' => ['Bookmarks', 'Tags']
        ]);

        $this->set('tagmap', $tagmap);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagmap = $this->Tagmaps->newEntity();
        if ($this->request->is('post')) {
            $tagmap = $this->Tagmaps->patchEntity($tagmap, $this->request->getData());
            if ($this->Tagmaps->save($tagmap)) {
                $this->Flash->success(__('The tagmap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tagmap could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Tagmaps->Bookmarks->find('list', ['limit' => 200]);
        $tags = $this->Tagmaps->Tags->find('list', ['limit' => 200]);
        $this->set(compact('tagmap', 'bookmarks', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tagmap id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tagmap = $this->Tagmaps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagmap = $this->Tagmaps->patchEntity($tagmap, $this->request->getData());
            if ($this->Tagmaps->save($tagmap)) {
                $this->Flash->success(__('The tagmap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tagmap could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Tagmaps->Bookmarks->find('list', ['limit' => 200]);
        $tags = $this->Tagmaps->Tags->find('list', ['limit' => 200]);
        $this->set(compact('tagmap', 'bookmarks', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tagmap id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tagmap = $this->Tagmaps->get($id);
        if ($this->Tagmaps->delete($tagmap)) {
            $this->Flash->success(__('The tagmap has been deleted.'));
        } else {
            $this->Flash->error(__('The tagmap could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
