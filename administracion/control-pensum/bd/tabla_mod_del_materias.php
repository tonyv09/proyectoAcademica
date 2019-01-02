<?php
// agrupar y luego ordenar  buscar query par ahacer ambos con todos los campos o probar con sub selects 
$codigo_carrera=$_GET['codigo_carrera'];
include_once("../../../conexiones/conexion_transacciones.php");

 $consulta = pg_query($conexion,"SELECT * FROM schema_academica.materias WHERE codigo_carrera LIKE '%$codigo_carrera%' ORDER BY ciclo ")or die('error consulta general: ' . pg_last_error());

$i=0;
if($consulta)
while($fila=pg_fetch_object($consulta))
{
	$i++;
	?>
<td><?php echo $i; ?> </td>
<td><?php echo $fila->codigo_materia; ?> </td>
<td><?php echo $fila->nombre_materia; ?></td>
<td><?php echo $fila->prerrequisito; ?></td>
<td><?php echo $fila->unidades_valorativas; ?> </td>
<td><?php echo $fila->ciclo; ?> </td>


<td> 
<a  id="modificar" onclick="modificar('<?php echo $fila->codigo_carrera; ?>','<?php echo $fila->codigo_materia; ?>','<?php echo $fila->nombre_materia; ?>','<?php echo $fila->unidades_valorativas; ?>','<?php echo $fila->prerrequisito; ?>','<?php echo $fila->ciclo; ?>')" >
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-info"></i>
     <i class="fa fa-rotate-left fa-stack-1x fa-inverse"></i>
 </span>
 </a>
 </td>
<td align="center">

     
     <a id="eliminar" onclick="dar_de_baja('<?php echo $fila->codigo_carrera; ?>','<?php echo $fila->codigo_materia; ?>','<?php echo $fila->nombre_materia; ?>','<?php echo $fila->unidades_valorativas; ?>','<?php echo $fila->prerrequisito; ?>','<?php echo $fila->ciclo; ?>') " >
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