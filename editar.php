<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: IniciarSesion.php');
}
?>

<?php
// incluir la conexión a la base de datos
include_once("conexion.php");

if(isset($_POST['Editar']))
{	
	$id=$_POST['id'];
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
	} else {	
		//actualizando la tabla
		$result = mysqli_query($mysqli, "UPDATE `pedidos` SET `nombrecliente`='$nomCliente',`fechap`='$fechap',`idprod`='$idprod',`direccion`='$Direc',`tipopago`='$tipoP',`telefono`='$telefono',`total`='$total' WHERE id=$id");
		
		//redirigiendo a la página de visualización. En nuestro caso, es ver.php
		header("Location: ver.php");
	}
}
?>
<?php
//obteniendo identificación de la URL
$id = $_GET['id'];

//seleccionar datos asociados con esta identificación en particular
$resultado = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE id=$id");

while($res = mysqli_fetch_array($resultado))
{
	$nomCli = $res['nombrecliente'];
	$fechaP = $res['fechap'];
	$idProd = $res['idprod'];
	$direc = $res['direccion'];
	$tipoP = $res['tipopago'];
	$tel = $res['telefono'];
	$tot = $res['total'];
}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver productos</a> | <a href="CerrarSesion.php">Cerrar Sesión</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
		<tr> 
				<td>Nombre del cliente:</td>
				<td><input type="text" name="nomCliente" value="<?php echo $nomCli; ?>" ></td>
			</tr>
			<tr> 
				<td>fecha del pedido:</td>
				<td><input type="date" name="fechap" value="<?php echo $fechaP; ?>" ></td>
			</tr>
			<tr> 
				<td>ID del producto:</td>
				<td><input type="text" name="idprod" value="<?php echo $idProd; ?>" ></td>
			</tr>
			<tr> 
				<td>Dirección:</td>
				<td><input type="text" name="Direc" value="<?php echo $direc; ?>" ></td>
			</tr>
			<tr> 
				<td>Tipo de pago:</td>
				<td><input type="text" name="tipoP" value="<?php echo $tipoP; ?>" ></td>
			</tr>
			<tr> 
				<td>Telefono:</td>
				<td><input type="text" name="Telefono" value="<?php echo $tel; ?>" ></td>
			</tr>
			<tr> 
				<td>Total:</td>
				<td><input type="text" name="total" value="<?php echo $tot; ?>" ></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id;?>></td>
				<td><input type="submit" name="Editar" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
