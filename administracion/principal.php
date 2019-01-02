<?php 
session_start();
if($_SESSION['usuario']==null || $_SESSION['usuario']=='' )
{
echo "USUARIO NO AUTORIZADO";
die();

}
else {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilos-extras.css">
 <link rel="stylesheet" type="text/css" href="../css/css/font-awesome.min.css">
<style >
	.slider{

		height: 70vh;
    width: auto;

		background-size: cover;
		background-position: center;
    justify-content: start;
	}
</style>
	<title>Principal</title>

</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-danger ">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <div class="navbar-nav text-center ml-auto mr-5 pr-5">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['usuario'];?>
        </a>
        <div class="dropdown-menu bg-danger justify-content-end" aria-labelledby="navbarDropdownMenuLink">
          
 <a class="dropdown-item text-white" href="cerrar_session.php">
     
    <span class="fa-stack fa-1x">
                              <i class="fa fa-circle fa-stack-2x text-danger"></i>
                              <i class="fa fa-sign-out fa-stack-1x fa-inverse"></i>
                        </span>     Cerrar sesion</a>

        </div>
      </li>
    </div>  
  </div>

</nav>
    
<section class="container mt-2 pt-2 ">

<div class="row">
  <h1 class="display-4 text-danger">Inicio</h1>
</div>

<div class="row mt-3 pt-3">
<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-archivos/"  target="_blank">
  <img class="card-img-top img-fluid  ml-3 pl-2 mt-3" src="img_principal/archivos.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Gestion archivos</h4>

  </div>
</div>
  </div>
<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-enlaces/"  target="_blank">
  <img class="card-img-top img-fluid  ml-3 pl-2 mt-3" src="img_principal/link.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Gestion enlaces</h4>

  </div>
</div>
  </div>


<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-graduaciones/"  target="_blank">
  <img class="card-img-top img-fluid ml-3 pl-2 mt-3" src="img_principal/graduaciones.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Eventos graduaciones</h4>

  </div>
</div>
  </div>

</div>
<div class="row mt-3 pt-3">
<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-carreras/"  target="_blank">
  <img class="card-img-top img-fluid  ml-3 pl-2 mt-3" src="img_principal/carreras.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Gestion carreras</h4>

  </div>
</div>
  </div>
<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-pensum/"  target="_blank">
  <img class="card-img-top img-fluid  ml-3 pl-2 mt-3" src="img_principal/pensums.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Gestion pensums</h4>

  </div>
</div>
  </div>

<?php 
if(isset($_SESSION['super_usuario']) && isset($_SESSION['replicacion'])&& $_SESSION['super_usuario']!=null&&
$_SESSION['replicacion']!=null){

 ?>
<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-usuarios/"  target="_blank">
  <img class="card-img-top img-fluid ml-3 pl-2 mt-3" src="img_principal/012-user.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Gestion usuarios</h4>

  </div>
</div>
  </div>
<?php 
}else {

?>


<div class="col-md-4">
<div class="card " style="width: 11rem;">
  <a href="control-usuarios/vistas/perfil_usuario.php"  target="_blank">
  <img class="card-img-top img-fluid ml-3 pl-2 mt-3" src="img_principal/012-user.png" alt="Card image cap">
  </a>
  
  <div class="card-block">
    <h4 class="card-title text-center">Modificar mis credenciales</h4>

  </div>
</div>
  </div>

<?php } ?>


</div>

    
</section>


    </div>
</body>
<script src="../js/jquery-3.1.1.min.js" ></script>

<script src="../js/tether-1.4.0.js" ></script>
<script src="../js/bootstrap.min.js"></script>
  <script>
function cerrar_Session(){
   location.href = "cerrar_session.php";
}


    </script>

</html>

<?php 
}
?>