<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsRooms Controller
 *
 * @property \App\Model\Table\EventsRoomsTable $EventsRooms
 *
 * @method \App\Model\Entity\EventsRoom[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsRoomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Rooms']
        ];
        $eventsRooms = $this->paginate($this->EventsRooms);

        $this->set(compact('eventsRooms'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsRoom = $this->EventsRooms->get($id, [
            'contain' => ['Events', 'Rooms']
        ]);

        $this->set('eventsRoom', $eventsRoom);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsRoom = $this->EventsRooms->newEntity();
        if ($this->request->is('post')) {
            $eventsRoom = $this->EventsRooms->patchEntity($eventsRoom, $this->request->getData());
            if ($this->EventsRooms->save($eventsRoom)) {
                $this->Flash->success(__('The events room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events room could not be saved. Please, try again.'));
        }
        $events = $this->EventsRooms->Events->find('list', ['limit' => 200]);
        $rooms = $this->EventsRooms->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('eventsRoom', 'events', 'rooms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Room id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsRoom = $this->EventsRooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsRoom = $this->EventsRooms->patchEntity($eventsRoom, $this->request->getData());
            if ($this->EventsRooms->save($eventsRoom)) {
                $this->Flash->success(__('The events room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events room could not be saved. Please, try again.'));
        }
        $events = $this->EventsRooms->Events->find('list', ['limit' => 200]);
        $rooms = $this->EventsRooms->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('eventsRoom', 'events', 'rooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsRoom = $this->EventsRooms->get($id);
        if ($this->EventsRooms->delete($eventsRoom)) {
            $this->Flash->success(__('The events room has been deleted.'));
        } else {
            $this->Flash->error(__('The events room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
