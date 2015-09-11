<?php

/*

PARTE 1

Desarrollar un formulario de ingreso de datos para un DNI. 
- Aplicar todos los conocimientos previos: HTML5, CSS, Bootstrap, jQuery, etc.
- Validar los datos ingresados DESDE PHP:
- presencia (campos obligatorios)
- formato (ej. sólo números)
- reglas de negocio (ej. la fecha de vencimiento no puede ser menor o igual que la fecha de nacimiento y emisión).
- Separar la lógica de la parte visual (archivos PHP separados, usar función require)
- Si el formulario no es válido, redirigir al formulario mostrando el error correspondiente.
- Si el formulario es válido, mostrar una nueva página con los datos ingresados.
- Si se intenta "saltear" la validación (ej. acceder a la nueva página directamente) redirigir a la página inicial (función header).

Subir el trabajo a github, enlazar en la entrega el repositorio correspondiente.

PARTE 2

Al formulario anterior, se debe poder acceder a través de un simple login (usuario/clave). Un solo usuario es suficiente.
La carga de datos hecha en la entrega anterior deberá guardarse en una base de datos sencilla.
Luego hacer una pantalla más que sea el listado de los datos cargados.
Extra: agregar un buscador.

*/

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
