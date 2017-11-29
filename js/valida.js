function informante(nro_per){
	alert("persona"+nro_per);
}

function editar(id,op){
	if (op==1)
		$(id).prop('disabled',"");
	else $(id).prop('disabled',"disabled");

}


function activa(id,c_id){
		

			if($(id).is(':checked')){
				$(c_id).show();

			}else $(c_id).hide();

			if(c_id=="#zona"){
				$("#z_urbana").hide();
				$("#z_rural").hide();
			}
			
		
}
function cambio(id){
	switch (id){
		case '#z_urbana':
			$('#z_urbana').show();
			$('#z_rural').hide();
			break;
		case '#z_rural':
			$('#z_rural').show();
			$('#z_urbana').hide();
			break;
		case 'intsi':
			$('#quien').show();
			break;
		case 'intno':
			$('#quien').hide();
			break;
		case 'OT':
			$('#otro_dir').show();
			break;
		default : $('#otro_dir').hide();

	}
	
}


function fr_valida(){
	var val_noactuliza=0;
	var gr_rechazo = 0;
	noactuliza=document.getElementsByName("noactuliza");
	op_rechazo=document.getElementsByName("rechazo");
 		//Selecciono una razon de no actualiza?
 		for(var i=0; i<noactuliza.length; i++) {
    		if (noactuliza[i].value==i+1&&noactuliza[i].checked== true){

    			val_noactuliza=noactuliza[i].value;
    			break;
    		}
    	}
    //-----------//--------------------
    //Selecciono un grado de rechazo?
      if (val_noactuliza==0){
    	alert("Selecciona la razon de no responder encuesta...");
    	return false;
    }else {
    	for(var i=0; i<op_rechazo.length; i++) {
    		if (op_rechazo[i].value==i+1&&op_rechazo[i].checked== true){

    			gr_rechazo=op_rechazo[i].value;
    			break;
    		}
    	}
  
    }
    if (val_noactuliza==7 && gr_rechazo== 0){
    		alert("Debe seleccionar un grado de return");
    		return false;
    	}else return true;
 	

}

//. ¿Las siguientes personas siguen haciendo parte del hogar?
function checkp15(np, id){
	
	var cont=0, orde_pergo=0;
	var preguntar=0;
	var elementos, rp16,se_mudaron= 0, texto_id = '';
	var estap19=document.getElementById('p19');


	if ($("#ms").text()!=""){
	   $("#encuesta2p").slideDown('slow');
	   $("#ms").html("");
	   return false;
	 }
	//evaluar que responden p16 y sub preguntas especialmente p18.
	//sitel
	if (id==1) 
		texid="siper";
	else texid="";
	while (cont<np){
		rp16 = "#rp16"+(cont+1)+" option:selected";
		rp16 = $(rp16).val();

					if (rp16=="2"){ //colocar 0un0 case
						 texto_id = "input:radio[name=sitel"+(cont+1)+"]:checked";
						 var selec = $(texto_id).val();
							if (selec==1 || selec==2)//si selecciona si o no en informacion de la persona que
							{
								orde_pergo = cont+1;
								preguntar++;
							}
							else {alert('Pregunte si tiene informacion...!');
								  return 0;	
								 }
						
						}
					if (rp16=="0"){
						alert("Seleccione el motivo...en p16");
						preguntar=-1;
						break;
					}
					if (rp16=="2" && (np==1 || np == preguntar)){
						alert("Solo Debe cambiar la informacion de Ubicación..");
						$("#encuesta2p").slideDown('slow');
						preguntar=-1;
						break;
					}
					if (rp16=="1" && (np==1) && rp16=="3" && rp16=="4" && rp16=="5" && rp16=="6"){
						alert("Encuesta Finalizada!!.");
						//$("#encuesta2p").slideDown('slow');
						preguntar=-1;
						break;
					}
		  cont++;
}
if ( $('input:radio[name=quien_rta]:checked').val()){

	if (preguntar == 1 ){//solo se fue una personas
		control = si_crear1(cuentapergo[0]);
		var per_h1=[];
		switch (control){
			
			case 1: //alert("Se crea el hogar");
				 per_h1[0] = llaves_p[orde_pergo];
			  	    //alert("Se creara el hogar con: "+total+"Personas: "+per_h1);
			  	 orde_pergo=llaves_p[orde_pergo].substr(llaves_p[orde_pergo].length-2, llaves_p[orde_pergo].length);
			  	 crear_hf(per_h1,orde_pergo);

			        break;
			case 2: alert("No se crea hogar a Personas de contexto.");
					preguntar =0;
					//$("#encuesta2p").slideDown('slow');
					break;
			case 0: alert("Continuar con preguntas");
					//mostrar preguntas hogar.
					preguntar =0;
					break;
		}
	}
	if (preguntar == 0){
		$("#encuesta2p").slideDown('slow');
	}

/*
	verifica que haya persona de seguimiento para crea el hogar

*/
 if(preguntar>1 && !estap19){
 	cont = 0;
 	for(var i=0;i<preguntar;i++){//revisa si hay personas de seguimiento o todas son de contexto 
 	    if (si_crear1(cuentapergo[i])==1){
 	    	cont =1;
 	    	break;
 	    }
 	   }
 	   if (cont==1)
 	   	crea_p19(preguntar);
 	   else  	
			$("#encuesta2p").slideDown('slow');   
 }/// fin conpruba si hay por lo meno una per de seguimiento

	}
	else alert("Seleccione la persona que da la Información");
}

