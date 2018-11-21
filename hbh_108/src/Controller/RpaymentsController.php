<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rpayments Controller
 *
 * @property \App\Model\Table\RpaymentsTable $Rpayments
 *
 * @method \App\Model\Entity\Rpayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RpaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RoomsUsers']
        ];
        $rpayments = $this->paginate($this->Rpayments);

        $this->set(compact('rpayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Rpayment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rpayment = $this->Rpayments->get($id, [
            'contain' => ['RoomsUsers']
        ]);

        $this->set('rpayment', $rpayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rpayment = $this->Rpayments->newEntity();
        if ($this->request->is('post')) {
            $rpayment = $this->Rpayments->patchEntity($rpayment, $this->request->getData());
            if ($this->Rpayments->save($rpayment)) {
                $this->Flash->success(__('The rpayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rpayment could not be saved. Please, try again.'));
        }
        $roomsUsers = $this->Rpayments->RoomsUsers->find('list', ['limit' => 200]);
        $this->set(compact('rpayment', 'roomsUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rpayment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rpayment = $this->Rpayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rpayment = $this->Rpayments->patchEntity($rpayment, $this->request->getData());
            if ($this->Rpayments->save($rpayment)) {
                $this->Flash->success(__('The rpayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rpayment could not be saved. Please, try again.'));
        }
        $roomsUsers = $this->Rpayments->RoomsUsers->find('list', ['limit' => 200]);
        $this->set(compact('rpayment', 'roomsUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rpayment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rpayment = $this->Rpayments->get($id);
        if ($this->Rpayments->delete($rpayment)) {
            $this->Flash->success(__('The rpayment has been deleted.'));
        } else {
            $this->Flash->error(__('The rpayment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
