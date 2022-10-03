<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//este controlador se va a encargar de los permisos y la redireccion a los correspondientes controladores

class Establecimiento extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('establecimiento_model');
		
	}
	public function index(){
		if($this->session->userdata('logged_in')){

			$data=array(
				'establecimientos'=>$this->establecimiento_model->get_establecimientos()
			);
			//echo json_encode($resultado);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/establecimiento/establecimientos-activos',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}		
	}
	public function vista_editar_establecimiento(int $id){
		if($this->session->userdata('logged_in')){
			
			
			$data=array(
				'establecimiento'=>$this->establecimiento_model->get_establecimiento($id),
				'tipos'=>$this->establecimiento_model->get_tipos($id)
			);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/establecimiento/editar-establecimiento',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}

	}
	public function vista_añadir_establecimiento(){
		if($this->session->userdata('logged_in')){
			
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/establecimiento/añadir-establecimiento');			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}

	}
	public function editar_establecimiento(){
		if($this->session->userdata('logged_in')){
			
			$nom=  $this->input->post("nombre");
			$calle=  $this->input->post("calle");					
			$ne=  $this->input->post("ne");					
			$numerot=  $this->input->post("numerot");					
			$lugar=  $this->input->post("lugar");					
			$cp=  $this->input->post("cp");					
			$email=  $this->input->post("email");
			$id=  $this->input->post("id_est");						
					
			$reproduccion=  $this->input->post("reproduccion");						
			$crianza=  $this->input->post("crianza");						
			$engorda=  $this->input->post("engorda");						
			$tpv=  $this->input->post("tpv");						
			$procesador=  $this->input->post("procesador");						
			$tya=  $this->input->post("tya");						
			$cym=  $this->input->post("cym");						
					
			if($nom!=""&& $calle!=""&& $ne!="" && $numerot!="" && $lugar!="" && $cp!="" && $email!="" && $id!="" ){

				$data=array(
					'Est_nombre'=>strtoupper($nom),
					'Est_calle'=>strtoupper($calle),
					'Est_numero_exterior'=>$ne,
					'Est_telefono_fijo'=>$numerot,
					'Est_lugar'=>$lugar,
					'Est_codigo_postal'=>$cp,
					'Est_correo_electronico'=>$email,
					'Est_identificador'=>132,
				);
                
                if($this->establecimiento_model->update_establecimiento($data,$id,$reproduccion,$crianza,$engorda,$tpv,$procesador,$tya,$cym)){
                    redirect(base_url().'Vpe'); 
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
	public function añadir_establecimiento(){
		if($this->session->userdata('logged_in')){
			
			$nom=  $this->input->post("nombre");
			$calle=  $this->input->post("calle");					
			$ne=  $this->input->post("ne");					
			$numerot=  $this->input->post("numerot");					
			$lugar=  $this->input->post("municipio");					
			$cp=  $this->input->post("cp");					
			$email=  $this->input->post("email");	

			$reproduccion=  $this->input->post("reproduccion");						
			$crianza=  $this->input->post("crianza");						
			$engorda=  $this->input->post("engorda");						
			$tpv=  $this->input->post("tpv");						
			$procesador=  $this->input->post("procesador");						
			$tya=  $this->input->post("tya");						
			$cym=  $this->input->post("cym");					
					

			if($nom!=""&& $calle!=""&& $ne!="" && $numerot!="" && $lugar!="" && $cp!="" && $email!=""){

				$data=array(
					'Est_nombre'=>$nom,
					'Est_calle'=>$calle,
					'Est_numero_exterior'=>$ne,
					'Est_telefono_fijo'=>$numerot,
					'Est_lugar'=>$lugar,
					'Est_codigo_postal'=>$cp,
					'Est_correo_electronico'=>$email,
					'Id_pais'=>1
					
				);
                
                if($this->establecimiento_model->add_establecimiento($data,$reproduccion,$crianza,$engorda,$tpv,$procesador,$tya,$cym)){
                    redirect(base_url().'Vpe'); 
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
	

	
}
