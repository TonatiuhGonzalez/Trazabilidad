<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class socio_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	
	public function getsociosactivos(){
		$this->db->select('*'); 
        $this->db->from('socios');
		$this->db->where("Soc_estado_logico !=",0);
		// $this->db->where("Soc_tipo",1);
		$resultados=$this->db->get();
		return $resultados->result();
	}

	public function getpaises(){
		$this->db->select('*'); 
		$this->db->from('paises');
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function addsocio($data){
		return $this->db->insert("socios",$data);
	}
	public function getsocio($id){
		$this->db->select('*'); 
        $this->db->from('socios');
		$this->db->where("Id_socio",$id);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
	}
	public function editsocio($data,$id){
		
		$this->db->where("Id_socio",$id);
		$query=$this->db->update("socios",$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function elisocio($id){
		
		$this->db->where("Id_socio",$id);
		$query=$this->db->update("socios",["Soc_estado_logico"=>0]);
		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function getsociosinactivos(){
		
		$this->db->select('*'); 
        $this->db->from('socios');
		$this->db->where("Soc_estado_logico",0);
		// $this->db->where("Soc_tipo",1);
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function reactivarsocio($id){
		
		$this->db->where("Id_socio",$id);
		$query=$this->db->update("socios",["Soc_estado_logico"=>1]);
		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	
}
