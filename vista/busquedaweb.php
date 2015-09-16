<?php 

session_start();
@$_SESSION;
include "../controlador/conexionbbdd.php";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="../lib/js/chiches.js"></script>
		<script type="text/javascript" src="../lib/js/validar.js"></script>
		<link href="../lib/css/bootstrap.min.css" rel="stylesheet">
                <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
	</head>
	<body class="ui-widget ui-widget-content">
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
	        <a href="listadotodos.php"><button type="button" class="btn btn-default">Ver todos los registros</button></a>
	      </form>
		  	<li class="dropdown navbar-right">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['user'];?><span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="ejercicio.php">Registrar persona</a></li>
	            <li class="divider"></li>
	            <li><a href="info.php">Mi información</a></li>
	            <li class="divider"></li>
	            <form method="get" role="form" action="../controlador/conexionbbdd.php">
	            <input id="action1" class="submit" type="hidden" name="action1" value="salir"/>
	            <li><a href="../controlador/conexionbbdd.php?action=salir">Salir</a></li>
	            </form>
	          </ul>
	        </li>
	    </div>
	  </div>
	</nav>
		<?php }else{ ?>
			<br><br>
		<?php }; ?>
        <br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-1">
	  		</div>
	  		<div class="col-lg-12">
                        <h1>Buscar personas por apellido, nombre o provincia de nacimiento</h1>
                         <label>Ingrese algún parametro o parte de él: </label>
                         <input type="text" name="apellido" id="apellido"/>
                         <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                <h3>Seleccionado</h3>
                                <p id="seleccionado"><?php echo $_SESSION['seleccion'];?></p>
                                <br><br>
                                <a href="result.php">Exportar a JSON</a>
                                <a href="result2.php">Exportar a PDF</a>
                              </div>
                            </div>
                         </div>
                        </div>
                        <div class="col-md-1">
	  		</div>
                </div>
        </div>
        <script src="../lib/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script src="../lib/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#apellido").autocomplete({
                    source: "../controlador/busqueda.php",
                    minLength: 2,
                    select: function (event, ui) {
                    $("#seleccionado").text(""+ui.item.label);
                    $_SESSION['seleccion'] = $("#seleccionado");
                    }
                });
            });
        </script>
    </body>
</html>
