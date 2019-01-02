<?php 


include_once("../../../conexiones/conexion_transacciones.php");

	$consulta=pg_query($conexion,"SELECT * FROM schema_academica.enlaces ORDER BY estado DESC")or die('Erro consulta especifica: ' . pg_last_error());

if($consulta)
while($fila=pg_fetch_object($consulta))
{
	?>
<tr>
<td><?php echo $fila->nombre_sitio; ?></td>
<td> <?php echo $fila->enlace; ?> </td>
<td><?php echo $fila->pantalla_destino; ?> </td>
<td> 
<a  id="modificar" onclick="modificar('<?php echo $fila->idenlace; ?>','<?php echo $fila->enlace; ?>','<?php echo $fila->nombre_sitio; ?>','<?php echo $fila->pantalla_destino ?>')" >
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-info"></i>
     <i class="fa fa-rotate-left fa-stack-1x fa-inverse"></i>
 </span>
 </a>
 </td>

<td align="center">


     <?php if($fila->estado==1){ ?>
     <a id="eliminar" onclick="dar_de_baja('<?php echo $fila->idenlace; ?>','<?php echo $fila->enlace; ?>','<?php echo $fila->nombre_sitio; ?>','<?php echo $fila->estado; ?>') " >
<span class="fa-stack fa-1x">

     <i class="fa fa-circle fa-stack-2x text-danger"></i>
          <i class="fa fa-close fa-stack-1x fa-inverse"></i>
     </span>
     </a>
     <?php } else {?>
         <a id="eliminar" onclick="dar_de_alta('<?php echo $fila->idenlace; ?>','<?php echo $fila->enlace; ?>','<?php echo $fila->nombre_sitio; ?>','<?php echo $fila->estado; ?>')">
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