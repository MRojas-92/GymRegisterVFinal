
<?php
        require_once("ranking_conexion.php");
        //Guardar en la siguiente variable el id del usuario actual para despues ser comparado en los registros del ranking
        $idUsuarioActual = 10;
        $obj = new conectar();
        $conexion = $obj->abrirConexion();

        $user = $_SESSION["datos"][0][0];

        $rutina=$_POST['rutina'];

        $sentenciaSQL = "SELECT nombre_rutina,repeticiones,ejer01,ejer02,ejer03,(SELECT ejercicio 
                                    FROM ejercicios 
                                    WHERE ejer01=id_ejercicio),
                                    (SELECT ejercicio 
                                    FROM ejercicios 
                                    WHERE ejer02=id_ejercicio),
                                    (SELECT ejercicio 
                                    FROM ejercicios 
                                    WHERE ejer03=id_ejercicio),
                                    descripcion
                        FROM rutina
                        WHERE id_rutina='$rutina'";

        $resultado = $conexion->query($sentenciaSQL);        
            
    ?>

    <main class="seccion contenedor-establecer">
        <h2 class="centrar-texto">Metas y rutinas diarias</h2>

  <!--      <div class="anuncio-tiempo">
            <h3>Los avances de hoy: <?php echo date("D");?>, <?php echo date("d"); ?>/<?php echo date("M"); ?>/<?php echo date("Y"); ?></h3>
        </div> -->

        <div class="anuncio-tiempo" align="center">
            <div><h4>Selecciona la rutina</h4></div>
                <form action="" method="post">
                    <select name="rutina">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <input type="submit" name="consultar">
                </form>
        </div>   

        <div class="contenedor-anuncios">
         <!--   <div class="anuncio-titulo">
                <div class="contenido-anuncio">
                    <h3>Posición</h3>
                </div>
            </div>
            
<!--              <div class="anuncio-titulo">
                <div class="contenido-anuncio">
                    <h3>Nombre</h3>
                </div>
            </div>
            
            <div class="anuncio-titulo">
                <div class="contenido-anuncio">
                    <h3>Repeticiones</h3>
                </div>
            </div>
            
            <div class="anuncio-titulo">
                <div class="contenido-anuncio">
                    <h3>Tiempo</h3>
                </div>
            </div> -->
        </div>


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

            <div class="contenedor-anuncios">   <!--IMPRESION DE DATOS -->
                <div class="anuncio">
                    <h3>Rutina #<?php echo $rutina ?>: <?php echo $row[0] ?></h3>
                    <div class="imagen">
                        <img src="img/<?php echo $row[2] ?>.jpg" alt="icono lagartijas" height="150px" width="150px">
                        <img src="img/<?php echo $row[3] ?>.jpg" alt="icono abdominales" height="150px" width="150px">
                        <img src="img/<?php echo $row[4] ?>.jpg" alt="icono sentadillas" height="150px" width="150px">
                    </div>
                    <div>
                        <p>La rutina #<?php echo $rutina ?> consiste en tres ejercicios basicos los cuales son:</p>
                            <li><?php echo $row[1] ?> <?php echo $row[5] ?></li>
                            <li><?php echo $row[1] ?> <?php echo $row[6] ?></li>
                            <li><?php echo $row[1] ?> <?php echo $row[7] ?></li>
                        <p><?php echo $row[8] ?></p>
                    </div>
                </div>
            </div>

        <?php
                    if($row[0] == $idUsuarioActual){
                        $posicionDelUsuarioActual = $posicion;
                    }
                }    
            }
        ?>

    </main>
