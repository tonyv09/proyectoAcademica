<?php 
include_once("../conexiones/conexion_publica.php");
$seleccion_archivos_formato=pg_query($conexion,"SELECT * FROM schema_academica.enlaces WHERE pantalla_destino LIKE '%ENLACES%' AND estado<> 0")or die('Erro consulta archivos inscripciones: ' . pg_last_error());
//select * from ruta_archivo where estado=1 and (pantalla_destino='INSCRIPCIONES' AND descripcion like '%horarios%')


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
    <title>Enlaces</title>
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


<section class="container mt-2 pt-2 ">
  <div class="row">
  <h1 class="display-4 text-danger">Enlaces</h1>
</div>

<div class="row mt-5 d-flex justify-content-center">

<div class="col-md-7 col-sm-7 col-12">
  <div class="card card-outline-secondary">
    <div class="card-block">

<?php while($fila_objetos=pg_fetch_object($seleccion_archivos_formato))
{?>
  <a class="btn btn-lg btn-outline-warning btn-block letra_btn "  href="<?php echo $fila_objetos->enlace; ?>" target="_blank" ><i class="fa fa-link"></i><?php echo $fila_objetos->nombre_sitio;?> 
</a>
<?php } ?>

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
  <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</html>