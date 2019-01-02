function ajaxTablaEnlaces(periodo)
{

   var conexion;
 
//alert("pantalla origen"+pantalla_origen);
  
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
   
   document.getElementById("tabla_enlaces").innerHTML=conexion.responseText;
   
     $("#tabla_enlaces_cabecera").dataTable();
   }
   }
  conexion.open("GET","../bd/tabla_enlaces.php",true);
    conexion.send();

  

 
}


function dar_de_baja(idenlace,enlace,nombre_sitio)
{
 // alert("DAR DE BAJA");
   $("#transaccion").val(2);
   $("#estado").val(1);
  $("#id_transaccion").val(idenlace);
    $("#enlace").val(enlace);
  $("#nombre_sitio").val(nombre_sitio);
  $("#subir").trigger('click');
 $("#cancelar").trigger('click');

}

function dar_de_alta(idenlace,enlace,nombre_sitio){

     $("#transaccion").val(2);
  $("#estado").val(0);
    $("#id_transaccion").val(idenlace);
    $("#enlace").val(enlace);
  $("#nombre_sitio").val(nombre_sitio);
   $("#estado").val(0);
  $("#subir").trigger('click');
  $("#cancelar").trigger('click');



}
function validar_form(){
 if(valida_pantallas())
 {
$("#subir").trigger('click');
// alert("correcto");
 }
else{

  lanzador_alerta(2,"Seleccione pantalla destino");
}

}

function modificar(idmodificar,enlace,nombre_sitio,destino)
{

  
var array=destino.split(",");
  var i=0;
for(i=0;i<array.length;i++)
{

$("#"+array[i]).attr('checked',true);

}

 $("#transaccion").val(1);
  $("#id_transaccion").val(idmodificar);
  $("#nombre_sitio").val(nombre_sitio);
  $("#enlace").val(enlace);
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
      function valida_pantallas(){
   
      var pantallas =['ENLACES','INSCRIPCIONES','FORMATOS','GRADUACIONES'];
      var retorno=false;
for (var i =0; i<pantallas.length ; i++) {
  retorno=(retorno || $("#"+pantallas[i]).prop('checked'));
}
  
  
      return  retorno;
      }
      function limpiar_checkbox(){

 $("#ENLACES").removeAttr ('checked');
$("#INSCRIPCIONES").removeAttr ('checked');
$("#FORMATOS").removeAttr ('checked');
$("#GRADUACIONES").removeAttr ('checked');
 $("#cancelar").trigger('click');


      }