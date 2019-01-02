
<?php 
date_default_timezone_set('America/El_Salvador');
//session_start();
$conexion=pg_connect("host=localhost port=5432 dbname=academicauesfmp user='postgres' password='serverpostgres' ")or die('2 Error en busqueda '.pg_last_error());
$accion="INICIO DESESION";
$user='postgres';
$fecha=date('Y-m-d H:i:s');
pg_query($conexion,"INSERT INTO schema_academica.bitacora (usuario,accion,fecha) VALUES(current_user,'$accion','$fecha')")or die('2 Error en insersion '.pg_last_error());


?>