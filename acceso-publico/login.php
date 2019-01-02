<?php
session_start();

if(isset($_COOKIE['id_session'])&&isset($_SESSION['usuario']))
{
 
session_id($_COOKIE['id_session']);

$_SESSION['usuario']=$_COOKIE['user'];
$_SESSION['clave_acceso']=$_COOKIE['pass'];
$_SESSION['insertada']=$_COOKIE['pass_ingresado'];

//echo "\n actual ".session_id();

if(isset($_COOKIE['superuser']) && isset($_COOKIE['creador_user'])){//credenciales super usuario

$_SESSION['super_usuario']=$_COOKIE['superuser'];
$_SESSION['replicacion']=$_COOKIE['creador_user'];

}

//echo "entro! ";
}

if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['clave_acceso'])&& isset($_SESSION['insertada']) && $_SESSION['clave_acceso']==$_SESSION['insertada']) 
{

?>
<!DOCTYPE html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<meta http-equiv="refresh" content="0; url=../administracion/principal.php">
</head>
<body>
</body>
</html>

<?php } else {

?>

<!DOCTYPE html>
<html>
<head>

	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
      <link href="../cssal/prettify.css">
  <link href="../cssal/styles.css">

	<title>Iniciar sesion</title>
</head>
<body>
    
<section class="container d-flex justify-content-center">
     <div class="row">
           <div data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>"}' data-ids="myid" data-fade="3500"></div>

         </div>  
         <br>
  
</section>

	<div class="jumbotron boxlogin">
		<form method="post" id="form_login" name="form_login" action="" autocomplete="off">  
			
		
			<label>Usuario</label><input class="form-control" type="text" name="user" id="user" value=" ">	
			
			
		
			<label>Contraseña</label><input class="form-control" type="password" name="pass" id="pass" value="" >
		
			
		<button class="btn btn-success" type="submit">Iniciar</button>
		</form>
	</div>
</body>

<script src="../js/jquery-3.1.1.min.js" ></script>
<script src="../js/tether-1.4.0.js" ></script>
<script src="../js/bootstrap.min.js"></script>
 <script src="../jsal/jquery.bsAlerts.js"></script>

<script>
    
$(document).ready(function(){
  enviar_datos();
  $("#form_users").attr('autocomplete','off');
});



  function enviar_datos()
{

  $('#form_login').submit(function(e){
 
  
  e.preventDefault(); //(boton guardar sin parametro 
  $.ajax({
      url: '../conexiones/conexion_inicio.php',
      type: 'POST',
      data: $("#form_login").serialize(),
      beforeSend: function() {
        console.log('enviando datos a la BD')
        ;
      },
 
success:function(resp){console.log(resp);}
}).done(function(resp){

var tipo_alerta=resp.substring(0,1);
var alerta=resp.substring(1,(resp.length) );
switch(tipo_alerta){
case '1':
//alert(" "+alerta);
lanzador_alerta(1,alerta);
 tiempo();

 break;
default:
lanzador_alerta(2,resp); 
break;

}


});
    



});

 



}



function tiempo(){
            setTimeout("redireccionar()",2050); 
          }

          function redireccionar() 
            {
              location.href = "../administracion/principal.php";
            }


function lanzador_alerta(alerta, mensaje){
     // alert(alerta+" "+mensaje)
      switch(alerta){

        case 1: 
    $(document).trigger("add-alerts", [
        {
          "message": " "+mensaje,
          "priority": 'info'
        }
      ]);

        break;
        case 2: 
 $(document).trigger("add-alerts", [
        {
          "message": " "+mensaje,
          "priority": 'error'
        }
      ]);

        break;

      }
  
    
      }
</script>

</html>
<?php 
}
 ?>