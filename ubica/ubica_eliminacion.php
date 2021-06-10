<!DOCTYPE html>
<html>
<head>
	<title>Eliminacion</title>
</head>
<body>
	<?php 
		$nom=$_GET['Nombre'];
		$mysql = new mysqli("localhost", "root", "", "mapa_omid");
		$Query = "delete from google_maps_php_mysql where nombre='".$nom."'";
		$Result = $mysql->query( $Query );

		if($Result!=null)
			print("Se elimino con éxito el registro.");

		else
			print("No se pudo eliminar");
	?>
<DIV id="Barra" ALIGN="rigth"> <a href="../ubica_principal.php">Regresar</a> </DIV>
</body>
</html>