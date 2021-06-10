<?php
/*
Archivo:  Usuario.php
Objetivo: clase que encapsula la información de un usuario
Autor:    
*/
require("database.php");
class Usuario{
	private $nombre_usuario = "x";
	private $correo = "x";
	private $sexo = "x";
	private $password = "x";
	private $edad = 1;
	private $nombre_persona = "x";
	public function getUsuario(){
		return $this->nombre_usuario;
	}
	public function setUsuario($valor){
		$this->nombre_usuario = $valor;
	}

	public function getCorreo(){
		return $this->correo;
	}
	public function setCorreo($valor){
		$this->correo = $valor;
	}
	
	public function getSexo(){
		return $this->sexo;
	}
	public function setSexo($valor){
		$this->sexo = $valor;
	}
	
	public function getPassword(){
		return $this->password;
	}
	public function setPassword($valor){
		$this->password = $valor;
	}

	public function getEdad(){
		return $this->edad;
	}
	public function setEdad($valor){
		$this->edad = $valor;
	}
	
	public function getNombre(){
		return $this->nombre_persona;
	}
	public function setNombre($valor){
		$this->nombre_persona = $valor;
	}
	
	public function validarUsuario(){
		$bandera = false;
		$sQuery = "";
		$arrRS = null;
		$sQuery = "SELECT * FROM usuario WHERE nombre_usuario = '".$this->nombre_usuario."' AND passwrd = '".$this->password."'";
		//Crear, conectar, ejecutar, desconectar
		$conexion = new AccesoDatos();
		if ($conexion->conectar()){
			$arrRS = $conexion->ejecutarConsulta($sQuery);
			
			$_SESSION["datos"]=$arrRS;

			$conexion->desconectar();
			if ($arrRS != null){
				$bandera = true;
			}
		}
		return $bandera;
	}
}
?>