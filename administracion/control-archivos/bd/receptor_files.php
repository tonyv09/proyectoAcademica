<?php 
include_once("../../../conexiones/conexion_transacciones.php");
$length=0;
foreach ($_FILES as $key_aux) //Iteramos el arreglo de archivos
{
 $length+=$key_aux['size'];
//echo "\n FILE ".$key_aux['name']." size ".$key_aux['size'];
}
//echo " length total ".$length;
//$numero_archivos=sizeof($_POST);
/*if($length<104857600 && $numero_archivos )
{
*/


 $transaccion=$_POST['transaccion'];
$pantalla=$_POST['pantalla']; 
switch($pantalla)
{
case '1': //formatos
$ubicacion=$_POST['ub_formatos'];

break;

case '2'://inscripciones
$ub=$_POST['ubicacion_inscripciones'];
$ub_inscripciones=array("INDICACIONES"," HORARIOS");
$ubicacion=$ub_inscripciones[$ub-1];
break;

case '3': //graduaciones
$ubicacion=$_POST['ub_graduaciones'];
break;
case '4'://tramites
$ubicacion=$_POST['ub_tramites'];
break;
case '5': //pantalla de inicio
$ub=$_POST['ub_inicio'];
$ub_inc=array("FOTOS","DOCUMENTOS");
$ubicacion=$ub_inc[$ub-1];

break;


}

 
  $ID_transaccion=$_POST['id_transaccion'];
  $estado=1;

$mensaje="";

switch($transaccion)
{
	case 0:
$ruta = '../../../documentos/'; //Decalaramos una variable con la ruta en donde almacenaremos los archivos
$ruta_descarga='../documentos/';
$mensage ='';//Declaramos una variable mensaje quue almacenara el resultado de las operaciones.

//CONFIGURAR PANTALLAS DE CONSULTAS PARA Q BAJEN LOS ARCHIVOS DESDE EL SERVIDOR

header('Content-Type: text/html; charset=ISO-8859-1');
ini_set('date.timezone','America/El_salvador');
$fecha=date('Y-m-d',time());


$array= array("FORMATOS","INSCRIPCIONES","GRADUACIONES","TRAMITES","INICIO");
$nombre_pantalla=$array[$pantalla-1];

foreach ($_FILES as $key) //Iteramos el arreglo de archivos
{
	if($key["error"]== UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
		{
		
		
			$nombreArchivo = utf8_decode($key['name']);//Obtenemos el nombre original del archivo
			$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
			$destino = $ruta.$nombreArchivo; //Movemos el archivo temporal a la ruta especificada	
			$ruta_descargar=$ruta_descarga.$nombreArchivo;
			move_uploaded_file($temporal, $destino); //Movemos el archivo temporal a la ruta especificada		
	
pg_query($conexion,"insert into schema_academica.ruta_archivo (ruta,nombre_archivo,pantalla_destino,descripcion,fecha_periodo,estado) values('$ruta_descargar','$nombreArchivo','$nombre_pantalla','$ubicacion','$fecha','$estado')")or die('2 No se ha podido insertar registro ERROR: ' . pg_last_error());



		}
 
	if ($key['error']=='') //Si no existio ningun error, retornamos un mensaje por cada archivo subido
		{
			$mensage .= '1Archivo <b>'.$nombreArchivo.'</b> Subido correctamente. <br>';
		}
	if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
		{
			$mensage .= '2No se pudo subir el archivo <b>'.$nombreArchivo.'</b> debido al siguiente Error:'.$key['error']; 
		}
	
}
//echo $mensage;
break;
case 1:  //eliminar

$registro=pg_query($conexion,"SELECT * FROM schema_academica.ruta_archivo WHERE  idruta='$ID_transaccion' ");
$fila=pg_fetch_object($registro);


//echo "ELIMINAR ruta".$fila->ruta." nombre archivo ".$fila->nombre_archivo;
 if(unlink("../../".$fila->ruta))
$res=pg_query($conexion,"DELETE FROM schema_academica.ruta_archivo WHERE  idruta='$ID_transaccion' ");

if($res)
$mensage="1Archivo eliminado!";
else
	$mensage="2Error al eliminar";
break;

} //FIN SWITCH
/*}//fin condicion de tamanho y numero de archivos
else {
	$mensaje="2Ha excedido el numero de archivos, MAXIMO total o PARCIAL de capacidad de subida";

}*/
echo $mensage;


?>