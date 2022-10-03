<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//este controlador se va a encargar de los permisos y la redireccion a los correspondientes controladores

class Reproduccion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('reproduccion_model');
		
	}
	public function index(){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidades_activas_comerciales()
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/unidades-creadas-reproduccion',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_unidades_enviadas_activas(){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidades_activas_enviadas()
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/unidades-enviadas-activas',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_unidades_comerciales_archivadas(){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidades_comerciales_desactivadas()
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/unidades-comerciales-archivadas',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_unidades_logisticas_archivadas(){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidades_logisticas_desactivadas()
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/unidades-logisticas-archivadas',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_agregar_unidad_comercial(){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				
				'tanques'=>$this->reproduccion_model->get_tanques(),
				'especies'=>$this->reproduccion_model->get_especies(),
				'identificadores'=>$this->reproduccion_model->get_identificadores_unicos_comerciales()
				
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/agregar-unidad-comercial',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_agregar_fecha_desove(int $id_uc){
		if($this->session->userdata('logged_in')){
			$data=array(
				'fecha'=>$this->reproduccion_model->get_fecha_min_desove($id_uc),
				'id_uc'=>$id_uc,
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id_uc),	
			);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/agregar-fecha-desove',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	
	public function vista_agregar_unidad_logistica(){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				
				'unidades'=>$this->reproduccion_model->get_unidades_activas_comerciales(),
				'socios'=>$this->reproduccion_model->get_socios(),
				'identificadores'=>$this->reproduccion_model->get_identificadores_unicos_logisticos()
				
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/agregar-unidad-logistica',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_agregar_unidad_comercial_a_logistica(int $id){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				
				'unidades'=>$this->reproduccion_model->get_unidades_activas_enviadas(),
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id),				
				'id_unidad'=>$id
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/agregar-unidad-comercial-a-logistica',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_grafica_desove(int $id){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				
				'datos'=>$this->reproduccion_model->get_datos_desove($id),
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id)			
				
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/grafica-desove',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function Vista_editar_unidad_comercial_a_logistica(int $ul,int $de){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				
				'unidades'=>$this->reproduccion_model->get_unidades_activas_enviadas(),
				'uc'=>$this->reproduccion_model->get_detalle_envio_comercial($de),
				'id_unidad_enviada'=>$ul,
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/editar-unidad-comercial-a-logistica',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function Vista_editar_unidad_logistica(int $id){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidad_logistica_activa($id),
				'socios'=>$this->reproduccion_model->get_socios(),				
				'ul'=>$id
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/editar-unidad-logistica',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_ver_unidad_logistica(int $id){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidad_logistica_activa($id),
				'socios'=>$this->reproduccion_model->get_socios(),
				'ul'=>$id
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/ver-unidad-logistica',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_ver_unidad_logistica_archivada(int $id){
		if($this->session->userdata('logged_in')){

			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_unidad_logistica_activa($id),
				'socios'=>$this->reproduccion_model->get_socios(),
				'ul'=>$id
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/ver-unidad-logistica-archivada',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	
	public function vista_parametros_unidad_comercial_archivada(string $id2,string $id_ul2){
		if($this->session->userdata('logged_in')){
			$id=intval(base64_decode($id2));
			$id_ul=intval(base64_decode($id_ul2));
			
			$data=array(
				'tanques'=>$this->reproduccion_model->get_parametros_unidad_comercial_archivada($id),
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id),
				'id_ul'=>$this->reproduccion_model->get_unidad_logistica_activa($id_ul)			
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/parametros-unidad-comercial-archivada',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_limpieza_unidad_comercial_archivada(string $id2, string $id_ul2){
		if($this->session->userdata('logged_in')){
			$id=intval(base64_decode($id2));
			$id_ul=intval(base64_decode($id_ul2));

			
			$data=array(
				'tanques'=>$this->reproduccion_model->get_limpieza_unidad_comercial_archivada($id),
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id),
				'id_ul'=>$this->reproduccion_model->get_unidad_logistica_activa($id_ul)				
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/limpieza-unidad-comercial-archivada',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_alimentacion_unidad_comercial_archivada(string $id2,string $id_ul2){
		if($this->session->userdata('logged_in')){
			$id=intval(base64_decode($id2));
			$id_ul=intval(base64_decode($id_ul2));
			
			$data=array(
				'tanques'=>$this->reproduccion_model->get_alimentacion_unidad_comercial_archivada($id),
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id),
				'id_ul'=>$this->reproduccion_model->get_unidad_logistica_activa($id_ul)	
				
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/alimentacion-unidad-comercial-archivada',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_enfermedades_unidad_comercial_archivada(string $id2, string $id_ul2){
		if($this->session->userdata('logged_in')){

			$id=intval(base64_decode($id2));
			$id_ul=intval(base64_decode($id_ul2));

			$data=array(
				'tanques'=>$this->reproduccion_model->get_enfermedades_unidad_comercial_archivada($id),
				'id_uar'=>$id,
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id),	
				'id_ul'=>$this->reproduccion_model->get_unidad_logistica_activa($id_ul)				
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/enfermedades-unidad-comercial-archivada',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_tratamientos_unidad_comercial_archivada(string $id_enf2,string $id_uar2,string $id_ul2){
		if($this->session->userdata('logged_in')){
			$id_enf=intval(base64_decode($id_enf2));
			$id_uar=intval(base64_decode($id_uar2));
			$id_ul=intval(base64_decode($id_ul2));
			
			$data=array(
				'tanques'=>$this->reproduccion_model->get_tratamientos_unidad_comercial_archivada($id_enf),
				'id_uar'=>$id_uar,
				'uc'=>$this->reproduccion_model->get_unidad_comercial($id_uar),	
				'enf'=>$this->reproduccion_model->get_enfermedad($id_enf),
				'id_ul'=>$this->reproduccion_model->get_unidad_logistica_activa($id_ul)	
			);
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/tratamientos-unidad-comercial-archivada',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_ficha_tecnica(int $id_u, int $ul){
		if($this->session->userdata('logged_in')){
			// UNIDAD COMERCIAL
			$id_uar=$id_u; 
			// UNIDAD LOGISTICA
			$id_ul=$ul;
			$g=$this->reproduccion_model->get_informacion_comercial($id_uar);
			$unidades=$this->reproduccion_model->get_unidades_enviadas($id_uar);
			$emp=$this->reproduccion_model->get_origen_comercial($this->session->userdata('id_establecimiento'));
			$parametros=$this->reproduccion_model->get_parametros_unidad_comercial_archivada($id_uar);
			$alimentos=$this->reproduccion_model->get_alimentacion_unidad_comercial_archivada($id_uar);
			$enfermedades=$this->reproduccion_model->get_enfermedades_unidad_comercial_archivada($id_uar);
			
			$this->load->library('ciqrcode');
			//hacemos configuraciones

			// $vcard="BEGIN:VCARD\r\nVERSION:3.0\r\nN:".$emp->Est_nombre.";Empresa de origen:\r\nADR;TYPE=dom,home,postal,parcel: ;;123 Main Street;Any Town;CA;91921;\r\n
			// END:VCARD";
			// $params['data'] = $vcard;
			// $empresa="Empresa de origen: ". $emp->Est_nombre."  \r\n";
			// $params['data'] = $empresa."Identificador único comercial:"."  Rep-" . $g->Rep_identificador_unico.";Fecha de siembra:".date("d/m/Y g:i A", strtotime($g->Rep_fecha_ingreso_tanque))."; Fecha de desove:".date("d/m/Y g:i A", strtotime($g->Rep_fecha_desove))."; Empresa de destino:".$g->Soc_nombre;
			$cont2 = 0;			
			$prom=0;
			$ar = array();
			$ar2 = array();
			$unidadesincorp = array();
			
			foreach ($parametros as $parametro) {
				$cont2 += 1;
				$prom += $parametro->Psq_temperatura;
			}
			if($prom>0){
				$res = $prom / $cont2;		
			}else{
				$res="";
			}

			foreach ($alimentos as $alimento) {
				array_push($ar, $alimento->Ia_nombre_comercial);
			}
			$resultados = array_unique($ar);
			$se = implode(",", $resultados);	

			foreach ($enfermedades as $enfermedad) {
				array_push($ar2, $enfermedad->Enf_nombre);
			}
			$resultados2 = array_unique($ar2);

			$se2=implode(",",$resultados2);                                                                                            //                                                                                           //   
		 
			foreach ($unidades as $uni) {
				array_push($unidadesincorp, $uni->Ue_identificador_unico_logistico);
			}
			$unidadesincorp2 = array_unique($unidadesincorp);
			$unidadesincorp3=implode("\n",$unidadesincorp2);
			
								
			$eo="Empresa de origen:\r\n". $emp->Est_nombre."\r\n\r\nIdentificador único comercial:\r\n".$g->Rep_identificador_unico;
			$undul1= "\r\n\r\nUnidades enviadas que tienen parte de esta unidad:\r\n".$unidadesincorp3;					
			$at= "\r\n\r\nPromedio de temperatura:\r\n".$res.' °';
			$aut= "\r\n\r\nAlimentos utilizados:\r\n".$se;
			$enf= "\r\n\r\nEnfermedades:\r\n".$se2;	
			$fyhs= "\r\n\r\nFecha de siembra:\r\n".date("d/m/Y g:i A", strtotime($g->Rep_fecha_ingreso_tanque));
			$e= "\r\n\r\nEspecie:\r\n".$g->Sci_nombre_cientifico;
			$tnq= "\r\n\r\nTanque:\r\n".$g->Tnq_nombre;
			$fyhe= "\r\n\r\nFecha de desove:\r\n".date("d/m/Y g:i A", strtotime($g->Rep_fecha_desove));					
			$data3=$eo.$undul1.$at.$aut.$enf.$fyhs.$e.$tnq.$fyhe;
		


			$params['data'] = $data3;
			$params['level'] = 'Q';
			$params['size'] = 10;
	
			//decimos el directorio a guardar el codigo qr, en este 
			//caso una carpeta en la raíz llamada qr_code
			$params['savename'] = FCPATH . "./uploads/qr_code/". $g->Rep_identificador_unico.".png";
			//generamos el código qr
			$this->ciqrcode->generate($params);
			
			$data=array(
				'uc'=>$this->reproduccion_model->get_informacion_comercial($id_uar),
				'parametros'=>$this->reproduccion_model->get_parametros_unidad_comercial_archivada($id_uar),
				'alimentos'=>$this->reproduccion_model->get_alimentacion_unidad_comercial_archivada($id_uar),
				'enfermedades'=>$this->reproduccion_model->get_enfermedades_unidad_comercial_archivada($id_uar),
				'unidades'=>$this->reproduccion_model->get_unidades_enviadas($id_uar),
				'ul'=>$this->reproduccion_model->get_unidad_logistica_activa($id_ul),
				'emp'=>$this->reproduccion_model->get_origen_comercial($this->session->userdata('id_establecimiento')),
				'img'=>$g->Rep_identificador_unico.".png"
			);
			// $data['img'] = "qr_4.png";
		
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/ficha-tecnica-uc',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_ficha_tecnica_ul(string $id_u){
		if($this->session->userdata('logged_in')){

			$id_uar=base64_decode($id_u);
			$unidades=$this->reproduccion_model->get_trazabilidad($id_uar);
			$emp=$this->reproduccion_model->get_origen_comercial($this->session->userdata('id_establecimiento'));
			
			$this->load->library('ciqrcode');
			//hacemos configuraciones

			// $vcard="BEGIN:VCARD\r\nVERSION:3.0\r\nN:".$emp->Est_nombre.";Empresa de origen:\r\nADR;TYPE=dom,home,postal,parcel: ;;123 Main Street;Any Town;CA;91921;\r\n
			// END:VCARD";
			// $params['data'] = $vcard;
			// $empresa="Empresa de origen: ". $emp->Est_nombre."  \r\n";
			$unidadeslincorp=array();
			$nalevines=0;
			
			foreach ($unidades as $uni) {
				array_push($unidadeslincorp, $uni->Rep_identificador_unico);
			}
			$unidadeslincorp2 = array_unique($unidadeslincorp);
			$unidadeslincorp3=implode("\n",$unidadeslincorp2);
			
			foreach ($unidades as $uni) {
				$nalevines+=$uni->Det_u_e_c_alevines;
			}
						
			$eo="Empresa de origen:\r\n". $emp->Est_nombre." \r\n\r\nIdentificador único logístico:\r\n".$unidades[0]->Ue_identificador_unico_logistico;
			$undul= "\r\n\r\nUnidades Producidas dentro de la Unidad Enviada:\r\n".$unidadeslincorp3;
			$fyhe= "\r\n\r\nFecha y hora de envío:\r\n".date("d/m/Y g:i A", strtotime($unidades[0]->Ue_fecha_hora_despacho));
			$e= "\r\n\r\nEspecie:\r\n".$unidades[0]->Sci_nombre_cientifico;					
			$na="\r\n\r\nNúmero de alevines:\r\n".$nalevines;
			$ed="\r\n\r\nEmpresa de destino:\r\n".$unidades[0]->Soc_nombre;
			$data3=$eo.$undul.$fyhe.$e.$ed.$na;
				
			$params['data'] = $data3;
			$params['level'] = 'Q';
			$params['size'] = 10;
	
			//decimos el directorio a guardar el codigo qr, en este 
			//caso una carpeta en la raíz llamada qr_code
			$params['savename'] = FCPATH . "./uploads/qr_code/". $unidades[0]->Ue_identificador_unico_logistico.".png";
			//generamos el código qr
			$this->ciqrcode->generate($params);
			
			$data=array(
				'unidades'=>$this->reproduccion_model->get_trazabilidad($id_uar),
				'emp'=>$this->reproduccion_model->get_origen_comercial($this->session->userdata('id_establecimiento')),
				'img'=>$unidades[0]->Ue_identificador_unico_logistico.".png"
			);
			// $data['img'] = "qr_4.png";
		
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/reproduccion/ficha-tecnica-ul',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}

	public function agregar_unidad_comercial(){
		if($this->session->userdata('logged_in')){

			$di=  $this->input->post("di");
			$fi=  $this->input->post("fi");
			$es=  $this->input->post("especie");
			$tanque= $this->input->post("tanque");
			$nu= $this->input->post("nu");
			

			if($di!=""&& $fi!=""&& $tanque!=""&& $nu!="" && $es!=""){

				$data=array(
					'Id_tanque'=>$tanque,
					'Id_especie'=>$es,
					'Rep_identificador_unico'=>$nu,
					'Rep_fecha_ingreso_tanque'=>$fi,
					'Rep_densidad_ingreso_tanque'=>$di,
					'Rep_numero_desove'=>0,
					'Rep_estado_logico'=>1,
					'Rep_fecha_desove'=>0,		
				);
                
                if($this->reproduccion_model->add_unidad_reproduccion($data,$tanque)){
                    redirect(base_url().'Uc'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                redirect(base_url().'Vaur');
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function agregar_unidad_logistica(){
		if($this->session->userdata('logged_in')){

			$socio=  $this->input->post("socio");
			$fe=  $this->input->post("fe");
			$nil= $this->input->post("nil");			

			if($socio!=""&& $fe!=""&& $nil!=""){

				$data=array(
					'Id_socio'=>$socio,
					'Ue_fecha_hora_despacho'=>$fe,
					'Ue_identificador_unico_logistico'=>$nil,
					'Ue_estado_logico'=>1,
					'Ue_tipo'=>1
				);
                
                if($this->reproduccion_model->add_unidad_logistica($data)){
                    redirect(base_url().'Venvurg'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                redirect(base_url().'Venvur');
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function editar_unidad_logistica(){
		if($this->session->userdata('logged_in')){

			$socio=  $this->input->post("socio");
			$fe=  $this->input->post("fe");					
			$nl=  $this->input->post("nl");					

			if($socio!=""&& $fe!=""&& $nl!=""){

				$data=array(
					'Id_socio'=>$socio,
					'Ue_fecha_hora_despacho'=>$fe
				);
                
                if($this->reproduccion_model->update_unidad_logistica($data,$nl)){
                    redirect(base_url().'Venvurg'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function agregar_fecha_desove(){
		if($this->session->userdata('logged_in')){

			$fd=  $this->input->post("fd");
			$id_uc=  $this->input->post("id_uc");				
	
			if($fd!=""&& $id_uc!=""){

				                
                if($this->reproduccion_model->update_fecha_desove($fd,$id_uc)){
                    redirect(base_url().'Uc'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function agregar_unidad_comercial_a_logistica(){
		if($this->session->userdata('logged_in')){

			$ul=  $this->input->post("ul");
			$uc=  $this->input->post("uc");			
			$na=  $this->input->post("nale");			
						

			if($ul!=""&& $uc!="" && $na!=""){

				// 'Det_u_e_c_porcentaje'=>intval($porcentaje),
				$data=array(
					'Id_unidad_creada_reproduccion'=>$uc,
					'Id_unidad_enviada'=>$ul,					
					'Det_u_e_c_alevines'=>$na					
				);
                
                if($this->reproduccion_model->add_detalle_enviada_reproduccion($data,$uc,$ul)){
                    redirect(base_url().'Uc'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                redirect(base_url().'Vaucl/'.$uc);
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function editar_unidad_comercial_a_logistica(){
		if($this->session->userdata('logged_in')){

			
			$d= $this->input->post("d");
			$na= $this->input->post("nale");
			$ue= $this->input->post("ue");
			
			// $porcentaje= $this->input->post("p");			

			if(  $d!="" && $na!=""){
				
				// 'Det_u_e_c_porcentaje'=>intval($porcentaje),				
				$data=array(				
					'Det_u_e_c_alevines'=>intval($na),				
				);
                
                if($this->reproduccion_model->update_detalle_enviada_reproduccion($data,$d)){
                    redirect(base_url().'Vela/'.$ue); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function archivar_unidad_logistica(int $id){
		if($this->session->userdata('logged_in')){

			if( $id!=""){
				
                if($this->reproduccion_model->archivar_unidad_logistica($id)=='ok'){
                    redirect(base_url().'Venvurg'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                redirect(base_url().'Venvurg'); 
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	public function boton_archivar_unidad_comercial(int $id){
		if($this->session->userdata('logged_in')){

			if( $id!=""){
				
                if($this->reproduccion_model->archivar_unidad_comercial($id)=='ok'){
                    redirect(base_url().'Uc'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }
            }else{                
                redirect(base_url().'Uc'); 
            }		
			         
			
		}else{
			redirect(base_url());
		}
		
	}
	
	
	
	

	
}
