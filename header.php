<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Men&uacute; principal</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_general.css?v=<?php echo time(); ?>" media="all">
    <script type="text/javascript" src="js/despliega.js?v=<?php echo time(); ?>" media="all"></script>
    <script type="text/javascript" src="js/confirmacion.js?v=<?php echo time(); ?>" media="all"></script>
</head>
<body>

<header class="titulo">
    <div class="izquierdo">
        <a href="menu_principal.php">
            <img src="img/logo.jfif" alt="logo" width="100px" height="100px">
        </a>
        <div>
            <h1>Gym Register</h1>
            <p>¡Porque siempre es un buen dia para activarte!</p>
        </div>
    </div>

    <div class="alinear">
        <img src="img/icon_usuario.png" alt="Usuario X" width="70px" height="70">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">
                <?php
                    echo $_SESSION["datos"][0][2]; // Indica el dato de la tabla que debe imprimirse despues del "Hola "...
                ?>            
            </button>
            <div id="myDropdown" class="dropdown-content">
                <!--<a href="#">Mostrar información</a>
                <a href="#">Editar información</a>
                <a href="#">Eliminar usuario</a>
                <a href="salir.php">Salir</a>    <!--  onclick="alerta()" -->
             <!--   <p id="ejemplo">En este párrafo se mostrará la opción clickada por el usuario</p>
                <button onclick="alerta()">Clicka para mostrar mensaje</button>           -->
                <form method="POST" action="user_principal.php">    <!-- onsubmit="confirmar()" -->
                            <input class="press-b" type="submit" name="agregar" value="Mostrar información" style="cursor: pointer;">                                                                                
                            <input class="press-b" type="submit" name="mostrar" value="Editar información" style="cursor: pointer;">                                                                                
                            <input class="press-b" type="submit" name="eliminar" value="Eliminar cuenta" style="cursor: pointer;">                                                                                   
                            <input class="press-b" type="submit" name="salir" value="Cerrar sesión" style="cursor: pointer;">                                 
                </form>
            </div>

            <!--    <p id="ejemplo">En este párrafo se mostrará la opción clickada por el usuario</p>
                    <button onclick="alerta()">Clicka para mostrar mensaje</button>    -->
            <!--<?php //include_once("salir.php");   ?>-->

        </div>
    </div>
</header>


<ul class="topnav">
    <li><a href="menu_principal.php">Menú principal</a></li>
    <li><a href="entrena_principal.php">Entrenar</a></li>
    <li><a href="avances_principal.php">Avances diarios</a></li>
    <li><a href="ubica_principal.php">Ubicar gimnacios</a></li>
    <li><a href="imc_principal.php">Calcular IMC</a></li>
    <li><a href="establecer_principal.php">Metas y rutinas</a></li>
    <li><a href="regisa_principal.php">Amigos</a></li>
    <li><a href="ranking_principal.php">Ranking</a></li>
    <li><a href="chat_principal.php">Grupos de Chat</a></li>
 <!--   <li><a href="#">Opciones</a></li>
    <li><a href="#">Info</a></li>-->
 </ul>

</body>
</html>