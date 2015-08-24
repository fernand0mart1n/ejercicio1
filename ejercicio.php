<!DOCTYPE html>
<html>
<head>
	<title>.:: Ejercicio ::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="lib/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
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
	Nombre(s):<br>
	<input type="text" name="nombre">
	<br><br>
	Apellido(s):<br>
	<input type="text" name="apellido">
	<br><br>
	Tipo de documento:<br>
	<select>
		<option value="dni">DNI</option>
		<option value="lc">LC</option>
		<option value="le">LE</option>
	</select>
	<br><br>
	Número de documento:<br>
	<input type="text" name="documento">
	<br><br>
	Fecha de nacimiento:<br>
	<input type="date" name="fecha">
	<br><br>
	Nacionalidad:<br>
	<select>
		<option value="argentina">Argentina</option>
		<option value="bolivia">Bolivia</option>
		<option value="brasil">Brasil</option>
		<option value="chile">Chile</option>
		<option value="colombia">Colombia</option>
		<option value="peru">Perú</option>
		<option value="uruguay">Uruguay</option>
		<option value="venezuela">Venezuela</option>
	</select>
	<br><br>
	<input type="button" value="Volver">
	<input type="submit" value="Enviar">
	</form>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>
