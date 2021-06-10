<!DOCTYPE html>
<html>
<head>
	<title>Nuevos datos</title>
</head>
<body>
<?php  require ("buscar.php"); ?>
<form action="modificar.php" target="" method="POST">
    <input style="display:none;" type=text size=40 name="NombreBuscar" value="<?php echo $nombreBuscar;?>">
    <TABLE BORDER="1" ALIGN="CENTER">
    <TR>
        <TD><strong>Nombre</strong> </TD>
		<TD><input  type=text size=40 name="NombreNuevo" value="<?php echo $nombreBuscar;?>"> </TD>
    </TR>
    <TR>
        <TD><strong>Direccion</strong> </TD>
        <td><input type=text size=40 name="direccion" value="<?php echo $direccion;?>"></td>
    </TR>
    <TR>
        <TD><strong>Latitud</strong> </TD>
        <td><input type=text size=40 name="lat" value="<?php echo $lati;?>"></td>
    </TR>
    <TR>
        <TD><strong>Longitud</strong> </TD>
        <td><input type=text size=40 name="lng" value="<?php echo $long;?>"></td>
    </TR>
    <TR>
        <TD><strong>Pais</strong> </TD>
        <td><input type=text size=40 name="pais" value="<?php echo $pais;?>"></td>
    </TR>
    <TR>
        <TD><strong>Ciudad</strong> </TD>
        <td><input type=tex-t size=40 name="Ciudad" value="<?php echo $ciudad;?>"></td>
    </TR>
    </TABLE>
    <BR>   <BR>
    <center> <input type=submit value="Modificar BD" ></center>                       
</form>
<DIV id="Barra" ALIGN="rigth"> <a href="actualizar.php">Regresar</a> </DIV>
</body>
</html>