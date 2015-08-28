function sexook(){
	if(!(document.getElementById('masc').checked) || (document.getElementById('feme').checked)){
	 return true;
	} else {
 	 $error['texto'] = "Debe seleccionar una opción";
 	 return false;
	}
}
