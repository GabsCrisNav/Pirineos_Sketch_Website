function tomar_datos(){
	cve_tipo=document.f_tipos.cve_tipo.value;
	nom_tipo=document.f_tipos.nom_tipo.value;
}

function altas(){
	tomar_datos();
	//alert(cve_prod+" "+nom_prod+" "+tipo_prod+" "+presenta_prod);
	if ((cve_tipo.length==0) || (nom_tipo.length==0)){
		alert("Error, todos los campos son obligatorios");
		if (cve_tipo.length==0) document.f_tipos.cve_tipo.style.background="red";
		if (nom_tipo.length==0) document.f_tipos.nom_tipo.style.background="red";
	}
	else{
		document.f_tipos.cve_tipo.style.background="blue";
		document.f_tipos.nom_tipo.style.background="blue";
		url="tipos.php?op=1&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
} // Termina altas

function bajas(){
	tomar_datos();
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de tipo a eliminar");
		document.f_tipos.cve_tipo.style.background="red";
	}
	else{
		document.f_tipos.cve_tipo.style.background="blue";
		nom_tipo="";
		if (confirm("Seguro de Eliminar ??")){
			url="tipos.php?op=2&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
			location.href=url;
		}
		else{
			alert("La acción de BAJA ha sido CANCELADA");
		}
	}
} // Termina bajas

function consultas(){
	tomar_datos();
	if (cve_tipo.length==0){
		alert("Error, se debe indicar la clave de tipo a consultar");
		document.f_tipos.cve_tipo.style.background="red";
	}
	else{
		document.f_tipos.cve_tipo.style.background="blue";
		nom_tipo="";
		url="tipos.php?op=3&cve_tipo="+cve_tipo+"&nom_tipo="+nom_tipo;
		location.href=url;
	}
} // Termina consultas


