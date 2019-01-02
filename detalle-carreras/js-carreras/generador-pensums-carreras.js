
function ajax_mostrar_pensum(carrera,codigo_color_primario,codigo_color_secundario,elemento)
{
 
 document.getElementById("tabla_pensum").style.display="block";
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
   
   document.getElementById("fila_principal").innerHTML=conexion.responseText;
    elemento.modal('hide');
   }
   }
  conexion.open("GET","tabla_pensum.php?codigo_carrera="+carrera+"&codigo_color_primario="+codigo_color_primario+"&codigo_color_secundario="+codigo_color_secundario,true);
    conexion.send();

  

 
}

function ocultarX(id_ocultar,id_mostrar){


$("#"+id_ocultar).css('display','none');
$("#"+id_mostrar).css('display','block');



}


function educacion_ocultar(id_mostrar,m2,m3,m4,m5,m6,m7){
         
$("#"+m2).css('display','none');
$("#"+m3).css('display','none');
$("#"+m4).css('display','none');
$("#"+m5).css('display','none');
$("#"+m6).css('display','none');
$("#"+m7).css('display','none');
$("#"+id_mostrar).css('display','block');



}


function ocultar_Agro(area){

 switch(area){
  case '1': 
 document.getElementById('area_iframe_agronomia').style.display='block';
 document.getElementById('area_iframe_agroindustria').style.display='none';
 
  break;
  case '2':
 document.getElementById('area_iframe_agronomia').style.display='none';
 document.getElementById('area_iframe_agroindustria').style.display='block';
 
   break;
 }

}


function ocultar(area){
 
 switch(area){
  case '1': 
 document.getElementById('area_iframe_administracion_financiera').style.display='block';
 document.getElementById('area_iframe_desarrollo_local').style.display='none';
 
  break;
  case '2':
 document.getElementById('area_iframe_administracion_financiera').style.display='none';
 document.getElementById('area_iframe_desarrollo_local').style.display='block';
 
   break;
 }


}

 function insertar_iframe(carrera){
 $('#ModalLoading').modal('show');
var archivo_generador,id_campo;
//alert("carrera iframe  :"+carrera);
switch(carrera){
  /*AGREGAR LOS PROFESORADOS */
  case 'MAF2018': 
//contenido_iframe_maestria_administracion_financiera.php
 archivo_generador="generadores_tabla/contenido_iframe_maestria_administracion_financiera.php";
  var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
   elemento.attr('id','iframe_administracion_financiera')
  $("#area_iframe_admin_financiera_col").append(elemento);//agregar interactivo con variable
 $("#iframe_administracion_financiera").focus();
$("#mostrar_finanzas").attr('disabled','disabled');
 // $("#foco").focus();
 $("html, body").animate({
    scrollTop: 3000
}, 290);

  break;
  
  case 'DLS2018': 

 archivo_generador="generadores_tabla/contenido_iframe_maestria_desarrollo_local.php";
  var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
   elemento.attr('id','iframe_desarrollo_local')
  $("#area_iframe_desarrollolcl_col").append(elemento);//agregar interactivo con variable
//$("#iframe_desarrollo_local").focus();
$("#mostrar_dls").attr('disabled','disabled');
 // $("#foco").focus();
 $("html, body").animate({
    scrollTop: 3000
}, 290);



  break;
  
  case'I10304': 
  //document.getElementById("area_iframe_agronomia").style.display='block';
 archivo_generador="generadores_tabla/contenido_iframe_agronomia.php";
  var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1300px');
   elemento.attr('height','400px');
   elemento.attr('id','iframe_agronomia')
  $("#area_iframe_agronomia_col").append(elemento);//agregar interactivo con variable
 $("#iframe_agronomia").focus();
$("#mostrar_agro").attr('disabled','disabled');
 // $("#foco").focus();
 $("html, body").animate({
    scrollTop: 3000
}, 290);
  break;
  case 'I10305':
 archivo_generador="generadores_tabla/contenido_iframe_agroIndustria.php";
 
   var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1300px');
   elemento.attr('height','400px');
  $("#area_iframe_agroindustria_col").append(elemento);//agregar interactivo con variable
  $("#mostrar_agroindustria").attr('disabled','disabled');
   $("html, body").animate({
    scrollTop: 3000
}, 290);
  break;
  case 'I10515':
 archivo_generador="generadores_tabla/contenido_iframe_sistemas_informaticos.php";

 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_sistemas_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_informatica").attr('disabled','disabled');     
$('#ModalLoading').modal('hide');
         $("html, body").animate({
    scrollTop: 3000
}, 290);

  break;

  case 'L70803' :
archivo_generador="generadores_tabla/contenido_iframe_administracion.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_administracion_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_administracion").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);
   break;
   case 'L70802':
