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
            'contain' => ['Empleados']
        ]);
        $this->set('user', $user);

        $cedula = "";
        foreach ($user->empleados as $empleados): 
                $cedula = $empleados->cedula;
        endforeach;



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

        // listados de vehiculos
       // todos
        $todostock  =  TableRegistry::get('stocks');
        $querystock = $todostock->find('all');
        $this->set('todostock', $querystock->count());

        // todos
        $soloContado  =  TableRegistry::get('stocks');
        $querysolocontado = $soloContado->find('all', ['conditions' => [
             'Stocks.solocontado' => 1
        ]]);
        $this->set('solocontado', $querysolocontado->count());

        // RECIEN IMPORTADO
        $todostockrecien  =  TableRegistry::get('stocks');
        $querystockrecien = $todostockrecien->find('all', ['conditions' => [
                'Stocks.estado' => 'RECIEN IMPORTADO', 'Stocks.solocontado' => 0
            ]]);
        $this->set('todostockrecien', $querystockrecien->count());
        
        // 0 km
        $todoscerokm  =  TableRegistry::get('stocks');
        $querycero = $todoscerokm->find('all', ['conditions' => [
                'Stocks.estado' => '0 KM', 'Stocks.solocontado' => 0
            ]]);
        $this->set('todocerokm', $querycero->count());
        
        // USADO
        $todostockusado  =  TableRegistry::get('stocks');
        $querystockusado = $todostockusado->find('all', ['conditions' => [
                'Stocks.estado' => 'USADO', 'Stocks.solocontado' => 0
            ]]);
        $this->set('todostockusado', $querystockusado->count());
        // RECUPERADO
        $todostockrecuperado  =  TableRegistry::get('stocks');
        $querystockrecuperado = $todostockrecuperado->find('all', ['conditions' => [
                'Stocks.estado' => 'RECUPERADO', 'Stocks.solocontado' => 0, 'Stocks.secuestrado' => 0
            ]]);
        $this->set('todostockrecuperado', $querystockrecuperado->count());

        // SENADO
        $todostocksenado  =  TableRegistry::get('stocks');
        $querystocksenado = $todostocksenado->find('all', ['conditions' => [
                'Stocks.sena' => 'SI'
            ]]);
        $this->set('todostocksenado', $querystocksenado->count());


       // remate
        $todoremate  =  TableRegistry::get('remates');
        $queryremate = $todoremate->find()
        ->join([
                'stocks' => [
                    'table' => 'stocks',
                    'type' => 'INNER',
                    'conditions' => [ 'remates.chasis = stocks.chasis' ]
                ],
            ]);
        $this->set('remate', $queryremate->count());

        $todorematecentral  =  TableRegistry::get('remates');
        $queryrematecentral = $todorematecentral->find()
        ->join([
                'stocks' => [
                    'table' => 'stocks',
                    'type' => 'INNER',
                    'conditions' => [ 'remates.chasis = stocks.chasis' ]
                ],
            ]) ->where(['empresa = 1']) ;
        $this->set('rematecentral', $queryrematecentral->count());

        $todorematepremio  =  TableRegistry::get('remates');
        $queryrematepremio = $todorematepremio->find()
        ->join([
                'stocks' => [
                    'table' => 'stocks',
                    'type' => 'INNER',
                    'conditions' => [ 'remates.chasis = stocks.chasis' ]
                ],
            ]) ->where(['empresa = 2']) ;
        $this->set('rematepremio', $queryrematepremio->count());

        $todorematekm11  =  TableRegistry::get('remates');
        $queryrematekm11 = $todorematekm11->find()
        ->join([
                'stocks' => [
                    'table' => 'stocks',
                    'type' => 'INNER',
                    'conditions' => [ 'remates.chasis = stocks.chasis' ]
                ],
            ]) ->where(['empresa = 3']) ;
        $this->set('rematekm11', $queryrematekm11->count());

        // CANTIDAD DE FOTOS
        $imagenapp  =  TableRegistry::get('imagenapps');
        $queryimagenapp = $imagenapp->find('all', [
            'fields' => 'chasis', 
            'group' => 'chasis'
            ]);
        $this->set('imagenapp', $queryimagenapp->count());



       // faltan fotos
        $faltanfotos  =  TableRegistry::get('stocks');
        $queryfaltanfotos = $faltanfotos->find('all', ['conditions' => [
                'stocks.imagen IS NULL'
            ]]);
        $this->set('faltanfotos', $queryfaltanfotos->count());

        // total de creditos
        $creditos  =  TableRegistry::get('creditos');
        $querycreditos = $creditos->find('all', ['conditions' => ['cedula' => $cedula]]);
        $this->set('creditos', $querycreditos->count());


        $mesesN=array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
             "Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $hoy = getdate();

        $desde = "";
        $hasta = "";
        $ultimodia=array(1=>"31","28","31","30","31","30","31","31","30","31","30","31");
        if($hoy['mday'] >= 1 and $hoy['mday'] <= 5){
        	if($hoy['mon']==1){
				$this->set('mes', 'Enero');
                $desde = "01/01/".($hoy['year']-1);
                $hasta =  "31/01/".($hoy['year']-1);
        	}else{
	            $this->set('mes', $mesesN[$hoy['mon']-1]);
                $desde = "01/".($hoy['mon']-1)."/".$hoy['year'];
                $hasta = $ultimodia[($hoy['mon']-1)]."/".($hoy['mon']-1)."/".$hoy['year'];
        	}
             
        }else{
             $this->set('mes', $mesesN[$hoy['mon']]);
             $desde = "01/".$hoy['mon']."/".$hoy['year'];
             $hasta = $ultimodia[$hoy['mon']]."/".$hoy['mon']."/".$hoy['year'];
        }

        
        


        //////adelantos
        $adelantos  =  TableRegistry::get('adelantos');
        $sqladelanto = "to_date(fecha,'dd/MM/yyyy')  between to_date('".$desde."','dd/mm/yyyy') and to_date('".$hasta."','dd/mm/yyyy')";
        $queryadelantos = $adelantos->find('all', ['conditions' => [
                'Adelantos.empleado' => $this->Auth->User('empleado'),
                $sqladelanto
            ]] );
        $this->set('adelanto', $queryadelantos->count());


        // total de ventas
        $ventas  =  TableRegistry::get('ventas');
        $sqlventas = "to_date(fecha,'dd/MM/yyyy')  between to_date('".$desde."','dd/mm/yyyy') and to_date('".$hasta."','dd/mm/yyyy')";
        $queryventas = $ventas->find('all', ['conditions' => ['ventas.vendedors'  => $this->Auth->User('empleado') , $sqlventas] ] );
        $this->set('ventas', $queryventas->count());
        
        
        // total de PROPUESTAS
        $propuestas  =  TableRegistry::get('propuestas');
        $querypro = $propuestas->find('all', ['conditions' => ['propuestas.estado'  => 0 ] ] );
        $this->set('propuestapendiente', $querypro->count());

        // total de PROPUESTAS premio
        $propuestas  =  TableRegistry::get('propuestas');
        $querypro = $propuestas->find('all', ['conditions' => ['propuestas.estado'  => 0,  'propuestas.empresa'  => 2] ] );
        $this->set('propuestapendientepremio', $querypro->count());


        // total de PROPUESTAS
        $propuesta  =  TableRegistry::get('propuestas');
        $sqlpro = "to_date(fecha,'dd/MM/yyyy')  between to_date('".$desde."','dd/mm/yyyy') and to_date('".$hasta."','dd/mm/yyyy')";
        $querypros = $propuesta->find('all', ['conditions' => [$sqlpro] ] );
        $this->set('propuestadelmes', $querypros->count());



        $fechaactualizado  =  TableRegistry::get('actualizados');
        $queryfechaactualizado = $fechaactualizado->find('all');
        $this->set('fechaactualizado', $queryfechaactualizado->first());


        $aux  =  TableRegistry::get('auxiliar');
        $queryaux = $aux->find('all');
        $this->set('aux', $queryaux->first());

        $aduana = TableRegistry::get('imagenapps');
        $queryaduana = $aduana->find()
        ->where([ 'imagenapps.manual = 1', 'stocktodos.chasis is null', 'imagenapps.manualactualizado = 0'])
        ->join([
            'stocktodos' => [
                'table' => 'stocktodos',
                'type' => 'LEFT',
                'conditions' => [ "imagenapps.chasis = REPLACE(stocktodos.chasis, '.', '')" ]
            ],
        ]);
        $this->set('imagena',$queryaduana->count());


        // depostivo
        $tododeportivo  =  TableRegistry::get('stocks');
        $querydeportivo = $tododeportivo->find('all', ['conditions' => [
                'Stocks.deportivo' => 'ES DEPORTIVO'
            ]]);
        $this->set('tododeportivo', $querydeportivo->count());


        // secuestrado
        $todosecuestrado  =  TableRegistry::get('Stocktodos');
        $querysecuestrado = $todosecuestrado->find('all', ['conditions' => [
                'Stocktodos.secuestrado' => 1
            ]]);
        $this->set('todosecuestrado', $querysecuestrado->count());
        
        
        // nodisponible
        $todonodisponible  =  TableRegistry::get('stocks');
        $querynodisponible = $todonodisponible->find('all', ['conditions' => [
                'Stocks.disponible' => 1
            ]]);
        $this->set('todonodisponible', $querynodisponible->count());


        // llanta
        $todollanta  =  TableRegistry::get('stocks');
        $queryllanta = $todollanta->find('all', ['conditions' => [
                'Stocks.llanta' => 'TIENE LLANTA DEPORTIVA'
            ]]);
        $this->set('todollanta', $queryllanta->count());

        $this->set('hoy',  $hoy);

        $auxLLANTA  =  TableRegistry::get('llantas');
        $queryauxllantas = $auxLLANTA->find('all');
        $this->set('cantidadllantas', $queryauxllantas->count());


       //// PRE VENTA

       $fechasimulador = date('d/m/Y');

       $simulador  =  TableRegistry::get('SimuladorVentas');
       $sqlsimulador = "simuladorventas.mostrar = 1 and simuladorventas.confirmado = 0 and empleado_id = " .  $this->Auth->User('empleado') . " and fecha = '" .  $fechasimulador .  "'" ;
       $querymis = $simulador->find('all', ['conditions' => [$sqlsimulador] ] );
       $this->set('mis_preventas', $querymis->count());
        
       //gerente hvn

       $simuladorhvn = TableRegistry::get('SimuladorVentas');
        $querysimuladorhvn = $simuladorhvn->find()
        ->where(["simuladorventas.estado = 1 and Empleados.empresa = 1 and simuladorventas.fecha = '" . $fechasimulador . "'"])
        ->join([
            'Empleados' => [
                'table' => 'Empleados',
                'conditions' => [ "Empleados.id = empleado_id" ]
            ],
        ]);
        $this->set('gerente_hvn',$querysimuladorhvn->count());

        //mpremio
        $simuladorpremio = TableRegistry::get('SimuladorVentas');
        $querysimuladorpremio = $simuladorpremio->find()
        ->where(["simuladorventas.estado = 1 and Empleados.empresa = 2 and simuladorventas.fecha = '" . $fechasimulador . "'"])
        ->join([
            'Empleados' => [
                'table' => 'Empleados',
                'conditions' => [ "Empleados.id = empleado_id" ]
            ],
        ]);
        $this->set('gerente_premio',$querysimuladorpremio->count());

            // km 11
        $simuladorkm = TableRegistry::get('SimuladorVentas');
        $querysimuladorkm = $simuladorkm->find()
        ->where(["simuladorventas.estado = 1 and Empleados.empresa = 3 and simuladorventas.fecha = '" . $fechasimulador . "'"])
        ->join([
            'Empleados' => [
                'table' => 'Empleados',
                'conditions' => [ "Empleados.id = empleado_id" ]
            ],
        ]);
        $this->set('gerente_km',$querysimuladorkm->count());

        //genrente general

        $simuladorgerente  =  TableRegistry::get('SimuladorVentas');
        $sqlsimulador = "simuladorventas.estado = 2" ;
        $querygerente = $simuladorgerente->find('all', ['conditions' => [$sqlsimulador] ] );
        $this->set('gerente_general', $querygerente->count());


        // autorizar refuerzos
        $Autorizarrefuerzos  =  TableRegistry::get('autorizarrefuerzos');
        $queryautorizarrefuerzos = $Autorizarrefuerzos->find('all', ['conditions' => [
                'estado = 0'
            ]]);
        $this->set('autorizarrefuerzo', $queryautorizarrefuerzos->count());


        $Comisiones = TableRegistry::get('comisiones');
        $comision = $Comisiones->get(1);
        $tocks  =  TableRegistry::get('cotizacions');
        $query = $tocks->find('all');
        $venta = 0;
        $compra = 0;
        foreach ($query as $coti):
          $venta = $coti->doven;
          $compra = $coti->docom;
        endforeach;
        $this->set('cotizacionventa',  $venta);


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
