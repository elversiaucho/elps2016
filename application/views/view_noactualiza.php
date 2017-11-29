
<?php $total_p = $_GET['total_p']-1?>
<!--form id="no_encuesta" action ="" onsubmit="return fr_valida()"-->
<h3>58. Por qu&eacute; raz&oacute;n la informaci&oacute;n no fue actualizada?</h3>	

<ul class="list-group">
  	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='noactuliza' id= 'rnoinfo1' value='1' class="opciones1" />
	                  No se pudo contactar a las personas del hogar.
	</label><span class='badge'>1</span></li>
	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='noactuliza' id= 'rnoinfo2' value='2' class="opciones1"/>
	                  No se pudo contactar a la(s) persona(s) de contacto.
	</label><span class='badge'>2</span></li>
	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='noactuliza' id= 'rnoinfo3' value='3' class="opciones1"/>
	                  Los integrantes murieron.
	</label><span class='badge'>3</span></li>
	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='noactuliza' id= 'rnoinfo4' value='4' class="opciones1"/>
	                  Los integrantes cambiaron de pa&iacute;s.
	</label><span class='badge'>4</span></li>
	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='noactuliza' id= 'rnoinfo5' value='5' class="opciones1"/>
	                  La persona de contacto no da raz&oacute;n de las personas del hogar.
	</label><span class='badge'>5</span></li>
	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='noactuliza' id= 'rnoinfo6' value='6' onclick="agenda('caso_noa')"/>
	                  Las personas no quisieron actualizar la informaci&oacute;n.
	</label><span class='badge'>6</span></li>
	<li class='list-group-item list-group-item-success' id="li_noinf7">
    <label><input type='radio' name='noactuliza' id= 'rnoinfo7' value='7' onclick="muestra_info(0,'gr_rechazo')"/>
	                  Rechazo de la encuesta.
	</label><span class='badge'>7</span></li>
	<li class='list-group-item list-group-item-success' id="li_noinf8" >
	    <label><input type='radio' name='noactuliza' id= 'rnoinfo8' value='8' onclick="muestra_info(0,'pq_noinfo')" />
		                  Otro.
		</label>
		Cual raz&oacute;n:<input type='text' id='pq_noinfo' class='form-control' disabled/>
		<span class='badge'>8</span>
	</li>
	
</ul>
<div style="display: none;" id='gr_rechazo'>
<h3>59. Qu&eacute; grado de rechazo present&oacute;?	</h3>
				
<ul class="list-group" >
	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='rechazo' id= 'rechazo1' value='1'/>
	              Leve: Podr&iacute;a responder en otro momento o a otra persona.
	</label><span class='badge'>1</span></li>

	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='rechazo' id= 'rechazo2' value='2'/>
	                  Medio: Se molest&oacute; por la llamada. Podr&iacute;a ser contactado por alguien m&aacute;s.
	</label><span class='badge'>2</span></li>

	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='rechazo' id= 'rechazo3' value='3'/>
	                 Alto: Se molest&oacute; mucho y no quiere seguir en la muestra. Es probable que no se pueda convencer.
	</label><span class='badge'>3</span></li>

	<li class='list-group-item list-group-item-success'>
    <label><input type='radio' name='rechazo' id= 'rechazo4' value='4'/>
	                  Muy alto: fue grocero(a). Es mejor no conctarlo nuevamente.
	</label><span class='badge'>4</span></li>	

</ul>
</div>
<div>
	<h4>60. Comentarios del monitor:</h4>
	<input type='text' id='comenta' class='form-control'/>
</div>
<p id ="rta_noa"> </p>
<a href= "#" id="bt_noa" onclick="guarda_noa()" class="btn btn-danger">GUARDAR.</a>
<!--span id='bt_ag' onclick="agenda('caso_noa')" class='btn btn-success'>AGENDAR.</span-->
	
<script type="text/javascript">

$(document).ready(function(){
	$(".opciones1").click(function(){
		$("#rta_noa").html("");
		$("#gr_rechazo").slideUp('slow');
		$('#pq_noinfo').val('');
	    $('#pq_noinfo').prop('disabled',true);
	});
	
	$("#rnoinfo6").click(function(){
		$("#gr_rechazo").slideUp('slow');
		$('#pq_noinfo').val('');
	    $('#pq_noinfo').prop('disabled',true);
	});


});

