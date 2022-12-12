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

    }else{
		echo '<script language=JavaScript> document.reload();  </script>';
    }
?>



<h1>Bienvenido <?=  $current_user['first_name'] , ' ' , $current_user['last_name']  ?>  </h1>


<div class="row">

    <div class="col-md-12 pull-md-right">
        <div class="header-lined">
            <h2>Registrar</h2>
        </div>
    </div>
    <div class="col-md-12 pull-md-right main-content">
        <div class="tiles clearfix">
            <div class="row">
                <div class="col-sm-3 col-xs-6 tile" onclick='/'>
                    <a href='/'>
                        <div class="stat">+</div>
                        <div class="title">Cargar votantes</div>
                        <div class="highlight bg-color-red"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

