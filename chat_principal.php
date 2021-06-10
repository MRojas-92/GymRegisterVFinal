<!DOCTYPE html>
<html>
<head>
	<title>Ranking con amigos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_ranking.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>

	<?php session_start();?>

	<?php // INICIO DE SESION... header.php
		//session_start();
		include('header.php');
		$loginError = '';
		if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
			include ('Chat.php');
			$chat = new Chat();
			$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);	
			if(!empty($user)) {
				$_SESSION['username'] = $user[0]['username'];
				$_SESSION['userid'] = $user[0]['userid'];
				$chat->updateUserOnline($user[0]['userid'], 1);
				$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
				$_SESSION['login_details_id'] = $lastInsertId;
				header("Location:chat_contenido.php");
			} else {
				$loginError = "Usuario y Contraseña invalida";
			}
		}
		//sqlQuery getrows chat_action.php
	?>


<title>Grupos de chat</title>
<?php //include('container.php');?>
<div class="container">		
	<h2>Ingresa con tu usuario y contraseña</h1>		
	<div class="row">
		<div class="col-sm-4">
			<h4>Chat Login:</h4>		
			<form method="post">
				<div class="form-group">
				<?php if ($loginError ) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="username">Usuario:</label>
					<input type="username" class="form-control" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd">Contraseña:</label>
					<input type="password" class="form-control" name="pwd" required>
				</div>  
				<p></p>
				<button type="submit" name="login" class="btn btn-info">Iniciar Sesion</button>
			</form>
			<br>
			<p><b>Usuario</b> : RoxyMusic<br><b>Password</b> : roxy2018</p>
			<p><b>Usuario</b> : EdgarIn64<br><b>Password</b> : abc</p>
			<p><b>Usuario</b> : Marimar<br><b>Password</b> : wv</p>
			<br>
			<p>Este sistema de chat se encuentra en una version de prueba, por lo que es nesesario iniciar sesion por segunda vez</p>
			<br>

		</div>
		
	</div>
</div>	
<?php include('footer.php');?>






