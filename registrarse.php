<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrarse</title>
    <link rel="stylesheet" href="css/estilos_inicio.css?v=<?php echo time(); ?>" media="all">
    <script type="text/javascript" src="archivos/js/limpiar.js?v=<?php echo time(); ?>"></script>
</head>
<body>

  <?php
    require 'header_p.php'
  ?>

  <div  class="contacto">
    <form class="formulario" action="#" method="post">
      <legend>Crear Cuenta</legend>

      <div class="contenedor-campos">
        <div class="campo">
          <label>Nombre</label>
          <input type="text" name="nombre" placeholder="Nombre" required>
        </div>

        <div class="campo">
            <label>Nombre de Usuario</label>
            <input type="txt" name="nombre_usuario" placeholder="Nombre de usuario" required="required">
        </div>

        <div class="campo">
            <label>Edad</label>
            <input type="number" name="edad" placeholder="Edad" required="required" min="1">
        </div>

        <div class="campo">
          <label>Sexo</label>
          <table>
            <tr>
            <td>
              <label class="radio" for="Hombre">Hombre
              <input type="radio" name="sexo" value="Hombre" required="required"></label>
            </td>
            <td>
              <label class="radio" for="Mujer">Mujer
              <input type="radio" name="sexo" value="Mujer" required="required"></label>
            </td> 
            </tr>
            <tr>
            <td>
              <label class="radio" for="Otro">Otro
              <input type="radio" name="sexo" value="Otro" required="required"></label>
            </td> 
            </tr>
          </table>
        </div>

        <div class="campo w-100">
            <label>Correo</label>
            <input type="mail" name="correo_electronico" placeholder="Mail">
        </div>

        <div class="campo w-100" minlength="7" required="required">
            <label>Contraseña</label>
            <input type="password" placeholder="Contraseña" name="contraseña">
        </div>

        <div class="campo w-100">
            <label>Confirmar</label>
            <input type="password" name="confirmar" placeholder="Repetir Contraseña" minlength="7" required="required">
        </div>
      </div><!--.contenedor-campos-->

      <div class="enviar">
          <input class="boton" type="submit" value="Registrarse" name="enviar">
      </div>

      <div class="cancelar">
          <a href="index.html" class="boton">Cancelar</a>
      </div>
    </form>
  </div>

  <br><br>

  <?php 
    if(isset($_POST['enviar'])){
        $oMysql = new mysqli("localhost", "root", "", "pw_gymregister"); // "gym" = "pw_gymregister"
        $Query= "INSERT INTO usuario VALUES ('" ."','".$_POST["nombre"]."','".$_POST["nombre_usuario"]."','".$_POST["correo_electronico"]."','".$_POST["edad"]."','".$_POST["sexo"]."','".$_POST["contraseña"]."')";             
                  //$oMysql->query    seria como Objeto.metodo
        $Result = $oMysql->query( $Query );  // se lanza la consulta
        if($Result!=null){
          echo "<script type='text/javascript'>limpiar();</script>";
          echo "<div class='formulario'>";
          echo "<h1>Se registro correctamente su cuenta</h1>";
          echo "<div class='cancelar'>";
          echo "<a href='login_principal.php' class='boton'>Comenzar</a>";
          echo  "</div>";
          echo "</div>";
        }

        else { // Verificacion de que los campos no sean repetidos...
          $usuario= "SELECT * FROM usuario WHERE nombre_usuario = '".$_POST["nombre_usuario"]."'";
          $consulta=$oMysql->query($usuario);
          if($consulta->num_rows>0){
            echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario: El nombre de usuario ya habia sido registrado previamente')</script>";
          }
          else{
            $correo = "SELECT * FROM usuario WHERE correo_electronico = '".$_POST["correo_electronico"]."'";
            $consulta=$oMysql->query($correo);
            print($correo);
            print_r($consulta);
            if($consulta->num_rows>0){
              echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario: El correo electronico ya habia sido registrado previamente')</script>";
            }
            else
              echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
          }
        }
    }
  ?>

  <?php
    require 'footer.php'
  ?>
</body>
</html>
 