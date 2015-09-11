<?php

/*

- Si el formulario es válido, mostrar una nueva página con los datos ingresados.

*/

session_start();

if(!isset($_SESSION['user'])){
	header('Location: index.php');
}

include "../controlador/conexionbbdd.php";
require_once '../modelo/datos.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$tipodoc = isset($_POST['tipodoc']) ? $_POST['tipodoc'] : null;
$documento = isset($_POST['documento']) ? $_POST['documento'] : null;
$fechaexp = isset($_POST['fechaexp']) ? $_POST['fechaexp'] : null;
$fechaven = isset($_POST['fechaven']) ? $_POST['fechaven'] : null;
$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
$domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
$fechalugar = isset($_POST['fechalugar']) ? $_POST['fechalugar'] : null;
$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : null;
$donante = isset($_POST['donante']) ? $_POST['donante'] : null;
$nrotramite = isset($_POST['nrotramite']) ? $_POST['nrotramite'] : null;
$foto = isset($_POST['foto']) ? $_POST['foto'] : null;
$firma = isset($_POST['firma']) ? $_POST['firma'] : null;
$huella = isset($_POST['huella']) ? $_POST['huella'] : null;

//Este array guardará los errores de validación que surjan.
$errores = array();

//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Valida que el campo nombre no esté vacío.
   if (!validaRequerido($nombre)) {
      $errores[] = 'El nombre es incorrecto.';
   }

      if (!validaRequerido($apellido)) {
      $errores[] = 'El apellido es incorrecto.';
   }
   
      if (!validaRequerido($sexo)) {
      $errores[] = 'El sexo es incorrecto.';
   }
   
		if (!validaRequerido($tipodoc)) {
      $errores[] = 'El tipo de documento es incorrecto.';
   }

	    if (!validarEntero($documento)) {
      $errores[] = 'El documento es incorrecto.';
   }
   
	    if ($fechaven < $fechaexp){
	   $errores[] = 'Fecha de expedición errónea';
   }
   
      if ($fechaven < $fechaexp){
	   $errores[] = 'Fecha de vencimiento errónea';
   }
   
      if (!validaRequerido($nacionalidad)) {
      $errores[] = 'La nacionalidad es incorrecta';
   }  
   
      if (!validaRequerido($domicilio)) {
      $errores[] = 'El domicilio es incorrecto';
   }    
   
       if (date_date_set($fechaexp, $año, $mes, $dia) > $fechaexp){
	   $errores[] = 'Fecha de nacimiento errónea';
   }
   
      if (!validaRequerido($provincia)) {
      $errores[] = 'La provincia de nacimiento es incorrecta';
   }   
      if (!validaRequerido($donante)) {
      $errores[] = 'Error en el campo donante';
   }
   
      if (!validarEntero($nrotramite)) {
      $errores[] = 'El número de trámite es incorrecto.';
   }
   
   //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
   if(!$errores){
      require('ok.php');
      exit;
   }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="../lib/js/chiches.js"></script>
		<script type="text/javascript" src="../lib/js/validar.js"></script>
		<link href="../lib/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	<?php if(isset($_SESSION['user'])){?>
		<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="">Valdesoft</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      </ul>
	      <form class="navbar-form navbar-center" role="search" method="get">
	        <div class="form-group">
	          <input type="text" class="form-control" value="<?php $_SESSION['busqueda'];?>" placeholder="Búsqueda de registros">
	        </div>
				<input id="action1" type="hidden" name="action1" value="buscar"/>
	        <button type="submit" class="btn btn-default">Buscar</button>
	      </form>
		  	<li class="dropdown navbar-right">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['user'];?><span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="ejercicio.php">Registrar persona</a></li>
	            <li class="divider"></li>
	            <li><a href="info.php">Mi información</a></li>
	            <li class="divider"></li>
	            <form method="get" role="form" action="../controlador/conexionbbdd.php">
	            <input id="action1" type="hidden" name="action1" value="salir"/>
	            <li><a >Salir</a></li>
	            </form>
	          </ul>
	        </li>
	    </div>
	  </div>
	</nav>
		<?php }else{ ?>
			<br><br>
		<?php }; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-1">
	  		</div>
	  		<div class="col-lg-12">
				<H3 align="center">Ingrese sus datos</H3><br>
				<form class="form-horizontal" method="post" role="form" action="ok.php">
					<div class="form-group">
		    			<label for="nombre" class="col-lg-3 control-label">Nombre(s)</label>
					    <div class="col-lg-8">
		      				<input type="text" class="form-control" name="nombre" id="nombre" pattern="[A-Za-z'áéíóúÁÉÍÓÚ\s]{2,79}"  placeholder="Nombre(s)" required>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="apellido" class="col-lg-3 control-label">Apellido(s)</label>
		    			<div class="col-lg-8">
		      				<input type="text" class="form-control" name="apellido" id="apellido" pattern="[A-Za-z'áéíóúÁÉÍÓÚ\s]{2,79}" placeholder="Apellido(s)" required>
					    </div>
		  			</div>
		  			<div class="form-group">
		  				<label class="col-lg-3 control-label">Sexo</label>
		   				<div class="col-lg-8">
		   				 	<div class="radio">
		  					  	<label>
									<input type="radio" name="sexo" id="sexo" value="M" required> Masculino 
								</label>
		    				</div>
		    				<div class="radio"> 
		    					<label>
									<input type="radio" name="sexo" id="sexo" value="F"> Femenino
								</label>
		    				</div>
		  				</div>  
		  			</div>
		 			<div class="form-group">
		  				<label class="col-lg-3 control-label">Tipo de documento</label>
		   				<div class="col-lg-8">
							<select class="form-control" name="tipodoc" id="tipodoc" required>
								<option value="">Seleccione una opción</option>
							<?php foreach ($tipos as $tipo){?>
								<option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
							<?php };?>
							</select>
		    			</div>
		 			</div>
		    		<div class="form-group">
		   				<label for="documento" class="col-lg-3 control-label">Documento</label>
		    			<div class="col-lg-8">
							<input type="text" class="form-control" title="Debe ingresar su documento" pattern="[0-9]{1,10}" name="documento" id="documento" placeholder="Ingrese su número de documento" required>
		   				</div>
		  			</div>
		  			<div class="form-group">
		   				<label for="fechaexp" class="col-lg-3 control-label">Fecha expedición</label>
		    			<div class="col-lg-8">
							<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled>
							<input type="hidden" class="form-control" name="fechaexp" id="fechaexp" value="<?php date('Y-m-d'); ?>">
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="fechaven" class="col-lg-3 control-label">Fecha vencimiento</label>
		    			<div class="col-lg-8">
							<input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime("+15 Years")); ?>" disabled>
							<input type="hidden" class="form-control" name="fechaven" id="fechaven" value="<?php date('Y-m-d', strtotime("+15 Years")); ?>">
		    			</div>
		  			</div>
					<div class="form-group">
					    <label for="nacionalidad" class="col-lg-3 control-label">Nacionalidad</label>
					    <div class="col-lg-8">
							<select class="form-control" name="nacionalidad" id="nacionalidad" onchange="<?php if($nac != "Argentina"){ $provincia = "Extranjero"; }?>" required>
								<option value="">Seleccione su país</option>
							<?php foreach ($paises as $pais){?>
								<option value="<?php echo $pais;?>"><?php echo $pais;?></option>
							<?php };?>
							</select>
					    </div>
					</div>
				    <div class="form-group">
				    	<label for="domicilio" class="col-lg-3 control-label">Domicilio</label>
				    	<div class="col-lg-8">
							<input type="text" class="form-control" title="Debe ingresar su domicilio" maxlength="79" name="domicilio" id="domicilio" placeholder="Domicilio" required>
				    	</div>
				  	</div>
		  			<div class="form-group">
		    			<label for="fecha_lugar" class="col-lg-3 control-label">Fecha y lugar de nacimiento:</label>
		    			<div class="col-lg-2">
							<select class="form-control" name="dia" id="dia" required>
								<option value="">Día</option>
								<?php for($i = 1; $i < 32; $i++){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php };?>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control" name="mes" id="mes" required>
								<option value="">Mes</option>
								<?php for($i = 1; $i < 13; $i++){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php };?>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control" name="año" id="año" required>
								<option value="">Año</option>
								<?php for($i = 2015; $i >= 1900; $i--){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php };?>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control" name="provincia" id="provincia" required>
								<option value="">Provincia</option>
								<?php foreach ($provincias as $provincia){?>
									<option value="<?php echo $provincia;?>"><?php echo $provincia;?></option>
								<?php };?>
							</select>
					    </div>
					</div>
				 	<div class="form-group">
				    	<label class="col-lg-3 control-label">¿Es donante?</label>
				    	<div class="col-lg-8">
				    		<div class="radio">
				    			<label>
									<input type="radio" name="donante" id="donante" value="si" required> Si 
								</label>
				    		</div>
				    		<div class="radio"> 
				    			<label>
									<input type="radio" name="donante" id="donante" value="no"> No
								</label>
				    		</div>
				  		</div>  
				    </div>
		  			<div class="form-group">
		    			<label for="nrotramite" class="col-lg-3 control-label">Número de trámite</label>
		   				<div class="col-lg-8">
							<input type="text" class="form-control" title="Debe ingresar el número de trámite" pattern="[0-9]{1,16}" name="nrotramite" id="nrotramite" placeholder="Número de trámite" required>
		    			</div>
		  			</div>
		   			<div class="form-group">
		    			<label for="foto" class="col-lg-3 control-label">Subir foto del documento:</label>
		    			<div class="col-lg-8">
							<input type="file" class="file form-control" accept="image/*" name="foto" id="foto" required>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="firma" class="col-lg-3 control-label">Subir gráfico de la firma:</label>
		    			<div class="col-lg-8">
							<input type="file" class="file form-control" accept="image/*" name="firma" id="firma" required>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="huella" class="col-lg-3 control-label">Subir imagen de huella digital:</label>
		    			<div class="col-lg-8">
							<input type="file" class="file form-control" accept="image/*" name="huella" id="huella" required>
		    			</div>
		  			</div>
		  			<div class="form-group text-center">
						<input class="btn btn-md btn-danger" type="button" value="Volver" onclick="window.location='index.php';">
						<input class="btn btn-md btn-success" type="submit" value="Enviar">
					</div>	
				</form>
	  		</div>	
		</div>
	</div>
	<div class="col-md-1">
	</div>
	</div>
	<hr>
	<script type="text/javascript" src="../lib/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
	</body>
</html>
