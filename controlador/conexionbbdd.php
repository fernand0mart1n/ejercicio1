<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);

if(!isset($_SESSION)){
	session_start();
}

	$request_method = strtoupper(getenv('REQUEST_METHOD'));
	$http_methods = array('GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'OPTIONS');

	if( ! in_array($request_method, $http_methods))
	{
		die('invalid request');
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$action = $_POST['action'];

		if($action == 'login')
		{
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			try{
				$conn = new PDO('mysql:host=localhost;dbname=personas','root','udc');
				$sql = "SELECT * FROM usuarios WHERE user = :user AND pass = :pass";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':user', $user, PDO::PARAM_STR);
				$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
				$stmt->execute();
				if($stmt->rowCount() == 1)
				{
					$fila = $stmt->fetch(PDO::FETCH_ASSOC);
					$_SESSION['user'] = $fila['user'];
					$_SESSION['id'] = $fila['id'];
					header("Location: ../vista/index.php");
					die();
				}	
			} catch(PDOException $e){
				throw new Exception($e->getMessage());
			}
		}
		
		if($action == 'insert')
		{
			
			strtolower($nombre = $_POST['nombre']);
			strtolower($apellido = $_POST['apellido']);
			$sexo = 		$_POST['sexo'];
			$tipodoc = 		$_POST['tipodoc'];
			$documento = 	$_POST['documento'];
			$fechaexp = 	date('Y-m-d');
			$fechaven = 	date('Y-m-d', strtotime("+15 Years"));
			$nacionalidad = $_POST['nacionalidad'];
			$domicilio = 	$_POST['domicilio'];
			$fechalugar =	$_POST['fechalugar'];
			$provincia = 	$_POST['provincia'];			
			$donante = 		$_POST['donante'];
			$nrotramite = 	$_POST['nrotramite'];
			$foto = 		$_POST['foto'];			
			$firma = 		$_POST['firma'];
			$huella = 		$_POST['huella'];
			
			$conn = new PDO('mysql:host=localhost;dbname=personas','root','udc');
			$sql = "INSERT INTO personas (nombre, apellido, sexo, tipodoc, documento, fechaexp, fechaven, nacionalidad, domicilio, fechalugar, provincia, donante, nrotramite, foto, firma, huella)
					values (:nombre, :apellido, :sexo, :tipodoc, :documento, :fechaexp, :fechaven, :nacionalidad, :domicilio, :fechalugar, :provincia, :donante, :nrotramite, :foto, :firma, :huella)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
			$stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
			$stmt->bindParam(':tipodoc', $tipodoc, PDO::PARAM_STR);
			$stmt->bindParam(':documento', $documento, PDO::PARAM_STR);
			$stmt->bindParam(':fechaexp', $fechaexp, PDO::PARAM_STR);
			$stmt->bindParam(':fechaven', $fechaven, PDO::PARAM_STR);
			$stmt->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
			$stmt->bindParam(':domicilio', $domicilio, PDO::PARAM_STR);
			$stmt->bindParam(':fechalugar', $fechalugar, PDO::PARAM_STR);
			$stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
			$stmt->bindParam(':donante', $donante, PDO::PARAM_STR);
			$stmt->bindParam(':nrotramite', $nrotramite, PDO::PARAM_STR);
			$stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
			$stmt->bindParam(':firma', $firma, PDO::PARAM_STR);
			$stmt->bindParam(':huella', $huella, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount() == 1)
			{		
				header("Location: ../vista/index.php");
				die();
			}
			
		}
        }
	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$action1 = isset($_GET['action']) ? $_GET['action'] : '';
		
		if($action1 == 'salir')
		{
			$_SESSION = array();
			
			session_destroy();
			header("Location: ../vista/index.php");
			
			die();
		}
		
		if($action1 == 'misdatos')
		{
			
			$nombreparabusqueda = $_SESSION['id'];
			
			$conn = new PDO('mysql:host=localhost;dbname=personas','root','udc');
			$sql = "SELECT nombre, apellido, sexo, tipodoc, documento, fechaexp, fechaven, nacionalidad, domicilio, fechalugar, provincia, donante, nrotramite, foto, firma, huella FROM personas 
			WHERE personas_id = :nombreparabusqueda;" ;
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nombreparabusqueda', $nombreparabusqueda, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount() == 1)
			{		
				header("Location: ../vista/info.php");
				die();
			}
		}
		
		if($action1 == 'buscar')
		{
			$busqueda = $_SESSION['busqueda'];
			
			$conn = new PDO('mysql:host=localhost;dbname=personas','root','udc');
			$sql = "SELECT nombre, apellido, documento, nacionalidad, foto FROM personas 
			WHERE nombre = :busqueda OR apellido = :busqueda;" ;
			$stmt = $conn->prepare($sql);
            $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
			$stmt->execute();
			
			if($stmt->rowCount() == 1)
			{		
				header("Location: ../vista/listado.php");
				die();
			}
		}
	}

