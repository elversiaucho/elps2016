<?php
AMAZONAS
ARAUCA
BOGOTA D.C.
BOLIVAR
BOYACA
CALDAS
CAQUETA
CASANARE
CAUCA
CESAR
CHOCO
CORDOBA
CUNDINAMARCA
GUAINIA
GUAJIRA
GUAVIARE
HUILA
MAGDALENA
META
NARIÑO
NORTE DE SANTANDER
NTIOQUIA
PUTUMAYO
QUINDIO
RISARALDA
SAN ANDRES, PROVIDENCIA Y SANTA CATALINA
SANTANDER
SUCRE
TLANTICO
TOLIMA
VALLE DEL CAUCA
VAUPES
VICHADA


<option value='81'>
ARAUCA</option>	<option value='11'>
BOGOTA D.C.</option>	<option value='97'>
VAUPES</option>	<option value='13'>
BOLIVAR</option>	<option value='95'>
GUAVIARE</option>	<option value='70'>
SUCRE</option>	<option value='17'>
CALDAS</option>	<option value='18'>
CAQUETA</option>	<option value='54'>
NORTE DE SANTANDER</option>	<option value='19'>
CAUCA</option>	<option value='25'>
CUNDINAMARCA</option>	<option value='94'>
GUAINIA</option>	<option value='44'>
GUAJIRA</option>	<option value='52'>
NARIÑO</option>	<option value='8'>A
TLANTICO</option>	<option value='73'>
TOLIMA</option>	<option value='66'>
RISARALDA</option>	<option value='23'>
CORDOBA</option>	<option value='76'>
VALLE DEL CAUCA</option>	<option value='99'>
VICHADA</option>	<option value='15'>
BOYACA</option>	<option value='85'>
CASANARE</option>	<option value='50'>
META</option>	<option value='63'>
QUINDIO</option>	<option value='68'>
SANTANDER</option>	<option value='20'>
CESAR</option>	<option value='5'>A
NTIOQUIA</option>	<option value='41'>
HUILA</option>	<option value='47'>
MAGDALENA</option>	<option value='86'>
PUTUMAYO</option>	<option value='27'>
CHOCO</option>	<option value='88'>
SAN ANDRES, PROVIDENCIA Y SANTA CATALINA</option>	<option value='91'>
AMAZONAS</option>

?>

