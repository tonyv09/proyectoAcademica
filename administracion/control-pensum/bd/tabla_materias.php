<?php 
$codigo=$_GET['codigoMateria'];
$nombre=$_GET['nombreMateria'];
$UV=$_GET['unidadesValorativas'];
$PR=$_GET['preRequisitos'];
$ciclos=$_GET['ciclos']; 
$correlativo=$_GET['cor'];

?>
<tr>
<td><?php echo $correlativo; ?></td>
<td> <?php echo $codigo; ?></td>
<td><?php echo $nombre; ?> </td>
<td><?php echo $PR;?></td>
<td><?php echo $UV;?></td>
<td><?php echo $ciclos;?></td>


<td align="center">
<a id="eliminar" onclick="eliminar('<?php echo $codigo; ?>')">
<span class="fa-stack fa-1x">
     <i class="fa fa-circle fa-stack-2x text-danger"></i>
    <i class="fa fa-close fa-stack-1x fa-inverse"  ></i>
	</span>
	</a>
</td>

</tr>