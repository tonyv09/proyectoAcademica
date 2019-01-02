<?php 
session_start();
$usuario= trim($_POST['user']);
$pass=trim($_POST['pass']); 
$content_aux=0;

try{

/*
 $conexion1= pg_connect("host=localhost port=5432 dbname=academicauesfmp user='invitado' password='invitado1' ") ;

 	$res=pg_query($conexion1,"SELECT idsec,usuario, pass FROM schema_academica.control_sesiones WHERE usuario='$usuario' AND pass='$pass' AND id_session='0'")or die('2 Error en busqueda '.pg_last_error());
 $content_aux=pg_fetch_object($res);
pg_close($conexion1);*/

 $conexion= pg_connect("host=localhost port=5432 dbname=academicauesfmp user='$usuario' password='$pass'") or die('2 No se ha podido conectar inc: ' . pg_last_error()) ;

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
//echo "CREDENCIALES SUPERUSUARIO";
$roles=pg_query($conexion,"SELECT usesuper,userepl FROM pg_shadow WHERE usename='$content_aux->usuario'");
$roles_=pg_fetch_object($roles);

$_SESSION['super_usuario']=$roles_->usesuper;
$_SESSION['replicacion']=$roles_->userepl;

setcookie('superuser',$_SESSION['super_usuario'],time()+(60*60*24*100),'/');
setcookie('creador_user',$_SESSION['replicacion'],time()+(60*60*24*100),'/');

}

$req=pg_query($conexion,"UPDATE schema_academica.control_sesiones SET id_session='$sesion' WHERE usuario='$content_aux->usuario' " )or die('2 No se ha podido iniciar sesion: inc ' . pg_last_error()) ;
echo "1Iniciando";
}

	


  }catch (Exception $e) {
    print "2¡Error CONECCION!: ". $e->getMessage()."<br/>";
session_destroy();    
}

?>