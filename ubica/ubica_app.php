<?php

  // Archivo de Conexión a la Base de Datos 
  include('ubica_conexion.php');

  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $result = mysqli_query($con, "SELECT * FROM ubicaciones");

  // Creamos una tabla para listar los datos 
  echo "<div class='table-responsive bordes' style='display:flex; justify-content: center'>";

  echo "<table class='table'>
          <thead class='thead-dark'>
            <div class='contenedor-anuncios'>
            <tr>
              <th scope='col' class='head-tabla'>
                <div>
                  <div>
                    <h4>ID</h4>
                  </div>
                </div>
              </th>
              <th scope='col' class='head-tabla'>
                <div>
                  <div>
                    <h4>Nombre</h4>
                  </div>
                </div>
              </th>
              <th scope='col' class='head-tabla more'>
                <div>
                  <div>
                    <h4>Dirección</h4>
                  </div>
                </div>
              </th>
              <th scope='col' class='head-tabla'>
                <div>
                  <div>
                    <h4>Latitud</h4>
                  </div>
                </div>
              </th>
              <th scope='col' class='head-tabla'>
                <div>
                  <div>
                    <h4>Longitud</h4>
                  </div>
                </div>
              </th>
              <th scope='col' class='head-tabla'>
                <div>
                  <div>
                    <h4>Ciudad</h4>
                  </div>
                </div>
              </th>
              <th scope='col' class='head-tabla'>
                <div>
                  <div>
                    <h4>País</h4>
                  </div>
                </div>
              </th>
            </tr>
            </div>
            </thead>
            <tbody>";

  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td scope='col' class='body-tabla contenido-anuncio'>" . $row['id_ubicacion'] . "</td>";
      echo "<td scope='col' class='body-tabla contenido-anuncio'>" . $row['nombre_gym'] . "</td>";
      echo "<td scope='col' class='body-tabla contenido-anuncio more'>" . preg_replace('/\\\\u([\da-fA-F]{4})/', '&#x\1;', $row['direccion']) . "</td>";  // Funcion que muestra los marcadores en el mapa
      echo "<td scope='col' class='body-tabla contenido-anuncio'>" . $row['latitud'] . "</td>";
      echo "<td scope='col' class='body-tabla contenido-anuncio'>" . $row['longitud'] . "</td>";
      echo "<td scope='col' class='body-tabla contenido-anuncio'>" . $row['ciudad'] . "</td>";
      echo "<td scope='col' class='body-tabla contenido-anuncio'>" . $row['pais'] . "</td>";
      echo "</tr>";
  }
  echo "</tbody></table>";
  echo "</div>";

  mysqli_close($con);

?> 