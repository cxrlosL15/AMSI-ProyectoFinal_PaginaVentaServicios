function horaActual(){
	var hoy= new Date();
	var espacio= " <br> ";
	var fecha = " Fecha: " + hoy.getDate()+" / ";
		fecha += (hoy.getMonth()+1) + " / ";
		fecha += hoy.getFullYear() ;
	var hora = "Hora: " + hoy.getHours();
		hora += " : "+hoy.getMinutes();
		hora += " : "+hoy.getSeconds();
	document.getElementById('fechaActual').innerHTML= fecha + espacio + hora;
	setTimeout('horaActual()',1000);
}