<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RoomsUsers Controller
 *
 * @property \App\Model\Table\RoomsUsersTable $RoomsUsers
 *
 * @method \App\Model\Entity\RoomsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoomsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rooms', 'Users']
        ];
        $roomsUsers = $this->paginate($this->RoomsUsers);

        $this->set(compact('roomsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Rooms User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roomsUser = $this->RoomsUsers->get($id, [
            'contain' => ['Rooms', 'Users', 'Sessions']
        ]);

        $this->set('roomsUser', $roomsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roomsUser = $this->RoomsUsers->newEntity();
        if ($this->request->is('post')) {
            $roomsUser = $this->RoomsUsers->patchEntity($roomsUser, $this->request->getData());
            if ($this->RoomsUsers->save($roomsUser)) {
//                $this->loadModel('Sessions');
//                $sessions = $this->Sessions->newEntities($this->request->getData()['sessions']);
//
//                foreach ($sessions as $entity) {
//                    $entity->leasing_id += $roomsUser ->leasing_id;
//                    $this->Sessions->save($entity);
//
//                }

                $this->Flash->success(__('The rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rooms user could not be saved. Please, try again.'));
        }
        $rooms = $this->RoomsUsers->Rooms->find('list', ['limit' => 200]);
        $users = $this->RoomsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('roomsUser', 'rooms', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rooms User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roomsUser = $this->RoomsUsers->get($id, [
            'contain' => ['Sessions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roomsUser = $this->RoomsUsers->patchEntity($roomsUser, $this->request->getData());
            if ($this->RoomsUsers->save($roomsUser)) {
                $this->Flash->success(__('The rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rooms user could not be saved. Please, try again.'));
        }
        $rooms = $this->RoomsUsers->Rooms->find('list', ['limit' => 200]);
        $users = $this->RoomsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('roomsUser', 'rooms', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rooms User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roomsUser = $this->RoomsUsers->get($id);
        if ($this->RoomsUsers->delete($roomsUser)) {
            $this->Flash->success(__('The rooms user has been deleted.'));
        } else {
            $this->Flash->error(__('The rooms user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function newbooking()
    {
        $roomsUser = $this->RoomsUsers->newEntity();
        if ($this->request->is('post')) {
            $roomsUser = $this->RoomsUsers->patchEntity($roomsUser, $this->request->getData());
            if ($this->RoomsUsers->save($roomsUser)) {
                $this->loadModel('Sessions');
                $sessions = $this->Sessions->newEntities($this->request->getData()['sessions']);

                foreach ($sessions as $entity) {
                    $entity->leasing_id += $roomsUser ->leasing_id;
                    $this->Sessions->save($entity);

                }

                $this->Flash->success(__('The rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rooms user could not be saved. Please, try again.'));
        }
        $rooms = $this->RoomsUsers->Rooms->find('list', ['limit' => 200]);
        $users = $this->RoomsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('roomsUser', 'rooms', 'users'));
    }

    public function getByCategory() {
        $category_id = $this->request->data['Post']['category_id'];

        $subcategories = $this->Subcategory->find('list', array(
            'conditions' => array('Subcategory.category_id' => $category_id),
            'recursive' => -1
        ));

        $this->set('subcategories',$subcategories);
        $this->layout = 'ajax';
    }

}
