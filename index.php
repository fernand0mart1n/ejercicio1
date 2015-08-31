<?php

session_start();

require('datos.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="lib/js/chiches.js"></script>
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
	<H3 align="center">Bienvenido al registro de personas</H3>
	<img src="img/personas.gif" style="width: 100%;max-height: 100%";>
	<img src="img/dni.jpg" style="width: 100%;max-height: 100%";>
	<br><br>
	<a href="ejercicio.php"><input class="btn btn-md btn-success" style="display: block; margin: 0 auto;" type="submit" value="Ingresar"></a>
	<hr>
	</form>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>

