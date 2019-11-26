<?php
	if(isset($_GET['editar'])){
		$editar_cod = $_GET['editar'];


		$consulta = "SELECT * FROM proveedor WHERE Cod_proveedor ='$editar_cod'";
		$ejecuta = mysqli_query($con,$consulta);

		$fila = mysqli_fetch_array($ejecuta);

					$Nomprov = $fila['Nombre'];
					$Hora = $fila['Horario'];
		}
?>
</br>
<form action="" method="POST" accept-charset="utf-8">
	<input type="text" name="nombre" value="<?php echo $Nomprov; ?>">
	<input type="text" name="hora" value="<?php echo $Hora; ?>">
	<input type="submit" name="update" value="Actualizar datos">
	
</form>

<?php
	if(isset($_POST['update'])){

		$actualizar_nombre = $_POST['nombre'];
		$actualizar_hora = $_POST['hora'];

	$actualizar = "UPDATE proveedor SET Nombre ='$actualizar_nombre', Horario='$actualizar_hora' WHERE Cod_proveedor ='$editar_cod'";

		$ejecuta = mysqli_query($con,$actualizar);

		if($ejecuta){
			echo "<script> alert('Datos actualizados')</script>";
			echo "<script> window.open('Form_prov.php')</script>";
		}

	}

?>


