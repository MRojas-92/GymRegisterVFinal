    <?php
        $id = $_SESSION["datos"][0][0];
        $amigo = $_POST['amigo'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $fecha = date("Y-m-d"); 

        if($id != $amigo){
            require('modelo/database.php');
            $fecha = date("Y/m/d");
            $db = new AccesoDatos();
            $db->conectar();
            $oMysql = $db->getConex();
            $Query= "INSERT INTO amigos(id_usuario, nombre_usuario, correo_electronico, fecha) 
            VALUES ('".$_SESSION['datos'][0][0]."','".$usuario."','".$email."','".$fecha."')"; 
                
                    //$oMysql->query    seria como Objeto.metodo
            $Result = $oMysql->query( $Query );  // se lanza la consulta

            if($Result==null){
            echo "<script type='text/javascript'>alert('No se pudo registrar la actividad')</script>";
            }
            $db->desconectar();

            echo '<script language = javascript>
            alert("¡Amigo registrado con exito! :D");
            window.location.href="regisa_asubmenu.php";
            </script>';

        }else{

            echo '<script language = javascript>
            alert("ERROR: No puedes agregarte a ti mismo como amigo");
            window.location.href="regisa_principal.php";
            </script>';
        }
    ?>