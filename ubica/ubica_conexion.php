<?php 

  // Nos conectamos a la Base de Datos MySQL
  $con = mysqli_connect("localhost", "root", "", "pw_gymregisterv2");
  //$con = mysqli_connect("localhost:3306", "promay20_gymregisteruser", "gymregister#18", "promay20_pwgymregister");
 
  // Verificamos la conexión a la Base de Datos MySQL 
  if (mysqli_connect_errno()) {
      echo "Error al Conectar a la base de Datos: " . mysqli_connect_error();
  }

?>
