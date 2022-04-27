<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
		<script src="tipos.js" type="text/JavaScript"></script>
	</head>
	<body><center>
		<?php
			include 'utilerias.php';
			$op=$_GET['op'];
			if ($op==0) formulario();
			if ($op==1) altas();
			if ($op==2) bajas();
			if ($op==3) consultas();

		function tomar_datos(){
			global $cve_tipo, $nom_tipo;
			$cve_tipo=$_GET['cve_tipo'];
			$nom_tipo=$_GET['nom_tipo'];
		}

		function altas(){
			global $cve_tipo, $nom_tipo;
			tomar_datos();

			// Verifica que no se duplique la clave del producto
			$cs=conecta();
			$query="SELECT * FROM tipos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg!=mysqli_fetch_array($sql)){
				msg("Error, clave de tipo se duplica en base de datos","rojo");
			}
			else{
				$query="INSERT INTO tipos VALUES ('$cve_tipo','$nom_tipo')";
				$sql=mysqli_query($cs,$query);
				msg("El registro ha sido grabado correctamente","verde");
			}
		} // Termina altas

		function bajas(){
			global $cve_tipo, $nom_tipo;
			consultas();
			$cs=conecta();
			$query="DELETE FROM tipos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			if (mysqli_affected_rows($cs)!=0){
				msg("El registro ha sido eliminado","verde");
			}
		} // Termina bajas

		function consultas(){
			global $cve_tipo, $nom_tipo;
			tomar_datos();
			//echo "cve_prod=".$cve_prod;
			$cs=conecta();
			$query="SELECT * FROM tipos WHERE cve_tipo='$cve_tipo'";
			$sql=mysqli_query($cs,$query);
			$reg=mysqli_fetch_object($sql);
			if ($reg==mysqli_fetch_array($sql)){
				msg("Error, clave de tipo inexistente en base de datos","rojo");
			}
			else{
				$nom_tipo=$reg->nom_tipo;
				//echo "cve_prod=".$cve_prod." nom_prod=".$nom_prod." tipo_prod=".$tipo_prod." presenta_prod=".$presenta_prod;
				 formulario();
			}
		} // Termina consultas

		function formulario(){
			global $cve_tipo, $nom_tipo;
			echo "
				<br><br>
				<form name='f_tipos'>
				<table border='10%' width='80%'>
					<tr align='center'>
						<td><p>Clave del tipo</p></td>
						<td><input name='cve_tipo' type='text' class='campo' maxlength='5' value='$cve_tipo'></td>
					</tr>
					<tr align='center'>
						<td><p>Nombre del tipo</p></td>
						<td><input name='nom_tipo' type='text' class='campo' maxlength='50' value='$nom_tipo'></td>
					</tr>
					<tr align='center'>
						<td colspan='2'>
							<table width='100%'>
								<tr align='center'>
									<td><input name='b_altas' type='button' class='boton' value='Altas' onClick='altas()'>
									</td>
									<td><input name='b_bajas' type='button' class='boton' value='Bajas' onClick='bajas()'>
									</td>
									<td><input name='b_consultas' type='button' class='boton' value='Consultas' onClick='consultas()'>
									</td>
									<td><input name='b_reset' type='reset' class='boton' value='Reiniciar' id='rojo'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</form>
			";
		} //Termina formulario
		?>
	</center></body>
</html>