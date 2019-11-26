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
	<form action="Form_prod.php" method="POST" accept-charset="utf-8">
		<p>
				<label>Codigo de producto</label>
				<input type="text" name="codigo" placeholder="Escribe el código de producto"><br/>
		</p>
		<p>
				<label>Nombre</label>
				<input type="text" name="nombre" placeholder="Nombre de producto"><br/>
		</p>
		<p>
				<label>Precio de venta</label>
				<input type="text" name="preventa" placeholder="Escribe el precio"><br/>
		</p>
		<p>
				<label>Precio de compra</label>
				<input type="text" name="precompra" placeholder="Escribe el precio"><br/>
		</p>
		<p>
				<label>Proveedor</label>
				<input type="text" name="prov" placeholder="Ecriba el nombre del proveedor"><br/>
		</p>
		<p>
				<input type="submit" name="insert" value="Insertar Datos">
		</p>
	</form>

	<?php
		if(isset($_POST['insert'])){

			$Codpro = $_POST['codigo'];  
			$Nompro = $_POST['nombre'];
			$Precventa = $_POST['preventa'];
			$Preccompra = $_POST['precompra'];
			$Proveedor = $_POST['prov'];

			$crear = "INSERT INTO producto(Cod_producto, Nom_producto, Prec_venta, Prec_compra, proveedor) VALUES ('$Codpro','$Nompro','$Precventa','$Preccompra','$Proveedor')";

			$ejecuta = mysqli_query($con,$crear);

				echo "<h3>Los datos han sido creados correctamente</h3>";
		}
	?>
	<br/>

	<table width="500" border="2" style="background-color: #11111">
		<caption>LECTURA DE DATOS</caption>
	
			<tr>
				<th>Codigo de producto</th>
				<th>Nombre</th>
				<th>Precio de venta</th>
				<th>Precio de compra</th>
				<th>Proveedor</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>

			<?php
				$consulta = "SELECT * FROM producto";
				$ejecuta = mysqli_query($con, $consulta);

				$i = 0;

				while($fila = mysqli_fetch_array($ejecuta)){
					$Codpro = $fila['Cod_producto'];
					$Nompro = $fila['Nom_producto'];
					$Precventa = $fila['Prec_venta'];
					$Preccompra = $fila['Prec_compra'];
					$Proveedor = $fila['proveedor'];

					$i++; 
			
			?>

			<tr align="center">
				<td><?php echo $Codpro; ?></td>
				<td><?php echo $Nompro; ?></td>
				<td><?php echo $Precventa; ?></td>
				<td><?php echo $Preccompra; ?></td>
				<td><?php echo $Proveedor; ?></td>
				<td><a href="Form_prod.php?editar=<?php echo $Codpro; ?>">Editar</a></td>
				<td><a href="Form_prod.php?borrar=<?php echo $Codpro; ?>">Borrar</a></td>
			</tr>
		<?php } ?>
	</table>

	<?php
		if(isset($_GET['editar'])){
			include("Editar.php");
		}
	?>

	<?php
		if(isset($_GET['borrar'])){
			$borrar_cod = $_GET['borrar'];

			$borrar = "DELETE FROM producto WHERE Cod_producto = '$borrar_cod'";
			$ejecuta = mysqli_query($con, $borrar);

			if($ejecuta){
			echo "<script> alert('Los datos han sido eliminados')</script>";
			echo "<script> window.open('Form_prod.php')</script>";
		}
		}
	?>

</body>
</html>



