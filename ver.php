<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: Acceso.php');
}
?>

<?php
//incluyendo el archivo de conexión de la base de datos
include_once("conexion.php");

//Obteniendo datos en orden descendente (la última entrada primero)
$result = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Inicio de página</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevos datos</a> | <a href="CerrarSesion.php">Cerrar sesión</a>
	<br>
	<center><h3>TABLA PEDIDOS</h3></center>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>ID Pedido</td>
			<td>ID cliente</td>
			<td>Nombre cliente</td>
			<td>Fecha pedido</td>
			<td>ID producto</td>
			<td>Dirección</td>
			<td>Tipo Pago</td>
			<td>Telefono</td>
			<td>Total</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			$id=$res['id'];
			echo "<td>".$id."</td>";
			echo "<td>".$res['idcliente']."</td>";
			echo "<td>".$res['nombrecliente']."</td>";
			echo "<td>".$res['fechap']."</td>";
			echo "<td>".$res['idprod']."</td>";
			echo "<td>".$res['direccion']."</td>";
			echo "<td>".$res['tipopago']."</td>";
			echo "<td>".$res['total']."</td>";
			echo "<td><a href=\"editar.php?id=$id\">Editar</a> | <a href=\"eliminar.php?id=$id\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
