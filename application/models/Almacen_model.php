<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class almacen_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	public function get_alimentos(){
		$this->db->select('*'); 
		$this->db->from('insumos_alimentarios as ia');
		$this->db->join('detalle_proveedores_insumos_alimentarios as d','ia.Id_insumo_alimentario=d.Id_insumo_alimentario');		
		$this->db->where('d.Pro_insu_estado_logico !=',0);		
		$this->db->where('d.Pro_insu_cantidad_total >',0);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_socios(){
		$this->db->select('*'); 
        $this->db->from('socios');
        $this->db->where('Soc_tipo',2);
        $this->db->where('Soc_estado_logico !=',0);
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_socios_medicos(){
		$this->db->select('*'); 
        $this->db->from('socios');
        $this->db->where('Soc_tipo',3);
        $this->db->where('Soc_estado_logico !=',0);
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_alimentos_archivados(){
		$this->db->select('*'); 
        $this->db->from('insumos_alimentarios as ia');
        $this->db->join('detalle_proveedores_insumos_alimentarios as d','d.Id_insumo_alimentario=ia.Id_insumo_alimentario');
        $this->db->join('socios as s','s.Id_socio=d.Id_socio');
        $this->db->where('d.Pro_insu_cantidad_total',0);
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_medicos_archivados(){
		$this->db->select('*'); 
        $this->db->from('insumos_medicos as ia');
        $this->db->join('detalle_proveedores_insumos_medicos as d','d.Id_insumo_medico=ia.Id_insumo_medico');
        $this->db->join('socios as s','s.Id_socio=d.Id_socio');
        $this->db->where('d.Pro_insu_medico_cantidad_total',0);
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function add_alimento($data,$socio,$fr,$cr,$pu,$ct){
		
		$this->db->insert("insumos_alimentarios",$data);
		$ultimoId = $this->db->insert_id();
		$data2=array(
			'Id_insumo_alimentario'=>$ultimoId,
			'Id_socio'=> $socio,
			'Pro_insu_fecha_recepcion'=> $fr,				
			'Pro_insu_cantidad_recibida'=> intval($cr),				
			'Pro_insu_precio_unitario'=> intval($pu),
			'Pro_insu_estado_logico'=> 1,					
			'Pro_insu_cantidad_total'=> $ct		

		);
		return $this->db->insert("detalle_proveedores_insumos_alimentarios",$data2);
	}
	public function add_medico($data,$socio,$fr,$cr,$pu,$ct){
		$this->db->insert("insumos_medicos",$data);
		$ultimoId = $this->db->insert_id();
		$data2=array(
			'Id_insumo_medico'=>$ultimoId,
			'Id_socio'=> $socio,
			'Pro_insu_medico_fecha_recepcion'=> $fr,				
			'Pro_insu_medico_cantidad_recibida'=> intval($cr),				
			'Pro_insu_medico_precio_unitario'=> intval($pu),		
			'Pro_insu_medico_estado_logico'=>1,		
			'Pro_insu_medico_cantidad_total'=> $ct		

		);
		return $this->db->insert("detalle_proveedores_insumos_medicos",$data2);
	}
	public function get_alimento($id){
		$this->db->select('*'); 
        $this->db->from('insumos_alimentarios as i');
        $this->db->join('detalle_proveedores_insumos_alimentarios as d','i.Id_insumo_alimentario=d.Id_insumo_alimentario');
        $this->db->join('socios as s','s.Id_socio=d.Id_socio');
        $this->db->where('i.Id_insumo_alimentario',$id);
        $query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
	}
	public function get_medico($id){
		$this->db->select('*'); 
        $this->db->from('insumos_medicos as i');
        $this->db->join('detalle_proveedores_insumos_medicos as d','i.Id_insumo_medico=d.Id_insumo_medico');
        $this->db->join('socios as s','s.Id_socio=d.Id_socio');
        $this->db->where('i.Id_insumo_medico',$id);
        $query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
	}
	public function get_medicos(){
		$this->db->select('*'); 
        $this->db->from('insumos_medicos as im');
        $this->db->join('detalle_proveedores_insumos_medicos as d','im.Id_insumo_medico=d.Id_insumo_medico');
        $this->db->where('d.Pro_insu_medico_estado_logico!=',0);		
		$this->db->where('d.Pro_insu_medico_cantidad_total>',0);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function update_alimento($data,$data2,$id){
		$this->db->where("Id_insumo_alimentario",$id);	
		$this->db->update("insumos_alimentarios",$data);		
		$this->db->where("Id_insumo_alimentario",$id);	
		$query=$this->db->update("detalle_proveedores_insumos_alimentarios",$data2);		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function update_medico($data,$data2,$id){
		$this->db->where("Id_insumo_medico",$id);	
		$this->db->update("insumos_medicos",$data);		
		$this->db->where("Id_insumo_medico",$id);	
		$query=$this->db->update("detalle_proveedores_insumos_medicos",$data2);		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	

}
