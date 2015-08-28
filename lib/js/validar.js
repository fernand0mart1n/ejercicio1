$$error = null;

function sexook(){
	if((document.getElementById('masc').checked) || (document.getElementById('feme').checked)){
	 return true;
	} else {
 	 $$error = array("Debe seleccionar su sexo");
 	 return false;
	}
}

function donok(){
	if((document.getElementById('donsi').checked) || (document.getElementById('donno').checked)){
	 	return true;
	} else {
 	 	$$error = array("Debe especificar si es donante");
 	 	return false;
	}
}

if(sexook() == false || donok() == false){
	alert($$error);
}