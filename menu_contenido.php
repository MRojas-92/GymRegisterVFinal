<!--
<form method="post" action="">
    <input type="submit" name="salir" class="salir" value="Salir" style="float: : right; cursor: pointer;">
</form>
-->
    <?php
        /*session_start();
        if(isset($_POST['salir'])){
            print("hola");
            session_destroy();
            header("Location: index.html");
        }*/
        echo "<h1 style='text-align: center;'>Hola ";
        echo $_SESSION["datos"][0][1]; // Indica el dato de la tabla que debe imprimirse despues del "Hola "...
        echo "</h1>";
    ?>


        <h1 style="text-align: center;">Menu Principal</h1>
        <h2 style="text-align: center;">¿Qu&eacute; deseas hacer?</h2>

        <table style=" margin-right: auto; margin-left: auto;">
            <tr>
                <td>
                    <a href="entrena_principal.php">
                    <img src="img/entrenar.png">
                    </a>
                </td>
                <td>
                    <a href="avances_principal.php">
                    <img src="img/avance.png"> <!--class="inhabilitado"-->
                    </a>
                </td>
                <td>
                    <a href="ubica_principal.php">
                    <img src="img/ubicar.png">  <!--  class="inhabilitado" -->
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="imc_principal.php">
                    <img src="img/imc.png">
                    </a>
                </td>
                <td>
                    <a href="establecer_principal.php">
                    <img src="img/metas.png">
                    </a>
                </td>
                <td>
                    <a href="regisa_principal.php">
                    <img src="img/amigos.png">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="ranking_principal.php">
                    <img src="img/ranking.png">
                    </a>
                </td>
                <td>
                    <a href="chat_principal.php">
                    <img src="img/chat.png">
                    </a>
                </td>
                <td></td>
            </tr>
        </table>