<?php

/*

- Validar los datos ingresados DESDE PHP:
- reglas de negocio (ej. la fecha de vencimiento no puede ser menor o igual que la fecha de nacimiento y emisión).
- Separar la lógica de la parte visual (archivos PHP separados, usar función require)
- Si el formulario es válido, mostrar una nueva página con los datos ingresados.

validar por js fecha de nacimiento, pais con provincia e imagenes de dni

*/

session_start();

if(!isset($_SESSION['user'])){
	header('Location: index.php');
}

include "../controlador/conexionbbdd.php";
require_once '../modelo/datos.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$sexo
$tipodoc
$documento
$fecha_exp
$fecha_ven
$nacionalidad
$domicilio
$fecha_lugar
$donante
$nrotramite
$foto
$firma
$huella

//Este array guardará los errores de validación que surjan.
$errores = array();

//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Valida que el campo nombre no esté vacío.
   if (!validaRequerido($nombre)) {
      $errores[] = 'El campo nombre es incorrecto.';
   }

      if (!validaRequerido($apellido)) {
      $errores[] = 'El campo nombre es incorrecto.';
   }

   if (!validarEntero()) {
      $errores[] = 'El campo edad es incorrecto.';
   }

   //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
   if(!$errores){
      header('Location: ok.php');
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
	      <form class="navbar-form navbar-center" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Búsqueda de registros">
	        </div>
	        <button type="submit" class="btn btn-default">Buscar</button>
	      </form>
		  	<li class="dropdown navbar-right">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['user'];?><span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="ejercicio.php">Registrar persona</a></li>
	            <li class="divider"></li>
	            <li><a href="info.php">Mi información</a></li>
	            <li class="divider"></li>
	            <li><a href="salir">Salir</a></li>
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
				<form class="form-horizontal" method="post" role="form" action="insert">
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
									<input type="radio" name="sex" id="sex" value="M" required> Masculino 
								</label>
		    				</div>
		    				<div class="radio"> 
		    					<label>
									<input type="radio" name="sex" id="sex" value="F"> Femenino
								</label>
		    				</div>
		  				</div>  
		  			</div>
		 			<div class="form-group">
		  				<label class="col-lg-3 control-label">Tipo de documento</label>
		   				<div class="col-lg-8">
							<select class="form-control" name="tipo" id="tipo" required>
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
		   				<label for="fecha_exp" class="col-lg-3 control-label">Fecha expedición</label>
		    			<div class="col-lg-8">
							<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled>
							<input type="hidden" class="form-control" name="exp" id="exp" value="<?php date('Y-m-d'); ?>">
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="fecha_ven" class="col-lg-3 control-label">Fecha vencimiento</label>
		    			<div class="col-lg-8">
							<input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime("+15 Years")); ?>" disabled>
							<input type="hidden" class="form-control" name="ven" id="ven" value="<?php date('Y-m-d', strtotime("+15 Years")); ?>">
		    			</div>
		  			</div>
					<div class="form-group">
					    <label for="nacionalidad" class="col-lg-3 control-label">Nacionalidad</label>
					    <div class="col-lg-8">
							<select class="form-control" name="nac" id="nac" onchange="<?php if($nac != "Argentina"){ $provincia = "Extranjero"; }?>" required>
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
									<input type="radio" name="don" id="donsi" value="si" required> Si 
								</label>
				    		</div>
				    		<div class="radio"> 
				    			<label>
									<input type="radio" name="don" id="donno" value="no"> No
								</label>
				    		</div>
				  		</div>  
				    </div>
		  			<div class="form-group">
		    			<label for="tramite" class="col-lg-3 control-label">Número de trámite</label>
		   				<div class="col-lg-8">
							<input type="text" class="form-control" title="Debe ingresar el número de trámite" pattern="[0-9]{1,16}" name="tramite" id="tramite" placeholder="Número de trámite" required>
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
