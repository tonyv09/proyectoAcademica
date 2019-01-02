<?php 
session_start();
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['clave_acceso'])&& isset($_SESSION['insertada']) && $_SESSION['clave_acceso']==$_SESSION['insertada'])
{?>

<html>
<head>
<meta http-equiv="refresh" content="0; url=vistas/gestion-usuarios.php">
</head>
<body>
</body>
</html>

<?php }
else {
	echo "USUARIO NO AUTORIZADO";
die();
 } 

 ?>

