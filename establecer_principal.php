<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Establecer metas y rutinas diarias</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_establecer.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>
    <?php
        //session_start();
        require 'header.php'
    ?>

	<?php
            
        if(isset($_SESSION["usuario"])){
            //include_once("../principal/menu.php");
            if(isset($_POST['consultar']))
                include_once("establecer_consulta.php");
            else
                include_once("establecer_contenido.php");
        }
        else
            header("Location: index.html"); // Si la sesion NO esta en progreso, no se puede entrar a esta funcion...
	?>

    <?php
        require 'footer.php'
    ?>
</body>
</html>