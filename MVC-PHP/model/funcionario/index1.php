<?php 
    session_start();
    require_once("../../db/connection.php");
	include("../../controller/validarSesion.php");
	$sql = "SELECT * FROM usuario, tipo_usuario WHERE identificacion = '".$_SESSION['usuario']."' AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
	$usuarios = mysqli_query($mysqli, $sql) or die(mysqli_error());
	$usua = mysqli_fetch_assoc($usuarios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Menu Veterinario</title>
	<link rel="stylesheet" href="css/estilos.css"> 
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="shortcut icon" href="../../../img/logogato3.jpg" type="image/jpg">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<header>
		<span id="button-menu" class="fa fa-bars"></span>
		<span class="usuario"> <?php echo $usua['tipo_usuario']?></span>
		<span class="usuario"> 
			<a href="../../controller/salir.php"><img src="../../controller/image/salir.png" width=30></a>
			<?php echo $usua['nombre']?>
		</span>
		
		<nav class="navegacion">
			<ul class="menu" >
				<!-- TITULAR -->
				<li class="title-menu">Menu Veterinario</li>
				<!-- TITULAR -->

				<li><a href="mascota.php"><span class="fa fa-home icon-menu"></span>Mascota</a></li>

				<li><a href="visita.php"><span class="fa fa-home icon-menu"></span>Visita</a></li>

				<li class="item-submenu" menu="1">
					<a href="medicamentos.php"><span class="fa fa-suitcase icon-menu"></span>Medicamentos</a>
				<li class="item-submenu" menu="1">
					<a href="receta.php"><span class="fa fa-suitcase icon-menu"></span>Receta</a>
					
			</ul>
		</nav>
	</header>
</body>
</html>