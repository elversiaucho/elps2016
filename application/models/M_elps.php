
<?php
if (!defined('BASEPATH')) 	 	exit('No direct script access allowed');
class M_elps extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Bogota');
	}

function get_hogar2($hogar = false){
		
if ($hogar === false){

			echo "voy a consulta el hogar:".$hogar;
		     }
		  else {//Busca el hogar en la tabla HOG_ACTUALIZADOS_2016
			$this->db->select('P.LLAVE_NUEVO_H AS LLAVE_TEM_H, LLAVE_TEM_P,
				NEW_DPTO AS DPTO ,NEW_MPIO AS MPIO, NEW_CENTRO_P AS C_POBLADO,
				NEW_BARRIO_VRDA AS BARRIO_VRDA, NEW_DIRECCION AS DIRECCION,
				NEW_CLASE AS CLASE,NOMBRE, CORREO, EDAD, TEXTO_PARENTESCO, TEXTO_TIPO_PERSONA, INCONSISTENCIA_FECHA_N, INCONSISTENCIA_SEXO, 
				INCONSISTENCIA_DI, INCONSISTENCIA_TDOC, SEXO_2012,LLAVE_INFORMANTE, NEW_DOCUMENTO AS ULTIMO_DOCUMENTO, 
				NEW_TIPO_DOC AS ULTIMO_TIPO_DOC,NEW_SEXO AS ULTIMO_SEXO,NEW_TEL_PC1 AS TEL_PC1,NEW_F_NACIMIENTO AS FECHA_N_2015,
				NEW_PARENTEZCO AS PARENTESCO,NEW_TEL_F1 AS TEL_FIJO_1, NEW_TEL_F2 AS TEL_FIJO_2, NEW_CEL1 AS CELULAR_1,NEW_CEL2 AS CELULAR_2, 
				ESTADO_TELF1,NEW_TEL_PC1 AS TEL_PC1,TELEFONO_PC2 AS CELULAR_PC1,
				ESTADO_TELF2, ESTADO_CEL1, ESTADO_CEL2,NEW_PCONTACTO AS P_CONTACTO,ESTADO_CONTACTO,ESTADO_TELPC1,
				ESTADO_TELPC2, ESTADO_ACTUALIZACION, CONTROL_TELF1,
				CONTROL_TELF2,
				CONTROL_CEL1,
				CONTROL_CEL2,
				CONTROL_TELPC1,
				CONTROL_TELPC2, DONDE_IRA, COMENTARIO_MONITOR, INFO_ADICIONAL, ESTADO_H ');
			$this->db->from('HOG_ACTUALIZADOS_2016 H');
			$this->db->join('PER_ACTULIZADAS2016 P','H.LLAVE_NUEVO_H = P.LLAVE_NUEVO_H');
			$this->db->where('H.LLAVE_NUEVO_H', $hogar);
			$consulta = $this->db->get();
			if ($consulta->num_rows() > 0){
				return $consulta->result();
			}
			else {//consulta en la tabla SEGUIMIENTO_2016 y actualizar los datos que se van a modificar.
				 	/*se muesta las personas de hogar ingresado*/
				   $this->db->select('LLAVE_TEM_H,LLAVE_TEM_P,NOMBRE, CORREO,
				   	  		          EDAD, TEXTO_PARENTESCO, INCONSISTENCIA_FECHA_N,FECHA_N_2015,
				   	  		          INCONSISTENCIA_SEXO, SEXO_2015 AS ULTIMO_SEXO,SEXO_2012, INCONSISTENCIA_DI,
				   	  		          ULTIMO_DOCUMENTO, INCONSISTENCIA_TDOC, ULTIMO_TIPO_DOC, TEL_FIJO_1,
				   	  		          TEL_FIJO_2, CELULAR_1, CELULAR_2,TIPO_PERSONA_ELPS, TEXTO_TIPO_PERSONA,P_CONTACTO,
				   	  		          TEL_PC1, CELULAR_PC1, DPTO, MPIO, C_POBLADO,DIRECCION, BARRIO_VRDA,CLASE,0 AS CONTROL_TELF1,
										0 AS CONTROL_TELF2,
										0 AS CONTROL_CEL1,
										0 AS CONTROL_CEL2,
										0 AS CONTROL_TELPC1,
										0 AS CONTROL_TELPC2,
									    0 AS LLAVE_INFORMANTE');
					   $this->db->from('SEGUIMIENTO_2016');
				   $this->db->where('LLAVE_TEM_H', $hogar);
				   $this->db->order_by("ORDEN_ENHOGAR", "ASC"); 
					  }
				   $consulta = $this->db->get();
				   if ($consulta->num_rows() > 0)
				     {
				     	//echo "Se encontraron  ".$consulta->num_rows();
				     	$total_per = $consulta->num_rows();
				     	$familia['personas'] = $consulta->result();
				     	//pasar el hogar a la tablas de actualización
				         $data = array();
				         $session_data = $this->session->userdata('ingreso');
	     				 $user = $session_data['usuario'];
						$i=0;
						foreach ($familia['personas'] as $fila) {
							$data["per".(++$i)] = $fila->LLAVE_TEM_P;
						}
						$data["orden_go"] = 0;
						$data["hogar"] =  $hogar;
						$data["LLAVE_INFORMANTE"] = '';
						$data["total"] =  $total_per;
						$data["user"] = $user;
						$data["base_url"] = '';
						$this->m_elps->mcrear_h($data,2);	

						//$this->m_elps->get_hogar2($hogar);
						//return false;//$consulta->result();			
					 }
					else echo "No se encontro el Hogar a consultar";

			}
	  
	   }
function get_mpios_dpto($id_dpto){
	$this->db->select('MPIO, ID_MPIO');
	$this->db->from('DIVPOLA');
	$this->db->where('ID_DPTO',$id_dpto);
	$result=$this->db->get();
	if ($result->num_rows()>0){
		return $result->result();
	}
	else echo error_log("Fallo consulta");

	return false;
}
function mcrear_h($personas,$caso){//caso se crea uno nuevo o simplemente se pasa
		$rta=array();
		$datos = array();
		if ($caso == 1)// Hogar nuevo
			$llave_nh = substr($personas['hogar'],0,7)."5"."2".$personas['orden_go'];
		else //otro caso diferente de 1 se pasan todas las personas del hogar original
			$llave_nh = $personas['hogar'];
			//es la misma llave 
		  //$rta[0] = "Total Personas del Hogar Nuevo: ".$personas["total"];

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
		     	//$datos["FECHA"] = date('Y/m/d');
		       	$datos["P1"]= $fila->COD_DPTO.$fila->COD_MPIO;
		     	$datos["NEW_DPTO"]= $fila->DPTO;
		     	$datos["NEW_MPIO"] = $fila->MPIO;
		     	$datos["NEW_CENTRO_P"] = $fila->C_POBLADO;
		     	$datos["NEW_BARRIO_VRDA"] = $fila->BARRIO_VRDA;
		     	$datos["NEW_CLASE"] = $fila->CLASE;
		     	$datos["CORRIGE_DIRECCION"] = 0;
		     	$datos["ZONA_DIRECCION"] = '';
		     	$datos["NEW_DIRECCION"] = $fila->DIRECCION;
		     	//$datos["COMPLEMENTO_DIRECCION"] = '';
		     	$datos["COMENTARIO_MONITOR"] = '';
		     	$datos["USUARIO"] = $personas["user"];
		     	$datos["INFO_ADICIONAL"]= '';
		     	$datos["LLAVE_INFORMANTE"] = $personas["LLAVE_INFORMANTE"];
		     	//echo "Se va a crear el hogar..".$fila->LLAVE_TEM_H;
		     	//echo "Se encontraron  ".$consulta->num_rows();
				//return $consulta->result();			
			 }
		 else $rta[0] = "El hogar-- ".$llave_nh." -- no se encuentra para crear!";

		 $this->db->set("FECHA", "TO_DATE('".date('Y/m/d H:i:s')."','YYYY/MM/DD HH24:MI:SS')",FALSE);
		 //$this->db->set("FECHA", "TO_DATE('".date('Y/m/d')."','YYYY/MM/DD')",FALSE);
		 $query=$this->db->get_where('HOG_ACTUALIZADOS_2016',array('LLAVE_NUEVO_H' => $llave_nh));
	 	if ($query->num_rows() > 0 and isset($datos)){
	 		//echo "<br>El hogar ". $llave_nh."Ya Exixte!!.. </br>";
	 		$this->db->where(array('LLAVE_NUEVO_H' => $llave_nh));
	 		$this->db->update("HOG_ACTUALIZADOS_2016",$datos);
	 		if ($this->db->affected_rows() == '1')
				{
					$rta[3] ="Se actualizaron los datos del Hogar".$llave_nh;
				}
	 		//exit();
			}
			else{
				if($this->db->insert('HOG_ACTUALIZADOS_2016',$datos))
					$rta[4] = "Se CREO el hogar ". $llave_nh;
				else
					$rta[5] = "No se Creo el Hogar!!";
				}
	//////////actualiza o ins$rta['ms1']  las personas del hogar
		for ($i=0; $i < $personas["total"]; $i++){
			$datos=null;
			$this->db->select('*');
			$this->db->from('SEGUIMIENTO_2016');
			$this->db->where('LLAVE_TEM_P', $personas["per".($i+1)]);
		    $consulta = $this->db->get();
			if($consulta->num_rows() > 0){//pasar los datos de la tabla insumo a la tabla actualización
				foreach ($consulta->result() as $fila)
	     	 			 //"Se pasaran la persona : ".$fila->LLAVE_TEM_P."</br>";
			$datos["LLAVE_TEM_P"] = $fila->LLAVE_TEM_P;
			$datos["LLAVE_TEM_H"] = $fila->LLAVE_TEM_H;
			$datos["NOMBRE"] = $fila->NOMBRE;
			$datos["CORREO"] = $fila->CORREO;
			$datos["EDAD"] = $fila->EDAD;
			$datos["TEXTO_PARENTESCO"] = $fila->TEXTO_PARENTESCO;
			$datos["TEXTO_TIPO_PERSONA"] = $fila->TEXTO_TIPO_PERSONA;
			$datos["INCONSISTENCIA_FECHA_N"] = $fila->INCONSISTENCIA_FECHA_N;
			$datos["INCONSISTENCIA_SEXO"] = $fila->INCONSISTENCIA_SEXO;
			$datos["INCONSISTENCIA_DI"] = $fila->INCONSISTENCIA_DI;
			$datos["INCONSISTENCIA_TDOC"] = $fila->INCONSISTENCIA_TDOC;
			$datos["SEXO_2012"] = $fila->SEXO_2012;
			//$datos["FECHA"] = date('Y/m/d');
			
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
			$datos["NEW_PCONTACTO"] = $fila->P_CONTACTO;
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
	 		//se actualiza la llave del hogar nuevo..
	 		$this->db->where(array('LLAVE_TEM_P' => $fila->LLAVE_TEM_P));
	 		$this->db->update('PER_ACTULIZADAS2016',array('LLAVE_NUEVO_H' =>$llave_nh));
	 		if ($this->db->affected_rows() == '1')
					{
						//$rta[6] = "Se ha actualizado!! LA LLAVE".$fila->LLAVE_TEM_P;
					}
	 		//"<br>La persona ".$fila->LLAVE_TEM_P." Ya Exixte!!.. </br>";
	 		//exit();
			}
			else{
				if($this->db->insert('PER_ACTULIZADAS2016',$datos)){
					//$rta[7] = "Se inserto La persona ".$fila->LLAVE_TEM_P;
					//return true;
				}
				
				else
					$rta[8] = "No se Creo la persona!!";
				}
			}
		}
		return $rta;
	}

   function guarda_encuesta($data_h,$data_per){

   	$total_per = $data_per['TOTAL_PER'];
   	$datos = array();
		
   	//echo json_encode($data_per);
   	//echo "Total campos: ".count($data_h).'TP '.$total_per;
   	$result= $this->db->get_where('HOG_ACTUALIZADOS_2016',array('LLAVE_NUEVO_H' => $data_h['LLAVE_NUEVO_H']));
   	if($result->num_rows()>0)	
   	{
   		//if (count($data_h)>2){
	   		$this->db->where(array('LLAVE_NUEVO_H' =>  $data_h['LLAVE_NUEVO_H']));
	   		$this->db->update('HOG_ACTUALIZADOS_2016',$data_h);
	   		if($this->db->affected_rows()==1){
	   			echo "<h3>Se actualizó la información del hogar!!</h3>";
	   	//	}
   		//else echo "Fallo Actualización!!";
   		}
   		else "No ha ingresado Información para actualizar en el hogar!";

///////Bloque actualizacipon de personas/////////////-----------////////
	for ($i=0; $i < $total_per ; $i++) {
		 $datos = array();
			//control de telefonos
		$datos["CONTROL_TELF1"] = $data_per['CTRLES_TELF1'][$i];
		$datos["CONTROL_TELF2"] = $data_per['ctr_tels_f2'][$i];
		$datos["CONTROL_CEL1"] = $data_per['ctr_tels_cel1'][$i];
		$datos["CONTROL_CEL2"] = $data_per['ctr_tels_cel2'][$i];
		$datos["CONTROL_TELPC1"] = $data_per['ctr_tel1s_pc'][$i];
		$datos["CONTROL_TELPC2"] = $data_per['ctr_tel2_pc'][$i];
		if($data_per['inconsistencia_di'][$i] > 1){
		       $datos['INCONSISTENCIA_DI'] = $data_per['inconsistencia_di'][$i];
		       $datos['NEW_DOCUMENTO'] = $data_per['new_documento'][$i];
		   }
		
		if($data_per['inconsistencia_tdoc'][$i] > 1){
			$datos['INCONSISTENCIA_TDOC'] = $data_per['inconsistencia_tdoc'][$i];
			$datos['NEW_TIPO_DOC'] = $data_per['new_tipo_doc'][$i];
		}
		if($data_per['inconsistencia_fecha_n'][$i] > 1){
			$date = new DateTime($data_per['new_f_nacimiento'][$i]);
			$fech = $date->format('d/m/Y');
			$datos['INCONSISTENCIA_FECHA_N'] = $data_per['inconsistencia_fecha_n'][$i];
			$datos['NEW_F_NACIMIENTO'] = $fech;
		}
		if($data_per['inconsistencia_sexo'][$i] > 1){
			$datos['INCONSISTENCIA_SEXO'] = $data_per['inconsistencia_sexo'][$i];
			$datos['NEW_SEXO'] = $data_per['new_sexo'][$i];
		}
	

		if ($data_per['xq_se_fue'][$i] != ''){

			$datos['XQ_SE_FUE'] = $data_per['xq_se_fue'][$i];
			if($data_per['xq_se_fue'][$i]==2)
				{
				$data_per['SE_FUE'] = 1;
				if ($data_per['indicativo_sefue'][$i] != '')
					$datos['INDICATIVO_SEFUE'] = $data_per['indicativo_sefue'][$i];
				if($data_per['tel_fijo_se_fue'][$i]!= '')
					$datos['TEL_FIJO_SE_FUE'] = $data_per['tel_fijo_se_fue'][$i];
				if($data_per['celular_se_fue'][$i]!= '')
					$datos['CELULAR_SE_FUE'] = $data_per['celular_se_fue'][$i];
				if($data_per['info_se_fue'][$i]!= '')
					$datos['INFO_SE_FUE'] = $data_per['info_se_fue'][$i];
			}
			if ($data_per['xq_se_fue'][$i]==3){
				//if($data_per['salio_pais'][$i]!= '')
					$datos['SALIO_PAIS'] = $data_per['salio_pais'][$i];
			}
			if ($data_per['xq_se_fue'][$i]==7)
				$datos['INFO_SE_FUE'] = $data_per['info_se_fue'][$i];

		}

		$datos['ESTADO_ACTUALIZACION'] = $data_per['estado_per'][$i];
		//if (isset($data_per['estado_telf1'][$i]) && ($data_per['estado_telf1'][$i]=='3' || $data_per['estado_telf1'][$i]=='1') )
		$datos['NEW_TEL_F1'] = $data_per['new_tel_f1'][$i];

	   $datos['NEW_TEL_F2'] = $data_per['new_tel_f2'][$i];
	   $datos['NEW_CEL1'] = $data_per['new_cel1'][$i];
	   $datos['NEW_CEL2'] = $data_per['new_cel2'][$i];
	   $datos['NEW_PCONTACTO'] = $data_per['new_pcontacto'][$i];
	   $datos['NEW_TEL_PC1'] = $data_per['new_tel_pc1'][$i];
	   $datos['TELEFONO_PC2'] = $data_per['telefono_pc2'][$i];
	   $datos['ESTADO_CONTACTO'] = $data_per['estado_contacto'][$i];
	   $datos['ESTADO_TELF1'] = $data_per['estado_telf1'][$i];
	   $datos['ESTADO_TELF2'] = $data_per['estado_telf2'][$i];
	   $datos['ESTADO_CEL1'] = $data_per['estado_cel1'][$i];
	   $datos['ESTADO_CEL2'] = $data_per['estado_cel2'][$i];
	   $datos['ESTADO_TELPC1'] = $data_per['estado_telpc1'][$i];
	   $datos['ESTADO_TELPC2'] = $data_per['estado_telpc2'][$i];
	   $datos['SE_IRA'] = $data_per['se_ira'][$i];
	   $datos['DONDE_IRA'] = $data_per['donde_ira'][$i];
 	   $datos['NOSABE_DONDE_IRA'] = $data_per['nosabe_donde_ira'][$i];

		$query=$this->db->get_where('PER_ACTULIZADAS2016',array('LLAVE_TEM_P' => $data_per['LLAVES_PER'][($i+1)]));

		if ($query->num_rows() == 0){// Se inserta en el hogar y personas en las tablas respectivas y actualiza
 				
 				$data = array();
				for ($i=0; $i < $total_per; $i++) { 
					$data["per".($i+1)] = $data_per['LLAVES_PER'][$i+1];
				}
				$data["orden_go"] = 0;
				$data["hogar"] =  $data_h['LLAVE_TEM_H'];
				//$data["llave_nh"] = 0;
				$data["total"] =  $total_per;
				$data["user"] = $data_h['USUARIO'];
				$data["base_url"] = '';
				$this->m_elps->mcrear_h($data, 2);//caso agreegar todo el hogar original
				$query=$this->db->get_where('PER_ACTULIZADAS2016',array('LLAVE_TEM_P' => $data_per['LLAVES_PER'][($i+1)]));
 			}
 			
 		if ($query->num_rows() > 0){
 				$this->db->set("FECHA", "TO_DATE('".date('Y/m/d H:i:s')."','YYYY/MM/DD HH24:MI:SS')",FALSE);
 				$this->db->where(array('LLAVE_TEM_P' => $data_per['LLAVES_PER'][($i+1)]));
 				$this->db->update('PER_ACTULIZADAS2016',$datos);
 				//echo "Se actualizó El control de teléfonos! para:". $data_per['LLAVES_PER'][($i+1)];
 			if ($this->db->affected_rows() == 1)
					{
						//echo "Se actualizó El control de teléfonos de ".$data_per['LLAVES_PER'][($i+1)];
			}
 			}
 			else "Error Al intentar Actualizar el Hogar";
 		}
//----------------------------///

   	}
	else echo "Verificar que el hogar Exista en las tablas a actualizar";

   }

	function   guardar_norta($info, $data_per){
	  	
	  	$total_per = $data_per['TOTAL_PER'];
	  	//echo json_encode($data_per['LLAVES_PER'][1]."Info personas:".$info);
	  	//echo json_encode($info);
	  	//echo $total_per." Controles telf1:".$data_per['CTRLES_TELF1'];
	  	/*echo "TEls f1".json_encode($data_per['CTRLES_TELF1'])."<br/>"; 
		echo "TEls f2".json_encode($data_per['ctr_tels_f2'])."<br/>"; 
		echo "TEls cel1".json_encode($data_per['ctr_tels_cel1'])."<br/>";
		echo "TEls cel2".json_encode($data_per['ctr_tels_cel2'])."<br/>";
		echo "TEls t1pc".json_encode($data_per['ctr_tel1s_pc'])."<br/>";
		echo "TEls t2pc".json_encode($data_per['ctr_tel2_pc'])."<br/>";*/
		$datos = array();
		
		//---- Actualización o insert del hogar desde la tabla SEGUIMIENTO_ELPS2016 
	/*$query=$this->db->get_where('HOG_ACTUALIZADOS_2016',array('LLAVE_NUEVO_H' => $info['LLAVE_TEM_H']));
	if ($query->num_rows() > 0){
	 	  echo "<br><h3>Al Hogar! ". $info['LLAVE_TEM_H']." Solo hay que actualizar los Controles a las personas.!!.. </h3></br>";
		}*/
	
		for ($i=0; $i < $total_per ; $i++) {// Actualizar el control de los teléfonos en la tabla per_actualizada2016  
			$datos["CONTROL_TELF1"] = $data_per['CTRLES_TELF1'][$i];
			$datos["CONTROL_TELF2"] = $data_per['ctr_tels_f2'][$i];
	        $datos["CONTROL_CEL1"] = $data_per['ctr_tels_cel1'][$i];
			$datos["CONTROL_CEL2"] = $data_per['ctr_tels_cel2'][$i];
			$datos["CONTROL_TELPC1"] = $data_per['ctr_tel1s_pc'][$i];
			$datos["CONTROL_TELPC2"] = $data_per['ctr_tel2_pc'][$i];

 			$query=$this->db->get_where('PER_ACTULIZADAS2016',array('LLAVE_TEM_P' => $data_per['LLAVES_PER'][($i+1)]));

 			if ($query->num_rows() == 0){// Se inserta en el hogar y personas en las tablas respectivas y actualiza
 				
 				$data = array();
				for ($i=0; $i < $total_per; $i++) { 
					$data["per".($i+1)] = $data_per['LLAVES_PER'][$i+1];
				}
				$data["orden_go"] = 0;
				$data["hogar"] =  $info['LLAVE_TEM_H'];
				//$data["llave_nh"] = 0;
				$data["total"] =  $total_per;
				$data["user"] = $info['USUARIO'];
				$data["base_url"] = '';
				$this->m_elps->mcrear_h($data, 2);//caso agreegar todo el hogar original
				$query=$this->db->get_where('PER_ACTULIZADAS2016',array('LLAVE_TEM_P' => $data_per['LLAVES_PER'][($i+1)]));
 			}
 			
 			if ($query->num_rows() > 0){
 				$this->db->set("FECHA", "TO_DATE('".date('Y/m/d H:i:s')."','YYYY/MM/DD HH24:MI:SS')",FALSE);
 				$this->db->where(array('LLAVE_TEM_P' => $data_per['LLAVES_PER'][($i+1)]));
 				$this->db->update('PER_ACTULIZADAS2016',$datos);
 				/*if ($this->db->affected_rows() == '1')
					{
						echo "Se actualizó El control de teléfonos de ".$data_per['LLAVES_PER'][($i+1)];
					}*/
 			}
 			else "Error Al intentar Crear o Actualizar el Hogar";
 		}


/*/* Inserta y actauliza el hogar que no responde*/
		$this->db->set("FECHA", "TO_DATE('".date('Y/m/d H:i:s')."','YYYY/MM/DD HH24:MI:SS')",FALSE);
		$query=$this->db->get_where('HOG_NO_ACTUALIZADOS',array('LLAVE_TEM_H' => $info['LLAVE_TEM_H']));
	 	if ($query->num_rows() > 0){
	 		$this->db->where(array('LLAVE_TEM_H' => $info['LLAVE_TEM_H']));
	 		//unset($info['LLAVE_TEM_H']);
	 		$this->db->update('HOG_NO_ACTUALIZADOS',$info);

	 		echo "<h3>El Hogar! ". $info['LLAVE_TEM_H']." Se agregó a no actualizados!!.. </h3></br>";
		}
		else{
			if($this->db->insert('HOG_NO_ACTUALIZADOS',$info)){
				//echo json_encode($info);
				echo "Se Guardo la informacion del Hogar <h4>". $info['LLAVE_TEM_H']." en No actualizados!!</h4></br>";
			}
		else
			echo "NO! se guardo la informacion del Hogar !!"."</br>";
	
		}

	}
	function mget_norta(){
		
			$session_data = $this->session->userdata('ingreso');
	     	$user = $session_data['usuario'];
	     	$rol = $session_data['rol'];
	     	if ($rol == 1)
			     $consulta = $this->db->get('HOG_NO_ACTUALIZADOS');
			 else
			 	$consulta = $this->db->get_where('HOG_NO_ACTUALIZADOS', array('USUARIO' => $user));
			if ($consulta->num_rows() > 0){
				return $consulta->result();
			}
			else {
				return false;
		}


	}
	//-----------------------------------------
	function mconsultar($caso){
		//echo "Listar hogares nuevos";
		$session_data = $this->session->userdata('ingreso');
	    $user = $session_data['usuario'];
	    $rol = $session_data['rol'];
		switch ($caso) {
			case 'completos':
				$this->db->select('*');
				$this->db->from('HOG_ACTUALIZADOS_2016 H');
				if($rol==2)
				  $this->db->where('USUARIO',$user);
				$this->db->where('ESTADO_H',1);
				$consulta = $this->db->get();
				if ($consulta->num_rows() > 0){
					return $consulta->result();
				}
				else 
					return false;
				break;
////////////////////////////////
			case 'todos':
				$this->db->select('*');
				$this->db->from('HOG_ACTUALIZADOS_2016 H');
				if($rol==2)
				  $this->db->where('USUARIO',$user);
				
				$consulta = $this->db->get();
				if ($consulta->num_rows() > 0){
					return $consulta->result();
				}
				else 
					return false;
				break;
		////////////////////////////		
			case 'nuevos':
				$this->db->select('*');
				$this->db->from('HOG_ACTUALIZADOS_2016 H');
				if($rol==2)
				  $this->db->where('USUARIO',$user);
				$this->db->where('SUBSTR(H.LLAVE_NUEVO_H,8,1)',5);
				//$this->db->join('PER_ACTULIZADAS2016 P','H.LLAVE_NUEVO_H = P.LLAVE_NUEVO_H and SUBSTR(H.LLAVE_NUEVO_H,8,1)=5');// 
				//$this->db->group_by('H.LLAVE_NUEVO_H');
				$consulta = $this->db->get();
				if ($consulta->num_rows() > 0){
					return $consulta->result();
				}
				else 
					return false;
				break;
			/////////////////----------------
			case 'todas':
				$this->db->select('*');
				$this->db->from('HOG_ACTUALIZADOS_2016 H');
				if($rol==2)
				  $this->db->where('USUARIO',$user);
				$this->db->join('PER_ACTULIZADAS2016 P','H.LLAVE_NUEVO_H = P.LLAVE_NUEVO_H');// 
				$this->db->order_by('H.FECHA','DESC');
				//$this->db->where('SUBSTR (H.LLAVE_NUEVO_H,8,1)', '5');
				$consulta = $this->db->get();
				if ($consulta->num_rows() > 0){
					return $consulta->result();
				}
				else 
					return false;
			break;
			
			default:
				# code...
				break;
		}
			
	}

	function mget_agenda(){
		//echo "Listar hogares nuevos";
			/*$this->db->select('*');
			$this->db->from('AGENDA_SEG2016');
			$this->db->join('PER_ACTULIZADAS2016 P','H.LLAVE_NUEVO_H = P.LLAVE_NUEVO_H AND SUBSTR (H.LLAVE_NUEVO_H,8,1)=5');
			//$this->db->where('SUBSTR (H.LLAVE_NUEVO_H,8,1)', '5');*/
			$session_data = $this->session->userdata('ingreso');
	     	$user = $session_data['usuario'];
	     	$rol = $session_data['rol'];
	     	if ($rol == 1)
			     $consulta = $this->db->get('AGENDA_SEG2016');
			 else
			 	$consulta = $this->db->get_where('AGENDA_SEG2016', array('USUARIO' => $user));
			if ($consulta->num_rows() > 0){
				return $consulta->result();
			}
			else {
				return false;
		}
	}
	// --------------------------------------------------------------------
	function guardar_agenda($agenda){
		
		
		$query=$this->db->get_where('HOG_ACTUALIZADOS_2016',array('LLAVE_NUEVO_H' => $agenda['HOGAR']));
		//$query=$this->db->get_where('SEGUIMIENTO_2016',array('LLAVE_TEM_H' => $agenda['HOGAR']));
		if($query->num_rows() == 0){
			//$this->db->select('')
			$this->db->select('LLAVE_TEM_P');
			$this->db->from('SEGUIMIENTO_2016');
			$this->db->where('LLAVE_TEM_H', $agenda['HOGAR']);
			$query = $this->db->get();
			
			//echo $this->db->count_all_results();
			
			$familia['personas'] =$query->result();
			echo json_encode($familia).count($familia['personas']);
			$total_per = count($familia['personas']);

			$data = array();
			$i=0;
			foreach ($familia['personas'] as $fila) {
				$data["per".(++$i)] = $fila->LLAVE_TEM_P;
				# code...
			}
			$data["orden_go"] = 0;
			$data["hogar"] =  $agenda['HOGAR'];
			//$data["llave_nh"] = 0;
			$data["total"] =  $total_per;
			$data["user"] = $agenda['USUARIO'];
			$data["base_url"] = '';
			$this->m_elps->mcrear_h($data,2);	

		}
		

		else{
			$query=$this->db->get_where('AGENDA_SEG2016',array('HOGAR' => $agenda['HOGAR']));
			if ($query->num_rows() > 0){
		 		//unset($agenda['HOGAR']);
		 		//echo "<br>El hogar ". $agenda['HOGAR']."Ya Tiene Agenda!!.. </br>";
		 		$this->db->where(array('HOGAR' => $agenda['HOGAR']));
		 		$this->db->update('AGENDA_SEG2016',$agenda);
		 		if($this->db->affected_rows()==1){
		 			echo "<b>Se actualizó la Agenda del hogar".$agenda['HOGAR']."</b>";
		 	  	}
		 	  }
			  else{
				if($this->db->insert('AGENDA_SEG2016',$agenda))
					echo "Se Agendo el hogar<h4>". $agenda['HOGAR']."</h4></br>";

				else
					echo "No se Agendo el Hogar!!"."</br>";
				}
	
		}
	}



