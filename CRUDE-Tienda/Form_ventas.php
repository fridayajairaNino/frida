<!DOCTYPE html>
<meta charset="utf-8">

<?php
$con = mysqli_connect("localhost","root","","tienda2") or die("Error");
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CRUD</title>
	<link rel="stylesheet" href="">
</head>

<body>
	<header>
      <h1>CRUD BASICO PARA UNA TIENDA </h1>      
    </header>
	<ul class="navbar">
	  <li><a href="Form_prod.php">PRODUCTOS</a>
	  <li><a href="Form_prov.php">PROVEEDORES</a>
	  <li><a href="Form_empl.php">EMPLEADOS</a>
	  <li><a href="Form_ventas.php">VENTAS</a>
	</ul>
	
	<table width="500" border="2" style="background-color: #11111">
		<caption>LECTURA DE DATOS</caption>
	
			<tr>
				<th>Codigo de venta</th>
				<th>Codigo de empleado</th>
				<th>Codigo de producto</th>
				<th>Fecha</th>
				<th>Total</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>

			<?php
				$consulta = "SELECT * FROM ventas";
				$ejecuta = mysqli_query($con, $consulta);

				$i = 0;

				while($fila = mysqli_fetch_array($ejecuta)){
					$codventa = $fila['Cod_venta'];
					$codempl = $fila['Cod_empleado'];
					$codprod = $fila['Cod_producto'];
					$fecha = $fila['Fecha'];
					$total = $fila['Total'];

					$i++; 
			
			?>

			<tr align="center">
				<td><?php echo $codventa; ?></td>
				<td><?php echo $codempl; ?></td>
				<td><?php echo $codprod; ?></td>
				<td><?php echo $fecha; ?></td>
				<td><?php echo $total; ?></td>
				<td><a href="Form_ventas.php?editar=<?php echo $codventa; ?>">Editar</a></td>
				<td><a href="Form_ventas.php?borrar=<?php echo $codventa; ?>">Borrar</a></td>
			</tr>
		<?php } ?>
	</table>

	<?php
		if(isset($_GET['editar'])){
			include("Editar4.php");
		}
	?>

	<?php
		if(isset($_GET['borrar'])){
			$borrar_cod = $_GET['borrar'];

			$borrar = "DELETE FROM ventas WHERE Cod_venta = '$borrar_cod'";
			$ejecuta = mysqli_query($con, $borrar);

			if($ejecuta){
			echo "<script> alert('Los datos han sido eliminados')</script>";
			echo "<script> window.open('Form_ventas.php')</script>";
		}
		}
	?>

</body>
</html>



