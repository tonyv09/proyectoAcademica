<?php
//CLAUSULA LIKE CON NUMEROS SELECT * FROM fechas_graduacion WHERE  fecha::text LIKE '%1970%'
//agregar modificacion y preparar dise;o de muestra para generar pensum por carrera 
 $transaccion=$_POST['transaccion'];
 $ID_transaccion=$_POST['id_transaccion'];

 include_once("../../../conexiones/conexion_transacciones.php");


 switch($transaccion){
 case 0: //INSERCION

 $matriz_datos=$_POST['matriz_datos'];
 $ARRAY_DATOS=explode("_",$matriz_datos);
 $codigo_carrera=$_POST['id_carrera'];

$n_filas=count($ARRAY_DATOS);
for($i=0;$i<($n_filas-1);$i++)
 {
 	$FILAS=explode("-",$ARRAY_DATOS[$i]);

echo "filas[1] ".$FILAS[1];
$materia_compartida=pg_query($conexion,"SELECT codigo_carrera FROM schema_academica.materias WHERE codigo_materia='$FILAS[1]'")or die('No se ha podido insertar registro depensum! ERROR: '. pg_last_error());
$fila_registro=pg_fetch_object($materia_compartida);
if( count ($fila_registro->codigo_carrera)>0){

$materia=pg_fetch_object($materia_compartida);
$materia_concat=$materia->codigo_carrera.','.$codigo_carrera;
echo "****final =".$materia_concat;
pg_query($conexion,"UPDATE schema_academica.materias SET codigo_carrera='$materia_concat'  WHERE codigo_materia='$FILAS[1]' ")or die("Error modificacion : ".pg_last_error());
	
	$accion="Insercion de materia $FILAS[2] codigo: ".$FILAS[1]." a pensum de carrera ".$codigo_carrera;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}
else{


$resinsrt=pg_query($conexion,"INSERT INTO schema_academica.materias (nombre_materia,codigo_materia,unidades_valorativas,prerrequisito,ciclo,codigo_carrera) VALUES ('$FILAS[2]','$FILAS[1]','$FILAS[3]','$FILAS[4]','$FILAS[5]','$codigo_carrera')")or die('2No se ha podido insertar registro depensum! ERROR: '. pg_last_error());
if($resinsrt)
{echo "1Registros Guardados exitosamente! ";
	$accion="Insercion de materia ".$FILAS[2]."codigo: ".$FILAS[1]." a pensum de carrera ".$codigo_carrera;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}
else{
	echo "ERORR AL INSERTAR";
}


}
}

break;
case 1: //MODIFICACION

$codigo_carrera=$_POST['codigo_carrera'];
$codigo_materia=$_POST['codigo_materia'];
$nombre_materia=$_POST['nombre_materia'];
$UV=$_POST['unidades_valorativas'];
$PR=$_POST['pre_requisitos'];
$ciclos=$_POST['ciclos'];


$resmod=pg_query($conexion,"UPDATE schema_academica.materias SET codigo_carrera='$codigo_carrera', codigo_materia='$codigo_materia', nombre_materia='$nombre_materia',unidades_valorativas='$UV',prerrequisito='$PR' WHERE codigo_materia='$ID_transaccion' ")or die("2Error modificacion : ".pg_last_error());
if($resmod)
{
	echo "1Registro modificado exitosamente";
	
	$accion="Modificacion de materia ".$ID_transaccion." a $codigo_carrera, $codigo_materia, $nombre_materia, $codigo_materia, $UV, $PR ";

$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());

}
break;

case 2: //DAR DE BAJA
$codigo_materia=$_POST['codigo_materia'];

$resdel=pg_query($conexion,"DELETE FROM schema_academica.materias WHERE codigo_materia='$codigo_materia'")or die("Error en dar de baja : ".pg_last_error());
if($resdel)
{echo "1Registro eliminado!";
	$accion="Eliminacion de materia codigo: ".$codigo_materia ;
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());
}else{

	echo "ERROR AL ELIMINAR!";
}

break;

} 

?>