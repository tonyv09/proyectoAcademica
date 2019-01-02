<?php

//CLAUSULA LIKE CON NUMEROS SELECT * FROM fechas_graduacion WHERE  fecha::text LIKE '%1970%'
 $transaccion=$_POST['transaccion'];
 $ID_transaccion=$_POST['id_transaccion'];
 $codigo=$_POST['codigo_carrera'];
 $nombre=$_POST['nombre_carrera'];
 $ciclos=$_POST['ciclos'];
 $estado=$_POST['estado'];
 include_once("../../../conexiones/conexion_transacciones.php");
 
 switch($transaccion){
 case 0: //INSERCION
 
//echo "Insercion"; current_user
$res=pg_query($conexion,"INSERT INTO schema_academica.carreras (codigo_carrera,nombre_carrera,ciclos,estado) VALUES ('$codigo','$nombre',$ciclos,$estado)");
if($res){
echo "1 Insercion realizada con Exito! ";
$accion="Insersion de carrera con credenciales : $codigo, $nombre, $ciclos ";
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}
else 
echo "DATOS ERRONEOS O CLAVES DUPLICADAS! ";

break;
case 1: //MODIFICACION
 
$res= pg_query($conexion,"UPDATE schema_academica.carreras SET codigo_carrera='$codigo',nombre_carrera='$nombre',ciclos='$ciclos',estado='$estado' WHERE  codigo_carrera='$ID_transaccion' ")or die("2 Error modificacion : ".pg_last_error());
if($res){
echo "1 Modificacion exitosa";
$accion="modificacion de registro $ID_transaccion a : $codigo, $nombre, $ciclos, $estado ";
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}
else echo "ERROR! AL MODIFICAR!";

break;

case 2: //DAR DE BAJA

$res=pg_query($conexion,"UPDATE schema_academica.carreras SET estado='$estado' WHERE codigo_carrera ='$ID_transaccion'")or die("2 Error en dar de baja : ".pg_last_error());
if($res){

if($estado==0){

echo "1 Registro dado de baja!";
$accion="registro de carrera codigo ".$ID_transaccion." dado de baja";
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}
else{

echo "1Registro reactivado!";
$accion="registro de carrera codigo ".$ID_transaccion." Reactivado";
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}
}

break;

}
?>