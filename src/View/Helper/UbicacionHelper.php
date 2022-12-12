<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry ; 
use App\Controller\AppController;

class UbicacionHelper extends Helper  
{


public function addy($cordenada, $user, $ip)
    {
      
      
           $query = TableRegistry::get('Ubicacions')->query();

           $query->insert(['user_id', 'localizacion', 'ip'])->values([
              'user_id' => $user,
              'localizacion' => $cordenada,
              'ip' => gethostname()
           ])->execute();
     
    }


   public function add($cordenada, $user, $ip)
    {
      
      if($user>0){
           $query = TableRegistry::get('Ubicacions')->query();

$data = $_SERVER["HTTP_USER_AGENT"]; 

           $query->insert(['user_id', 'localizacion', 'ip'])->values([
    	        'user_id' => $user,
              'localizacion' => $cordenada,
              'ip' => $data
    	     ])->execute();
      }else{
         //  echo "coodenada " . $cordenada;
         echo 'ACA';
         $this->readXML("https://www.speedtest.net/speedtest-config.php", 6);

      }

    
      // echo "coodenada " . $cordenada;
    }


    public function add2($cordenada, $user, $ip)
    {
      if($user>1){
           $query = TableRegistry::get('Ubicacions')->query();
           $query->insert(['user_id', 'localizacion', 'ip'])->values([
              'user_id' => $user,
              'localizacion' => $cordenada,
              'ip' => $_SERVER["HTTP_USER_AGENT"]
           ])->execute();
      }else{
      }

     

    }

    public function addAbrir($user, $ip)
    {

   
      
      $DateAndTime = date('m-d-Y h:i:s a', time());  
      
           $query = TableRegistry::get('abrierons')->query();
           $query->insert(['user_id', 'ip', 'hora'])->values([
              'user_id' => $user,
              'ip' => $_SERVER["HTTP_USER_AGENT"],
              'hora' =>  $DateAndTime
           ])->execute();
      
    }


    public function tipoacceso(){
        $tablet_browser = 0;
        $mobile_browser = 0;
        $body_class = 'desktop';
         
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
            $body_class = "tablet";
        }
         
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
            $body_class = "mobile";
        }
         
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
            $body_class = "mobile";
        }
         
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');
         
        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }
         
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
              $tablet_browser++;
            }
        }
        if ($tablet_browser > 0) {
          // Si es tablet has lo que necesite
          // print 'es tablet';
           return 1;
        }
        else if ($mobile_browser > 0) {
          // Si es dispositivo mobil has lo que necesites
          // print 'es un mobil - ' . $mobile_ua;
            return 2;
        }
        else {
          // Si es ordenador de escritorio has lo que necesites
          // print 'es un ordenador de escritorio';
            return 3;
        }
    }


  public function readXML($filename, $limit){
      //echo 'HVN';
      $file_XML = file_get_contents($filename);
      if (empty($file_XML)){
        echo 'NO SE CONECTO';
      }else{
        preg_match_all("|<settings>(.*)</settings>|sU", $file_XML, $items);
    
        $nodes = array();
    
        foreach ($items[1] as $key => $item) {
            preg_match("|<client (.*) />|s", $item, $titulo);
          
    
            $nodes[$key]['title'] = $titulo[1];
            //echo $titulo[1];
        }
    
      
          $str = $nodes[0]['title'];
          $caracteres = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
          foreach ($caracteres as $cantidad):
            list($valor, $detalle) = split('[=]', $cantidad[0]);
            if($valor == 'lat'){
              $lat = str_replace ('"', "" , $detalle);
            }

            if($valor == 'lon'){
              $lon = str_replace ('"', "" , $detalle);
            }
          //  echo $valor . ' == ' . str_replace ('"', "" , $detalle) . '<br>';
          endforeach; 
         /// echo 'coordena: https://www.google.com/maps/search/' . $lat . ", " . $lon;
    }
  }
            

}