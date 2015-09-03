 <?php

session_start();

if(isset($_SESSION['user'])){
	header('Location: index.php');
}

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
<form class="form-horizontal" method="post" role="form" action="ok.php">
	<div class="form-group">
		<label for="user" class="col-lg-3 control-label">Usuario</label>
	    <div class="col-lg-8">
			<input type="text" class="form-control" name="user" id="user" pattern="[0-9A-Za-z'áéíóúÁÉÍÓÚ]{2,79}"  placeholder="Usuario" required>
		</div>
	</div>
	<div class="form-group">
		<label for="pass" class="col-lg-3 control-label">Contraseña</label>
		<div class="col-lg-8">
			<input type="password" class="form-control" name="pass" id="pass" pattern="{2,79}" title="La contraseña debe tener al menos 2 dígitos" placeholder="Apellido(s)" required>
	    </div>
	</div>
	<div class="form-group">
		<div class="col-lg-8">
			<a href="olvide.php">¿Olvidaste tu contraseña?</a>
	    </div>
	</div>
</form>