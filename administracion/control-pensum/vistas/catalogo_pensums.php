<?php 

include_once("../../../conexiones/conexion_transacciones.php");


$consulta_carreras=pg_query($conexion,"SELECT * FROM schema_academica.carreras ")or die('Erro consulta de carreras: ' . 
  pg_last_error());
$consulta_carreras2=pg_query($conexion,"SELECT * FROM schema_academica.carreras ")or die('Erro consulta de carreras: ' . 
  pg_last_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor Pensum</title>
    <!-- Custom styles for this template -->
<!--    <link href="../../../css/simple-sidebar.css" rel="stylesheet">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
    <link rel="stylesheet" type="text/css" href="../../../cssal/prettify.css">
    <link rel="stylesheet" type="text/css" href="../../../cssal/styles.css">-->
        <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
  <link href="../../../css/simple-sidebar.css" rel="stylesheet">
  <link href="../../../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
  <link href="../../../css/dataTables.bootstrap.min.css">
  <link href="../../../cssal/prettify.css">
  <link href="../../../cssal/styles.css">
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
           <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
              <li class="sidebar-brand">
                <a href="#">Usuario:<?php echo $_SESSION['usuario'];?></a>
              </li>

                <li>
                    <a href="../../principal.php">
                        Inicio</a>
                      </li>
                <li>
                    <a href="../../control-archivos">Gestion de archivos</a>
                </li>
                <li>
                    <a href="../../control-enlaces">Gestion enlaces de interes</a>
                </li>
                <li>
                    <a href="../../control-graduaciones">Gestion graduaciones</a>
                </li>
                <li>
                    <a href="../../control-carreras">Gestion carreras</a>
                </li>
                <li>
                    <a href="gestor_pensum.php">Gestion pensum</a>
                </li>
                <li>
                    <a href="catalogo_pensums.php">Catalogo pensums</a>
                </li>
                <li>
                 <a href="../../cerrar_session.php">Cerrar Sesion </a>
                   
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
             <a type="button" class="btn btn-secondary" id="menu-toggle" href="#menu-toggle" data-toggle="offcanvas">
          ☰
          </a>
            <div class="container-fluid">
               
            </div>
        </div>
<!--*************************** -->
    <!-- Page Content -->
<section class="container">
        <div class="row">
        <div id="mensaje" name="mensaje" data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>"}' data-ids="myid" data-fade="3000">

  
</div>
      </div>
          <div class="row d-flex justify-content-center">
  <h1 class="display-5 text-info">Edicion de Pensums</h1>
</div>
</section>

  <section class="container">
    <form id="form_select_carreras" name="form_select_carreras" style="display: none">    

  

<div class="form-group row d-flex justify-content-center">

<div class="col-md-10">
<label class="col-form-label" for="id_carrera">Carreras</label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="select_carrera" name="select_carrera" onchange="agregar_carrera_form(this.value)">
   <option value="0" selected >Seleccione carrera</option>
   <?php 
while($carreras=pg_fetch_object($consulta_carreras)){
?>
  <option value="<?php echo $carreras->codigo_carrera ;?> "><?php echo $carreras->nombre_carrera?> </option>
<?php
}

   ?>


  </select>

  
</div>   
</div>
</form>
<form action="" id="form_pensum1" name="form_pensum1" method="post" accept-charset="utf-8" enctype="multipart/form-data" style="display: none">
    <input type="text" name="codigo_carrera" id="codigo_carrera" style="display: none">
    <input type="text" name="transaccion" id="transaccion" value="1" style="display: none">
    <input type="text" name="id_transaccion" id="id_transaccion" style="display: none">
        
   <input type="text" name="cambio_estado" id="cambio_estado" style="display: none">

<div class="form-group row d-flex justify-content-center">
        
    <div class="col-md-5">
        <label class=" col-form-label" for="codigo_materia">Codigo </label>
    <input required type="text" minlength="3" class="form-control" onkeyup="mayusculas(this.id,this.value)" placeholder="<>" id="codigo_materia" name="codigo_materia" >
    
    </div>

    <div class="col-md-5">
        <label class=" col-form-label" for="nombre_materia">Nombre </label>
    <input required type="text" class="form-control" minlength="3" placeholder="materia" id="nombre_materia" name="nombre_materia">
    
    </div>
    
</div>
    


<div class="form-group row d-flex justify-content-center">
    
     
<div class="col-md-4">
<label class=" col-form-label" for="descripcion">Unidades valorativas</label>
    <input required id="unidades_valorativas" name="unidades_valorativas"  min="1" class="form-control" placeholder="UV" type="number">
    
</div>
    <div class="col-md-3">
<label class=" col-form-label" for="descripcion">Pre-requisitos</label>
    <input required id="pre_requisitos" name="pre_requisitos" type="text" minlength="3" class="form-control"  placeholder="Codigo materia antesesora" onkeyup="mayusculas(this.id,this.value)" >
    
</div>
    <div class="col-md-3">
<label class=" col-form-label" for="descripcion">Ciclo</label>
    <input required id="ciclos" name="ciclos" type="number" class="form-control" min="1" placeholder="#" >
    
</div>
</div>

<div class="form-group row d-flex justify-content-start ml-4">
  <div class="col-md-5">

<button type="submit" class="btn btn-lg btn-primary ml-5 "  name="enviar" id="enviar" style="display: none"> </button>
<button type="button" class="btn btn-lg btn-primary ml-5 "  name="agregar" id="agregar" onclick="validar_form1()"> Guardar</button>
<button type="reset" id="cancelar_real" style="display: none"></button>
<button  class="btn btn-lg btn-primary ml-5" type="button" id="cancelar" onclick="mostar()"> Salir</button>
          
  </div>

</div>
</form>


<br>
<form id="vista_catalogo">


<div class="form-group row d-flex justify-content-center">

<div class="col-md-10">
<label class="col-form-label" for="id_carrera">Carreras</label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="select_carrera_filtro" name="select_carrera_filtro" onchange="ajaxTablaPensums(this.value)">
   <option value="0" selected>Seleccione carrera</option>
   <?php 
while($carreras=pg_fetch_object($consulta_carreras2)){
?>
  <option value="<?php echo $carreras->codigo_carrera ;?> "> <?php echo $carreras->nombre_carrera; ?> </option>
<?php
}

   ?>
  </select>

</div>   
</div>


<table class="table table-hover">
  <thead>
    <tr style="text-align:center;">
      <th>Correlativo</th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Pre-requisito</th>
      <th>Unidades Valorativas</th>
      <th>Ciclo</th>
      <th>Modificar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody id="tabla_materias_ed_el">
  </tbody>
  </table>

</form>
</section>






    </div>
    <!-- /.container -->






        <br><br>
        <!-- /#page-content-wrapper -->



    </div>
    <!-- /#wrapper -->

 <!-- Bootstrap core JavaScript -->
    <script src="../../../js/jquery-3.1.1.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../jsal/jquery.bsAlerts.js"></script>

    <script src="../js/gestion_catalogo_pensums.js"></script>


    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>



<script >
    
$(document).ready(function(){
  enviar_datos();
// trigger_alertas();


});



  function enviar_datos()
{

  $('#form_pensum1').submit(function(e){
 
  
  e.preventDefault(); //(boton guardar sin parametro 
  $.ajax({
      url: '../bd/gestion_pensum_consultas.php',
      type: 'POST',
      data: $("#form_pensum1").serialize(),
      beforeSend: function() {
        console.log('enviando datos a la BD')
        ;
      },
 
success:function(resp){console.log(resp);}
}).done(function(resp){



var tipo_alerta=resp.substring(0,1);
var alerta=resp.substring(1,(resp.length-1) );


switch(tipo_alerta){
case '1':
trigger_alertas(0,alerta);
ajaxTablaPensums($("#select_carrera_filtro").val());
break;
default:
trigger_alertas(2,alerta); 
break;

}

var aux_carrera=$("#select_carrera").val();
$("#transaccion").val(1);
$("#id_transaccion").val(0);
//$("#cancelar").trigger('click')
$("#select_carrera").val(aux_carrera);
$("#id_carrera").val(aux_carrera);
$("#guardar").attr('disabled','disabled');

});
    



});

 

}

</script>



</body>

</html>
