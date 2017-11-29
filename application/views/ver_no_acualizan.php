<?php
/*header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");*/?>
<div class="container-fluid">
<table border="1">
		<tr><th>LLAVE PERSONA</th>
		<th>LLAVE_NUEVO_H</th>
		<th>NOMBRE</th>
		<th>EDAD</th>
		<th>TIPO PERSONA</th>
		<th>FECHA ACTUALIZACIÓN</th>
		<th>SEXO</th>
		<th>FECHA NACIMIENTO</th>
		<th>TELEFONOS</th>
				
		<th>DEPTO</th>
		<th>MUNICIPIO</th>
		<th>DIRECCION</th>
		<th>USUARIO</th>
		<th>ESTADO ACTUALIZACIÓN</th></tr>


<?php		
if(isset($personas) and is_array($personas)){
	foreach ($personas as $fila) {?>

	<tr></tr>

<?php }}?>

</table>
<!--a href="../hogares_elps2016.xls"> Descargar</a--> 
<a href="<?php echo base_url('assets/hogares_elps2016.xls'); ?>"> Descargar</a>
