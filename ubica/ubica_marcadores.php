<?php

  // Archivo de Conexión a la Base de Datos 
  include('ubica_conexion.php');

  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $result = mysqli_query($con, "SELECT * FROM ubicaciones");

  // Seleccionamos los datos para crear los marcadores en el Mapa de Google serian direccion, lat y lng 
  while ($row = mysqli_fetch_array($result)) {
      echo '["' . $row['nombre_gym'] . ', ' . $row['direccion'] . '", ' . $row['latitud'] . ', ' . $row['longitud'] . '],';
  }
?>
