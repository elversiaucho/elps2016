var incremento = 1;
function incrementa(lahora,elminuto,elsegundo){
	incremento++;
	//if(incremento=1000000000) 
	hora = parseInt(lahora);
	minuto = parseInt(elminuto);
	segundo = parseInt(elsegundo);
		segundo++;
		if(segundo==60){
			segundo=0;
			minuto++;
			window.location.replace('?valor=248429128');
		}else if(segundo==30){
			window.location.replace('?valor=2080192623');
	    }
		if(minuto==60){
			minuto=0;
			hora++;
		}
		if(hora==24){
			hora=0;
		}
		//document.forms[0].horas.value = 
		lahora = ( hora < 10 ) ? ( "0" + hora ) : hora;
		//document.forms[0].minutos.value = 
		elminuto = ( minuto < 10 ) ? ( "0" + minuto ) : minuto;
		//document.forms[0].segundos.value =  
		elsegundo = ( segundo < 10 ) ? ( "0" + segundo ) : segundo;
		//document.forms[0].horacompleta.value = lahora+":"+elminuto+":"+elsegundo;
		document.getElementById("hora").innerHTML = lahora+":"+elminuto+":"+elsegundo;
    setTimeout ( "incrementa(hora,minuto,segundo)", 1000 );		
}

function hora() {
    var d = new Date();
    var n = d.getHours();
       //document.getElementById("demo").innerHTML = dia;
    return parseInt(n);

}
function minutos() {
    var d = new Date();
    var n = d.getMinutes();
       //document.getElementById("demo").innerHTML = dia;
    return parseInt(n);

}
function segundo() {
    var d = new Date();
    var n = d.getSeconds();
       //document.getElementById("demo").innerHTML = dia;
    return parseInt(n);

}


  function fecha() {
    var d = new Date();
    var n = d.getDate();
    var nd = d.getDay();
    var mes = d.getMonth()+1;
    var dia= "fes";

switch (nd){
	case 5: dia = "Viernes" ; break;
	case 4: dia = "Jueves" ; break;
	case 3: dia = "Miercoles" ; break;
	case 2: dia = "Martes" ;break;
	case 1: dia = "Lunes" ;break;
	case 6: dia = "Sábado" ;break;
	default: dia = "Domingo" ;break;
 }
   
    document.getElementById("fecha").innerHTML = dia+" "+n+"/"+ mes+"/"+ d.getFullYear();
}



