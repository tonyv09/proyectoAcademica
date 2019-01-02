<?php 
//subir multiples archivos 
//http://www.gumonet.com/blog/subir-multiples-archivos-con-php-y-ajax/
//REHACER EL FORM CON BOOTSTRAP ALPHA!
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Graduaciones</title>

   <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../css/simple-sidebar.css" rel="stylesheet">

    <link href="../../../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../../css/estilos-extras.css">
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
                    <a href="control-fechas-graduaciones.php">Gestion graduaciones</a>
                </li>
                <li>
                    <a href="../../control-carreras">Gestion Carreras</a>
                </li>
                <li>
                    <a href="../../control-pensum">Gestion Pensum</a>
                </li>
                    <li>
                    <a href="../../control-pensum/vistas/catalogo_pensums.php">Catalogo pensums</a>
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

<section class="container d-flex justify-content-center">
     <div class="row">
           <div data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>"}' data-ids="alertas_fechas" data-fade="3500"></div>

         </div>  
         <br>
  
</section>



<section class="container ">
  

  <form action="" method="" id="form_fechas" name="form_fechas" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="text" name="transaccion" id="transaccion" value="0" style="display: none">
    <input type="text" name="id_transaccion" id="id_transaccion" style="display: none">
    
         <div class="row d-flex justify-content-center">
  <h1 class="display-4 text-info">Gestion Fechas Graduaciones</h1>
</div>

    <div class="form-group row  d-flex justify-content-center">
    
    
    <div class="col-md-7">
    <label class="col-form-label" for="fecha">Fecha</label>
    <input type="date" class="form-control" placeholder="Nombre archivo" id="fecha" name="fecha" onchange="validar_formulario(this.value);">
           
    </div>
   </div>

    
   <div class="form-group row d-flex justify-content-center">
     
<div class="col-md-7">
    <label class=" col-form-label" for="descripcion">Evento</label>
    <input  id="descripcionevento" class="form-control" placeholder="Descripcion evento" name="descripcionevento" required ></input>


</div>
    

   </div>


<div class="form-group row d-flex justify-content-center ">
  <div class="col-7">
<button type="submit" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="subir" name="subir" id="subir"> Subir</button>
  <button type="reset" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="cancelar" name="cancelar" id="cancelar">Cancelar</button>
          
  </div>

  

</div>
  </form>


</section>

<br><br>
<section class="container ">
    <table class="table table-hover" id="tabla_eventos">
  <thead>
    <tr style="text-align:center;">
      <th>Evento</th>
      <th>Fecha</th>
      <th>Modificar</th>
      <th>Dar de baja</th>
    </tr>
  </thead>
  <tbody id="eventos_graduacion">
  </tbody>
  </table>
</section>




    </div>
    <!-- /.container -->



    </div>
    <!-- /#wrapper -->
            <!-- Modal -->
<div class="modal fade" id="ModalLoading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Espere Por favor</h5>
      </div>
        <div class="modal-body d-flex justify-content-center">
          <img src="../../../documentos/loading.gif">
        </div>
    </div>
  </div>
</div>




   <!-- Bootstrap core JavaScript -->


    <script src="../../../js/jquery-3.1.1.js"></script>
<script src="../../../js/tether-1.4.0.js" ></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/dataTables.bootstrap.min.js" ></script>
<script src="../../../js/jquery.dataTables.min.js" ></script>
<script src="../../../jsal/jquery.bsAlerts.js"></script>
<!-- Menu Toggle Script -->
    <script src="../js/graduacion_validaciones.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>



<script >
    
$(document).ready(function(){
  enviar_datos();
  ajaxTablaFechas(0);
});



  function enviar_datos()
{

  $('#form_fechas').submit(function(e){
 
  
  e.preventDefault(); //(boton guardar sin parametro 
  $.ajax({
      url: '../bd/graduaciones_consultas.php',
      type: 'POST',
      data: $("#form_fechas").serialize(),
      beforeSend: function() {
                     $('#ModalLoading').modal('show');
        console.log('enviando datos a la BD')
        ;
      },
 
success:function(resp){console.log(resp);}
}).done(function(resp){

var tipo_alerta=resp.substring(0,1);
var alerta=resp.substring(1,(resp.length-1) );
$('#ModalLoading').modal('hide');
switch(tipo_alerta){
case '1':
lanzador_alerta(1,alerta);
 break;
default:
lanzador_alerta(2,resp); 
break;
}

ajaxTablaFechas(0) ;
$("#transaccion").val(0);
$("#id_transaccion").val(0);
$("#cancelar").trigger('click') ;
});
    



});

 

}

</script>


</body>

</html>
