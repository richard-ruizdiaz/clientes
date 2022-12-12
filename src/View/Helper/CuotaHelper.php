<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry ; 
use App\Controller\AppController;

class CuotaHelper extends Helper  
{


   public function add($cordenada, $user, $ip)
    {
      
      if($user>1){
           $query = TableRegistry::get('Ubicacions')->query();

           $query->insert(['user_id', 'localizacion', 'ip'])->values([
    	        'user_id' => $user,
              'localizacion' => $cordenada,
              'ip' => gethostname()
    	     ])->execute();
      }else{;
      }
    }

  public function saldo($id){
      $cuotas = TableRegistry::get('cuotas');
      $query = $cuotas->find(); 
      $query
        ->select(['sum' => $query->func()->sum('saldo')])
        ->where(['credito' => $id]);
      $val = 0;
      foreach ($query as $valor): 
          $val = $valor->sum;
      endforeach;
      return $val;
  }


   public function contar($id){
      $cuotas = TableRegistry::get('cuotas');
      $query = $cuotas->find(); 
      $query
        ->select(['count' => $query->func()->count('saldo')])
        ->where(['credito' => $id, 'estado' => 'PENDIENTE']);
      $val = 0;
      foreach ($query as $valor): 
          $val = $valor->count;
      endforeach;
      if($val > 1){
          return $val . ' CUOTAS';
      }else{
          return $val . ' CUOTA';
      }
      
  }
   

}