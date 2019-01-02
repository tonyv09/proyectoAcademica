<?php
 $V2= session_start();
try{
    $usuario  ="oruycxtchtmflf";
    $clave    = "5e42eaf8d4990b0b6b32fb1ae0facb8742999bc3e0eb5cdcc2b885aec710fa58"; 
    //conexion en mismo servidor
  //$conexion= pg_connect("host=localhost port=5432 dbname=tonyvent_academicafmp user='$usuario' password='$clave'") or die('No se ha podido conectar : '. pg_last_error().' '.$clave) ;
    //conexionn en servidor distinto
    $conexion= pg_connect("host=ec2-54-235-193-0.compute-1.amazonaws.com port=5432 dbname=d1149o9em321a1 user='$usuario' password='$clave'") or die('No se ha podido conectar : '. pg_last_error().' '.$clave) ;

$_SESSION['usuario_publico']=$usuario;
$_SESSION['clave_acceso_publica']=$clave;

//head("location:../administracion/principal.html")

   }catch (Exception $e) {
    print "¡Error CONECCION!: ". $e->getMessage()."<br/>";

    
}
 
?>