


 <div class="container">
  <?php //echo validation_errors();?>
  <?php echo form_open('index.php/c_cheklg'); ?>
 	 
   <label for='Usuario'>Usuario: <span class='required'>*</span></label>
  	 <p class="t_error"><?php echo strip_tags(form_error('Usuario')); ?></p>
	<input type="text" id="Usuario" name ='Usuario' value="<?php echo set_value('Usuario'); ?>"/>
	<br/>
	<br/>
	<label for='clave'>Contraseña: <span class='required'>*</span></label>
  	 <p class="t_error"><?php echo strip_tags(form_error('clave')); ?></p>
	<input type="password" id="clave" name ='clave' value="<?php echo set_value('clave'); ?>"/>

<p>
        <?php echo form_submit( 'submit', 'Ingresar'); ?>
</p>
<?php echo form_close(); ?>
</div>

