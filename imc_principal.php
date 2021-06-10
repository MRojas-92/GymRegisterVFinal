<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Calcular IMC</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_imc.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>

    <?php
        //session_start();
        require 'header.php'
    ?>
	
	<?php
        
        if(isset($_SESSION["usuario"])){
            //include_once("../principal/menu.php");
    		if(isset($_POST['calcular'])) // Si el post contienen "Calcular" va a imc calcular, si no va a ingresar...
    			include_once("imc_calcular.php");
    		else
    			include_once("imc_ingresar.php");
        }
        else
            header("Location: index.html"); // Si la sesion NO esta en progreso, no se puede entrar a esta funcion...
	?>

    <?php
        require 'footer.php'
    ?>

</body>
</html>