<?php
defined('BASEPATH') or exit('No direct script access allowed');
//este controlador se encarga del modulo almacen en el sistema
//tiene los permisos y la comunicacion con el modelo almacen

// la clase Almacen hereda de la clase CI_Controler
class Almacen extends CI_Controller
{
	//metodo constructor  
	public function __construct()
	{

		parent::__construct();

		// con esta funcion manda a llamar al modelo 
		$this->load->model('almacen_model');
	}
	// esta funcion carga la pagina principal del modulo almacen la cual es Suministros Alimentarios
	public function index()
	{
		// si el usuario no ha iniciado session lo redirecciona al login 
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'alimentos' => $this->almacen_model->get_alimentos()
			);
			// envia la parte del encabezado
			$this->load->view('admin/template/barra-nav');
			// envia la parte de la columna de navegación
			$this->load->view('admin/template/columna');
			// envia el contenido
			$this->load->view('admin/almacen/vista-almacen-alimentario', $data);
			// envia el pie de pagina 
			$this->load->view('admin/template/footer');
		} else {
			// direccionamiento al login
			redirect(base_url());
		}
	}
	// carga la pagina suministros medicos
	public function vista_general_medico()
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'medicos' => $this->almacen_model->get_medicos()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-general-medico', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar un alimento
	public function vista_agregar_alimento()
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'socios' => $this->almacen_model->get_socios()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-agregar-alimento', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar un insumo medico
	public function vista_agregar_medico()
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'socios' => $this->almacen_model->get_socios_medicos()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-agregar-medico', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga el historico de suministros medicos 
	public function vista_alimentos_archivados()
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'alimentos' => $this->almacen_model->get_alimentos_archivados()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/archivo-alimentos', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga el historico de los insumos medicos
	public function vista_medicos_archivados()
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'insumos' => $this->almacen_model->get_medicos_archivados()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/archivo-medicos', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para ver suministro alimentario
	public function vista_ver_alimento(int $id, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'alimento' => $this->almacen_model->get_alimento($id),
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-ver-alimento', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para ver suministro medico
	public function vista_ver_medico(int $id, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'medico' => $this->almacen_model->get_medico($id),
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-ver-medico', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para editar un suministro alimentario
	public function vista_editar_alimento(int $id)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'alimento' => $this->almacen_model->get_alimento($id),
				'socios' => $this->almacen_model->get_socios()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-editar-alimento', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para editar un suministro medico
	public function vista_editar_medico(int $id)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'medico' => $this->almacen_model->get_medico($id),
				'socios' => $this->almacen_model->get_socios_medicos()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/almacen/vista-editar-medico', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST y hace lo necesario para mandarlos al modelo
	public function agregar_alimento()
	{
		if ($this->session->userdata('logged_in')) {
			// esta funcion recibe el nombre pero lo limita a letras y numero
			// eliminando caracteres especiales
			$nombre = preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombre"));
			$feca = $this->input->post("fc");
			// $fepro= $this->input->post("fp");
			$pp = $this->input->post("pp");
			$pg = $this->input->post("pg");
			$ph = $this->input->post("ph");
			$pc = $this->input->post("pc");
			$pf = $this->input->post("pf");
			$eln = $this->input->post("eln");
			$socio = $this->input->post("socio");
			$fr = $this->input->post("fr");
			$cr = $this->input->post("cr");
			$pu = $this->input->post("pu");
			$cn = $this->input->post("cn");
			// corrobora que desde la vista no se haya enviado campos en blanco
			if ($nombre != "" && $feca != "" &&  $pp != "" && $socio != "" && $fr != "" && $cr != "" && $pu != "" && $cn != "") {
				// convierte a valores enteros
				$cni = intval($cn);
				$cantidadt = $cni * intval($cr);
				// guarda los datos en un array para facilitar la sentencia de insertar en el modelo
				$data = array(
					'Ia_nombre_comercial' => strtoupper($nombre),
					'Ia_fecha_caducidad' => $feca,
					'Ia_fecha_de_produccion' => 0,
					'Ia_porcentaje_proteina' => $pp,
					'Ia_porcentaje_grasa' => $pg,
					'Ia_porcentaje_humedad' => $ph,
					'Ia_porcentaje_ceniza' => $pc,
					'Ia_porcentaje_fibra' => $pf,
					'Ia_porcentaje_eln' => $eln,
					'Ia_contenido_neto' => $cni

				);
				// si hace el registro de manera correcta direcciona a la vista de suministros medicos
				if ($this->almacen_model->add_alimento($data, $socio, $fr, $cr, $pu, $cantidadt)) {
					redirect(base_url() . 'Al');
				} else {
					// envia un mensaje de que hubo problemas al añadir el registro y recarga
					// la pagina de agregar suministro alimentario
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Aal');
				}
			} else {
				//si el usuario envio campos vacios lo direcciona ala la misma pagina para agregar 
				//suministros alimentarios 
				redirect(base_url() . 'Aal');
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los campos via POST desde la vista y los envia al modelo para su registro 
	public function agregar_medico()
	{
		if ($this->session->userdata('logged_in')) {

			$nombre = preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombre"));
			$feca = $this->input->post("fc");
			// $fepro= $this->input->post("fp");

			$socio = $this->input->post("socio");
			$fr = $this->input->post("fr");
			$cr = $this->input->post("cr");
			$pu = $this->input->post("pu");
			$cn = $this->input->post("cn");
			// corrobora que los campos no esten en vacios
			if ($nombre != "" && $feca != "" &&  $socio != "" && $fr != "" && $cr != "" && $pu != "" && $cn != "") {
				$cni = intval($cn);
				$cantidadt = $cni * intval($cr);
				$data = array(
					'Inm_nombre_comercial' => strtoupper($nombre),
					'Inm_fecha_caducidad' => $feca,
					'Inm_fecha_produccion' => 0,
					'Inm_contenido_neto' => $cni

				);
				// verifica si se hace el registro
				if ($this->almacen_model->add_medico($data, $socio, $fr, $cr, $pu, $cantidadt)) {
					// reenvia al usuario ala pagina de suministros medicos
					redirect(base_url() . 'Alme');
				} else {
					// envia el mensaje que ocurrio un problema al hacer el regsitro
					// envia al usuario a la pagina donde se ingresa el suministro medico
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Alam');
				}
			} else {
				// envia al usuario a la pagina donde se ingresa el suministro medico
				redirect(base_url() . 'Alam');
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los campos para editar un suministro medico y los envia al modelo
	public function editar_medico(int $id)
	{
		if ($this->session->userdata('logged_in')) {

			$nombre = preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombre"));
			$feca = $this->input->post("fc");
			// $fepro= $this->input->post("fp");

			$socio = $this->input->post("socio");
			$fr = $this->input->post("fr");
			$cr = $this->input->post("cr");
			$pu = $this->input->post("pu");
			$cn = $this->input->post("cn");
			// verifica que los campos no esten vacios
			if ($nombre != "" && $feca != "" &&  $socio != "" && $fr != "" && $cr != "" && $pu != "" && $cn != "") {
				$cni = intval($cn);
				$cantidadt = $cni * intval($cr);
				$data = array(
					'Inm_nombre_comercial' => strtoupper($nombre),
					'Inm_fecha_caducidad' => $feca,
					'Inm_fecha_produccion' => 0,
					'Inm_contenido_neto' => $cni

				);
				$data2 = array(
					'Id_socio' => $socio,
					'Pro_insu_medico_fecha_recepcion' => $fr,
					'Pro_insu_medico_cantidad_recibida' => intval($cr),
					'Pro_insu_medico_precio_unitario' => intval($pu),
					'Pro_insu_medico_cantidad_total' => $cantidadt
				);
				// verifica que  se hizo la actualizacion en la base de datos
				if ($this->almacen_model->update_medico($data, $data2, $id)) {
					// reenvia ala pagina de suministros medicos
					redirect(base_url() . 'Alme');
				} else {
					// envia el mensaje de error en la base de datos 
					// reenvia ala pagina para editar suministro
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Emed/'.$id);
				}
			} else {
				// redirecciona ala pagina para editar suministro 
				redirect(base_url() . 'Emed/'.$id);
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los campos de la pagina de editar suministro alimentario y los envia al modelo
	public function editar_alimento(int $id)
	{
		if ($this->session->userdata('logged_in')) {

			$nombre = preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombre"));
			// $nombre= preg_replace('([^A-Za-z0-9 ])', '', $this->input->post("nombre"));
			$feca = $this->input->post("fc");
			// $fepro= $this->input->post("fp");
			$pp = $this->input->post("pp");
			$pg = $this->input->post("pg");
			$ph = $this->input->post("ph");
			$pc = $this->input->post("pc");
			$pf = $this->input->post("pf");
			$eln = $this->input->post("eln");
			$socio = $this->input->post("socio");
			$fr = $this->input->post("fr");
			$cr = $this->input->post("cr");
			$pu = $this->input->post("pu");
			$cn = $this->input->post("cn");
			// verifica que los campos no esten vacios
			if ($nombre != "" && $feca != "" && $pp != "" && $socio != "" && $fr != "" && $cr != "" && $pu != "") {
				$cni = intval($cn);
				$cantidadt = $cni * intval($cr);
				$data = array(
					'Ia_nombre_comercial' => strtoupper($nombre),
					'Ia_fecha_caducidad' => $feca,
					'Ia_fecha_de_produccion' => 0,
					'Ia_porcentaje_proteina' => $pp,
					'Ia_porcentaje_grasa' => $pg,
					'Ia_porcentaje_humedad' => $ph,
					'Ia_porcentaje_ceniza' => $pc,
					'Ia_porcentaje_fibra' => $pf,
					'Ia_porcentaje_eln' => $eln,
					'Ia_contenido_neto' => $cni

				);
				$data2 = array(
					'Id_socio' => $socio,
					'Pro_insu_fecha_recepcion' => $fr,
					'Pro_insu_cantidad_recibida' => intval($cr),
					'Pro_insu_precio_unitario' => intval($pu),
					'Pro_insu_cantidad_total' => $cantidadt


				);

				// verifica que se realizó de forma satisfactoria la actualización en la base de datos
				if ($this->almacen_model->update_alimento($data, $data2, $id)) {
					// lo reenvia a la pagina de suministros alimentarios
					redirect(base_url() . 'Al');
				} else {
					// envia el mensaje, diciendo que hubo un problema al hacer la actualizacion
					// en la base de datos y reenvia ala pagina de editar suministro alimentario
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'edalm/'.$id);
				}
			} else {
				// lo reenvia ala pagina de editar suministro alimentario
				redirect(base_url() . 'edalm/'.$id);
			}
		} else {
			redirect(base_url());
		}
	}
}
