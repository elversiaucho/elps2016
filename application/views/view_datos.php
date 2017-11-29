
<!--table-bordered table-striped-->
<div class="container">
 <div class="table-responsive" id="cuestionario"> 
 <?php $attributes = array('class' => '', 'id' => '');
echo form_open('index.php/c_elps', $attributes);
date_default_timezone_set('America/Bogota');
 ?>
 <a href= "<?php echo base_url().'index.php/c_elps';?>" id="atraz" class="btn btn-success" >REGRESAR</a><br/>
 <table class="table-bordered table-striped">
 <thead>
   <?php  
   $fila =$hogar[0];
   $total_p = count($hogar);
    $sell1 ="";
	$sell2 ="";
	$sell3 ="";
	$sell4 ="";
    echo "Hogar:   <span id='ll_h'>".$fila->LLAVE_TEM_H."</span>";
    echo " de ". $fila->DPTO;
    echo "  Usuario: <span id ='user'>".$usuario."</span>"." Total personas <span id='total_p'>".$total_p.'</span>';

    ?>
 	<tr>
 		<th>NOMBRE</th>
 		<th>EDAD</th>
 		<th>PARENTESCO</th>
 		<th>INCONSISTENCIA</th>
 		<th>TELEFONO FIJO 1</th>
 		<th>TELEFONO FIJO 2</th>
 		<th>CELULAR 1</th>
 		<th>CELULAR 2</th>
 		<th>PER CONTACTO</th>
 		<th>TEL. FIJO PERSONA DE CONTACTO</th>
 		<th>TEL. CELULAR PERSOAN DE CONTACTO</th>
 	</tr>
 </thead>
 <tbody>
<?php 
	$cont =0;
	foreach($hogar as $fila)
            {
               echo "<tr><td>";
               echo ++$cont.". ". $fila->NOMBRE."<b>(".$fila->TEXTO_TIPO_PERSONA.")</b>"."<br/>".$fila->CORREO."</td>";
               echo "<td>".$fila->EDAD."</td>";
               echo "<td>".$fila->TEXTO_PARENTESCO."</td>";
               echo "<td>";
               if ($fila->INCONSISTENCIA_FECHA_N ==1) {echo "Fecha de Nacimiento <br/>";}
               if ($fila->INCONSISTENCIA_SEXO ==1){echo "Sexo <br/>";}
               if ($fila->INCONSISTENCIA_DI ==1) {echo "Documento <br/>";}
               if ($fila->INCONSISTENCIA_TDOC == 1) {echo "Tipo de documento <br/>";}
                  
               echo "</td>";
               echo "<td>".$fila->TEL_FIJO_1."<br/>";
               if ($fila->TEL_FIJO_1<>NULL)
                  {switch ($fila->CONTROL_TELF1) {
                  		case 1:	$sell1 = "checked"; $sell2 = ""; $sell3 = ""; $sell4 = "";break;
                  		case 2:	$sell1 = ""; $sell2 = "checked"; $sell3 = ""; $sell4 = "";break;
                  		case 3:	$sell1 = ""; $sell2 = ""; $sell3 = "checked"; $sell4 = "";break;
                  		case 4:	$sell1 = ""; $sell2 = ""; $sell3 = ""; $sell4 = "checked";break;
                  		default: $sell1 = ''; $sell2 = ''; $sell3 = ''; $sell4 = '';break;
                  	}
                   
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f1".$cont."' value ='1' ".$sell1."/>Responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f1".$cont."' value ='2' ".$sell2."/>No responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f1".$cont."' value ='3' ".$sell3."/>Inválido</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f1".$cont."' value ='4' ".$sell4."/>Incorrecto</label></div></td>";
	               }
               echo "<td>".$fila->TEL_FIJO_2."<br/>";
                if ($fila->TEL_FIJO_2<>NULL)
                  {switch ($fila->CONTROL_TELF2) {
                  		case 1:	$sell1 = "checked"; $sell2 = ""; $sell3 = ""; $sell4 = "";break;
                  		case 2:	$sell1 = ""; $sell2 = "checked"; $sell3 = ""; $sell4 = "";break;
                  		case 3:	$sell1 = ""; $sell2 = ""; $sell3 = "checked"; $sell4 = "";break;
                  		case 4:	$sell1 = ""; $sell2 = ""; $sell3 = ""; $sell4 = "checked";break;
                  		default: $sell1 = ''; $sell2 = ''; $sell3 = ''; $sell4 = '';break;
                  	}
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f2".$cont."' value = '1' ".$sell1."/>Responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f2".$cont."' value = '2' ".$sell2."/>No responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f2".$cont."' value = '3' ".$sell3."/>Inválido</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_f2".$cont."' value = '4' ".$sell4."/>Incorrecto</label></div></td>";
	               }
               echo "<td>".$fila->CELULAR_1."<br/>";
                if ($fila->CELULAR_1<>NULL)
                  {
                  	 switch ($fila->CONTROL_CEL1) {
                  		case 1:	$sell1 = "checked"; $sell2 = ""; $sell3 = ""; $sell4 = "";break;
                  		case 2:	$sell1 = ""; $sell2 = "checked"; $sell3 = ""; $sell4 = "";break;
                  		case 3:	$sell1 = ""; $sell2 = ""; $sell3 = "checked"; $sell4 = "";break;
                  		case 4:	$sell1 = ""; $sell2 = ""; $sell3 = ""; $sell4 = "checked";break;
                  		default: $sell1 = ''; $sell2 = ''; $sell3 = ''; $sell4 = '';break;
                  	}
	               echo "<div class='radio'><label><input type='radio' name='rta_cel1".$cont."' value = '1' ".$sell1."/>Responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_cel1".$cont."' value = '2' ".$sell2."/>No responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_cel1".$cont."' value = '3' ".$sell3."/>Inválido</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_cel1".$cont."' value = '4' ".$sell4."/>Incorrecto</label></div></td>";
	               }
		       echo "<td>".$fila->CELULAR_2."<br/>";
		        if ($fila->CELULAR_2<>NULL)
                  {
              		switch ($fila->CONTROL_CEL1) {
              		case 1:	$sell1 = "checked"; $sell2 = ""; $sell3 = ""; $sell4 = "";break;
              		case 2:	$sell1 = ""; $sell2 = "checked"; $sell3 = ""; $sell4 = "";break;
              		case 3:	$sell1 = ""; $sell2 = ""; $sell3 = "checked"; $sell4 = "";break;
              		case 4:	$sell1 = ""; $sell2 = ""; $sell3 = ""; $sell4 = "checked";break;
              		default: $sell1 = ''; $sell2 = ''; $sell3 = ''; $sell4 = '';break;
              	     }
	               echo "<div class='radio'><label><input type='radio' name='rta_cel2".$cont."' value = '1' ".$sell1."/>Responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_cel2".$cont."' value = '2' ".$sell2."/>No responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_cel2".$cont."' value = '3' ".$sell3."/>Inválido</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_cel2".$cont."' value = '4' ".$sell4."/>Incorrecto</label></div></td>";
	               }
		       echo "<td>".$fila->P_CONTACTO."</td>";
		       echo "<td>".$fila->TEL_PC1."<br/>";
		        if ($fila->TEL_PC1<>NULL)
                  {
                  	switch ($fila->CONTROL_TELPC1) {
              		case 1:	$sell1 = "checked"; $sell2 = ""; $sell3 = ""; $sell4 = "";break;
              		case 2:	$sell1 = ""; $sell2 = "checked"; $sell3 = ""; $sell4 = "";break;
              		case 3:	$sell1 = ""; $sell2 = ""; $sell3 = "checked"; $sell4 = "";break;
              		case 4:	$sell1 = ""; $sell2 = ""; $sell3 = ""; $sell4 = "checked";break;
              		default: $sell1 = ''; $sell2 = ''; $sell3 = ''; $sell4 = '';break;
              	     }
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc1".$cont."' value = '1' ".$sell1."/>Responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc1".$cont."' value = '2' ".$sell2."/>No responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc1".$cont."' value = '3' ".$sell3."/>Inválido</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc1".$cont."' value = '4' ".$sell4."/>Incorrecto</label></div></td>";
	               }
		       echo "<td>".$fila->CELULAR_PC1."<br/>";
		        if ($fila->CELULAR_PC1<>NULL)
                  {
                  	switch ($fila->CONTROL_TELPC2) {
              		case 1:	$sell1 = "checked"; $sell2 = ""; $sell3 = ""; $sell4 = "";break;
              		case 2:	$sell1 = ""; $sell2 = "checked"; $sell3 = ""; $sell4 = "";break;
              		case 3:	$sell1 = ""; $sell2 = ""; $sell3 = "checked"; $sell4 = "";break;
              		case 4:	$sell1 = ""; $sell2 = ""; $sell3 = ""; $sell4 = "checked";break;
              		default: $sell1 = ''; $sell2 = ''; $sell3 = ''; $sell4 = '';break;
              	     }
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc2".$cont."' value = '1' ".$sell1."/>Responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc2".$cont."' value = '2' ".$sell2."/>No responden</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc2".$cont."' value = '3' ".$sell3."/>Inválido</label></div>";
	               echo "<div class='radio'><label><input type='radio' name='rta_tel_pc2".$cont."' value = '4' ".$sell4."/>Incorrecto</label></div></td>";
	               }
		       echo "</tr>";
            }
      ?>
