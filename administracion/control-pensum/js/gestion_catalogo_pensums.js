function ajaxTablaPensums(codigo_carrera)
{

//alert("codigo "+codigo_carrera);
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
   
   document.getElementById("tabla_materias_ed_el").innerHTML=conexion.responseText;
   
   }
   }
  conexion.open("GET","../bd/tabla_mod_del_materias.php?codigo_carrera="+codigo_carrera,true);
    conexion.send();

  

 
}

function validar_form1(){
 // $().alert();
$("#subir").removeAttr('disabled');
var select_carrera=$("#select_carrera").val();
var codigo_materia=$("#codigo_materia").val();
var nombre_materia=$("#nombre_materia").val();
var UV=$("#unidades_valorativas").val();
var PR=$("#pre_requisitos").val();
var ciclo=$("#ciclos").val();
var bandera_select=select_carrera.substring(0,1);
var vboolean;
 vboolean=(select_carrera.length>0)&&(codigo_materia.length>3)&&(nombre_materia.length>3)&&(PR.length>3)&&(ciclo.length>0)&& UV.length>0&& ciclo.length>0 ;

//alert(bandera_select.localeCompare('P'));

if(vboolean){

if (bandera_select.localeCompare('P')==0) {
  realizar_envio();
  //alert("si es profesorado  envia");
}
else {
  if(UV.localeCompare('0')==0||ciclo.localeCompare('0')==0){
trigger_alertas(2,"unidades_valorativas o ciclos Erroneos!"); }
  else {
    realizar_envio();
  //alert("no es profesorado envia")
  }
}
//alert("eS PROFRESORADO"+bandera_select.localeCompare('P'));

}
else
trigger_alertas(2,"Datos incompletos corrigalos!");

}

function agregarMaterias()
{

var codigo_materia,nombre_materia,unidades_valorativas,pre_requisitos,ciclos,aux;
var fila_registro;
$("#mensaje").attr('style','display:block');
$(".alert").alert('open');
codigo_materia=$("#codigo_materia").val();
nombre_materia=$("#nombre_materia").val();
unidades_valorativas=$("#unidades_valorativas").val();
pre_requisitos=$("#pre_requisitos").val();
ciclos=$("#ciclos").val();



fila_registro=$("#matriz_datos");
fila_registro.val(fila_registro.val().concat("-"+codigo_materia+"-"+nombre_materia+"-"+unidades_valorativas+"-"+pre_requisitos+"-"+ciclos));

aux = fila_registro.val();
fila_registro.val(aux.concat("_"));


}


function realizar_envio()
{
$("#enviar").trigger('click');

}

function modificar(codigo_carrera,codigo_materia,nombre_materia,UV,pre_requisito,ciclos){

//alert(codigo_carrera);

$("#vista_catalogo").attr('style','display:none');
$("#form_select_carreras").attr('style','display:block');
$('#form_pensum1').attr('style','display:block');
$("#codigo_materia").val(codigo_materia);
$("#id_transaccion").val(codigo_materia);
$("#nombre_materia").val(nombre_materia);
$("#unidades_valorativas").val(UV);
$("#pre_requisitos").val(pre_requisito);
$("#ciclos").val(ciclos);
$("#codigo_carrera").val(codigo_carrera);
//$('select option[value="0"]').removeAttr("selected");
//$('select option[value="'+codigo_carrera+'"]').attr('selected',true);
 $("#select_carrera").val($("#select_carrera_filtro").val());
 $("html, body").animate({
    scrollTop: 3000
}, 290);

}


function mostar(){

$("canelar_real").trigger('click');
$("#vista_catalogo").attr('style','display:block');
$("#form_select_carreras").attr('style','display:none');
$('#form_pensum1').attr('style','display:none');

}

function trigger_alertas(tipo_alerta,mensaje)
{

switch(tipo_alerta)
{

  case 0:
//Exito
    $(document).trigger("add-alerts", [
        {
          "message": ""+mensaje,
          "priority": 'info'
        }
        
      ]);
  break;
  case 1:
//Advertencia
    $(document).trigger("add-alerts", [
        {
          "message": ""+mensaje,
          "priority": 'warning'
        }
        
      ]);

  break;
  case 2:
//Error!
    $(document).trigger("add-alerts", [
        {
          "message": ""+mensaje,
          "priority": 'error'
        }
        
      ]);
  break;

}

}

function agregar_carrera_form(codigo_carrera){

$("#codigo_carrera").val(codigo_carrera);
}



function dar_de_baja(codigo_carrera,codigo_materia,nombre_materia,UV,pre_requisito,ciclos){



$("#codigo_materia").val(codigo_materia);
$("#id_transaccion").val(codigo_materia);
$("#nombre_materia").val(nombre_materia);
$("#unidades_valorativas").val(UV);
$("#pre_requisitos").val(pre_requisito);
$("#ciclos").val(ciclos);
$("#codigo_carrera").val(codigo_carrera);
$("#transaccion").val(2);
$("#cambio_estado").val(0);
realizar_envio();
}

function mayusculas(id,valor)
{

$('#'+id).val(valor.toUpperCase());
}