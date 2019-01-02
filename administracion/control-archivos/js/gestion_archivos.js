function ajaxTablaArachivos(pantalla_origen)
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
   
   document.getElementById("archivos_subidos").innerHTML=conexion.responseText;
     $("#tabla_archivos").dataTable();
   }
   }
  conexion.open("GET","../bd/tabla-archivos-subidos.php?pantalla="+pantalla_origen,true);
    conexion.send();

  

 
}



function dar_de_baja(id_eliminar){

 $("#id_transaccion").val(id_eliminar); 
$("#transaccion").val(1);
 eliminar_fila(id_eliminar);
 validar_envio();


}



function validar_envio(){
var transaccion= $("#transaccion").val();
//alert("VALIDA ENVIO "+transaccion);
switch (transaccion)
{
case '0' :

var pantalla=$("#pantalla").val();
if(pantalla>0)
{

if (pantalla==2) {
if($("#ubicacion_inscripciones").val()!=0){
   $("#subir").trigger('click'); 
}
else{
lanzador_alerta(3,"Debe selecciona ubicacion ");

  
}


}else{
  if(pantalla==5){

   if($("#ubicacion_inicio").val()!=0){
   $("#subir").trigger('click'); 
   //alert("trigger EJECUTADO");
}
else{
lanzador_alerta(3,"Debe selecciona ubicacion para Inicio");

  
} 
  }
else{
  $("#subir").trigger('click');

}
}
}
else
lanzador_alerta(3,"Debe seleccionar pantalla desitno");

//$("#cancelar").trigger('click');
//alert("sin required");
break;

case '1' : 
$("#pantalla").removeAttr('required');
$("#archivo").removeAttr('required');

$("#subir").trigger('click');

$("#pantalla").attr('required',true);
$("#archivo").attr('required',true);

break;


}

}


function eliminar_fila(id){
var contenido_filtro;
contenido_filtro=$("#filtrar").val();
$("#filtrar").val(" ");

 var fila=document.getElementById("archivos_subidos");
fila.removeChild(document.getElementById(id));
ajaxTablaArachivos(1);
ajaxTablaArachivos(0);


$("#filtrar").val(contenido_filtro);

}
      //funciona con warning, success, danger e info
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
        case 3: 
 $(document).trigger("add-alerts", [
        {
          "message": " "+mensaje,
          "priority": 'warning'
        }
      ]);
        break;
      }
  
    
      }


function cargar_ubicaciones(pantalla)
{
  
switch(pantalla){
 case '2':
 $("#area_ubicacion").attr("style","display:block");
 $("#area_ubicacion_inicio").attr("style","display:none");
 $("#ub_graduaciones").attr('style','display:none');
 $("#ub_formatos").attr('style','display:none');
 break;

 case '5':

  $("#area_ubicacion_inicio").attr("style","display:block");
  $("#area_ubicacion").attr("style","display:none");
  $("#ub_graduaciones").attr('style','display:none');
  $("#ub_formatos").attr('style','display:none');

 break;
default: 
  $("#ub_formatos").attr('style','display:none');
  $("#area_ubicacion").attr("style","display:none");
  $("#ub_graduacion").attr('style','display:none');
  $("#ub_formatos").val('TRAMITES');
  $("#ub_tramites").val('ARCHIVOS');
  $("#ub_graduaciones").val("DESCARGAS");
  $("#area_ubicacion_inicio").attr("style","display:none");

break;

}




  





}

function validar_tipo_archivo_solo_imagenes(opc) { 
//alert("SELECCIONADO"+opc);
if(opc==1)
$("#archivo").attr('accept','image/*');
 else
  $("#archivo").removeAttr('accept');
 
}