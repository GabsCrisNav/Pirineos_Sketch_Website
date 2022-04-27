function r1(op){
	url="reportes.php?op="+op;
	location.href=url;
}

function r2(op){
	url="reportes.php?op="+op;
	location.href=url;
}

function r3(op){
	cve_tipo=document.f_reportes.cve_tipo.value;
	if (cve_tipo.length==0){
		document.f_reportes.cve_tipo.style.background="red";
		alert("Error, para este reporte se requiere la clave del tipo a filtrar");
	}
	else{
		document.f_reportes.cve_tipo.style.background="blue";
		url="reportes.php?op="+op+"&cve_tipo="+cve_tipo;
		location.href=url;
	}
}

function r4(op){
	cve_prod=document.f_reportes.nom_prod.value;
	alert("op="+op+" cve_prod="+cve_prod);
	url="productos.php?op=3&cve_prod="+cve_prod+"&nom_prod=&tipo_prod=&presenta_prod=";
	location.href=url;
}