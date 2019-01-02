<?php 
include_once("../../../conexiones/conexion_transacciones.php");
/*foreach ($_FILES as $key_aux) //Iteramos el arreglo de archivos
{
 $length+=$key_aux['size'];

}*/
$numero_archivos=sizeof($_POST);
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

$ruta = '../../../documentos/'; //Decalaramos una variable con la ruta en donde almacenaremos los archivos
$ruta_descarga='../documentos/';
$mensage ='0';//Declaramos una variable mensaje quue almacenara el resultado de las operaciones.

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
			//move_uploaded_file($temporal, $destino); //Movemos el archivo temporal a la ruta especificada		echo "nombre archivo ".$nombre_archivo;
echo "temporal ".$temporal;
echo "destino ".$destino;
echo "ruta de descarga ".$ruta_descargar;
echo "mensaje ".$mensage;

/*	
pg_query($conexion,"insert into schema_academica.ruta_archivo (ruta,nombre_archivo,pantalla_destino,descripcion,fecha_periodo,estado) values('$ruta_descargar','$nombreArchivo','$nombre_pantalla','$ubicacion','$fecha','$estado')")or die('2 No se ha podido insertar RUTA DE ARCHIVOS ERROR: ' . pg_last_error());

*/

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



/*echo "**************************";
//echo "tamaho archivo".$length;
echo "numero archivos ".$numero_archivos;
echo "transaccion ".$transaccion;
echo "pantalla ".$pantalla;
echo "ubicacion ".$ubicacion;
echo "ID_transaccion ".$ID_transaccion;
echo "ruta ".$ruta;
echo "ruta descargas ".$ruta_descarga;
echo "fecha ".$fecha;
echo "PANTALLA DESTINO ".$nombre_pantalla;
echo "<br>";echo "<br>";echo "<br>";
echo "nombre archivo ".$nombre_archivo;
echo "temporal ".$temporal;
echo "destino ".$destino;
echo "ruta de descarga ".$ruta_descargar;
echo "mensaje ".$mensage;
*/
?>