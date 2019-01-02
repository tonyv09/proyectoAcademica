
//generar querys para mostrar pensum 
function carrera(codigo){

$("#id_carrera").val(codigo);
//alert($("#id_carrera").val())
}

function validarForm()
{
	var c=0;
	
	c=parseInt($("#cor").val());
	c++;


	//alert("Incremento js cor="+c);
	$("#cor").val(c);
 ajaxMaterias();

}
function trigger_alertas(tipo_alerta)
{

switch(tipo_alerta)
{

	case 0:
//Exito
    $(document).trigger("add-alerts", [
        {
          "message": "Registro insertado!",
          "priority": 'info'
        }
        
      ]);
	break;
	case 1:
//Advertencia
    $(document).trigger("add-alerts", [
        {
          "message": "Esta seguro que desea realizar esta accion?.",
          "priority": 'warning'
        }
        
      ]);

	break;
	case 2:
//Error!
    $(document).trigger("add-alerts", [
        {
          "message": "Datos erroneos! \n debe corregirlos.",
          "priority": 'error'
        }
        
      ]);
	break;

}

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

function eliminar_fila(id)
{
//eliminacion de fila y borrado del textarea de esa fila
var elemento_matriz,matriz,arreglo_matriz;
elemento_matriz=document.getElementById("matriz_datos");
matriz=elemento_matriz.value;
var total=document.getElementById("total_compra");
arreglo_matriz=matriz.split("_");
elemento_matriz.value="";
var fila;

for (var i = 0; i <(arreglo_matriz.length-1) ; i++) {
           aux=arreglo_matriz[i].split("-");
           if(id!=aux[0].trim())
           {alert("aux"+aux[0]+" id"+id);

           	elemento_matriz.value=elemento_matriz.value.concat(arreglo_matriz[i]+"_");
           }else{
           	alert("cantidad"+aux[2]+"costoU"+aux[3]);
         total.value=total.value-(aux[2]*aux[3]);
           
           }         

}
fila=document.getElementById("productos_comprados");
fila.removeChild(document.getElementById(id));

	var c=0;
	
	c=parseInt($("#cor").val());
	c--;


	//alert("Incremento js cor="+c);
	$("#cor").val(c);
//alert("matriz:"+elemento_matriz.value);

}
function limpiar_form(){
	var aux=$("#matriz_datos").val();
	  $("#cancelar").trigger('click');
$("#matriz_datos").val(aux);


}
function ajaxMaterias()
{
  
var cor,codigo_materia,nombre_materia,unidades_valorativas,pre_requisitos,ciclos;

codigo_materia=$("#codigo_materia").val();
nombre_materia=$("#nombre_materia").val();
unidades_valorativas=$("#unidades_valorativas").val();
pre_requisitos=$("#pre_requisitos").val();
ciclos=$("#ciclos").val();
cor=$("#cor").val();
//alert(codigo_materia+""+nombre_materia+""+unidades_valorativas+""+pre_requisitos+""+ciclos);

 var nodoFila;
	var conexion;

agregarMaterias(); 
limpiar_form();

	
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
     	
nodoFila=document.createElement("tr");
nodoFila.setAttribute('id',codigo_materia);
nodoFila.innerHTML=conexion.responseText;
if($("#cor").val()>0)
{
var elemento_tabla=document.getElementById("tabla_materias").childNodes;
	document.getElementById("tabla_materias").insertBefore(nodoFila,elemento_tabla[0]);   
	//trigger_alertas(0);
}else
document.getElementById("tabla_materias").appendChild(nodoFila);   
  //trigger_alertas(2);
   }
   }
	conexion.open("GET","../bd/tabla_materias.php?codigoMateria="+codigo_materia+"&nombreMateria="+nombre_materia+"&unidadesValorativas="+unidades_valorativas+"&preRequisitos="+pre_requisitos+"&ciclos="+ciclos+"&cor="+cor,true);
    conexion.send();

  
}
function modificar(){

	alert("modificar");
}
function eliminar(id){
	//eliminacion de fila y borrado del textarea de esa fila
var elemento_matriz,matriz,arreglo_matriz,aux;
elemento_matriz=document.getElementById("matriz_datos");
matriz=elemento_matriz.value;

arreglo_matriz=matriz.split("_");
elemento_matriz.value="";
var fila;

for (var i = 0; i <(arreglo_matriz.length-1) ; i++) {

           aux=arreglo_matriz[i].split("-");
        
           if(id!=aux[1].trim())
           {


           	elemento_matriz.value=elemento_matriz.value.concat(arreglo_matriz[i]+"_");
           	//alert("concatenado");
           }        

}
fila=document.getElementById("tabla_materias");
fila.removeChild(document.getElementById(id));

}


function limpiar_tabla(){//reparar funcion para eliminar tabla completa

	var elementos_tabla=document.getElementById("tabla_materias") ;
	var numero_registros=elementos_tabla.childNodes.length;
	var tabla=document.getElementById("tabla_materias") ;
	var registros=document.getElementById("tabla_materias").childNodes;

	//alert("cantidad de registros: "+numero_registros);
	var i=numero_registros-2;
	for (i=numero_registros-2; i>=0; i--) {
//EN ESTE CASO INSERTE LOS ELEMENTOS AL INICIO  ASI QUE SE DEBE ELIMINAR EN ORDEN DESENDENTE NO ASCENDENTE
		tabla.removeChild(registros.item(i));

	}

}
function validar_form1(){
	$().alert();
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
	validarForm();
	//alert("si es profesorado  envia");
}
else {
	if(UV.localeCompare('0')==0||ciclo.localeCompare('0')==0){
trigger_alertas(2);	}
	else {
		validarForm();
	//alert("no es profesorado envia")
	}
}
//alert("eS PROFRESORADO"+bandera_select.localeCompare('P'));

}
else
trigger_alertas(2);

}


function mayusculas(id,valor)
{

$('#'+id).val(valor.toUpperCase());
}

