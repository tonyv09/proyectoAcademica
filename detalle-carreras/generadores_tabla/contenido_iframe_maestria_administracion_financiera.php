 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../css/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/estilos-extras.css">
</head>
<body>
<section class="container-fluid">
<div class="row">
<div id="campo_tabla">
	<input type="text" name="seleccion_anterior" id="seleccion_anterior" style="display: none;" >
	<input type="text" name="prerequisitos_anterior" id="prerequisitos_anterior" style="display: none;">
  <table class="table letra_pensum" id="tabla_pensum" style="display: none">

  <tbody >
  <tr id="fila_principal">
  
  </tr>
  </tbody>
  </table>
  </div>
  </div>      
  </section>
      <!-- Modal -->
<div class="modal" id="ModalLoading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Espere Por favor</h5>
      </div>
        <div class="modal-body d-flex justify-content-center">
          <img src="../../documentos/loading.gif">
        </div>
    </div>
  </div>
</div>
</body>
<script src="../../js/jquery-3.1.1.min.js"></script>
<script src="../js-carreras/generador-pensums-carreras.js"></script>
<script src="../../js/tether-1.4.0.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
      $('#ModalLoading').modal('show');   
ajax_mostrar_pensum('MAF2018','94c894','cccccc',$('#ModalLoading'));
});




</script>
</html>