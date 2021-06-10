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
        //session_start();
        
        if(isset($_SESSION["usuario"])){

            if(isset($_POST['agregar'])){   // Llamada a la funcion de agregar...
                include_once("regisa_agregar.php");

            } else if(isset($_POST['mostrar'])){    // Llamada a la funcion de mostrar datos de amigos...
                include_once("regisa_mostrar.php");

            } else if(isset($_POST['eliminar'])){   // Llamada a la funcion de eliminar usuarios...
                include_once("regisa_eliminar.php");

            } else {
                include_once ("regisa_menup.php");
            }

        } else
            header("Location: index.html"); // Si la sesion NO esta en progreso, no se puede entrar a esta funcion...
	?>

    <?php
        require 'footer.php'
    ?>
</body>
</html>