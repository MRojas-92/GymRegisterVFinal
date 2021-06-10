<?php 
	require('modelo/database.php');

	$peso = $_POST['peso'];
	$altura = $_POST['altura']/100;
	$imc = $peso/($altura*$altura);
	$edad = $_POST['edad'];
	$fecha = date("Y/m/d");

	$db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "INSERT INTO imc(id_usuario, altura, peso, imc, fecha) VALUES ('".$_SESSION['datos'][0][0]."','".$altura."','".$peso."','".$imc."','".$fecha."')";             
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta

    if($Result==null){
      echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
    }
    $db->desconectar();

	
	$mensaje='normal';
	if($imc<16){
		$mensaje='Delgadez severa';
	}
	else if($imc>=16 && $imc<17){
		$mensaje='Delgadez moderada';
	}
	else if($imc>=17 && $imc<18.5){
		$mensaje='Delgadez leve';
	}
	else if($imc>=25 && $imc<30){
		$mensaje='Sobrepeso';
	}
	else if($imc>=30 && $imc<35){
		$mensaje='Obesidad leve';
	}
	else if($imc>=35 && $imc<40){
		$mensaje='Obesidad media';
	}
	else if($imc>=40){
		$mensaje='Obesidad mórbida';	
	}
	
	//$oMysql = new mysqli("localhost", "root", "", "pw_gymregister"); // "gym" = "pw_gymregister"
	//$Query= "INSERT INTO IMC (id_usuario, altura, peso, edad, imc, fecha) VALUES ('".$_SESSION["datos"][0][1]."','".$_POST["altura"]."','".$_POST["peso"]."','".$_POST["edad"]."','".$imc."','(SELECT CURDATE())')";             
	// INSERT INTO IMC(id_imc, id_usuario, altura, peso, edad, imc, fecha) VALUES (?, ?, ?, ?, ?, ?, ?);
  ?>

<section>
	<div class="section-imc">
		<form action="" method="post">
			<div class="resul-imc">
				<br>
				<img src="img/resultado.png">
				<h1>Su resultado:</h1>
				<p>Usted tiene un IMC de: <strong><?php echo $imc;?></strong></p>
				<p>Su clasificación es <strong><?php echo $mensaje;?></strong></p>
				<input class="aceptar" type="submit" name="aceptar" value="Aceptar">
				<br><br>
			</div>
		</form>
	</div>
</section>
