<?php 
session_start();
date_default_timezone_set('America/El_Salvador');
$usuario=trim($_SESSION['usuario']);
$pass=trim($_SESSION['clave_acceso']); 

try{

        $clave =trim($pass); 
  //conexion en mismo servidor
  //$conexion= pg_connect("host=localhost port=5432 dbname=tonyvent_academicafmp user='$usuario' password='$clave'") or die('No se ha podido conectar: ' . pg_last_error()) ;

    //conexion servidor  remoto
   $conexion= pg_connect("host=ec2-54-235-193-0.compute-1.amazonaws.com port=5432 dbname=d1149o9em321a1 user='$usuario' password='$clave'") or die('No se ha podido conectar: ' . pg_last_error()) ;


   }catch (Exception $e) {
    print "¡Error CONECCION!: ". $e->getMessage()."<br/>";

    
}
 
?>