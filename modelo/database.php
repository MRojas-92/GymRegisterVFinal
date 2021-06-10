<?php
class AccesoDatos{										// Datos del Servidor:
	private $server = 'localhost';					// private $server = 'localhost:3306';			
	private $username = 'root';		// private $username = 'promay20_gymregisteruser';
	private $password = '';				// private $password = 'gymregister#18';		
	private $database = 'pw_gymregisterv2'; 		// private $database = 'promay20_pwgymregister'; 
 	private $oConexion=null; 
 	public function getConex (){
 		return $this->oConexion;
 	}
	function conectar(){
		$bandera = false;
		try {
		  //$this->oConexion = new mysqli("localhost:3306", "promay20_gymregisteruser", "gymregister#18", "promay20_pwgymregister");
		  $this->oConexion = new mysqli("localhost", "root", "", "pw_gymregisterv2");
		  $bandera = true;
		} catch (PDOException $e) {
		  die('Connection Failed: ' . $e->getMessage());
		}
		return $bandera;
	}
	/*Realiza la desconexión de la base de datos*/
 	function desconectar(){
	$bandera = true;
		if ($this->oConexion != null){
			$this->oConexion=null;
		}
		return $bandera;
	}
	
	/*Ejecuta en la base de datos la consulta que recibió por parámetro.
	Regresa
		Nulo si no hubo datos
		Un arreglo bidimensional de n filas y tantas columnas como campos se hayan
		solicitado en la consulta*/
  	function ejecutarConsulta($psConsulta){
		$arrRS = null;
		$rst = null;
		$oLinea = null;
		$sValCol = "";
		$i=0;
		$j=0;

		if ($psConsulta == ""){
	       throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");
		}
		if ($this->oConexion == null){
			throw new Exception("AccesoDatos->ejecutarConsulta: falta conectar la base");
		}
		try{
			$rst = $this->oConexion->query($psConsulta); //un objeto PDOStatement o falso en caso de error
		}catch(Exception $e){
			throw $e;
		}
		if ($rst){
			foreach($rst as $oLinea){ 
				foreach($oLinea as $llave=>$sValCol){
					if (is_string($llave)){
						$arrRS[$i][$j] = $sValCol;
						$j++;
					}
				}
				$j=0;
				$i++;
			}
		}
		return $arrRS;
	}
	
	/*Ejecuta en la base de datos el comando que recibió por parámetro
	Regresa
		el número de registros afectados por el comando*/
  	function ejecutarComando($psComando){
	$nAfectados = -1;
       if ($psComando == ""){
	       throw new Exception("AccesoDatos->ejecutarComando: falta indicar el comando");
		}
		if ($this->oConexion == null){
			throw new Exception("AccesoDatos->ejecutarComando: falta conectar la base");
		}
		try{
       	   $nAfectados =$this->oConexion->exec($psComando);
		}catch(Exception $e){
			throw $e;
		}
		return $nAfectados;
	}
}

?>
