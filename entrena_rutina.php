<?php 
	//session_start();
    require('modelo/database.php');

    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $sQuery = "SELECT * FROM rutina";	// Llama a la rutina que se va a realizar...
    
    $arrRS = $db->ejecutarConsulta($sQuery);	// Deposita el resultado de la consulta en una variable
	
	if(isset($_POST['elegir'])) {
		$rutina = $arrRS[$_POST['rutina']];
		$_SESSION['rutina']=$rutina;
    	header("Location: entrena_contenido.php");
    }
	else {
		$ejer = null;
		echo '
	    <form method="post" action="">
	    	<label>Seleccionar rutina</label>
			<select name="rutina" id="rutina" style="font-size: 1.2rem;">';
			for($i=0; $i<count($arrRS); $i++) {
				$ejer1 = "SELECT ejercicio FROM ejercicios WHERE id_ejercicio = ".$arrRS[$i][4];
				$ejer2 = "SELECT ejercicio FROM ejercicios WHERE id_ejercicio = ".$arrRS[$i][5];
				$ejer3 = "SELECT ejercicio FROM ejercicios WHERE id_ejercicio = ".$arrRS[$i][6];
				$ejer1 = $db->ejecutarConsulta($ejer1)[0][0];
				$ejer2 = $db->ejecutarConsulta($ejer2)[0][0];
				$ejer3 = $db->ejecutarConsulta($ejer3)[0][0];
				$ejer[] = $ejer1;
				$ejer[] = $ejer2;
				$ejer[] = $ejer3;
				echo '<option value="'.$i.'">'.($i+1).' ('.$ejer1.','.$ejer2.','.$ejer3.')'; // Imprime las opciones de ejercicios de las rutinas
				echo '</option>';
			}
		echo ' 
			</select>		
			<input type="submit" name="elegir" value="Elegir rutina">
		</form>
	    ';
		$_SESSION['ejercicios'] =$ejer;
	}
/*
    $rutina = $_POST['rutina'];
    print_r($arrRS[$rutina]);
    echo "<br><br><br>";
    print_r($ejercicios);
   
    $_SESSION['rutina']=$rutina;
    $_SESSION['ejercicios']=$ejercicios;
}*/
?>
