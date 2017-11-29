<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();
class C_elps extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->library('phpexcel/PHPExcel');
		//$this->load->database();
		$this->load->helper('form');
		$this->config->set_item('language', 'spanish');
		$this->load->helper('url');
		$this->load->model('m_elps');
	}	
	function index()
	{			
	if($this->session->userdata('ingreso'))
	   {
	     $session_data = $this->session->userdata('ingreso');
	     $user['usuario'] = $session_data['usuario'];
	     
	     $this->load->view("encabezado");
	   	 $this->form_validation->set_rules("llave_h","Llave Hogar",'required|is_numeric|max_length[11]');
	     $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
				
				$this->load->view('elps_view',$user);
		}	
		else // passed validation proceed to post success logic
		{
			 //echo $data['usuario'];
			$form_data = array('llave_h' => set_value('llave_h'),
				'user' => set_value('user')
				);
			//echo "el hogar es:". $form_data['llave_h'];	
		 	//$hogar= array ('hr' => $form_data);
			$data['hogar'] = $this->m_elps->get_hogar2($form_data['llave_h']);
			$data['usuario'] = $user['usuario'];
			//echo "Usuario des c_elps:".$user['usuario'];
			//array_push($data,$user['usuario']);
			//$data['hogar'] = $this->m_elps->get_hogar('00000911100');
			if ($data['hogar']<>false)
				$this->load->view('view_datos',$data);	
			else {
					$form_data = array('llave_h' => set_value('llave_h'),'user' => set_value('user')	);
					$data['hogar'] = $this->m_elps->get_hogar2($form_data['llave_h']);
					$data['usuario'] = $user['usuario'];
			if ($data['hogar']<>false)
				$this->load->view('view_datos',$data);	
			else $this->load->view('view_error');
			
				}
				
				//echo "<h3>Hogar no encontrado</h3>";

		 }
		 $this->load->view('footer');
	    }
	  else
	   {
	    redirect('C_elps_lg', 'refresh');
	   }
	
	}
/*--------------------------------FIN INDEX()----------------*/
function ver_noresponden(){

	$datos['no_responden']=$this->m_elps->mget_norta();

	/*LLAVE_TEM_H
	PQ_NOACTUALIZA
	OTRO_ACTUALIZA
	GRADO_RECHAZO
	COMENTARIOS
	FECHA
	USUARIO*/
}

function ver_agenda(){

	$datos['agendas'] = $this->m_elps->mget_agenda();
	$this->load->view('ver_agenda',$datos);
	$url =  base_url('index.php/c_elps/ver_agenda');
	$content = '<table border="1">
	<tr><th>HOGAR</th>
		<th>USUARIO</th>
		<th>FECHA</th>
		<th>HORA</th>
		<th>OBSERVACIONES</th>
	</tr>';
	if(isset($datos['agendas'])and is_array($datos['agendas'])){
		foreach ($datos['agendas'] as $fila) {

		$content .= '<tr><td>'.$fila->HOGAR.'</td>
		            <td>'.$fila->USUARIO.'</td>
		            <td>'.$fila->FECHA.'</td>
		            <td>'.$fila->HORA.'</td>
		            <td>'.$fila->OBSERVACIONES.'</td></tr>';
	}
}
$content .= '</table>';

		 $path = 'assets/Agendas_elps2016.xls';
		
		$handle = fopen($path, 'w+');
		//$content = $url;
				fwrite($handle, $content);
				fclose($handle);
	}

