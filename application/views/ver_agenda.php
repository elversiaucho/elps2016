
<div class="container-fluid">
<table border="1">
	<tr><th>HOGAR</th>
		<th>USUARIO</th>
		<th>FECHA PROGRAMADA</th>
		<th>HORA</th>
		<th>OBSERVACIONES</th>
	</tr>
<?php		
if(isset($agendas)and is_array($agendas)){
	foreach ($agendas as $fila) {

		echo "<tr><td>".$fila->HOGAR."</td>
		            <td>".$fila->USUARIO."</td>
		            <td>".$fila->FECHA."</td>
		            <td>".$fila->HORA."</td>
		            <td>".$fila->OBSERVACIONES."</td></tr>";
	}
}?>
</table>
 
 <a href="<?php echo base_url('assets/Agendas_elps2016.xls'); ?>"> Descargar</a>

</div>

