<?php
//CLAUSULA LIKE CON NUMEROS SELECT * FROM fechas_graduacion WHERE  fecha::text LIKE '%1970%'
 $transaccion=$_POST['transaccion'];
 $ID_transaccion=$_POST['id_transaccion'];
 include_once("../../../conexiones/conexion_transacciones.php");
 $fecha=date('Y-m-d',strtotime($_POST['fecha']));
 $descripcionevt=$_POST['descripcionevento'];
 $estado=1;


 switch($transaccion){
 case 0: //INSERCION

$res=pg_query($conexion,"INSERT INTO schema_academica.fechas_graduacion (descripcion_evento,estado,fecha) VALUES ('$descripcionevt','$estado','$fecha')");
if($res)
	{echo "1 Insercion realizada con exito!";
	$accion="Insercion en tabla fechas_graduacion de evento ".$descripcionevt." con fecha ".$fecha;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
	}else
	echo "DATOS ERRONEOS O CLAVES DUPLICADAS"; 


break;
case 1: //MODIFICACION 
$res=pg_query($conexion,"UPDATE schema_academica.fechas_graduacion SET descripcion_evento='$descripcionevt',estado='$estado',fecha='$fecha' WHERE idfecha='$ID_transaccion' ");


if($res)
	{echo "1 Modificacion realizada con exito!";
	
	$accion="Modificacion en tabla fechas_graduacion de evento ID: $ID_transaccion a " .$descripcionevt." ".$fecha;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
	}else
	echo "DATOS ERRONEOS O CLAVES DUPLICADAS";

break;

case 2: //DAR DE BAJA


if($estado==0)
{
	$estado=1;

$res=pg_query($conexion,"UPDATE schema_academica.fechas_graduacion SET estado='$estado' WHERE idfecha='$ID_transaccion'");
if($res)
	{echo "1 Registro activado con exito!";
	
	$accion="Resactivacion en tabla fechas_graduacion de registro con ID ".$ID_transaccion;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
	}else
	echo "Error al reactivar!";
}
else {
	$estado=0;
	echo "ID_transaccion ".$ID_transaccion;
$res=pg_query($conexion,"UPDATE schema_academica.fechas_graduacion SET estado='$estado' WHERE idfecha='$ID_transaccion'");
if($res){
	echo "1 Registro dado de baja con exito!";
		$accion="Desactivacion en tabla fechas_graduacion de registro ID: ".$ID_transaccion;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

	}else
	echo "Error al dar de baja!";
}
break;




}


?>