</tbody>
</table>
<span id="total_p" style="display:none;"><?php echo $cont?></span>
<h3>13. La información va a ser actualizada?</h3>
 <!--form role="form"-->
    <div class="radio">
    <!--onclick="activa_e()"-->
      <label><input type="radio" name="op" id="rsi" >Sí</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="op" id="rno">No</label>
    </div>
   <!--/form-->
</div>

	
 <div id="encuesta" style='display: none;'>
	<!--form id="frper" name="frper"-->
     <h3>14. Seleccione a la persona que actualiza la información:</h3>
     <p class="t_error"><?php echo strip_tags(form_error('quien_rta')); ?></p>
      <ul class="list-group">
		<?php 
		 $cont=1;
		 $nro_perinfo = '';
		 $checked='';
		 if($fila->LLAVE_INFORMANTE != null){
		 	$nro_perinfo = $fila->LLAVE_INFORMANTE;
		 	$nro_perinfo = substr($nro_perinfo, -2); //intval(
		 	
		 }
		  foreach($hogar as $fila){
		  	if ($nro_perinfo == $cont)
		  		$checked = 'checked';
		  	else $checked = '';
		  	?>

		  	<li class='list-group-item list-group-item-success'>
		  	    <label><input type='radio' name='quien_rta' value= '<?php echo $cont?>'  <?php echo $checked;?>/>
		                  <?php echo $fila->NOMBRE."(".$fila->TEXTO_TIPO_PERSONA.")"?>
		       </label><span class='badge'><?php echo $cont?></span></li>

          <?php $cont++;} ?>
       </ul>
    
    <h3> 15. ¿Las siguientes personas siguen haciendo parte del hogar?</h3>
    
    
         <?php 
		 $cont=1;
		 foreach($hogar as $fila){?>
		 <div class="row">
		 	    <div class='col-sm-6' id='<?php echo "nombre".$cont?>'> <span class='badge'><?php echo $cont?> </span><?php echo $fila->NOMBRE."(".$fila->TEXTO_TIPO_PERSONA.")"?></div>
		 	    <div class='col-sm-6'><label><input type='radio'  id='<?php echo "siper".$cont?>' name='<?php echo "siper".$cont?>' value='1' checked onclick="borra_p16('<?php echo $cont?>')"/>Si</label>
		 	       <label><input type='radio' id='<?php echo "noper".$cont?>' name='<?php echo "siper".$cont?>' value='0' onclick="p16('<?php echo $fila->NOMBRE?>','<?php echo $cont?>')"/>No</label>
		 	    </div>
		 	  </div>
             <?php $cont++;} ?>
        
        <div id ="p16" >
      		<?php  	$cont=1;// Crea divs 
		 	foreach($hogar as $fila){?>
         	<div id='<?php echo "p16".$cont?>'> 
         	</div>
      		<?php $cont++;}?>
     	</div>

     	<span id="ms"></span>
     	

     	<div id = "encuesta2p" style='display: none;'>
     		
	     	<h3>24.Sus datos de residencia son:</h3>
		     <div class="row">
		        <div class='col-sm-4'>Departamento :<?php echo $fila->DPTO?></div>
			        <div class='col-sm-8' >Correción Dpto <input type="checkbox" id = "cambio_dpto" onclick="activa('#cambio_dpto','#dpto')"></input>
			        <select style="display: none;" id = "dpto">
			        <option value='0'>Seleccione..</option>
		        	<option value='91'>AMAZONAS</option>
		        	<option value='05'>ANTIOQUIA</option>
					<option value='81'>ARAUCA</option>
					<option value='08'>ATLANTICO</option>
					<option value='11'>BOGOTA D.C.</option>
					<option value='13'>BOLIVAR</option>
					<option value='15'>BOYACA</option>
					<option value='17'>CALDAS</option>
					<option value='18'>CAQUETA</option>
					<option value='85'>CASANARE</option>
					<option value='19'>CAUCA</option>
					<option value='20'>CESAR</option>
					<option value='27'>CHOCO</option>
					<option value='23'>CORDOBA</option>
					<option value='25'>CUNDINAMARCA</option>
					<option value='94'>GUAINIA</option>
					<option value='44'>GUAJIRA</option>
					<option value='95'>GUAVIARE</option>
					<option value='41'>HUILA</option>
					<option value='47'>MAGDALENA</option>
					<option value='50'>META</option>
					<option value='52'>NARIÑO</option>
					<option value='54'>NORTE DE SANTANDER</option>
					<option value='86'>PUTUMAYO</option>
					<option value='63'>QUINDIO</option>
					<option value='66'>RISARALDA</option>
					<option value='88'>SAN ANDRES, PROVIDENCIA Y SANTA CATALINA</option>
					<option value='68'>SANTANDER</option>
					<option value='70'>SUCRE</option>
					<option value='73'>TOLIMA</option>
					<option value='76'>VALLE DEL CAUCA</option>
					<option value='97'>VAUPES</option>
					<option value='99'>VICHADA</option>

		        </select> </div>
		        </div>
		        <div class="row">
		        	<div class='col-sm-4'>Municipio :<?php echo $fila->MPIO?></div>
			        <div class='col-sm-8' >Corrección Mpio: <input type="checkbox" id = "cambio_mpio" onclick="activa('#cambio_mpio','#c_mpio')"></input>
			        <select id = "c_mpio" style="display: none;">
			        </select>
			        </div>
		        </div>
	     		<div class="row">
		        <div class='col-sm-4'>Centro Poblado :<?php echo $fila->C_POBLADO?></div>
			        <div class='col-sm-8' >Corrección C. Poblado: <input type="checkbox" id = "cambio_cpoblado" onclick="activa('#cambio_cpoblado','#c_cpoblado')"/>
			        <input type="text" id = "c_cpoblado" style="display: none;" />
			        </div>
		        </div>
		        <div class="row">
		        	<div class='col-sm-4'>Barrio Vereda :<?php echo $fila->BARRIO_VRDA?>	</div>
			        <div class='col-sm-8' >Corrección Barrio/VRDA <input type="checkbox" id = "cambio_barrio" onclick="activa('#cambio_barrio','#c_barrio')"/>
			        <input type="text" id = "c_barrio" style="display: none;" />
			        </div>
		        </div>
				   <div class="row">
		        	<div class='col-sm-4'>Clase :<?php echo $fila->CLASE?></div>
			        <div class='col-sm-8' >Corrección Clase <input type="checkbox" id = "cambio_clase" onclick="activa('#cambio_clase','#c_clase')"/>
			        <select id ="c_clase" style="display: none;" >
			        	<option value ='1'> Urbana</option>
			        	<option value ='2'> Centros poblados, inspección de policía o corregimientos</option>
			        	<option value ='3'> Área rural dispersa</option>
			        </select>
			        </div>
		        </div>
			
		       <div class="row">
		        	<div class='col-sm-4'>Dirección registrada :<?php echo $fila->DIRECCION?>	</div>
			        <div class='col-sm-4' >Corrección DIRECCION <input type="checkbox" id = "cambio_dir" onclick="activa('#cambio_dir','#zona')"/> </div>
			        <div id="zona" class='col-sm-4' style="display: none;">
			           <label>Zona urbana<input type="radio" name = "c_zona" id ="z_u" onclick="cambio('#z_urbana')" value="Urbana" /></label></br>
			           <label>Zona Rural<input type="radio" name = "c_zona" id ="z_r" onclick="cambio('#z_rural')" value="Rural" /></label>
			           </div>
		        </div>
		          <div  id = "z_urbana" style="display: none;" class="panel panel-primary">
		           <div class="row" >
		        	<div class='col-sm-2'>
		        		Seleccione.
		        		<select id = "dir_1p" onchange="cambio(this.value)">
			        		<option value='0'>Seleccione..</option>
							<option value='AUTOP'>Autopista</option>
							<option value='AV'>Avenida</option>
							<option value='AC'>Avenida Calle</option>
							<option value='AK'>Avenida Carrera</option>
							<option value='CL'>Calle</option>
							<option value='CN'>Camino</option>
							<option value='KR'>Carrera</option>
							<option value='CART'>Carretera</option>
							<option value='CIRC'>Circular</option>
							<option value='CIRCV'>Circunvalar</option>
							<option value='DG'>Diagonal</option>
							<option value='KM'>Kilómetro</option>
							<option value='MZ'>Manzana</option>
							<option value='OF'>Oficina</option>
							<option value='TV'>Transversal</option>
							<option value="OT">Otro..</option>
						</select>
						Cual?: <input type="text" id="otro_dir" style="display: none;"/>
					</div>
			        <div class='col-sm-2'>Número: <input type="number" min="1" max="999" id ="nro_dir1"/></div>
			        <div class='col-sm-1'> A,B,C
			        <select  id="ABC1">
			        	<option value='null'>...</option>
				        <option value='A'>A</option>	<option value='B'>B</option>	<option value='C'>C</option>	<option value='D'>D</option>	<option value='E'>E</option>	<option value='F'>F</option>	<option value='G'>G</option>	<option value='H'>H</option>	<option value='I'>I</option>	<option value='J'>J</option>	<option value='K'>K</option>	<option value='L'>L</option>	<option value='M'>M</option>	<option value='N'>N</option>	<option value='O'>O</option>	<option value='P'>P</option>	<option value='Q'>Q</option>	<option value='R'>R</option>	<option value='S'>S</option>	<option value='T'>T</option>	<option value='U'>U</option>	<option value='V'>V</option>	<option value='W'>W</option>	<option value='X'>X</option>	<option value='Y'>Y</option>	<option value='Z'>Z</option>
						</select>
					<!--/div-->
					<!--div class='col-sm-1'--> 
			        <select  id="ABC1aux">
			        	<option value='null'>...</option>
				        <option value='A'>A</option>	<option value='B'>B</option>	<option value='C'>C</option>	<option value='D'>D</option>	<option value='E'>E</option>	<option value='F'>F</option>	<option value='G'>G</option>	<option value='H'>H</option>	<option value='I'>I</option>	<option value='J'>J</option>	<option value='K'>K</option>	<option value='L'>L</option>	<option value='M'>M</option>	<option value='N'>N</option>	<option value='O'>O</option>	<option value='P'>P</option>	<option value='Q'>Q</option>	<option value='R'>R</option>	<option value='S'>S</option>	<option value='T'>T</option>	<option value='U'>U</option>	<option value='V'>V</option>	<option value='W'>W</option>	<option value='X'>X</option>	<option value='Y'>Y</option>	<option value='Z'>Z</option>
						</select>
					</div>
					<div class='col-sm-1'>BIS<input type="checkbox" id="bis"></div>
					<div class='col-sm-2'>Norte, Sur...<input type="text" id="punto_c1"></div>

					<div class='col-sm-2'>Número<input type="number" min="1" max="999" id ="nro_dir2"/></div>
					<div class='col-sm-1'>A,B,C
				        <select id="ABC2">
				            <option value='null'>...</option>
				            <option value='A'>A</option>	<option value='B'>B</option>	<option value='C'>C</option><option value='D'>D</option>	<option value='E'>E</option>	<option value='F'>F</option>	<option value='G'>G</option>	<option value='H'>H</option>	<option value='I'>I</option>	<option value='J'>J</option>	<option value='K'>K</option>	<option value='L'>L</option>	<option value='M'>M</option>	<option value='N'>N</option>	<option value='O'>O</option>	<option value='P'>P</option>	<option value='Q'>Q</option>	<option value='R'>R</option>	<option value='S'>S</option>	<option value='T'>T</option>	<option value='U'>U</option>	<option value='V'>V</option>	<option value='W'>W</option>	<option value='X'>X</option>	<option value='Y'>Y</option>	<option value='Z'>Z</option>
						</select> 
				       <select  id="ABC2aux">
			        	<option value='null'>...</option>
				        <option value='A'>A</option>	<option value='B'>B</option>	<option value='C'>C</option>	<option value='D'>D</option>	<option value='E'>E</option>	<option value='F'>F</option>	<option value='G'>G</option>	<option value='H'>H</option>	<option value='I'>I</option>	<option value='J'>J</option>	<option value='K'>K</option>	<option value='L'>L</option>	<option value='M'>M</option>	<option value='N'>N</option>	<option value='O'>O</option>	<option value='P'>P</option>	<option value='Q'>Q</option>	<option value='R'>R</option>	<option value='S'>S</option>	<option value='T'>T</option>	<option value='U'>U</option>	<option value='V'>V</option>	<option value='W'>W</option>	<option value='X'>X</option>	<option value='Y'>Y</option>	<option value='Z'>Z</option>
					</select>
					</div>
					
				 </div><br>
				 <div class="row">
				 	<div class='col-sm-3'></div>
				 	<div class='col-sm-2'>Número: <input type="number" min="1" max="999" id="nro_dir3" /></div>
					<div class='col-sm-2'>Norte, Sur..<input type="text" id="punto_c2"></div>
					<div class='col-sm-5'>Complemento dirección <br/>
				 		<select id = "add_dir1">
				 			<option value='null'>Seleccione...</option>
				 			<option value='CA'>Casa</option>
				 			<option value='AP'>Apartamento</option>
				 			<option value='TO'>Torre</option>
				 			<option value='HB'>Habitación</option>
				 			<option value='EN'>Entrada</option>
				 			<option value='PL'>Planta</option>
				 			<option value='PS'>Piso</option>
							<option value='LT'>Lote</option>
							<option value='UN'>Unidad</option>
							<option value='BL'>Bloque</option>
							<option value='MD'>Módulo</option>
							<option value='AG'>Agrupación</option>
							<option value='IN'>Interior</option>
							<option value='LC'>Local</option>
							<option value='GJ'>Garaje</option>
							<option value='PH'>Penthouse</option>
							<option value='ST'>Sótano</option>
							<option value='SS'>Semisótano</option>
							<option value='MN'>Mezzanine</option>
							<option value='BG'>Bodega</option>
							
				 		</select>
				 		<input type="text" id="add_dir2"/>
				 	</div>
				 </div>

		      </div><!--Fin Direccion Zona URBANA-->
		      <!---->   
		      <div class="panel panel-success" style="background-color:pink;">
		      <div class="row" id = "z_rural" style="display: none;">
		        	<div class='col-sm-3'><span>Nombre de la vereda:</span><input type="text" id="vrda"/></div>
			        <div class='col-sm-3'>Nombre del sitio o finca:<input type="text" id="finca"/></div>		        
			        <div class='col-sm-3'>Destino vial de referencia:<input type="text" id="via_ref"/></div>		    
			        <div class='col-sm-2'>Sitio de referencia:<input type="text" id="sitio_ref"/></div>  
			        <div class='col-sm-2'>Otras indicaciones:<input type="text" id="indi"/></div>
		        </div>
		      </div>
		     <div>
		     	<h3>53.Teléfonos de contacto:</h3>
					<table class="table-bordered table-striped">
				 	<thead>
				  	 	<tr>
				 		<th>NOMBRE</th>
				 		<th>TELEFONO FIJO 1</th>
				 		<th>TELEFONO FIJO 2</th>
				 		<th>CELULAR 1</th>
				 		<th>CELULAR 2</th>
				 		<th>PER CONTACTO</th>
				 		<th>TEL. FIJO PERSONA DE CONTACTO</th>
				 		<th>TEL. CELULAR PERSOAN DE CONTACTO</th>
				 	</tr>
				 </thead>
				 <tbody>
				<?php 
					$cont =1;
	foreach($hogar as $fila)
            {?>
              <tr><td>
               <?php echo $cont."<span id='name'>".$fila->NOMBRE."</span>".$fila->TEXTO_TIPO_PERSONA;
               		if($fila->ESTADO_ACTUALIZACION == 1)
               				$est_actual = 'checked';
               		else $est_actual = '';
               ?>
               	<label>Actualizado <input type="checkbox" name='actualizado' id = <?php echo "'actualizado".$cont."'";?> <?php echo $est_actual;?> /></label>
               </td>
               <td>
               <select id=<?php echo "'indi_f1".$cont."'";?>><option value =''>Indicatvo</option><option value ='(1)'>1</option><option value ='(2)'>2</option><option value ='(4)'>4</option> <option value ='(5)'>5</option><option value ='(6)'>6</option><option value ='(7)'>7</option><option value ='(8)'>8</option></select>
               <input type = 'tel' id = <?php echo "'new_tel_f1".$cont."'"?> value = "<?php echo $fila->TEL_FIJO_1;?>" disabled/>
               <br/>
              	<div class='radio'><label>

              	<input type='radio' name=<?php echo "'est_tel_f1".$cont."'"?> onclick = "<?php echo "editar('#new_tel_f1".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_f1".$cont."'"?> onclick = "<?php echo "editar('#new_tel_f1".$cont."',2)"?>" value = '2'/>Igual que el Anterior</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_f1".$cont."'"?> onclick = "<?php echo "editar('#new_tel_f1".$cont."',2)"?>" value = '3'/>No Tiene</label></div></td>
	        
	               
	               <td>
	               <select id=<?php echo "'indi_f2".$cont."'";?>><option value =''>Indicatvo</option><option value ='(1)'>1</option><option value ='(2)'>2</option><option value ='(4)'>4</option> <option value ='(5)'>5</option><option value ='(6)'>6</option><option value ='(7)'>7</option><option value ='(8)'>8</option>
	               </select>
	               <input type = 'tel' id = <?php echo "'new_tel_f2".$cont."'"?> value = "<?php echo $fila->TEL_FIJO_2;?>" disabled/>
               	   <br/>
               
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_f2".$cont."'"?> onclick = "<?php echo "editar('#new_tel_f2".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_f2".$cont."'"?> onclick = "<?php echo "editar('#new_tel_f2".$cont."',2)"?>" value = '2'/>Igual que el Anterior</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_f2".$cont."'"?> onclick = "<?php echo "editar('#new_tel_f2".$cont."',3)"?>" value = '3'/>No Tiene</label></div></td>
	             
	             
	                 <td><input type = 'tel' id = <?php echo "'new_cel1".$cont."'"?> value = "<?php echo $fila->CELULAR_1;?>" disabled/><br/>
                
              
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel1".$cont."'"?> onclick = "<?php echo "editar('#new_cel1".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel1".$cont."'"?> onclick = "<?php echo "editar('#new_cel1".$cont."',2)"?>" value = '2'/>Igual que el Anterior</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel1".$cont."'"?> onclick = "<?php echo "editar('#new_cel1".$cont."',3)"?>" value = '3'/>No Tiene</label></div></td>
	        
	          
	               <td><input type = 'tel' id = <?php echo "'new_cel2".$cont."'"?> value = "<?php echo $fila->CELULAR_2;?>" disabled/><br/>
		        
		     
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel2".$cont."'"?> onclick = "<?php echo "editar('#new_cel2".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel2".$cont."'"?> onclick = "<?php echo "editar('#new_cel2".$cont."',2)"?>" value = '2'/>Igual que el Anterior</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel2".$cont."'"?> onclick = "<?php echo "editar('#new_cel2".$cont."',3)"?>" value = '3'/>No Tiene</label></div></td>
	 
	                <td><input type = 'tel' id = <?php echo "'new_perc".$cont."'"?> value = "<?php echo $fila->P_CONTACTO;?>" disabled/><br/>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_pc".$cont."'"?> onclick = "<?php echo "editar('#new_perc".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_pc".$cont."'"?> onclick = "<?php echo "editar('#new_perc".$cont."',2)"?>" value = '2'/>Igual que el Anterior</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_pc".$cont."'"?> onclick = "<?php echo "editar('#new_perc".$cont."',3)"?>" value = '3'/>No Tiene</label></div></td>

		            <td>
		             <select id=<?php echo "'indi_fpc".$cont."'";?>><option value =''>Indicatvo</option><option value ='(1)'>1</option><option value ='(2)'>2</option><option value ='(4)'>4</option> <option value ='(5)'>5</option><option value ='(6)'>6</option><option value ='(7)'>7</option><option value ='(8)'>8</option-->
	               </select>
		            <input type = 'tel' id = <?php echo "'new_tel_pc".$cont."'"?> value = "<?php echo $fila->TEL_PC1;?>" disabled/><br/>
		        
		        
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_pc".$cont."'"?> onclick = "<?php echo "editar('#new_tel_pc".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_pc".$cont."'"?> onclick = "<?php echo "editar('#new_tel_pc".$cont."',2)"?>" value = '2'/>Igual que el Anterior</l abel></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_tel_pc".$cont."'"?> onclick = "<?php echo "editar('#new_tel_pc".$cont."',3)"?>" value = '3'/>No Tiene</label></div></label>
	         
	                <td><input type = 'tel' id = <?php echo "'new_cel_pc".$cont."'"?> value = "<?php echo $fila->CELULAR_PC1;?>" disabled/><br/>
		   
		        
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel_pc".$cont."'"?> onclick = "<?php echo "editar('#new_cel_pc".$cont."',1)"?>" value = '1'/>Corrección</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel_pc".$cont."'"?> onclick = "<?php echo "editar('#new_cel_pc".$cont."',2)"?>" value = '2'/>Igual que el Anterior</label></div>
	                <div class='radio'><label><input type='radio' name=<?php echo "'est_cel_pc".$cont."'"?> onclick = "<?php echo "editar('#new_cel_pc".$cont."',3)"?>" value = '3'/>No Tiene</label></div></td>
	               
		       </tr>
            <?php $cont++;}?>
				</tbody>
				</table>

				<h3> 54. ¿Usted o alguna persona del hogar tiene intenciones de cambiar su residencia a lo largo de este año?</h3>
				 <div class="radio">
				    <label><input type="radio" name="int" id="intsi" onclick="cambio(this.id)"/>Sí</label><br/>
				    <label><input type="radio" name="int" id="intno" onclick="cambio(this.id)"/>No</label>
			    </div>
			    <article id ="quien" style="display: none;"> 
			    	<h3> 55. ¿Quién? </h3>
			    	<?php 
					 $cont=1;
					 foreach($hogar as $fila){?>
						 <div class='row list-group-item list-group-item-success'>
					        <div class='col-sm-6' id='<?php echo "name".$cont?>'> <span class='badge'><?php echo $cont?> </span>
					        	<label>
					        	<input type='checkbox'  id='<?php echo "intper".$cont?>' 
					        	onclick = "<?php echo "activa('#intper".$cont."','#adonde".$cont."')"?>"/><?php echo $fila->NOMBRE."(".$fila->TEXTO_TIPO_PERSONA.")"?></label>
					        </div>
						    <div class='col-sm-6' style="display: none;" id ='<?php echo "adonde".$cont?>'>
						   		<label id ="donde" >¿A dónde?<input type='text' id='<?php echo "a_donde".$cont?>' value='<?php echo $fila->DONDE_IRA;?>'/> </label>
						   		<label>No sabe <input type='checkbox'  id='<?php echo "no_sabe".$cont?>'/></label>
				 	    	</div>
				 	 	</div>
	            	<?php $cont++;} ?>
     		    </article>

     		    <h3>57.	CORRECCIÓN DE INCONSISTENCIA: </h3>
     		    <article>
     		    	 <table class="table-bordered table-striped">
					 <thead>
					 	<tr>
					 		<th>NOMBRE</th>
					 		<th>FECHA DE NACIMIENTO DE 2015</th>
					 		<th>SEXO DE 2015</th>
					 		<th>DOCUMENTO DE IDENTIDAD DE 2015</th>
					 		<th>TIPO DE DOCUMENTO DE 2015</th>
					 		
					 	</tr>
					 </thead>
					 <tbody>
					 <?php 
					 $cont=1;
					 foreach($hogar as $fila){?>
					    <tr>
					    <td><?php echo $fila->NOMBRE?></td>

					    <td>
					 	   <?php if ($fila->INCONSISTENCIA_FECHA_N ==1){
					 	   			$date = new DateTime($fila->FECHA_N_2015);
									$fech = $date->format('Y-m-d');
					 	   			//$fech = new $fila->FECHA_N_2015;
					 	   			//echo "fecha ini".$fech;
					 	   				 	   
					 	   			//echo "Fecha base:". json_encode($fech);
					 	   			//echo "<br>Fech Modificada:". $fecha_n;
					 	   			//<?php echo ""//$fecha_n
					 	   	 	?>
					 	   

					 	   		<input type="date" value= <?php echo $fech?> id= <?php echo "new_fn".$cont;?> disabled/>
					 	   		<div class='radio'><label><input type='radio' name=<?php echo "'new_fn".$cont."'"?>  onclick ="<?php echo "editar('#new_fn".$cont."',1)";?>" value='2'/>Corrección</label>
					 	   		</div>
				                <div class='radio'><label><input type='radio' name=<?php echo "'new_fn".$cont."'"?>  onclick ="<?php echo "editar('#new_fn".$cont."',2)"?>" value='3'/>Igual que el Anterior</label>
				                </div>

					 	    <?php } 
					 	    ?>
					 	    </td><td>

			               <?php if ($fila->INCONSISTENCIA_SEXO =='1'){ 
			               			$sexo = $fila->ULTIMO_SEXO;
			               			$self ='';
			               			$selm = '';
			               		 if ( $sexo == null) $sexo=$fila->SEXO_2012;
			               		 if ($sexo == '1') {
				               		 	$self='false';
				               		 	$selm = 'true';

			               		 	}?>
			               		 	 <select id=<?php echo "'new_sexo".$cont."'"?> disabled>
			               		 	 	<option selected ="<?php echo $self;?>" value='1'/>Femenino.</option>
			               		 	 	<option selected="<?php echo $selm;?>" value ='2'/>Masculino.</option>
			               		 	 </select>
			               			
			               		 <div class="radio"> 
								    <label><input type="radio" name=<?php echo "'new_sexo".$cont."'"?> id=<?php echo "'sinew_sx".$cont."'"?> onclick="<?php echo "editar('#new_sexo".$cont."',1)"?>" value='2'/>Corrección</label><br/>

								    <label><input type="radio" name=<?php echo "'new_sexo".$cont."'"?> id= <?php echo "'sinew_sx".$cont."'"?>
								     onclick="<?php echo "editar('#new_sexo".$cont."',2)"?>" value ='3'/>Igual que el Anterior</label>
							    </div>
							<?php }?>
			               </td><td>
			              <?php if ($fila->INCONSISTENCIA_TDOC =='1' || $fila->INCONSISTENCIA_DI == '1') {
			              	   $td1 = 'false'; $td2 = 'false'; $td3 = 'false'; $td4 = 'false'; $td5 = 'false';
			              		switch ($fila->ULTIMO_TIPO_DOC) {
			              			case '1': $td1 = 'true'; break;
			              			case '2': $td2 = 'true'; break;
			              			case '3': $td3 = 'true'; break;
			              			case '4': $td4 = 'true'; break;
			              			case '5': $td5 = 'true'; break;
			              			
			              		}
			            	?>
			               	 <select id=<?php echo "'new_td".$cont."'"?> disabled>
	               		 		<option selected ="<?php echo $td1 ?>" value="1">1. No tiene</option>
								<option selected ="<?php echo $td2 ?>" value="2">2. Cédula de ciudadanía</option>
								<option selected ="<?php echo $td3 ?>" value="3">3. Tarjeta de identidad</option>
								<option selected ="<?php echo $td4 ?>" value="4">4. Cédula de extranjería</option>
								<option selected ="<?php echo $td5 ?>" value="5">5. Registro civil</option>
			               	 </select>
		                   	<div class="radio">
							    <label><input type="radio" name=<?php echo "'new_td".$cont."'"?> id=<?php echo "'corrige_td".$cont."'"?> onclick="<?php echo "editar('#new_td".$cont."',1)"?>" value='2'/>Corrección</label><br/>

							    <label><input type="radio" name=<?php echo "'new_td".$cont."'"?> id= <?php echo "'igual_td".$cont."'"?>
							     onclick="<?php echo "editar('#new_td".$cont."',2)"?>" value='3'/>Igual que el Anterior</label>
						    </div>
			            
						<?php }?>
						</td><td>
			               <?php if ($fila->INCONSISTENCIA_DI == '1' || $fila->INCONSISTENCIA_TDOC =='1' ) {?>
			               			<input type="number" value=<?php echo $fila->ULTIMO_DOCUMENTO;?> id= <?php echo "new_di".$cont;?> disabled/>
			               
			                	<div class="radio">
								    <label><input type="radio" name=<?php echo "'new_di".$cont."'"?> id=<?php echo "'corrige_di".$cont."'"?> onclick="<?php echo "editar('#new_di".$cont."',1)"?>" value='2'/>Corrección</label><br/>
								    <label><input type="radio" name=<?php echo "'new_di".$cont."'"?> id= <?php echo "'igual_di".$cont."'"?>
								     onclick="<?php echo "editar('#new_di".$cont."',2)"?>" value ='3'/>Igual que el Anterior</label>
							    </div>
		    	           
		    	           <?php }?>
		    	          </td>
						<?php $cont++;}?>
                     </tr>
				</tbody>
				</table>
     		  </article>
     		  <h3>58.Información adicional</h3>
     		  <textarea id='info_adicional' class='form-control'><?php echo $fila->INFO_ADICIONAL;?></textarea>
     		   <h3>La información del hogar se actualizo?</h3>
     		   <?php 
     		   	$estado_si = '';
     		   	$estado_no = '';
     		   if($fila->ESTADO_H == 1)
     		   			$estado_si = 'checked';
	   		   		//else $estado_no = 'checked';


     		   ?>
     		  <label style="margin:20px">Si  <input type="radio" id='h_siac' name="h_actualiza" value='1' <?php echo $estado_si;?>/></label>
     		  <label>No  <input type="radio" id='h_noac' name="h_actualiza" value = '0' <?php echo $estado_no;?> onclick ='agenda("incompleto")'/></label>
     		  <div>
	<h4 id='pq_no'>60. Comentarios del monitor:</h4>
	<input type='text' id='comentarios' class='form-control' value = "<?php echo $fila->COMENTARIO_MONITOR;?>" />
  </div>
</div>
</div>
<span id ="ms_e">***</span>		    	
  		<!--?php echo form_submit( 'submit', 'Regresar'); ?-->
	<article style="height:150px">
   		<a href= "#" id="aboton" onclick="checkp15('<?php echo $cont-1?>','1')" class="btn btn-danger abtn">CONTINUAR.</a>
 		<a href= "#" id="bt_guarda" onclick="guardar()" class="btn btn-success abtn" >GUARDAR</a>
 	</article>
     </div>
       
    <div id="noencuesta">
    </div>
    

</div>

<?php echo form_close(); ?>
<script type="text/javascript">


function guardar_k(){
		var res=0;
		res=guardar_f();
		if(res > 0)
		 alert("Pregunte a donde se fue la Persona"+res);
	}

function guardar(){
	var parametros= new Object()
	var direccion='', zona=null;

	var completos = new Array();
	var indice = 0, continuar=0;
/////////////////Evalua si el hogar se marca como actualizado
	if($('#encuesta2p').is(':visible')){
		$('[name=actualizado]').each(function(){
				if($(this).prop('checked')){
					completos[indice++] = $(this).val();
				}
			      });
		if (completos.length == <?php echo $total_p;?>){
				$('#h_siac').prop('checked',true);
				continuar =1;
			}
		else if($('#h_noac').prop('checked'))
				continuar = 1;
				else{
					alert("Marque el hogar como no actualizado!!");
					return 0;
			   		}
		}
	if ($('input:radio[name=quien_rta]:checked').val())
		continuar = 1;
	else{ 
		alert("Debe Seleccionar la persona que responde... ");
		return 0; 
		}    
			//});
		 /*$("[name=actualizado]").on("click", function(){
			$('#h_siac').prop('checked',false);
			$('#h_noac').prop('checked',false);
			$('#ms_e').text('Recuerde Seleccionar si el hogar se Actualizó');*/

		//});
//////////////////////Fin Marcacion de Hogar actualizado
	if (continuar==1){
		    //alert("Se guardará la informacion de no respuesta.");
		    var user = $("#user").text();
			var ll_nh = $("#ll_h").text();
	     	var  n = ll_nh.toString;
	     	var total_p = $('#total_p').text();
	     	//alert("total personas:"+<?php echo $total_p?>);
		     while(n.length<11){
		         n = "0" + n;
		     }
			var estado_per = [], new_tel_f1 = [], new_tel_f2 = [],new_cel1 = [],new_cel2 = [],new_pcontacto = [],new_tel_pc1 = [],telefono_pc2 = [];
			var estado_contacto = [],estado_telf1 = [],estado_telf2 = [],estado_cel1 = [],estado_cel2 = [],estado_telpc1 = [],estado_telpc2	 = [];
			var ctr_tels_f1 =  [], ctr_tels_f2 = [], ctr_tels_cel1 = [], ctr_tels_cel2 = [], ctr_tel1s_pc = [], ctr_tel2_pc =[], new_f_nacimiento = [], new_documento = [], new_tipo_doc = [], new_sexo = [];
			var xq_se_fue = [],	indicativo_sefue = [] ,tel_fijo_se_fue= [], celular_se_fue = [], info_se_fue = [],	salio_pais = [];
			var se_ira = [], donde_ira =[], nosabe_donde_ira =[];
			var inconsistencia_di =[], inconsistencia_fecha_n =[], inconsistencia_sexo =[], inconsistencia_tdoc =[];
			//var new_documento = [], new_f_nacimiento =[], new_sexo =[], new_tipo_doc = [];
		      //contol de telefonos fijos1
			<?php for ($i=0; $i< $total_p; $i++){?>

				//LLena vectores de inconsistencias

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
         //////////////new_tel_f1/////////////$

		 new_tel_f1[<?php echo $i?>]= $('#indi_f1<?php echo ($i+1)?> option:selected').val()+$('#new_tel_f1<?php echo ($i+1)?>').val();

				if($('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val()==3) 
						new_tel_f1[<?php echo $i?>] = '';
////////////estado_telf1////////////////
				if ($('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val())
				  estado_telf1[<?php echo $i?>]= $('input:radio[name=est_tel_f1<?php echo ($i+1)?>]:checked').val();
				else estado_telf1[<?php echo $i?>]='';
				
///////////new_tel_f2//////////////// 

	 new_tel_f2[<?php echo $i?>]= $('#indi_f2<?php echo ($i+1)?> option:selected').val()+$('#new_tel_f2<?php echo ($i+1)?>').val();
				
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

//*************************new_tel_pc************ //

		new_tel_pc1[<?php echo $i?>]=$('#indi_fpc<?php echo ($i+1)?> option:selected').val()+$('#new_tel_pc<?php echo ($i+1)?>').val();
				
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
				if ($('input:radio[name=est_cel_pc<?php echo ($i+1)?>]:checked').val())
				  estado_telpc2[<?php echo $i?>]= $('input:radio[name=est_cel_pc<?php echo ($i+1)?>]:checked').val();
				else estado_telpc2[<?php echo $i?>]='';

			//---------Toma preguntas se va p16
				var no_haceparte = $('#rp16<?php echo ($i+1)?> option:selected').val();
				if(no_haceparte > 0){
					xq_se_fue[<?php echo $i?>] = no_haceparte;
				    
				   //alert("INGRESO A LLENAR P16"+ xq_se_fue[<?php echo $i?>]);
					if(no_haceparte==2){
						 //alert("se mudo"+$('input:radio[name=sitel<?php echo ($i+1)?>]:checked').val());
						if($('input:radio[name=sitel<?php echo ($i+1)?>]:checked')){
							indicativo_sefue[<?php echo $i?>]= $('#indicativo<?php echo ($i+1)?> option:selected').val(); 
							tel_fijo_se_fue[<?php echo $i?>]=  $('#tf_pergo<?php echo ($i+1)?>').val(); 
							celular_se_fue[<?php echo $i?>] =  $('#cel_pergo<?php echo ($i+1)?>').val(); 
							info_se_fue[<?php echo $i?>] =  $('#text_pergo<?php echo ($i+1)?>').val();
						 }
						 else{
						 	alert('Pregunte si tiene teléfos!!..');
						 	return 0;
						 }
					}
					
					if($('#rp16<?php echo ($i+1)?> option:selected').val()==3)
					{
						//alert('salio del pais por'+$('input:radio[name=gopais<?php echo ($i+1)?>]:checked').val());
					if ($('input:radio[name=gopais<?php echo ($i+1)?>]:checked').val())
						     salio_pais[<?php echo $i?>] =  $('input:radio[name=gopais<?php echo ($i+1)?>]:checked').val();
						else alert('Pregute Por cuant tiempo estará fuera del país');
					}
					else 
						salio_pais[<?php echo $i?>] = '';

					if($('#rp16<?php echo ($i+1)?> option:selected').val()==7)
					  info_se_fue[<?php echo $i?>] = $('#razon_pergo<?php echo ($i+1)?>').val(); 
				}
				else { 
						xq_se_fue[<?php echo $i?>] = '';
						indicativo_sefue[<?php echo $i?>]= '';
						tel_fijo_se_fue[<?php echo $i?>]= '';
						celular_se_fue[<?php echo $i?>] = '';
						info_se_fue[<?php echo $i?>] = '';
						salio_pais[<?php echo $i?>] = '';
						}
				
				<?php }?> //fin control telefonos

//----------------------CORRECCIONES

//---- Correccción Tipo de Documento new_td
	
			var corrigetd= '', corrigedi = '', corrige_sx = '', corrige_fn = '';
			for (var i = 0 ;  i < total_p; i++) {
				if($("#new_td"+(i+1)).length || $("#new_di"+(i+1)).length){
							   
					corrigetd= $("input:radio[name=new_td"+(i+1)+"]:checked").val();
					corrigedi= $("input:radio[name=new_di"+(i+1)+"]:checked").val();
					//alert("Corrige tipo doc o di"+ corrigetd +" "+corrigedi);
					if(corrigetd > 1){
						
					   inconsistencia_tdoc[i]=corrigetd;
					   new_tipo_doc[i] = $("#new_td"+(i+1)+" option:selected").val(); 
					}
					else{
						inconsistencia_tdoc[i]='';	
						new_tipo_doc[i] = '';
					}///// Documento de I
					if(corrigedi > 1){
					   inconsistencia_di[i] = corrigedi;
					   new_documento[i] = $("#new_di"+(i+1)).val(); 
					}
					else{
						inconsistencia_di[i]='';
						new_documento[i] = '';
					}
				}
				else{
					inconsistencia_tdoc[i]='';
					new_tipo_doc[i] = '';
					inconsistencia_di[i]='';
					new_documento[i] = '';					

				}
				//----------fin corrección Documento y tipo doc
	//------Corrección Fecna Nac
			if($("#new_fn"+(i+1)).length)	{
				corrige_fn= $("input:radio[name=new_fn"+(i+1)+"]:checked").val();
				if(corrige_fn > 1 ){
					inconsistencia_fecha_n[i]= corrige_fn;
					new_f_nacimiento[i] = $("#new_fn"+(i+1)).val(); 
				}
				else{
					inconsistencia_fecha_n[i]= '';
					new_f_nacimiento[i] = '';
				}
			}
			else{
				inconsistencia_fecha_n[i]= '';
				new_f_nacimiento[i] = '';
			}

	//----------fin corrección Fecha anacimiento
	//----	inconsistencia sexo new_sexo
			if($("#new_sexo"+(i+1)).length)	{
				corrige_sx= $("input:radio[name=new_sexo"+(i+1)+"]:checked").val();
				if(corrige_sx > 1 ){
					inconsistencia_sexo[i]= corrige_sx;
					new_sexo[i] = $("#new_sexo"+(i+1)+" option:selected").val(); 
				}
				else{
					inconsistencia_sexo[i]= '';
					new_sexo[i] = '';
				}
			}
			else{
				inconsistencia_sexo[i]= '';
				new_sexo[i] = '';
			}

		}

//----------------------p54intension de mudarse

		if($('input:radio[name=intsi]:checked'))
		   {
		   	for (var i =0; i < total_p; i++) {
		   			if ($('#intper'+(i+1)).prop('checked')){
		   			   se_ira[i] = 1;
		   			   donde_ira[i] = $('#a_donde'+(i+1)).val();
		   			   nosabe_donde_ira[i] = '';
		   			   if($('#no_sabe'+(i+1)).prop('checked')){
		   			   		nosabe_donde_ira[i]=1;
		   			   		donde_ira[i] = '';
		   			   }
		   			   else {
		   			   		if(donde_ira[i]=='' && nosabe_donde_ira[i] == ''){
		   			   				alert('Pregunte a donde se Fue la persona!!'+(i+1));
		   			   				return i;
		   			   			}
		   			   	    nosabe_donde_ira[i] = '';
		   			  
		   					}	
		   			}
		   			else{ se_ira[i] = '';
						  donde_ira[i] = '';
						  nosabe_donde_ira[i] = '';	
						}

		   	}
		   }

//-------------------fin captura intensiónde mudarse


			////Toma la persona que da la información
			var per_rta=$('input:radio[name=quien_rta]:checked').val();
			per_rta=llaves_p[per_rta];
			//alert("Responde persona:"+per_rta+" Hogar "+n);
 	   		//alert("Personas del nuevo hogar:"+per_h1.length);
 	  for (var i =0; i < total_p; i++) {
  	     	parametros["per"+(i+1)] = llaves_p[i+1];//Personas del hogar
 	   }

 	   parametros.LLAVES_PER = llaves_p;
 	   parametros.LLAVE_TEM_H = $('#ll_h').text();
 	   parametros.TOTAL_PER=i;
 	   parametros.user=$("#user").text();
 	   parametros.LLAVE_INFORMANTE = per_rta;
 	   parametros.INFO_ADICIONAL = $('#info_adicional').val();
	   parametros.COMENTARIO_MONITOR = $('#comentarios').val();
	   parametros.USUARIO = $('#user').text();
	   parametros.ESTADO_H = $('input:radio[name=h_actualiza]:checked').val();
 	   parametros.CONTROL_TELF1 = ctr_tels_f1;
	   parametros.ctr_telsf2	= ctr_tels_f2;
	   parametros.ctr_tels_c1 = ctr_tels_cel1;
	   parametros.ctr_tels_c2	= ctr_tels_cel2;
	   parametros.ctr_t1_pc	= ctr_tel1s_pc;
	   parametros.ctr_t2_pc	= ctr_tel2_pc;
//************************Actualizacion de numeros   
	   parametros.estado_per = estado_per;
	   parametros.new_tel_f1 = new_tel_f1;
	   //alert("estado"+ estado_per +"estado tel1"+estado_telf1+" teles Fijos1"+new_tel_f1);
	   parametros.new_tel_f2 = new_tel_f2;
	   parametros.new_cel1 = new_cel1;
	   parametros.new_cel2 = new_cel2;
	   parametros.new_pcontacto = new_pcontacto;
	   parametros.new_tel_pc1 = new_tel_pc1;
	   parametros.telefono_pc2 = telefono_pc2;
	   parametros.estado_contacto = estado_contacto;
	   parametros.estado_telf1 = estado_telf1;
	   parametros.estado_telf2 = estado_telf2;
	   parametros.estado_cel1 = estado_cel1;
	   parametros.estado_cel2 = estado_cel2;
	   parametros.estado_telpc1 = estado_telpc1;
	   parametros.estado_telpc2 = estado_telpc2;
	   parametros.inconsistencia_di = inconsistencia_di;
	   parametros.inconsistencia_fecha_n = inconsistencia_fecha_n;
	   parametros.inconsistencia_sexo = inconsistencia_sexo;
	   parametros.inconsistencia_tdoc = inconsistencia_tdoc;
	   parametros.new_documento = new_documento;
 	   parametros.new_f_nacimiento = new_f_nacimiento;
 	   parametros.new_sexo = new_sexo;
  	   parametros.new_tipo_doc = new_tipo_doc;

		parametros.xq_se_fue = xq_se_fue;
		parametros.indicativo_sefue = indicativo_sefue;
		parametros.tel_fijo_se_fue = tel_fijo_se_fue;
		parametros.celular_se_fue = celular_se_fue;
		parametros.info_se_fue = info_se_fue;
		parametros.salio_pais = salio_pais;

	   parametros.se_ira = se_ira;
	   parametros.donde_ira = donde_ira;
 	   parametros.nosabe_donde_ira = nosabe_donde_ira;
 	   // parametros.LLAVE_NUEVO_H  = llaves_p[llaves_p.length-1];
	   if ($('#cambio_dpto').prop('checked')){
		     parametros.NEW_DPTO =$('#dpto option:selected').text();
		     parametros.NEW_MPIO =$('#c_mpio option:selected').text(); 
		     parametros.P1=$('#c_mpio').val();
		    // alert('DPTO'+parametros['NEW_DPTO']+" "+parametros['NEW_MPIO']+" "+parametros['P1']);
		  }
		if($('#cambio_cpoblado').prop('checked'))
		   parametros.NEW_CENTRO_P = $('#c_cpoblado').val();
		if($('#cambio_barrio').prop('checked'))
			parametros.NEW_BARRIO_VRDA = $('#c_barrio').val();

		if($('#cambio_clase').prop('checked'))
			parametros.NEW_CLASE = $('#c_clase').val();

		
	   if($('#cambio_dir').prop('checked') 
			&& $('input:radio[name=c_zona]:checked').val()=='Rural')
		{
			parametros.CORRIGE_DIRECCION = 1;
			zona = 'Rural';
			//---   
			direccion=$('#vrda').val();
			direccion+=' '+$('#finca').val();
			direccion+=' '+$('#via_ref').val();
			direccion+=' '+$('#sitio_ref').val();
			direccion+=' '+$('#indi').val();

		}

		if($('#cambio_dir').prop('checked') 
			&& $('input:radio[name=c_zona]:checked').val()=='Urbana')
		{
		   
			parametros.CORRIGE_DIRECCION = 1;
			zona = 'Urbana';

			if($('#dir_1p option:selected').val()!='0')
				direccion=$('#dir_1p option:selected').text();
	    	direccion+=$('#otro_dir').val();
	    	direccion+='-'+$('#nro_dir1').val();
		    if ($('#ABC1').val()!='null')
				direccion+=' '+$('#ABC1').val();
			if($('#ABC1aux').val()!='null')
				direccion+=$('#ABC1aux').val();
				

			 		
			if($('#bis').prop('checked'))
			 	direccion +=' bis';
			
			direccion +=' '+$('#punto_c1').val();
			direccion +='-'+$('#nro_dir2').val();
			if ($('#ABC2').val()!='null')
			   direccion +=' '+$('#ABC2').val();//select

			if($('#ABC2aux').val()!='null')
				direccion+=$('#ABC1aux').val();
				
			
			direccion +=' '+$('#nro_dir3').val();
			direccion +=$('#punto_c2').val();
			if ($('#add_dir1').val()!='null')
			    direccion +=' '+$('#add_dir1 option:selected').text();//select
			direccion +=' '+$('#add_dir2').val();
}
	//alert('Direccion'+direccion);
	//alert('CP '+parametros['NEW_CENTRO_P']+'Vrd '+parametros['NEW_BARRIO_VRDA']+'clase '+parametros['NEW_CLASE']);
	parametros.ZONA_DIRECCION = zona;
	parametros.NEW_DIRECCION = direccion;
     //tex_ll = parseInt(parametros["llave_nh"],10); 
	   //alert("Se va a guardar y salir!");
	   $.ajax({
                data: parametros,
                type: 'POST',
                url: url_base+"index.php/c_elps/guarda_encuesta",
             
                beforeSend: function () {
                        $("#ms_e").html("<img src='"+url_base+"images/ajax-loader.gif'>");
                },
                success:  function (response) {
                	
                	 if ($.trim(response)){
                 	 	  
                	 	  $("#ms_e").html("La espuesta: "+response);
	 
	                }
               	   	else {
                			$("#ms_e").html("Error Al guardar la información");
                	 }
                },
             error: function(errorThrown){
        	 alert(errorThrown);
        	 alert("Ocurrio un error en AJAX!");
    		}  
        });
    }
 else alert("Falta completar alguna informacion!!");

}


	$(document).ready(function(){

		//document.getElementById("encuesta").disabled="true";
		window.llaves_p=[];
		window.seguir =0;
		window.cuentapergo=[];
		window.url_base='<?php echo base_url();?>';
		//Boquea selecccion de Departamento y Municipio.
		//$("#dpto").prop('disabled', true);
		$("#h_siac").on("click", function(){
			var completos = new Array();
			var indice = 0;
			$('[name=actualizado]').each(function(){
				if($(this).prop('checked')){
					completos[indice++] = $(this).val();
				}
			      });
			if (completos.length == <?php echo $total_p;?>){
				//$('#h_noac').prop('disabled',true);
				$('#ms_e').text('Hogar marcado como actualizado!!');
			}else{
			    $('#ms_e').text('El hogar se marca como No actualizado.');
			    $('#h_noac').prop('disabled',false);
			    $('#h_noac').prop('checked',true);
			}
			});

		 $("[name=actualizado]").on("click", function(){
			$('#h_siac').prop('checked',false);
			$('#h_noac').prop('checked',false);
			$('#ms_e').text('Recuerde Seleccionar si el hogar se Actualizó');

		});
		/*$("#h_noac").on("click", function(){
			var completos = new Array();
			var indice = 0;
			$('[name=actualizado]').each(function(){
				if($(this).prop('checked')){
					completos[indice++] = $(this).val();
				}
			      });
			if (completos.length == <?php echo $total_p;?>){
				$('#h_siac').prop('checked',true);
			}
			});*/
		

		$("c_mpio").prop('disabled', true);
		<?php
		$cont =1;
		foreach($hogar as $fila){?>
          llaves_p[<?php echo $cont?>]=<?php echo json_encode($fila->LLAVE_TEM_P)?>;
		<?php $cont++;}?>
		llaves_p[<?php echo $cont?>] = <?php echo "'".$fila->LLAVE_TEM_H."'"?>;
		
		$("#intsi").on("click", function(){
			if($("#intsi").is(':checked')){
				$("#donde").show();
			}else $("#donde").hide();
		});

		$(".abtn").click(function(evento){
			
			evento.preventDefault();
		});
		//$("#encuesta").hide();

		$("#rsi").on("click", function(){
			//$('#noencuesta').slideUp('slow');
			$('#noencuesta').html('');
			$('#encuesta').slideDown('slow');
			//$('#encuesta:visibility').visibility();
			//visibility: visible
			$('#quien_rta1').focus();
		});

		$("#rno").on("click", function(){
			$('#encuesta').slideUp('slow');
			var total_p = $('#total_p').text();
			//alert("La propiedad es :"+$('#encuesta').css("display"));
			//if ($('#encuesta').css("display")=="none")
			 //else $('#encuesta').slideUp('slow');
			$.get("<?php echo base_url().'/application/views/view_noactualiza.php?total_p='.$cont?>",function(norta){
					$('#noencuesta').html(norta);	
			});

			$('#noencuesta').slideDown('slow');  
		});

	//---Cargue de departamento 
      // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#dpto").change(function(){
    	$("#cambio_mpio").prop('checked',true);
    	$("#c_mpio").show();;
    	//$("#")
        // Guardamos el select de dpto
        var mpio = $("#c_mpio");

        // Guardamos el select de dpto
        var dpto = $(this);
        //alert("Dpto"+ dpto.val());
        if($(this).val() != '')
        {
            $.ajax({
                data: {id_dpto : dpto.val() },
                url:   url_base+'index.php/c_elps/mpios_por_dpto',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    dpto.prop('disabled', true);
                },
                success:  function (r) 
                {
                    dpto.prop('disabled', false);
                   
                    // Limpiamos el select
                    mpio.find('option').remove();
                    //console.log(objeto);
                    //r2= json_encode(r);
                    $(r).each(function(clave, valor){ // indice, valor
                        mpio.append('<option value="' + valor.ID_MPIO + '">' + valor.MPIO + '</option>');
                      });

                    mpio.prop('disabled', false);
                },
                error: function(errorThrown)
                {
	             alert("Ocurrio un error en AJAX!");
	        	 alert(errorThrown);
	        	 dpto.prop('disabled', false);
                }
            });
        }
        else
        {
            mpio.find('option').remove();
            mpio.prop('disabled', true);
        }
    });
    
});


</script>
