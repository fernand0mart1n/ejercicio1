<?php 
header('Content-Type: application/pdf; charset=UTF-8'); echo json_encode($_SESSION['seleccion'], true);