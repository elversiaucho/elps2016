
<?php
if (!defined('BASEPATH')) 	 	exit('No direct script access allowed');
class M_elps extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

 

	function SaveForm($form_data,$tabla)
	{
		//$this->db->insert($tabla, $form_data);

		/*$CI = & get_instance();
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;*/
	}

	function mcrear_h($personas){
			$datos = array();
			date_default_timezone_set('UTC');
			//date('Y/m/d H:i:s');
			//echo date("Y/m/d");
		echo "PERSONAS DE HOGAR ORIGEN:".sizeof($personas)."</BR>";
		$llave_nh = substr($personas['hogar'],0,7)."5"."2".$personas['orden_go'];
		echo "llave nh: ".$llave_nh."</BR>"."Total personas del Hogar Nuevo: ".$personas["total"]."<br>";
		
		//array('LLAVE_TEM_P' => );
		$this->db->select('*');
		$this->db->from('SEGUIMIENTO_2016');
		$this->db->where('LLAVE_TEM_P', $personas['per1']);
		$consulta = $this->db->get();
		 if ($consulta->num_rows() > 0)
		     {
		      foreach ($consulta->result() as $fila){
		     	  //echo "se encontro : ".$fila->LLAVE_TEM_H;
		      }
		     	$datos["LLAVE_ANTIGUO_H"]= $fila->LLAVE_TEM_H;
		     	$datos["LLAVE_NUEVO_H"]= $llave_nh;
		       	$datos["P1"]= $fila->COD_DPTO.$fila->COD_MPIO;
		     	$datos["NEW_DPTO"]= $fila->DPTO;
		     	$datos["NEW_MPIO"] = $fila->MPIO;
		     	$datos["NEW_CENTRO_P"] = $fila->C_POBLADO;
		     	$datos["NEW_BARRIO_VRDA"] = $fila->BARRIO_VRDA;
		     	$datos["NEW_CLASE"] = $fila->CLASE;
		     	$datos["CORRIGE_DIRECCION"] = 0;
		     	$datos["ZONA_DIRECCION"] = '';
		     	$datos["NEW_DIRECCION"] = $fila->DIRECCION;
		     	$datos["COMPLEMENTO_DIRECCION"] = '';
		     	$datos["COMENTARIO_MONITOR"] = '';
		     	$datos["USUARIO"] = $personas["user"];
		     	$datos["INFO_ADICIONAL"]= '';
		     	
		     	//echo "Se va a crear el hogar..".$fila->LLAVE_TEM_H;
		     	//echo "Se encontraron  ".$consulta->num_rows();
				//return $consulta->result();			
			 }
		 else echo "El hogar no se encuentra para crear hogar!";

		 $this->db->set("FECHA", "TO_DATE('".date('Y/m/d H:i:s')."','YYYY/MM/DD HH24:MI:SS')",FALSE);
		 $query=$this->db->get_where('HOG_ACTUALIZADOS_2016',array('LLAVE_NUEVO_H' => $llave_nh));
	 	if ($query->num_rows() > 0 and isset($datos)){
	 		echo "<br>El hogar ". $llave_nh."Ya Exixte!!.. </br>";
	 		//exit();
			}
			else{
				if($this->db->insert('HOG_ACTUALIZADOS_2016',$datos))
				echo "Se inserto el hogar". $llave_nh."</br>";
				else
					echo "No se Creo el Hogar!!"."</br>";
				}
	//////////actualiza o inserta las personas del hogar
			
		for ($i=0; $i < $personas["total"]; $i++){
			$datos=null;
			$this->db->select('*');
			$this->db->from('SEGUIMIENTO_2016');
			$this->db->where('LLAVE_TEM_P', $personas["per".($i+1)]);
		    $consulta = $this->db->get();
			if($consulta->num_rows() > 0){//pasar los datos de la tabla insumo a la tabla actualización
				foreach ($consulta->result() as $fila)
	     	 			 //echo "Se pasaran la persona : ".$fila->LLAVE_TEM_P."</br>";
			$datos["LLAVE_TEM_P"] = $fila->LLAVE_TEM_P;
			$datos["LLAVE_TEM_H"] = $fila->LLAVE_TEM_H;
			$datos["LLAVE_INFORMANTE"] = '999';
			$datos["NEW_DOCUMENTO"] = $fila->ULTIMO_DOCUMENTO;
			$datos["NEW_TIPO_DOC"] = $fila->ULTIMO_TIPO_DOC;
			$datos["NEW_SEXO"] = $fila->SEXO_2015;
			$datos["NEW_F_NACIMIENTO"] = $fila->FECHA_N_2015;
			$datos["NEW_PARENTEZCO"] = $fila->PARENTESCO;
			$datos["NEW_TEL_F1"] = $fila->TEL_FIJO_1;
			$datos["ESTADO_TELF1"] = null;
			$datos["NEW_TEL_F2"] = $fila->TEL_FIJO_2;
			$datos["ESTADO_TELF2"] = null;
			$datos["NEW_CEL1"] = $fila->CELULAR_1;
			$datos["ESTADO_CEL1"] = null;
			$datos["NEW_CEL2"] = $fila->CELULAR_2;
			$datos["ESTADO_CEL2"] = null;
			$datos["NEW_PCONTACTO"] = $fila->P_CONTACTO_2015;
			$datos["ESTADO_CONTACTO"] = null;
			$datos["NEW_TEL_PC1"] = $fila->TEL_PC1;
			$datos["ESTADO_TELPC1"] = null;
			$datos["TELEFONO_PC2"] = $fila->CELULAR_PC1;
			$datos["ESTADO_TELPC2"] = null;
			$datos["SE_FUE"] = null;
			$datos["XQ_SE_FUE"] = null;
			$datos["TEL_FIJO_SE_FUE"] = null;
			$datos["CELULAR_SE_FUE"] = null;
			$datos["INFO_SE_FUE"] = '';
			$datos["SALIO_PAIS"] = '';
			$datos["SE_IRA"] = null;
			$datos["DONDE_IRA"] = null;
			$datos["NOSABE_DONDE_IRA"] = null;
			$datos["ESTADO_ACTUALIZACION"] = 0;
			$datos["LLAVE_NUEVO_H"] = $llave_nh;
		
			$this->db->set("FECHA", "TO_DATE('".date('Y/m/d H:i:s')."','YYYY/MM/DD HH24:MI:SS')",FALSE);
			$query=$this->db->get_where('PER_ACTULIZADAS2016',array('LLAVE_TEM_P' => $fila->LLAVE_TEM_P));
	 	if ($query->num_rows() > 0 and isset($datos)){
	 		echo "<br>La persona". $llave_nh."Ya Exixte!!.. </br>";
	 		exit();
			}
			else{
				if($this->db->insert('PER_ACTULIZADAS2016',$datos)){
					echo "Se inserto La persona".$fila->LLAVE_TEM_P."</br>";
					return true;
				}
				
				else
					echo "No se Creo la persona!!"."</br>";
				}
		}
				/*if ($query->num_rows() > 0 and isset($datos)){
	 		
	 		$this->db->where('LLAVE_NUEVO_H',$llave_nh);
	 		$this->db->update('HOG_ACTUALIZADOS_2016',$datos);
	 		echo "Se Actulizo el hogar: ". $llave_nh;
		 	
			}
			else{
				if($this->db->insert('HOG_ACTUALIZADOS_2016',$datos))
				//	if($this->db->insert('HOG_ACTUALIZADOS_2016'))
					echo "Se inserto el hogar". $llave_nh;//$this->db->affected_rows();
				else
					echo "No se Creo o actualizó el Hogar";
				}

		$this->db->select('*');//Verificando si ya se ha creado el registro.
		$this->db->from('PER_ACTULIZADAS2016');			
		for ($i=0; $i < $personas["total"]; $i++){
				$this->db->where('LLAVE_TEM_P', $personas["per".($i+1)]);
			}
				*/
		}
		    
		}

	function get_hogar($hogar = false){
		
if ($hogar === false){

			echo "voy a consulta el hogar:".$hogar;
	
		     }
		  else {
		  	/*se muesta las personas de hogar ingresado*/
		   $this->db->select('LLAVE_TEM_H,LLAVE_TEM_P,NOMBRE, CORREO,
		          EDAD, TEXTO_PARENTESCO, INCONSISTENCIA_FECHA_N, INCONSISTENCIA_SEXO, INCONSISTENCIA_DI, INCONSISTENCIA_TDOC, TEL_FIJO_1,
				TEL_FIJO_2, CELULAR_1, CELULAR_2,TIPO_PERSONA_ELPS, TEXTO_TIPO_PERSONA,P_CONTACTO,
				TEL_PC1, CELULAR_PC1, DPTO, MPIO, C_POBLADO,DIRECCION, BARRIO_VRDA,CLASE');
			   $this->db->from('SEGUIMIENTO_2016');
		   $this->db->where('LLAVE_TEM_H', $hogar);
		   $this->db->order_by("ORDEN_ENHOGAR", "ASC"); 
			  }
		   $consulta = $this->db->get();
		   if ($consulta->num_rows() > 0)
		     {
		     	//echo "Se encontraron  ".$consulta->num_rows();
				return $consulta->result();			
			 }
			else return false;
	   }
	}
?>