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
	<link href="lib/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="lib/js/validar.js"></script>
</head>
<body>
<div class="container">
 <div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
	<H3>Todo joya, tamo listos.</H3>
	<input class="btn btn-md btn-success" type="submit" value="Enviar" action="OnClick(if(sexook(){<?php header("Location: ok.php")?>});">
	<hr>
	</form>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>

