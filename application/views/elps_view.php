

<?php $attributes = array('class' => '', 'id' => '');
echo form_open('index.php/c_elps', $attributes);?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hogares<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" id ="nuevos">Nuevos</a></li>
            <li><a href="#" id ="completos">Completos</a></li>
            <li><a href="#" id ="todos_losh">Todos</a></li>
            <li><a href="#" id ="no_actualizan">No Actualizan</a></li>
        </ul>
      </li>
    </ul>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#" id="agenda">Agenda</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Personas<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <!--li><a href="<?php echo base_url().'index.php/c_elps/ver_personas';?>">Nuevos</a></li-->
          <!--li><a href="#">Actualizadas</a></li>
          <li><a href="#">Completas</a></li-->
          <li><a href="#" id ="todas">Todas</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li><a href="<?php echo base_url().'index.php/c_elps'?>" <span class="glyphicon glyphicon-user"></span>Regresar</a></li>
     <!--li><a href="<?php echo base_url()?>"<span class="glyphicon glyphicon-user"></span>Salir</a></li-->
     <li><a href="<?php echo base_url()?>"<span class="glyphicon glyphicon-log-in"></span><?php echo  $usuario;?></a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

 <div id ="reporte">
	
		    Usuario:
		   <span id="user"><?php echo $usuario;?></span><br/>
		   <label for='llave_h'>Hogar: <span class='required'>*</span></label>
		  	 <p class="t_error"><?php echo strip_tags(form_error('llave_h'));?></p>
			<input type="number" id="llave_h" name ='llave_h' value="<?php echo set_value('llave_h');?>"/>

			<!--label for='user'>Usuario: <span class='required'>*</span></label>
		  	 <p class="t_error"><?php #echo strip_tags(form_error('user')); ?></p>
			<input type="text" id="user" name ='user' value="<?php #echo set_value('user'); ?>"/-->
		<!--p>
		<H3>Hogares ejemplo..</H3>
		00001911100</br>
		00001311100</br>
		00001411100</br>
		00001711100</br>
		00009914203</br>
		00010614201</br>
		00010614202</br>
		00010814201</br>
		00012114201</br>
		00077814204 ISx</br>
		10289411100 ID</br>
		42030911100 I_tdoc</br>
		</p-->

		
		  <?php 
		  $data = array('type' => 'submit',
		  'value' =>'Buscar',
		  'class' => 'btn btn-success abtn');
		  echo form_submit($data);?>
	
     </div>

<?php echo form_close();?>
<script type="text/javascript">
	$(document).ready(function(){


		$("#completos").click(function(){
			$.get("<?php echo base_url().'index.php/c_elps/ver_hogares/completos'?>",function(norta){
					$('#reporte').html(norta);	
			});
		});
		///todos_losh
		$("#todos_losh").click(function(){
			$.get("<?php echo base_url().'index.php/c_elps/ver_hogares/todos'?>",function(norta){
					$('#reporte').html(norta);	
			});
		});

		$("#nuevos").click(function(){
			$.get("<?php echo base_url().'index.php/c_elps/ver_hogares/nuevos'?>",function(norta){
					$('#reporte').html(norta);	
			});
		});

		/*HOgares que no_actualizan*/
	
		$("#no_actualizan").click(function(){
			$.get("<?php echo base_url().'index.php/c_elps/vno_actualizan'?>",function(norta){
					$('#reporte').html(norta);	
			});
		});

	$("#todas").click(function(){
			$.get("<?php echo base_url().'/index.php/c_elps/ver_personas/2'?>",function(norta){
					$('#reporte').html(norta);	
			});
		});

		$("#agenda").click(function(){
			$.get("<?php echo base_url().'/index.php/c_elps/ver_agenda'?>",function(norta){
					$('#reporte').html(norta);	
			});
		});

		
});
</script>

