    <?php
	    $nombre = $_POST['nombre'];
	    $email = $_POST['email'];

        require_once("ranking_conexion.php");
        //Guardar en la siguiente variable el id del usuario actual para despues ser comparado en los registros del ranking
        $idUsuarioActual = 10;
        $obj = new conectar();
        $conexion = $obj->abrirConexion();
        $sentenciaSQL = "SELECT id_usuario,nombre_usuario, nombre_persona,correo_electronico,(SELECT IF(upper(sexo)='H','Hombre','Mujer')),edad 
        FROM usuario 
        WHERE nombre_usuario='$nombre'
        AND correo_electronico='$email'";
        $resultado = $conexion->query($sentenciaSQL);
    ?>

    <?php
        if(isset($_POST['salir'])){
            print("hola");
            session_destroy();
            header("Location: index.html");
        }        
    ?>

    <main class="sec-tabla contenedor-t">
        <div class="conten-tabla">
            <h2 class="centrar-texto">Datos del amigo</h2>
            
            <div class="bordes" style="display:flex; justify-content: center">
                <table border="0">
                    <div class="contenedor-anuncios">
                    <tr>

                        <th class="head-tabla">
                            <div>
                                <div class="">
                                    <h4>Usuario</h4>
                                </div>
                            </div>
                        </th>

                        <th class="head-tabla">
                            <div>
                                <div class="">
                                    <h4>Nombre</h4>
                                </div>
                            </div>
                        </th>

                        <th class="head-tabla">
                            <div>
                                <div class="">
                                    <h4>Correo electronico</h4>
                                </div>
                            </div>  
                        </th>

                        <th class="head-tabla">
                            <div>
                                <div class="">
                                    <h4>Sexo</h4>
                                </div>
                            </div>
                        </th>

                        <th class="head-tabla">
                            <div>
                                <div class="">
                                    <h4>Edad</h4>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </div>

                    <!-- AQUI COMIENZA LA TABLA -->

        <form method="POST" action="">  <!-- Nuevo agregado -->
                    <tbody>
                        <?php
                            $posicion = 0;
                            $fila = $resultado->num_rows;
                            if ($fila == "0") {
                                echo '<script language = javascript>
                                alert("El contacto no ha sido encontrado");
                                window.location.href="regisa_principal.php";
                                </script>';
                                
                            }else{
                                while ($row = $resultado->fetch_array(MYSQLI_NUM)) {
                                $posicion++;
                        ?>
                            <tr>    <!-- IMPRESION DE COLUMNAS -->
                                <input type="hidden" name="amigo" value= <?php echo $row[0] ?>>

                                <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[1] ?> </h4></td>
                                <input type="hidden" name="usuario" value= <?php echo $row[1] ?>>

                                <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[2] ?> </h4></td>
                                <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[3] ?> </h4></td>
                                <input type="hidden" name="email" value= <?php echo $row[3] ?>>

                                <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[4] ?> </h4></td>
                                <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[5] ?> </h4></td>
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

            <div class="anuncio-boton">
                <div class="ver-todas">
                    <!--<a href="#" class="boton boton-verde">Agregar</a>-->
                    <input class="boton boton-verde" type="submit" name="Agregar" value="Agregar" style="cursor: pointer;" height="300px">
                </div>
            </div>
        <!-- Nuevo -->
		</form> <!-- Nuevo -->

            <div class="anuncio-boton">
                <div class="ver-todas">
                    <a href="regisa_asubmenu.php" class="boton aceptar">Cancelar</a>
                </div>
            </div>

        </div>
    </main>