function crea_p19(preguntar){//preguntar quienes se fueron juntas
	
	var estap19=document.getElementById('p19');
	//if(preguntar > 1 && !estap19){//Se fueron mas de una persona
	//alert("se fueron:"+preguntar+ "se fueron:"+cuentapergo.length);
    var div = document.createElement("DIV");
    var divpadre = document.getElementById("p16");
	div.setAttribute("id", "p19");
	//div.setAttribute("class","row");
	var nombre, tipo_per, crear;
	var html="<hr>";
	html+="<h3> 19.¿Las personas que no hacen parte del hogar, se fueron juntas o se encuentran en lugares diferentes?</h3>";
	html+="<label><input type='radio'  id='p19a' name='p19' value='1' onclick='crear_juntas(1)'/>Todas se fueron juntas.</label></br>";
    if (preguntar!=2){
	    html+="<label><input type='radio'  id='p19b'";
	    html+=" name='p19' value='2' onclick='verfueroncon()' />Sólo unas se fueron juntas.</label></br>";
	       }
    html+="<label ><input type='radio'  id='p19b' name='p19' value='3' onclick='crear_juntas(2)' />Se fueron a lugares diferentes.</label>";
		// Si las personas se fueron juntas*/
 if (cuentapergo.length > 2){ //si mas de dos personas se fueron y selecciona solo unas se fueron juntas
	html+="<div style='display:none;' id ='sefueron'><h3>23.¿Quiénes se fueron juntas?</h3><span id='error23'>*</span>";
	html+="<ul class='list-group' id='fuecon'>";
	for (var i = 0; i <= cuentapergo.length - 1; i++) {
		nombre = document.getElementById("nombre"+cuentapergo[i]).innerText;
		nombre = nombre.substring(2);
	    html+="<li class='list-group-item list-group-item-success'><label><input type='checkbox' name='sefuecon"+cuentapergo[i]+"' id ='sefuecon"+cuentapergo[i]+"'/>";
	    html+= nombre+"</label><span class='badge'>"+cuentapergo[i]+"</span></li>";
	    //alert("se fueron:"+nombre+"--"+tipo_per);
	}
	html+="</ul><p onclick='crear_h()' class='btn btn-danger'/>Crear Hogar</p></div>";
    }
	var primer_div = document.getElementById("p16").getElementsByTagName('div')[0];
	div.innerHTML+=html;
	//divpadre.insertBefore(div,primer_div);
	divpadre.appendChild(div);

}

