<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
	}
	public function get_usuario($correo){
		// $this->db->where('usu_nombre',$nombre); //nombre del campo que esta en la base de datos
		// $this->db->where('usu_contraseña',$clave);  //nombre de los campos que estan en la tabla de base de datos
		// $query = $this->db->get('usuarios'); //nombre de la tabla dentro de la base de datos 
		
		$this->db->select('*'); 
		$this->db->from('ingresos_y_egresos_usuarios as ie'); 
		$this->db->join('usuarios as u' ,  'u.Id_usuario=ie.Id_usuario');
		$this->db->join(' establecimientos es' ,  'es.Id_establecimiento=u.Id_establecimiento');
		$this->db->where('Usu_correo_electronico',$correo);
		$this->db->where('ie.Ie_fecha_baja',0000-00-00);
		$query=$this->db->get();

		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
		
	}


}
