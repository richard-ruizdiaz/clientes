<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry ; 
use App\Controller\AppController;

class PruebasHelper extends Helper  
{


   public function add($cordenada)
    {
        $prueba  =  TableRegistry::get('pruebas');
        $prueba->descripcion = $cordenada;
        
       echo "ubi " . $prueba->descripcion ;

       $query = TableRegistry::get('Pruebas')->query();


       $query->insert(['descripcion'])->values([
	        'descripcion' => 'First post'
	    ])->execute();


    }
            

}