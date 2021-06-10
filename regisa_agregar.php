
	<section class="buscar">
		<h1>Agregar amigos</h1>
		<form method="POST" action="regisa_asubmenu.php">
			<div class="alinea-icon">
				<img src="img/usuario.png" width="40px" height="40px">
				<input type="text" name="nombre" placeholder="Nombre de usuario" required="required">
			</div>
			
			<div class="alinea-icon">
				<img src="img/correo-electronico.png" width="40px" height="40px">
				<input type="text" name="email" placeholder="Correo electronico" required="required">
			</div>
			<div class="espacio-super">
				<input class="cancelar" type="submit" name="Buscar" value="Buscar" style="cursor: pointer;">
			</div>
			
		</form>
		<form action="regisa_principal.php">
			<input class="cancelar" type="submit" name="cancelar" value="Volver" style="cursor: pointer;">
		</form>
	</section>


<!--
<section>
	<h1>Registrar Amigos</h1>
	<form method="POST" action="registra.php">
		<img src="img/usuario.png" width="30px" height="30px">
		<input type="text" name="nombre" placeholder="Nombre de usuario"><br>
		
		<img src="img/correo-electronico.png" width="30px" height="30px">
		<input type="text" name="email" placeholder="Correo electronico"><br><br>

		<input class="confirmar" type="submit" name="B1" value="Agregar" style="cursor: pointer;">
		<br>
		<input class="cancelar" type="submit" name="cancelar" value="Cancelar" style="cursor: pointer;">
	</form>
</section> -->