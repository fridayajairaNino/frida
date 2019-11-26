<?php
	if(isset($_GET['editar'])){
		$editar_cod = $_GET['editar'];


		$consulta = "SELECT * FROM empleados WHERE Cod_empleado ='$editar_cod'";
		$ejecuta = mysqli_query($con,$consulta);

		$fila = mysqli_fetch_array($ejecuta);

					$Nomempl = $fila['Nombre'];
					$Puesto = $fila['Puesto'];
					$Horario = $fila['Horario']; 
	}
?>
</br>
<form action="" method="POST" accept-charset="utf-8">
	<input type="text" name="nombre" value="<?php echo $Nomempl; ?>">
	<input type="text" name="puesto" value="<?php echo $Puesto; ?>">
	<input type="text" name="hora" value="<?php echo $Horario; ?>">
	<input type="submit" name="update" value="Actualizar datos">
	
</form>

<?php
	if(isset($_POST['update'])){

		$actualizar_nombre = $_POST['nombre'];
		$actualizar_puesto = $_POST['puesto'];
		$actualizar_hora = $_POST['hora'];

	$actualizar = "UPDATE empleados SET Nombre ='$actualizar_nombre', Puesto='$actualizar_puesto', Horario='$actualizar_hora' WHERE Cod_empleado ='$editar_cod'";

		$ejecuta = mysqli_query($con,$actualizar);

		if($ejecuta){
			echo "<script> alert('Datos actualizados')</script>";
			echo "<script> window.open('From_empl.php')</script>";
		}

	}

?>


