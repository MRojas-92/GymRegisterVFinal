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

    <?php 
        if(isset($_POST['Buscar'])) { // Si el post contienen "Calcular" va a imc calcular, si no va a ingresar...
            include_once("regisa_abuscar.php");
        } else if(isset($_POST['Agregar'])) {
            include_once("regisa_aguardar.php");
        } else {
            include_once("regisa_agregar.php");
        }
    ?>

    <?php
        require 'footer.php'
    ?>
</body>
</html>



