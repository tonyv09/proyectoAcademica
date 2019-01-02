<?php 
include_once ("../conexiones/conexion_publica.php");

$pantalla_actual='GRADUACIONES';
$seleccion_fechas=pg_query($conexion,"SELECT * FROM schema_academica.fechas_graduacion WHERE estado=1")or die('Erro consulta archivos inscripciones: ' . pg_last_error());
$seleccion_archivos=pg_query($conexion,"SELECT * FROM schema_academica.ruta_archivo WHERE (pantalla_destino='$pantalla_actual' AND estado=1)");
$seleccion_enlaces=pg_query($conexion,"SELECT * FROM schema_academica.enlaces WHERE pantalla_destino LIKE '%$pantalla_actual%' ");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="../css/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilos-extras.css">

<style >
	.slider{

		height: 70vh;
    width: auto;

		background-size: cover;
		background-position: center;
    justify-content: start;
	}
</style>
	<title>Graduaciones</title>
	<link rel="styleshet" href="">
</head>
<body>

<nav class="navbar navbar-inverse bg-danger navbar-toggleable-sm sticky-top mt-1 " >

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <a class="navbar-brand btn btn-outline-azulverdoso ml-2" href="../">
    Inicio
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
    
  
      <div class=" d-flex  navbar-nav  text-center justify-content-center ">
 <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso ml-5" href="carreras.html">Carreras</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso ml-5" href="inscripciones.php">Inscripciones</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso ml-5" href="formatos.php">Formatos</a>
        <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso ml-5" href="tramites.php">Tramites</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso ml-5" href="graduaciones.php">Graduaciones</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso ml-5" href="enlaces.php">Enlaces de interes</a>
    </div>

</div>  
</nav>
    
<section class="container mt-2 pt-2 justify-content-center ">
<div class="row">
  <h1 class="display-4 text-danger">Graduaciones</h1>
</div>
<div class="row mt-2 pt-2 justify-content-center">
<div class="col-md-7 col-sm-7 col-12">
<div class="card-deck">
  <div class="card card-outline-success ">
    <div class="card-block">
      <h4 class="card-title  text-primary">Fechas de interes</h4>
      <p class="card-text text-justify ">     <?php 
while($fila_objetos_fecha= pg_fetch_object($seleccion_fechas) )
    {
      //date("Y-m-d", strtotime($fecha_inc))
      ?>
    <h3>
    <p class="card-text ">  <h3 ><?php echo $fila_objetos_fecha->descripcion_evento.": ".date("d-m-Y",strtotime($fila_objetos_fecha->fecha)) ;?> </h3> </p>
</h3>
<?php
}
 ?>
     </p>
    </div>
  </div>
  </div>
  </div>
  </div>
  
<!-- *****************************-->

<section class="container mt-2 pt-2 ">
  <div class="row">
  <h1 class="display-4 text-danger">Descargas</h1>
</div>

<div class="row mt-5 d-flex justify-content-center">

<div class="col-md-7 col-sm-7 col-12">
  <div class="card card-outline-success">
    <div class="card-block">

<?php while($fila_objetos= pg_fetch_object($seleccion_archivos))
{?>
            <a class="btn btn-lg btn-outline-warning btn-block letra_btn" href="<?php echo $fila_objetos->ruta; ?>" download> <?php echo $fila_objetos->nombre_archivo;?>
<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
               </a>
<?php } ?>

    </div>
  </div>

  </div>
  </div>
  
</section>
<!--
******************************
</div>
</div>
-->
<div class="row mt-2 pt-2 justify-content-center">
<div class="col-md-7 col-sm-7 col-12">
    <div class="card card-outline-success ">
    <div class="card-block">
      <h4 class="card-title text-primary">Sitios de interes</h4>
      <p class="card-text text-justify">     
    <?php 
while($fila_objetos= pg_fetch_object($seleccion_enlaces) )
    {?>
    <p class="card-text ">  
 <div class="row" style="padding-left: 15px">
              
           
         <p><h3><?php echo $fila_objetos->nombre_sitio;?></h3></p>
         <br>
               <p>
                   <a class="" href="<?php echo $fila_objetos->enlace; ?>" ><?php echo $fila_objetos->enlace; ?> 
                   </a>
               </p>

            
        </div>
        <br>
    </p>

<?php
}
 ?>
     </p>
    </div>
  </div>

</div>
</div>
    
</section>


       <!-- Footer -->
        <footer class="mt-5 container">
        <hr>
            <div class="row">
                <div class="col-lg-4"  style="text-align:center;">
                    <p class="page-header" > UNIVERSIDAD DE EL SALVADOR </p>
                        <P>FACULTAD MULTIDISCIPLINARIA</P> 
                        <p>PARACENTRAL</P>
                      
                </div>
                                <div class="col-lg-4" style="text-align:center;">
                    <p class="page-header" > CONTÁCTANOS</p>
                    <p>Correo:fmparacenral@yahoo.com.mx</p>
                    <p>Telefonos: 2393-1993</p>

                </div>
                                <div class="col-lg-4" style="text-align:center;" >
                    <p class="page-header">HORARIO DE ATENCIÓN</p>
                    <p>Lunes a Viernes</p>
                    <p>8:00 AM  a 4:00 PM</p>
                </div>
            </div>
            <br>
            <div class="row justify-content-center" >
                <p> Copyright © 2018, Universidad de El Salvador.</p>
            </div>
        </footer>

    </div>


</body>
<script src="../js/jquery-3.1.1.min.js" ></script>
<script src="../js/tether-1.4.0.js"></script>

<script src="../js/bootstrap.min.js"></script>


</html>