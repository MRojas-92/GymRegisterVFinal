<?php
    session_start();
	include_once("modelo/Usuario.php");
	$sErr="";
	$nombre_usuario="";//$sCve="";\
	$sNom="";
	$password="";//$sPwd="";	
	$oUsu = new Usuario(); //$oUsu
	
	/*Verificar que hayan llegado los datos*/
	if (isset($_POST["user"]) && !empty($_POST["user"]) &&
		isset($_POST["password"]) && !empty($_POST["password"])){
		$user = $_POST["user"];
		$password = $_POST["password"];
		$oUsu->setUsuario($user);
		$oUsu->setPassword($password);
        session_start();
		try{
			if ($oUsu->validarUsuario() ){
		
				$oUsu->setCorreo($_SESSION["datos"][0][2]);
				$oUsu->setSexo($_SESSION["datos"][0][3]);
				$oUsu->setEdad($_SESSION["datos"][0][5]);
				$oUsu->setNombre($_SESSION["datos"][0][6]);
				$_SESSION["usuario"] = $oUsu;
			}
			else{
				$sErr = "Usuario desconocido";
			}
		}catch(Exception $e){
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error al acceder a la base de datos";
		}
		if ($sErr == "")
			header("Location: menu_principal.php");
		else
			header("Location: error.html");
	}
	else {
		if(isset($_POST['ingresar']))
			header("Location: error.html");		
	}
?>