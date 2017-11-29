	<style>
		#chartdiv {
			width		: 100%;
			height		: 435px;
			font-size	: 11px;
		}
	</style>
	
	<script src="<?php echo base_url("/js/amcharts/amcharts.js"); ?>"></script>
	<script src="<?php echo base_url("/js/amcharts/pie.js"); ?>"></script>
	<script src="<?php echo base_url("/js/amcharts/themes/light.js"); ?>"></script>
	
	<script type="text/javascript">
		$(function(){

			$("#txtPrueba1").largo(5).hint("Prueba 01","Este es un mensaje de prueba. Acá puedo escribir un texto larguisimo pero no sé que tan largo pueda llegar a mostrarse el texto dentro del Qtip.");
			$("#txtPrueba2").largo(5).hint("Prueba 02","Este es un mensaje de prueba. Acá puedo escribir un texto larguisimo pero no sé que tan largo pueda llegar a mostrarse el texto dentro del Qtip.");
		    $("#txtFecha").datepicker();
		    $("#cmbControl1").cargarCombo("cmbControl2", base_url + "prueba/prueba/actualizarCombo");

			$("#btnDescargaExcel").bind("click",function(){
				location.href = base_url + "/prueba/prueba/pruebaExcel";	 
			});

			$("#btnDescargaPDF").bind("click",function(){
				location.href = base_url + "/prueba/prueba/pruebaPDF";	 
			});
					    
			
			//Configuracion de JQGrid
			$.jgrid.defaults.width = 1170;
			$.jgrid.defaults.styleUI = 'Bootstrap';
			$.jgrid.defaults.responsive = true;

			$("#jqGrid").jqGrid({				
				url: base_url + "prueba/prueba/jsonQuery",							
				datatype: "json",
				colModel: [
				    { label: 'ID Usuario', name: 'id_usuario', width: 90, sorttype: 'number' },
					{ label: 'Num. Ident', name: 'num_ident', width: 90 },
					{ label: 'Nom. Usuario', name: 'nom_usuario', width: 90 },
					{ label: 'Ape. Usuario', name: 'ape_usuario', width: 140 },				
					{ label: 'Tel. Usuario', name: 'tel_usuario', width: 200 },
					{ label: 'Ext. Usuario', name: 'ext_usuario', width: 100 },
					{ label: 'Mail Usuario', name: 'mail_usuario', width: 50 },
					{ label: 'Dep. Usuario', name: 'dep_usuario', width: 285 },				
					{ label: 'Terr. Usuario', name: 'terr_usuario', width: 90 },
					{ label: 'Tipov. Usuario', name: 'tipov_usuario', width: 100 },
					{ label: 'Log. Usuario', name: 'log_usuario', width: 100 },
					{ label: 'Pas. Usuario', name: 'pas_usuario', width: 100 },
					{ label: 'Rol. Usuario', name: 'rol_usuario', width: 100 },
					
				],
				viewrecords: true,  //show the current page, data rang and total records on the toolbar
				shrinkToFit: false, //Muestra la barra de desplazamiento horizontal
				width: 1170,
				height: 370,
				rowNum: 30,
				loadonce: true, // this is just for the demo
				pager: "#jqGridPager"
			});

		    $("#frmPruebas").validate({
				rules: {
					txtPrueba1: { required: true },
					txtPrueba2: { required: true },
					txtFecha: { required: true },
					cmbControl1: { comboBox: '-' },
					cmbControl2: { comboBox: '-' }
				},
				messages: {
					txtPrueba1: { required: "Debe diligenciar este campo" },
					txtPrueba2: { required: "Debe diligenciar este campo" },
					txtFecha: { required: "Debe diligenciar este campo" },
					cmbControl1: { comboBox: "Debe seleccionar un valor en el combo 1" },
					cmbControl2: { comboBox: "Debe seleccionar un valor en el combo 2" }
				},
				errorPlacement: function(error, element) {
					//Mostrar el error en la parte de abajo de la caja de texto.
					element.after(error);		        
					error.css('display','block');
					error.css('float','none');
					error.css('vertical-align','top');
					error.css('margin-left','10px');				
					error.css('color',"#FF0000");
				},
				submitHandler: function(form) {
					//Valido las fechas antes de hacer el submit de la caratula
					alert("Enviar formulario");							
				}
			});


			/*** Graficas de AMCHARTS ***/
		    var chart = AmCharts.makeChart( "chartdiv", {
		    	  "type": "pie",
		    	  "theme": "light",
		    	  "dataProvider": [ {
		    	    "country": "Lithuania",
		    	    "value": 260
		    	  }, {
		    	    "country": "Ireland",
		    	    "value": 201
		    	  }, {
		    	    "country": "Germany",
		    	    "value": 65
		    	  }, {
		    	    "country": "Australia",
		    	    "value": 39
		    	  }, {
		    	    "country": "UK",
		    	    "value": 19
		    	  }, {
		    	    "country": "Latvia",
		    	    "value": 10
		    	  } ],
		    	  "valueField": "value",
		    	  "titleField": "country",
		    	  "outlineAlpha": 0.4,
		    	  "depth3D": 15,
		    	  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
		    	  "angle": 30,
		    	  "export": {
		    	    "enabled": true
		    	  }
		    	} );
		    	jQuery( '.chart-input' ).off().on( 'input change', function() {
		    	  var property = jQuery( this ).data( 'property' );
		    	  var target = chart;
		    	  var value = Number( this.value );
		    	  chart.startDuration = 0;

		    	  if ( property == 'innerRadius' ) {
		    	    value += "%";
		    	  }

		    	  target[ property ] = value;
		    	  chart.validateNow();
		    	} );


			
		});
	</script>

	<div class="row">
		<div class="col-md-9">
		
				<form id="frmPruebas" name="frmPruebas" method="post" action="">
		<table>
		<tr>
		  <td><input type="text" id="txtPrueba1" name="txtPrueba1" value=""/></td>
		</tr>
		<tr>
		  <td><input type="text" id="txtPrueba2" name="txtPrueba2" value=""/></td>
		</tr>
		<tr>
		  <td><input type="text" id="txtFecha" name="txtFecha" value=""/></td>
		</tr>
		</table>
		<br/>
		<table>
		<tr>
		  <td><select id="cmbControl1" name="cmbControl1" class="">
		      <option value="-">Seleccione...</option>
		      <option value="1">Opcion 1</option>
		      <option value="2">Opcion 2</option>
		      <option value="3">Opcion 3</option>
		      <option value="4">Opcion 4</option>
		      <option value="5">Opcion 5</option>
		      </select>
		  </td>
		</tr>
		<tr>
		  <td><select id="cmbControl2" name="cmbControl2" class="">
		      <option value="-">Seleccione...</option>
		      </select>
		  </td>
		</tr>
		</table>
		<br/><br/>
		<input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar"/>
	</form>
		
		</div>
		<div class="col-md-3">
			<button type="button" id="btnDescargaExcel" class="btn btn-sm btn-primary">Descargar Excel</button>
			<button type="button" id="btnDescargaPDF" class="btn btn-sm btn-primary">Descargar PDF</button>
		</div>
	</div>
	
	<br/>
	<div class="row">
		<div id="resultAAdmin" class="col-md-12">
			<div class="centergrid">
				<table id="jqGrid"></table>
				<div id="jqGridPager"></div>
			</div>
		</div>
	</div>
	<br/>
	<div id="chartdiv"></div>
<div class="container-fluid">
  <div class="row text-center" style="overflow:hidden;">
		<div class="col-sm-3" style="float: none !important;display: inline-block;">
			<label class="text-left">Angle:</label>
			<input class="chart-input" data-property="angle" type="range" min="0" max="60" value="30" step="1"/>	
		</div>

		<div class="col-sm-3" style="float: none !important;display: inline-block;">
			<label class="text-left">Depth:</label>
			<input class="chart-input" data-property="depth3D" type="range" min="1" max="25" value="10" step="1"/>
		</div>
		<div class="col-sm-3" style="float: none !important;display: inline-block;">
			<label class="text-left">Inner-Radius:</label>
			<input class="chart-input" data-property="innerRadius" type="range" min="0" max="80" value="0" step="1"/>
		</div>
	</div>
</div>
	