function mpios_por_dpto(){
	//header('Content-Type: application/json');

	$mpios = $this->m_elps->get_mpios_dpto($_POST['id_dpto']);
	print_r(json_encode($mpios));
	//echo json_encode($mpios);
	
}

  function guarda_encuesta(){
    	$data_h = array();
		$data_h_per = array();
		$data_h['LLAVE_NUEVO_H'] =$this->input->post('LLAVE_TEM_H');

		$data_per['LLAVES_PER'] = $this->input->post('LLAVES_PER');
		$data_per['TOTAL_PER'] = $this->input->post('TOTAL_PER');
		$data_per['CTRLES_TELF1'] = $this->input->post('CONTROL_TELF1');
		$data_per['ctr_tels_f2'] = $this->input->post('ctr_telsf2');
		$data_per['ctr_tels_cel1'] = $this->input->post('ctr_tels_c1');
		$data_per['ctr_tels_cel2'] = $this->input->post('ctr_tels_c2');
		$data_per['ctr_tel1s_pc'] = $this->input->post('ctr_t1_pc');
		$data_per['ctr_tel2_pc'] = $this->input->post('ctr_t2_pc');
		
		$data_h['LLAVE_INFORMANTE'] = $this->input->post('llave_informante');
		$data_per['estado_per'] = $this->input->post('estado_per');
	    $data_per['new_tel_f1'] = $this->input->post('new_tel_f1');
	  	$data_per['estado_telf1'] = $this->input->post('estado_telf1');
	    $data_per['new_tel_f2'] = $this->input->post('new_tel_f2');
	    $data_per['estado_telf2'] = $this->input->post('estado_telf2');
	    $data_per['new_cel1'] = $this->input->post('new_cel1');
	    $data_per['estado_cel1'] = $this->input->post('estado_cel1');
	    $data_per['new_cel2'] = $this->input->post('new_cel2');
	    $data_per['estado_cel2'] = $this->input->post('estado_cel2');
	    $data_per['new_pcontacto'] = $this->input->post('new_pcontacto');
	    $data_per['estado_contacto'] = $this->input->post('estado_contacto');
	    $data_per['new_tel_pc1'] = $this->input->post('new_tel_pc1');
	    $data_per['estado_telpc1'] = $this->input->post('estado_telpc1');
	    $data_per['telefono_pc2'] = $this->input->post('telefono_pc2');
	    $data_per['estado_telpc2'] = $this->input->post('estado_telpc2');

	    $data_per['se_ira'] = $this->input->post('se_ira');  
	    $data_per['donde_ira'] = $this->input->post('donde_ira');
 		$data_per['nosabe_donde_ira'] = $this->input->post('nosabe_donde_ira');
 		$data_per['xq_se_fue'] = $this->input->post('xq_se_fue');
		$data_per['indicativo_sefue'] = $this->input->post('indicativo_sefue');
		$data_per['tel_fijo_se_fue'] = $this->input->post('tel_fijo_se_fue');
		$data_per['celular_se_fue'] = $this->input->post('celular_se_fue');
		$data_per['info_se_fue'] = $this->input->post('info_se_fue');
		$data_per['salio_pais'] = $this->input->post('salio_pais');

		$data_per['inconsistencia_di'] = $this->input->post('inconsistencia_di');
		$data_per['inconsistencia_fecha_n'] = $this->input->post('inconsistencia_fecha_n');
		$data_per['inconsistencia_sexo'] = $this->input->post('inconsistencia_sexo');
		$data_per['inconsistencia_tdoc'] = $this->input->post('inconsistencia_tdoc');
		$data_per['new_documento'] = $this->input->post('new_documento');
		$data_per['new_f_nacimiento'] = $this->input->post('new_f_nacimiento');
		$data_per['new_sexo'] = $this->input->post('new_sexo');
		$data_per['new_tipo_doc'] = $this->input->post('new_tipo_doc');
 /****************Validacion y armado de objeto con la info de HOGAR a ACTUALIZAR***************/
	
		$P1 = $this->input->post('P1');
		$NEW_DPTO = $this->input->post('NEW_DPTO');
		$NEW_MPIO = $this->input->post('NEW_MPIO');
		$NEW_CENTRO_P = $this->input->post('NEW_CENTRO_P');
		$NEW_BARRIO_VRDA = $this->input->post('NEW_BARRIO_VRDA');
		$NEW_CLASE = $this->input->post('NEW_CLASE');
		$CORRIGE_DIRECCION = $this->input->post('CORRIGE_DIRECCION');
		$ZONA_DIRECCION = $this->input->post('ZONA_DIRECCION');
		$NEW_DIRECCION =$this->input->post('NEW_DIRECCION');
		$ESTADO_H = $this->input->post('ESTADO_H');
		$COMENTARIO_MONITOR = $this->input->post('COMENTARIO_MONITOR');
		$INFO_ADICIONAL =  $this->input->post('INFO_ADICIONAL');


		if(isset($P1))
			$data_h['P1'] =  $this->input->post('P1');

		if(isset($NEW_DPTO))
			$data_h['NEW_DPTO'] = $NEW_DPTO;

		if(isset($NEW_MPIO))
			$data_h['NEW_MPIO'] = $NEW_MPIO;

		if(isset($NEW_CENTRO_P))
			$data_h['NEW_CENTRO_P'] = $NEW_CENTRO_P;

		if(isset($NEW_BARRIO_VRDA))
			$data_h['NEW_BARRIO_VRDA'] = $NEW_BARRIO_VRDA;

		if(isset($NEW_CLASE))
			$data_h['NEW_CLASE'] = (int)$NEW_CLASE;

		if(isset($CORRIGE_DIRECCION)){
			$data_h['CORRIGE_DIRECCION'] = (int)$CORRIGE_DIRECCION;
			$data_h['NEW_DIRECCION'] = $NEW_DIRECCION;
		}

		if($ZONA_DIRECCION!='')
			$data_h['ZONA_DIRECCION'] = $ZONA_DIRECCION;

		//if(is_string($NEW_DIRECCION) and $NEW_DIRECCION !='')
			

		if($COMENTARIO_MONITOR !='')
			$data_h['COMENTARIO_MONITOR'] = $COMENTARIO_MONITOR;

		if($INFO_ADICIONAL !='')
			$data_h['INFO_ADICIONAL'] = $INFO_ADICIONAL;

		if(isset($ESTADO_H))
			$data_h['ESTADO_H'] = $ESTADO_H;

		$data_h['USUARIO'] = $this->input->post('USUARIO');
		$data_h['LLAVE_INFORMANTE'] = $this->input->post('LLAVE_INFORMANTE');
		//echo json_encode($data);
		$this->m_elps->guarda_encuesta($data_h,$data_per);
  }

	function guarda_noactualiza(){
	     
		$data = array();
		$data_per = array();
		$data['LLAVE_TEM_H'] =$this->input->post('LLAVE_TEM_H');
		$data['PQ_NOACTUALIZA'] = $this->input->post('PQ_NOACTUALIZA');
		$data['OTRO_ACTUALIZA'] = $this->input->post('OTRO_ACTUALIZA');
		$data['GRADO_RECHAZO'] = $this->input->post('GRADO_RECHAZO');
		$data['COMENTARIOS'] = $this->input->post('COMENTARIOS');
		$data['USUARIO'] = $this->input->post('USUARIO');
		$data_per['LLAVES_PER'] = $this->input->post('LLAVES_PER');
		$data_per['CTRLES_TELF1'] = $this->input->post('CONTROL_TELF1');
		$data_per['ctr_tels_f2'] = $this->input->post('ctr_telsf2');
		$data_per['ctr_tels_cel1'] = $this->input->post('ctr_tels_c1');
		$data_per['ctr_tels_cel2'] = $this->input->post('ctr_tels_c2');
		$data_per['ctr_tel1s_pc'] = $this->input->post('ctr_t1_pc');
		$data_per['ctr_tel2_pc'] = $this->input->post('ctr_t2_pc');
		$data_per['TOTAL_PER'] = $this->input->post('TOTAL_PER');
		//echo json_encode($data);
		$this->m_elps->guardar_norta($data,$data_per);

	}

	function agendar($llave_nh){//envia a la vista agenda
			        
			$data = array('llave_nh' => $llave_nh);
			$this->load->view('view_agenda',$data);
			//echo "<h3>".$llave_nh."</h3>";
	}

	function guarda_ag(){//recibe datos vista agenda y envia al modelo para guardas
		$data = array();
		
		$data['HOGAR'] =$this->input->post('llave_nh');
		$data['USUARIO'] = $this->input->post('user');
		$data['FECHA'] = $this->input->post('fecha');
		$data['HORA'] = $this->input->post('hora');
		$data['OBSERVACIONES'] = $this->input->post('obs');

		$this->m_elps->guardar_agenda($data);
		

	}
