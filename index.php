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
	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Ingresar</h4>
	        </div>
	        <div class="modal-body">
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
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	  
	</div>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Valdesoft</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only"></span></a></li>
	        <li><a href="#">Link</a></li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <?php if(!isset($_SESSION['user'])){?>
		  	<ul class="nav navbar-nav navbar-right">
		    	<li><a href="" data-toggle="modal" data-target="#myModal">Ingresar</a></li>
		    </ul>
		  <?php } else {?>
		  	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Registrar persona</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Mi información</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Salir</a></li>
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
	<H3 align="center">Bienvenido al registro de personas</H3>
	<img src="img/personas.gif" style="width: 100%;max-height: 100%";>
	<img src="img/dni.jpg" style="width: 100%;max-height: 100%";>
	<br>
  </div>
  <div class="col-md-2">
  </div>
 </div>
</div>
</body>
</html>

