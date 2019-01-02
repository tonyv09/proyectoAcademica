<?php 
session_start();
if($_SESSION['usuario']==null || $_SESSION['usuario']=='')
{
echo "USUARIO NO AUTORIZADO";
die();

}
else {
?>
<html>
<head>
<meta http-equiv="refresh" content="0; url=vistas/control-fechas-graduaciones.php">
</head>
<body>
</body>
</html>
<?php } ?>