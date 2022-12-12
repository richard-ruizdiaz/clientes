<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Ubicacions Controller
 *
 * @property \App\Model\Table\UbicacionsTable $Ubicacions
 */
class UbicacionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       
        $todostock  =  TableRegistry::get('users');
        $querystock = $todostock->find('all');
        $this->set('search', $querystock->toList());

       $search = null;

        if(!empty($this->request->query['search'])){
              $search = $this->request->query['search'];
              $this->paginate = [
                   'contain' => ['Users'] 
              ];

              $this->set('ubicacions', $this->paginate('Ubicacions', array(
                                        'conditions' => array(
                                            'ubicacions.user_id' => $search, 
                                        ),
                                        'order' => array(
                                            'id' => 'desc'
                                        )))
             );
            $users = $this->Ubicacions->Users->find('list', [
                   'keyField' => 'id'
            ]);
        $this->set(compact('users'));

    } else {

        $this->paginate = [
            'contain' => ['Users'] 
        ];

        $this->set('ubicacions', $this->paginate('Ubicacions', array(
        'conditions' => array(
            "ip <>  'NO ACCEDE UBICACION'", 
        ),
        'order' => array(
            'id' => 'desc'
        )
        )));

        $users = $this->Ubicacions->Users->find('list', [
                   'keyField' => 'id'
                ]);
        $this->set(compact('users'));
    }

    }

    /**
     * View method
     *
     * @param string|null $id Ubicacion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ubicacion = $this->Ubicacions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('ubicacion', $ubicacion);
        $this->set('_serialize', ['ubicacion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ubicacion = $this->Ubicacions->newEntity();
        if ($this->request->is('post')) {
            $ubicacion = $this->Ubicacions->patchEntity($ubicacion, $this->request->data);
            if ($this->Ubicacions->save($ubicacion)) {
                $this->Flash->success(__('The ubicacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ubicacion could not be saved. Please, try again.'));
        }
        $users = $this->Ubicacions->Users->find('list', ['limit' => 200]);
        $this->set(compact('ubicacion', 'users'));
        $this->set('_serialize', ['ubicacion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ubicacion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ubicacion = $this->Ubicacions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ubicacion = $this->Ubicacions->patchEntity($ubicacion, $this->request->data);
            if ($this->Ubicacions->save($ubicacion)) {
                $this->Flash->success(__('The ubicacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ubicacion could not be saved. Please, try again.'));
        }
        $users = $this->Ubicacions->Users->find('list', ['limit' => 200]);
        $this->set(compact('ubicacion', 'users'));
        $this->set('_serialize', ['ubicacion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ubicacion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
     
    }

    public function search(){
        $search = null;
        if(!empty($this->request->query['search'])){
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));
           
            foreach($terms as $term){
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                $conditions[] = array(
                    'OR' => array(
                        array('stocks.chasis LIKE' => '%' . $term . '%'),
                        array('stocks.modelo LIKE' => '%' . strtoupper($term) .'%'),
                        array('stocks.color LIKE' => '%' . strtoupper($term) .'%'),
                        array('stocks.ano LIKE' => '%' . strtoupper($term) .'%'),
                    )
                );
            }
            $stocks = $this->Stocks->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200, 'order' => ['Stocks.modelo' => 'asc']));
            $terms1 = array_diff($terms1, array(''));
                    $this->set(compact('stocks', 'terms1'));
            if($this->request->is('ajax')){
                $this->layout = true;
                $this->set('ajax', 1);
            }else{
                $this->set('ajax', 0);
            }
      } else {
         return $this->redirect(['action' => 'index']);
      }
    }


}
