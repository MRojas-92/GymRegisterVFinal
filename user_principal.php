<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Informacion personal</title>
    <link rel="stylesheet" type="text/css" href="css/estilos_avances.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>
    <?php
        require 'header.php'
    ?>

    <?php
        //session_start();
        
        if(isset($_SESSION["usuario"])){

            if(isset($_POST['mostrar'])){   // Llamada a la funcion de agregar...
                include_once("regisa_agregar.php");

            } else if(isset($_POST['actualizar'])){    // Llamada a la funcion de mostrar datos de amigos...
                include_once("regisa_mostrar.php");

            } else if(isset($_POST['eliminar'])){   // Llamada a la funcion de eliminar usuarios...
                include_once("regisa_eliminar.php");

            } else if(isset($_POST['salir'])){   // Llamada a la funcion de eliminar usuarios...
                include_once("salir.php");

            } 

        } else
            header("Location: index.html"); // Si la sesion NO esta en progreso, no se puede entrar a esta funcion...
	?>


    <?php
        /*session_start();
        
        if(isset($_SESSION["usuario"])){
            //include_once("../principal/menu.php");
    		if(isset($_POST['Buscar'])) // Si el post contienen "Calcular" va a imc calcular, si no va a ingresar...
    			include_once("regisa_buscar.php");
    		else if(isset($_POST['Agregar']))
    			include_once("regisa_guardar.php");
            else
                include_once("regisa_formulario.php");
        }
        else
            header("Location: index.html"); // Si la sesion NO esta en progreso, no se puede entrar a esta funcion...*/
	?>

    <?php
        require 'footer.php'
    ?>
</body>
</html>