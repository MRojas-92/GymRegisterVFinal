<?php
    session_start();   
?>

<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Men&uacute; principal</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_menu.css?v=<?php echo time(); ?>" media="all">

</head>
<body>

    <?php         
        if(isset($_SESSION["usuario"])){
            require 'header_p.php';            
        }
        else{
            header("Location: index.php");  
        }           
    ?>

    <?php   
        if(isset($_SESSION["usuario"])){
            include_once("menu_contenido.php");
        }
        else 
            header("Location: index.php"); 
    ?>

    <?php
        //print("Revisar funcion SESSION[usuario] puesto que es este el causante de que no cargue el resto de las funciones...!!!");
        require 'footer.php'
    ?>

</body>
</html>