<?php
        //session_start();

	   /* $nombre = $_POST['amigo'];
	    $email = $_POST['email'];*/
        $id = $_SESSION["datos"][0][0];

        require_once("ranking_conexion.php");
        //Guardar en la siguiente variable el id del usuario actual para despues ser comparado en los registros del ranking
        //$idUsuarioActual = 10;
        $obj = new conectar();
        $conexion = $obj->abrirConexion();

        $sentenciaSQL = "SELECT id_usuario, nombre_usuario, nombre_persona, correo_electronico, sexo, edad
                        FROM usuario
                        WHERE nombre_usuario IN (SELECT nombre_usuario 
                                                FROM amigos
                                                WHERE id_usuario='$id')
                        AND correo_electronico IN (SELECT correo_electronico 
                                                FROM amigos
                                                WHERE id_usuario='$id')";
        $resultado = $conexion->query($sentenciaSQL);

        $fila = $resultado->num_rows;
        if ($fila > "0") {          
     
    ?>

    <?php/*
        if(isset($_POST['salir'])){
            print("hola");
            session_destroy();
            header("Location: index.html");
        }        */
    ?>

    <main class="sec-tabla contenedor-t">
        <div class="conten-tabla">
            <h2 class="centrar-texto">Eliminar amigos</h2>
            
            <div class="bordes" style="display:flex; justify-content: center">
                <table border="0">
                    <div class="contenedor-anuncios">
                    <tr>

                        <th class="head-tabla">    <!-- class="contenido-anuncio"-->
                            <div>
                                <div class="">  <!-- class="contenido-anuncio"-->
                                    <h4>Usuario</h4>
                                </div>
                            </div>
                        </th>

                        <th class="head-tabla">    <!-- class="contenido-anuncio"-->
                            <div>
                                <div class="">  <!-- class="contenido-anuncio"-->
                                    <h4>Nombre</h4>
                                </div>
                            </div>
                        </th>

                        <th class="head-tabla">    <!-- class="contenido-anuncio"-->
                            <div>
                                <div class="">  <!-- class="contenido-anuncio"-->
                                    <h4>Correo electronico</h4>
                                </div>
                            </div>  
                        </th>

                        <th class="head-tabla">    <!-- class="contenido-anuncio"-->
                            <div>
                                <div class="">  <!-- class="contenido-anuncio"-->
                                    <h4>Sexo</h4>
                                </div>
                            </div>
                        </th>

                        <th class="head-tabla">    <!-- class="contenido-anuncio"-->
                            <div>
                                <div class="">  <!-- class="contenido-anuncio"-->
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
                            <!--<input type="hidden" name="amigo" value= <?php echo $row[0] ?>>-->

                            <td class="body-tabla contenido-anuncio"> 
                                <a href="regisa_eliminando.php ? Nombre=<?php echo $row[1] ?>">   <!--  onclick="if(confirm('Are you sure?')) saveandsubmit(event);" -->
                                    <img src="img/icon_usuario.png" alt="R Amigos" width="40px" height="40px"><br>
                                    <h4><?php echo $row[1] ?></h4> 
                                </a>
                            </td>
                            <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[2] ?> </h4></td>
                            <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[3] ?> </h4></td>
                            <!--<input type="hidden" name="email" value= <?php echo $row[3] ?>>-->
                            <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[4] ?> </h4></td>
                            <td class="body-tabla contenido-anuncio"><h4> <?php echo $row[5] ?> </h4></td>
                        </tr>
                        
                        <?php
                                    /*if($row[0] == $idUsuarioActual){
                                        $posicionDelUsuarioActual = $posicion;
                                    }*/
                                }    
                            }
                        ?>
                    </tbody>
                </table>
            </div> 
<!--
            <div class="anuncio-boton">
                <div class="ver-todas">
                    <!--<a href="#" class="boton boton-verde">Agregar</a>->
                    <input class="boton boton-verde" type="submit" name="Agregar" value="Agregar" style="cursor: pointer;" height="300px">
                </div>
            </div>
        <!-- Nuevo -->
		</form> <!-- Nuevo -->


            <div>
                <div class="ver-todas">
                    <a href="regisa_principal.php" class="boton aceptar">Aceptar</a>
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
                    <h1 class="titulo-ranking">Eliminar amigos</h1>
                    <br>
                    <h2>¡No tienes amigos registrados aun!</h2>
                    <div>   <!--class="anuncio-boton"-->
                        <div class="boton-espacior">
                            <a href="regisa_principal.php" class="boton estilo-boton">Volver</a>                      
                        </div>
                    </div>                
                </div>
            </main>
        <?php        
        }
        ?>
