<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsTags Controller
 *
 * @property \App\Model\Table\EventsTagsTable $EventsTags
 *
 * @method \App\Model\Entity\EventsTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Events']
        ];
        $eventsTags = $this->paginate($this->EventsTags);

        $this->set(compact('eventsTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsTag = $this->EventsTags->get($id, [
            'contain' => ['Tags', 'Events']
        ]);

        $this->set('eventsTag', $eventsTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsTag = $this->EventsTags->newEntity();
        if ($this->request->is('post')) {
            $eventsTag = $this->EventsTags->patchEntity($eventsTag, $this->request->getData());
            if ($this->EventsTags->save($eventsTag)) {
                $this->Flash->success(__('The events tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events tag could not be saved. Please, try again.'));
        }
        $tags = $this->EventsTags->Tags->find('list', ['limit' => 200]);
        $events = $this->EventsTags->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventsTag', 'tags', 'events'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsTag = $this->EventsTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsTag = $this->EventsTags->patchEntity($eventsTag, $this->request->getData());
            if ($this->EventsTags->save($eventsTag)) {
                $this->Flash->success(__('The events tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events tag could not be saved. Please, try again.'));
        }
        $tags = $this->EventsTags->Tags->find('list', ['limit' => 200]);
        $events = $this->EventsTags->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventsTag', 'tags', 'events'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsTag = $this->EventsTags->get($id);
        if ($this->EventsTags->delete($eventsTag)) {
            $this->Flash->success(__('The events tag has been deleted.'));
        } else {
            $this->Flash->error(__('The events tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