function guarda_noa(){
		
		if ($("#rno").prop("checked") && $('input:radio[name=noactuliza]:checked').val()){
		    //alert("Se guardará la informacion de no respuesta.");
		    var user = $("#user").text();
			var ll_nh = $("#ll_h").text();
			 var  n = ll_nh.toString();
		     while(n.length<11){
		         n = "0" + n;
		     }
		     
		      var ctr_tels_f1 = [], ctr_tels_f2 = [], ctr_tels_cel1 = [], ctr_tels_cel2 = [], ctr_tel1s_pc = [], ctr_tel2_pc =[];//contol de telefonos fijos1
		       <?php for ($i=0; $i< $total_p; $i++){?>
		       	if($('input:radio[name=rta_tel_f1<?php echo ($i+1)?>]:checked').val())
				  ctr_tels_f1[<?php echo $i?>]= $('input:radio[name=rta_tel_f1<?php echo ($i+1)?>]:checked').val();
				else ctr_tels_f1[<?php echo $i?>] = '0';

				if ($('input:radio[name=rta_tel_f2<?php echo ($i+1)?>]:checked').val())
				  ctr_tels_f2[<?php echo $i?>]= $('input:radio[name=rta_tel_f2<?php echo ($i+1)?>]:checked').val();
				else ctr_tels_f2[<?php echo $i?>] ='0';

				if($('input:radio[name=rta_cel1<?php echo ($i+1)?>]:checked').val())
				  ctr_tels_cel1[<?php echo $i?>]= $('input:radio[name=rta_cel1<?php echo ($i+1)?>]:checked').val();
				else ctr_tels_cel1[<?php echo $i?>] = '0';

				if ($('input:radio[name=rta_cel2<?php echo ($i+1)?>]:checked').val())
				  ctr_tels_cel2[<?php echo $i?>]= $('input:radio[name=rta_cel2<?php echo ($i+1)?>]:checked').val();
				else ctr_tels_cel2[<?php echo $i?>] ='0';

				if($('input:radio[name=rta_tel_pc1<?php echo ($i+1)?>]:checked').val())
				  ctr_tel1s_pc[<?php echo $i?>]= $('input:radio[name=rta_tel_pc1<?php echo ($i+1)?>]:checked').val();
				else ctr_tel1s_pc[<?php echo $i?>] ='0';

				if($('input:radio[name=rta_tel_pc2<?php echo ($i+1)?>]:checked').val())
				  ctr_tel2_pc[<?php echo $i?>]= $('input:radio[name=rta_tel_pc2<?php echo ($i+1)?>]:checked').val();
				else ctr_tel2_pc[<?php echo $i?>] = '0';
				<?php }?> 
			 //alert("Control tel1: "+$('input:radio[name=rta_tel_f13]:checked').val()+ "P4"+$('input:radio[name=rta_tel_f14]:checked').val()+"tOTAL PER: " +llaves_p.length-1);
			// alert("Total per:"+ <?php echo $total_p?>);
			$.post(url_base+"index.php/c_elps/guarda_noactualiza",{
				  LLAVE_TEM_H: n,
				  PQ_NOACTUALIZA : $('input:radio[name=noactuliza]:checked').val(),
				  OTRO_ACTUALIZA : $("#pq_noinfo").val(),
				  GRADO_RECHAZO : $('input:radio[name=rechazo]:checked').val(),
				  USUARIO : user,
				  COMENTARIOS : $("#comenta").val(),
				  TOTAL_PER : <?php echo $total_p?>,
				  CONTROL_TELF1 : ctr_tels_f1,
				  ctr_telsf2	: ctr_tels_f2,
				  ctr_tels_c1	: ctr_tels_cel1,
				  ctr_tels_c2	: ctr_tels_cel2,
				  ctr_t1_pc	: ctr_tel1s_pc,
				  ctr_t2_pc	: ctr_tel2_pc,
				  //-------Info para tabla per_actualizadas2016
				  LLAVES_PER : llaves_p
				},
				function(data,status){
					//index.php/c_elps/"+user+"
					//alert("Se resivio data:"+data+"estado:"+status);

					var tx_html = "<a href ='"+url_base+"index.php/c_elps'> Regresar</a>";
					$("#cuestionario").html(data);
					$("#noencuesta").html(tx_html);
				});
	   } // fin si dijo no y selecciono una razon de no encuesta
	   else alert("Debe Seleccionar una razón... ");


}
</script>

