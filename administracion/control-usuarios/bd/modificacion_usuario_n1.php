"Modificacion de nombre completo para usuario ".$row->usuario." hecha por usuario ".$usuario." de ".$row->usuario." a ".$nombre;
<?php  
include_once("../../../conexiones/conexion_transacciones.php");
 
 $id_transaccion=$_POST['id_transaccion'];
 $pass_user=trim($_POST['pass']);
 $nombre=$_POST['nombre_completo'];
 $estado=1;
 $tipo_user=0;



 try{
$mensaje="1Modificaciones realizadas: ";
$registro=pg_query($conexion,"SELECT * FROM schema_academica.control_sesiones WHERE idsec='$id_transaccion' ");
$row=pg_fetch_object($registro);

if($row->pass!=$pass_user)
$resmod=pg_query("ALTER USER ".$row->usuario." WITH PASSWORD '".$pass_user."'")or die('Erro al camnbiar clave: '. pg_last_error());
if($resmod){
		$accion="Modificacion de clave para usuario ".$row->usuario." hecha por usuario ".$usuario;
$fecha=date('Y-m-d H:i:s');
$mensaje=$mensaje." cambio de clave de acceso";

pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
if($row->nombre_completo!=nombre){
pg_query($conexion,"UPDATE schema_academica.control_sesiones SET pass='$pass_user',nombre_completo='$nombre' WHERE idsec='$id_transaccion' ")or die('Erro al modificar tabla control sessiones: '. pg_last_error());

$accion="Modificacion de nombre completo para usuario ".$row->usuario." hecha por usuario ".$usuario." de ".$row->nombre_completo." a ".$nombre;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
$mensaje=$mensaje." Cambio de nombre completo";

}

setcookie('pass',$_SESSION['clave_acceso'],time()-(60*60*24*100),'/');
setcookie('pass_ingresado',$_SESSION['insertada'],time()-(60*60*24*100),'/');
$_SESSION['clave_acceso']=$pass_user;
$_SESSION['insertada']=$pass_user;
setcookie('pass',$_SESSION['clave_acceso'],time()+(60*60*24*100),'/');
setcookie('pass_ingresado',$_SESSION['insertada'],time()+(60*60*24*100),'/');

}
else if($row->nombre_completo!=$nombre){

		$accion="Modificacion de nombre completo para usuario ".$row->usuario." hecha por usuario ".$usuario." de ".$row->nombre_completo." a ".$nombre;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
pg_query($conexion,"UPDATE schema_academica.control_sesiones SET pass='$pass_user',nombre_completo='$nombre' WHERE idsec='$id_transaccion' ")or die('Erro al modificar tabla control sessiones: '. pg_last_error());
$mensaje=$mensaje." Modificacion de nombre completo";

}


echo $mensaje;
} catch (Exception $e) {
    print " ¡Error EN MODIFICACION DE USUARIO!: ". $e->getMessage()."<br/>";	
}


?>