<script type="text/javascript">
	
   //contol de telefonos fijos1
			<?php for ($i=0; $i< $total_p; $i++){?>
		       	if($('input:radio[name=rta_tel_f1<?php echo ($i+1)?>]:checked').val())
				  ctr_tels_f1[<?php echo $i?>]= $('input:radio[name=rta_tel_f1<?php echo ($i+1)?>]:checked').val();
				else ctr_tels_f1[<?php echo $i?>] = '0'

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
//----------------------				
				if($('#actualizado<?php echo ($i+1)?>').prop('checked'))
			  		estado_per[<?php echo $i?>]= '1';
				else estado_per[<?php echo $i?>] = '0';
         //////////////new_tel_f1/////////////
		 		//if($('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val()==1)
				  new_tel_f1[<?php echo $i?>]= $('#new_tel_f1<?php echo ($i+1)?>').val();
				//else 
				if($('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val()==3) 
						new_tel_f1[<?php echo $i?>] = '';
////////////estado_telf1////////////////
				if ($('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val())
				  estado_telf1[<?php echo $i?>]= $('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val();
				else estado_telf1[<?php echo $i?>]='';
				
///////////new_tel_f2////////////////
				//if($('input:radio[name=est_tel_f2<?php echo ($i+1)?>]:checked').val()==1)
				  new_tel_f2[<?php echo $i?>]= $('#new_tel_f2<?php echo ($i+1)?>').val();
				//else 
					if($('input:radio[name=est_tel_f2<?php echo ($i+1)?>]:checked').val()==3) 
						new_tel_f2[<?php echo $i?>] = '';

///////////est_tel_f2////////////////
				if ($('input:radio[name=est_tel_f2<?php echo ($i+1)?>]:checked').val())
				  estado_telf2[<?php echo $i?>]= $('input:radio[name=est_tel_f2<?php echo ($i+1)?>]:checked').val();
				else estado_telf2[<?php echo $i?>]='';
////////////////////new_cel1//**/////				
				//if($('input:radio[name=est_cel1<?php echo ($i+1)?>]:checked').val())
				  new_cel1[<?php echo $i?>]= $('#new_cel1<?php echo ($i+1)?>').val();
				//else
				if($('input:radio[name=est_cel1<?php echo ($i+1)?>]:checked').val()==3) 
					new_cel1[<?php echo $i?>] = '';
////////////////////est_cel1///**////	
				if ($('input:radio[name=est_cel1<?php echo ($i+1)?>]:checked').val())
				  estado_cel1[<?php echo $i?>]= $('input:radio[name=est_cel1<?php echo ($i+1)?>]:checked').val();
				else estado_cel1[<?php echo $i?>]='';
////////////////////new_cel2///***////				
				//if($('input:radio[name=est_cel2<?php echo ($i+1)?>]:checked').val())
				  new_cel2[<?php echo $i?>]= $('#new_cel2<?php echo ($i+1)?>').val();
				//else
				if($('input:radio[name=est_cel2<?php echo ($i+1)?>]:checked').val()==3)
					new_cel2[<?php echo $i?>] ='';
/////////////////////////est_cel2///***//////***////				
				if ($('input:radio[name=est_cel2<?php echo ($i+1)?>]:checked').val())
				  estado_cel2[<?php echo $i?>]= $('input:radio[name=est_cel2<?php echo ($i+1)?>]:checked').val();
				else estado_cel2[<?php echo $i?>]='';
//*************************new_perc************
				//if($('input:radio[name=est_pc<?php echo ($i+1)?>]:checked').val())
				  new_pcontacto[<?php echo $i?>]= $('#new_perc<?php echo ($i+1)?>').val();
				//else 
				if($('input:radio[name=est_pc<?php echo ($i+1)?>]:checked').val()==3)
					new_pcontacto[<?php echo $i?>] = '';
//*************************est_pc************
				if ($('input:radio[name=est_pc<?php echo ($i+1)?>]:checked').val())
				  estado_contacto[<?php echo $i?>]= $('input:radio[name=est_pc<?php echo ($i+1)?>]:checked').val();
				else estado_contacto[<?php echo $i?>]='';
//*************************new_tel_pc************
				//if($('input:radio[name=est_tel_pc<?php echo ($i+1)?>]:checked').val())
				  new_tel_pc1[<?php echo $i?>]= $('#new_tel_pc<?php echo ($i+1)?>').val();
				//else
				if($('input:radio[name=est_tel_pc<?php echo ($i+1)?>]:checked').val()==3)
				  new_tel_pc1[<?php echo $i?>] = '0';
//*************************est_tel_pc************
				if ($('input:radio[name=est_tel_pc<?php echo ($i+1)?>]:checked').val())
				  estado_telpc1[<?php echo $i?>]= $('input:radio[name=est_tel_pc<?php echo ($i+1)?>]:checked').val();
				else estado_telpc1[<?php echo $i?>]='';
//*************************new_cel_pc************
				//if($('input:radio[name=est_cel_pc<?php echo ($i+1)?>]:checked').val())
				  telefono_pc2[<?php echo $i?>]= $('#new_cel_pc<?php echo ($i+1)?>').val();
				//else 
				if($('input:radio[name=est_cel_pc<?php echo ($i+1)?>]:checked').val()==3)
					telefono_pc2[<?php echo $i?>] = '0';
//*************************est_cel_pc************
				if ($('input:radio[name=est_tel_pc<?php echo ($i+1)?>]:checked').val())
				  estado_telpc2[<?php echo $i?>]= $('input:radio[name=est_cel_pc<?php echo ($i+1)?>]:checked').val();
				else estado_telpc2[<?php echo $i?>]='';

			//---------Toma preguntas se va p16
				if($('#rp16<?php echo ($i+1)?> option:selected').val() > 0){
					xq_se_fue[<?php echo $i?>] =  $('#rp16<?php echo ($i+1)?> option:selected').val();
				    
					if($('#rp16<?php echo ($i+1)?> option:selected').val()==2){
						if($('input:radio[name=sitel<?php echo ($i+1)?>]:checked')){
							indicativo_sefue[<?php echo $i?>]= $('#indicativo<?php echo ($i+1)?>').val(); 
							tel_fijo_se_fue[<?php echo $i?>]=  $('#tf_pergo<?php echo ($i+1)?>').val(); 
							celular_se_fue[<?php echo $i?>] =  $('#indicativo<?php echo ($i+1)?>').val(); 
							info_se_fue[<?php echo $i?>] =  $('#indicativo<?php echo ($i+1)?>').val();
						 }
					}
					else { 
						xq_se_fue[<?php echo $i?>] = '';
						indicativo_sefue[<?php echo $i?>]= '';
						tel_fijo_se_fue[<?php echo $i?>]= '';
						celular_se_fue[<?php echo $i?>] = '';
						info_se_fue[<?php echo $i?>] = '';
						}
					if($('#rp16<?php echo ($i+1)?> option:selected').val()==3)
					{
						if ($('input:radio[name=gopais<?php echo ($i+1)?>]:checked'))
						     salio_pais[<?php echo $i?>] =  $('input:radio[name=gopais<?php echo ($i+1)?>]:checked').val();

						else {alert('Pregute Por cuanto tiempo estará fuera del país');
							alert
							}
					}
					else 
						salio_pais[<?php echo $i?>] = '';

					if($('#rp16<?php echo ($i+1)?> option:selected').val()==7)
					  info_se_fue[<?php echo $i?>] = $('#razon_pergo<?php echo ($i+1)?>').val(); 
				}
				//-----------Correccion fecha de nacimiento
				//	new_fn[$i] = '';


				//----------fin corrección Fecha anacimiento

				<?php }?> //fin control telefonos

</script>