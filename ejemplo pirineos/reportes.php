<!DOCTYPE html>
<html>
	<head>
		<title>Pirineos</title>
		<meta charset="utf-8">
		<link href="estilos.css" rel="stylesheet" type="text/css">
		<link href="imagenes/logo_pirineos.png" rel="shortcut icon" type="image/png">
		<script src="reportes.js" type="text/JavaScript"></script>
	</head>
	<body><center>
	<?php
		include 'utilerias.php';
		$op=$_GET['op'];
		if ($op==0) formulario();
		if (($op==1) || ($op==3)) r1();
		if ($op==2)  r2();

		function r1(){
			global $op;
			//echo "op=".$op;
			$cs=conecta();
			if ($op==1) $query="SELECT * FROM productos, tipos WHERE tipo_prod=cve_tipo ORDER BY nom_prod";
			if ($op==3){
				$cve_tipo=$_GET['cve_tipo'];
				$query="SELECT * FROM productos, tipos WHERE tipo_prod='$cve_tipo' and tipo_prod=cve_tipo ORDER BY nom_prod";
			}
			$sql=mysqli_query($cs,$query);
			echo "
				<table border='3' width='90%'>
					<tr align='center'>
						<td colspan='4'>
						<p class='titulo36' id='titulo18'>
						Listado de productos
						</p>
					</tr align='center'>
					<tr align='center'>
						<td><p class='titulo36' id='titulo18'>Clave Prod.</p></td>
						<td><p class='titulo36' id='titulo18'>Nombre Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Tipo Producto</p></td>
						<td><p class='titulo36' id='titulo18'>Presentación Producto</p></td>
					</tr>
			";
			while ($reg=mysqli_fetch_object($sql)){
				$x='';
				echo "<tr align='center'>
						<td><p>$reg->cve_prod</p></td>
						<td><p>
							<a href='productos.php?op=3&cve_prod=$reg->cve_prod&nom_prod=$x&tipo_prod=$x&presenta_prod=$x'>
									$reg->nom_prod
							</a>
						</p></td>
						<td><p>$reg->nom_tipo</p></td>
						<td><p>$reg->presenta_prod</p></td>
					  </tr>
				";
			}
			echo "</table>";
		}

		function r2(){
			global $op;
			$cs=conecta();
			$query="SELECT * FROM tipos  ORDER BY nom_tipo";
			if ($op==3){
				$cve_tipo=$_GET['cve_tipo'];
				$query="SELECT * FROM tipos WHERE cve_tipo='$cve_tipo' ORDER BY nom_tipo";
			}
			$sql=mysqli_query($cs,$query);
			echo "
				<table border='3' width='90%'>
					<tr align='center'>
						<td colspan='2'>
						<p class='titulo36' id='titulo18'>
						Listado de tipos
						</p>
					</tr align='center'>
					<tr align='center'>
						<td><p class='titulo36' id='titulo18'>Clave Tipo</p></td>
						<td><p class='titulo36' id='titulo18'>Nombre Tipo</p></td>
					</tr>
			";
			while ($reg=mysqli_fetch_object($sql)){
				$x='';
				echo "<tr align='center'>
						<td><p>$reg->cve_tipo</p></td>
						<td><p>
							<a href='tipos.php?op=3&cve_tipo=$reg->cve_tipo&nom_tipo=$x'>
									$reg->nom_tipo
							</a>
						</p></td>
					  </tr>
				";
			}
			echo "</table>";
		}

		function formulario(){
			echo "
				<br><br>
				<form name='f_reportes'>
				<table border='3' width = '80%'>
					<tr align='center'>
						<td colspan='3'>
							<p class='titulo36' id='titulo18'>
							Reportes del Sistema
							</p>
						</td>
					</tr>
					<tr align='center'>
						<td colspan='2'><p>Listado de Productos</p></td>
						<td><input name='b_r1' type='button' class='boton' value='Ejecutar' onClick='r1(1)'>
						</td>
					</tr>
					<tr align='center'>
						<td colspan='2'><p>Listado de Tipos</p></td>
						<td><input name='b_r2' type='button' class='boton' value='Ejecutar' onClick='r2(2)'>
						</td>
					</tr>
					<tr align='center'>
						<td><p>Listado de Productos de un tipo determinado</p></td>
						<td>
							<p>Debe indicar la clave del tipo a filtrar</p> 
							<input name='cve_tipo' type='text' class='campo'>
						</td>
						<td><input name='b_r3' type='button' class='boton' value='Ejecutar' onClick='r3(3)'>
						</td>
					</tr>
					<tr align='center'>
						<td><p>Consulta por nombre de producto</p></td>
						<td>
							<p>Debe seleccionar el nombre del producto</p> 
							<input name='nom_prod' type='search' class='campo' list='lista_nom_prod'>
						</td>
						<datalist id='lista_nom_prod'>
			";
						$cs=conecta();
						$query="SELECT * FROM productos";
						$sql=mysqli_query($cs,$query);
						while ($reg=mysqli_fetch_object($sql)){
							$cve_prod=$reg->cve_prod;
							$nom_prod=$reg->nom_prod;
							echo "<option value='$cve_prod'>$nom_prod</option>";
						}

			echo "		</datalist>
						<td><input name='b_r4' type='button' class='boton' value='Ejecutar' onClick='r4(4)'>
						</td>
					</tr>
					<tr align='center'>
						<td><p>Consulta por nombre de tipo</p></td>
						<td>
							<p>Debe seleccionar el nombre del tipo</p> 
							<input name='nom_tipo' type='text' class='campo'>
						</td>
						<td><input name='b_r5' type='button' class='boton' value='Ejecutar'>
						</td>
					</tr>
				</table>
				</form>
			";
		}
	?>
	</center></body>
</html>