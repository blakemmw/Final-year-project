<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsTickets Controller
 *
 * @property \App\Model\Table\EventsTicketsTable $EventsTickets
 *
 * @method \App\Model\Entity\EventsTicket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsTicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events']
        ];
        $eventsTickets = $this->paginate($this->EventsTickets);

        $this->set(compact('eventsTickets'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsTicket = $this->EventsTickets->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('eventsTicket', $eventsTicket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsTicket = $this->EventsTickets->newEntity();
        if ($this->request->is('post')) {
            $eventsTicket = $this->EventsTickets->patchEntity($eventsTicket, $this->request->getData());
            if ($this->EventsTickets->save($eventsTicket)) {
                $this->Flash->success(__('The events ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events ticket could not be saved. Please, try again.'));
        }
        $events = $this->EventsTickets->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventsTicket', 'events'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsTicket = $this->EventsTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsTicket = $this->EventsTickets->patchEntity($eventsTicket, $this->request->getData());
            if ($this->EventsTickets->save($eventsTicket)) {
                $this->Flash->success(__('The events ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events ticket could not be saved. Please, try again.'));
        }
        $events = $this->EventsTickets->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventsTicket', 'events'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsTicket = $this->EventsTickets->get($id);
        if ($this->EventsTickets->delete($eventsTicket)) {
            $this->Flash->success(__('The events ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The events ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