function logout()
 {
   $this->session->unset_userdata('ingreso');
   session_destroy();
   redirect('C_elps_lg', 'refresh');
 }

	function crear_h(){
		$nro_per=$this->input->post('total');
		$data = array();
		for ($i=0; $i < $nro_per ; $i++) { 
			$data["per".($i+1)] = $this->input->post("per".($i+1));
		}
		$data["orden_go"] = $this->input->post('orden_go');
		$data["hogar"] =  $this->input->post('hogar');
		$data["llave_nh"] =  $this->input->post('llave_nh');
		$data["total"] =  $this->input->post('total');
		$data["user"] = $this->input->post('user');
		$data["base_url"] = $this->input->post('base_url');
		$data["LLAVE_INFORMANTE"] = $this->input->post('llave_informante');
		//$this->m_elps->get_hogar
		 //$hogar["per"]=
		 $resultado=$this->m_elps->mcrear_h($data, 1);
		 echo json_encode($resultado);
//		echo "Se va a crear el hogar..".json_encode($data["per1"]);
		//echo "Se va a crear el hogar..".json_encode($hogar["per"]);
	}

	function vno_actualizan(){
		
		$datos['hno_actualizan'] = $this->m_elps->mget_norta();
		$tabla = '<table border="1">
		<tr><th>LLAVE_TEM_H</th>
		<th>PQ_NOACTUALIZA</th>
		<th>OTRO_ACTUALIZA</th>
		<th>GRADO_RECHAZO</th>
		<th>COMENTARIOS</th>
		<th>FECHA</th>
		<th>USUARIO</th></tr>';
		if(isset($datos['hno_actualizan']) and is_array($datos['hno_actualizan'])){
			foreach ($datos['hno_actualizan'] as $fila) 
				{
				$tabla.= '<tr>
				<th>'.$fila->LLAVE_TEM_H.'</th>
				<th>'.$fila->PQ_NOACTUALIZA.'</th>
				<th>'.$fila->OTRO_ACTUALIZA.'</th>
				<th>'.$fila->GRADO_RECHAZO.'</th>
				<th>'.$fila->COMENTARIOS.'</th>
				<th>'.$fila->FECHA.'</th>
				<th>'.$fila->USUARIO.'</th></tr>';
			   }
		}
   $tabla.='</table>';
		 //$path = base_url('hogares_elps2016.xls');
	$path = 'assets/hno_actualizan.xls';//para local
	$handle = fopen($path, 'w+');
	fwrite($handle, $tabla);
	fclose($handle);
	echo "<a href=".base_url('assets/hno_actualizan.xls').">Hogares No Actualizados</a>";
	}
