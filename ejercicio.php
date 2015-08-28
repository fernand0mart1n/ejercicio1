<?php

session_start();

require('datos.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>.:: Ejercicio ::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="lib/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/js/validar.js"></script>
	<link href="lib/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
 <div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
	<H3>Ingrese sus datos:</H3>
	<form method="post">
	Apellido(s): 
	<input type="text" title="Debe ingresar su(s) nombre(s)" name="apellido" placeholder="Ingrese su(s) apellido(s)" required>
	<br><br>
	Nombre(s): 
	<input type="text" title="Debe ingresar su(s) apellido(s)" name="nombre" placeholder="Ingrese su(s) nombre(s)" required>
	<br><br>
	Sexo: <br>
	<input type="radio" name="sex" id="masc" value="male"> Masculino 
	<input type="radio" name="sex" id="feme" value="female"> Femenino<br><br>
	Tipo de documento: 
	<select>
		<?php foreach ($tipos as $tipo){?>
			<option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
		<?php };?>
	</select>
	<br><br>
	Número de documento: 
	<input type="text" title="Debe ingresar su documento" name="documento" placeholder="Ingrese su documento" required>
	<br><br>
	Fecha de expedición: 
	<input type="date" title="Fecha correspondiente al día de la expedición del documento (hoy)" name="fecha" value="<?php echo date('Y-m-d'); ?>" disabled>
	<br><br>
	Fecha de vencimiento: 
	<input type="date" title="Fecha correspondiente al día de vencimiento del documento" name="fecha" value="<?php echo date('Y-m-d', strtotime("+15 Years")); ?>" disabled>
	<br><br>
	Nacionalidad: 
	<select>
		<?php foreach ($paises as $pais){?>
			<option value="<?php echo $pais;?>"><?php echo $pais;?></option>
		<?php };?>
	</select><br><br>
	Domicilio: 
	<input type="text" title="Debe ingresar su domicilio" name="domicilio" placeholder="Ingrese su domicilio" required>
	<br><br>
	Fecha y lugar de nacimiento: 
	<select>
		<option value="dia">Día</option>
	</select>
	<select>
		<option value="mes">Mes</option>
	</select>
	<select>
		<option value="año">Año</option>
	</select>
	<select>
		<?php foreach ($provincias as $provincia){?>
			<option value="<?php echo $provincia;?>"><?php echo $provincia;?></option>
		<?php };?>
	</select><br><br>
	¿Es donante? <br>
	<input type="radio" name="don" id="donsi" value="si"> Si 
	<input type="radio" name="don" id="donno" value="no"> No<br><br>
	Subir foto:
	<input type="file" value="subir" name="foto">
	<br>
	<input class="btn btn-md btn-danger" type="button" value="Volver" onclick="window.location='index.php';">
	<input class="btn btn-md btn-success" type="submit" value="Enviar" onclick="if(sexook()){window.location='ok.php';}">
	<hr>
	</form>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>

