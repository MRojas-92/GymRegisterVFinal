<?php
        require_once("ranking_conexion.php");
        //Guardar en la siguiente variable el id del usuario actual para despues ser comparado en los registros del ranking
        $idUsuarioActual = 10;
        $obj = new conectar();
        $conexion = $obj->abrirConexion();

        $user = $_SESSION["datos"][0][0];
        $hoy = date("Y-m-d");
/*
            $sentenciaSQL = "SELECT * FROM rutina 
                            where fecha_modificacion BETWEEN '$fecha1' and '$fecha2'";
*/

        $fecha1 = $_POST["fecha1"];
        $fecha2 = $_POST["fecha2"];

        $sentenciaSQL = "SELECT nombre_rutina, repeticiones, tiempo, fecha
        FROM actividades, rutina
        WHERE actividades.id_rutina=rutina.id_rutina
        AND fecha BETWEEN '$fecha1' and '$fecha2'
        and id_usuario='$user'"; 

            /*
SELECT nombre_rutina, repeticiones, tiempo, fecha
FROM actividades, rutina
WHERE actividades.id_rutina=rutina.id_rutina
AND fecha BETWEEN '2021-05-15' and '2021-05-30'
and id_usuario=12;            
            */                            

            $resultado = $conexion->query($sentenciaSQL);

           // $fila = $resultado->num_rows;
            //echo $fila;

    ?>

            <div class="anuncio-tiempo">
                <h4>Los avances desde: <?php echo $fecha1; ?> hasta <?php echo $fecha2; ?></h4>
            </div>

    <?php

            if (($resultado->num_rows) > 0) {      
//             if ($fila > "1") {                          
            
    ?>
<!--
        <main class="seccion">
            <div class="contenedor-general tabla-avances">
                <h2 class="centrar-texto">Avances diarios</h2>
                
                <div class="anuncio-tiempo">
                    <h3>Los avances del dia: <?php echo date("D");?>, <?php echo date("d"); ?>/<?php echo date("M"); ?>/<?php echo date("Y"); ?></h3>
                </div>
-->

                <div class="bordes" style="display:flex; justify-content: center"><!---->
                    <table border="0">
                        <div class="contenedor-anuncios">
                            <tr>
                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Rutina</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Tiempo</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Repeticiones</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Fecha</h4>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </div>

                        <!-- AQUI COMIENZA LA TABLA -->

                        <tbody>
                            <?php
                                $posicion = 0;
                                $fila = $resultado->num_rows;
                                if ($fila == "0") {
                                    echo '<script language = javascript>
                                    alert("Debes agregar amigos antes de ver el ranking")
                                    </script>';
                                }else{
                                    while ($row = $resultado->fetch_array(MYSQLI_NUM)) {
                                    $posicion++;
                            ?>
                                <tr>    <!-- IMPRESION DE COLUMNAS -->
                                    <!--<td class="anuncio-titulo contenido-anuncio"> <?php echo $posicion ?> </td>-->
                                    <td class="anuncio-titulo1 contenido-anuncio"> 
                                        <?php echo $row[0] ?> 
                                    </td>
                                    <td class="anuncio-titulo1 contenido-anuncio"> <?php echo $row[1] ?> </td>
                                    <td class="anuncio-titulo1 contenido-anuncio"> <?php echo $row[2] ?> </td>
                                    <td class="anuncio-titulo1 contenido-anuncio"> <?php echo $row[3] ?> </td>
                                </tr>
                            <?php
                                        if($row[0] == $idUsuarioActual){
                                            $posicionDelUsuarioActual = $posicion;
                                        }
                                    }    
                                }
                            ?>
                        </tbody>

                    </table>
                </div> 
                <!--
                <div class="anuncio-tiempo">
                    <h3>Selecciona las fechas que quieres consultar</h3>
                    <!--<input type="date" id="start" name="trip-start" value="<?php echo date("d-m-Y"); ?>" min="2018-01-01" max="2025-12-31">
                    <form method="post" class="form" action="conexion.php">
                        Desde: <input type="date" name="fecha1">
                        , hasta: <input type="date" name="fecha2"><br><br>
                        <input type="submit" name="Ok" value="Consultar">
                    </form>
                </div>         
                            -->       
<!--
                <div class="anuncio-boton">
                    <div class="ver-todas">
                        <a href="menu_principal.php" class="boton boton-verde">Aceptar</a>                      
                    </div>
                </div>
            </div>
        </main>
                            -->
    <?php
    } else {
    ?>

<!--
        <main class="seccion">
            <div class="contenedor-general tabla-avances">
                <h2 class="centrar-texto">Avances diarios</h2>
                
                <div class="anuncio-tiempo">
                    <h3>Los avances del dia: <?php echo date("D");?>, <?php echo date("d"); ?>/<?php echo date("M"); ?>/<?php echo date("Y"); ?></h3>
                </div>

                <div class="bordes" style="display:flex; justify-content: center">
                    <table border="0">
                        <div class="contenedor-anuncios">
                            <tr>
                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Rutina</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Tiempo</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Repeticiones</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="anuncio-titulo">
                                        <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                                        <div class="contenido-anuncio">
                                            <h4>Fecha</h4>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </div>
    -->                        

                        <!-- AQUI COMIENZA LA TABLA 
                    </table>
                </div> 
    -->

                <div class="anuncio-tiempo1">
                    <h3>¡No hay actividades registradas!</h3>
                </div>     

<!--                
                <div class="anuncio-tiempo">
                    <h3>Selecciona las fechas que quieres consultar</h3>
                    <!--<input type="date" id="start" name="trip-start" value="<?php echo date("d-m-Y"); ?>" min="2018-01-01" max="2025-12-31">
                    <form method="post" class="form" action="conexion.php">
                        Desde: <input type="date" name="fecha1">
                        , hasta: <input type="date" name="fecha2"><br><br>
                        <input type="submit" name="Ok" value="Consultar">
                    </form>
                </div>                

                <div class="anuncio-boton">
                    <div class="ver-todas">
                        <a href="menu_principal.php" class="boton boton-verde">Aceptar</a>                      
                    </div>
                </div>
            </div>
        </main>
    -->

    <?php        
    }

    ?>

                <div class="anuncio-tiempo">
                    <h3>Selecciona las fechas que quieres consultar</h3>
                    <!--<input type="date" id="start" name="trip-start" value="<?php echo date("d-m-Y"); ?>" min="2018-01-01" max="2025-12-31">-->
                    <form method="post" action="">    <!--class="form" action="conexion.php"-->
                        Desde: <input type="date" name="fecha1">
                        , hasta: <input type="date" name="fecha2"><br><br>
                        <input type="submit" name="consultar" value="Consultar">
                    </form>
                </div>      