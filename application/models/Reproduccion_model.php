<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class reproduccion_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	public function get_unidades_activas_comerciales(){
		$this->db->select('*'); 
		$this->db->from('reproduccion as r');
		$this->db->join('tanques as t','r.Id_tanque=t.Id_tanque');		
		$this->db->join('especies as e','e.Id_especie=r.Id_especie');		
		$this->db->where('r.Rep_estado_logico !=',3);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_unidades_activas_enviadas(){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas as ue');
		$this->db->join('socios as s','s.Id_socio=ue.Id_socio');
		$this->db->where('ue.Ue_estado_logico !=',3);		
		$this->db->where('ue.Ue_tipo ',1);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_detalle_envio_comercial($id){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('detalle_unidades_enviadas_reproduccion as d');		
		$this->db->join('unidades_enviadas as ue','ue.Id_unidad_enviada=d.Id_unidad_enviada');
		$this->db->join('reproduccion as r','r.Id_unidad_creada_reproduccion=d.Id_unidad_creada_reproduccion');
		// $this->db->join('tanques as ta','ta.Id_tanque=r.Id_tanque');
		$this->db->where('Id_detalle_unidad_enviada_creada',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
		
	}
	public function get_tanques(){
		$this->db->select('*'); 
		$this->db->from('tanques');	
		$this->db->where('Tnq_estado_logico',1);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_maximo_identificador_unico(){
		$this->db->select_max('Rep_id');
		$query = $this->db->get('reproduccion');
		return $query->row();		
	}
	public function get_unidad_comercial($id){
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_informacion_comercial($id){
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->join('especies as e','e.Id_especie=r.Id_especie');
		$this->db->join('detalle_unidades_enviadas_reproduccion as d','d.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
		$this->db->join('unidades_enviadas as ue','ue.Id_unidad_enviada=d.Id_unidad_enviada');
		$this->db->join('socios as s','ue.Id_socio=s.Id_socio');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_trazabilidad($id){
		$this->db->select('*');
		$this->db->from('unidades_enviadas as ue');		
		$this->db->join('detalle_unidades_enviadas_reproduccion as d','d.Id_unidad_enviada=ue.Id_unidad_enviada');
		$this->db->join('reproduccion as ur','ur.Id_unidad_creada_reproduccion=d.Id_unidad_creada_reproduccion');
		$this->db->join('tanques as t','ur.Id_tanque=t.Id_tanque');
		$this->db->join('especies as e','e.Id_especie=ur.Id_especie');
		$this->db->join('socios as s','ue.Id_socio=s.Id_socio');
		$this->db->where('ue.Id_unidad_enviada',$id);		
		$query=$this->db->get();
		return $query->result();
				
	}
	public function get_origen_comercial($id){
		$this->db->select('*');
		$this->db->from('establecimientos as e');
		// $this->db->join('detalle_empresas_establecimientos as d','d.Id_establecimiento=e.Id_establecimiento');
		// $this->db->join('empresas as emp','d.Id_empresa=emp.Id_empresa');		
		$this->db->where('e.Id_establecimiento',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_unidades_enviadas($id){
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('detalle_unidades_enviadas_reproduccion as d','d.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
		$this->db->join('unidades_enviadas as ue','ue.Id_unidad_enviada=d.Id_unidad_enviada');		
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);		
		$query=$this->db->get();
		return $query->result();
				
	}
	public function get_especies(){
		$this->db->select('*');
		$this->db->from('especies ');		
		$query=$this->db->get();
		return $query->result();
				
	}
	
	public function get_fecha_min_desove($id){
		$this->db->select('*');
		$this->db->from('reproduccion');
		$this->db->where('Id_unidad_creada_reproduccion',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_enfermedad($id){
		$this->db->select('*');
		$this->db->from('enfermedades_reproduccion');
		$this->db->where('Id_enfermedad_reproduccion',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_unidades_comerciales_desactivadas(){
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('tanques as t','r.Id_tanque=t.Id_tanque');
		$this->db->where('Rep_estado_logico',3);		
		$query=$this->db->get();
		return $query->result();
				
	}
	public function get_unidades_logisticas_desactivadas(){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas as ue');
		$this->db->join('socios as s','s.Id_socio=ue.Id_socio');
		$this->db->where('ue.Ue_estado_logico',3);		
		$this->db->where('ue.Ue_tipo',1);		
        $resultados=$this->db->get();
		return $resultados->result();
				
	}
	public function get_datos_desove(int $id){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('reproduccion as r');
		$this->db->join('detalle_unidades_enviadas_reproduccion as d','d.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
		$this->db->join('unidades_enviadas ue','d.Id_unidad_enviada=ue.Id_unidad_enviada');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);
		$this->db->order_by('ue.Ue_fecha_hora_despacho', 'ASC');
        $resultados=$this->db->get();
		return $resultados->result();
				
	}
	public function get_identificadores_unicos_logisticos(){
		$this->db->select('Ue_identificador_unico_logistico'); 
		$this->db->from('unidades_enviadas');				
        $resultados=$this->db->get();
		return $resultados->result();	
	}
	public function get_identificadores_unicos_comerciales(){
		$this->db->select('Rep_identificador_unico'); 
		$this->db->from('reproduccion');		
        $resultados=$this->db->get();
		return $resultados->result();	
	}
	public function get_unidad_logistica_activa($id){
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas as ue');				
		$this->db->join('socios as s','ue.Id_socio=s.Id_socio');				
		$this->db->join('detalle_unidades_enviadas_reproduccion as d','ue.Id_unidad_enviada=d.Id_unidad_enviada');				
		$this->db->join('reproduccion as r','r.Id_unidad_creada_reproduccion=d.Id_unidad_creada_reproduccion');				
		$this->db->join('tanques as ta','ta.Id_tanque=r.Id_tanque');
		$this->db->where('ue.Id_unidad_enviada',$id);			
        $resultados=$this->db->get();
		return $resultados->result();	
	}
	public function get_socios(){
		$this->db->select('*'); 
		$this->db->from('socios');	
		$this->db->where('Soc_tipo',1);	
		$this->db->where('Soc_estado_logico',1);	
        $resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_parametros_unidad_comercial_archivada($id){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('parametros_reproduccion as p','p.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);
		$this->db->order_by('p.Psq_fecha_hora', 'ASC');	
		$resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_limpieza_unidad_comercial_archivada($id){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('limpieza_reproduccion as p','p.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
		$this->db->join('usuarios as u','p.Id_usuario=u.Id_usuario');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);
		$this->db->order_by('p.Fecha_limpieza', 'ASC');	
		$resultados=$this->db->get();
		return $resultados->result();			
	}
	public function get_alimentacion_unidad_comercial_archivada($id){
		
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('alimentacion_reproduccion as p','p.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
		$this->db->join('usuarios as u','p.Id_usuario=u.Id_usuario');
		$this->db->join('insumos_alimentarios as ia','ia.Id_insumo_alimentario=p.Id_insumo_alimentario');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);
		$this->db->order_by('p.Ali_fecha_hora', 'ASC');	
		$resultados=$this->db->get();
		return $resultados->result();
		
	}
	public function get_enfermedades_unidad_comercial_archivada($id){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('enfermedades_reproduccion as p','p.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');		
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);
		$this->db->order_by('p.Enf_fecha_inicio', 'ASC');	
		$resultados=$this->db->get();
		return $resultados->result();

		
	}
	public function get_tratamientos_unidad_comercial_archivada($id){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('reproduccion as r');
		$this->db->join('enfermedades_reproduccion as p','p.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');		
		$this->db->join('detalle_tratamientos_reproduccion as d','d.Id_enfermedad_reproduccion=p.Id_enfermedad_reproduccion');
		$this->db->join('insumos_medicos as im','d.Id_insumo_medico=im.Id_insumo_medico');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->where('p.Id_enfermedad_reproduccion',$id);
		$this->db->order_by('p.Enf_fecha_inicio', 'ASC');	
		$resultados=$this->db->get();
		return $resultados->result();
	}
	
	public function add_unidad_reproduccion($data,$tanque){
		
		$this->db->insert("reproduccion",$data);
		$this->db->where("Id_tanque",$tanque);
		return $this->db->update("tanques",['Tnq_estado_logico'=>2,'Tnq_tipo'=>1]);
	}
	public function add_unidad_logistica($data){

		return $this->db->insert("unidades_enviadas",$data);

	}
	public function add_detalle_enviada_reproduccion($data,$uc,$ul){
		$this->db->select('Rep_numero_desove'); 
		$this->db->from('reproduccion');			
		$this->db->where('Id_unidad_creada_reproduccion',$uc);
		$resultados=$this->db->get();
		$unidades=$resultados->row();

		$data+=['Det_u_e_c_desove'=>intval($unidades->Rep_numero_desove)+1];


		$this->db->where("Id_unidad_creada_reproduccion",$uc);
		$this->db->update("reproduccion",['Rep_estado_logico'=>2]);
		$this->db->where("Id_unidad_enviada",$ul);
		$this->db->update("unidades_enviadas",['Ue_estado_logico'=>2]);
		return $this->db->insert("detalle_unidades_enviadas_reproduccion",$data);

	}
	public function update_detalle_enviada_reproduccion($data,$d){
		$this->db->where("Id_detalle_unidad_enviada_creada",$d);
		return $this->db->update("detalle_unidades_enviadas_reproduccion",$data);

	}
	public function update_unidad_logistica($data,$nl){
		$this->db->where("Id_unidad_enviada",$nl);
		return $this->db->update("unidades_enviadas",$data);

	}
	public function update_fecha_desove($data,$id_uc){
		$this->db->where("Id_unidad_creada_reproduccion",$id_uc);
		return $this->db->update("reproduccion",['Rep_fecha_desove'=>$data,'Rep_estado_logico'=>1]);

	}
	public function archivar_unidad_logistica($id){
		$this->db->where("Id_unidad_enviada",$id);
		$this->db->update("unidades_enviadas",['Ue_estado_logico'=>3]);

		$this->db->select('*'); 
		$this->db->from('unidades_enviadas ue');	
		$this->db->join('detalle_unidades_enviadas_reproduccion as d','ue.Id_unidad_enviada=d.Id_unidad_enviada');	
		$this->db->join('reproduccion as r','r.Id_unidad_creada_reproduccion=d.Id_unidad_creada_reproduccion');	
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');	
		$this->db->join('socios as soc','soc.Id_socio=ue.Id_socio');	
		$this->db->where('ue.Id_unidad_enviada',$id);			
        $resultados=$this->db->get();
		$unidades=array( 'unidades'=>$resultados->result());

		$alevinesu=0;

		foreach( $unidades['unidades'] as $unidad){
			if($unidad->Id_socio==2){
				$alevinesu+=$unidad->Det_u_e_c_alevines;				
			}
			$this->db->where("Id_unidad_creada_reproduccion",$unidad->Id_unidad_creada_reproduccion);
			$this->db->update("reproduccion",['Rep_estado_logico'=>1,'Rep_numero_desove'=>$unidad->Det_u_e_c_desove]);
			
						
					
			
		}
		// var_dump($unidades);
		// echo $unidades['unidades'][0]->Id_socio;
		if($unidades['unidades'][0]->Id_socio==2){
			
			$data = array(
				'Id_socio' => $unidades['unidades'][0]->Id_socio,
				'Ur_kilogramos' => $alevinesu,
				'Ur_identificador_unico_logistico' =>  $unidades['unidades'][0]->Ue_identificador_unico_logistico,
				'Ur_registro_temperatura' => 0,
				'Ur_tipo' => 2,
				'Ur_estado_logico' => 0,
				'Ur_porcentaje' => 100,
				'Ur_fecha_hora_recepcion'=>$unidades['unidades'][0]->Ue_fecha_hora_despacho
			);		
			$this->db->insert("unidades_recibidas",$data);

		}

		return 'ok';
	}
	public function archivar_unidad_comercial($id){

		$this->db->where("Id_unidad_creada_reproduccion",$id);
		$this->db->update("reproduccion",['Rep_estado_logico'=>3]);

		$this->db->select('*'); 	
		$this->db->from('reproduccion as r');	
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');		
		$this->db->where('r.Id_unidad_creada_reproduccion',$id);			
        $resultados=$this->db->get();
		$unidades=array( 'unidades'=>$resultados->result());

		$this->db->where("Id_tanque",$unidades['unidades'][0]->Id_tanque);
		$this->db->update("tanques",['Tnq_estado_logico'=>3]);	

		return 'ok';
	}
	
	

}
