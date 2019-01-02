function ajaxTablaFechas(periodo)
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
   
   document.getElementById("eventos_graduacion").innerHTML=conexion.responseText;
    $("#tabla_eventos").dataTable();
   }
   }
  conexion.open("GET","../bd/tabla-eventos-graduaciones.php?periodo="+periodo,true);
    conexion.send();

  

 
}

function validar_formulario(fecha_evento)
{

//alert("fecha elegida "+fecha_evento);descripcionevento
var descripcion= document.getElementById('descripcionevento').value;
var retorno=comparar_fecha(fecha_evento);
//alert("retorno"+retorno);
switch(retorno)
{
  case 0:

lanzador_alerta(2,"fecha de evento no puede ser IGUAL que fecha actual" );
  $('#fecha').val("");
break;
case 1:
  //alert("FECHA VALIDA");
break;
case 2:

  lanzador_alerta(2,"fecha de evento no puede ser MENOR que fecha actual");
$('#fecha').val("");
break;
}

}


 function comparar_fecha(fecha_evento){
//codigo para modificar funcion procese las fechas y no se deba hacer desde la llamada
//var fecha1=date1.split('-');
 fecha_evento=fecha_evento.split('-');

var fecha_actual= new Date();


//              fecha2      fecha1
//alert("fecha evento"+fecha_evento+" fecha actual "+fecha_actual.getDate()+"-"+(fecha_actual.getMonth()+1)+"-"+fecha_actual.getFullYear());
var dia =fecha_evento[2]-fecha_actual.getDate();
var mes= fecha_evento[1]-(fecha_actual.getMonth()+1);
var anho=fecha_evento[0]-fecha_actual.getFullYear();
//alert("fecha: "+dia+"-"+mes+"-"+anho);
if(anho==0)
{
if(mes==0)
{
if(dia==0)
  return 0;//fechas son iguales
else
{
  if(dia>0)
    return 1; //fecha2 es mayor q fecha uno 
else
  return 2; //fecha1 es mayor q fecha dos

} 

}//mes
else
{
if(mes>0)
 return 1;//fecha2 mayor q fecha uno
else
  return 2;//fecha1 es mayor q fehca 2

}


}//fin anho
else
{
if(anho>0)
 return 1;//fecha2 mayor q fecha uno
else
  return 2;//fecha1 es mayor q fehca 2


}

    
    

}

function dar_de_baja(id,fecha,descripcion)
{
  //alert("DAR DE BAJA");
   $("#transaccion").val(2);
  $("#id_transaccion").val(id);
    $("#fecha").val(fecha);
  $("#descripcionevento").val(descripcion);
  $("#subir").trigger('click');
    $("#fecha").val(' ');
  $("#descripcionevento").val(' ');
}

function modificar(idmodificar,fecha,descripcion)
{
 //alert("MODIFICAR");
  

  $("#transaccion").val(1);
  $("#id_transaccion").val(idmodificar);
  $("#fecha").val(fecha);
  $("#descripcionevento").val(descripcion);
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