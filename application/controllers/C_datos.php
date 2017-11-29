<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();
class C_datos extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->config->set_item('language', 'spanish');
		$this->load->helper('url');
		$this->load->model('m_elps');
		$this->load->helper('mysql_to_excel_helper');
	}	
	function index()
	{			
	if($this->session->userdata('ingreso'))
	   {
	     $session_data = $this->session->userdata('ingreso');
	     $user['usuario'] = $session_data['usuario'];
	     
	     $this->load->view("encabezado");
	   	 $this->form_validation->set_rules("quien_rta","Eleccione una Persona.",'required');
	     $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
				
				$this->load->view('view_datos');
		}	
		else // passed validation proceed to post success logic
		{
			 //echo $data['usuario'];
			$form_data = array('quien_rta' => set_value('quien_rta'),
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
			else  $this->load->view('view_error');//echo "<h3>Hogar no encontrado</h3>";
	 		
		 }
		 $this->load->view('footer');
	    }
	  else
	   {
	    redirect('C_elps_lg', 'refresh');
	   }
	
	}
	function guarda_hogar(){
	     
		$data = array();
		$data['LLAVE_TEM_H'] =$this->input->post('LLAVE_TEM_H');
		$data['PQ_NOACTUALIZA'] = $this->input->post('PQ_NOACTUALIZA');
		$data['OTRO_ACTUALIZA'] = $this->input->post('OTRO_ACTUALIZA');
		$data['GRADO_RECHAZO'] = $this->input->post('GRADO_RECHAZO');
		$data['COMENTARIOS'] = $this->input->post('COMENTARIOS');
		$data['USUARIO'] = $this->input->post('USUARIO');
		//echo json_encode($data);
		$this->m_elps->guardar_noa($data);

	}
}
