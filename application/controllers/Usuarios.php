<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//este controlador se va a encargar de los permisos y la redireccion a los correspondientes controladores

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usu_model');
		
	}
	public function index(){
		if($this->session->userdata('logged_in')){

			//$resultado= $this->input->post('sit');
			$data=array(
				'usuarios'=>$this->usu_model->getusuarios()
			);
			//echo json_encode($resultado);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/registro-usuarios',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_usuarios_activos(){
		if($this->session->userdata('logged_in')){

			//$resultado= $this->input->post('sit');
			
			$data=array(
				'usuarios'=>$this->usu_model->getusuarios(),
				'tipest'=>$this->usu_model->getestablecimiento()			

			);
			
			// echo json_encode($data);
            $this->load->view('admin/template/barra-nav');		
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/registro-usuarios',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}
	public function vista_agregar_usuario(){
		if($this->session->userdata('logged_in')){
			$data=array(				
				'tipest'=>$this->usu_model->getestablecimiento()

			);
			// echo json_encode($data);
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/agregar-usuario',$data);			
			$this->load->view('admin/template/footer');            
			
		}else{
			redirect(base_url());
		}
		
	}

	public function agregar_usuario(){
		if($this->session->userdata('logged_in') && $this->session->userdata('tipousuario')==4){

			$nombre= $this->input->post("nombre");
			$app= $this->input->post("apellidopaterno");
			$apm= $this->input->post("apellidomaterno");
			$nt= $this->input->post("numerot");		
			$email= $this->input->post("email");
			$tipo= $this->input->post("tipo");
			
			
			$datos=array(
				'Usu_nombre'=>strtoupper ($nombre),
				'Usu_apellido_paterno'=>strtoupper ($app),
				'Usu_apellido_materno'=>strtoupper ($apm),
				'Usu_numero_telefonico'=>$nt,
				'Usu_contraseña'=>password_hash ('12345678',PASSWORD_DEFAULT),
				'Id_establecimiento'=>$this->session->userdata('id_establecimiento'),
				'Usu_estado_logico'=>1,
				'Usu_correo_electronico'=>$email

			);
		
			if($this->usu_model->addusuarios($datos,$tipo)){
							
			
				 redirect(base_url().'Ru');

			}else{
				$this->session->set_flashdata("error","ocurrio un error intente de nuevo");
			}
			
		}else{
			redirect(base_url());
		}	
		
	}
	
	public function vista_usuarios_inactivos(){
		if($this->session->userdata('logged_in')){
			$data=array(
				'usuarios'=>$this->usu_model->usuarios_inactivos()
			);
			
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/historial-usuarios',$data);			
			$this->load->view('admin/template/footer'); 
			
		}else{
			redirect(base_url());
		}	
		
	}
	public function eliminar_usuario(int $id_usu, int $id_ie){
		if($this->session->userdata('logged_in')){
			
			
			
			if($this->usu_model->eliusuarios($id_usu,$id_ie)){						
				
				redirect(base_url()."Ru");

			}else{
				$this->session->set_flashdata("error","no se pudo");
			}
			
		}else{
			redirect(base_url());
		}	
		
	}

	public function vista_ver_usuario_activo(int $id){
		if($this->session->userdata('logged_in') ){
			$data=array(				
				'info'=>$this->usu_model->verinfo($id),
				'hist'=> $this->usu_model->histinfo($id)				
			);
			
		
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/ver-usuario',$data);			
			$this->load->view('admin/template/footer');
			
		}else{
			redirect(base_url());
		}	
		
	}
	public function vista_editar_usuario(int $id){
		if($this->session->userdata('logged_in') ){
			
			$data= $this->usu_model->verinfo($id);
		
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/edit-usuario',compact('data'));			
			$this->load->view('admin/template/footer');
			
		}else{
			redirect(base_url());
		}	
		
	}

	public function editar_usuario(){
		if($this->session->userdata('logged_in')){
			
			$id= $this->input->post("id");
			$nombre= $this->input->post("nombre");
			$app= $this->input->post("apellidopaterno");
			$apm= $this->input->post("apellidomaterno");
			$nt= $this->input->post("numerot");	
			$email= $this->input->post("email");
			$tipo= $this->input->post("tipo");
			$datos=array(
				'Usu_nombre'=>strtoupper ($nombre),
				'Usu_apellido_paterno'=>strtoupper ($app),
				'Usu_apellido_materno'=>strtoupper ($apm),
				'Usu_numero_telefonico'=>$nt,
				'Usu_correo_electronico'=>$email

			);
			
			if($this->usu_model->editinfo($id,$datos,$tipo)){							
				redirect(base_url().'Ru');

			}else{
				$this->session->set_flashdata("error","no se pudo");
			}
			
		}else{
			redirect(base_url());
		}	
		
	}
	public function cambiar_contraseña(){
		if($this->session->userdata('logged_in')){
			
			$nc= $this->input->post("nc");			
			$id= $this->input->post("id");			
			$datos=array(
				'Usu_contraseña'=>password_hash ($nc,PASSWORD_DEFAULT)
			);
			
			if($this->usu_model->update_c($id,$datos)){							
				echo 'ok';

			}else{
				$this->session->set_flashdata("error","no se pudo");
			}
			
		}else{
			redirect(base_url());
		}	
		
	}
	public function reset_contraseña(int $id){
		if($this->session->userdata('logged_in')){
			
						
			$datos=array(
				'Usu_contraseña'=>password_hash ('12345678',PASSWORD_DEFAULT)
			);
			
			if($this->usu_model->update_c($id,$datos)){							
				redirect(base_url().'Ru');

			}else{
				$this->session->set_flashdata("error","no se pudo");
			}
			
		}else{
			redirect(base_url());
		}	
		
	}
	public function ver_usuario_inactivo(int $id){
		if($this->session->userdata('logged_in')){

			$data=array(

							
				'info'=>$this->usu_model->get_usuario($id),
				'hist'=> $this->usu_model->histinfo($id)
				
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/usuarios/reactivar-usuario',$data);			
			$this->load->view('admin/template/footer');
			
		}else{
			redirect(base_url());
		}	
		
	}
	public function reactivausuarios(int $id){
		if($this->session->userdata('logged_in')){
			if($this->usu_model->reactivar($id)){
				redirect(base_url().'Hu');
			}else{
				$this->session->set_flashdata("error","Hubo un error intente mas tarde");
			}


			
		}else{
			redirect(base_url());
		}	
		
	}

	
}
