<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: IniciarSesion.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//incluyendo el archivo de conexión de la base de datos
include_once("conexion.php");

if(isset($_POST['Agregar'])) {	
	$idC = $_SESSION['id'];
	$nomCliente = $_POST['nomCliente'];
	$fechap = $_POST['fechap'];
	$idprod = $_POST['idprod'];
	$Direc = $_POST['Direc'];
	$tipoP = $_POST['tipoP'];
	$telefono = $_POST['Telefono'];
	$total=$_POST['total'];
	$IdAcceso = $_SESSION['id'];
		
	// comprobando campos vacíos
	if(empty($nomCliente) || empty($fechap) || empty($idprod) || empty($Direc) || empty($tipoP) || empty($telefono) || empty($total)) {				
		
		if(empty($nomCliente)) {
			echo "<font color='red'>El campo de nombre de cliente está vacío.</font><br/>";
		}
		
		if(empty($fechap)) {
			echo "<font color='red'>El campo de fecha de pago está vacío.</font><br/>";
		}
		if(empty($idprod)) {
			echo "<font color='red'>El campo de ID del producto está vacío.</font><br/>";
		}
		
		if(empty($Direc)) {
			echo "<font color='red'>El campo de Dirección está vacío.</font><br/>";
		}
		
		if(empty($tipoP)) {
			echo "<font color='red'>El campo de tipo de pago está vacío.</font><br/>";
		}
		if(empty($telefono)) {
			echo "<font color='red'>El campo de telefono está vacío.</font><br/>";
		}
		if(empty($total)) {
			echo "<font color='red'>El campo de total está vacío.</font><br/>";
		}
		
		//enlace a la página anterior
		echo 'No se pudo agregar el producto';
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		
		// si todos los campos están llenos (no vacíos)
		//insertar datos en la base de datos	
		$resultado = mysqli_query($mysqli, "INSERT INTO `pedidos`( `idcliente`, `nombrecliente`, `fechap`, `idprod`, `direccion`, `tipopago`, `telefono`, `total`, `login_id`) VALUES('$idC','$nomCliente','$fechap','$idprod','$Direc','$tipoP','$telefono','$total', '$IdAcceso')");
		
		//mostrar mensaje de éxito
		echo "<font color='green'>Datos agregados exitosamente.";
		echo "<br/><a href='ver.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
