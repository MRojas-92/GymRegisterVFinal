<!DOCTYPE html>
<html>
<head>
	<title>Insertar Gym</title>
</head>
<body>

<?php 
$oMysql = new mysqli("localhost", "root", "", "mapa_omid");
$Query= "INSERT INTO google_maps_php_mysql VALUES ('".$_POST["id"]."','".$_POST["nombre"]."','".$_POST["direccion"]."','".$_POST["lat"]."',
										'".$_POST["lng"]."','".$_POST["pais"]."','".$_POST["Ciudad"]."')";
        	
$Result = $oMysql->query( $Query );
if($Result!=null)
   	print("Se agrego");

else
  	print("No se pudo agregar");

	?>
<DIV id="Barra" ALIGN="center"> <a href="../index.php">Regresar</a> </DIV>



	 

</body>
</html>