<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/template/body');			
			$this->load->view('admin/template/footer');
			
		}else{
			$this->load->view('admin/login');
		}
		
	}

	public function validar(){
		
		$correo=$this->input->post('nombre');
		$clave=$this->input->post('clave');
		if($correo!="" && $clave!=""){
			if($res=$this->login_model->get_usuario($correo)){
			
				// echo password_verify($clave,$res->Usu_contraseña);
				
				if(password_verify($clave,$res->Usu_contraseña) && $res->Usu_estado_logico==1){	

					$this->session->set_userdata(array( 				//set_userdata genera variables de sesion
						'nombre'=>$res->Usu_nombre.' '.$res->Usu_apellido_paterno,
						'id_usuario'=>$res->Id_usuario,
						'id_establecimiento'=> $res->Id_establecimiento,
						'identificador_unico'=> $res->Est_identificador,
						'establecimiento'=> $res->Est_nombre,
						'tipousuario'=> $res->Ie_tipo_usuario,
						'correo'=> $res->Usu_correo_electronico,
						'logged_in'=> TRUE
					));			
				redirect(base_url().'h');
				
						
				}else if(!$res || !password_verify($clave,$res->Usu_contraseña)){
					$this->session->set_flashdata("error","Contraseña no válida");
					redirect(base_url());
					// echo hash('snefru256',$clave);
				}else if($res->Usu_estado_logico==0 && password_verify($clave,$res->Usu_contraseña) ){
					$this->session->set_flashdata("error","Han desactivado tu cuenta");
					redirect(base_url());
				}
			}else{
				$this->session->set_flashdata("error","Correo no válido");
				redirect(base_url()); 
			}
		}else{
			redirect(base_url()); 
		}
		
	}
	
	public function logout(){
		$vars = array('nombre','logged_in','id_establecimiento', 'establecimiento','tipousuario','correo','id_usuario','identificador_unico');
		$this->session->unset_userdata($vars);
		redirect(base_url());
	}
	
}
