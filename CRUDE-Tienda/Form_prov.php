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
	<form action="Form_prov.php" method="POST" accept-charset="utf-8">
		<p>
				<label>Codigo de proveedor</label>
				<input type="text" name="codigo" placeholder="Escribe el código"><br/>
		</p>
		<p>
				<label>Nombre</label>
				<input type="text" name="nombre" placeholder="Nombre de proveedor"><br/>
		</p>
		<p>
				<label>Horario</label>
				<input type="time" name="hora"><br/>
		</p>
		<p>
				<input type="submit" name="insert" value="Insertar Datos">
		</p>
	</form>

	<?php
		if(isset($_POST['insert'])){

			$CoProv = $_POST['codigo'];  
			$Nomprov = $_POST['nombre'];
			$Hora = $_POST['hora'];

			$crear = "INSERT INTO proveedor(Cod_proveedor, Nombre, Horario) VALUES ('$CoProv','$Nomprov','$Hora')";

			$ejecuta = mysqli_query($con,$crear);

				echo "<h3>Los datos han sido creados correctamente</h3>";
		}
	?>
	<br/>

	<table width="500" border="2" style="background-color: #11111">
		<caption>LECTURA DE DATOS</caption>
	
			<tr>
				<th>Codigo de proveedor</th>
				<th>Nombre</th>
				<th>Horario</th>
				<th>Codigo de producto</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>

			<?php
				$consulta = "SELECT * FROM proveedor";
				$ejecuta = mysqli_query($con, $consulta);

				$i = 0;

				while($fila = mysqli_fetch_array($ejecuta)){
					$CoProv = $fila['Cod_proveedor'];
					$Nomprov = $fila['Nombre'];
					$Hora = $fila['Horario'];
					$Codprod = $fila['Cod_producto'];

					$i++; 
			
			?>

			<tr align="center">
				<td><?php echo $CoProv; ?></td>
				<td><?php echo $Nomprov; ?></td>
				<td><?php echo $Hora; ?></td>
				<td><?php echo $Codprod; ?></td>
				<td><a href="Form_prov.php?editar=<?php echo $CoProv; ?>">Editar</a></td>
				<td><a href="Form_prov.php?borrar=<?php echo $CoProv; ?>">Borrar</a></td>
			</tr>
		<?php } ?>
	</table>

	<?php
		if(isset($_GET['editar'])){
			include("Editar2.php");
		}
	?>

	<?php
		if(isset($_GET['borrar'])){
			$borrar_cod = $_GET['borrar'];

			$borrar = "DELETE FROM proveedor WHERE Cod_proveedor = '$borrar_cod'";
			$ejecuta = mysqli_query($con, $borrar);

			if($ejecuta){
			echo "<script> alert('Los datos han sido eliminados')</script>";
			echo "<script> window.open('Form_prov.php')</script>";
		}
		}
	?>

</body>
</html>



