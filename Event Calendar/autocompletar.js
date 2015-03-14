function nuevoAjax()
{
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); }

	return xmlhttp;
}

function cerrarPop(){
	$(function(){
		$('[data-toggle="popover2"]').popover('hide');
	});
}

function mostrarCitas(dia){
	var ajax = nuevoAjax();
	var params = "?fech='"+dia+"'";
	ajax.open("GET","mostrarCita.php"+params,true);
	ajax.send();
	ajax.onreadystatechange = function(){
		if(ajax.responseText == ""){
			document.getElementById("resultados").innerHTML = "No hay citas para este dia";
		}else{
			// console.log(ajax.responseText);
			document.getElementById("resultados").innerHTML = ajax.responseText;
		}
	}
}

function nuevaCita(){
	var ajax = nuevoAjax();
	var params = "?titulo="+document.getElementById("titulo").value;
	params += "&fecha="+document.getElementById("fecha").value;
	params += "&hora="+document.getElementById("hora").value;
	params += "&telefono="+document.getElementById("telefono").value;
	params += "&servicio="+document.getElementById("servicio").value;
	ajax.open("POST","nuevo.php"+params,true);
	ajax.send();
}

function nuevoCliente(){
	var ajax = nuevoAjax();
	var params = "?telf="+document.getElementById("telf").value;
	params += "&nombre="+document.getElementById("nombre").value;
	ajax.open("GET","nuevoCli.php"+params,true);
	ajax.send();
	$(function(){
		$('[data-toggle="popover"]').popover('hide');
	});
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4){
			document.getElementById("masCliente").innerHTML = "✓";
		}
	}
}

function autocompletar(datoABuscar){
	//var mostrar = document.getElementById('datos');
	var ajax = nuevoAjax();
	if(document.getElementById("telefono").value == ""){
		document.getElementById("datos").style.visibility = "hidden";
	}else{
		document.getElementById("datos").style.visibility = "visible";
	}
	document.getElementById("datos").innerHTML="Cargando...";
	ajax.open("GET","buscar_tlf.php?tlf="+datoABuscar,true);
	//var params = "tlf='"+datoABuscar+"'";
	ajax.send();
	//var rest = ajax.responseText;
	//document.getElementById("datos").value = ajax.responseText;
	//document.getElementById("datos").innerHTML = ajax.responseText;
	ajax.onreadystatechange = function(){
	 	if(ajax.readyState == 4){
	 		var rest = ajax.responseText;
	 		document.getElementById("datos").innerHTML = rest;
	 	}else{
	 		document.getElementById("datos").innerHTML = "No se encontró nadie con ese nombre";
	 	}
	}
}