function crear_juntas(caso){
	quita_fueroncon();
	var texid = "siper", i=0, px=0, control = 0;
	var hogar_n =[];
	if (caso==1){//Todas se fueron juntas

		for (i=0;i<cuentapergo.length; i++)//Toma las llaves de las personas del nuevo hogar
		  {	
			if (si_crear1(cuentapergo[i])==1 && control != 1){
			    orde_pergo=cuentapergo[i];//numero de la primera persona que es de seguimiento 
			    control=1;
			}
			hogar_n[px++] = llaves_p[cuentapergo[i]];
		}		
		if (control==1){
			orde_pergo=llaves_p[orde_pergo].substr(llaves_p[orde_pergo].length-2, llaves_p[orde_pergo].length);	
			crear_hf(hogar_n,orde_pergo);
		 }
		 else
		 	{alert("No se creara el hogar todas las personas son de Contexto");
		 	$("#encuesta2p").slideDown('slow');
			}
	
		}else {

			for (i=0;i<cuentapergo.length; i++)//Toma las llaves de las personas del nuevo hogar
		  {	
			if (si_crear1(cuentapergo[i])==1 ){
			    orde_pergo=cuentapergo[i];//numero de la primera persona que es de seguimiento 
			    hogar_n[0] = llaves_p[cuentapergo[i]];
			    orde_pergo=llaves_p[orde_pergo].substr(llaves_p[orde_pergo].length-2, llaves_p[orde_pergo].length);
			    crear_hf(hogar_n,orde_pergo);

			}
			else {
				alert("A esta Persona"+hogar_n[0]+"de contexto No se crea hogar!!");
				$("#encuesta2p").slideDown('slow');
			    }
		}		

			//alert("Se creara un hogar para cada persona.");
		}


}



function si_crear1(nro){// retorna si la persona es de seguimiento para el primer caso pregunta 15
			var control=0;
            var nombre = document.getElementById("nombre"+nro).innerText;
	        rta = nombre.indexOf("(")+1;
	    	if (nombre.substring(rta,rta+1)=="S"){
			    control=1;
			}
			if (nombre.substring(rta,rta+1)=="C" && control!=1){
			    control=2;
			}
			
		return control;

}

function si_crear(nro){// retorna si la persona es de seguimiento para crear hogar pregunta 19
	var sefuecon, control=0; 
		sefuecon= "sefuecon"+cuentapergo[nro];
		seleccion=document.getElementById(sefuecon).checked;
		if (seleccion==true){
			nombre = document.getElementById("nombre"+cuentapergo[nro]).innerText;
	        rta = nombre.indexOf("(")+1;
	    	if (nombre.substring(rta,rta+1)=="S"){
			    control=1;
			}
			if (nombre.substring(rta,rta+1)=="C" && control!=1){
			    control=2;
			}
			
		return control;
	}
		//alert("Selecciono: "+seleccion+ "crear hogar"+ control);

}

function crear_h(){
	var  sefuecon=0, seleccion, nombre, rta, control=0,total=0,control2=0;
	var orde_pergo = 0;
	var hogar1=[], ph1=0, per_h1=[];
	for (var i = 0; i < cuentapergo.length; i++) {
		sefuecon= "sefuecon"+cuentapergo[i];
		seleccion=document.getElementById(sefuecon).checked;
		if (seleccion==true){
			hogar1[ph1++] = cuentapergo[i];//saca el numero de la persona que se va
	        total+=1;
	        if (control!=1){
	            control = si_crear(i);
	            orde_pergo=cuentapergo[i];
	        }
		}
	}
	alert("Hogar: "+hogar1);
	if (total<cuentapergo.length) {
		if (control==0)
			alert("Debe seleccionar las personas que se fueron Juntas.");
		if (control==1){
			for (i=0; i< hogar1.length; i++)
				per_h1[i] = llaves_p[hogar1[i]];
		  	    //alert("Se creara el hogar con: "+total+"Personas: "+per_h1);
		  	 orde_pergo=llaves_p[orde_pergo].substr(llaves_p[orde_pergo].length-2, llaves_p[orde_pergo].length);
		  	crear_hf(per_h1,orde_pergo);
		 }
		 if (control == 2)
		 	alert("No se crea hogar a personas de Contexto");
	   }
    else alert("Error selecciono todas las personas!!");
}

