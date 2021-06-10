<!DOCTYPE html>
<html>
<head>
	<title>Eliminar una ubicación</title>
</head>
<body>
	<?php 
$mysql = new mysqli("localhost", "root", "", "pw_gymregisterv2");
$Query = "SELECT * from ubicaciones";
$Result = $mysql->query( $Query );
	 $numeroRegistros=$Result->num_rows;   
	 if($numeroRegistros<=0) 
   { 
     echo "<div align='center'>"; 
     echo "<h2>No se encontraron registros</h2>"; 
     echo "</div><hr> "; 
   }else{
   ?>
       <table border=1>
        <tr>
        <td><strong> Id</strong></td>	
		<td><strong> Nombre</strong></td>
		<td><strong> Direccion</strong></td>
		<td><strong> Latitud</strong></td>
		<td><strong> Longitud</strong></td>
		<td><strong> Pais</strong></td>
		<td><strong> Ciudad</strong></td>

		</tr>
		<?php
        while($row =$Result->fetch_array()) {	  
		$nom=$row["nombre_gym"];
           ?>
		   <tr>
				<td> <?php printf($row["id_ubicacion"]); ?>   </td>
				<td> <a href="eliminacion.php ? Nombre=<?php print($nom); ?>"> <?php print($nom); ?> </a>  </td>		  
				<td> <?php printf($row["direccion"]); ?>   </td>
				<td> <?php printf($row["latitud"]); ?>   </td>
				<td> <?php printf($row["longitud"]); ?>   </td>
				<td> <?php printf($row["pais"]); ?>   </td>
				<td> <?php printf($row["ciudad"]); ?>   </td>
           </tr>
<?php	}
}
?>
</table>
<br>Para eliminar una ubicacion de clic en el nombre del gimnasio</br>
<DIV id="Barra" ALIGN="rigth"> <a href="../ubica_principal.php">Regresar</a> </DIV>
</body>
</html>