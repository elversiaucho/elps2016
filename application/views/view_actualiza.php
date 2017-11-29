
<form id="frper">
     <h3>14. Seleccione a la persona que actualiza la información:</h3>
      <ul class="list-group">
		<?php 
		 $cont=1;
		  foreach($hogar as $fila){?>
		 	   
		  	<li class='list-group-item list-group-item-success'>
		  	    <label><input type='radio' name='quien_rta' id= '<?php echo "quien_rta".$cont?>'/>
		                  <?php echo $fila->NOMBRE?>
		       </label><span class='badge'><?php echo $cont?></span></li>

          <?php $cont++;} ?>
       </ul>
    
    <h3> 15. ¿Las siguientes personas siguen haciendo parte del hogar?</h3>
    
    <div class="row">
         <?php 
		 $cont=1;
		 foreach($hogar as $fila){?>
		 	    <div class='col-sm-4' id='<?php echo "nombre".$cont?>'> <span class='badge'><?php echo $cont?> </span><?php echo $fila->NOMBRE?></div>
		 	    <div class='col-sm-8'><label><input type='radio'  id='<?php echo "siper".$cont?>' name='<?php echo "siper".$cont?>' value='1' checked onclick="borra_p16('<?php echo $cont?>')"/>Si</label>
		 	       <label><input type='radio' id='<?php echo "noper".$cont?>' name='<?php echo "siper".$cont?>' value='0' onclick="p16('<?php echo $fila->NOMBRE?>','<?php echo $cont?>')"/>No</label>
		 	    </div>

             <?php $cont++;} ?>

      </div>
      <p>
        <a href= "#" onclick="checkp15('<?php echo $cont?>')" class="btn btn-danger">
        CONTINUAR.
        </a>
	  </p>