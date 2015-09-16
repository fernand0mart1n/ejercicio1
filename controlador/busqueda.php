<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=personas','root','udc');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");
    

$apellido = isset($_GET['term']) ? $_GET['term'] : null;

if(!$apellido)
{
    http_response_code(400);
    die();
}

$apellido = strtoupper("%$apellido%");

$sql =""
        . "select personas_id as id, "
        . "concat_ws(' ', nombre, apellido) as label, "
        . "concat_ws(' ', nombre, apellido) as value "
        . "from personas.personas where upper(apellido) like :apellido OR upper(nombre) like :apellido OR provincia like :apellido";
$stmt = $pdo->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->bindParam(':apellido', $apellido);
$stmt->execute();

$results = $stmt->fetchAll();

header('Content-Type: application/pdf; charset=UTF-8'); 
echo json_encode($results, true);

} catch (PDOException $e) {
	 
    die('Error de conexion: ' . $e->getMessage());
}