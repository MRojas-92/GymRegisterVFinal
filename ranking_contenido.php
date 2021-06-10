<?php
        require_once("ranking_conexion.php");
        //Guardar en la siguiente variable el id del usuario actual para despues ser comparado en los registros del ranking
        $idUsuarioActual = 10;
        $obj = new conectar();
        $conexion = $obj->abrirConexion();

        $user = $_SESSION["datos"][0][0];

            $sentenciaSQL = "SELECT usuario.nombre_usuario as Nombre, nombre_rutina, repeticiones, tiempo
            FROM actividades, usuario, rutina
            WHERE actividades.id_usuario=usuario.id_usuario
            AND actividades.id_rutina=rutina.id_rutina
            AND usuario.id_usuario IN (SELECT usuario.id_usuario
                                       FROM usuario, amigos
                                       WHERE amigos.nombre_usuario=usuario.nombre_usuario
                                       AND amigos.id_usuario='$user'
                                       OR usuario.id_usuario='$user')                           
            GROUP BY Nombre
            ORDER by tiempo";

            $resultado = $conexion->query($sentenciaSQL);

            $fila = $resultado->num_rows;
            if ($fila > "1") {            
            
    ?>

        <main class="seccion-r contenedor-r centrar-textor">
            <div class="contengen-ranking">    <!-- class="contenedor-general" -->
                <img src="img/icon_ranking.png" alt="R Amigos" width="100px" height="100px">
                <h1 class="titulo-ranking">Ranking con amigos</h1>

                
                <div class="estilos-tablar" > <!-- style="display:flex; justify-content: center" -->
                    <table border="0">
                        <div class="conten-anunciosr">
                            <tr>
                                <th>
                                    <div class="casilla-pr tamaño-tablar">
                                        <div class="tamaño-tablar">
                                            <h4>Posición</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="casilla-pr tamaño-tablar">
                                        <div class="tamaño-tablar">
                                            <h4>Nombre Usuario</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="casilla-pr tamaño-tablar">
                                        <div class="tamaño-tablar">
                                            <h4>Rutina</h4>
                                        </div>
                                    </div>  
                                </th>

                                <th>
                                    <div class="casilla-pr tamaño-tablar">
                                        <div class="tamaño-tablar">
                                            <h4>Repeticiones</h4>
                                        </div>
                                    </div>
                                </th>

                                <th>
                                    <div class="casilla-pr tamaño-tablar">
                                        <div class="tamaño-tablar">
                                            <h4>Tiempo</h4>
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
                                    <td class="posicion-r tamaño-tablar"> <?php echo $posicion ?> </td>
                                    <td class="casillas-r tamaño-tablar"> 
                                        <img src="img/icon_usuario.png" alt="R Amigos" width="40px" height="40px">
                                        <?php echo $row[0] ?> 
                                    </td>
                                    <td class="casillas-r tamaño-tablar"> <?php echo $row[1] ?> </td> <!-- anuncio-titulo1 -->
                                    <td class="casillas-r tamaño-tablar"> <?php echo $row[2] ?> </td>
                                    <td class="casillas-r tamaño-tablar"> <?php echo $row[3] ?> </td>
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

                    <div>   <!--class="anuncio-boton"-->
                        <div class="boton-espacior">
                            <a href="menu_principal.php" class="boton estilo-boton">Aceptar</a>                      
                        </div>
                    </div>
            </div>
        </main>
        
    <?php
    } else {
    ?>

        <main class="seccion-r contenedor-r centrar-textor">
            <div class="contengen-ranking">
                <img src="img/advertencia.png" alt="R Amigos" width="100px" height="100px">
                <h1 class="titulo-ranking">Ranking con sus amigos</h1>
                <br>
                <h2>¡Debes tener por lo menos un amigo registrado para generar un ranking!</h2>
                <div>   <!--class="anuncio-boton"-->
                    <div class="boton-espacior">
                        <a href="regisa_principal.php" class="boton estilo-boton">Ir a Registrar amigos</a>                      
                    </div>
                </div>
                <div>   <!--class="anuncio-boton"-->
                    <div class="boton-espacior">
                        <a href="menu_principal.php" class="boton estilo-boton">Salir</a>                      
                    </div>
                </div>                
            </div>
        </main>
    <?php        
    }
    ?>