function crear_hf(per_h1,orden_pgo){
		var parametros=new Object(), persona="per";
		var texper=[];
		var tex_ll ="", mensaje='';
		var informo = $('input:radio[name=quien_rta]:checked').val();
 	   //alert("Personas del nuevo hogar:"+per_h1.length);
 	   for (var i =0; i < per_h1.length; i++) {
 	   		
 	     	parametros["per"+(i+1)] = per_h1[i];//Personas que se van al nuevo hogar
 	   }
 	   parametros.orden_go= orden_pgo;
 	   parametros.hogar = llaves_p[llaves_p.length-1];
 	   parametros.llave_nh = parametros['hogar'].substr(0, 7)+"5"+"2"+parametros['orden_go'];
 	   parametros.total=i;
 	   parametros.user=$("#user").text();
 	   parametros.base_url = url_base;
 	   parametros.llave_informante = llaves_p[informo];
 	   tex_ll = parseInt(parametros["llave_nh"],10); 
 	   alert("Persona  "+parametros['per1']+" orden "+parametros["orden_go"]+" Llave NH "+parametros["llave_nh"]);
		
   // alert("se creara el hogar "+parametros['persona1']+"Per2"+parametros['persona2']);

        $.ajax({
                data: parametros,
                type: 'POST',
                url: url_base+"index.php/c_elps/crear_h",
                             
                beforeSend: function () {
                        $("#ms").html("<img src='"+url_base+"images/ajax-loader.gif'>");
                },
                success:  function (response) {
                	
                	 if ($.trim(response)){
                	 	  
                	 	 
                	 	  var url_agenda = "</br><span id='bt_ag' onclick='agenda("+tex_ll.toString()+")' class='btn btn-success'>AGENDAR.</span>";
                	 
                	 	  $("#ms").html("Resultado: "+response+url_agenda);
                	 	  
                	 	  for (var i=0; i < cuentapergo.length ; i++){
                	 	  	// var sel =$("sefuecon"+(i+1)).prop("checked","");
                	 	  	 // $(":checked").wrap("<span style='background-color:red'>");
                	 	  	   if ($("#sefuecon"+(i+1)).is(':checked')){
                	 	  	   	 	//alert("sefuecon "+(i+1)+" Esta seleccionado");
                	 	  	   	 	$("#sefuecon"+(i+1)).prop('checked',false);
                	 	  	   	    $("#sefuecon"+(i+1)).prop('disabled',true);
                	 	  	   	 
                	 	  	   	 
                	 	  	   	 //$("#sefuecon"+(i+1)).prop('checked', $("#sefuecon"+(i+1)).is(':checked'));
                	 	  	     // $("sefuecon"+i).disabled = "disabled";
                	 	  	     //$(".cbk").prop('checked', $(this).is(':checked'));
                	 	  	   	   } 
                	 	  	   	  // else $("#sefuecon"+(i+1)).prop('checked',false);
                	 	  }
                	 	  }
                	   	else {
                			$("#ms").html("Error No se creo el hogar");
                	 }
                },
             error: function(errorThrown){
        	 alert(errorThrown);
        	 alert("Ocurrio un error en AJAX!");
    }  
        });
}

