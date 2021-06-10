<?php
    //session_start();            
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Register 1.1</title>
    <link rel="stylesheet" href="css/estilos_inicio.css?v=<?php echo time(); ?>" media="all">
</head>
<body>

    <?php
        require 'header_i.php'
    ?>

  <?php
    //require 'parciales/header.php'; // ESTO REEMPLAZA AL HEADER QUE SE MUESTRA DE LA LINEA 14 A 28\
    //require 'login_conexion.php';
  ?>

  <form class="formulario" action="login_conexion.php" method="post" class="formulario"> 
    <legend>Iniciar Sesión</legend>

    <div class="iconos">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <circle cx="12" cy="7" r="4" />
        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
      </svg> <!-- Genera el icono de usuario -->

      <input  type="text" name="user" placeholder="Ingresa tu nombre de usuario">

      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <circle cx="12" cy="12" r="9" />
          <line x1="12" y1="17" x2="12" y2="17.01" />
        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
      </svg> <!-- Genera el signo de interrogacion -->

    </div> 

    <div class="iconos">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-open" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <rect x="5" y="11" width="14" height="10" rx="2" />
          <circle cx="12" cy="16" r="1" />
        <path d="M8 11v-5a4 4 0 0 1 8 0" />
      </svg> <!-- Genera el icono de candado -->

      <input type="password" name="password" placeholder="Ingresa tu contraseña">

      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <circle cx="12" cy="12" r="9" />
          <line x1="12" y1="17" x2="12" y2="17.01" />
        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
      </svg> <!-- Genera el signo de interrogacion -->
    </div>

    <input type="submit" name="ingresar" class="boton" value="Ingresar">
  </form>

  <br><br>
  <hr>

  <br>
  <a href="registrarse.php" class= "boton">Regístrarse</a>


  <?php
      require 'footer.php'
  ?>

</body>
</html>