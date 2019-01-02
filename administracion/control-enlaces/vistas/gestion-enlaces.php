<?php 
session_start();
if($_SESSION['usuario']==null || $_SESSION['usuario']=='')
{
echo "USUARIO NO AUTORIZADO";
die();

}
else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enlaces</title>



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
                    <a href="../../control-archivos">Gestion de archivos</a>
                </li>
                <li>
                    <a href="gestion-enlaces.php">Gestion enlaces de interes</a>
                </li>
                <li>
                    <a href="../../control-graduaciones">Gestion graduaciones</a>
                </li>
                <li>
                    <a href="../../control-carreras">Gestion carreras</a>
                </li>
                <li>
                    <a href="../../control-pensum">Gestion pensum</a>
                </li>
                <li>
                    <a href="../../vistas/catalogo_pensums.php">Catalogo pensums</a>
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
           <div data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>"}' data-ids="alertas_enlaces" data-fade="3500"></div>

         </div>  
         <br>
  
</section>
    <section class="container">


<form action="" id="form_enlaces" name="form_enlaces" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    
    <input type="text" name="transaccion" id="transaccion" style="display: none">
    <input type="text" name="id_transaccion" id="id_transaccion" style="display: none">
        <input type="text" name="estado" id="estado" value="1" style="display: none">
    
    
     <div class="row d-flex justify-content-center">
  <h1 class="display-4 text-info">Gestion Enlaces</h1>
</div>
<div class="form-group row d-flex justify-content-center">
        
    <div class="col-md-7">
        <label class=" col-form-label" for="nombre_sitio">Nombre sitio</label>
    <input required type="text" class="form-control" placeholder="sitio" id="nombre_sitio" name="nombre_sitio">
    
    </div>
    
</div>
    


<div class="form-group row d-flex justify-content-center">
    
     
<div class="col-md-7">
<label class=" col-form-label" for="descripcion">URL</label>
    <input required id="enlace" name="enlace" class="form-control" placeholder="www" name="descripcion">
    
</div>
    
</div>


<div class="form-group row d-flex justify-content-center" >
      <div class="row">
      <label class="col-form-label" for="pantallas_destino">Pantallas destino</label>
        
      </div>
      </div>
      <div class="form-group row d-flex justify-content-center" >
      

<div class="row" >
<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" id="ENLACES" name="ENLACES" value="option1" > Enlaces
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" id="FORMATOS" name="FORMATOS" value="option2"> Formatos
  </label>
</div>
<div class="form-check form-check-inline ">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" id="INSCRIPCIONES" name="INSCRIPCIONES" value="option3"> Inscripciones
  </label>
</div>
  <div class="form-check form-check-inline ">
  <label class="form-check-label"limpiar_checkbox()>
    <input class="form-check-input" type="checkbox" id="GRADUACIONES" name="GRADUACIONES" value="option4"> Graduaciones
  </label>
</div>
      
  
</div>

      </div>


<div class="form-group row d-flex justify-content-center ">
  <div class="col-7">
<button type="submit" style="display: none;" name="subir" id="subir"></button>
<button type="button" onclick="validar_form()" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="subir" name="subir" id="subir"> Subir</button>
<button type="button" onclick="limpiar_checkbox()" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="cancel" name="cancel" id="canel"> cancelar</button>

 <button type="reset" class="btn btn-lg btn-primary ml-auto pl-5 pr-5" value="cancelar" name="cancelar" id="cancelar" style="display: none"></button>
          
  </div>

  

</div>

<br><br>

<table class="table table-hover" id="tabla_enlaces_cabecera">
  <thead>
    <tr style="text-align:center;">
      <th>Sitio</th>
      <th>URL</th>
      <th>Pantalla destino</th>
      <th>Modificar</th>
      <th>Dar de baja</th>
    </tr>
  </thead>
  <tbody id="tabla_enlaces">
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
<script src="../../../js/jquery-3.1.1.js"></script>
<script src="../../../js/tether-1.4.0.js" ></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/dataTables.bootstrap.min.js" ></script>
<script src="../../../js/jquery.dataTables.min.js" ></script>
<script src="../../../jsal/jquery.bsAlerts.js"></script>
    <script src="../js/gestion_enlaces.js"></script>

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

ajaxTablaEnlaces(0) ;

});



  function enviar_datos()
{

  $('#form_enlaces').submit(function(e){
 
  
  e.preventDefault(); //(boton guardar sin parametro 
  $.ajax({
      url: '../bd/enlaces_consultas.php',
      type: 'POST',
      data: $("#form_enlaces").serialize(),
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
lanzador_alerta(1,alerta);
 break;
default:
lanzador_alerta(2,resp); 
break;

}

ajaxTablaEnlaces(0) ;
$("#transaccion").val(0);
$("#id_transaccion").val(0);
limpiar_checkbox();




});
    



});

 

}

</script>



</body>

</html>
<?php
}
?>