<?php

$tipos = array("DNI", "LC", "LE");

$paises = array("Argentina", "Bolivia", "Brasil", "Chile", "Colombia", "Perú", "Uruguay", "Venezuela", "Otro");

$provincias = array("Extranjero", "Buenos Aires", "Catamarca", "Chaco", "Chubut", "Córdoba", "Corrientes", "Entre Ríos", "Formosa", "Jujuy", "La Pampa",
"La Rioja", "Mendoza", "Misiones", "Neuquén", "Río Negro", "Salta", "San Juan", "San Luis", "Santa Cruz", "Santa Fé", "Santiago del Estero",
"Tierra del Fuego", "Tucumán");

function validaRequerido($valor){
    if(trim(empty($valor))){
       return false;
    }else{
       return true;
    }
 }

function validarEntero($valor){
    if(ctype_digit($valor)){
       return true;
    }else{
       return false;
    }
 }

function validarFechas($fecha){
	$tokens = explode("-", $fecha); 
	If (checkdate ($tokens[2],$tokens[1],$tokens[0])){ 
		return true; 
	} 
	else { 
		return false;
	} 
}

//http://web.ontuts.com/tutoriales/como-validar-un-formulario-con-php-y-javascript-jquery/
//http://www.enricflorit.com/como-validar-datos-de-formularios-en-el-servidor-con-php/#sthash.Cl8Tov7h.dpbs

 if(strlen($username) > 15){ 
$response[] ="El nombre debe tener menos de 15 caracteres"; 

} 
