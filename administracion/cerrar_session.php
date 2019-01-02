<?php 
/*session_start();
$user=$_SESSION['usuario'];
$pass=$_SESSION['clave_acceso'];
$id_session=session_id();
*/include_once("../conexiones/conexion_transacciones.php");
pg_query($conexion,"UPDATE schema_academica.control_sesiones SET id_session='0' WHERE usuario='$user' AND id_session ='$id_session' " )or die('No se ha podido iniciar sesion: ' . pg_last_error()) ;

setcookie('id_session',$_SESSION['id_session'],time()-(60*60*24*100),'/');
setcookie('user',$_SESSION['usuario'],time()-(60*60*24*100),'/');
setcookie('pass',$_SESSION['clave_acceso'],time()-(60*60*24*100),'/');
setcookie('pass_ingresado',$_SESSION['insertada'],time()-(60*60*24*100),'/');
setcookie('superuser',$_SESSION['super_usuario'],time()-(60*60*24*100),'/');
setcookie('creador_user',$_SESSION['replicacion'],time()-(60*60*24*100),'/');

pg_close($conexion);
session_destroy();
header("location:../acceso-publico/inicio.php");

?>