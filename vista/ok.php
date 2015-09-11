<?php

session_start();

require "ejercicio.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>.:: Ejercicio ::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="../lib/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
	<link href="../lib/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="../lib/js/validar.js"></script>
</head>
<body>
<div class="container">
 <div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
	<?php if ($errores): ?>
		<H3>Hubieron errores al procesar sus datos:</H3>
		<ul style="color: #f00;">
	      <?php foreach ($errores as $error): ?>
	         <li> <?php echo $error ?> </li>
	      <?php endforeach; ?>
	      <form method="post" action="index.php">
		  <input class="btn btn-md btn-danger" type="submit" value="Volver">
	   </ul>
	<?php else:?>
		<H3>Sus datos:</H3>
		<ul style="color: #f00;">
	         <li>Nombre: <?php echo $nombre ?> </li>
	         <li>Apellido: <?php echo $apellido ?> </li>
	         <li>Sexo: <?php echo $sexo ?> </li>
	         <li>Tipo de documento: <?php echo $tipodoc ?> </li>
	         <li>Documento: <?php echo $documento ?> </li>
	         <li>Fecha de expedición: <?php echo $fechaexp ?> </li>
	         <li>Fecha de vencimiento: <?php echo $fechaven ?> </li>
	         <li>Nacionalidad: <?php echo $nacionalidad ?> </li>
	         <li>Domicilio: <?php echo $domicilio ?> </li>
	         <li>Fecha de nacimiento: <?php echo date($año, $mes, $dia); ?> </li>
	         <li>Lugar de nacimiento: <?php echo $provincia ?> </li>
	         <li>¿Es donante?: <?php echo $donante ?> </li>
	         <li>Número de trámite <?php echo $nrotramite ?> </li>
	      <form method="post" action="insert">
		  <input class="btn btn-md btn-danger" type="button" value="Cancelar" onclick="window.location='index.php';">
		  <input class="btn btn-md btn-success" type="submit" value="Confirmar">
	   </ul>
	<?php endif; ?>
	<form method="post" action="index.php">
	<input class="btn btn-md btn-success" type="submit" value="Volver">
	<hr>
	</form>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>

