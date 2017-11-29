<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class pruebamodel extends CI_Model {

		function __construct(){        
	    	parent::__construct();				    	
		}
		
		public function prueba(){
			$data = array();
			$sql = "SELECT id_tipo_acto_admin, nombre_acto_admin, firma, activo FROM gh_param_actos_admin ORDER BY nombre_acto_admin";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				$i = 0;
				foreach($query->result() as $row){
					$data[$i]["id_tipo"] = $row->ID_TIPO_ACTO_ADMIN;
					$data[$i]["nombre"] = $row->NOMBRE_ACTO_ADMIN;
					$data[$i]["firma"] = $row->FIRMA;
					$data[$i]["activo"] = $row->ACTIVO;
					$i++;
				}
			}
			$this->db->close();
			return $data;
		}
		
		public function pruebaSelect($cod){
			$data = array();
			$sql = "SELECT id_usuario, nom_usuario
					FROM gh_admin_usuarios
					WHERE rol_usuario = $cod";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				$i = 0;
				foreach($query->result() as $row){
					$data[$i]["id"] = $row->ID_USUARIO;
					$data[$i]["nombre"] = $row->NOM_USUARIO;					
					$i++;
				}
			}
			$this->db->close();
			return $data;
		}
		
		public function pruebaGrid(){
			$data = array();
			$sql = "SELECT * FROM gh_admin_usuarios";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				$i = 0;
				foreach($query->result() as $row){
					$data[$i]["id_usuario"] = $row->ID_USUARIO; 
					$data[$i]["num_ident"] = $row->NUM_IDENT; 
					$data[$i]["nom_usuario"] = $row->NOM_USUARIO; 
					$data[$i]["ape_usuario"] = $row->APE_USUARIO; 
					$data[$i]["tel_usuario"] = $row->TEL_USUARIO; 
					$data[$i]["ext_usuario"] = $row->EXT_USUARIO; 
					$data[$i]["mail_usuario"] = $row->MAIL_USUARIO; 
					$data[$i]["dep_usuario"] = $row->DEP_USUARIO; 
					$data[$i]["terr_usuario"] = $row->TERR_USUARIO; 
					$data[$i]["tipov_usuario"] = $row->TIPOV_USUARIO; 
					$data[$i]["log_usuario"] = $row->LOG_USUARIO; 
					$data[$i]["pas_usuario"] = $row->PAS_USUARIO; 
					$data[$i]["rol_usuario"] = $row->ROL_USUARIO;
					$i++;
				}
			}
			$this->db->close();
			return $data;
		}
		
	}