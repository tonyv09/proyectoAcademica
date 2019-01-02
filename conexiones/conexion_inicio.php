<?php 
session_start();
date_default_timezone_set('America/El_Salvador');
$usuario= trim($_POST['user']);
$pass=trim($_POST['pass']); 
$content_aux=0;

try{
   //igual servidor que sitio 
 //$conexion= pg_connect("host=localhost port=5432 dbname=tonyvent_academicafmp user='$usuario' password='$pass'") or die('2 No se ha podido conectar inc: ' . pg_last_error()) ;
   $conexion= pg_connect("host=ec2-54-235-193-0.compute-1.amazonaws.com port=5432 dbname=d1149o9em321a1 user='$usuario' password='$pass'") or die('2 No se ha podido conectar inc: ' . pg_last_error()) ;

$gerarquia=pg_query($conexion,"SELECT has_table_privilege('pg_shadow','SELECT')");
$row=pg_fetch_row($gerarquia);
if($conexion){
//echo "CREDENCIALES  BASICAS";
$_SESSION['usuario']=$usuario;
$_SESSION['clave_acceso']=$pass;
$_SESSION['insertada']=$pass;
$_SESSION['id_session']=session_id();
$sesion=$_SESSION['id_session'];

setcookie('id_session',$_SESSION['id_session'],time()+(60*60*24*100),'/');
setcookie('user',$_SESSION['usuario'],time()+(60*60*24*100),'/');
setcookie('pass',$_SESSION['clave_acceso'],time()+(60*60*24*100),'/');
setcookie('pass_ingresado',$_SESSION['insertada'],time()+(60*60*24*100),'/');


if($row[0]=='t'){//varables credenciales para super usuario

$roles=pg_query($conexion,"SELECT usesuper,userepl FROM pg_shadow WHERE usename='$usuario'")or die('2 No se ha podido hacer consulta ' . pg_last_error());
$roles_=pg_fetch_object($roles);

$_SESSION['super_usuario']=$roles_->usesuper;
$_SESSION['replicacion']=$roles_->userepl;

setcookie('superuser',$_SESSION['super_usuario'],time()+(60*60*24*100),'/');
setcookie('creador_user',$_SESSION['replicacion'],time()+(60*60*24*100),'/');
 
$accion="INICIO DE SESION";
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}

$req=pg_query($conexion,"UPDATE schema_academica.control_sesiones SET id_session='$sesion' WHERE usuario='$usuario' " )or die('2 No se ha podido iniciar sesion: inc ' . pg_last_error()) ;
echo "1Iniciando";
}

  }catch (Exception $e) {
    print "2¡Error CONECCION!: ". $e->getMessage()."<br/>";
session_destroy();    
}

?>