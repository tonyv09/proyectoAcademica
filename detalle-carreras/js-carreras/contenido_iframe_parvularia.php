<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../css/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../../css/estilos_extras.css">

</head>
<body>
<section class="container-fluid">
<div class="row">
<div id="campo_tabla">
	<input type="text" name="seleccion_anterior" id="seleccion_anterior" style="display: none;" >
	<input type="text" name="prerequisitos_anterior" id="prerequisitos_anterior" style="display: none;">
  <table class="table " id="tabla_pensum" style="display: none">

  <tbody >
  <tr id="fila_principal">
  
  </tr>
  </tbody>
  </table>
  </div>
  </div>      
  </section>
</body>
<script src="../../js/jquery-3.1.1.min.js"></script>
<script src="../js-carreras/generador-pensums-carreras.js"></script>
<script>
$(document).ready(function(){
ajax_mostrar_pensum('L70803');
});




</script>
</html>