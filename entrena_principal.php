<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Entrenar</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_entrenar.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        //session_start();
        require 'header.php'
    ?>


	<?php
        if(isset($_SESSION["usuario"])){
            include_once("entrena_rutina.php");
        }
        else
            header("Location: ../index.php");
	?>

    <?php
        require 'footer.php';
        echo date("Y-m-d");
    ?> 

</body>
</html>