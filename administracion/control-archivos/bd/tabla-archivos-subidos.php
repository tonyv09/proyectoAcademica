<?php
// agrupar y luego ordenar  buscar query par ahacer ambos con todos los campos o probar con sub selects 
$pantalla=$_GET['pantalla'];
include_once("../../../conexiones/conexion_transacciones.php");
$array= array("todos","FORMATOS","INSCRIPCIONES","GRADUACIONES","TRAMITES","INICIO");
$array_estado= array("Inactivo","Activo");

//echo "ajax pantalla ".$array[$pantalla];

if($pantalla!=0)
{
	$pantalla_origen=$array[$pantalla];
	
	//echo "pantalla dif zero= ".$pantalla_origen;
	$consulta=pg_query($conexion,"SELECT * FROM schema_academica.ruta_archivo WHERE (estado=1 AND pantalla_destino='$pantalla_origen') ORDER BY pantalla_destino")or die('Erro consulta especifica: ' . pg_last_error());
}else{
	//echo "pantalla zero";
 $consulta = pg_query($conexion,"SELECT * FROM schema_academica.ruta_archivo WHERE estado=1 ORDER BY pantalla_destino ")or die('error consulta general: ' . pg_last_error());
}
//$consulta=pg_query($conexion,"SELECT * FROM ruta_archivo ORDER BY fecha_periodo GROUP BY pantalla_destino");
if($consulta)
while($fila=pg_fetch_object($consulta))
{
	?>
<tr id="<?php echo $fila->idruta ?>">
<td><?php echo $fila->nombre_archivo; ?> </td>
<td><?php echo $fila->pantalla_destino; ?></td>
<td><?php echo $fila->descripcion; ?></td>
<td> <?php echo $fila->fecha_periodo; ?> </td>
<td> <?php echo $array_estado[$fila->estado]; ?> </td>

<td align="center">

     
     <a id="eliminar" onclick="dar_de_baja('<?php echo $fila->idruta ?>') " >
 <span class="fa-stack fa-1x">

     <i class="fa fa-circle fa-stack-2x text-danger"></i>
          <i class="fa fa-close fa-stack-1x fa-inverse"></i>
     </span>
     </a>
   



</td>

</tr>
<?php
}


?>