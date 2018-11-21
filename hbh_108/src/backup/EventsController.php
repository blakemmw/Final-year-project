<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function oldView($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Rooms', 'Tags', 'Tickets']
        ]);

        $this->set('event', $event);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {

            //image
            $myname = $this->request->getData()['photo']['name'];
            $mytmp = $this->request->getData()['photo']['tmp_name'];
            $myext = substr(strrchr($myname, "."), 1);
            $mypath = "img/" . $myname;

            //file
            $filename = $this->request->getData()['file']['name'];
            $filetmp = $this->request->getData()['file']['tmp_name'];
            $fileext = substr(strrchr($filename, "."), 1);
            $filepath = "upload/" . $filename . "." . $fileext;

            $event = $this->Events->patchEntity($event, $this->request->getData());
            $event->photo = $myname;
            $event->photo_dir = $mypath;
            $event->file = $filename;
            $event->path = $filepath;
            move_uploaded_file($filetmp, WWW_ROOT . $filepath);
            move_uploaded_file($mytmp,WWW_ROOT.$mypath);


            if ($this->Events->save($event)) {
                //if(move_uploaded_file($filetmp,WWW_ROOT.$filepath)){


                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'mydashboard']);
                //
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }


        $ravi = $this->request->getSession()->read('Auth.User.user_id');

        $roomsUsers = $this->Events->RoomsUsers->find('list', [
            'conditions' => ['RoomsUsers.user_id =' => $ravi],
            'contain' => ['Events'],
            'limit' => 200]);


        $sessions = $this->Events->RoomsUsers->find('list', ['RoomsUsers->Sessions.session_date']);

        $rooms = $this->Events->Rooms->find('list', ['limit' => 200]);
        $tags = $this->Events->Tags->find('list', ['limit' => 200]);
        $tickets = $this->Events->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('event', 'rooms', 'tags', 'tickets','roomsUsers'));


        $me = $this->request->getSession()->read('Auth.User.user_id');

        $bookings = $this->Events->find('list', [
            'contain' => ['Rooms'=> 'RoomsUsers'],
            'conditions' => [ 'rooms_users.user_id =' => $me]
        ]);
    }



    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Rooms', 'Tags', 'Tickets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $rooms = $this->Events->Rooms->find('list', ['limit' => 200]);
        $tags = $this->Events->Tags->find('list', ['limit' => 200]);
        $tickets = $this->Events->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('event', 'rooms', 'tags', 'tickets'));


    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'mydashboard']);
    }



    public function mydashboard(){

        $this->isHost();


        $me = $this->request->getSession()->read('Auth.User.user_id');

        $this->paginate = [
            'conditions' => [ 'events.user_id =' => $me]
        ];

        $events = $this->paginate($this->Events);


        $this->set(compact('events'));

        //create
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {

            //image
            $myname = $this->request->getData()['photo']['name'];
            $mytmp = $this->request->getData()['photo']['tmp_name'];
            $myext = substr(strrchr($myname, "."), 1);
            $mypath = "img/" . $myname;

            //file
            $filename = $this->request->getData()['file']['name'];
            $filetmp = $this->request->getData()['file']['tmp_name'];
            $fileext = substr(strrchr($filename, "."), 1);
            $filepath = "upload/" . $filename . "." . $fileext;

            $event = $this->Events->patchEntity($event, $this->request->getData());
            $event->photo = $myname;
            $event->photo_dir = $mypath;
            $event->file = $filename;
            $event->path = $filepath;
            move_uploaded_file($filetmp, WWW_ROOT . $filepath);
            move_uploaded_file($mytmp,WWW_ROOT.$mypath);


            if ($this->Events->save($event)) {
                //if(move_uploaded_file($filetmp,WWW_ROOT.$filepath)){


                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'mydashboard']);
                //
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }



        $rooms = $this->Events->Rooms->find('list', ['limit' => 200]);
        $tags = $this->Events->Tags->find('list', ['limit' => 200]);
        $tickets = $this->Events->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('event', 'rooms', 'tags', 'tickets'));


        $me = $this->request->getSession()->read('Auth.User.user_id');

        $bookings = $this->Events->find('list', [
            'contain' => ['Rooms'=> 'RoomsUsers'],
            'conditions' => [ 'rooms_users.user_id =' => $me]
        ]);



    }


    public function view($id = null){


        $this->isAttendee();

        //edit event
        $event = $this->Events->get($id, [
            'contain' => ['Tags','Rooms'=> 'Venues']
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $rooms = $this->Events->Rooms->find('list', ['limit' => 200]);
		        $tags = $this->Events->Tags->find('list', ['limit' => 200]);

        $this->set(compact('event', 'dashboard','tags'));

    }


   
    public function viewevent($id = null){

        $this->isHost();

        $ravi = $this->request->getSession()->read('Auth.User.user_id');

        //edit event
        $event = $this->Events->get($id, [
            'contain' => ['Tags','Rooms'=> 'Venues']
        ]);

        if($event->user_id == $ravi) {


            if ($this->request->is(['patch', 'post', 'put'])) {
                $event = $this->Events->patchEntity($event, $this->request->getData());
                if ($this->Events->save($event)) {
                    $this->Flash->success(__('The event has been saved.'));

                    return $this->redirect(['action' => 'mydashboard']);
                }
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
            $tags = $this->Events->Tags->find('list', ['limit' => 200]);
            $rooms = $this->Events->Rooms->find('list', ['limit' => 200]);
            $this->set(compact('event', 'tags', 'mydashboard'));


        }

        else{
            return $this->redirect(['action' => 'mydashboard']);
        }

    }


    public function download($id){
        $event = $this->Events->get($id);
        $path = WWW_ROOT.$event->path;
        //$path = WWW_ROOT .'files'. DS . $id;
        $this->response->body(function () use($path){
            return file_get_contents($path);
        });
        return $this->response->withDownload($event->file);

    }


    public function dashboard(){
        $this->isAttendee();


        $events = $this->paginate($this->Events);

        $this->set(compact('events'));

    }

}