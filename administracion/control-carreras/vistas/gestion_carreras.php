<?php 
session_start();
if($_SESSION['usuario']==null || $_SESSION['usuario']=='')
{
echo "USUARIO NO AUTORIZADO";
die();

} else{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carreras</title>


    <!-- Bootstrap core CSS -->
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
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="../../control-archivos/">Gestion de archivos</a>
                </li>
                <li>
                    <a href="../../control-enlaces/">Gestion enlaces de interes</a>
                </li>
                <li>
                    <a href="../../control-graduaciones/">Gestion graduaciones</a>
                </li>
                <li>
                    <a href="gestion_carreras.php">Gestion carreras</a>
                </li>
                <li>
                   <a href="../../control-pensum"/>Gestion pensum</a>
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
           <div data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>"}' data-ids="alertas_carreras" data-fade="3500"></div>

         </div>  
         <br>
  
</section>

    <section class="container">


<form action="" id="form_carreras" name="form_carreras" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    
    <input type="text" name="transaccion" id="transaccion" value="0" style="display: none">
    <input type="text" name="id_transaccion" id="id_transaccion" style="display: none">
    <input type="text" name="estado" id="estado" value="1" style="display: none">
    
     <div class="row d-flex justify-content-center">
  <h1 class="display-4 text-info">Gestion Carreras</h1>
</div>
<div class="form-group row d-flex justify-content-center">
        
    <div class="col-md-7">
        <label class=" col-form-label" for="nombre_carrera">Nombre carrera</label>
    <input required type="text" class="form-control" placeholder="Carrera" id="nombre_carrera" name="nombre_carrera">
    
    </div>
    
</div>
    


<div class="form-group row d-flex justify-content-center">
    
     
<div class="col-md-4">
<label class=" col-form-label" for="codigo-carrera">Codigo</label>
    <input required id="codigo_carrera" name="codigo_carrera" class="form-control" placeholder="<>" >
    
</div>
    <div class="col-md-3">
<label class=" col-form-label" for="ciclos">ciclos</label>
    <input required id="ciclos" name="ciclos" type="number" class="form-control"  placeholder="#" >
    
</div>
</div>

<div class="form-group row d-flex justify-content-end ">
  <div class="col-md-2">
<button type="submit" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="subir" name="subir" id="subir"> Subir</button>
          
  </div>
  <div class="col-md-2">
    <button type="reset" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="cancelar" name="cancelar" id="cancelar"> Cancelar</button>
  </div>


</div>


<br><br>


<table class="table table-hover " id="tabla_carreras_cabecera">
  <thead>
    <tr style="text-align:center;">
      <th>Correlativo</th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Numero de ciclos</th>
      <th>Estado</th>
      <th>Modificar</th>
      <th>Dar de baja</th>
    </tr>
  </thead>
  <tbody id="tabla_carreras">
  </tbody>
  </table>

</form>
</section>






    </div>
    <!-- /.container -->






        <br><br>
        <!-- /#page-content-wrapper -->



    </div>
    <!-- /#wrapper     -->
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



    <script src="../../../js/jquery-3.1.1.js"></script>
<script src="../../../js/tether-1.4.0.js" ></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/dataTables.bootstrap.min.js" ></script>
<script src="../../../js/jquery.dataTables.min.js" ></script>
<script src="../../../jsal/jquery.bsAlerts.js"></script>
    <script src="../js/gestion_carreras.js"></script>

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
  ajaxTablaCarreras();
});



  function enviar_datos()
{

  $('#form_carreras').submit(function(e){
 
  
  e.preventDefault(); //(boton guardar sin parametro 
  $.ajax({
      url: '../bd/gestion_carreras_consultas.php',
      type: 'POST',
      data: $("#form_carreras").serialize(),
      beforeSend: function() {
           $('#ModalLoading').modal('show');
        console.log('enviando datos a la BD');
      },
 
success:function(resp){console.log(resp);}
}).done(function(resp){
var tipo_alerta=resp.substring(0,1);
var alerta=resp.substring(1,(resp.length-1) );
$('#ModalLoading').modal('hide');
switch(tipo_alerta){
case '1':
lanzador_alerta(1,alerta);
//ajaxTablaCarreras();
 break;
default:
lanzador_alerta(2,resp); 
break;

}

ajaxTablaCarreras();
$("#transaccion").val(0);
$("#id_transaccion").val(0);
$("#estado").val(1);

});
    



});

   

}

</script>



</body>

</html>
<?php 
} 
?>