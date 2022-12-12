
<?= $this->Html->css('all.min') ?>
<?= $this->Html->css('custom') ?>



<body language=JavaScript onLoad="findMe()">

  
	<div id="map"></div>
		<div id="map2"></div>

	<script src="https://maps.googleapis.com/maps/api/js?key=hyXUJsUNCXXgrqKoV6-7fzom"></script>
	<script>
		
		function findMe(){
			var output = document.getElementById('map');
			
			// Verificar si soporta geolocalizacion
			if (navigator.geolocation) {
				//output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
			}else{
				output.innerHTML = "<p>Tu navegador no soporta el sistema</p>";
			}
			//Obtenemos latitud y longitud
			function localizacion(posicion){
				var latitude = posicion.coords.latitude;
				var longitude = posicion.coords.longitude;
				var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+latitude+","+longitude+"&size=600x300&markers=color:red%7C"+latitude+","+longitude+"&key=hyXUJsUNCXXgrqKoV6-7fzom";
			//	output.innerHTML ="<img src='"+imgURL+"'>";
				output.innerHTML = latitude + "    " + longitude;

			}
			function error(){
				output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
				//window.location.href = "logout";
			}
			navigator.geolocation.getCurrentPosition(localizacion,error);
		}

	</script>





<div class="row">
	<div class="col-md-9 pull-md-right">
		<div class="header-lined">
			<h1>Bienvenido, <?= $current_user['first_name'] ?> </h1>
			
		</div>
	</div>
	
	<!-- Container for main page display content -->
	<div class="col-md-9 pull-md-right main-content">
		
		<div class="tiles clearfix">
			<div class="row">

				<?php foreach ($user->empleados as $empleados): ?>
					<div class="col-sm-3 col-xs-6 tile" onclick='/sistema/empleados/view/<?= $empleados->cedula ?>'>
					<a href='/sistema/creditos/detalle/<?= $empleados->cedula ?>'>
					  

						<div class="stat"><?php echo $creditos; ?></div>
						<div class="title">DEUDAS</div>
						<div class="highlight bg-color-blue"></div>
						</a>
				    </div>
					
				 <?php endforeach; ?>

				
				<div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=domains'">
					<a href="clien.php?action=domains">
						<div class="icon"><i class="fa fa-globe"></i></div>
						<div class="stat">1</div>
						<div class="title">VENTAS</div>
						<div class="highlight bg-color-green"></div>
					</a>
				</div>
				<div class="col-sm-3 col-xs-6 tile" onclick="window.location='supporttickets.php'">
					<a href="supporttickets.php">
						<div class="icon"><i class="fa fa-comments"></i></div>
						<div class="stat">2</div>
						<div class="title">ADELANTOS</div>
						<div class="highlight bg-color-red"></div>
					</a>
				</div>
				<div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=invoices'">
					<a href="clientarea.php?action=invoices">
						<div class="icon"><i class="fa fa-credit-card"></i></div>
						<div class="stat">1</div>
						<div class="title">CLIENTES</div>
						<div class="highlight bg-color-gold"></div>
					</a>
				</div>
			</div>
		</div>
		<br><br>
		<div class="client-home-panels">
			<div class="row">
				<div class="col-sm-6">
					<div menuitemname="Unpaid Invoices" class="panel panel-default panel-accent-gold">
						<div class="panel-heading">
							<h3 class="panel-title">
							<div class="pull-right">
								<?= $this->Html->link('VER TODOS', ['controller' => 'Stocks', 'action' => 'index'], ['class' => 'btn btn-default bg-color-gold btn-xs']) ?>
							</div>
							</i>&nbsp;Listado de todos los vehiculos
							</h3>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div menuitemname="Unpaid Invoices" class="panel panel-default panel-accent-blue">
						<div class="panel-heading">
							<h3 class="panel-title">
							<div class="pull-right">
								<?= $this->Html->link('VER TODOS', ['controller' => 'Stocks', 'action' => 'recienimportado'], ['class' => 'btn btn-default bg-color-blue btn-xs']) ?>
							</div>
							</i>&nbsp;Listado de todos los vehiculos recien importados
							</h3>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div menuitemname="Unpaid Invoices" class="panel panel-default panel-accent-green">
						<div class="panel-heading">
							<h3 class="panel-title">
							<div class="pull-right">
								<?= $this->Html->link('VER TODOS', ['controller' => 'Stocks', 'action' => 'usado'], ['class' => 'btn btn-default bg-color-green btn-xs']) ?>
							</div>
							</i>&nbsp;Listado de todos los vehiculos usados
							</h3>
						</div>
					</div>
				</div>


			</div>
		</div>

		</div><!-- /.main-content -->
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
					Paraguay
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
					<div menuitemname="No Contacts" class="list-group-item" id="Secondary_Sidebar-Client_Contacts-No_Contacts">
						No existe información
					</div>
				</div>
				
			</div>
			
		</div>
		<div class="clearfix"></div>
	</div>