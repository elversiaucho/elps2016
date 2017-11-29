/**********************************************************************************
 * Septiembre 15 de 2015
 * Libreria para la validacion de formularios de captura (Encuestas DANE)
 * Requiere de: 
 *  - jquery.validate.min.js
 *  - jquery.qtip.js
 **********************************************************************************/

	var base_url = "/dimpe/cnp/";  //Ruta base para ejecutar AJAX en CodeIgniter
	
	//Configuración de DatePickers de JqueryUI en el idioma Español
	//***************************************************************
	$.datepicker.regional['es'] = { closeText: 'Cerrar',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','S&aacute;b'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
            weekHeader: 'Sem',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	
	
	/**********************************************************************************************************************
	 * Métodos de Validacion agregados a JQuery Validator.
	 * @author Daniel M. Díaz 
	 * @since  21/09/2015
	 *********************************************************************************************************************/
	
	//Agrega método de validacion de controles Select en jQuery.Validate
	//******************************************************************	
	$.validator.addMethod("comboBox",function (value, element, param){		
		var result = false;
		$("select:disabled").attr("disabled",false); //Habilitar todos los controles select que estén deshabilitados.
		var string = (param).toString();
		if($(element).val()==string)		    
			result = false;
		else
		    result = true;		
		return result;
	},"");
	
	
	/********************************************************************************************************************
	 * Funciones JQUERY	Adicionales.
	 * @author Daniel M. Díaz
	 * @since  21/09/2015 
	 ********************************************************************************************************************/
		
	//Función JQUERY para generar mensajes "hint" junto a cajas de texto 
	//*******************************************************************
	$.fn.hint = function(titulo, mensaje){
		var id = $(this).attr("id");
		var image = base_url + "/images/help.png";
		$(this).parent().append('&nbsp;<img id="hint'+id+'" src="'+image+'" border="0"/>&nbsp;&nbsp;');
		return $("#hint"+id).qtip({
			content: {
		        title: titulo,
				text: mensaje		        
		    },
		    position: {
		        my: 'top left'
		    },
		    style: {
		    	classes: 'qtip-bootstrap qtipDANE'
		    }
		});		
	};
		
	//Funcion JQUERY para ejecutar una funcion ajax para actualizar comboBox dependientes
	//*****************************************************************************************
	$.fn.cargarCombo = function(element,url){		
		return this.change(function(event){
			$("#"+element).attr("disabled",true);
			$("#"+element+" option[value='-']").attr("selected","selected");
			if ($(this).val()!='-'){
				$.ajax({
					type: "POST",
					url: url,
					data: "id=" + $(this).val(),
				    dataType: "html",
					cache: false,
					success: function(html){
						var target = "#" + element;
						$(target).html("");
						$(html).appendTo(target);	
						$("#"+element).attr("disabled",false);
						$("#"+element+" option[value='-']").attr("selected","selected");
					},
					error: function(result) {
						$("#"+element).attr("disabled",true);
						$("#"+element+" option[value='-']").attr("selected","selected");
					}
				});
			}
		});
	};
	
	//Funcion JQUERY para establecer el valor máximo de caracteres que pueden ir en un textbox.
	//*****************************************************************************************
	$.fn.largo = function(expresion) {
		return this.keypress(function(event){
			if ((event.which == 8)||(event.which == 0)) 
				return true;
			else if ($(this).val().length < expresion)
					return true;
				 else
					return false;
		});     
	};
	
	//Funcion JQUERY para bloquear el ingreso de caracteres de texto en un texbox. Solo permite números.
	//**************************************************************************************************
	$.fn.bloquearTexto = function() {
		return this.keypress(function(event){    		
    		if ((event.which == 8)||(event.which == 0)||(event.which == 45)) return true;
    		if ((event.which >=48)&&(event.which <=57)) 
    			return true;
    		else
    			return false;    		
		});     
	};
	
	//Funcion JQUERY para bloquear el ingreso de caracteres numericos en un textbox. Solo permite letras.
	//****************************************************************************************************
	$.fn.bloquearNumeros = function() {
	    return this.keypress(function(event){
	    		if ((event.which<48)||(event.which>57))
	    			return true;
	    		else
	    			return false;
	    });    
	};
	
	//Funcion JQUERY para convertir el contenido de un textbox todo a mayusculas.
	//****************************************************************************
	$.fn.Mayusculas = function(){
		return this.blur(function(event){
			$(this).val($(this).val().toUpperCase());
		});
	};
	
	//Funcion JQUERY para convertir el contenido de un textbox todo a minusculas.
	//****************************************************************************
	$.fn.Minusculas = function(){
		return this.blur(function(event){
			$(this).val($(this).val().toLowerCase());
		});
	};
	
	
