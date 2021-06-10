<?php 
session_start();
//include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ranking con amigos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_ranking.css?v=<?php echo time(); ?>" media="all">	
</head>
<body>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">  <!-- NOTA: Al quitar esto acelera el envio de los mensajes... -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>    <!-- Permite el envio de los mensajes -->
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->


<?php include('header.php');?>


<!--
<title>Sistema de chat en vivo con Ajax, PHP y MySQL</title>		chat_action.php		salir	Chat.php	container.php

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>	<!-- Despliega pestaña de cierre y proporciona los iconos de redes sociales y mas -->

<link href="css/style1.css" rel="stylesheet" id="bootstrap-css">


<script src="js/chat.js"></script>

<style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;	
}
</style>
<?php //include('container.php');?>	<!-- Llama al header de opciones... -->
<div class="container">		
	<h1>Chat con amigos</h1>	<!-- <h1>Sistema de chat en vivo con Ajax, PHP y MySQL</h1> -->	
	<br>		
	<?php if(isset($_SESSION['userid']) && $_SESSION['userid']) { ?> 	
		<div class="chat">	
			<div id="frame">		
				<div id="sidepanel">	<!-- PANEL IZQUIERDO: Usuario actual, contactos, opciones, etc... -->
					<div id="profile">
						<?php
							include ('Chat.php');	// Llamada a Chat.php
							$chat = new Chat();
							$loggedUser = $chat->getUserDetails($_SESSION['userid']);	//Recibe el ID del usuario del usuario en sesion...
							echo '<div class="wrap">';	// Ordena a los usuarios en el lado izquierdo..
							$currentSession = '';
							foreach ($loggedUser as $user) {
								$currentSession = $user['current_session'];	// Recibe el id del usuario con el que se encuentra chateando actualmente...
								echo '<img id="profile-img" src="userpics/'.$user['avatar'].'" class="online" alt="" />';	// Muestra la imagen del perfil del usuario actual..
								echo  '<p>'.$user['username'].'</p>';	// Muestra el nombre del usuario actual...
									echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';	// Despliega la pestaña que muestra la opcion salir...
									echo '<div id="status-options">';
									echo '<ul>';	// Lista de estados: Online, ausente, ocupado, Desconectado..
										echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
										echo '<li id="status-away"><span class="status-circle"></span> <p>Ausente</p></li>';
										echo '<li id="status-busy"><span class="status-circle"></span> <p>Ocupado</p></li>';
										echo '<li id="status-offline"><span class="status-circle"></span> <p>Desconectado</p></li>';
									echo '</ul>';
									echo '</div>';
									echo '<div <!--id="expanded"-->>';	// FUNCION COMENTADA: Para expandir la pestaña de SALIR		
									echo '<a href="logout.php">Salir</a>';	// Llamada a cerrar sesion... container
									echo '</div>';
							}
							echo '</div>';
						?>
					</div>

					<div id="search">	<!-- Barra de busqueda de contactos... -->
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" placeholder="Buscar Contactos..." />					
					</div>

					<div id="contacts">	<!-- Muestra los contactos que se encuentran agregados al chat -->
						<?php
							echo '<ul>';
							$chatUsers = $chat->chatUsers($_SESSION['userid']);	// Recibe la informacion de todos los usuarios que no son el actual...
							foreach ($chatUsers as $user) {
								$status = 'offline';						
								if($user['online']) {
									$status = 'online';
								}
								$activeUser = '';
								if($user['userid'] == $currentSession) {
									$activeUser = "active";
								}
								echo '<li id="'.$user['userid'].'" class="contact '.$activeUser.'" data-touserid="'.$user['userid'].'" data-tousername="'.$user['username'].'">';
								echo '<div class="wrap">';
								echo '<span id="status_'.$user['userid'].'" class="contact-status '.$status.'"></span>';
								echo '<img src="userpics/'.$user['avatar'].'" alt="" />';
								echo '<div class="meta">';
								echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$chat->getUnreadMessageCount($user['userid'], $_SESSION['userid']).'</span></p>';
								echo '<p class="preview"><span id="isTyping_'.$user['userid'].'" class="isTyping"></span></p>';
								echo '</div>';
								echo '</div>';
								echo '</li>'; 
							}
							echo '</ul>';
						?>
					</div>

					<div id="bottom-bar">	<!-- Botonen inferiores del panel -->
						<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Agregar Contactos</span></button>
						<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Configuracion</span></button>					
					</div>
				</div>	<!-- FIN DEL PANEL IZQUIERDO -->	

				<div class="content" id="content">	<!-- PANEL DEL CHAT -->
					<div class="contact-profile" id="userSection">	<!-- Informacion e imagen del usuario con el que se tiene el chat.. -->
						<?php
							$userDetails = $chat->getUserDetails($currentSession);	// Detalles del usuario (nombre, etc..)
							foreach ($userDetails as $user) {										
								echo '<img src="userpics/'.$user['avatar'].'" alt="" />';	// Imagen del usuario
									echo '<p>'.$user['username'].'</p>';	// Nombre del usuario..
									echo '<div class="social-media">';	// Iconos de redes sociales (lado superior derecho...)
										echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
										echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
										echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
									echo '</div>';
							}	
						?>						
					</div>

					<div class="messages" id="conversation">		
						<?php
						echo $chat->getUserChat($_SESSION['userid'], $currentSession);	// Muestra los mensajes escritos (Historial)...				
						?>
					</div>
					
					<div class="message-input" id="replySection">	<!-- Seccion para enviar los mensajes... -->			
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Escribe tu mensaje..." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
							</div>
						</div>					
					</div>
				</div>	<!-- FIN DEL PANEL DEL CHAT -->
			</div>
		</div>
	<?php } else { ?>
		<br>
		<br>
		<strong><a href="login.php"><h3>Acceder al Chat</h3></a></strong>	<!-- Llamada a login -->		
	<?php } ?>
	<br>
	<br>	
<!--
	<div style="margin:50px 0px 0px 0px;"> <!-- ELIMINAR ->
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.baulphp.com/sistema-de-chat-en-vivo-con-ajax-php-y-mysql">Volver al Tutorial</a>		
	</div>	
	-->
</div>	
<?php include('footer.php');?>