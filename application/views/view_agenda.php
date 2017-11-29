
<!--script src="<?php echo base_url() ?>js/valida.js"></script-->
<style type="text/css">
	#agenda{
		/*background-color:  #a2a1d0;*/
		color: black;
		/*padding: 20px;*/
	}

</style>

<?php 
  date_default_timezone_set('America/Bogota');
  $fecha = str_replace('/','-',date('Y/m/d'));
  $hora = date('H:i:s');

?>

  <form id="agenda">
	<section class="list-group">
		<h3>AGENDAR LLAMADA DEL HOGAR<b> <?php echo " : ".$llave_nh?></b></h3>
	<div class="row">
		<div class="col-lg-3">LLAVE DEL HOGAR  
		<input type="text" id="ll_nh" value="<?php echo $llave_nh?>" disabled/></div>

		<div class="col-lg-3">
		  FECHA <br/> 
		<input type="date" id="fecha" value="<?php echo $fecha?>"/> 

		</div >

		<div class="col-lg-3">HORA  <input type="time" id="rj"  value="<?php echo $hora?>" /> </div>
	
		<div class="col-lg-3">OBSERVACIONES <textarea id='obs'></textarea></div >
	 	
	</div>
	<span id='bt_ag' onclick='agenda_hv()' class='btn btn-success'>AGENDAR</span>
    </section>
   </form>

<script type="text/javascript">

	function agenda_hv() {

		 //console.log($("#rj").val());
		 var ll_nh = $("#ll_nh").val();
		 var  n = ll_nh.toString();
	     while(n.length<11){
	         n = "0" + n;
	     }
	//alert("Hogar a agendar: "+ );
		//$.post(url_base+"index.php/c_elps/guarda/ver_agenda.php",{
		$.post(url_base+"index.php/c_elps/guarda_ag",{
			  llave_nh: n,
			  fecha : $("#fecha").val(),
			  hora : $("#rj").val(),
			  user : $("#user").text(),
			  obs : $("#obs").val()
			},
			function(data,status){

				$("#agenda").html(data);
			});
	
}

</script>