function get_hogar($hogar = false){
		
if ($hogar === false){

			echo "voy a consulta el hogar:".$hogar;
		     }
		  else {
			$this->db->select('*');
			$this->db->from('HOG_ACTUALIZADOS_2016');
			$this->db->where('LLAVE_NUEVO_H', $hogar);
			$consulta = $this->db->get();
			if ($consulta->num_rows() > 0){
				echo "Se encontro el Hogar".$hogar;
				return $consulta->result();
			}
		  	/*se muesta las personas de hogar ingresado*/
		   $this->db->select('LLAVE_TEM_H,LLAVE_TEM_P,NOMBRE, CORREO,
		          EDAD, TEXTO_PARENTESCO, INCONSISTENCIA_FECHA_N,FECHA_N_2015,FECHA_N_2012, INCONSISTENCIA_SEXO, SEXO_2015 AS ULTIMO_SEXO,SEXO_2012, INCONSISTENCIA_DI, ULTIMO_DOCUMENTO, INCONSISTENCIA_TDOC, ULTIMO_TIPO_DOC, TEL_FIJO_1,
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
	   //----------------------------
    function login($user,$pw){
    	//echo "llego al buscar usuario";
		$this->db->select('USUARIO, NOMBRE, CLAVE, ROL');
		$this->db->FROM('USER_SEG_2016');
		$this->db->WHERE('USUARIO',$user);
		$this->db->WHERE('CLAVE', $pw); #MD5($password)
		$query = $this->db->get();
		if($query-> num_rows()==1){
			return $query->result();
		}
		else {
			return false;
		}
    }

 

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
	}

?>