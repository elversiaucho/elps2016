<!DOCTYPE html>
<html lang="es">
<head>
   <link rel="shortcut icon" href="<?php echo base_url()?>images/logo.png" type="image/x-png"/>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap/bootstrap.min.css">
  

  <title>ELPS 2016</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src = "<?php echo base_url() ?>js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/valida.js"></script>
  
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/estilos.css" />
   <script src="<?php echo base_url() ?>js/basicos_js.js"></script>  

</head>

<body> <!--onLoad="incrementa(hora(),minutos(),segundo() )"-->
  <header>
   <img src='<?php echo base_url() ?>images/logo_dane.png'/>
   
  <form name="form1" method="post" action="">
       <p id ="hora"> </p>
      </form>
	<div id ="titulo2">
  <p class="lead">
	<h2>Encuesta Longitudinal de Protección Social ELPS <br/> SEGUIMIENTO 2016</h2>
  </p>
   </div>
   </header>

   <nav>
  <ul id="menu">
    <li id="lote"> <a href="javascript:realizaProceso($('#'),'#'))">Lote</a>
      <ul>
        <li><a href="#">Buscar</a></li>
       
      </ul>
    </li>
    <li class="mcap"> <a href="#" >Capitulo A</a></li>
    <li class="mcap"> <a href="#" >Capitulo B</a></li>
    <li class="mcap"> <a href="#" >Capitulo C</a></li>
    <li class="mcap"> <a href="#" >Capitulo D</a></li>
    <li class="mcap"> <a href="#" >Capitulo E</a></li>
    <li class="h"> <a href="#">Salir</a></li>
   
  </ul>

</nav>

