<?= $this->Html->css('all.min') ?>
<?= $this->Html->css('custom') ?>

<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>



<body language=JavaScript onLoad="find()">
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=hyXUJsUNCXXgrqKoV6-7fzom"></script>
    <script>
    function find() {
        var output = document.getElementById('map');
        var ubicac = "";
        if (navigator.geolocation) {} else {
            output.innerHTML = "<p>Tu navegador no soporta el sistema</p>";
        }

        function localizacion(posicion) {
            var latitude = posicion.coords.latitude;
            var longitude = posicion.coords.longitude;
            ubicac = latitude + ", " + longitude;
            document.cookie = "ubicas=" + ubicac + ";";
        }

        function error() {
            <
            ?
            php
            echo $this - > Ubicacion - > add2($phpVar1, $current_user['id'], 'NO ACCEDE UBICACION'); ?
            >
        }
        navigator.geolocation.getCurrentPosition(localizacion, error);
    }
    </script>
</body>


<?php
    if(isset($_COOKIE["ubicas"])) {
	    $phpVar1 = $_COOKIE["ubicas"];
	  
        echo $this->Ubicacion->add($phpVar1, $current_user['id'], '192.168.10.250' );
       // if($current_user['id'] == 1){
       //     echo $this->Ubicacion->readXML("https://www.speedtest.net/speedtest-config.php", 6);
        //}
       
    }else{
		echo '<script language=JavaScript> document.reload();  </script>';
    }
?>


<div class="col-md-9 pull-md-right">
    <center>
        <h1>Bienvenido <?= $current_user['first_name']  ?>  </h1>
    </center>

    <h3>Cotización del dia: <?= number_format($cotizacionventa, 0, ',', '.')  ?> </h3>

<?php
if($current_user['id'] == 1){
  // foreach($_SERVER as $key => $value){
   //echo '$_SERVER["'.$key.'"] = '.$value."<br />";
   echo $_SERVER["HTTP_USER_AGENT"];
//} 
}

?>

    <?php
   			echo $this->Ubicacion->addAbrir( $current_user['id'], 'ABRIO MENU' );
    	?>
</div>

