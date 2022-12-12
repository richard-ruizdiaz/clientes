<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry ; 
use App\Controller\AppController;

class BonoHelper extends Helper  
{


   public function add($chasis, $producto_id, $meses, $moneda , $total , $entrega , $saldo , $cuota , $montocuota , $refuerzo , $montorefuerzo , $empleado_id , $fecha , $hora , $tipopersona , $aleatorio , $totalbono)
    {
     

  

       $query = TableRegistry::get('simulador_ventas')->query();

       $query->insert(['chasis', 'producto_id', 'meses', 'moneda', 'total', 'entrega', 'saldo', 'cuota', 'montocuota', 'refuerzo', 'montorefuerzo', 'empleado_id', 'fecha', 'hora', 'tipopersona', 'ci', 'telefono', 'aleatorio', 'veces', 'vecesgerente', 'vecessergio', 'estado', 'borrado', 'confirmado', 'totalbono'])->values([
	      
        'chasis' => $chasis ,
        'producto_id' => $producto_id ,
        'meses' => $meses ,
        'moneda' => $moneda ,
        'total' => $total ,
        'entrega' => $entrega ,
        'saldo' => $saldo ,
        'cuota' => $cuota ,
        'montocuota' => $montocuota ,
        'refuerzo' => $refuerzo ,
        'montorefuerzo' => $montorefuerzo ,
        'empleado_id' => $empleado_id ,
        'fecha' => $fecha ,
        'hora' => $hora ,
        'tipopersona' => $tipopersona ,
        'ci' => '' ,
        'telefono' => '' ,
        'aleatorio' => $aleatorio ,
        'veces' => 1 ,
        'vecesgerente' => 0 ,
        'vecessergio' => 0 ,
        'estado' => 0 ,
        'borrado' => 0 ,
        'confirmado' => 0 ,
        'totalbono' => $totalbono

	     ])->execute();



       $simulador = TableRegistry::get('simulador_ventas');
       $querys = $simulador
        ->find()
        ->select(['id'])
        ->where([
            'chasis' => $chasis ,
        'producto_id' => $producto_id ,
        'meses' => $meses ,
        'moneda' => $moneda ,
        'total' => $total ,
        'entrega' => $entrega ,
        'saldo' => $saldo ,
        'cuota' => $cuota ,
        'montocuota' => $montocuota ,
        'refuerzo' => $refuerzo ,
        'montorefuerzo' => $montorefuerzo ,
        'empleado_id' => $empleado_id ,
        'fecha' => $fecha ,
        'hora' => $hora ,
        'tipopersona' => $tipopersona ,
        'ci' => '' ,
        'telefono' => '' ,
        'aleatorio' => $aleatorio ,
        'veces' => 1 ,
        'vecesgerente' => 0 ,
        'vecessergio' => 0 ,
        'estado' => 0 ,
        'borrado' => 0 ,
        'confirmado' => 0 ,
        'totalbono' => $totalbono
        ]);

        foreach ($querys as $bono) {
          return $this->redirect(['action' => 'edit', $bono->id]);
        }

  
    }
            

}