/////////////////Genera excel con nuevos HOGARES
	function ver_hogares($caso)
	{
	$total=0;
	$session_data = $this->session->userdata('ingreso');
	$user = $session_data['usuario'];
	if ($caso=='nuevos'){//Nuevos
		$datos['nuevos_h'] = $this->m_elps->mconsultar('nuevos');
		$path = 'assets/hogares_nuevos'.$user.'2016.xls';
		echo "<a href=".base_url('assets/hogares_nuevos'.$user.'2016.xls').">Hogares Nuevos</a>";
	}
	if ($caso=='todos'){//Nuevos
		$datos['nuevos_h'] = $this->m_elps->mconsultar('todos');
		$path = 'assets/hogares_'.$user.'2016.xls';
		echo "<a href=".base_url('assets/hogares_'.$user.'2016.xls').">Todos los Hogares</a>";
	}
	if ($caso=='completos'){//Nuevos
		$datos['nuevos_h'] = $this->m_elps->mconsultar('completos');
		$path = 'assets/hogares_completos'.$user.'2016.xls';
		echo "<a href=".base_url('assets/hogares_completos'.$user.'2016.xls').">Hogares Completos</a>";
	}
	
	$tabla='<table border="1">
	<tr><th>LLAVE_NUEVO_H</th>
	<th>LLAVE_ANTIGUO_H</th>
	<th>FECHA</th>
	<th>Cod. Municipio</th>
	<th>DPTO</th>
	<th>MPIO</th>
	<th>CENTRO_P</th>
	<th>BARRIO_VRDA</th>
	<th>CLASE</th>
	<th>CORRIGE_DIRECCION</th>
	<th>ZONA_DIRECCION</th>
	<th>DIRECCION</th>
	<th>COMENTARIO_MONITOR</th>
	<th>USUARIO</th>
	<th>INFO_ADICIONAL</th>
	<th>ESTADO_H</th>
	<th>TIPO_DIR</th>
	<th>LLAVE_INFORMANTE</th></tr>';

if(isset($datos['nuevos_h']) and is_array($datos['nuevos_h'])){
	foreach ($datos['nuevos_h'] as $fila) 
	{
		
	$tabla.='<tr><th>'.$fila->LLAVE_NUEVO_H.'</th>
	<th>'.$fila->LLAVE_ANTIGUO_H.'</th>
	<th>'.$fila->FECHA.'</th>
	<th>'.$fila->P1.'</th>
	<th>'.$fila->NEW_DPTO.'</th>
	<th>'.$fila->NEW_MPIO.'</th>
	<th>'.$fila->NEW_CENTRO_P.'</th>
	<th>'.$fila->NEW_BARRIO_VRDA.'</th>
	<th>'.$fila->NEW_CLASE.'</th>
	<th>'.$fila->CORRIGE_DIRECCION.'</th>
	<th>'.$fila->ZONA_DIRECCION.'</th>
	<th>'.$fila->NEW_DIRECCION.'</th>
	<th>'.$fila->COMENTARIO_MONITOR.'</th>
	<th>'.$fila->USUARIO.'</th>
	<th>'.$fila->INFO_ADICIONAL.'</th>
	<th>'.$fila->ESTADO_H.'</th>
	<th>'.$fila->TIPO_DIR.'</th>
	<th>'.$fila->LLAVE_INFORMANTE.'</th></tr>';
	$total++;
   }
}
   $tabla.='</table>';
		 //$path = base_url('hogares_elps2016.xls');
		 //para local
		
		$handle = fopen($path, 'w+');
		//$content = $url;
		fwrite($handle, $tabla);
		fclose($handle);
		//echo "Total Nuevos del usuario :".$total.'<br>';
		
  }// FIN ver_nuevos

 
 
  function ver_personas($caso){
  		switch ($caso) {
  			
  			case 2:
  				$datos['personas'] = $this->m_elps->mconsultar('todas');
  				$this->load->view('view_repnuevos2',$datos);
  				break;
  			
  			default:
  				
  				break;
  		}
		

		//$url =  base_url('index.php/c_elps/ver_hogares');
		$tabla = '<table border="1">
		<tr><th>LLAVE_TEM_P</th>
		<th>LLAVE_TEM_H</th>
		<th>NOMBRE</th>
		<th>CORREO</th>
		<th>EDAD</th>
		<th>TEXTO_PARENTESCO</th>
		<th>TEXTO_TIPO_PERSONA</th>
		<th>INCONSISTENCIA_FECHA_N</th>
		<th>INCONSISTENCIA_SEXO</th>
		<th>INCONSISTENCIA_DI</th>
		<th>INCONSISTENCIA_TDOC</th>
		<th>SEXO_2012</th>
		<th>FECHA</th>
		<th>LLAVE_INFORMANTE</th>
		<th>DOCUMENTO</th>
		<th>TIPO_DOC</th>
		<th>SEXO</th>
		<th>F_NACIMIENTO</th>
		<th>PARENTESCO</th>
		<th>TEL_F1</th>
		<th>ESTADO_TELF1</th>
		<th>TEL_F2</th>
		<th>ESTADO_TELF2</th>
		<th>CEL1</th>
		<th>ESTADO_CEL1</th>
		<th>CEL2</th>
		<th>ESTADO_CEL2</th>
		<th>PCONTACTO</th>
		<th>ESTADO_CONTACTO</th>
		<th>TEL_PC1</th>
		<th>ESTADO_TELPC1</th>
		<th>TELEFONO_PC2</th>
		<th>ESTADO_TELPC2</th>
		<th>SE_FUE</th>
		<th>XQ_SE_FUE</th>
		<th>TEL_FIJO_SE_FUE</th>
		<th>CELULAR_SE_FUE</th>
		<th>INFO_SE_FUE</th>
		<th>SALIO_PAIS</th>
		<th>SE_IRA</th>
		<th>DONDE_IRA</th>
		<th>NOSABE_DONDE_IRA</th>
		<th>ESTADO_ACTUALIZACION</th>
		<th>LLAVE_NUEVO_H</th>
		<th>LLAVE_ANTIGUO_H</th>
		<th>FECHA</th>
		<th>Cod. Municipio</th>
		<th>DPTO</th>
		<th>MPIO</th>
		<th>CENTRO_P</th>
		<th>BARRIO_VRDA</th>
		<th>CLASE</th>
		<th>CORRIGE_DIRECCION</th>
		<th>ZONA_DIRECCION</th>
		<th>DIRECCION</th>
		<th>COMENTARIO_MONITOR</th>
		<th>INFO_ADICIONAL</th>
		<th>USUARIO</th>
		<th>ESTADO_H</th></tr>';


		
if(isset($datos['personas']) and is_array($datos['personas'])){
	foreach ($datos['personas'] as $fila) 
	{
		$tabla.= '<tr><th>'.$fila->LLAVE_TEM_P.'</th>
		<th>'.$fila->LLAVE_TEM_H.'</th>
		<th>'.$fila->NOMBRE.'</th>
		<th>'.$fila->CORREO.'</th>
		<th>'.$fila->EDAD.'</th>
		<th>'.$fila->TEXTO_PARENTESCO.'</th>
		<th>'.$fila->TEXTO_TIPO_PERSONA.'</th>
		<th>'.$fila->INCONSISTENCIA_FECHA_N.'</th>
		<th>'.$fila->INCONSISTENCIA_SEXO.'</th>
		<th>'.$fila->INCONSISTENCIA_DI.'</th>
		<th>'.$fila->INCONSISTENCIA_TDOC.'</th>
		<th>'.$fila->SEXO_2012.'</th>
		<th>'.$fila->FECHA.'</th>
		<th>'.$fila->LLAVE_INFORMANTE.'</th>
		<th>'.$fila->NEW_DOCUMENTO.'</th>
		<th>'.$fila->NEW_TIPO_DOC.'</th>
		<th>'.$fila->NEW_SEXO.'</th>
		<th>'.$fila->NEW_F_NACIMIENTO.'</th>
		<th>'.$fila->NEW_PARENTEZCO.'</th>
		<th>'.$fila->NEW_TEL_F1.'</th>
		<th>'.$fila->ESTADO_TELF1.'</th>
		<th>'.$fila->NEW_TEL_F2.'</th>
		<th>'.$fila->ESTADO_TELF2.'</th>
		<th>'.$fila->NEW_CEL1.'</th>
		<th>'.$fila->ESTADO_CEL1.'</th>
		<th>'.$fila->NEW_CEL2.'</th>
		<th>'.$fila->ESTADO_CEL2.'</th>
		<th>'.$fila->NEW_PCONTACTO.'</th>
		<th>'.$fila->ESTADO_CONTACTO.'</th>
		<th>'.$fila->NEW_TEL_PC1.'</th>
		<th>'.$fila->ESTADO_TELPC1.'</th>
		<th>'.$fila->TELEFONO_PC2.'</th>
		<th>'.$fila->ESTADO_TELPC2.'</th>
		<th>'.$fila->SE_FUE.'</th>
		<th>'.$fila->XQ_SE_FUE.'</th>
		<th>'.$fila->TEL_FIJO_SE_FUE.'</th>
		<th>'.$fila->CELULAR_SE_FUE.'</th>
		<th>'.$fila->INFO_SE_FUE.'</th>
		<th>'.$fila->SALIO_PAIS.'</th>
		<th>'.$fila->SE_IRA.'</th>
		<th>'.$fila->DONDE_IRA.'</th>
		<th>'.$fila->NOSABE_DONDE_IRA.'</th>
		<th>'.$fila->ESTADO_ACTUALIZACION.'</th>
		<th>'.$fila->LLAVE_NUEVO_H.'</th>
		<th>'.$fila->LLAVE_ANTIGUO_H.'</th>
		<th>'.$fila->FECHA.'</th>
		<th>'.$fila->P1.'</th>
		<th>'.$fila->NEW_DPTO.'</th>
		<th>'.$fila->NEW_MPIO.'</th>
		<th>'.$fila->NEW_CENTRO_P.'</th>
		<th>'.$fila->NEW_BARRIO_VRDA.'</th>
		<th>'.$fila->NEW_CLASE.'</th>
		<th>'.$fila->CORRIGE_DIRECCION.'</th>
		<th>'.$fila->ZONA_DIRECCION.'</th>
		<th>'.$fila->NEW_DIRECCION.'</th>
		
		<th>'.$fila->COMENTARIO_MONITOR.'</th>
		<th>'.$fila->INFO_ADICIONAL.'</th>
		<th>'.$fila->USUARIO.'</th>
		<th>'.$fila->ESTADO_H.'</th></tr>';

  }
}
   $tabla.='</table>';
		 //$path = base_url('hogares_elps2016.xls');
		 $path = 'assets/hogares_elps2016.xls';//para local
		
		$handle = fopen($path, 'w+');
		//$content = $url;
		fwrite($handle, $tabla);
		fclose($handle);
		echo "<a href=".base_url('assets/hogares_elps2016.xls').">Descargar</a>";
  }
		 
}

