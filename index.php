<?php session_start(); ?>
<html>
<head>
	<title>Inicio de la página</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		¡Bienvenido a The Collector Shop!
	</div>
	<?php
	if(isset($_SESSION['validar'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
			Bienvenido(a) <?php echo $_SESSION['nombre'] ?> ! <a href='CerrarSesion.php'>Cerrar sesión</a><br/>
		<br/>
		<a href='ver.php'>Ver y agregar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar conectado para ver esta página.<br/><br/>";
		echo "<a href='IniciarSesion.php'>Iniciar sesión</a> | <a href='registro.php'>Registrate</a>";
	}
	?>
	<div id="footer">
		Creado por Jimenez Guevara Haydee Esmeralda. Negocio: <a href="https://hejimguev.github.io/JimenezHWeb_5J---TheCollectorShop/index.html" title="THE COLLECTOR SHOP">THE COLLECTOR SHOP</a>
	</div>
</body>
</html>
