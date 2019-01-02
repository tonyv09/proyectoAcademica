<?php

//resvisar con que usuario se esta haciendo el proceso de eliminacion y probarlo con usuario jaime

 $transaccion=$_POST['transaccion'];
 $id_transaccion=$_POST['id_transaccion'];
 $usuarionw= trim($_POST['nombre_usuario']);
 $pass_user=trim($_POST['pass']);
 $nombre=$_POST['nombre_completo'];
 $estado=1;
 $tipo_user=0;

 include_once("../../../conexiones/conexion_transacciones.php");
 


switch($transaccion){
 case 0: //CREAR NUEVO USUARIO
//echo "CREACION ";

try {
	 $tipo_user=$_POST['tipo_usuario'];
 $validar_usuario=pg_query($conexion,"SELECT usuario FROM schema_academica.control_sesiones WHERE usuario='$usuarionw'");
$fila=pg_fetch_object($validar_usuario);
$res=pg_numrows($validar_usuario);
if($res[0]==0){ //verificar alcance validacion 
	
pg_query($conexion,"CREATE USER ".$usuarionw." WITH PASSWORD '".$pass_user."'" )or die('Error en nombre de usuario ');
pg_query($conexion,"GRANT CONNECT ON DATABASE academicauesfmp TO ".$usuarionw );
pg_query($conexion,"ALTER ROLE ".$usuarionw." WITH LOGIN ");
pg_query($conexion,"GRANT USAGE ON SCHEMA schema_academica TO ".$usuarionw);
pg_query($conexion,"GRANT SELECT ON ALL TABLES IN SCHEMA schema_academica TO ".$usuarionw);
pg_query($conexion,"GRANT INSERT ON ALL TABLES IN SCHEMA schema_academica TO ".$usuarionw);
pg_query($conexion,"GRANT UPDATE ON ALL TABLES IN SCHEMA schema_academica TO ".$usuarionw);
pg_query($conexion,"GRANT DELETE ON schema_academica.ruta_archivo TO ".$usuarionw);

//SEQUENCES
pg_query($conexion,"GRANT USAGE ON SEQUENCE schema_academica.enlaces_idenlace_seq TO ".$usuarionw);
pg_query($conexion,"GRANT USAGE ON SEQUENCE schema_academica.fechas_graduacion_idfecha_seq TO ".$usuarionw);
pg_query($conexion,"GRANT USAGE ON SEQUENCE schema_academica.materias_id_materia_seq TO ".$usuarionw);
pg_query($conexion,"GRANT USAGE ON SEQUENCE schema_academica.ruta_archivo_idruta_seq TO ".$usuarionw);
pg_query($conexion,"GRANT USAGE ON SEQUENCE schema_academica.control_sesiones_idsec_seq TO ".$usuarionw);
pg_query($conexion,"GRANT USAGE ON SEQUENCE schema_academica.bitacora_idregistro_seq TO ".$usuarionw);


pg_query($conexion,"INSERT INTO schema_academica.control_sesiones (usuario,pass,nombre_completo,estado) VALUES('$usuarionw','$pass_user','$nombre',1)")or die(' '. pg_last_error()); 
if($tipo_user=='1')
{
	pg_query($conexion,"ALTER ROLE ".$usuarionw." WITH SUPERUSER REPLICATION")or die('Erro al asignar privilegios de administrador: '. pg_last_error());
			$accion="Creacion de usuario administrador: ".$usuarionw." por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
//echo "validado bien";
}else{

		$accion="Creacion de usuario de nivel-2: ".$usuarionw." por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}


echo "1 Usuario creado! ";

}else {echo "Este nombre de usuairo ya ha sido asignado!";}

} catch (Exception $e) {
    print " ¡Error CREACION DE USUARIO!: ". $e->getMessage()."<br/>";	
}

break;

case 1: //MODIFICACION 

try{
	$tipo_user=$_POST['tipo_usuario'];
$mensaje="1 Usuario modificado ";
$registro=pg_query($conexion,"SELECT * FROM schema_academica.control_sesiones WHERE idsec='$id_transaccion' ");
$row=pg_fetch_object($registro);

if($row->usuario!=$usuarionw)
{
$resname=pg_query("ALTER USER ".$row->usuario." RENAME TO ".$usuarionw)or die('Erro al Renombrar: '. pg_last_error());
$respass=pg_query("ALTER USER ".$usuarionw." WITH PASSWORD '".$pass_user."'")or die('Erro al camnbiar clave: '. pg_last_error());
$ant_user=$row->usuario;
$row->usuario=$usuarionw;
if($respass || $resname){
			if($resname){

			$accion="Modificacion de usuario $ant_user a :".$usuarionw." hecho por usuario administrador: ".$usuario;

$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
			}
				if($respass){

			$accion="Modificacion de clave a usuario :".$usuarionw." hecho por usuario administrador: ".$usuario;

$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
				}

}
}
if($row->pass!=$pass_user)
{pg_query("ALTER USER ".$row->usuario." WITH PASSWORD '".$pass_user."'")or die('Erro al camnbiar clave: '. pg_last_error());
		$accion="Modificacion de clave de acceso de usuario : ".$usuarionw." por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}
$resx=pg_query($conexion,"UPDATE schema_academica.control_sesiones SET usuario='$usuarionw',pass='$pass_user',nombre_completo='$nombre' WHERE idsec='$id_transaccion' ")or die('Erro al modificar tabla control sessiones: '. pg_last_error());

if($resx)
{
		$accion="cambio de nombre completo a usuario  ".$row->usuario." A ".$nombre." hecho por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}
if($tipo_user=='1')
{
	$ressuper=pg_query($conexion,"ALTER ROLE ".$usuarionw." WITH SUPERUSER REPLICATION")or die('Erro al asignar privilegios de administrador: '. pg_last_error());
if($ressuper){
		$accion="usuario  ".$usuarionw." Asendido a usuario administrador por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}
$mensaje="1Usuario modificado y Asendido a administrador";
}
else {
$gerarquia=pg_query($conexion,"SELECT has_table_privilege('$usuarionw','pg_shadow','SELECT')");
$row=pg_fetch_row($gerarquia);
      
pg_query($conexion,"ALTER ROLE ".$usuarionw." WITH NOSUPERUSER NOREPLICATION")or die('Erro al Revocar privilegios de administrador: '. pg_last_error());
		
if($row[0]=='t'){
			$accion="Degradacion de usuario administrado: ".$usuarionw." a usuario de nivel-2 por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}

$mensaje="1Datos y privilegios de usuario modificado ";
}
echo $mensaje;
} catch (Exception $e) {
    print " ¡Error EN MODIFICACION DE USUARIO!: ". $e->getMessage()."<br/>";	
}

break;

case 2: 
try {
	
pg_query($conexion,"REVOKE SELECT,UPDATE,INSERT ON ALL TABLES IN SCHEMA schema_academica FROM ".$usuarionw);
pg_query($conexion,"REVOKE DELETE ON TABLE schema_academica.ruta_archivo FROM ".$usuarionw);
pg_query($conexion,"REVOKE USAGE ON ALL SEQUENCES IN SCHEMA schema_academica FROM ".$usuarionw);
pg_query($conexion,"REVOKE CONNECT ON DATABASE academicauesfmp FROM ".$usuarionw);
pg_query($conexion,"REVOKE USAGE ON SCHEMA schema_academica FROM ".$usuarionw);
pg_query($conexion,"DROP USER ".$usuarionw);
pg_query($conexion,"UPDATE schema_academica.control_sesiones SET estado=0 WHERE usuario='$usuarionw'");
		$accion="Eliminacin de usuario: ".$usuarionw." por usuario administrador: ".$usuario;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

echo "1 Usuario eliminado con exito";

} catch (Exception $e) {
    print " ¡Error CREACION DE USUARIO!: ". $e->getMessage()."<br/>";	
}



break;




}



?>
