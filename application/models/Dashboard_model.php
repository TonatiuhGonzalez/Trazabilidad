<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class dashboard_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	public function get_unidades_activas_reproduccion(){
		$this->db->select('*'); 
		$this->db->from('reproduccion as r');		
		$this->db->where('Rep_estado_logico !=',3);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_unidades_activas_crianza(){
		$this->db->select('*'); 
		$this->db->from('crianza as r');		
		$this->db->where('Cri_estado_logico !=',3);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_unidades_activas_engorda(){
		$this->db->select('*'); 
		$this->db->from('engorda as r');		
		$this->db->where('En_estado_logico !=',3);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_almacen_alimentario(){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('insumos_alimentarios as ia');		
		$this->db->join('detalle_proveedores_insumos_alimentarios as d','d.Id_insumo_alimentario=ia.Id_insumo_alimentario');		
		$this->db->join('socios as s','s.Id_socio=d.Id_socio');	
		$this->db->where('d.Pro_insu_estado_logico !=',0);		
		$this->db->where('d.Pro_insu_cantidad_total >',0);		
		$this->db->order_by('d.Pro_insu_fecha_recepcion', 'ASC');
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_almacen_medico(){
		$this->db->select('*'); 
        $this->db->from('insumos_medicos as im');
        $this->db->join('detalle_proveedores_insumos_medicos as d','im.Id_insumo_medico=d.Id_insumo_medico');
        $this->db->where('d.Pro_insu_medico_estado_logico !=',0);		
		$this->db->where('d.Pro_insu_medico_cantidad_total >',0);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	
	
	

}
