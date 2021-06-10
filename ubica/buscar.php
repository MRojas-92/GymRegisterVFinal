<?php 
$nombreBuscar=$_GET["Nombre"];
$oMysql = new mysqli("localhost", "root", "", "google_maps_php_mysql");
$Query="SELECT * from google_maps_php_mysql WHERE nombre = '".$nombreBuscar."'";
$Result = $oMysql->query( $Query );
if($Result==null)
   	print("No se  encontra el registro");
else{
      $row =$Result->fetch_array();
  	  $direccion=$row["direccion"];
	  $lati=$row["lat"];
	  $long=$row["lng"];
	  $pais=$row["pais"];
	  $ciudad=$row["Ciudad"];
	}
?>
