<?php 
$x=session_start();
include_once("../conexiones/conexion_publica.php");
$pantalla_destino="INICIO";
$clasificacion="FOTOS";
$seleccion_fotos=pg_query($conexion,"SELECT * FROM schema_academica.ruta_archivo WHERE (estado=1 AND (pantalla_destino='$pantalla_destino' AND descripcion like '%$clasificacion[0]%'))")or die('Erro consulta archivos inscripciones: ' . pg_last_error());
$clasificacion='DOCUMENTOS';
$seleccion_documentos=pg_query($conexion,"SELECT * FROM schema_academica.ruta_archivo WHERE (estado=1 AND (pantalla_destino='$pantalla_destino' AND descripcion like '%$clasificacion[0]%'))")or die('Erro consulta archivos inscripciones: ' . pg_last_error());
$i=0;

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
	<title>Inicio</title>
	<link rel="styleshet" href="">
</head>
<body>
<section class="container-fluid mt-2 pt-2 mb-0 ">
<div class="row bg-danger text-white" >

   <div class="col-md-9 col-sm-6">
   <h1 class="display-5 "><p>Administración académica</p>
   <p> Universidad de El Salvador </p>
   <p>Facultad Multidisciplinaria Paracentral</p>
   </h1>
   </div>
<div class="col-md-3 col-sm-6">
   <img class="d-block img-fluid "  src="../images/minervaues2.png" >
</div>
</div>
</section>
<nav class="navbar navbar-inverse bg-danger navbar-toggleable-sm sticky-top  " >

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <a class="navbar-brand btn btn-outline-azulverdoso" href="inicio.php">
    Inicio
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
    
  
      <div class=" d-flex   navbar-nav  text-center justify-content-around mr-auto ml-auto">
 <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="carreras.html">Carreras</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="inscripciones.php"> Inscripciones</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="formatos.php">Formatos</a>
        <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="tramites.php">Trámite</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="graduaciones.php">Graduaciones</a>
      <a class="nav-item nav-link mr-5 btn btn-outline-azulverdoso" href="enlaces.php">Enlaces de interés</a>
    </div>
    <div>
      <a class="btn btn-outline-azulverdoso" href="login.php">Iniciar sesión</a>
      
    </div>
 
</div>  
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    
    <?php
while ($fila_fotos=pg_fetch_object($seleccion_fotos)){

if($i>0)
    { 
      ?>
    <div class="carousel-item slider" >
      <img class="d-block img-fluid "  src=" <?php echo $fila_fotos->ruta; ?> " >
        
    </div>
<?php 

} else {

?>
    <div class="carousel-item active slider" >
      <img class="d-block  img-fluid"  src=" <?php echo $fila_fotos->ruta; ?> " >
      
    </div>
  
    
    <?php
  }
$i++;
     } ?>
    </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    
<section class="container mt-2 pt-2 d-flex justify-content-around ">

<div class="row mt-2 pt-2">
<div class="card-deck">

 <div class="col-sm-12 col-md-4">
  <div class="card card-outline-success ">
    <div class="card-block">
      <h4 class="card-title">Objetivo general</h4>
      <p class="card-text text-justify"> Llevar control eficiente de los estudiantes, garantizando el manejo y conservación de los registros académicos, asi como la correcta aplicación del reglamento estudiantil.
        <br><br><br><br>

                        </p>
    </div>
  </div> 
 </div>   
  

 <div class="col-sm-12 col-md-4">
  <div class="card card-outline-success">
    <div class="card-block">
      <h4 class="card-title">Misión</h4>
      <p class="card-text text-justify">Desarrollar eficientemente y de conformidad con el reglamento académico, los procesos del registro académico y de matricula de los estudiantes, ejerciendo la función de registro institucional y de custodia de la información y documentación académica, debiendo llevar datos estadísticos
.</p>
    </div>
  </div></div>

 <div class="col-sm-12 col-md-4">
  <div class="card card-outline-success">
    <div class="card-block">
      <h4 class="card-title">Visión</h4>
      <p class="card-text text-justify">La Unidad de Registro Académico ejecutará sus procesos académicos empleando sistemas de información de avanzada para el manejo de carga académica y matrícula con personal altamente calificado y motivado para desarrollar sus funciones. <br><br><br>  </p>
    </div>
  </div>
   </div>

</div>  
</div>

</section>
<section class="container">
  
  <div class="row mt-5 d-flex justify-content-start">
<div class="col-md-12 col-sm-12">
  <div class="card card-outline-success">
    <div class="card-block">

<?php 
while ($fila_documentos=pg_fetch_object($seleccion_documentos)){ 
  ?>
  <a class="btn btn-lg btn-outline-warning btn-block" href="<?php echo $fila_documentos->ruta; ?>" download><h4><i class="fa fa-file-pdf-o"></i> <?php echo $fila_documentos->nombre_archivo; ?> </h4>
</a>
<?php 
}

?>

    </div>
  </div>

  </div>
  </div>
    
</section>


 


       <!-- Footer -->
        <footer class="mt-5 container">
     
            <br>
            <div class="row justify-content-center" >
                <p> Proyecto desarrollado por Jaime Ventura para Universidad de El Salvador Facultad Multidisciplinaria Paracentral </p>
            </div>
        </footer>

    </div>


</body>
<script src="../js/jquery-3.1.1.min.js" ></script>

<script src="../js/tether-1.4.0.js"></script>

<script src="../js/bootstrap.min.js"></script>
  <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</html>