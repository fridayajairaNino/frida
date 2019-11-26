<?php
	if(isset($_GET['editar'])){
		$editar_cod = $_GET['editar'];


		$consulta = "SELECT * FROM ventas WHERE Cod_venta ='$editar_cod'";
		$ejecuta = mysqli_query($con,$consulta);

		$fila = mysqli_fetch_array($ejecuta);

					$codempl = $fila['Cod_empleado'];
					$codprod = $fila['Cod_producto'];
					$fecha = $fila['Fecha'];
					$total = $fila['Total'];
	}
?>
</br>
<form action="" method="POST" accept-charset="utf-8">
	<input type="text" name="coempl" value="<?php echo $codempl; ?>">
	<input type="text" name="coprod" value="<?php echo $codprod; ?>">
	<input type="datetime" name="fechaventa" value="<?php echo $fecha; ?>">
	<input type="text" name="totalventa" value="<?php echo $total; ?>">
	<input type="submit" name="update" value="Actualizar datos">
	
</form>

<?php
	if(isset($_POST['update'])){

		$actualizar_cempl = $_POST['coempl'];
		$actualizar_cprod = $_POST['coprod'];
		$actualizar_fecha = $_POST['fechaventa'];
		$actualizar_total = $_POST['totalventa'];

	$actualizar = "UPDATE ventas SET Cod_empleado='$actualizar_cempl', Cod_producto='$actualizar_cprod, Fecha='$actualizar_fecha', Total= '$actualizar_total' WHERE Cod_venta ='$editar_cod'";

		$ejecuta = mysqli_query($con,$actualizar);

		if($ejecuta){
			echo "<script> alert('Datos actualizados')</script>";
			echo "<script> window.open('Form_ventas.php')</script>";
		}

	}

?>


