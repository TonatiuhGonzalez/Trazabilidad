<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SIGETAcontroller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->model('establecimiento_model');		
	}
	public function index(){
		if($this->session->userdata('logged_in')){
            $this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');	
			$this->load->view('admin/template/footer');
			$this->load->view('admin/SIGETA/Inicio');		
		}else{
			redirect(base_url());
		}		
	}
}
