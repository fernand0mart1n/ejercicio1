<?php

session_start();

@$nombre = $_REQUEST['nombre'];
@$apellido = $_REQUEST['apellido'];
@$errores = $_REQUEST['errores'];
@$sexo = $_REQUEST['sexo'];
@$tipodoc = $_REQUEST['tipodoc'];
@$documento = $_REQUEST['documento'];
@$fechaexp = $_REQUEST['fechaexp'];
@$fechaven = $_REQUEST['fechaven'];
@$nacionalidad = $_REQUEST['nacionalidad'];
@$domicilio = $_REQUEST['domicilio'];
@$fechalugar = $_REQUEST['fechalugar'];
@$provincia = $_REQUEST['provincia'];
@$donante = $_REQUEST['donante'];
@$nrotramite = $_REQUEST['nrotramite'];
@$foto = $_REQUEST['foto'];
@$firma = $_REQUEST['firma'];
@$huella = $_REQUEST['huella'];

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
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Valdesoft</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      </ul>
	      <?php if(!isset($_SESSION['user'])){?>
	      <form class="navbar-form navbar-center" srole="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Búsqueda de registros" title="Para realizar búsquedas debe iniciar sesión" disabled>
	        </div>
	        <button type="submit" class="btn btn-default" title="Para realizar búsquedas debe iniciar sesión" disabled>Buscar</button>
	      </form>
	      <?php } else {?>
	      <form class="navbar-form navbar-center" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Búsqueda de registros">
	        </div>
	        <button type="submit" class="btn btn-default">Buscar</button>
	      </form>
	      <?php }; ?>
	      <?php if(!isset($_SESSION['user'])){?>
		  	<ul class="nav navbar-nav navbar-right">
		    	<li><a href="" data-toggle="modal" data-target="#myModal">Ingresar</a></li>
		    </ul>
		  <?php } else {?>
		  	<li class="dropdown navbar-right">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['user'];?><span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="ejercicio.php">Registrar persona</a></li>
	            <li class="divider"></li>
	            <li><a href="../controlador/conexionbbdd.php?action=misdatos">Mi información</a></li>
	            <li class="divider"></li>
	            <li><a href="../controlador/conexionbbdd.php?action=salir">Salir</a></li>
	          </ul>
	        </li>
	      <?php }; ?>
	    </div>
	  </div>
	</nav>
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
		  <input class="btn btn-md btn-default" onclick="window.location='index.php';" value="Volver">
	   </ul>
	<?php else:?>
		<H3>Sus datos:</H3>
		<ul>
	         <li>Nombre: <?php echo $nombre ?> </li>
	         <li>Apellido: <?php echo $apellido ?> </li>
	         <li>Sexo: <?php echo $sexo ?> </li>
	         <li>Tipo de documento: <?php echo $tipodoc ?> </li>
	         <li>Documento: <?php echo $documento ?> </li>
	         <li>Fecha de expedición: <?php echo $fechaexp ?> </li>
	         <li>Fecha de vencimiento: <?php echo $fechaven ?> </li>
	         <li>Nacionalidad: <?php echo $nacionalidad ?> </li>
	         <li>Domicilio: <?php echo $domicilio ?> </li>
	         <li>Fecha de nacimiento: <?php echo $fechalugar; ?> </li>
	         <li>Lugar de nacimiento: <?php echo $provincia ?> </li>
	         <li>¿Es donante?: <?php echo $donante ?> </li>
	         <li>Número de trámite: <?php echo $nrotramite ?> </li>
	         <li>Foto del documento: <?php echo $foto ?> </li>
	         <li>Foto de la firma: <?php echo $firma ?> </li>
	         <li>Foto de la huella: <?php echo $huella ?> </li>
		  <input id="action" type="hidden" name="action" value="insert"/>
		  <br>
		  <input class="btn btn-md btn-success" type="button" value="Regresar" onclick="window.location='index.php';">
	   </ul>
	   </form>
	<?php endif; ?>
	<hr>
	</form>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>

