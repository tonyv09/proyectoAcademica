<?php
include_once("../../../conexiones/conexion_transacciones.php");

	$consulta=pg_query($conexion,"SELECT * FROM schema_academica.carreras ORDER BY codigo_carrera DESC ")or die('Erro consultar carreras: ' . pg_last_error());

$i=0;
if($consulta)
while($fila=pg_fetch_object($consulta))
{$i++;
	?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $fila->codigo_carrera; ?> </td>
<td><?php echo $fila->nombre_carrera; ?></td>
<td><?php echo $fila->ciclos; ?></td>
<td><?php if($fila->estado==1){echo "ACTIVA";} else{echo "INACTIVA";}  ?> </td>
<td> 
<a  id="modificar" onclick="modificar('<?php echo $fila->codigo_carrera; ?>','<?php echo $fila->nombre_carrera; ?>','<?php echo $fila->ciclos; ?>','<?php echo $fila->estado; ?>')" >
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-info"></i>
     <i class="fa fa-rotate-left fa-stack-1x fa-inverse"></i>
 </span>
 </a>
 </td>

<td align="center">
     <?php if($fila->estado==1){ ?>
     <a id="eliminar" onclick="dar_de_baja('<?php echo $fila->codigo_carrera; ?>','<?php echo $fila->nombre_carrera; ?>','<?php echo $fila->ciclos; ?>') " >
<span class="fa-stack fa-1x">

     <i class="fa fa-circle fa-stack-2x text-danger"></i>
          <i class="fa fa-close fa-stack-1x fa-inverse"></i>
     </span>
     </a>
     <?php } else {?>
         <a id="eliminar" onclick="reActivar('<?php echo $fila->codigo_carrera; ?>','<?php echo $fila->nombre_carrera; ?>','<?php echo $fila->ciclos; ?>')">
<span class="fa-stack fa-1x">

     <i class="fa fa-circle fa-stack-2x text-info"></i>
     <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
     </span>
     </a>
     <?php } ?>

    
	
	
</td>



</tr>
<?php
}


?>