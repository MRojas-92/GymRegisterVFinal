<!DOCTYPE html>
<html>
<head>
	<title>Modificar datos</title>
</head>
<body>
	<form action="ubica_actualizar.php" target="" method="post">
            <TABLE BORDER="1" ALIGN="CENTER">
                <TR>
                    <TD><strong>Id</strong> </TD>
                    <td><input type=text size=40 name="id"></td>
                </TR>
               
                <TR>
                    <TD><strong>Nombre</strong> </TD>
                    <td><input type=text size=40 name="nombre"></td>
                </TR>
                <TR>
                    <TD><strong>Direccion</strong> </TD>
                    <td><input type=text size=40 name="direccion"></td>
                </TR>
                <TR>
                    <TD><strong>Latitud</strong> </TD>
                    <td><input type=text size=40 name="lat"></td>
                </TR>
                <TR>
                    <TD><strong>Longitud</strong> </TD>
                    <td><input type=text size=40 name="lng"></td>
                </TR>
                <TR>
                    <TD><strong>Pais</strong> </TD>
                    <td><input type=text size=40 name="pais"></td>
                </TR>
                <TR>
                    <TD><strong>Ciudad</strong> </TD>
                    <td><input type=tex-t size=40 name="Ciudad"></td>
                </TR>
                
                
                
            </TABLE>
            <BR>
                <BR>
            <center> <input type=submit value="Actualizar BD" name="actualizar" ></center>
            
            
        </form>
        <DIV id="Barra" ALIGN="rigth"> <a href="../ubica_principal.php">Regresar</a> </DIV>


</body>
</html>