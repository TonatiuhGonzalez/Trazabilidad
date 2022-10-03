<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class establecimiento_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	public function get_establecimientos(){
				
		$this->db->select('*'); 
		$this->db->from('establecimientos as e');
		// $this->db->join('detalle_empresas_establecimientos as d','e.Id_establecimiento=d.Id_establecimiento');
		// $this->db->join('empresas as emp','emp.Id_empresa=d.Id_empresa');		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_establecimiento($id){
		$this->db->select('*'); 
		$this->db->from('establecimientos as e');
		$this->db->join('paises as p','p.Id_pais=e.Id_pais');	
		$this->db->where('e.Id_establecimiento',$id);	
		$resultados=$this->db->get();
		if($resultados->num_rows()>0){			
		return $resultados->row();
		}else{
			return false;
		}
	}
	public function get_tipos($id){
		$this->db->select('*'); 
		$this->db->from('detalle_empresas_establecimientos');	
		$this->db->where('Id_establecimiento',$id);	
		$this->db->where('Tipo_estado_logico', '1');
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function update_establecimiento($data,$id,$reproduccion, $crianza, $engorda, $tpv, $procesador, $tya, $cym){
		// hago una consulta dependiendo del establecimiento que selecciono el usuario
		$this->db->select('*');
		$this->db->from('detalle_empresas_establecimientos');
		$this->db->where('Id_establecimiento', $id);
		$d = $this->db->get();
		$resultados = $d->result();
		// var_dump($resultados);

		//hago un barrido de todos los registros para activar o desactivar segun sea el caso
		foreach ($resultados as $tipo) {
			switch ($tipo->Tipo_establecimiento) {
				case 1:

					if ($reproduccion == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($reproduccion == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 2:
					if ($crianza == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($crianza == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 3:
					if ($engorda == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($engorda == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 4:
					if ($tpv == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($tpv == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 5:
					if ($procesador == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($procesador == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 6:
					if ($tya == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($tya == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 7:
					if ($cym == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($cym == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
			}
		}

		$this->db->where('Id_establecimiento', $id);
		return $this->db->update('establecimientos', $data);
	}
	public function add_establecimiento($data,$reproduccion, $crianza, $engorda, $tpv, $procesador, $tya, $cym){
		// inserto el establecimiento 
		$this->db->insert("establecimientos", $data);
		$ultimoId = $this->db->insert_id();

		// registro todos los tipos de establecimiento en el detalle
		for ($i = 1; $i <= 7; $i++) {
			$this->db->insert("detalle_empresas_establecimientos", ['Tipo_establecimiento' => $i, 'Id_empresa' => 1, 'Id_establecimiento' => $ultimoId, 'Tipo_estado_logico' => 0]);
		}
		// hago una consulta dependiendo del establecimiento que se registro
		$this->db->select('*');
		$this->db->from('detalle_empresas_establecimientos');
		$this->db->where('Id_establecimiento', $ultimoId);
		$d = $this->db->get();
		$resultados = $d->result();
		// var_dump($resultados);

		//hago un barrido de todos los registros para activar o desactivar segun sea el caso
		foreach ($resultados as $tipo) {
			switch ($tipo->Tipo_establecimiento) {
				case 1:

					if ($reproduccion == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($reproduccion == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 2:
					if ($crianza == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($crianza == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 3:
					if ($engorda == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($engorda == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 4:
					if ($tpv == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($tpv == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 5:
					if ($procesador == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($procesador == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 6:
					if ($tya == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($tya == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
				case 7:
					if ($cym == '') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 0]);
					}
					if ($cym == '1') {
						$this->db->where('Id_detalle_empresa_establecimiento', $tipo->Id_detalle_empresa_establecimiento);
						$this->db->update('detalle_empresas_establecimientos', ['Tipo_estado_logico' => 1]);
					}
					break;
			}
		}
		return true;
	}
	

}
