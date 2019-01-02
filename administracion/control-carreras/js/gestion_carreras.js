function ajaxTablaCarreras()
{

   var conexion;

  
  if(window.XMLHttpRequest)
  {
    conexion= new XMLHttpRequest();
  
  }
  else
  {
     conexion= new ActiveXObjet("Microsoft.XMLHTTP");
    
  }
  conexion.onreadystatechange=function()
  {

 if(conexion.readyState==4 && conexion.status==200)
   {
   
   document.getElementById("tabla_carreras").innerHTML=conexion.responseText;
     
      $("#tabla_carreras_cabecera").dataTable();
   }
   }
  conexion.open("GET","../bd/tabla_carreras.php",true);
    conexion.send();

  

 
}

function dar_de_baja(codigo_carrera,nombre_carrera,ciclos)
{
 // alert("DAR DE BAJA");
   $("#transaccion").val(2);
  $("#id_transaccion").val(codigo_carrera);
  $("#nombre_carrera").val(nombre_carrera);
  $("#codigo_carrera").val(codigo_carrera);
   $("#estado").val(0);
  $("#ciclos").val(ciclos);
  $("#subir").trigger('click');
    $("#cancelar").trigger('click');

}

function reActivar(codigo_carrera,nombre_carrera,ciclos)
{
 // alert("DAR DE BAJA");
   $("#transaccion").val(2);
  $("#id_transaccion").val(codigo_carrera);
  $("#estado").val(1);
  $("#nombre_carrera").val(nombre_carrera);
  $("#codigo_carrera").val(codigo_carrera);
  $("#ciclos").val(ciclos);
  $("#subir").trigger('click');
  $("#cancelar").trigger('click');


}


function modificar(codigo_carrera,nombre_carrera,ciclos,estado)
{
//alert("MODIFICAR estado "+estado);
  

  $("#transaccion").val(1);
  $("#id_transaccion").val(codigo_carrera);
  $("#nombre_carrera").val(nombre_carrera);
  $("#codigo_carrera").val(codigo_carrera);
  $("#ciclos").val(ciclos);
  $("#estado").val(estado);
 
  $("html, body").animate({
    scrollTop:10
}, 290);

}

      function lanzador_alerta(alerta, mensaje){
     // alert(alerta+" "+mensaje)
      switch(alerta){

        case 1: 
    $(document).trigger("add-alerts", [
        {
          "message": " "+mensaje,
          "priority": 'info'
        }
      ]);

        break;
        case 2: 
 $(document).trigger("add-alerts", [
        {
          "message": " "+mensaje,
          "priority": 'error'
        }
      ]);

        break;
      }
  
    
      }