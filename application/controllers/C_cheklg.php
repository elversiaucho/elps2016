<?php

class C_cheklg extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->model('m_elps');
 		//$this->load->helper('url');
	}	
	function index()
	{			
		
		$this->load->library('form_validation');
		
		$this->load->view("encabezado");
		
		$this->form_validation->set_rules('Usuario', 'Nombre de Usuario', 'trim|required');
   		$this->form_validation->set_rules('clave', 'Contraseña', 'trim|required|callback_verifica_user');
   		if($this->form_validation->run()==FALSE){
   			$this->load->view('view_login');
   		}
   		else {
   			$dato  = array('usuario' => set_value('Usuario') );

   			$this->load->view('elps_view',$dato);
   			
   		}
	}
	function verifica_user($clave){
		//echo "entro a verificar";
		$username = $this->input->post('Usuario');

		$result = $this->m_elps->login($username,$clave);
		if($result){
			$session = array();
			foreach ($result as $fila) {
				$session = array('usuario' =>$fila->USUARIO ,
				        'clave' => $fila->CLAVE,
				        'rol' => $fila->ROL
				        );
				$this->session->set_userdata('ingreso',$session);
				
			}
		return TRUE;
		}
		else {
			$this->form_validation->set_message('verifica_user','Usuario o clave invalido');
			return false;
		}
	}
	 
}

?>