<div class="row">

    <div class="col-md-9 pull-md-right">
        <div class="header-lined">
            <h2>Listados de vehiculos</h2>
        </div>
    </div>
    <div class="col-md-9 pull-md-right main-content">
        <div class="tiles clearfix">
            <div class="row">
                <!-- BOTON TODOS -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/index'>
                    <a href='/stocks/index'>
                        <div class="stat"><?php echo $todostock; ?></div>
                        <div class="title">TODOS</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div>
                <!-- BOTON RECIEN IMPORTADOS -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/solocontado'>
                    <a href='/stocks/solocontado'>
                        <div class="stat"><?php echo $solocontado; ?></div>
                        <div class="title">SOLO CONTADO</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>

                <!-- BOTON RECIEN IMPORTADOS -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/recienimportado'>
                    <a href='/stocks/recienimportado'>
                        <div class="stat"><?php echo $todostockrecien; ?></div>
                        <div class="title">RECIEN IMPORT.</div>
                        <div class="highlight bg-color-green"></div>
                    </a>
                </div>
                
                <!-- BOTON 0KM -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/cerokm'>
                    <a href='/stocks/cerokm'>
                        <div class="stat"><?php echo $todocerokm; ?></div>
                        <div class="title">0 KM</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div>
                
                <!-- BOTON USADO -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/usado'>
                    <a href='/stocks/usado'>
                        <div class="stat"><?php echo $todostockusado; ?></div>
                        <div class="title">USADOS</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>
                <!-- BOTON recuperado -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/recuperado'>
                    <a href='/stocks/recuperado'>
                        <div class="stat"><?php echo $todostockrecuperado; ?></div>
                        <div class="title">RECUPERADOS</div>
                        <div class="highlight bg-color-purple"></div>
                    </a>
                </div>

                <!-- BOTON SECUESTRADOS -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/secuestrado'>
                    <a href='/stocks/secuestrado'>
                        <div class="stat"><?php echo $todosecuestrado; ?></div>
                        <div class="title">SECUESTRADOS</div>
                        <div class="highlight bg-color-red"></div>
                    </a>
                </div>
                
                <!-- BOTON NO DISPONIBLE -->
                 <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/nodisponibles'>
                    <a href='/stocks/nodisponibles'>
                        <div class="stat"><?php echo $todonodisponible; ?></div>
                        <div class="title">NO DISPONIBLES</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>

                <!-- BOTON deportivo -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/deportivo'>
                    <a href='/stocks/deportivo'>
                        <div class="stat"><?php echo $tododeportivo; ?></div>
                        <div class="title">DEPORTIVOS</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div>

                <!-- BOTON llanta -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/llanta'>
                    <a href='/stocks/llanta'>
                        <div class="stat"><?php echo $todollanta; ?></div>
                        <div class="title">AUTOS CON LLANTAS DEPORTIVAS</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>




                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/senado'>
                    <a href='/stocks/senado'>
                        <div class="stat"><?php echo $todostocksenado; ?></div>
                        <div class="title">SEÑADOS</div>
                        <div class="highlight bg-color-red"></div>
                    </a>
                </div>

                <div class="col-sm-3 col-xs-6 tile" onclick='/imagenapps/aduana'>
                    <a href='/imagenapps/aduana'>
                        <div class="stat"><?php echo $imagena; ?></div>
                        <div class="title">VEH. EN ADUANA</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>


                <div class="col-sm-3 col-xs-6 tile" onclick='/models-anos/'>
                    <a href='/models-anos/'>
                        <div class="stat">#</div>
                        <div class="title">TASACIÓN USADOS</div>
                        <div class="highlight bg-color-purple"></div>
                    </a>
                </div>

                <!-- BOTON llanta -->
                <div class="col-sm-3 col-xs-6 tile" onclick='/llantas'>
                    <a href='/llantas'>
                        <div class="stat"><?php echo $cantidadllantas; ?></div>
                        <div class="title">LLANTAS DEPORTIVAS</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>


                <?php  if($current_user['id']==1 or $current_user['id']==2 or $current_user['id']==3){ ?>
                <div class="col-sm-3 col-xs-6 tile" onclick='/imagenapps/index2'>
                    <a href='/imagenapps/index2'>
                        <div class="stat"><?php echo $imagenapp; ?></div>
                        <div class="title">FOTOS CARGADAS</div>
                        <div class="highlight bg-color-green"></div>
                    </a>
                </div>

                <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/faltafoto'>
                    <a href='/stocks/faltafoto'>
                        <div class="stat"><?php echo $faltanfotos; ?></div>
                        <div class="title">FALTAN FOTOS</div>
                        <div class="highlight bg-color-red"></div>
                    </a>
                </div>

                <?php  } ?>
                <div class="col-sm-3 col-xs-6 tile" onclick='/cambio-volantes/busqueda'>
                    <a href='/cambio-volantes/busqueda'>
                        <div class="stat">*</div>
                        <div class="title">CONSULTA CAMBIO VOLANTE</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div>

                <?php  if($current_user['id']==1 or $current_user['id']==48){ ?>
                    <div class="col-sm-3 col-xs-6 tile" onclick='/autorizarrefuerzos'>
                        <a href='/autorizarrefuerzos'>
                            <div class="stat"><?php echo $autorizarrefuerzo; ?></div>
                            <div class="title">AUTORIZAR REFUERZO</div>
                            <div class="highlight bg-color-red"></div>
                        </a>
                    </div>
                <?php  } ?>

                <?php 
                  if($current_user['lavadero']==1){
                ?>
                    <div class="col-sm-3 col-xs-6 tile" onclick='/chaperias/lavadero/'>
                        <a href='/chaperias/lavadero/'>
                            <div class="stat">+</div>
                            <div class="title">LAVADERO</div>
                            <div class="highlight bg-color-red"></div>
                        </a>
                    </div>
                  <?php 
                  }
                ?>

                <div class="col-sm-3 col-xs-6 tile" onclick='/agendachasis/agregar/'>
                        <a href='/agendachasis/agregar'>
                            <div class="stat">+</div>
                            <div class="title">Agregar agenda</div>
                            <div class="highlight bg-color-green"></div>
                        </a>
                    </div>
                    
                    <div class="col-sm-3 col-xs-6 tile" onclick='/agendachasis/'>
                        <a href='/agendachasis'>
                            <div class="stat">*</div>
                            <div class="title">Agendas realizadas</div>
                            <div class="highlight bg-color-red"></div>
                        </a>
                    </div>
                    

            </div>



        </div>

        <?php  if($current_user['id']==1 ) { ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Aprobar ventas</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/aprobarventas/'>
                <!-- BOTON TODOS -->
                <a href='/aprobarventas/'>
                    <div class="stat">Ventas</div>
                    <div class="title"></div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->
        </div>
        <?php  } ?>
        
        
       
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Orden de trabajos</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/trabajosarealizars/empleado'>
                <!-- BOTON TODOS -->
                <a href='/trabajosarealizars/empleado'>
                    <div class="stat">Ver</div>
                    <div class="title"></div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div> <!-- FIN BOTON -->
            
            <?php  if($current_user['id'] < 4 or $current_user['id'] == 31 or $current_user['id'] == 11 or $current_user['id'] == 341 or $current_user['id'] == 364)   { ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/trabajosarealizars/'>
                <!-- BOTON TODOS -->
                <a href='/trabajosarealizars/'>
                    <div class="stat">todos</div>
                    <div class="title"></div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div> <!-- FIN BOTON -->
             <?php } ?>
            
        </div>
     


        
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Listado de Chaperia</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/chaperias/'>
                <!-- BOTON TODOS -->
                <a href='/chaperias/'>
                    <div class="stat">$</div>
                    <div class="title">LISTADO</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

            
            <?php  if(
                $current_user['id']==31 or //german
            $current_user['id']==48 or  //nestor
            $current_user['id']==1 or  //prg
            $current_user['id']==120 or // charly
            $current_user['id']==343 // victor
            ) { ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/chaperias/busqueda/'>
                <!-- BOTON TODOS -->
                <a href='/chaperias/busqueda/'>
                    <div class="stat">+</div>
                    <div class="title">AGREGAR TRABAJO</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->
            <?php  } ?>
        </div>
        
        
        <?php  if(
            $current_user['id']==1 or  //prg
            $current_user['id']==31 or //german
            $current_user['id']==2 //oscar
            ) { ?>
            
         <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Listado de Cambio volante</h2>
            </div>
        </div>
        <div class="tiles clearfix">
           
            
            <div class="col-sm-3 col-xs-6 tile" onclick='/asignarcvs'>
                <!-- BOTON TODOS -->
                <a href='/asignarcvs'>
                    <div class="stat">+</div>
                    <div class="title">ASIGNAR TRABAJO CV</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->
            
            <div class="col-sm-3 col-xs-6 tile" onclick='/PagarCvs'>
                <!-- BOTON TODOS -->
                <a href='/PagarCvs'>
                    <div class="stat">$</div>
                    <div class="title">TRABAJOS ASIGNADOS</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div> <!-- FIN BOTON -->
            
            
            <div class="col-sm-3 col-xs-6 tile" onclick='/funcionariocvs'>
                <!-- BOTON TODOS -->
                <a href='/funcionariocvs'>
                    <div class="stat">+</div>
                    <div class="title">AGREGAR TRABAJADOR</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div> <!-- FIN BOTON -->
            
        </div>
        
        <?php  } ?>
        


        <?php  if($current_user['id']==269) { ?>
            <div class="col-md-9 pull-md-right">
                <div class="header-lined">
                    <h2>Informes de buscador de propuesta</h2>
                </div>
            </div>
             <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentetodos'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listadogerentetodos'>
                    <div class="stat">.</div>
                    <div class="title">BUSCADOR</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->
            </div>
         <?php  } ?>  
         
        <!-- para vendedores  -->
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Listado de Pre-Ventas</h2>
            </div>
        </div>

        <div class="tiles clearfix">

        <?php  if($current_user['id'] > 3) {     ?>

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/movil'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/movil'>
                    <div class="stat"><?php echo $mis_preventas ; ?></div>
                    <div class="title">Mis Ventas</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/todos'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/todos'>
                    <div class="stat">+</div>
                    <div class="title">Mis Ventas - Por Fecha</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadoxcodigo'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listadoxcodigo'>
                    <div class="stat">.</div>
                    <div class="title">Mis Ventas - Por código</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->



            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/aprobadogerente'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/aprobados'>
                    <div class="stat">-</div>
                    <div class="title">Aumentado por Gerente</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/aprobadogerente'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/aprobadogerente'>
                    <div class="stat">+</div>
                    <div class="title">Aumentado por Sergio</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <?php  } ?>


            <!--  PARA GERENTE DE CENTRAL   -->
            <?php  if($current_user['id']==26 or $current_user['id']==1) {  //ESTEFANI     ?>
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerente/1'>
                                <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerente/1'>
                        <div class="stat"><?php echo $gerente_hvn ; ?></div>
                        <div class="title">GERENTE CENTRAL</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentexfecha/1'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentexfecha/1'>
                        <div class="stat">+</div>
                        <div class="title">GERENTE CENTRAL POR FECHA</div>
                        <div class="highlight bg-color-red"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentexcodigo/1'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentexcodigo/1'>
                        <div class="stat"></div>
                        <div class="title">BUSCADOR POR CODIGO</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadoscountgerente/1'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadoscountgerente/1'>
                        <div class="stat"></div>
                        <div class="title">CANTIDAD DE PROPUESTAS</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/Ventas/central'>
                    <!-- BOTON TODOS -->
                    <a href='/Ventas/central/'>
                        <div class="stat"></div>
                        <div class="title">VENTAS X FECHA</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->

            <?php  } ?>
            
            
            
            <!--  PARA GERENTE DE PREMIO   -->

            <?php  if($current_user['id']==25 or $current_user['id']==1) {  //DIANA ?>
            
                <div class="col-sm-3 col-xs-6 tile" onclick='/Ventas/premio'>
                    <!-- BOTON TODOS -->
                    <a href='/Ventas/premio/'>
                        <div class="stat"></div>
                        <div class="title">VENTAS X FECHA</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
                
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerente/2'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerente/2'>
                        <div class="stat"><?php echo $gerente_premio ; ?></div>
                        <div class="title">GERENTE PREMIO</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentexfecha/2'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentexfecha/2'>
                        <div class="stat">+</div>
                        <div class="title">GERENTE PREMIO POR FECHA</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentexcodigo/2'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentexcodigo/2'>
                        <div class="stat"></div>
                        <div class="title">BUSCADOR POR CODIGO</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadoscountgerente/2'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadoscountgerente/2'>
                        <div class="stat"></div>
                        <div class="title">CANTIDAD DE PROPUESTAS</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->

            <?php  } ?>



                <!--  PARA GERENTE DE KM 11   -->

            <?php  if($current_user['id']==19 or $current_user['id']==1) {  //BURGOS ?>
            
                <div class="col-sm-3 col-xs-6 tile" onclick='/Ventas/km11'>
                    <!-- BOTON TODOS -->
                    <a href='/Ventas/km11/'>
                        <div class="stat"></div>
                        <div class="title">VENTAS X FECHA</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
                
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerente/3'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerente/3'>
                        <div class="stat"><?php echo $gerente_km ; ?></div>
                        <div class="title">GERENTE KM 11</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentexfecha/3'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentexfecha/3'>
                        <div class="stat">+</div>
                        <div class="title">GERENTE KM 11 POR FECHA</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentexcodigo/3'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentexcodigo/3'>
                        <div class="stat"></div>
                        <div class="title">BUSCADOR POR CODIGO</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->
    
                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadoscountgerente/3'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadoscountgerente/3'>
                        <div class="stat"></div>
                        <div class="title">CANTIDAD DE PROPUESTAS</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->

            <?php  } ?>


            <?php  if($current_user['id']==3 or $current_user['id']==1 
                 or $current_user['id']==382
                 or $current_user['id']==326 //jennifer
                 ) {  //SERGIO?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listado2gerente'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listado2gerente'>
                    <div class="stat"><?php echo $gerente_general ; ?></div>
                    <div class="title">AUMENTAR MÁS BONO</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->


            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/gerentes'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/gerentes'>
                    <div class="stat">.</div>
                    <div class="title">SUCURSALES</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div> <!-- FIN BOTON -->


            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentetodos'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listadogerentetodos'>
                    <div class="stat">.</div>
                    <div class="title">BUSCADOR</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadoscount2'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listadoscount2'>
                    <div class="stat">.</div>
                    <div class="title">BUSCADOR CANTIDADES</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div> <!-- FIN BOTON -->


            <?php  } ?>


        </div>
        
        
         

        <?php  if($current_user['id']==1 or $current_user['id']==48) { ?>
            <div class="col-md-9 pull-md-right">
                <div class="header-lined">
                    <h2>Informes de Propuestas</h2>
                </div>
            </div>

            <div class="tiles clearfix">
                

                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/gerentes'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/gerentes'>
                        <div class="stat">.</div>
                        <div class="title">SUCURSALES</div>
                        <div class="highlight bg-color-gold"></div>
                    </a>
                </div> <!-- FIN BOTON -->

                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerentetodos'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadogerentetodos'>
                        <div class="stat">.</div>
                        <div class="title">BUSCADOR</div>
                        <div class="highlight bg-color-blue"></div>
                    </a>
                </div> <!-- FIN BOTON -->

                <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadoscount2'>
                    <!-- BOTON TODOS -->
                    <a href='/SimuladorVentas/listadoscount2'>
                        <div class="stat">.</div>
                        <div class="title">BUSCADOR CANTIDADES</div>
                        <div class="highlight bg-color-red"></div>
                    </a>
                </div> <!-- FIN BOTON -->
            </div>

        <?php  } ?>

        <?php  if(
        $current_user['id']==1
   
        ) { ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Listado de Pre-Ventas</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/movil'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/movil'>
                    <div class="stat">-</div>
                    <div class="title">TODOS</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listadogerente/1'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listadogerente/1'>
                    <div class="stat">+</div>
                    <div class="title">GERENTE</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listado2gerente'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listado2gerente'>
                    <div class="stat">+</div>
                    <div class="title">SERGIO BONO</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

            <div class="col-sm-3 col-xs-6 tile" onclick='/SimuladorVentas/listado3gerente'>
                <!-- BOTON TODOS -->
                <a href='/SimuladorVentas/listado3gerente'>
                    <div class="stat">+</div>
                    <div class="title">APROBAR</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div> <!-- FIN BOTON -->

        </div>

        <?php  } ?>



        <?php  if(
        $current_user['id']==1 or $current_user['id']==2 or $current_user['id']==3 or $current_user['id']==48
         or $current_user['id']==382
        ){ ?>

        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Cambio de precio</h2>
            </div>
        </div>


        <div class="tiles clearfix">
        <?php  if( $current_user['id']==2 or $current_user['id']==3 
        or $current_user['id']==382){ ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/preciogenerals'>
                <a href='/preciogenerals'>
                    <div class="stat">$</div>
                    <div class="title">VEHICULOS</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>
            <?php  } ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/Bonosdescuentos/mostrar'>
                <a href='/Bonosdescuentos/mostrar'>
                    <div class="stat">- $</div>
                    <div class="title">Bonos</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/comisiones/view/1'>
                <a href='/comisiones/view/1'>
                    <div class="stat">$</div>
                    <div class="title">Comisiones</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/administrador-precios/view/1'>
                <a href='/administrador-precios/view/1'>
                    <div class="stat">$</div>
                    <div class="title">Adm. de Precios</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>

        </div>


        <?php  } ?>



        <?php  if($current_user['id']==1 or $current_user['id']==2 or $current_user['id']==3 or $current_user['id']== 239){ ?>

        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Construcción</h2>
            </div>
        </div>

        <div class="tiles clearfix">

            <?php  if($current_user['id']==1 or $current_user['id']==2 or $current_user['id']==3){ ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/calidad-construccions'>
                <a href='/calidad-construccions'>
                    <div class="stat">$</div>
                    <div class="title">Administrar Precios</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>
            <?php  } ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/calidad-construccions/simulador'>
                <a href='/calidad-construccions/simulador'>
                    <div class="stat">-</div>
                    <div class="title">Simulador de venta</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
        </div>
        <?php  } ?>



    
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Remates</h2>
            </div>
        </div>
        <div class="tiles clearfix">

            <div class="col-sm-3 col-xs-6 tile" onclick='/remates'>
                <a href='/remates'>
                    <div class="stat"><?php echo $remate; ?></div>
                    <div class="title">TODOS REMATES</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/remates/central'>
                <a href='/remates/central'>
                    <div class="stat"> <?php echo $rematecentral; ?> </div>
                    <div class="title">HVN CENTRAL</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/remates/premio'>
                <a href='/remates/premio'>
                    <div class="stat"> <?php echo $rematepremio; ?> </div>
                    <div class="title">PREMIO A.</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/remates/km11'>
                <a href='/remates/km11'>
                    <div class="stat"> <?php echo $rematekm11; ?> </div>
                    <div class="title">HVN KM 11</div>
                    <div class="highlight bg-color-purple"></div>
                </a>
            </div>
        </div>
    
            <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Inventario</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/inventarios/'>
                <a href='/inventarios'>
                    <div class="stat"> * </div>
                    <div class="title">Listado y agregar</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/InventariosUsados/'>
                <a href='/InventariosUsados'>
                    <div class="stat"> * </div>
                    <div class="title">Usados</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/inventarioPlayas/busqueda/'>
                <a href='/inventarioPlayas/busqueda/'>
                    <div class="stat"> * </div>
                    <div class="title">Para Playas</div>
                    <div class="highlight bg-color-purple"></div>
                </a>
            </div>

            <?php  if($current_user['id']==35){ ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/stocktodos/'>
                <a href='/stocktodos'>
                    <div class="stat"> * </div>
                    <div class="title">Consulta chasis - venta</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
            <?php  } ?>

            <?php  if($current_user['id']==1 or $current_user['id']==2 or $current_user['id']==3 or $current_user['id']==31){ ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/stocktodos/'>
                <a href='/stocktodos'>
                    <div class="stat"> * </div>
                    <div class="title">Consulta chasis - venta</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/inventarios/listado2/'>
                <a href='/inventarios/listado2/'>
                    <div class="stat"> * </div>
                    <div class="title">Inventarios NO</div>
                    <div class="highlight bg-color-purple"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/inventarios/listado3/'>
                <a href='/inventarios/listado3/'>
                    <div class="stat"> * </div>
                    <div class="title">Inventarios NO-SI</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>

            <?php  } ?>
        </div>




        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Datos adicionales</h2>
            </div>
        </div>

        <div class="tiles clearfix">


            <div class="col-sm-3 col-xs-6 tile" onclick='/ventas/'>
                <a href='/ventas/'>
                    <div class="stat"><?php echo $ventas; ?></div>
                    <div class="title">VENTAS DE <?php echo $mes; ?></div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/adelantos'>
                <a href='/adelantos'>
                    <div class="stat"><?php echo $adelanto; ?></div>
                    <div class="title">ADELANTOS DE <?php echo $mes; ?></div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>

            <?php foreach ($user->empleados as $empleados): ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/empleados/view/<?= $empleados->cedula ?>'>
                <a href='/creditos/cuenta/<?= $empleados->cedula ?>'>
                    <div class="stat"><?php echo $creditos; ?></div>
                    <div class="title">DEUDAS</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
            <?php endforeach; ?>

            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas'>
                <a href='/propuestas'>
                    <div class="stat">*</div>
                    <div class="title">PROPUESTAS</div>
                    <div class="highlight bg-color-purple"></div>
                </a>
            </div>
        </div>
        <div class="tiles clearfix">
            <?php  if($current_user['id']==3 or $current_user['id']==2 or $current_user['id']==48 ){ ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/AdelantoChapas'>
                <a href='/AdelantoChapas'>
                    <div class="stat">*</div>
                    <div class="title">ADELANTOS CHAPAS</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>
            <?php  } ?>


            <?php  if($current_user['id']==3 or $current_user['id']==1 or $current_user['id']==48 or $current_user['id']==35 ){ ?>
            <div class="col-sm-3 col-xs-6 tile" onclick='/empleados/mes'>
                <a href='/empleados/mes'>
                    <div class="stat">*</div>
                    <div class="title">TODAS LAS VENTAS POR MES</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
            <?php  } ?>

        </div>


        <?php  if($current_user['id']==26 or $current_user['id']==1 ){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Propuestas Premio</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas/gerentepremio'>
                <a href='/propuestas/gerentepremio'>
                    <div class="stat"> <?php echo $propuestapendientepremio; ?> </div>
                    <div class="title">PROPUESTAS A RESPONDER</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
        </div>
        <?php  } ?>


        <?php  if($current_user['id']==3 or $current_user['id']==35 or $current_user['id']==1  or $current_user['id']==48 or $current_user['id']==37 or $current_user['id']==170){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Propuestas</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas/gerente'>
                <a href='/propuestas/gerente'>
                    <div class="stat"> <?php echo $propuestapendiente; ?> </div>
                    <div class="title">PROPUESTAS A RESPONDER</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas/gerentedelmes'>
                <a href='/propuestas/gerentedelmes'>
                    <div class="stat"> <?php echo $propuestadelmes; ?> </div>
                    <div class="title">PROPUESTAS DEL MES <?php echo $mesactual; ?></div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas/dia'>
                <a href='/propuestas/dia'>
                    <div class="stat">dia</div>
                    <div class="title">PROPUESTAS DEL MES <?php echo $mesactual; ?> - POR DIA</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas/mes'>
                <a href='/propuestas/mes'>
                    <div class="stat">mes</div>
                    <div class="title">CANTIDAD PROPUESTAS POR MES</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>

        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/propuestas/duplicados'>
                <a href='/propuestas/duplicados'>
                    <div class="stat">-</div>
                    <div class="title">DUPLICADOS</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>
        </div>
        <?php  if($current_user['id'] == 1 or $current_user['id'] == 3 or $current_user['id'] == 48){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Ubicacion</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/ubicacions/'>
                <a href='/ubicacions/'>
                    <div class="stat"> * </div>
                    <div class="title">LISTADO</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
        </div>
        <?php  } ?>



        <?php  if($current_user['id']==1 ){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Trabajos A realizar</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/trabajos/'>
                <a href='/trabajos/'>
                    <div class="stat"> * </div>
                    <div class="title">LISTADO</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/stocks/indexventa/'>
                <a href='/stocks/indexventa/'>
                    <div class="stat"> * </div>
                    <div class="title">Ventas</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
        </div>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Imagen chasis</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/imagenapps/'>
                <a href='/imagenapps/'>
                    <div class="stat"> * </div>
                    <div class="title">*</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
        </div>
        <?php  } ?>

        <?php  } ?>

        <?php  if($current_user['id'] == 1 or 
                  $current_user['id'] == 15  or 
                  $current_user['id'] == 204 or 
                  $current_user['id'] == 56 or 
                  $current_user['id'] == 19 or 
                  $current_user['id'] == 31 or 
                  $current_user['id'] == 237 or 
                  $current_user['id'] == 130 ){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Imagenes chasis</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/imagenapps/busqueda'>
                <a href='/imagenapps/busqueda'>
                    <div class="stat"> * </div>
                    <div class="title">AGREGAR IMAGEN</div>
                    <div class="highlight bg-color-blue"></div>
                </a>
            </div>
        </div>
        <?php  } ?>



        <?php  if($current_user['id']==1 or $current_user['id']==35 ){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Publicaciones</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/publicacions/mes'>
                <a href='/publicacions/mes'>
                    <div class="stat"> * </div>
                    <div class="title">VENDEDORES</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>
        </div>
        <?php  } ?>


        <?php  if($current_user['id']==1 or $current_user['id']==2   or $current_user['id']==3 OR $current_user['id']==35  ){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>INFORMES DE CARGA DE FOTO Y UBICACION </h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/DepositosUbicas/informe'>
                <a href='/DepositosUbicas/informe'>
                    <div class="stat"> * </div>
                    <div class="title">TRABAJOS REALIZADOS</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>
        </div>
        <?php  } ?>



        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>ORDEN DE TRABAJOS</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/ordentrabajos'>
                <a href='/ordentrabajos'>
                    <div class="stat"> * </div>
                    <div class="title">TRABAJOS</div>
                    <div class="highlight bg-color-gold"></div>
                </a>
            </div>
        </div>




        <?php  if($aux['estado'] == 0) {	?>

        <?php  if($current_user['id']==1 or $current_user['id']==2 or $current_user['id']==3){ ?>
        <div class="col-md-9 pull-md-right">
            <div class="header-lined">
                <h2>Auxiliar</h2>
            </div>
        </div>
        <div class="tiles clearfix">
            <div class="col-sm-3 col-xs-6 tile" onclick='/users/edit3'>
                <a href='/users/edit3'>
                    <div class="stat"> </div>
                    <div class="title">Aux</div>
                    <div class="highlight bg-color-red"></div>
                </a>
            </div>
        </div>
        <?php  } ?>
        <?php  } ?>
    </div>
    <div class="col-md-3 pull-md-left sidebar">
        <div menuitemname="Client Details" class="panel panel-sidebar panel-sidebar">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <strong>Su Información</strong>
                    <i class="fa fa-chevron-up panel-minimise pull-right minimised"></i>
                </h3>
            </div>
            <div class="panel-body">
                <?php foreach ($user->empleados as $empleados): ?>
                <strong><?= $empleados->nombre . ' ' . $empleados->apellido ?> </strong><br>
                <?= $empleados->domicilio ?><br>
                <?= $empleados->telefono1 ?><br>
                <?= h($empleados->cargo) ?><br>
                CÓDIGO FUNCIONARIO :<?= h($empleados->id) ?><br>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 pull-md-left sidebar">
        <div menuitemname="Client Contacts" class="panel panel-sidebar panel-sidebar">
            <div class="panel-heading">
                <h3 class="panel-title">
                    </i>&nbsp;Contactos
                    <i class="fa fa-chevron-up panel-minimise pull-right"></i>
                </h3>
            </div>
            <div class="list-group">
                <div menuitemname="No Contacts" class="list-group-item"
                    id="Secondary_Sidebar-Client_Contacts-No_Contacts">
                    No existe información
                </div>
            </div>
            <div class="list-group">
                <div menuitemname="No Contacts" class="list-group-item"
                    id="Secondary_Sidebar-Client_Contacts-No_Contacts">
                    Fecha de actualización de datos: <?php echo $fechaactualizado['fecha']; ?>
                </div>
            </div>
        </div>
    </div>
</div>