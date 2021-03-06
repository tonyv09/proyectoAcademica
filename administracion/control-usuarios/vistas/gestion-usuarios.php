<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuarios</title>
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
    <section class="container">

      <div class="row">
        <div id="mensaje" name="mensaje" data-alerts="alerts"   data-titles='{"info": "<em>Exito!</em>", "error": "<em>Error!</em>"}' data-ids="myid" data-fade="3000">

  
</div>
      </div>
<form action="" id="form_users" name="form_users" method="post" accept-charset="utf-8" enctype="multipart/form-data" >

    <input type="text" name="transaccion" id="transaccion" style="display: none">
    <input type="text" name="id_transaccion" id="id_transaccion" style="display: none">
    
    
     <div class="row d-flex justify-content-center">
  <h1 class="display-4 text-info">Gestion usuarios</h1>
</div>
<div class="form-group row d-flex justify-content-center">
        
    <div class="col-md-7">
        <label class=" col-form-label" for="nombre_usuario">Nombre usuario </label>
    <input required type="text" class="form-control"  id="nombre_usuario" name="nombre_usuario" value=" " placeholder="nombre en minusculas" onkeyup ="minusculas(this.id, this.value)"  >
    
    </div>
    
</div>
    <div class="form-group row d-flex justify-content-center">
        
    <div class="col-md-7">
        <label class=" col-form-label" for="pass">Contraseña </label>
    <input required type="password" class="form-control"  id="pass" name="pass"  >
    
    </div>
    
</div>

    <div class="form-group row d-flex justify-content-center">
<div class="col-md-7">
  <label class="col-form-label" for="pantalla">Tipo de usuario</label>
  <select required class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="tipo_usuario" name="tipo_usuario" >
    <option value="0" selected>.....</option> 
    <option value="1" >Usuario administrador</option>
    <option value="2">Usuario secretaria</option>

  </select>  


</div>

      </div>


<div class="form-group row d-flex justify-content-center">
    
     
<div class="col-md-7">
<label class=" col-form-label" for="descripcion">Nombre completo</label>
    <input type="text" required id="nombre_completo" name="nombre_completo" class="form-control" placeholder="" >
    
</div>
    
</div>


<div class="form-group row d-flex justify-content-end ">
  <div class="col-md-2">
<button type="submit" class="btn btn-lg btn-primary ml-5" value="subir" name="subir" id="subir"> Crear</button>
          
  </div>
<div class="col-md-2">
<button type="reset" class="btn btn-lg btn-primary mr-5  " value="cancelar" name="cancelar" id="cancelar">Nuevo</button>
          
  </div>
  

</div>

<br><br>


<table class="table table-hover">
  <thead>
    <tr style="text-align:center;">
      <th>Usuario</th>
      <th>pass</th>
      <th>Nombre</th>
      <th>Modificar</th>
      <th>Dar de baja</th>
    </tr>
  </thead>
  <tbody id="tabla_usuarios">
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
        <script src="../../../jsal/jquery.bsAlerts.js"></script>

    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../js/gestion_usuarios.js"></script>

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
 ajaxTablaUsuarios();
$("#subir").attr('enabled','enabled');
   //$("#subir").attr('disabled','disabled');

  $("#form_users").attr('autocomplete','off');
});



  function enviar_datos()
{

  $('#form_users').submit(function(e){
 
  
  e.preventDefault(); //(boton guardar sin parametro 
  $.ajax({
      url: '../bd/usuarios_consultas.php',
      type: 'POST',
      data: $("#form_users").serialize(),
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
$("#subir").attr('disabled','disabled');
ajaxTablaUsuarios();
 break;
default:
lanzador_alerta(2,resp); 
break;

}






$("#transaccion").val(0);
$("#id_transaccion").val(0);
});
    



});

 

}


$("#cancelar").click(function(){

$("#subir").removeAttr("disabled");

});

</script>



</body>

</html>
