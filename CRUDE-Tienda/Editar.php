<?php
	if(isset($_GET['editar'])){
		$editar_cod = $_GET['editar'];


		$consulta = "SELECT * FROM producto WHERE Cod_producto ='$editar_cod'";
		$ejecuta = mysqli_query($con,$consulta);

		$fila = mysqli_fetch_array($ejecuta);

					$Nompro = $fila['Nom_producto'];
					$Precventa = $fila['Prec_venta'];
					$Preccompra = $fila['Prec_compra'];
					$Proveedor = $fila['proveedor']; 
	}
?>
</br>
<form action="" method="POST" accept-charset="utf-8">
	<input type="text" name="nombre" value="<?php echo $Nompro; ?>">
	<input type="text" name="preventa" value="<?php echo $Precventa; ?>">
	<input type="text" name="precompra" value="<?php echo $Preccompra; ?>">
	<input type="text" name="prov" value="<?php echo $Proveedor; ?>">
	<input type="submit" name="update" value="Actualizar datos">
	
</form>

<?php
	if(isset($_POST['update'])){

		$actualizar_nombre = $_POST['nombre'];
		$actualizar_pventa = $_POST['preventa'];
		$actualizar_pcompra = $_POST['precompra'];
		$actualizar_prov = $_POST['prov'];

	$actualizar = "UPDATE producto SET Nom_producto ='$actualizar_nombre', Prec_venta='$actualizar_pventa', Prec_compra='$actualizar_pcompra', proveedor='$actualizar_prov' WHERE Cod_producto ='$editar_cod'";

		$ejecuta = mysqli_query($con,$actualizar);

		if($ejecuta){
			echo "<script> alert('Datos actualizados')</script>";
			echo "<script> window.open('Form_prod.php')</script>";
		}

	}

?>


