function ajaxTablaUsuarios()
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
   
   document.getElementById("tabla_usuarios").innerHTML=conexion.responseText;
   }
   }
  conexion.open("GET","../bd/tabla_usuarios.php",true);
    conexion.send();

  

 
}

function lanzador_alerta(alerta, mensaje){
     
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

function dar_de_baja(id,usuario,pass,nombre_completo,categoria)
{
 // alert("DAR DE BAJA");

 $("html, body").animate({
    scrollTop: 10
}, 290);
   $("#transaccion").val(2);
  $("#id_transaccion").val(id);
  $("#nombre_usuario").val(usuario);
  $("#pass").val(pass);
  $("#nombre_completo").val(nombre_completo);
  $("#tipo_usuario").val(categoria);
 $("#subir").trigger('click');
  $("#cancelar").trigger('click');


}

function modificar(id,usuario,pass,nombre_completo,categoria)
{
 //alert("MODIFICAR");
  
 $("html, body").animate({
    scrollTop: 10
}, 290);

  $("#id_transaccion").val(id);
   $("#transaccion").val(1);
  $("#id_transaccion").val(id);
  $("#nombre_usuario").val(usuario);
  $("#pass").val(pass);
  $("#nombre_completo").val(nombre_completo);
  $("#tipo_usuario").val(categoria);
   //$("#subir").trigger('click');
  //$("#cancelar").trigger('click');
}

function minusculas(id,valor)
{

$('#'+id).val(valor.toLowerCase());
}