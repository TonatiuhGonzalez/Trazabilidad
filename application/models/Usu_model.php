<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class usu_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	
	public function getusuarios(){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('usuarios as u');
		$this->db->join('ingresos_y_egresos_usuarios as ie','u.Id_usuario=ie.Id_usuario');
		$this->db->where("u.Usu_estado_logico ",1);
		$this->db->where("ie.Ie_fecha_baja ",0000-00-00);
		$resultados=$this->db->get();
		return $resultados->result();

	}
	
	public function getestablecimiento(){
		
		$this->db->distinct(); 
		$this->db->select('d.Tipo_establecimiento,e.Est_nombre,u.Id_usuario,tu.Ie_tipo_usuario'); 
		$this->db->from('detalle_empresas_establecimientos as d'); 
		$this->db->join('establecimientos as e' ,  'e.Id_establecimiento=d.Id_establecimiento');
		$this->db->join('usuarios as u' ,  'u.Id_establecimiento=d.Id_establecimiento');
		$this->db->join('ingresos_y_egresos_usuarios as tu' ,  'tu.Id_usuario=u.Id_usuario');
		$this->db->where("u.Id_establecimiento",$this->session->userdata('id_establecimiento'));
		$this->db->where("u.Id_usuario",$this->session->userdata('id_usuario'));
		$this->db->where("tu.Ie_tipo_usuario",1);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
		

    }
    
    public function addusuarios($data,$tipo){
		$this->db->insert("usuarios",$data);
		$ultimoId = $this->db->insert_id();
		$ba=array(
			'Ie_fecha_alta'=>date('Y-m-d'),
			'Ie_fecha_baja'=>0,
			'Ie_tipo_usuario'=>intval($tipo),
			'Id_usuario'=>$ultimoId
		);
		return $this->db->insert("ingresos_y_egresos_usuarios",$ba);
			
	}

    public function eliusuarios($id_usuario,$id_ie){
		$this->db->where("id_ingreso_egreso",$id_ie);	
		$this->db->update("ingresos_y_egresos_usuarios",['Ie_fecha_baja'=>date('Y-m-d')]);
		$this->db->where("Id_usuario",$id_usuario);
		$query=$this->db->update("usuarios", ['Usu_estado_logico'=>0]);
		
		 if($query){
			return true;
		}else{
			return false;
		}
	}

	public function usuarios_inactivos(){
		
		$this->db->select('*');		
		$this->db->from('usuarios as u');
		$this->db->where("u.Id_establecimiento",$this->session->userdata('id_establecimiento'));
		$this->db->where("u.Usu_estado_logico",0);
		$query=$this->db->get();
		return $query->result();		

	}
	
	public function verinfo($id){
		$this->db->select('*'); 
		$this->db->from('usuarios as u');
		$this->db->join('ingresos_y_egresos_usuarios as ie','u.Id_usuario=ie.Id_usuario');
		$this->db->where("ie.Ie_fecha_baja ",0000-00-00);
		$this->db->where("u.Id_usuario",$id);		
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}

	}
	public function get_usuario($id){
		$this->db->select('*'); 
		$this->db->from('usuarios as u');
		$this->db->where("u.Id_usuario",$id);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}

	}
	

	public function histinfo($id){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('ingresos_y_egresos_usuarios');
		$this->db->where("Id_usuario",$id);
		$this->db->order_by('Ie_fecha_alta', 'ASC');
		$datos=$this->db->get();		
		return $datos->result();
		

	}

	public function editinfo($id,$datos,$tipo){
		
		$this->db->where("Id_usuario",$id);		
		$this->db->update("usuarios",$datos);

		$this->db->where("Id_usuario",$id);	
		$this->db->where("Ie_fecha_baja",0000-00-00);	
		$query=$this->db->update("ingresos_y_egresos_usuarios",['Ie_tipo_usuario'=>$tipo]);

		if($query){
			return true;
		}else{
			return false;
		}

	}
	public function update_c($id,$datos){
		
		$this->db->where("Id_usuario",$id);		
		$query=$this->db->update("usuarios",$datos);	

		if($query){
			return true;
		}else{
			return false;
		}

	}
	public function reactivar($id){
		$this->db->where("Id_usuario",$id);	
		$this->db->update("usuarios",['Usu_estado_logico'=>1]);
		$query=$this->db->insert("ingresos_y_egresos_usuarios",[
			'Id_usuario'=>$id,
			'Ie_tipo_usuario'=>3,
			'Ie_fecha_alta'=>date('Y-m-d')
		]);
		if($query){
			return true;
		}else{
			return false;
		}

	}
	
}
