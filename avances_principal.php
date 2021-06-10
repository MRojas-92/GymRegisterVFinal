<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Avances Diarios</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_avances.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>
    <?php
        //session_start();
        require 'header.php'
    ?>

    <main class="seccion-av">
        <div class="contenedor-av tabla-avances">
            <h2>Avances diarios</h2>   <!-- class="centrar-texto" -->

            <?php
                
                if(isset($_SESSION["usuario"])){
                    //include_once("../principal/menu.php");
                    if(isset($_POST['consultar']))
                        include_once("avances_consultas.php");
                    else
                        include_once("avances_contenido.php");
                }
                else
                    header("Location: index.html"); // Si la sesion NO esta en progreso, no se puede entrar a esta funcion...
            ?>

            <div>   <!--class="anuncio-boton"-->
                <div class="espacio-boton"> <!--ver-todas-->
                    <a href="menu_principal.php" class="boton estilos-botonav">Aceptar</a>                      
                </div>
            </div>
        </div>
    </main>


    <?php
        require 'footer.php'
    ?>
</body>
</html>