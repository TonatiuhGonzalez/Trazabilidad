<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//este controlador se va a encargar de manejar el menu principal
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
				
	}
	// esta funcion carga la pagina de menu principal
	public function index(){
		if($this->session->userdata('logged_in')){

			$data=array(
				'unidadesc'=>$this->dashboard_model->get_unidades_activas_reproduccion(),
				'unidadescr'=>$this->dashboard_model->get_unidades_activas_crianza(),
				'unidadesen'=>$this->dashboard_model->get_unidades_activas_engorda(),
				'insumosa'=>$this->dashboard_model->get_almacen_alimentario(),
				'imedico'=>$this->dashboard_model->get_almacen_medico()
			);
			// carga el encabezado
			$this->load->view('admin/template/barra-nav');
			// carga la columna de navegacion
			$this->load->view('admin/template/columna');
			// carga el contenido
			$this->load->view('admin/template/body',$data);	
			// carga el pie de pagina 
			$this->load->view('admin/template/footer');
			
			
		}else{
			redirect(base_url());
		}
		
	}
	
}
