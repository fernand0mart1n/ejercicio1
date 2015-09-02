<?php

session_start();

require('datos.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="lib/js/chiches.js"></script>
		<script type="text/javascript" src="lib/js/validar.js"></script>
		<link href="lib/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="col-md-1">
	  		</div>
	  		<div class="col-lg-12">
				<H3 align="center">Ingrese sus datos</H3><br>
				<form class="form-horizontal" method="post" role="form">
					<div class="form-group">
		    			<label for="nombre" class="col-lg-3 control-label">Nombre(s)</label>
					    <div class="col-lg-8">
		      				<input type="text" class="form-control" id="nombre"  placeholder="Nombre(s)" title="Ingrese su(s) nombre(s) correctamente" required>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="apellido" class="col-lg-3 control-label">Apellido(s)</label>
		    			<div class="col-lg-8">
		      				<input type="text" class="form-control" id="apellido" placeholder="Apellido(s)" required>
					    </div>
		  			</div>
		  			<div class="form-group">
		  				<label class="col-lg-3 control-label">Sexo</label>
		   				<div class="col-lg-8">
		   				 	<div class="radio">
		  					  	<label>
									<input type="radio" name="sex" id="masc" value="M"> Masculino 
								</label>
		    				</div>
		    				<div class="radio"> 
		    					<label>
									<input type="radio" name="sex" id="feme" value="F"> Femenino
								</label>
		    				</div>
		  				</div>  
		  			</div>
		 			<div class="form-group">
		  				<label class="col-lg-3 control-label">Tipo de documento</label>
		   				<div class="col-lg-8">
							<select class="form-control">
							<?php foreach ($tipos as $tipo){?>
								<option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
							<?php };?>
							</select>
		    			</div>
		 			</div>
		    		<div class="form-group">
		   				<label for="documento" class="col-lg-3 control-label">Documento</label>
		    			<div class="col-lg-8">
							<input type="text" class="form-control" title="Debe ingresar su documento" name="documento" id="documento" placeholder="Ingrese su número de documento" required>
		   				</div>
		  			</div>
		  			<div class="form-group">
		   				<label for="fecha_exp" class="col-lg-3 control-label">Fecha expedición</label>
		    			<div class="col-lg-8">
							<input type="date" class="form-control" name="exp" id="exp" value="<?php echo date('Y-m-d'); ?>" disabled>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="fecha_ven" class="col-lg-3 control-label">Fecha vencimiento</label>
		    			<div class="col-lg-8">
							<input type="text" class="form-control" name="ven" id="ven" value="<?php echo date('Y-m-d', strtotime("+15 Years")); ?>" disabled>
		    			</div>
		  			</div>
					<div class="form-group">
					    <label for="nacionalidad" class="col-lg-3 control-label">Nacionalidad</label>
					    <div class="col-lg-8">
							<select class="form-control">
							<?php foreach ($paises as $pais){?>
								<option value="<?php echo $pais;?>"><?php echo $pais;?></option>
							<?php };?>
							</select>
					    </div>
					</div>
				    <div class="form-group">
				    	<label for="domicilio" class="col-lg-3 control-label">Domicilio</label>
				    	<div class="col-lg-8">
							<input type="text" class="form-control" title="Debe ingresar su domicilio" name="domicilio" id="domicilio" placeholder="Domicilio" required>
				    	</div>
				  	</div>
		  			<div class="form-group">
		    			<label for="fecha_lugar" class="col-lg-3 control-label">Fecha y lugar de nacimiento:</label>
		    			<div class="col-lg-2">
							<select class="form-control">
								<option value="dia">Día</option>
								<?php for($i = 1; $i < 32; $i++){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php };?>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control">
								<option value="mes">Mes</option>
								<?php for($i = 1; $i < 13; $i++){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php };?>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control">
								<option value="año">Año</option>
								<?php for($i = 2015; $i > 1900; $i--){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php };?>
							</select>
						</div>
						<div class="col-lg-2">
							<select class="form-control">
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
									<input type="radio" name="don" id="donsi" value="si"> Si 
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
							<input type="text" class="form-control" title="Debe ingresar el número de trámite" name="tramite" id="tramite" placeholder="Número de trámite" required>
		    			</div>
		  			</div>
		   			<div class="form-group">
		    			<label for="foto" class="col-lg-3 control-label">Subir foto del documento:</label>
		    			<div class="col-lg-8">
							<input type="file" class="file form-control" name="foto" id="foto" required>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="firma" class="col-lg-3 control-label">Subir gráfico de la firma:</label>
		    			<div class="col-lg-8">
							<input type="file" class="file form-control" name="firma" id="firma" required>
		    			</div>
		  			</div>
		  			<div class="form-group">
		    			<label for="huella" class="col-lg-3 control-label">Subir imagen de huella digital:</label>
		    			<div class="col-lg-8">
							<input type="file" class="file form-control" name="huella" id="huella" required>
		    			</div>
		  			</div>
		  			<div class="form-group text-center">
						<input class="btn btn-md btn-danger" type="button" value="Volver" onclick="window.location='index.php';">
						<input class="btn btn-md btn-success" type="submit" value="Enviar" onclick="if(sexook()){window.location='ok.php';}">
					</div>	
				</form>
	  		</div>	
		</div>
	</div>
	<div class="col-md-1">
	</div>
	</div>
	<hr>
	<script type="text/javascript" src="lib/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
	</body>
</html>
