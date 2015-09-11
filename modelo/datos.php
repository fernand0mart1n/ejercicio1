<?php

$tipos = array("DNI", "LC", "LE");

$paises = array("Argentina", "Bolivia", "Brasil", "Chile", "Colombia", "Perú", "Uruguay", "Venezuela", "Otro");

$provincias = array("Buenos Aires", "Catamarca", "Chaco", "Chubut", "Córdoba", "Corrientes", "Entre Ríos", "Formosa", "Jujuy", "La Pampa",
"La Rioja", "Mendoza", "Misiones", "Neuquén", "Río Negro", "Salta", "San Juan", "San Luis", "Santa Cruz", "Santa Fé", "Santiago del Estero",
"Tierra del Fuego", "Tucumán");

function validaRequerido($valor){
    if(trim(empty($valor)){
       return false;
    }else{
       return true;
    }
 }

function validarEntero($valor){
    if(ctype_digit($valor){
       return true;
    }else{
       return false;
    }
 }

function validarFechas($fecha){
	$tokens = explode("/", $fecha); 
	If (checkdate ($partes[1],$partes[0],$partes[2])){ 
		return true; 
	} 
	else { 
		return false;
	} 
}

//falta arreglar la navbar con el espacio en blanco
//validar por js fecha de nacimiento, pais con provincia e imagenes de dni
http://web.ontuts.com/tutoriales/como-validar-un-formulario-con-php-y-javascript-jquery/
http://www.enricflorit.com/como-validar-datos-de-formularios-en-el-servidor-con-php/#sthash.Cl8Tov7h.dpbs

 if(strlen($username) > 15){ 
$response[] ="El nombre debe tener menos de 15 caracteres"; 

} 