function guarda_actualiza(){
	var parametros=new Object(), persona="per";
		var texper=[];
		var tex_ll ="";
 	   //alert("Personas del nuevo hogar:"+per_h1.length);
 	   for (var i =0; i < per_h1.length; i++) {
 	   		
 	     	parametros["per"+(i+1)] = per_h1[i];//Personas que se van a guardar/actualizar.
 	   }
 	   parametros.hogar = llaves_p[llaves_p.length-1];
 	   parametros.llave_nh = parametros['hogar'].substr(0, 7)+"5"+"2"+parametros['orden_go'];
 	   parametros.total=i;
 	   parametros.user=$("#user").text();
 	   parametros.base_url = url_base;
 	   tex_ll = parseInt(parametros["llave_nh"],10); 
 	   alert("texto para array"+parametros['per1']+"orden"+parametros["orden_go"]+"Llave NH "+parametros["llave_nh"]);
		
   // alert("se creara el hogar "+parametros['persona1']+"Per2"+parametros['persona2']);

        $.ajax({
                data: parametros,
                type: 'POST',
                url: url_base+"index.php/c_elps/guardar",
            
                beforeSend: function () {
                        $("#ms2").html("<img src='"+url_base+"images/ajax-loader.gif'/>");
                },
                success:  function (response) {
                	
                	 if ($.trim(response)){
                	 	  //Regresar con href  elps_view
                	      var url_consultar = "</br><span id='bt_ag' onclick='agenda("+tex_ll.toString()+")' class='btn btn-success'>REGRESAR.</span>";
                	 	  $("#ms2").html("Resultado: "+response+url_agenda);
             	 
                	 	  }
                	   	else {
                			$("#ms").html("Error No se creo el hogar");
                	 }
                },
             error: function(errorThrown){
        	 alert(errorThrown);
        	 alert("Ocurrio un error en AJAX!");
    }  
        });
}


function muestra_info(np,id){
	switch(id) {

	    case "pq_noinfo":
	    //alert("mostrar pqs color "+document.getElementById("li_noinf7").style.backgroundColor);
	    	$('#pq_noinfo').prop('disabled',false);
	    	document.getElementById("gr_rechazo").style.display='none';
	    	agenda('caso_noa');
	        //$("#pq_no").show();
	        break;
	    case "gr_rechazo":
	     //alert("mostrar pqs color "+document.getElementById("li_noinf7").style.backgroundColor);
	        document.getElementById(id).style.display='inline';
	        $('#pq_noinfo').val('');
	        $('#pq_noinfo').prop('disabled',true);
	        agenda('caso_noa');
	        //document.getElementById("li_noinf7").style.backgroundColor='purple';
	        break;

	      default:;
	}
}

function agenda(ll_nh) {
	//{llave_nh:ll_nh}
	var  llave_h="";
	if(ll_nh=='caso_noa' || ll_nh == 'incompleto'){
		llave_h = $('#ll_h').text();		
	  }else{//agenda nuevo hogar
		llave_h = ll_nh.toString();
		while(ll_nh.length<11)
         llave_h = "0" + llave_h;
	   }
		//alert("Se agenda "+n);

	$.get(url_base+"index.php/c_elps/agendar/"+llave_h,
		function(data,status){
			switch(ll_nh) {
				case 'caso_noa':
						$("#rta_noa").html(data);
						 break;
				case 'incompleto':
						$("#ms_e").html(data);
						break;
				default : 
						$("#ms").html(data);
						break;
			}
		});
}


function verfueroncon(){

	contenido=document.getElementById("sefueron")
	if (contenido)
	   contenido.style.display = 'block';
}
function quita_fueroncon(){
	if (contenido=document.getElementById("sefueron"))
		contenido.parentNode.removeChild(contenido);
}

function hideinfo(np){
	//alert("el  id=infopergo "+id+" es"+this.id);
	if (contenido=document.getElementById("infopergo"+np))
		contenido.style.display = 'none';

}



function showinfo(np){
	//alert("el  id=infopergo "+id+" es"+this.id);
	document.getElementById("infopergo"+np).style.display = 'block';
}

