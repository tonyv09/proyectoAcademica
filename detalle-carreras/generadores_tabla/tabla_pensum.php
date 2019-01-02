<?php
include_once("../../conexiones/conexion_publica.php");
$codigo_carrera=$_GET['codigo_carrera'];
$codigo_color_primario=$_GET['codigo_color_primario'];
$codigo_color_secundario=$_GET['codigo_color_secundario'];
$bandera=0;
$ciclos=10;
if(substr_compare($codigo_carrera,'P',0,1)==0)
{$inicio=0;
$ciclos=6;}
else 
$inicio=1;


?> 


<?php
for($i=$inicio;$i<=$ciclos;$i++)
{  ?>


 <?php
	$consulta=pg_query($conexion,"select * from schema_academica.materias where codigo_carrera like '%$codigo_carrera%' AND ciclo=".$i)or die('Erro consulta especifica: ' . pg_last_error());

	?>
<tr >
<td width="150px" >
	 <table>
 	<tbody>
 		<tr>
 		<td><b>Ciclo <?php echo $i; ?></b></td>	
 		</tr>
<?php 
$bandera=0;

while($fila=pg_fetch_object($consulta))
{

?>

<table id="<?php echo $fila->codigo_materia; ?>" onclick="seleccion_elemento(this.id ,'<?php echo $fila->prerrequisito;?>')"  cellpadding="10px">	
	<tbody>

 		<tr >
 			<td style=" background-color: <?php echo "#".$codigo_color_secundario; ?>; " > <?php echo $fila->codigo_materia;?><?php echo " UV:".$fila->unidades_valorativas;  ?></td>

 		</tr>
 	 		<tr>
 			<td style="background-color: <?php echo "#".$codigo_color_primario; ?>;" > <?php echo $fila->nombre_materia; ?>&nbsp &nbsp 
            	
            </td>
 			
 		</tr>
 	<tr><td style="justify-content:center; background-color:  <?php echo "#".$codigo_color_secundario; ?>;"  > <?php echo $fila->prerrequisito; ?> </td> </tr>

</tbody>
</table>
<br>
<?php 

}

?>
</tbody>
</table>
</td>
</tr>
<?php
}
?>


<?php

?>
