<?php
class conectar{
  public function abrirConexion(){          // DATOS DEL SERVIDOR:
    $servidor = 'localhost';           //     $servidor = 'localhost:3306';
    $dataBase = 'pw_gymregisterv2';   //     $dataBase = 'promay20_pwgymregister';
    $usuario = 'root';  //     $usuario = 'promay20_gymregisteruser';
    $contrasena = '';         //     $contrasena = 'gymregister#18';
    $conexion = new mysqli($servidor,$usuario,$contrasena,$dataBase); 
    if($conexion->connect_errno){
      echo "Error al conectar a la base de datos";
      exit();
    }
    return $conexion;
  }
}
?>