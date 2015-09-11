 <?php

session_start();

if(isset($_SESSION['user'])){
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="../lib/js/chiches.js"></script>
		<script type="text/javascript" src="../lib/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../lib/js/validar.js"></script>
		<link href="../lib/css/bootstrap.min.css" rel="stylesheet">
		<script>
		function myFunction() {
			alert("Recibirá una contraseña temporal en su correo");
		}
		</script>
	</head>
	<body>
		<br><br>
		<div class="container">
				<div class="row">
					<div class="col-md-1">
			  		</div>
			  		<div class="col-lg-12">
						<form class="form-horizontal" method="post" role="form" onsubmit="myFunction()">
							<div class="form-group">
								<label for="user" class="col-lg-4 control-label">Ingrese su dirección de correo electrónico</label>
							    <div class="col-lg-6">
									<input type="email" class="form-control" name="user" id="user" pattern="{5,100}"  placeholder="Email" required>
									<br>
									<input class="btn btn-default" type="button" value="Volver" onclick="window.location='index.php';" align="center">
									<input class="btn btn-success" type="submit" value="Enviar" align="center">
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-1">
			  		</div>
			  	</div>
		</div>
	</body>
</html>
