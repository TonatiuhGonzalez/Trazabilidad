<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class engorda_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	public function get_unidades_activas_comerciales(){
		$this->db->select('*'); 
		$this->db->from('engorda as c');
		$this->db->join('especies as e','e.Id_especie=c.Id_especie');
		$this->db->join('tanques as t','c.Id_tanque=t.Id_tanque');		
		$this->db->where('c.En_estado_logico !=',3);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_unidades_enviadas($id){
		$this->db->select('*');
		$this->db->from('engorda as r');
		$this->db->join('detalle_unidades_enviadas_engorda as d','d.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');
		$this->db->join('unidades_enviadas as ue','ue.Id_unidad_enviada=d.Id_unidad_enviada');		
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
		$query=$this->db->get();
		return $query->result();
				
	}
	public function get_unidades_activas_enviadas(){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas as ue');
		$this->db->join('socios as s','s.Id_socio=ue.Id_socio');
		$this->db->where('ue.Ue_estado_logico !=',3);		
		$this->db->where('ue.Ue_tipo',3);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_detalle_envio_comercial($id){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('detalle_unidades_enviadas_engorda as d');		
		$this->db->join('unidades_enviadas as ue','ue.Id_unidad_enviada=d.Id_unidad_enviada');	
		$this->db->join('engorda as c','d.Id_unidad_creada_engorda=c.Id_unidad_creada_engorda');	
		$this->db->where('Id_detalle_unidad_enviada_engorda',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
		
	}
	public function get_unidades_recibidas(){
		
		$this->db->select('*'); 
		$this->db->from('unidades_recibidas as ur');		
		$this->db->join('socios as s','s.Id_socio=ur.Id_socio');	
		$this->db->where('ur.Ur_tipo',3);			
		$this->db->where('ur.Ur_estado_logico !=',2);			
		$query=$this->db->get();
		return $query->result();
		
	}
	public function get_unidades_recibidas_archivadas(){
		
		$this->db->select('*'); 
		$this->db->from('unidades_recibidas as ur');		
		$this->db->join('socios as s','s.Id_socio=ur.Id_socio');	
		$this->db->where('ur.Ur_tipo',3);			
		$this->db->where('ur.Ur_estado_logico',2);	
		$query=$this->db->get();
		return $query->result();
		
	}
	public function get_tanques(){
		$this->db->select('*'); 
		$this->db->from('tanques');	
		$this->db->where('Tnq_estado_logico',1);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_fecha_min_eclosion($id){
		$this->db->select('Cri_fecha_ingreso_tanque'); 
		$this->db->from('engorda');	
		$this->db->where('Id_unidad_creada_engorda',$id);		
        $resultados=$this->db->get();
		return $resultados->result();
	}
	
	public function get_maximo_identificador_unico(){
		$this->db->select_max('En_identificador_unico');
		$query = $this->db->get('engorda');
		return $query->row();		
	}
	public function get_unidad_comercial($id){
		$this->db->select('*');
		$this->db->from('engorda as e');
		$this->db->join('tanques as t','t.Id_tanque=e.Id_tanque');		
		$this->db->where('Id_unidad_creada_engorda',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}

	public function get_especies(){
		$this->db->select('*'); 
		$this->db->from('especies');				
        $resultados=$this->db->get();
		return $resultados->result();
	}

	public function get_enfermedad($id){
		$this->db->select('*');
		$this->db->from('enfermedades_engorda');		
		$this->db->where('Id_enfermedad_engorda',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_unidad_recibida($id){
		$this->db->select('*');
		$this->db->from('unidades_recibidas as ur');
		$this->db->join('socios as s','ur.Id_socio=s.Id_socio');
		$this->db->where('Id_unidad_recibida',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_unidades_comerciales_desactivadas(){
		$this->db->select('*');
		$this->db->from('engorda as c');
		$this->db->join('tanques as t','c.Id_tanque=t.Id_tanque');
		$this->db->where('En_estado_logico',3);		
		$query=$this->db->get();
		return $query->result();
				
	}
	public function get_unidades_logisticas_desactivadas(){
		$this->db->distinct();
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas as ue');
		$this->db->join('socios as s','s.Id_socio=ue.Id_socio');
		$this->db->where('ue.Ue_estado_logico',3);	
		$this->db->where('ue.Ue_tipo',3);	
        $resultados=$this->db->get();
		return $resultados->result();
				
	}
	public function get_identificadores_unicos_logisticos(){
		$this->db->select('Ue_identificador_unico_logistico'); 
		$this->db->from('unidades_enviadas');		
        $resultados=$this->db->get();
		return $resultados->result();	
	}
	public function get_unidad_logistica_activa($id){
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas as ue');				
		$this->db->join('socios as s','ue.Id_socio=s.Id_socio');				
		$this->db->join('detalle_unidades_enviadas_engorda as d','ue.Id_unidad_enviada=d.Id_unidad_enviada');				
		$this->db->join('engorda as r','r.Id_unidad_creada_engorda=d.Id_unidad_creada_engorda');				
		$this->db->where('ue.Id_unidad_enviada',$id);			
        $resultados=$this->db->get();
		return $resultados->result();	
	}
	public function get_unidad_recibida_archivada($id){
		$this->db->select('*'); 
		$this->db->from('unidades_recibidas as ur');				
		$this->db->join('socios as s','ur.Id_socio=s.Id_socio');				
		$this->db->join('detalle_unidades_recibidas_creadas as d','ur.Id_unidad_recibida=d.Id_unidad_recibida');				
		$this->db->join('engorda as c','c.Id_detalle_unidad_recibida_creada=d.Id_detalle_unidad_recibida_creada');				
		$this->db->where('ur.Id_unidad_recibida',$id);			
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
		$this->db->from('tanques as t');
		$this->db->join('engorda as r','t.Id_tanque=r.Id_tanque');
		$this->db->join('parametros_engorda as p','p.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
		$this->db->order_by('p.Psq_fecha_hora', 'ASC');
		$resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_limpieza_unidad_comercial_archivada($id){
	
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tanques as t');
		$this->db->join('engorda as r','t.Id_tanque=r.Id_tanque');
		$this->db->join('limpieza_engorda as lt','lt.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');
		$this->db->join('usuarios as u','u.Id_usuario=lt.Id_usuario');
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
		$this->db->order_by('lt.Fecha_limpieza', 'ASC');
		$resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_alimentacion_unidad_comercial_archivada($id){
		
		
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tanques as t');
		$this->db->join('engorda as r','t.Id_tanque=r.Id_tanque');
		$this->db->join('alimentacion_engorda as a','a.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');
		$this->db->join('usuarios as u','u.Id_usuario=a.Id_usuario');
		$this->db->join('insumos_alimentarios as ia','ia.Id_insumo_alimentario=a.Id_insumo_alimentario');
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
		$this->db->order_by('a.Ali_fecha_hora', 'ASC');
		$resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_enfermedades_unidad_comercial_archivada($id){
				
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tanques as t');
		$this->db->join('engorda as r','t.Id_tanque=r.Id_tanque');
		$this->db->join('enfermedades_engorda as e','e.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');		
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
		$this->db->order_by('e.Enf_fecha_inicio', 'ASC');
		$resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_tratamientos_unidad_comercial_archivada($id){	
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('enfermedades_engorda as e');
		$this->db->join('detalle_tratamientos_engorda as d','d.Id_enfermedad_engorda=e.Id_enfermedad_engorda');
		$this->db->join('insumos_medicos as i','i.Id_insumo_medico=d.Id_insumo_medico');		
		$this->db->where('e.Id_enfermedad_engorda',$id);
		$this->db->order_by('e.Enf_fecha_inicio', 'ASC');
		$resultados=$this->db->get();
		return $resultados->result();		
	}
	public function get_informacion_comercial($id){
		$this->db->select('*');
		$this->db->from('engorda as r');
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');
		$this->db->join('especies as e','e.Id_especie=r.Id_especie');
		$this->db->join('detalle_unidades_enviadas_engorda as d','d.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');
		$this->db->join('unidades_enviadas as ue','ue.Id_unidad_enviada=d.Id_unidad_enviada');	
		$this->db->join('socios as s','ue.Id_socio=s.Id_socio');
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
				
	}
	public function get_informacion_socio_proovedor($id){
		$this->db->select('*');
		$this->db->from('engorda as r');
		$this->db->join('detalle_unidades_recibidas_creadas as durc','durc.Id_detalle_unidad_recibida_creada=r.Id_detalle_unidad_recibida_creada');
		$this->db->join('unidades_recibidas as ur','ur.Id_unidad_recibida=durc.Id_unidad_recibida');	
		$this->db->join('socios as s','ur.Id_socio=s.Id_socio');
		$this->db->where('r.Id_unidad_creada_engorda',$id);		
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
		$this->db->join('detalle_unidades_enviadas_engorda as d','d.Id_unidad_enviada=ue.Id_unidad_enviada');
		$this->db->join('engorda as ur','ur.Id_unidad_creada_engorda=d.Id_unidad_creada_engorda');
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
	public function add_unidad_comercial($data,$data2,$tanque,$ul,$po){
		$this->db->select('Ur_porcentaje');
		$this->db->from('unidades_recibidas');
		$this->db->where('Id_unidad_recibida',$ul);
		$resultados=$this->db->get();
		$unidades=array( $resultados->row());
		
		$this->db->insert("detalle_unidades_recibidas_creadas",$data);
		$ultimoId = $this->db->insert_id();		

		$data2+=['Id_detalle_unidad_recibida_creada' => $ultimoId];
		$this->db->insert("engorda",$data2);

		$this->db->where("Id_tanque",$tanque);
		$this->db->update("tanques",['Tnq_estado_logico'=>2,'Tnq_tipo'=>3]);
		$this->db->where("Id_unidad_recibida",$ul);
		$this->db->update("unidades_recibidas",['Ur_tipo'=>3,'Ur_estado_logico'=>1,
				'Ur_porcentaje'=>$unidades[0]->{"Ur_porcentaje"}-$po]);

		$this->db->select('Ur_porcentaje');
		$this->db->from('unidades_recibidas');
		$this->db->where('Id_unidad_recibida',$ul);
		$resultados=$this->db->get();
		$unidades=array( $resultados->row());
		
		if($unidades[0]->{"Ur_porcentaje"}==0){
			$this->db->where("Id_unidad_recibida",$ul);
			$this->db->update("unidades_recibidas",['Ur_estado_logico'=>2]);
			return true;
		}else{
			return true;
		}
	}
	public function add_unidad_enviada($data){

		return $this->db->insert("unidades_enviadas",$data);

	}
	public function add_unidad_recibida($data,$iul){

		$this->db->select('*'); 
		$this->db->from('unidades_enviadas');					
		$this->db->where('Ue_identificador_unico_logistico',$iul);		
		$this->db->where('Ue_estado_logico',3);		
		$this->db->where('Ue_tipo',2);		
		$query=$this->db->get();
		if($query->num_rows()>0){
			$query=$query->row();						
			$data+=['Ur_fecha_hora_recepcion'=>$query->Ue_fecha_hora_despacho];
			return $this->db->insert("unidades_recibidas",$data);			
		}else{
			return false;
		}
		
	}
	public function update_unidad_recibida($data,$id_ur,$iul){

		$this->db->select('*'); 
		$this->db->from('unidades_enviadas');					
		$this->db->where('Ue_identificador_unico_logistico',$iul);	
		$this->db->where('Ue_estado_logico',3);		
		$this->db->where('Ue_tipo',2);	
		$query=$this->db->get();
		if($query->num_rows()>0){
			$query=$query->row();						
			$data+=['Ur_fecha_hora_recepcion'=>$query->Ue_fecha_hora_despacho];			
			$this->db->where("Id_unidad_recibida",$id_ur);
			return $this->db->update("unidades_recibidas",$data);
			
		}else{
			return false;
		}	

	}
	public function add_detalle_enviada_engorda($data,$uc,$ul,$pa,$pp){
		$this->db->where("Id_unidad_creada_engorda",$uc);
		$this->db->update("engorda",['En_estado_logico'=>2,"En_periodo_hambre"=>$pa,"En_peso_promedio"=>$pp]);
		$this->db->where("Id_unidad_enviada",$ul);
		$this->db->update("unidades_enviadas",['Ue_estado_logico'=>2]);
		return $this->db->insert("detalle_unidades_enviadas_engorda",$data);

	}
	public function update_detalle_enviada_engorda($data,$d){
		$this->db->where("Id_detalle_unidad_enviada_engorda",$d);
		return $this->db->update("detalle_unidades_enviadas_engorda",$data);

	}
	public function update_unidad_logistica($data,$nl){
		$this->db->where("Id_unidad_enviada",$nl);
		return $this->db->update("unidades_enviadas",$data);

	}
	public function update_fecha_eclosion($data,$nl){
		$this->db->where("Id_unidad_creada_engorda",$nl);
		return $this->db->update("engorda",$data);

	}
	public function archivar_unidad_logistica($id){
		$this->db->where("Id_unidad_enviada",$id);
		$this->db->update("unidades_enviadas",['Ue_estado_logico'=>3]);
		$this->db->select('*'); 
		$this->db->from('unidades_enviadas ue');	
		$this->db->join('detalle_unidades_enviadas_engorda as d','ue.Id_unidad_enviada=d.Id_unidad_enviada');	
		$this->db->join('engorda as r','r.Id_unidad_creada_engorda=d.Id_unidad_creada_engorda');	
		$this->db->join('tanques as t','t.Id_tanque=r.Id_tanque');	
		$this->db->where('ue.Id_unidad_enviada',$id);			
        $resultados=$this->db->get();
		$unidades=array( 'unidades'=>$resultados->result());
		
		foreach( $unidades['unidades'] as $unidad){
			if($unidad->Det_u_e_eng_porcentaje==100){
				$this->db->where("Id_unidad_creada_engorda",$unidad->Id_unidad_creada_engorda);
				$this->db->update("engorda",['En_estado_logico'=>3,
												  'En_fecha_egreso_tanque'=>$unidad->Ue_fecha_hora_despacho,
												  'En_porcentaje'=>0]);
			
				$this->db->where("Id_tanque",$unidad->Id_tanque);
				$this->db->update("tanques",['Tnq_estado_logico'=>3]);								
			}
			if($unidad->Det_u_e_eng_porcentaje<100){
				$diferencia=$unidad->En_porcentaje-$unidad->Det_u_e_eng_porcentaje;

				$this->db->where("Id_unidad_creada_engorda",$unidad->Id_unidad_creada_engorda);
				$this->db->update("engorda",['En_porcentaje'=>$diferencia]);

				if($diferencia==0){
				$this->db->where("Id_unidad_creada_engorda",$unidad->Id_unidad_creada_engorda);
				$this->db->update("engorda",['En_estado_logico'=>3,
													'En_fecha_egreso_tanque'=>$unidad->Ue_fecha_hora_despacho]);
				$this->db->where("Id_tanque",$unidad->Id_tanque);
				$this->db->update("tanques",['Tnq_estado_logico'=>3]);
				
				}else{
				$this->db->where("Id_unidad_creada_engorda",$unidad->Id_unidad_creada_engorda);
				$this->db->update("engorda",['En_estado_logico'=>1]);
				}
							
			}
					
			
		}
		return 'ok';
	}
	
	

}
