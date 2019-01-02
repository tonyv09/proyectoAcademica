<?php 
session_start();
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['clave_acceso'])&& isset($_SESSION['insertada']) && $_SESSION['clave_acceso']==$_SESSION['insertada'])
{
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Gestion archivos</title>

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
                        Inicio</a>
                      </li>
                      
                <li>
                    <a href="index_archivos.php">Gestion de archivos</a>
                </li>
                <li>
                    <a href="../../control-enlaces">Gestion enlaces de interes</a>
                </li>
                <li>
                    <a href="../../control-graduaciones">Gestion graduaciones</a>
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
           <div data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>","warning": "<em>Advertencia!</em>"}' data-ids="myid" data-fade="3500"></div>

         </div>  
         <br>
  
</section>

<section class="container d-flex justify-content-center">
      
  <form action="" method="POST" id="form_archivos" name="form_archivos" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="text" name="transaccion" id="transaccion" value="0" style="display: none">
    <input type="text" name="id_transaccion" id="id_transaccion" value="0" style="display: none">

         <div class="row d-flex justify-content-center">
  <h1 class="display-4 text-info">Gestion de Archivos</h1>
</div>

    <div class="form-group row">
<label class="col-form-label" for="pantalla">Pantalla destino</label>
  <select required class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="pantalla" name="pantalla" onchange="cargar_ubicaciones(this.value)">
    <option value="0" selected>.....</option>
    <option value="1">Formatos</option>
    <option value="2">Inscripciones</option>
    <option value="3">Graduaciones</option>
    <option value="4">Tramites</option>
    <option value="5">Inicio</option>
  </select>  


      </div>
          <div class="form-group row" id="area_ubicacion" name=" area_ubicacion" style="display: none" >
<label class="col-form-label" for="pantalla">Ubicacion</label>
  <select  class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="ubicacion_inscripciones" name="ubicacion_inscripciones" >
    <option  value="0" selected>.....</option>
    <option value="1">Indicaciones</option>
    <option value="2">Horarios</option>
  </select>  
      </div>

   <div class="form-group row" id="area_ubicacion_inicio" name=" area_ubicacion_inicio" style="display: none" >
<label class="col-form-label" for="pantalla">Ubicacion</label>
  <select  class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="ubicacion_inicio" name="ubicacion_inicio" onchange="validar_tipo_archivo_solo_imagenes(this.value)" >
    <option  value="0" selected>.....</option>
    <option value="1" >Fotos</option>
    <option value="2">Documentos</option>
  </select>  
      </div>

                <div class="form-group row">
<input type="text" name="ub_formatos" id="ub_formatos" readonly style="display: none"> 
<input type="text" name="ub_tramites" id="ub_tramites" readonly style="display: none"> 

      </div>
                <div class="form-group row">
<input type="text" name="ub_graduaciones" id="ub_graduaciones" readonly style="display: none"> 
 


      </div>
 
<div class="form-group row">
  <input required type="file" class="form-control-file" multiple="multiple" name="archivo" id="archivo"  >

<!--

<input type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg" /> extenciones epsecificas
  <input type="file" name="myImage" accept="image/*" /> extenciones en general-->
</div>


<div class="form-group row d-flex">
  <div class="col-md-3">

<button type="submit"  value="subir"  name="subir" id="subir" style="display:none"></button>

<button type="button"  class="btn btn-lg btn-primary mr-1 " name="btn-subir" id="btn-subir" onclick="validar_envio()"> Subir</button>
    
  </div>
<div class="col-md-3">
  
<button type="reset" class="btn btn-lg btn-primary ml-1 " value="cancelar" name="cancelar" id="cancelar"> Nuevo</button>


</div> 
</div>








<div class="form-group row">

<label class="mr-sm-2" for="pantalla_tabla">Clasificacion</label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="pantalla_tabla" name="pantalla_tabla" onchange="ajaxTablaArachivos(this.value)">
    <option value="0" selected>todos</option>
    <option value="1">Formatos</option>
    <option value="2">Inscripciones</option>
    <option value="3">Graduaciones</option>
    <option value="4">Tramites</option>
    <option value="5">Inicio</option>
  </select>  
</div>

  </form>


</section>
<section class="container">
  <table class="table table-hover table-striped table-bordered" id="tabla_archivos" name="tabla_archivos">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Pantalla</th>
      <th>Clasificiacion</th>
      <th>Fecha </th>
      <th>Estado</th>
      <th>Dar de baja</th>

    </tr>
  </thead>
  <tbody id="archivos_subidos">

  </tbody>
  </table>
</section>

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

<br><br><br>

    <!-- /.container -->

        <br><br>
        <!-- /#page-content-wrapper -->

    <!-- Bootstrap core JavaScript -->
<script src="../../../js/jquery-3.1.1.js"></script>
<script src="../../../js/tether-1.4.0.js" ></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/dataTables.bootstrap.min.js" ></script>
<script src="../../../js/jquery.dataTables.min.js" ></script>
<script src="../../../jsal/jquery.bsAlerts.js"></script>
     <script src="../js/gestion_archivos.js" ></script>

   
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function(){
  enviar_datos();
  ajaxTablaArachivos(0);

});

    </script>

<script>
    
  function enviar_datos()
{
$('#form_archivos').submit(function(e){
 
  e.preventDefault();
  var f = $(this);
  var archivos=document.getElementById("archivo");
  var archivo=archivos.files;
  var pantalla=document.getElementById("pantalla").value;
  var ubformatos=$("#ub_formatos").val();
  var ubgraduaciones=$("#ub_graduaciones").val();
  var ub_inscripciones=$("#ubicacion_inscripciones").val();
  var ub_inicio=$("#ubicacion_inicio").val();
   
var formData= new FormData();
formData.append('pantalla',pantalla);
formData.append('ub_formatos',ubformatos);
formData.append('ub_graduaciones',ubgraduaciones);
formData.append('transaccion',$("#transaccion").val());
formData.append('id_transaccion',$("#id_transaccion").val());
formData.append('ubicacion_inscripciones',ub_inscripciones);
formData.append('ub_tramites',$('#ub_tramites').val());
formData.append('ub_inicio',ub_inicio);
for (var i=0;i<archivo.length;i++) {
   formData.append('archivo'+i,archivo[i]);
}

$.ajax({

url:"../bd/gestion-archivos-consultas.php",
type:'POST',
contentType:false,
dataType: "html",
data:formData,
processData:false,

cache:false,
beforeSend: function(){
console.log("envio realizado con exito");
 $('#ModalLoading').modal('show');
},
success:function(resp){console.log(resp);}
}).done(function(resp){

var tipo_alerta=resp.substring(0,1);
var alerta=resp.substring(1,(resp.length-1) );
var filtro=$("#pantalla_tabla").val();
 $('#ModalLoading').modal('hide');
switch(tipo_alerta){
case '1':
lanzador_alerta(1,alerta);
$("#cancelar").trigger('click');
ajaxTablaArachivos(filtro);
$("#pantalla_tabla").val(filtro);
validar_tipo_archivo_solo_imagenes(0)
 break;
default:
lanzador_alerta(2,resp); 
break;

}



});

 });
 

}

</script>

</body>

</html>
<?php }
else{
	echo "USUARIO NO AUTORIZADO";
die();

}


?>
