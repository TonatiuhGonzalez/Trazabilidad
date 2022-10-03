<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//este controlador se va a encargar de los permisos y la redireccion a los correspondientes controladores

class Socios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('socio_model');
		
	}
	public function index(){
		if($this->session->userdata('logged_in')){

			
		$data=array(
			'socios'=>$this->socio_model->getsociosactivos()
		);
		
		$this->load->view('admin/template/barra-nav');
		$this->load->view('admin/template/columna');
		$this->load->view('admin/socios/vista-activos-socios',$data);			
		$this->load->view('admin/template/footer');            
		
		}else{
		redirect(base_url());
		}
		
	}
	
    
	public function vistaagregarsocio(){
		if($this->session->userdata('logged_in')){					
            $data=array(
				'paises'=>$this->socio_model->getpaises()
			);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/socios/vista-agregar-socios',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function agregarsocio(){
		if($this->session->userdata('logged_in')){
            
            $nombre= preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombresocio"));
			// $idunico= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("idunico"));
			$rfc= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("rfc"));
			$calle= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("calle"));
			$numero= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("numero"));
			$colonia= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("colonia"));
			$municipio= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("municipio"));
			$estado= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("estado"));
			$numerot= $this->input->post("numerot");
			$tipo=$this->input->post("tipo");
			$email= $this->input->post("email");
			if($nombre!="" &&  $rfc!=""&& $calle!=""&& $numero!=""&& $colonia!=""&& $municipio!=""&& $numerot!=""&& $email!=""&& $tipo!="" && $estado!=""){
                $data=array(
                    'Soc_nombre'=>strtoupper($nombre),
                    'Soc_numero_de_identificacion_unico'=>0,
                    'Soc_rfc'=>$rfc,
                    'Soc_calle'=>$calle,
                    'Soc_numero_exterior'=>$numero,
                    'Soc_colonia'=>$colonia,
                    'Soc_municipio'=>$municipio,
                    'Soc_estado_logico'=>1,
                    'Soc_estado_republica'=>$estado,
                    'Soc_numero_telefono'=>$numerot,
                    'Soc_correo_electronico'=>$email,
					'Id_pais'=>1,
					"Soc_tipo"=>intval($tipo)
                );

                if($this->socio_model->addsocio($data)){
                    redirect(base_url().'Sr'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }

            }else{                
                redirect(base_url().'Vas');
            }
			
		}else{
			redirect(base_url());
		}
		
	}
	
	public function vistaversocio(int $id){

		if($this->session->userdata('logged_in')){					
            $data=array(
				'socio'=>$this->socio_model->getsocio($id),
				'paises'=>$this->socio_model->getpaises()
			);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/socios/vista-ver-socio',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vistaeditarsocio(int $id){

		if($this->session->userdata('logged_in')){					
            $data=array(
				'socio'=>$this->socio_model->getsocio($id),
				'paises'=>$this->socio_model->getpaises()
			);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/socios/vista-editar-socio',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function editarsocio(){
		if($this->session->userdata('logged_in')){
            $id=$this->input->post('id');
            $nombre= preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombresocio"));
			// $idunico= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("idunico"));
			$rfc= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("rfc"));
			$calle= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("calle"));
			$numero= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("numero"));
			$colonia= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("colonia"));
			$municipio= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("municipio"));
			$estado= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("estado"));
			$numerot= $this->input->post("numerot");
			$email= $this->input->post("email");
			$tipo= $this->input->post("tipo");
			if($nombre!="" && $rfc!=""&& $calle!=""&& $numero!=""&& $colonia!=""&& $municipio!=""&& $numerot!=""&& $email!=""&& $tipo!="" && $estado!=""){
                $data=array(
                    'Soc_nombre'=>strtoupper($nombre),
                    'Soc_numero_de_identificacion_unico'=>0,
                    'Soc_rfc'=>$rfc,
                    'Soc_calle'=>$calle,
                    'Soc_numero_exterior'=>$numero,
                    'Soc_colonia'=>$colonia,
                    'Soc_municipio'=>$municipio,
                    'Soc_estado_logico'=>1,
                    'Soc_estado_republica'=>$estado,
                    'Soc_numero_telefono'=>$numerot,
                    'Soc_correo_electronico'=>$email,
					'Id_pais'=>1,
					"Soc_tipo"=>$tipo
                );

                if($this->socio_model->editsocio($data,$id)){
                    redirect(base_url().'Sr'); 
                }else{
                    $this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
                }

            }else{                
                redirect(base_url().'Sr');
            }
			
		}else{
			redirect(base_url());
		}
		
	}
	public function eliminarsocio(){
		$id=$this->input->post('id');
		if($this->session->userdata('logged_in')){				
            
			if($this->socio_model->elisocio(intval($id))){
				echo "ok";
			}else{
				echo "mal";
			}      
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vistasociosinactivos(){
		if($this->session->userdata('logged_in')){
			
		$data=array(
			'socios'=>$this->socio_model->getsociosinactivos()
		);
		
		$this->load->view('admin/template/barra-nav');
		$this->load->view('admin/template/columna');
		$this->load->view('admin/socios/vista-inactivos-socios',$data);			
		$this->load->view('admin/template/footer');            
		
		}else{
		redirect(base_url());
		}
		
	}
	public function vistareactivarsocio(int $id){

		if($this->session->userdata('logged_in')){					
            $data=array(
				'socio'=>$this->socio_model->getsocio($id),
				'paises'=>$this->socio_model->getpaises()
			);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/socios/vista-reactivar-socio',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function reactivarsocio(int $id){

		if($this->session->userdata('logged_in')){
			if($this->socio_model->reactivarsocio($id)){
				redirect(base_url().'Hs');
			}else{
				$this->session->set_flashdata("errordb","ocurrio un error intente de nuevo");
			}
                   
			
		}else{
			redirect(base_url());
		}
		
	}

	
}
