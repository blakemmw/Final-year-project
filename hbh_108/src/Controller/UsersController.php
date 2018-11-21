<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Rooms','Tags']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $rooms = $this->Users->Rooms->find('list', ['limit' => 200]);
        $tags = $this->Users->Tags->find('list', ['limit' => 200]);

        $this->set(compact('user', 'rooms','tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $me = $this->request->getSession()->read('Auth.User.user_id');

        $id = $me;
        //now see if we can view

        $user = $this->Users->get($id, [
            'contain' => ['Rooms','Tags']
        ]);

//        $connect = mysqli_connect('130.194.7.82','team108','7sUZ7Yat','team108_dev');
//
//
//        $sql = mysqli_query($connect,"SELECT user_id FROM users");
//
//
//        $row = mysqli_fetch_assoc($sql);
//
//        $currentUser = $row['user_id'];


        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $rooms = $this->Users->Rooms->find('list', ['limit' => 200]);
        $tags = $this->Users->Tags->find('list', ['limit' => 200]);

        $this->set(compact('user', 'rooms','tags'));


    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

//
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['register', 'logout']);


    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                $login = $this->request->getSession()->read('Auth.User.user_type');
                if($login == 1)
                    return $this->redirect(['controller' => 'events/mydashboard']);

                else  if($login == 0) {
                    return $this->redirect(['controller' => 'events/dashboard']);
                }
                else if ($login == 50){
                    return $this->redirect(['controller' => 'users/admin']);
                }
                else{
                    return $this->redirect(['controller' => 'users/login']);

                }
            }
            // Bad Login
            $this->Flash->error('Incorrect Login');
        }

    }

    public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }

    public function register(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($this->Users->save($user)){
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('You are not registered');
            }
        }
        $tags = $this->Users->Tags->find('list', ['limit' => 200]);

        $this->set(compact('user','tags'));
        $this->render('register');
    }


    public function  businessDirect(){
        {

            $keyword = $this->request->getQuery('keyword');
            if(!empty($keyword)){
                $this->paginate = [
                    'conditions' => ['OR' => [ 'users.user_first_name LIKE '=>'%'.$keyword. '%']]];
            }


        }
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));


    }

    public function hbhview($id = null){

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function profile(){

        $this->isAttendee();

        $user = $this->request->getSession()->read('Auth.User');

        $this->set('user', $user);

    }

    public function host(){

        $this->isHost();


        $user = $this->request->getSession()->read('Auth.User');

        $this->set('user', $user);

    }








}