function flujoh(np){//despliega sub preguntas de p16

    var divp= "rp16"+np;
    var p18="p18"+np;
	var rp16= document.getElementById(divp).value;
	var divpadre = document.getElementById("p16"+np);
	var nombre = document.getElementById("nombre"+np).innerText;
	    nombre = nombre.substring(2);
    if (contenido=document.getElementById(p18))
	    contenido.parentNode.removeChild(contenido);
	//alert("No vive: "+np+"Porque"+rp16);
	if (rp16==0){
	   alert("Seleccione una razon porque no hace parte de este hogar!");
     }
     else if (rp16==7){
     	
	 	var div = document.createElement("DIV");
	 		div.setAttribute("id", p18);
	 		//div.setAttribute("class","row");
	 		html="<h4> 16_a.Cual razón:";
	 		html+="<input type='text' id='razon_pergo"+np+"' class='form-control'/></h4>";
		 	div.innerHTML=html;
		 	divpadre.appendChild(div);
     }
        else if (rp16==3){
     	
	 	var div = document.createElement("DIV");
	 		div.setAttribute("id", p18);
	 		div.setAttribute("class","row");
	 		var html="<div class='col-sm-6'>";
	 		html+="<h4 >17_a.¿Se mudó de país de manera permanente o de vacaciones (por un tiempo)?</h4></div>";
	 		html+="<div  class='col-sm-6'><label><input type='radio'  id='gopais"+np+"'";
	 	    html+=" name='gopais"+np+"' value='1' />Permanente</label></br>";
		 	html+="<label><input type='radio' id='notel' name='gopais"+np+"' value='2' />De vacaciones</label></div>";
		 	// si la persona que se va tiene telefonos 	/*19	Teléfono fijo		20	Celular		21	Otra info.			*/
		 	
		 	div.innerHTML=html;
		 	divpadre.appendChild(div);
     }

	  else if ((rp16==1||rp16==4||rp16==5||rp16==6) && rp16)
		{
		//alert("Oprima continuar si ya pregunto por TODAS las Personas");
		}
	 else if (rp16==2){//se mudo de vivienda pregunta 17 y 18 si sefueron mas personas
	 		 
	 	 	var div = document.createElement("DIV");
	 		div.setAttribute("id", p18);
	 		div.setAttribute("class","row");
	 		var html="<div>";
	 		var yasell=false;
		     for (var i = cuentapergo.length - 1; i >= 0; i--) {
				if (cuentapergo[i]==np){
					yasell=true;
					break;
				}
			}
			if (yasell==false) cuentapergo[cuentapergo.length]=np;

	 		html+="<h4> 18.Tiene algún teléfono o información que nos permita comunicarnos con <b>"+nombre+"?</b></h4>";
	 		html+="<label class='col-sm-1'><input type='radio'  id='sitel"+np+"'";
	 	    html+=" name='sitel"+np+"' onclick='showinfo("+np+")' value='1'/>Si</label>";
		 	html+="<label class='col-sm-1'><input type='radio' id='notel' name='sitel"+np+"' onclick='hideinfo("+np+")' value='2'/>No</label></div>";
		 	// si la persona que se va tiene telefonos 	/*19	Teléfono fijo		20	Celular		21	Otra info.			*/
		 	html+="<div class='col-sm-8' id='infopergo"+np+"' style='display:none;'>";
		 	html+="Indicativo:<select id='indicativo"+np+"'><option value =''>Indicativo</option><option value ='(1)'>1</option><option value ='(2)'>2</option><option value ='(4)'>4</option> <option value ='(5)'>5</option><option value ='(6)'>6</option><option value ='(7)'>7</option><option value ='(8)'>8</option></select>";
		 	html+="<p>19.Teléfono fijo.<input type='number' id='tf_pergo"+np+"' min='1' max='9999999'/></p>";
		 	html+="<p>20.Celular.";
		 	html+="<input type='number' id='cel_pergo"+np+"' min='1000000000' max='9999999999'></p>";
		 	html+="<p>21.Otra info.";
		 	html+="<textarea id='text_pergo"+np+"'></textarea></p>";
		 	html+="</div>";
		 	div.innerHTML=html;
		 	divpadre.appendChild(div);
	}
}
function borra_p16(np){

var sip = "siper"+np;	
var divp= "p16"+np;
document.getElementById(divp).innerHTML=" ";

if( p19 = document.getElementById("p19"))//
	p19.parentNode.removeChild(p19);
//($("#ms"))
$("#ms").html("");

$("#encuesta2p").hide();

for (var i = cuentapergo.length - 1; i >= 0; i--) {
	if (cuentapergo[i]==np){
		cuentapergo.splice(i,1);
		break;
	} 
}
//m_pergo=cuentapergo;
//alert("Quedan"+cuentapergo+"Se quita"+ np);

}

