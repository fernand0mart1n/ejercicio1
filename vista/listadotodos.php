<?php

session_start();

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
	      <form class="navbar-form navbar-center" action="../controlador/conexionbbdd.php" role="search" method="get">
	        <div class="form-group">
	          <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Búsqueda de registros">
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
	            <li><a href="../controlador/conexionbbdd.php?action=salir">Salir</a></li>
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
				<?php
				require_once("../lib/PHPPaging.lib/PHPPaging.lib.php");
				mysql_connect("localhost","root","udc");
				mysql_select_db("personas");
				$pagina = new PHPPaging;
				$pagina->agregarConsulta("select nombre, apellido from personas");
				$pagina->ejecutar();
				while($res=$pagina->fetchResultado()){
				echo $res['nombre']. " " . $res['apellido'] . '<br>';
				}
				echo 'Paginas '.$pagina->fetchNavegacion();
				?>
				<br><br>
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
