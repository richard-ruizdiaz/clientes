<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry ;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    var $helpers = array('Pruebas');

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
       // $this->Auth->allow(['add']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['home', 'view', 'logout']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);


                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Datos son invalidos, por favor intente nuevamente', ['key' => 'auth']);
            }
        }

        if ($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function home()
    {


        $user = $this->Users->get($this->Auth->User('id'), [
            'contain' => []
        ]);
        $this->set('user', $user);



        if( $this->Auth->User('id') > 1){
            $users  =  TableRegistry::get('users');
            $querys = $users->find('all', ['conditions' => [
                'id' => $this->Auth->User('id')
            ]]);

            $sena = "";
            foreach ($querys as $usu):
                $sena = $usu->password;
            endforeach;

            if($sena == '$2y$10$skBMG.yXFSNr1qxo0z40/.1WHULudoTtwWFfqn1jjTlu/NHofTjoK'){
                return $this->redirect(['controller' => 'Users' , 'action' => 'edit' , $this->Auth->User('id')]);
            }

        }



        $this->render();
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sqlpro = "id = ".$this->Auth->User('id');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function index2()
    {
        $sqlpro = "id = ".$this->Auth->User('id');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function recoverPassword($id = null)
    {
        return '*';
     }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Empleados']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $empleados = $this->Users->Empleados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'empleados'));
        $this->set('_serialize', ['user']);
    }


    public function edit3()
    {
    	if ($this->request->is('post')) {

    	$connection = ConnectionManager::get('default');
        $connection->execute('UPDATE auxiliar SET estado = 1');

        $connection->disconnect();

        return $this->redirect(['action' => 'home']);
        }
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Empleados']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                return $this->redirect( ['controller' => 'Users', 'action' => 'logout']);
            }
            $this->Flash->error(__('Ocurrio un error, intente de nuevo!'));
        }
        $empleados = $this->Users->Empleados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'empleados'));
        $this->set('_serialize', ['user']);
    }


public function edit2($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Empleados']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                return $this->redirect( ['controller' => 'Users', 'action' => 'logout']);
            }
            $this->Flash->error(__('Ocurrio un error, intente de nuevo!'));
        }
        $empleados = $this->Users->Empleados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'empleados'));
        $this->set('_serialize', ['user']);
    }


    public function editfoto($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Empleados']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                return $this->redirect( ['controller' => 'Users', 'action' => 'logout']);
            }
            $this->Flash->error(__('Ocurrio un error, intente de nuevo!'));
        }
        $empleados = $this->Users->Empleados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'empleados'));
        $this->set('_serialize', ['user']);
    }


 public function editfoto2($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Empleados']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                return $this->redirect( ['controller' => 'Users', 'action' => 'logout']);
            }
            $this->Flash->error(__('Ocurrio un error, intente de nuevo!'));
        }
        $empleados = $this->Users->Empleados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'empleados'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
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


    public function activar($id = null)
    {

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->id=$id;
            $user->active=1;
            if ($this->Users->save($user)) {
                 return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocurrio un error, intente de nuevo!'));
        }

    }


     public function desactivar($id = null)
    {

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
             $user->id=$id;
            $user->active=0;
            if ($this->Users->save($user)) {
                 return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocurrio un error, intente de nuevo!'));
        }

    }

    public function prueba(){

    }

    public function canal(){

    }

}
