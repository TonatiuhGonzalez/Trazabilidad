<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 */
class tanque_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		# code...
		date_default_timezone_set('America/Mexico_City');
	}
	
	public function gettanquesactivos(){
		$this->db->select('*'); 
        $this->db->from('tanques t');                         
		$this->db->where("t.Tnq_estado_logico !=",3);		
		$resultados=$this->db->get();
		return $resultados->result();
	}
	
	public function get_limpieza_tanque($id_unidad,$tipo){
		// $this->db->select('Tnq_tipo');
		// $this->db->from('tanques');
		// $this->db->where('Id_tanque',$id_tanque);
		// $c3=$this->db->get();
		// $cantidad=$c3->result();
		// $tipo= $cantidad[0]->{'Tnq_tipo'};
		switch ($tipo) {
			case 1:
				// $this->db->select('Rep_fecha_ingreso_tanque');
				// $this->db->from('reproduccion');
				// $this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Rep_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				$this->db->from('reproduccion as r');
				$this->db->join('limpieza_reproduccion as l','l.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');	
				$this->db->join('usuarios as u','u.Id_usuario=l.Id_usuario');	
				// $this->db->where('l.Id_tanque',$id_tanque);
				$this->db->where('r.Id_unidad_creada_reproduccion',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('l.Fecha_limpieza >=', $fi );
				$this->db->order_by('l.Fecha_limpieza', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 2:
				// $this->db->select('Cri_fecha_ingreso_tanque');
				// $this->db->from('crianza');
				// $this->db->where('Id_unidad_creada_crianza',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Cri_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('crianza as c','t.Id_tanque=c.Id_tanque');
				$this->db->from('crianza as c');
				$this->db->join('limpieza_crianza as l','l.Id_unidad_creada_crianza=c.Id_unidad_creada_crianza');	
				$this->db->join('usuarios as u','u.Id_usuario=l.Id_usuario');	
				// $this->db->where('l.Id_tanque',$id_tanque);
				$this->db->where('c.Id_unidad_creada_crianza',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('l.Fecha_limpieza >=', $fi );
				$this->db->order_by('l.Fecha_limpieza', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 3:
				// $this->db->select('En_fecha_ingreso_tanque');
				// $this->db->from('engorda');
				// $this->db->where('Id_unidad_creada_engorda',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'En_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('engorda as c','t.Id_tanque=c.Id_tanque');
				$this->db->from('engorda as c');
				$this->db->join('limpieza_engorda as l','l.Id_unidad_creada_engorda=c.Id_unidad_creada_engorda');	
				$this->db->join('usuarios as u','u.Id_usuario=l.Id_usuario');	
				// $this->db->where('l.Id_tanque',$id_tanque);
				$this->db->where('c.Id_unidad_creada_engorda',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('l.Fecha_limpieza >=', $fi );
				$this->db->order_by('l.Fecha_limpieza', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
		}

		
	}
	public function get_unidad_comercial($tipo,$id_unidad){ 
	
		switch ($tipo) {
			case 1:
				$this->db->select('*');
				$this->db->from('reproduccion');
				$this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
				
				break;
			case 2:
				$this->db->select('*');
				$this->db->from('crianza');
				$this->db->where('Id_unidad_creada_crianza',$id_unidad);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
				break;
			case 3:
				$this->db->select('*');
				$this->db->from('engorda');
				$this->db->where('Id_unidad_creada_engorda',$id_unidad);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
				break;
		}

		
	}
	public function get_alimentacion($id_unidad,$tipo){
		// $this->db->select('Tnq_tipo');
		// $this->db->from('tanques');
		// $this->db->where('Id_tanque',$id_tanque);
		// $c3=$this->db->get();
		// $cantidad=$c3->result();
		// $tipo= $cantidad[0]->{'Tnq_tipo'};
		switch ($tipo) {
			case 1:
				// $this->db->select('Rep_fecha_ingreso_tanque');
				// $this->db->from('reproduccion');
				// $this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Rep_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('reproduccion as r','t.Id_tanque=r.Id_tanque');
				$this->db->from('reproduccion as r');
				$this->db->join('alimentacion_reproduccion as a','a.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');	
				$this->db->join('usuarios as u','u.Id_usuario=a.Id_usuario');
				$this->db->join('insumos_alimentarios ia','ia.Id_insumo_alimentario=a.Id_insumo_alimentario');
				// $this->db->where('a.Id_tanque',$id_tanque);
				$this->db->where('r.Id_unidad_creada_reproduccion',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('a.Ali_fecha_hora >=', $fi );
				$this->db->order_by('a.Ali_fecha_hora', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 2:
				// $this->db->select('Cri_fecha_ingreso_tanque');
				// $this->db->from('crianza');
				// $this->db->where('Id_unidad_creada_crianza',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Cri_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('crianza as c','t.Id_tanque=c.Id_tanque');
				$this->db->from('crianza as c');
				$this->db->join('alimentacion_crianza as a','a.Id_unidad_creada_crianza=c.Id_unidad_creada_crianza');	
				$this->db->join('usuarios as u','u.Id_usuario=a.Id_usuario');
				$this->db->join('insumos_alimentarios ia','ia.Id_insumo_alimentario=a.Id_insumo_alimentario');
				// $this->db->where('a.Id_tanque',$id_tanque);
				$this->db->where('c.Id_unidad_creada_crianza',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('a.Ali_fecha_hora >=', $fi );
				$this->db->order_by('a.Ali_fecha_hora', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 3:
				// $this->db->select('En_fecha_ingreso_tanque');
				// $this->db->from('engorda');
				// $this->db->where('Id_unidad_creada_engorda',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'En_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('engorda as c','t.Id_tanque=c.Id_tanque');
				$this->db->from('engorda as c');
				$this->db->join('alimentacion_engorda as a','a.Id_unidad_creada_engorda=c.Id_unidad_creada_engorda');	
				$this->db->join('usuarios as u','u.Id_usuario=a.Id_usuario');
				$this->db->join('insumos_alimentarios ia','ia.Id_insumo_alimentario=a.Id_insumo_alimentario');
				// $this->db->where('a.Id_tanque',$id_tanque);
				$this->db->where('c.Id_unidad_creada_engorda',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('a.Ali_fecha_hora >=', $fi );
				$this->db->order_by('a.Ali_fecha_hora', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
		}

		
	}
	public function get_enfermedades($id_unidad,$tipo){
		// $this->db->select('Tnq_tipo');
		// $this->db->from('tanques');
		// $this->db->where('Id_tanque',$id_tanque);
		// $c3=$this->db->get();
		// $cantidad=$c3->result();
		// $tipo= $cantidad[0]->{'Tnq_tipo'};
		switch ($tipo) {
			case 1:
				// $this->db->select('Rep_fecha_ingreso_tanque');
				// $this->db->from('reproduccion');
				// $this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Rep_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('reproduccion as r','t.Id_tanque=r.Id_tanque');
				$this->db->from('reproduccion as r');
				$this->db->join('enfermedades_reproduccion as e','e.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
				// $this->db->where('e.Id_tanque',$id_tanque);
				$this->db->where('r.Id_unidad_creada_reproduccion',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('e.Enf_fecha_inicio >=', $fi );
				$this->db->order_by('e.Enf_fecha_inicio', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 2:
				// $this->db->select('Cri_fecha_ingreso_tanque');
				// $this->db->from('crianza');
				// $this->db->where('Id_unidad_creada_crianza',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Cri_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('crianza as c','t.Id_tanque=c.Id_tanque');
				$this->db->from('crianza as c');
				$this->db->join('enfermedades_crianza as e','e.Id_unidad_creada_crianza=c.Id_unidad_creada_crianza');
				// $this->db->where('e.Id_tanque',$id_tanque);
				$this->db->where('c.Id_unidad_creada_crianza',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('e.Enf_fecha_inicio >=', $fi );
				$this->db->order_by('e.Enf_fecha_inicio', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 3:
				// $this->db->select('En_fecha_ingreso_tanque');
				// $this->db->from('engorda');
				// $this->db->where('Id_unidad_creada_engorda',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'En_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('engorda as c','t.Id_tanque=c.Id_tanque');
				$this->db->from('engorda as c');
				$this->db->join('enfermedades_engorda as e','e.Id_unidad_creada_engorda=c.Id_unidad_creada_engorda');
				// $this->db->where('e.Id_tanque',$id_tanque);
				$this->db->where('c.Id_unidad_creada_engorda',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('e.Enf_fecha_inicio >=', $fi );
				$this->db->order_by('e.Enf_fecha_inicio', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();

				break;
		}
		
	}
	public function get_fecha_ingreso($id_unidad,$tipo){

		switch ($tipo) {
			case 1:
				$this->db->select('Rep_fecha_ingreso_tanque');
				$this->db->from('reproduccion');
				$this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}				
				break;
			case 2:
				$this->db->select('Cri_fecha_ingreso_tanque');
				$this->db->from('crianza as c');
				$this->db->join('detalle_tanques_crianza as d','c.Id_unidad_creada_crianza=d.Id_unidad_creada_crianza');
				$this->db->where('c.Id_unidad_creada_crianza',$id_unidad);
				$this->db->where('d.Cri_fecha_egreso_tanque','0000-00-00 00:00:00');
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
				break;
			case 3:
				$this->db->select('En_fecha_ingreso_tanque');
				$this->db->from('engorda');
				$this->db->where('Id_unidad_creada_engorda',$id_unidad);
				$query=$this->db->get();
				if($query->num_rows()>0){
				return $query->row();
				}else{
				return false;
				}
				break;
		}
		
	}
	public function get_tratamientos($id,$tipo){
		switch($tipo){
			case 1:
				$this->db->select('*'); 
				$this->db->from('detalle_tratamientos_reproduccion d');
				$this->db->join('insumos_medicos im','im.Id_insumo_medico=d.Id_insumo_medico');
				$this->db->where('d.Id_enfermedad_reproduccion',$id);
				$resultados=$this->db->get();
				return $resultados->result();
			break;
			case 2:
				$this->db->select('*'); 
				$this->db->from('detalle_tratamientos_crianza d');
				$this->db->join('insumos_medicos im','im.Id_insumo_medico=d.Id_insumo_medico');
				$this->db->where('d.Id_enfermedad_crianza',$id);
				$resultados=$this->db->get();
				return $resultados->result();
			break;
			case 3:
				$this->db->select('*'); 
				$this->db->from('detalle_tratamientos_engorda d');
				$this->db->join('insumos_medicos im','im.Id_insumo_medico=d.Id_insumo_medico');
				$this->db->where('d.Id_enfermedad_engorda',$id);
				$resultados=$this->db->get();
				return $resultados->result();
			break;
		}
	}
	public function getespecies(){
		$this->db->select('*'); 
		$this->db->from('especies');
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_tanques_desactivados(){
		$this->db->select('*'); 
		$this->db->from('tanques as t');	
		$this->db->where('Tnq_estado_logico',3);
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_insumo(){
		$this->db->select('*'); 
		$this->db->from('insumos_alimentarios as ia');
		$this->db->join('detalle_proveedores_insumos_alimentarios as d','d.Id_insumo_alimentario=ia.Id_insumo_alimentario');
		$this->db->where('d.Pro_insu_estado_logico !=',3);
		$this->db->where('d.Pro_insu_cantidad_total >',0);
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_fecha_inicio_enfermedad($id_enf,$tipo){
		switch($tipo){
			case 1:
				$this->db->select('Enf_fecha_inicio');
				$this->db->from('enfermedades_reproduccion');
				$this->db->where('Id_enfermedad_reproduccion',$id_enf);
				$query=$this->db->get();
				if($query->num_rows()>0){
				return $query->row();
				}else{
				return false;
				}
			break;
			case 2:
				$this->db->select('Enf_fecha_inicio');
				$this->db->from('enfermedades_crianza');
				$this->db->where('Id_enfermedad_crianza',$id_enf);
				$query=$this->db->get();
				if($query->num_rows()>0){
				return $query->row();
				}else{
				return false;
				}
			break;
			case 3:
				$this->db->select('Enf_fecha_inicio');
				$this->db->from('enfermedades_engorda');
				$this->db->where('Id_enfermedad_engorda',$id_enf);
				$query=$this->db->get();
				if($query->num_rows()>0){
				return $query->row();
				}else{
				return false;
				}
			break;

		}
	}
	public function get_insumos_medicos(){
		$this->db->select('*'); 
		$this->db->from('insumos_medicos as ia');
		$this->db->join('detalle_proveedores_insumos_medicos as d','d.Id_insumo_medico=ia.Id_insumo_medico');
		$this->db->where('d.Pro_insu_medico_estado_logico !=',3);
		$this->db->where('d.Pro_insu_medico_cantidad_total >',0);		
		$resultados=$this->db->get();
		return $resultados->result();
	}
	public function get_parametros_tanque($id_unidad,$tipo){
		// $this->db->select('Tnq_tipo');
		// $this->db->from('tanques');
		// $this->db->where('Id_tanque',$id_tanque);
		// $c3=$this->db->get();
		// $cantidad=$c3->result();
		// $tipo= $cantidad[0]->{'Tnq_tipo'};
		switch ($tipo) {
			case 1:
				// $this->db->select('Rep_fecha_ingreso_tanque');
				// $this->db->from('reproduccion');
				// $this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Rep_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				$this->db->from('reproduccion as r');
				$this->db->join('parametros_reproduccion as p','p.Id_unidad_creada_reproduccion=r.Id_unidad_creada_reproduccion');
				// $this->db->join('tanques as r','t.Id_tanque=r.Id_tanque');
				// $this->db->where('p.Id_tanque',$id_tanque);
				$this->db->where('r.Id_unidad_creada_reproduccion',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('p.Psq_fecha_hora >=', $fi );
				$this->db->order_by('p.Psq_fecha_hora', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 2:
				// $this->db->select('Cri_fecha_ingreso_tanque');
				// $this->db->from('crianza');
				// $this->db->where('Id_unidad_creada_crianza',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'Cri_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('crianza as r','t.Id_tanque=r.Id_tanque');
				$this->db->from('crianza as r');
				$this->db->join('parametros_crianza as p','p.Id_unidad_creada_crianza=r.Id_unidad_creada_crianza');
				// $this->db->where('p.Id_tanque',$id_tanque);
				$this->db->where('r.Id_unidad_creada_crianza',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('p.Psq_fecha_hora >=', $fi );
				$this->db->order_by('p.Psq_fecha_hora', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();
				break;
			case 3:
				// $this->db->select('En_fecha_ingreso_tanque');
				// $this->db->from('engorda');
				// $this->db->where('Id_unidad_creada_engorda',$id_unidad);
				// $c3=$this->db->get();
				// $cantidad=$c3->result();
				// $fi= $cantidad[0]->{'En_fecha_ingreso_tanque'};

				$this->db->distinct();
				$this->db->select('*');
				// $this->db->from('tanques as t');
				// $this->db->join('engorda as r','t.Id_tanque=r.Id_tanque');
				$this->db->from('engorda as r');
				$this->db->join('parametros_engorda as p','p.Id_unidad_creada_engorda=r.Id_unidad_creada_engorda');
				// $this->db->where('p.Id_tanque',$id_tanque);
				$this->db->where('r.Id_unidad_creada_engorda',$id_unidad);
				// $this->db->where("t.Id_establecimiento",intval($this->session->userdata('id_establecimiento')));
				// $this->db->where('p.Psq_fecha_hora >=', $fi );
				$this->db->order_by('p.Psq_fecha_hora', 'ASC');
				$resultados=$this->db->get();
				return $resultados->result();				
				break;
		}

		
	}
	
	public function addtanque($nombre,$fecha){
	
        $ba=array(
            'Tnq_fecha_alta'=>$fecha,
            'Tnq_fecha_baja'=>0,
			'Tnq_nombre'=>strtoupper($nombre),           
            'Tnq_estado_logico'=>1,
            'Tnq_tipo'=>0,
            'Id_establecimiento'=>$this->session->userdata('id_establecimiento')
		);
		return $this->db->insert('tanques',$ba);
		
	}
	public function add_alimentacion($datos,$ct,$insu,$tipo){
		$this->db->select('Pro_insu_cantidad_total');
		$this->db->from('detalle_proveedores_insumos_alimentarios');
		$this->db->where('Id_insumo_alimentario',intval($insu));
		$c3=$this->db->get();
		$cantidad=$c3->result();
		$total= $cantidad[0]->{'Pro_insu_cantidad_total'};

		switch($tipo){
			case 1:				
				$nc=floatval($total)-$ct;
			break;
			case 2:
				$c=$ct/1000.0;
				$nc=floatval($total)-$c;
			break;
			case 3:				
				$nc=floatval($total)-$ct;
			break;
		}
		$this->db->where('Id_insumo_alimentario',$insu);
		$this->db->update("detalle_proveedores_insumos_alimentarios",['Pro_insu_cantidad_total'=>$nc,'Pro_insu_estado_logico'=>2]);
		switch($tipo){
			case 1:
				return $this->db->insert('alimentacion_reproduccion',$datos);
			break;
			case 2:
				return $this->db->insert('alimentacion_crianza',$datos);
			break;
			case 3:
				return $this->db->insert('alimentacion_engorda',$datos);
			break;			
		}

		
	}
	
	public function addlimpieza($ba,$tipo){
		switch($tipo){
			case 1:
				return $this->db->insert('limpieza_reproduccion',$ba);
			break;
			case 2:
				return $this->db->insert('limpieza_crianza',$ba);
			break;
			case 3:
				return $this->db->insert('limpieza_engorda',$ba);
			break;
		}        
		
	}
	public function addparametros($datos,$tipo, $id_unidad, $fecha){

		switch($tipo){
			case 1:
				// hacemos una bandera para saber si hay algun valor en la misma fecha y hora 
				$bandera=1;
				// hacemos la consulta correspondiente en la base de datos 
				$this->db->select('Psq_fecha_hora');
				$this->db->from('parametros_reproduccion');
				$this->db->where('Id_unidad_creada_reproduccion',$id_unidad);
				$c3=$this->db->get();
				$fechas=$c3->result();

				// hacemos el recorrido de todos los datos consultados 
				foreach($fechas as $f){			
					// hacemos una condicion para saber si la fecha-hora no es igual a una fecha-hora
					// registrada con anterioridad 
					if(strtotime($f->Psq_fecha_hora)==strtotime($fecha)){
						// cambiamos el valor de la bandera para evidencia que efectivamente hay una
						// fecha-hora repetida
						$bandera=2;
					}
				}

				// si no esta repetida hacemos el insert de los nuevos datos
				// de otro modo mandamos un false para que mande el mensaje en la vista al usuario
				if($bandera==1){
					return $this->db->insert('parametros_reproduccion',$datos);
				}else{
					return false;
				}				
				
			break;
			case 2:
				// hacemos una bandera para saber si hay algun valor en la misma fecha y hora 
				$bandera=1;
				// hacemos la consulta correspondiente en la base de datos 
				$this->db->select('Psq_fecha_hora');
				$this->db->from('parametros_crianza');
				$this->db->where('Id_unidad_creada_crianza',$id_unidad);
				$c3=$this->db->get();
				$fechas=$c3->result();
				// hacemos el recorrido de todos los datos consultados 
				foreach($fechas as $f){			
					// hacemos una condicion para saber si la fecha-hora no es igual a una fecha-hora
					// registrada con anterioridad 
					if(strtotime($f->Psq_fecha_hora)==strtotime($fecha)){
						// cambiamos el valor de la bandera para evidencia que efectivamente hay una
						// fecha-hora repetida
						$bandera=2;
					}
				}

				// si no esta repetida hacemos el insert de los nuevos datos
				// de otro modo mandamos un false para que mande el mensaje en la vista al usuario
				if($bandera==1){
					return $this->db->insert('parametros_crianza',$datos);
				}else{
					return false;
				}				

			break;
			case 3:
				// hacemos una bandera para saber si hay algun valor en la misma fecha y hora 
				$bandera=1;
				// hacemos la consulta correspondiente en la base de datos 
				$this->db->select('Psq_fecha_hora');
				$this->db->from('parametros_engorda');
				$this->db->where('Id_unidad_creada_engorda',$id_unidad);
				$c3=$this->db->get();
				$fechas=$c3->result();

				// hacemos el recorrido de todos los datos consultados 
				foreach($fechas as $f){			
					// hacemos una condicion para saber si la fecha-hora no es igual a una fecha-hora
					// registrada con anterioridad 
					if(strtotime($f->Psq_fecha_hora)==strtotime($fecha)){
						// cambiamos el valor de la bandera para evidencia que efectivamente hay una
						// fecha-hora repetida
						$bandera=2;
					}
				}

				// si no esta repetida hacemos el insert de los nuevos datos
				// de otro modo mandamos un false para que mande el mensaje en la vista al usuario
				if($bandera==1){
					return $this->db->insert('parametros_engorda',$datos);
				}else{
					return false;
				}				
				
			break;
		}		
	}
	public function add_enfermedad($datos,$tipo){
		switch($tipo){
			case 1:
				return $this->db->insert('enfermedades_reproduccion',$datos);
			break;
			case 2:
				return $this->db->insert('enfermedades_crianza',$datos);
			break;
			case 3:
				return $this->db->insert('enfermedades_engorda',$datos);
			break;
		}
		
		
	}
	public function add_tratamiento($datos,$insu,$ct,$tipo){
		$this->db->select('Pro_insu_medico_cantidad_total');
		$this->db->from('detalle_proveedores_insumos_medicos');
		$this->db->where('Id_insumo_medico',intval($insu));
		$c3=$this->db->get();
		$cantidad=$c3->result();
		$total= $cantidad[0]->{'Pro_insu_medico_cantidad_total'};
		// $c=$ct/1000.0;
		$nc=floatval($total)-$ct;
		$this->db->where('Id_insumo_medico',$insu);
		$this->db->update("detalle_proveedores_insumos_medicos",['Pro_insu_medico_cantidad_total'=>$nc,'Pro_insu_medico_estado_logico'=>2]);
		
		switch($tipo){
			case 1:
				return $this->db->insert('detalle_tratamientos_reproduccion',$datos);
			break;
			case 2:
				return $this->db->insert('detalle_tratamientos_crianza',$datos);
			break;
			case 3:
				return $this->db->insert('detalle_tratamientos_engorda',$datos);
			break;
		}
		
	}
	
	public function activar_tanque($id){
		$this->db->where('Id_tanque',$id);		
		return $this->db->update('tanques',['Tnq_estado_logico'=>1,'Tnq_tipo'=>0]);
		
	}
	public function update_enfermedad($data,$id,$tipo){
		switch($tipo){
			case 1:
				$this->db->where('Id_enfermedad_reproduccion',$id);		
				return $this->db->update('enfermedades_reproduccion',$data);
			break;
			case 2:
				$this->db->where('Id_enfermedad_crianza',$id);		
				return $this->db->update('enfermedades_crianza',$data);
			break;
			case 3:
				$this->db->where('Id_enfermedad_engorda',$id);		
				return $this->db->update('enfermedades_engorda',$data);
			break;


		}
		
	}
	public function update_tanque($data,$id){
		$this->db->where('Id_tanque',$id);		
		return $this->db->update('tanques',$data);
		
	}
	public function update_termino_enfermedad($data,$id,$tipo){
		switch($tipo){
			case 1:
				$this->db->where('Id_enfermedad_reproduccion',$id);		
				return $this->db->update('enfermedades_reproduccion',$data);
			break;
			case 2:
				$this->db->where('Id_enfermedad_crianza',$id);		
				return $this->db->update('enfermedades_crianza',$data);
			break;
			case 3:
				$this->db->where('Id_enfermedad_engorda',$id);		
				return $this->db->update('enfermedades_engorda',$data);
			break;
		}
		
	}
	public function get_enfermedad($id,$tipo){
		switch($tipo){
			case 1:
				$this->db->select('*');		
				$this->db->from('enfermedades_reproduccion');		
				$this->db->where('Id_enfermedad_reproduccion',$id);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
			break;
			case 2:
				$this->db->select('*');		
				$this->db->from('enfermedades_crianza');		
				$this->db->where('Id_enfermedad_crianza',$id);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
			break;
			case 3:
				$this->db->select('*');		
				$this->db->from('enfermedades_engorda');		
				$this->db->where('Id_enfermedad_engorda',$id);
				$query=$this->db->get();
				if($query->num_rows()>0){
					return $query->row();
				}else{
					return false;
				}
			break;

		}
		
	}
	public function verificar_nombre_editar($nombre,$id){
		$this->db->select('Tnq_nombre');
		$this->db->from('tanques');
		$this->db->where('Id_tanque',$id);
		$c3=$this->db->get();
		$cantidad=$c3->result();
		$n= $cantidad[0]->{'Tnq_nombre'};
		if($n==$nombre){
			return false;
		}else{
			$this->db->select('Tnq_nombre');		
			$this->db->from('tanques');		
			$this->db->where('Tnq_nombre',$nombre);
			$query=$this->db->get();
			if($query->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
	public function verificar_nombre_add($nombre){		
			$this->db->select('Tnq_nombre');		
			$this->db->from('tanques');		
			$this->db->where('Tnq_nombre',$nombre);
			$query=$this->db->get();
			if($query->num_rows()>0){
				return true;
			}else{
				return false;
			}
		
	}
	public function get_tanque($id){
		$this->db->select('*');		
		$this->db->from('tanques as t');	
		$this->db->where('t.Id_tanque',$id);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
		
	}
	
}
