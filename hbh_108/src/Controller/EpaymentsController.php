<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Epayments Controller
 *
 * @property \App\Model\Table\EpaymentsTable $Epayments
 *
 * @method \App\Model\Entity\Epayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookings']
        ];
        $epayments = $this->paginate($this->Epayments);

        $this->set(compact('epayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Epayment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $epayment = $this->Epayments->get($id, [
            'contain' => ['Bookings']
        ]);

        $this->set('epayment', $epayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $epayment = $this->Epayments->newEntity();
        if ($this->request->is('post')) {
            $epayment = $this->Epayments->patchEntity($epayment, $this->request->getData());
            if ($this->Epayments->save($epayment)) {
                $this->Flash->success(__('The epayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The epayment could not be saved. Please, try again.'));
        }
        $bookings = $this->Epayments->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('epayment', 'bookings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Epayment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $epayment = $this->Epayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $epayment = $this->Epayments->patchEntity($epayment, $this->request->getData());
            if ($this->Epayments->save($epayment)) {
                $this->Flash->success(__('The epayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The epayment could not be saved. Please, try again.'));
        }
        $bookings = $this->Epayments->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('epayment', 'bookings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Epayment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $epayment = $this->Epayments->get($id);
        if ($this->Epayments->delete($epayment)) {
            $this->Flash->success(__('The epayment has been deleted.'));
        } else {
            $this->Flash->error(__('The epayment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pay()
    {

    }

    public function processCard()
    {

    }
}