function p16(persona, np){
		  var divp= "p16"+np;
	/*   var yasell=false;
		     for (var i = cuentapergo.length - 1; i >= 0; i--) {
				if (cuentapergo[i]==np){
					yasell=true;
					break;
				}
			}
			if (yasell==false) cuentapergo[cuentapergo.length]=np;*/

		    //alert("El valor contador:"+cuentapergo.length+"Personas"+cuentapergo);
			var html="";
			html="<h3>16_"+np+". ¿Por qué razón "+persona+" No hace parte de este hogar? </h3>";
			html+="<select onchange='flujoh("+np+")' id='rp16"+np+"'>";
			html+="<option value=0>Seleccione...</option>";
			html+="<option value=1>1.Fallecio.</option>";
			html+="<option value=2>2.Se mudó de vivienda.</option>";
			html+="<option value=3>3.Se mudó del país.</option>";
			html+="<option value=4>4.Se encuentra en un hospital, centro de rehabilitación, centro de reclusión u otro.</option>";
			html+="<option value=5>5.Se encuentra prestando servicio militar.</option>";
			html+="<option value=6>6.Se encuentra desaparecida.</option>";
			html+="<option value=7>7.Otro.</option></select>";
			document.getElementById(divp).innerHTML=html;

			if($('#p19')){
				$('#p19').remove();
			}
		
}


 //alert ("Bienvenido!..");
  function muetra_menu()
  	{
  		document.getElementById("menu").disabled="false";

  	}
/*Funciones para formulario view_datos.php*/
function activa_e(){
	document.getElementById("encuesta").disabled="false";
	alert('intenta desactivar');
	
}

function genera_pq_mudo(){
	//var persona="Kike";
	var persona= document.getElementById("hace_parte1").value;
	alert("generando form"+persona);
}

/*Fin funciones para view_datos.php*/

function cargar(id){
 
   $.get("<?php echo base_url('home/getData')?>","", function(data){
    console.log(data)
   //$("#cargaexterna").html(htmlexterno);
      });
    if(!document.getElementById("usuario").value){
		//alert("ingrese un valor");
		$("#ms").html("digite algo");

    }

}

 function realizaProceso(valorCaja1, valorCaja2){

        var parametros = {
                "user" : valorCaja1,
                "pw" : valorCaja2
        };
    //alert("se enviara"+parametros['user']+" "+parametros['pw']);

        $.ajax({
                //data:  parametros,
                //
              data: $("#ingreso").serialize(),//'user='+valorCaja1,
               type: 'POST',
                //url: "application/controllers/temp.php",
                url: "http://localhost/ecas_v2/index.php/ecas/get_user",
                //url: "http://localhost/ecas_v2/index.php/ecas/getData",
                //url: '<?php echo base_url(); ?>index.php/match/list_dropdown', 
                //url:   'application/views/v_lote.php',
                
                beforeSend: function () {
                        $("#ms").html("<img src='images/ajax-loader.gif'>");
                },
                success:  function (response) {
                	
                	 if ($.trim(response)){
                	 	  
                	 	  document.getElementById("menu").style.display = "block";
                	 	  /*$("ul#menu li#lote a").css("background-color", "#800080");*/
                	 	  $("#rta").html("<p>Usuario: "+valorCaja1+"</p><br>"+response);
                	 }
                	else {
                		$("#ms").html("Usuario o Contraseña invalidos..");
                	 }
                },
             error: function(errorThrown){
        	 alert(errorThrown);
        	 alert("Ocurrio un error en AJAX!");
    }  
        });
}

