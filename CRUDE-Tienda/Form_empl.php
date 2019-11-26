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
	<form action="Form_empl.php" method="POST" accept-charset="utf-8">
		<p>
				<label>Codigo de empleado</label>
				<input type="text" name="codigo" placeholder="Escribe el código"><br/>
		</p>
		<p>
				<label>Nombre</label>
				<input type="text" name="nombre" placeholder="Nombre de empleado"><br/>
		</p>
		<p>
				<label>Puesto</label>
				<input type="text" name="puesto" placeholder="Puesto de empleado"><br/>
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

			$Codempl = $_POST['codigo'];  
			$Nomempl = $_POST['nombre'];
			$Puesto = $_POST['puesto'];
			$Horario = $_POST['hora'];

			$crear = "INSERT INTO empleados(Cod_empleado, Nombre, Puesto, Horario) VALUES ('$Codempl','$Nomempl','$Puesto','$Horario')";

			$ejecuta = mysqli_query($con,$crear);

				echo "<h3>Los datos han sido creados correctamente</h3>";
		}
	?>
	<br/>

	<table width="500" border="2" style="background-color: #11111">
		<caption>LECTURA DE DATOS</caption>
	
			<tr>
				<th>Codigo de empleado</th>
				<th>Nombre</th>
				<th>Puesto</th>
				<th>Horario</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>

			<?php
				$consulta = "SELECT * FROM empleados";
				$ejecuta = mysqli_query($con, $consulta);

				$i = 0;

				while($fila = mysqli_fetch_array($ejecuta)){
					$Codempl = $fila['Cod_empleado'];
					$Nomempl = $fila['Nombre'];
					$Puesto = $fila['Puesto'];
					$Horario = $fila['Horario'];

					$i++; 
			
			?>

			<tr align="center">
				<td><?php echo $Codempl; ?></td>
				<td><?php echo $Nomempl; ?></td>
				<td><?php echo $Puesto; ?></td>
				<td><?php echo $Horario; ?></td>
				<td><a href="Form_empl.php?editar=<?php echo $Codempl; ?>">Editar</a></td>
				<td><a href="Form_empl.php?borrar=<?php echo $Codempl; ?>">Borrar</a></td>
			</tr>
		<?php } ?>
	</table>

	<?php
		if(isset($_GET['editar'])){
			include("Editar3.php");
		}
	?>

	<?php
		if(isset($_GET['borrar'])){
			$borrar_cod = $_GET['borrar'];

			$borrar = "DELETE FROM empleados WHERE Cod_empleado = '$borrar_cod'";
			$ejecuta = mysqli_query($con, $borrar);

			if($ejecuta){
			echo "<script> alert('Los datos han sido eliminados')</script>";
			echo "<script> window.open('Form_empl.php')</script>";
		}
		}
	?>

</body>
</html>



