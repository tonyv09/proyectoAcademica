<?php 

include_once("../../../conexiones/conexion_transacciones.php");


$consulta=pg_query($conexion,"SELECT usuario,idsec,pass,nombre_completo FROM schema_academica.control_sesiones WHERE estado='1'")or die('Erro consulta especifica: '.pg_last_error());
$categoria=0;
while($fila=pg_fetch_object($consulta))
{          
$consulta2=pg_query($conexion,"SELECT has_table_privilege('$fila->usuario','pg_shadow', 'SELECT')");
$fila2=pg_fetch_row($consulta2);
if($fila2[0]=='t' )
   {$categoria=1;
   }
else { $categoria=2;}
	?>
<tr>
<td><?php echo $fila->usuario; ?></td>
<td> <?php echo md5($fila->pass); ?> </td>
<td><?php echo $fila->nombre_completo; ?> </td>
<td> 
<a  id="modificar" onclick="modificar('<?php echo $fila->idsec; ?>','<?php echo $fila->usuario; ?>','<?php echo $fila->pass; ?>','<?php echo $fila->nombre_completo; ?>','<?php echo $categoria; ?>')" >
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-info"></i>
     <i class="fa fa-rotate-left fa-stack-1x fa-inverse"></i>
 </span>
 </a>
 </td>

<td align="center">
<a id="eliminar" onclick="dar_de_baja('<?php echo $fila->idsec; ?>','<?php echo $fila->usuario; ?>','<?php echo $fila->pass; ?>','<?php echo $fila->nombre_completo; ?>','<?php echo $categoria; ?>')">
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