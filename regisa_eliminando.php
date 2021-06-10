<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrar Amigos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_regisam.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>
    <?php
        require 'header.php'
    ?>

    <section class="buscar">
        <img src="img/advertencia.png" alt="R Amigos" width="100px" height="100px">
		<h3>¿Estas seguro que deseas eliminar a <?php echo $_GET['Nombre'] ?>?</h3>
		<form method="POST" action="">
			<div class="espacio-super">
				<input class="cancelar" type="submit" name="eliminar" value="Eliminar" style="cursor: pointer;">
			</div>			
		</form>
		<form action="regisa_principal.php">
			<input class="cancelar" type="submit" name="cancelar" value="Cancelar" style="cursor: pointer;">
		</form>
	</section>


    <?php 
        if(isset($_POST['eliminar'])){   // Llamada a la funcion de agregar...
            $nom=$_GET['Nombre'];            
            $id = $_SESSION["datos"][0][0];
            $mysql = new mysqli("localhost", "root", "", "pw_gymregisterv2");
            $Query = "DELETE FROM amigos WHERE nombre_usuario='".$nom."'
                    AND '".$id."'";
            $Result = $mysql->query( $Query );
    
            if($Result!=null)
                echo '<script language = javascript>
                alert("¡Amigo eliminado con exito! :D");
                window.location.href="regisa_principal.php";
                </script>';
    
            else
                echo '<script language = javascript>
                alert("¡Ups! Algo salio mal... intentalo mas tarde");
                window.location.href="regisa_principal.php";
                </script>';
        }     		
	?>

    <?php
        require 'footer.php'
    ?>
</body>
</html>