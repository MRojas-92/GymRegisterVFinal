<?php
    session_start();    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrar Amigos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_ubica.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>

    <?php    
        require 'header.php'
    ?>

    <h1>Ubicaciones de Gimnasios</h1>

    <style type="text/css">
      #mapa {
            /*height: 80vh;*/
      }
      .h2s {
        font-size: 3vh;
      }
      .conteiner {
          width: 70%;
          height: 50%
      }
    </style>          

    <main role="main" >

        <div class="container text-center mt-5">
          <div id="mapa" class="mapa"></div>  <!-- Llamada al mapa -->
          <div class="row mt-3">
            <div class="col-md-12">
              <h2 class="h2s">Direcciones de los gimnasios</h2>
              <!-- Archivo PHP con la lógica para mostrar una tabla con las ubicaciones -->
              <?php include('ubica/ubica_app.php'); ?>  <!-- Llamada a la tabla y el mapa -->            
            </div>            
          </div>  

          <hr>                     
        </div>
    </main>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd4mp9DBY5GyLpk8bs-X5YyZvLh2S8JuQ"></script>
    <script type="text/javascript">

      function initMap() {
          var map;
          var bounds = new google.maps.LatLngBounds();
          var mapOptions = {
              mapTypeId: 'roadmap'
          };

          map = new google.maps.Map(document.getElementById('mapa'), {
              mapOptions
          });

          map.setTilt(50);

          // Crear múltiples marcadores desde la Base de Datos 
          var marcadores = [
              <?php include('ubica/ubica_marcadores.php'); ?>
          ];

          // Creamos la ventana de información para cada Marcador
          var ventanaInfo = [
              <?php include('ubica/ubica_infomarca.php'); ?>
          ];

          // Creamos la ventana de información con los marcadores 
          var mostrarMarcadores = new google.maps.InfoWindow(),
              marcadores, i;

          // Colocamos los marcadores en el Mapa de Google 
          for (i = 0; i < marcadores.length; i++) {
              var position = new google.maps.LatLng(marcadores[i][1], marcadores[i][2]);
              bounds.extend(position);
              marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  title: marcadores[i][0]
              });

              // Colocamos la ventana de información a cada Marcador del Mapa de Google 
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                      mostrarMarcadores.setContent(ventanaInfo[i][0]);
                      mostrarMarcadores.open(map, marker);
                  }
              })(marker, i));

              // Centramos el Mapa de Google para que todos los marcadores se puedan ver ubica
              map.fitBounds(bounds);
          }

          // Aplicamos el evento 'bounds_changed' que detecta cambios en la ventana del Mapa de Google, también le configramos un zoom de 14 
          var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
              this.setZoom(14);
              google.maps.event.removeListener(boundsListener);
          });

      }

      // Lanzamos la función 'initMap' para que muestre el Mapa con Los Marcadores y toda la configuración realizada 
      google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <DIV id="Barra" ALIGN="center"> <a href="ubica/ubica_insertar.php">Insertar una nueva ubicación</a> </DIV>
    <DIV id="Barra" ALIGN="center"> <a href="ubica/ubica_eliminar.php">Eliminar una ubicación</a> </DIV>
    <DIV id="Barra" ALIGN="center"> <a href="ubica/ubica_modificar.php">Editar una ubicación</a> </DIV>

<?php  
    require 'footer.php'
?>    

</body>
</html>