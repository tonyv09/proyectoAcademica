<?php
//readaptar modificar enlaces para enlaces q estan en mas de una pantalla

 $transaccion=$_POST['transaccion'];
 $ID_transaccion=$_POST['id_transaccion'];
 $URL=trim($_POST['enlace']);
 $sitio=trim($_POST['nombre_sitio']);
 $estado=$_POST['estado'];
// $pantalla_destino=$_POST['pantalla'];
 $pantalla_destino="";
 $i=0;
 if(isset($_POST['ENLACES']))
 {
 	$enlaces='ENLACES';

 $pantalla_destino=$enlaces;
 }
 if(isset($_POST['FORMATOS']))
 {
 	$formatos='FORMATOS';
 	if(strlen($pantalla_destino)>1)
 	$pantalla_destino=$pantalla_destino.','.$formatos;
    else
    	$pantalla_destino=$formatos;
}
if(isset($_POST['INSCRIPCIONES']))
 {
 	$inscripciones='INSCRIPCIONES';
 	 	if(strlen($pantalla_destino)>1)
 	$pantalla_destino=$pantalla_destino.','.$inscripciones;
    else
    	$pantalla_destino=$inscripciones;
    
 }
 if(isset($_POST['GRADUACIONES']))
 {
 	$graduaciones='GRADUACIONES';
   	if(strlen($pantalla_destino)>1)
 	$pantalla_destino=$pantalla_destino.','.$graduaciones;
    else
    	$pantalla_destino=$graduaciones;
}




 include_once("../../../conexiones/conexion_transacciones.php");
 $destino=$pantalla_destino;
 switch($transaccion){
 case 0: //INSERCION

$comprobacion=pg_query($conexion,"SELECT idenlace,pantalla_destino FROM schema_academica.enlaces WHERE enlace='$URL'");

if(pg_num_rows($comprobacion)>0){
$fila=pg_fetch_object($comprobacion);
$pantallas_destino_antiguas=trim($fila->pantalla_destino);
$pantalla_destino=(trim($fila->pantalla_destino).','.$destino);
echo "pantalla_destino ".$pantalla_destino;
$res=pg_query($conexion," UPDATE schema_academica.enlaces SET pantalla_destino='$pantalla_destino' WHERE idenlace='$fila->idenlace' ")or die('Erro al asignar privilegios de administrador: '. pg_last_error());

if($res){
	echo "1Insercion realiza con exito";
	$accion="Actualizacion de pantallas destino :".$pantallas_destino_antiguas." a ".$pantalla_destino;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}else {
	echo "Error al insertar!";
}

}else{
$res= pg_query($conexion,"INSERT INTO schema_academica.enlaces (enlace,nombre_sitio,estado,pantalla_destino) VALUES ('$URL','$sitio',$estado,'$destino')");
if($res)
{echo "1 Insercion realizada con exito!";
$accion="Insercion de enlace ".$URL." a pantallas destino ".$destino." con nombre ".$sitio;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}else
	echo "DATOS ERRONEOS O CLAVES DUPLICADAS"; 
}
break;
case 1: //MODIFICACION 
$res=pg_query($conexion,"UPDATE schema_academica.enlaces SET enlace='$URL',nombre_sitio='$sitio',pantalla_destino='$destino' WHERE idenlace='$ID_transaccion' ");
if($res)
{	echo "1 Modificacion realizada con exito!";
$accion="Modificacion de registro $ID_transaccion en tabla enlaces a: ".$URL." a pantallas destino ".$destino." con nombre ".$sitio;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}else{
	echo "Error al modificar!";
}
break;

case 2: //DAR DE BAJA
if($estado== 0)
{$estado=1;
$res=pg_query($conexion,"UPDATE schema_academica.enlaces SET estado='$estado' WHERE idenlace='$ID_transaccion'");
if($res){
	echo "1 El registro ha sido REACTIVADO!";
	$accion="Reactivacion de sitio en tabla enlaces: ".$sitio." URL ".$URL;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
	}else{
	echo "ERROR AL REACTIVAR!";}

}
else{
$estado=0;
$res=pg_query($conexion,"UPDATE schema_academica.enlaces SET estado='$estado' WHERE idenlace='$ID_transaccion'");
if($res){
	echo "1 El registro ha sido DADO DE BAJA!";
	$accion="Desactivacion de enlace en tabla enlaces : ".$URL." con nombre ".$sitio;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
	}else{
	echo "ERROR AL DAR DE BAJA!";
}
}


break;




}

?>