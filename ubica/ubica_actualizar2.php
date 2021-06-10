<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$id=$_POST['id'];
	$nom=$_POST['nombre'];
	$direc=$_POST['direccion'];
	$lati=$_POST['lat'];
	$long=$_POST['lng'];
	$pais=$_POST['pais'];
	$pais=$_POST['pais'];
	$ciudad=$_POST['Ciudad'];

    $mysql = new mysqli("localhost", "root", "", "pw_gymregisterv2");
    //$mysql = new mysqli("localhost:3306", "promay20_gymregisteruser", "gymregister#18", "promay20_pwgymregister");	
    mysqli_query($mysql, "UPDATE ubicaciones set nombre_gym='$nom', direccion='$direc', latitud='$lati', longitud='$long', pais='$pais', ciudad='$ciudad' where id='$id' ") or die ("Error al actualizar");
    echo ("Se actualizaron los datos")
    ?>
    <DIV id="Barra" ALIGN="center"> <a href="../index.php">Regresar</a> </DIV>

</body>
</html>