function ms (){

	alert("Formulario valido!");
}

function valida_pw(){
		
	   var clave = document.getElementById("pw").value;
	   var clave2 = document.getElementById("pw2").value;

	   if (clave != clave2){
	   		alert("Las claves no coinciden!"+ clave2+" y "+clave);
	   		clave2.value = null;
	   		//clave2.focus();
	   }
	   //cargaDiv ("#rta", )
	   else alert("claves Iguales");
	   }
/*·············*/
function valida_mail (){
	
		var m1 = document.getElementsByName("m1")[0].value;
		var m2 = document.getElementsByName("m2")[0].value;
		
		//alert("correos :"+m1+" "+m2);

		if (m1 ==""|| m1.indexOf('@')==-1 || m1.indexOf('.')==-1) {
			
			document.getElementsByName("m1")[0].focus();
			document.getElementById("nta1").innerHTML="No es un correo"
		}
		else document.getElementById("nta1").innerHTML="Ok"

     /* expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(m1)) 
		alert("Correo válido");
	else  alert("Fallo su Correo");*/

}

 function compara_mail (){
   		
   	    var m1 = document.getElementsByName("m1")[0].value;
		var m2 = document.getElementsByName("m2")[0].value;

		if (m1!==m2){
		
			document.getElementById("nota").innerHTML="Correos NO son Iguales"
			document.getElementsByName("m1")[0].focus();
			document.getElementById("res").disabled="true";
		 }
		else {
			document.getElementById("nota").innerHTML="Ok"
			document.getElementById("res").disabled=false;

		}

   }


function valida_q(){
    var op =document.getElementsByName("Jornada")[0].value;
    alert("la opcion es: "+op);
     var sel = false;
     for (var i = 0  ; op.length - 1; i++) {
      	if (op[i].cheked){
      		sel = true;
      		break;
      	}
     }
	if(!sel){
		return sel;
	}
	return sel;
}


function  valida(){
		
   	//alert("valores validados pero no abre pàgina");
	var campo = document.getElementById('usuario').value;
	var campo2 = document.getElementById('pw').value;
	//var rta= document.getElementById("rta");
	//var clave2 = document.getElementsByName('pw2')[0].value;
	 
			if (campo.length >= 4 && campo2.length >=4 ){
	 
					return true;
 			}
 		 else {
 		 	 
 		 	 $("#ms").html("longitud de campos debe ser mayor a 3");
 		 	 return false;
 		 	
 		 	}
 		}

 		 	/*document.getElementsByName('usuario')[0].placeholder = "Debe ingresar un usuario";*/
		 	
	function cargaDiv(div, url){
		  	$(div).load(url);
		  }
	function calculo (val1,val2,rta,desde,hasta){
		
		
		var dato1 = document.getElementsByName(val1)[0].value;
		var dato2 = document.getElementsByName(val2)[0].value;
		var r = parseInt(dato1)-parseInt(dato2);
		if (r < desde || r > hasta){
			document.getElementById("error").innerHTML=" Valor No esta entre "+desde+" y "+hasta;
		}
	   else {
       document.getElementById(rta).value= r;
       document.getElementById(rta).setAttribute("readonly" , "readonly" , false);
          }
      
		
		/*var i = parseInt(prompt("Teclea un numero entero"));
var j = parseInt(prompt("Teclea otro numero entero"));
 
document.write("La suma de las variables i + j da: " + (i + j));*/

	}


