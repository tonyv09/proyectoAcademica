<?php 

 
 $periodo=$_GET['periodo'];
include_once("../../../conexiones/conexion_transacciones.php");

	$consulta=pg_query($conexion,"SELECT * FROM schema_academica.fechas_graduacion WHERE estado=1 ORDER BY fecha DESC")or die('Erro consulta especifica: ' . pg_last_error());

if($consulta)
while($fila=pg_fetch_object($consulta))
{
	?>
<tr>
<td><?php echo $fila->descripcion_evento ?></td>
<td> <?php echo $fila->fecha; ?> </td>
<td> 
<a  id="modificar" onclick="modificar('<?php echo $fila->idfecha; ?>','<?php echo $fila->fecha; ?>','<?php echo trim($fila->descripcion_evento); ?>')">
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-info"></i>
     <i class="fa fa-rotate-left fa-stack-1x fa-inverse"></i>
 </span>
 </a>
 </td>
<td align="center">
<a id="eliminar" onclick="dar_de_baja('<?php echo $fila->idfecha; ?>','<?php echo $fila->fecha; ?>','<?php echo trim($fila->descripcion_evento); ?>')">
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-danger"></i>
    <i class="fa fa-close fa-stack-1x fa-inverse"  ></i>
	</span>
	</a>
</td>
</tr>
<?php
}

?>