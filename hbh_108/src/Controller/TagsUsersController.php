<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TagsUsers Controller
 *
 * @property \App\Model\Table\TagsUsersTable $TagsUsers
 *
 * @method \App\Model\Entity\TagsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Users']
        ];
        $tagsUsers = $this->paginate($this->TagsUsers);

        $this->set(compact('tagsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Tags User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tagsUser = $this->TagsUsers->get($id, [
            'contain' => ['Tags', 'Users']
        ]);

        $this->set('tagsUser', $tagsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagsUser = $this->TagsUsers->newEntity();
        if ($this->request->is('post')) {
            $tagsUser = $this->TagsUsers->patchEntity($tagsUser, $this->request->getData());
            if ($this->TagsUsers->save($tagsUser)) {
                $this->Flash->success(__('The tags user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags user could not be saved. Please, try again.'));
        }
        $tags = $this->TagsUsers->Tags->find('list', ['limit' => 200]);
        $users = $this->TagsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('tagsUser', 'tags', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tags User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tagsUser = $this->TagsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagsUser = $this->TagsUsers->patchEntity($tagsUser, $this->request->getData());
            if ($this->TagsUsers->save($tagsUser)) {
                $this->Flash->success(__('The tags user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags user could not be saved. Please, try again.'));
        }
        $tags = $this->TagsUsers->Tags->find('list', ['limit' => 200]);
        $users = $this->TagsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('tagsUser', 'tags', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tags User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tagsUser = $this->TagsUsers->get($id);
        if ($this->TagsUsers->delete($tagsUser)) {
            $this->Flash->success(__('The tags user has been deleted.'));
        } else {
            $this->Flash->error(__('The tags user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
