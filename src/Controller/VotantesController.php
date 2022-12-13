<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 *Votantes Controller
 * * @property \App\Model\Table\VotantesTable $Votantes *
 * @method \App\Model\Entity\Votante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = []) */
class VotantesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $votantes = $this->paginate($this->Votantes);

        $this->set(compact('votantes'));
    }

    /**
     * View method
     *
     * @param string|null $idVotante id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $votante = $this->Votantes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('votante', $votante);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $votante = $this->Votantes->newEntity();
        if ($this->request->is('post')) {
            $votante = $this->Votantes->patchEntity($votante, $this->request->getData());
            $votante->user_id = $this->Auth->User('id');

            $hoy = getdate();
            $fecha = $hoy['mday'] . "/" . $hoy['mon'] . "/" . $hoy['year'] + " " + $hoy['hours'] + ":" + $hoy['minutes'] + ":" + $hoy['seconds'];

            $votante->fecha = $fecha;

            if ($this->Votantes->save($votante)) {
                $this->Flash->success(__('Se ha guardado correctamente!'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('No se ha podido guardar. Por favor, intente de nuevo.'));
        }
        $users = $this->Votantes->Users->find('list', ['limit' => 200]);
        $this->set(compact('votante', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $idVotante id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $votante = $this->Votantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $votante = $this->Votantes->patchEntity($votante, $this->request->getData());
            if ($this->Votantes->save($votante)) {
                $this->Flash->success(__('Thevotante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thevotante could not be saved. Please, try again.'));
        }
        $users = $this->Votantes->Users->find('list', ['limit' => 200]);
        $this->set(compact('votante', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $idVotante id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $votante = $this->Votantes->get($id);
        if ($this->Votantes->delete($votante)) {
            $this->Flash->success(__('Thevotante has been deleted.'));
        } else {
            $this->Flash->error(__('Thevotante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}