//contaduria publica
archivo_generador="generadores_tabla/contenido_iframe_contaduria.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_contaduria_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_contaduria").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);
   break;

   case 'L10439':// trabajo social
archivo_generador="generadores_tabla/contenido_iframe_trabajo_social.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_trabajo_social_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_trabajo_social").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);


    break;
   case 'P10402'://BASICA

   archivo_generador="generadores_tabla/contenido_iframe_basica.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_basica_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_basica").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);

    break;
   case 'P70921':// cienas naturales B y M pendiente!
    break;
   case 'P70923'://matematica B y M 
      archivo_generador="generadores_tabla/contenido_iframe_matematica.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_matematica_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_matematica").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);
   break;
   case 'parv1': //parvularia
       archivo_generador="generadores_tabla/contenido_iframe_parvularia.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_parvularia_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_parvularia").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);

    break;
    case 'bio1': //biologia
     archivo_generador="generadores_tabla/contenido_iframe_biologia.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_biologia_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_biologia").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);
    break;
    case 'P10430':  //ingles
       archivo_generador="generadores_tabla/contenido_iframe_ingles.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_ingles_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_ingles").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);
    break;
    case 'prof1': //profesionalizacion
       archivo_generador="generadores_tabla/contenido_iframe_profesionalizacion.php";
 var elemento= $("<iframe>");
   elemento.attr('src',archivo_generador);
   elemento.attr('width','1200px');
   elemento.attr('height','500px');
  $("#area_iframe_profesionalizacion_col").append(elemento);//agregar interactivo con variable
   $("#mostrar_profesionalizacion").attr('disabled','disabled');     

         $("html, body").animate({
    scrollTop: 3000
}, 290);

    break;

}$('#ModalLoading').modal('hide')
console.log('salida generador de pensum');


 }



 function seleccion_elemento(id,prerequisito){

var elemento_anterior=$("#seleccion_anterior");
 var aux,i=0;
 var n_materias;

aux=elemento_anterior.val();
auxp=document.getElementById("prerequisitos_anterior");


//despintar prerequisitos anteriores
//alert("aux "+aux.length+" auxp "+prerequisito);
if(aux.length>0 || (prerequisito.localeCompare("Bachillerato")!=0 &&auxp.value.length>0 ))
  {
    $("#"+aux).css('border-color','white');
    if (auxp.value.length>0) {
      i=0;
      n_materias= n_materias=auxp.value.split(",");

        while(i<n_materias.length){
    
 //$("#"+n_materias[i]).css('border-style','solid');
 $("#"+n_materias[i]).css('border-color','white');
 //$("#prerquisitos_anterior").val(auxp.value+','+n_materias[i]);
  i++;
  }
    }
 
 }
  $("#"+id).css('border-style','solid');//marcar materia seleccionada
 $("#"+id).css('border-color','RED');


$("#seleccion_anterior").val(id); 
$("#prerequisitos_anterior").val(prerequisito);
// alert("EAF "+elemento_anterior.val().length);
//alert("res"+prerequisito.localeCompare("Bachillerato"));



if(prerequisito.localeCompare("Bachillerato")!=0){  //MARCAR PRE REQUISITOS
  //alert("entro a if para pre");
  n_materias=prerequisito.split(",");
  
i=0;
  while(i<n_materias.length){
    
 $("#"+n_materias[i]).css('border-style','solid');
 $("#"+n_materias[i]).css('border-color','BLUE');
 //$("#prerquisitos_anterior").val(auxp.value+','+n_materias[i]);
  i++;
  }
  


}



 }//FIN FUNCION