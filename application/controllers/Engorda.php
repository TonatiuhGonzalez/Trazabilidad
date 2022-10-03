<?php
defined('BASEPATH') or exit('No direct script access allowed');
//este controlador se encarga de manejar el submodulo de engorda encontrado en el modulo de actividades 

class Engorda extends CI_Controller
{
	// funcion del metodo constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->model('engorda_model');
	}
	// carga las unidades producidas de engorda
	public function index()
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'unidades' => $this->engorda_model->get_unidades_activas_comerciales()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/unidades-creadas-engorda', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de las unidades enviadas activas
	public function vista_unidades_enviadas_activas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->engorda_model->get_unidades_activas_enviadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/unidades-enviadas-activas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de las unidades producidas archivadas
	// pero se quito esta funcionalidad ya que se determino que era mejor tenerla 
	// en las unidades enviadas archivadas
	public function vista_unidades_comerciales_archivadas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->engorda_model->get_unidades_comerciales_desactivadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/unidades-comerciales-archivadas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga el historico de las unidades enviadas  
	public function vista_unidades_logisticas_archivadas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->engorda_model->get_unidades_logisticas_desactivadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/unidades-logisticas-archivadas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar una unidad producida
	public function vista_agregar_unidad_comercial()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'tanques' => $this->engorda_model->get_tanques(),
				'especies' => $this->engorda_model->get_especies(),
				'unidades' => $this->engorda_model->get_unidades_recibidas(),
				'identificadores' => $this->engorda_model->get_unidades_comerciales_desactivadas()


			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/agregar-unidad-comercial', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de las unidades recibidas
	// esta funcionalidad se oculto, ya que se determino que para el caso de la acuicola Maria del Carmen
	// es mejor que el sistema genere en automatico la unidad recibida
	public function vista_general_unidades_recibidas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->engorda_model->get_unidades_recibidas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/unidades-recibidas-general', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga el historico de las unidades recibidas
	// esta funcionalidad se oculto, ya que se determino que para el caso de la acuicola Maria del Carmen
	// es mejor que el sistema genere en automatico la unidad recibida
	public function vista_general_unidades_recibidas_archivadas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->engorda_model->get_unidades_recibidas_archivadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/unidades-recibidas-archivadas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para ver a detalle que contiene la unidad recibida archivada
	// esta funcionalidad se oculto, ya que se determino que para el caso de la acuicola Maria del Carmen
	// es mejor que el sistema genere en automatico la unidad recibida
	public function vista_ver_unidad_recibida_archivada(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->engorda_model->get_unidad_recibida_archivada($id)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/ver-unidad-recibida-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para ver a detalle que contiene una unidad recibida activa 
	// esta funcionalidad se oculto, ya que se determino que para el caso de la acuicola Maria del Carmen
	// es mejor que el sistema genere en automatico la unidad recibida
	public function vista_ver_unidad_recibida_activa(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidad' => $this->engorda_model->get_unidad_recibida($id)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/ver-unidad-recibida-activa', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar una unidad recibida
	// esta funcionalidad se oculto, ya que se determino que para el caso de la acuicola Maria del Carmen
	// es mejor que el sistema genere en automatico la unidad recibida
	public function vista_agregar_unidad_recibida()
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'socios' => $this->engorda_model->get_socios()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/agregar-unidad-recibida', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para editar una unidad recibida 
	// esta funcionalidad se oculto, ya que se determino que para el caso de la acuicola Maria del Carmen
	// es mejor que el sistema genere en automatico la unidad recibida
	public function vista_editar_unidad_recibida(int $id_ur)
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'socios' => $this->engorda_model->get_socios(),
				'unidad' => $this->engorda_model->get_unidad_recibida($id_ur),
				'id_ur' => $id_ur
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/editar-unidad-recibida', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	
	// carga la pagina para agregar una unidad enviada
	public function vista_agregar_unidad_enviada()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->engorda_model->get_unidades_activas_comerciales(),
				'socios' => $this->engorda_model->get_socios(),
				'identificadores' => $this->engorda_model->get_identificadores_unicos_logisticos()

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/agregar-unidad-enviada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	// crea la pagina para cargar una unidad producida en una unidad enviada
	public function vista_agregar_unidad_comercial_a_enviada(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->engorda_model->get_unidades_activas_enviadas(),
				'uc' => $this->engorda_model->get_unidad_comercial($id),
				'id_unidad' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/agregar-unidad-comercial-a-enviada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	// crea la pagina para editar la unidad producida dentro de la unidad enviada
	public function vista_editar_unidad_comercial_a_logistica(int $ul, int $de)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->engorda_model->get_unidades_activas_enviadas(),
				'uc' => $this->engorda_model->get_detalle_envio_comercial($de),
				'id_unidad_enviada' => $ul
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/editar-unidad-comercial-a-logistica', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	// crea la pagina para editar la unidad enviada
	public function vista_editar_unidad_logistica(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->engorda_model->get_unidad_logistica_activa($id),
				'socios' => $this->engorda_model->get_socios(),
				'ul' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/editar-unidad-logistica', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	// crea la pagina para ver la unidad enviada 
	public function vista_ver_unidad_logistica(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->engorda_model->get_unidad_logistica_activa($id),
				'socios' => $this->engorda_model->get_socios(),
				'ul' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/ver-unidad-logistica', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	//crea la pagina para ver una unidad enviada en especifico  
	public function vista_ver_unidad_logistica_archivada(string $id2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));


			$data = array(
				'unidades' => $this->engorda_model->get_unidad_logistica_activa($id),
				'ul' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/ver-unidad-logistica-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	
	public function vista_parametros_unidad_comercial_archivada(string $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {

			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->engorda_model->get_parametros_unidad_comercial_archivada($id),
				'uc' => $this->engorda_model->get_unidad_comercial($id),
				'id_ul' => $this->engorda_model->get_unidad_logistica_activa($id_ul)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/parametros-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_limpieza_unidad_comercial_archivada(string $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->engorda_model->get_limpieza_unidad_comercial_archivada($id),
				'uc' => $this->engorda_model->get_unidad_comercial($id),
				'id_ul' => $this->engorda_model->get_unidad_logistica_activa($id_ul)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/limpieza-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_alimentacion_unidad_comercial_archivada(string $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {

			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->engorda_model->get_alimentacion_unidad_comercial_archivada($id),
				'uc' => $this->engorda_model->get_unidad_comercial($id),
				'id_ul' => $this->engorda_model->get_unidad_logistica_activa($id_ul)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/alimentacion-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_enfermedades_unidad_comercial_archivada(string $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->engorda_model->get_enfermedades_unidad_comercial_archivada($id),
				'id_uar' => $id,
				'uc' => $this->engorda_model->get_unidad_comercial($id),
				'id_ul' => $this->engorda_model->get_unidad_logistica_activa($id_ul)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/enfermedades-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_tratamientos_unidad_comercial_archivada(string $id2, string $id_uar2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));
			$id_uar = intval(base64_decode($id_uar2));
			$id_ul = intval(base64_decode($id_ul2));


			$data = array(
				'tanques' => $this->engorda_model->get_tratamientos_unidad_comercial_archivada($id),
				'id_uar' => $id_uar,
				'uc' => $this->engorda_model->get_unidad_comercial($id_uar),
				'enf' => $this->engorda_model->get_enfermedad($id),
				'id_ul' => $this->engorda_model->get_unidad_logistica_activa($id_ul)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/tratamientos-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	public function agregar_unidad_comercial()
	{
		if ($this->session->userdata('logged_in')) {

			// $pp=  $this->input->post("pp");			
			$ul =  $this->input->post("ul");
			$di =  $this->input->post("di");
			$po =  $this->input->post("po");
			$ko =  $this->input->post("ko");
			$id_especie =  $this->input->post("especie");
			$fi =  $this->input->post("fi");
			$tanque = $this->input->post("tanque");
			$nu = $this->input->post("nu");

			if ($di != "" && $fi != "" && $tanque != "" && $nu != ""  && $ul != "" && $po != "" && $ko != "") {

				$data = array(

					'Id_unidad_recibida' => $ul,
					'Det_u_r_c_porcentaje_ocupados' => $po,
					'Det_u_r_c_kilogramos_ocupados' => $ko

				);

				$data2 = array(

					'Id_tanque' => $tanque,
					'Id_especie' => $id_especie,
					'En_identificador_unico' => $nu,
					'En_peso_promedio' => 0,
					'En_periodo_hambre' => 0,
					'En_fecha_ingreso_tanque' => $fi,
					'En_fecha_egreso_tanque' => 0,
					'En_densidad_ingreso' => $di,
					'En_porcentaje' => 100,
					'En_estado_logico' => 1

				);

				if ($this->engorda_model->add_unidad_comercial($data, $data2, $tanque, $ul, $po)) {
					redirect(base_url() . 'Uen');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vauce');
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_unidad_recibida()
	{
		if ($this->session->userdata('logged_in')) {

			$iul =  $this->input->post("iul");
			$socio =  $this->input->post("socio");
			$frul = $this->input->post("frul");
			$tr = $this->input->post("tr");
			$kr = $this->input->post("kr");

			if ($tr != "" && $frul != "" && $socio != "" && $iul != "" && $kr != "") {

				// 'Ur_fecha_hora_recepcion'=>$frul,
				$data = array(
					'Id_socio' => $socio,
					'Ur_identificador_unico_logistico' => $iul,
					'Ur_registro_temperatura' => $tr,
					'Ur_kilogramos' => $kr,
					'Ur_tipo' => 3,
					'Ur_estado_logico' => 0,
					'Ur_porcentaje' => 100,
				);

				if ($this->engorda_model->add_unidad_recibida($data, $iul)) {
					redirect(base_url() . 'Vure');
				} else {
					$this->session->set_flashdata("nomr", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Vaure');
				}
			} else {
				redirect(base_url() . 'Vaure');
			}
		} else {
			redirect(base_url());
		}
	}

	public function editar_unidad_recibida()
	{
		if ($this->session->userdata('logged_in')) {

			$iul =  $this->input->post("iul");
			$socio =  $this->input->post("socio");
			$frul = $this->input->post("frul");
			$tr = $this->input->post("tr");
			$kr = $this->input->post("kr");
			$id_ur = $this->input->post("id_ur");


			if ($tr != "" && $frul != "" && $socio != "" && $iul != "" && $kr != "" && $id_ur != "") {

				// 'Ur_fecha_hora_recepcion'=>$frul,
				$data = array(
					'Id_socio' => $socio,
					'Ur_identificador_unico_logistico' => $iul,
					'Ur_registro_temperatura' => $tr,
					'Ur_kilogramos' => $kr
				);

				if ($this->engorda_model->update_unidad_recibida($data, $id_ur, $iul)) {
					redirect(base_url() . 'Vure');
				} else {
					$this->session->set_flashdata("nomr", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Veure/' . $id_ur);
				}
			} else {
				redirect(base_url() . 'Veure/' . $id_ur);
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_fecha_eclosion()
	{
		if ($this->session->userdata('logged_in')) {

			$fe =  $this->input->post("fe");
			$id_uc =  $this->input->post("id_uc");

			if ($id_uc != "" && $fe != "") {

				$data = array(
					'Cri_fecha_eclosion' => $fe,
					'Cri_estado_logico' => 1
				);

				if ($this->engorda_model->update_fecha_eclosion($data, $id_uc)) {
					redirect(base_url() . 'Uccr');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vafee/' . $id_uc);
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_unidad_enviada()
	{
		if ($this->session->userdata('logged_in')) {

			$socio =  $this->input->post("socio");
			$fe =  $this->input->post("fe");
			$nil = $this->input->post("nil");

			if ($socio != "" && $fe != "" && $nil != "") {

				$data = array(
					'Id_socio' => $socio,
					'Ue_fecha_hora_despacho' => $fe,
					'Ue_identificador_unico_logistico' => $nil,
					'Ue_estado_logico' => 1,
					'Ue_tipo' => 3
				);

				if ($this->engorda_model->add_unidad_enviada($data)) {
					redirect(base_url() . 'Vunle');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vaunle');
			}
		} else {
			redirect(base_url());
		}
	}
	public function editar_unidad_logistica()
	{
		if ($this->session->userdata('logged_in')) {

			$socio =  $this->input->post("socio");
			$fe =  $this->input->post("fe");
			$nl =  $this->input->post("nl");

			if ($socio != "" && $fe != "" && $nl != "") {

				$data = array(
					'Id_socio' => $socio,
					'Ue_fecha_hora_despacho' => $fe
				);

				if ($this->engorda_model->update_unidad_logistica($data, $nl)) {
					redirect(base_url() . 'Vunle');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Veunle');
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_unidad_comercial_a_enviada()
	{
		if ($this->session->userdata('logged_in')) {
			$pp =  $this->input->post("pp");
			$ul =  $this->input->post("ul");
			$uc =  $this->input->post("uc");
			$kilogramos =  $this->input->post("k");
			$porcentaje = $this->input->post("p");
			$pa = $this->input->post("pa");

			if ($ul != "" && $kilogramos != "" && $pp != "" && $porcentaje != "" && $uc != "" && $pa != "") {

				$data = array(
					'Id_unidad_creada_engorda' => $uc,
					'Id_unidad_enviada' => $ul,
					'Det_u_e_eng_kilogramos' => intval($kilogramos),
					'Det_u_e_eng_porcentaje' => intval($porcentaje)

				);

				if ($this->engorda_model->add_detalle_enviada_engorda($data, $uc, $ul, $pa, $pp)) {
					redirect(base_url() . 'Uen');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vaucle/' . $uc);
			}
		} else {
			redirect(base_url());
		}
	}
	public function editar_unidad_comercial_a_logistica()
	{
		if ($this->session->userdata('logged_in')) {


			$d = $this->input->post("d");
			$kilogramos =  $this->input->post("k");
			$porcentaje = $this->input->post("p");
			$id_ue = $this->input->post("id_ue");

			if ($kilogramos != "" && $porcentaje != "" && $d != "" && $id_ue != "") {

				$data = array(
					'Det_u_e_eng_kilogramos' => intval($kilogramos),
					'Det_u_e_eng_porcentaje' => intval($porcentaje)
				);

				if ($this->engorda_model->update_detalle_enviada_engorda($data, $d)) {
					redirect(base_url() . 'Veunle/' . $id_ue);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
			}
		} else {
			redirect(base_url());
		}
	}
	public function archivar_unidad_logistica(int $id)
	{
		if ($this->session->userdata('logged_in')) {

			if ($id != "") {

				if ($this->engorda_model->archivar_unidad_logistica($id) == 'ok') {
					redirect(base_url() . 'Vunle');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vunle');
			}
		} else {
			redirect(base_url());
		}
	}

	public function vista_ficha_tecnica(string $id_u, string $ul)
	{
		if ($this->session->userdata('logged_in')) {

			$id_uar = base64_decode($id_u);
			$id_ul = base64_decode($ul);
			$g = $this->engorda_model->get_informacion_comercial($id_uar);
			// $g2=$this->engorda_model->get_informacion_socio_proovedor($id_uar);
			$unidades = $this->engorda_model->get_unidades_enviadas($id_uar);
			$emp = $this->engorda_model->get_origen_comercial($this->session->userdata('id_establecimiento'));
			$parametros = $this->engorda_model->get_parametros_unidad_comercial_archivada($id_uar);
			$alimentos = $this->engorda_model->get_alimentacion_unidad_comercial_archivada($id_uar);
			$enfermedades = $this->engorda_model->get_enfermedades_unidad_comercial_archivada($id_uar);

			$this->load->library('ciqrcode');
			//hacemos configuraciones

			// $vcard="BEGIN:VCARD\r\nVERSION:3.0\r\nN:".$emp->Est_nombre.";Empresa de origen:\r\nADR;TYPE=dom,home,postal,parcel: ;;123 Main Street;Any Town;CA;91921;\r\n
			// END:VCARD";
			// $params['data'] = $vcard;
			$cont2 = 0;
			$cont = 0;
			$prom = 0;
			$ar = array();
			$ar2 = array();
			$unidadesincorp = array();
			foreach ($unidades as $unidad) {
				$cont += $unidad->Det_u_e_eng_kilogramos;
			}
			foreach ($parametros as $parametro) {
				$cont2 += 1;
				$prom += $parametro->Psq_temperatura;
			}
			if ($cont2 > 0) {
				$res = $prom / $cont2;
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
			$se2 = implode(",", $resultados2);                                                                                            //                                                                                           //   

			foreach ($unidades as $uni) {
				array_push($unidadesincorp, $uni->Ue_identificador_unico_logistico);
			}
			$unidadesincorp2 = array_unique($unidadesincorp);
			$unidadesincorp3 = implode("\n", $unidadesincorp2);                                                                                            //                                                                                           //   


			$eo = "Empresa de origen:\r\n" . $emp->Est_nombre . "\r\n\r\nIdentificador único comercial:\r\n" . $g->En_identificador_unico;
			$undul1 = "\r\n\r\nUnidades enviadas que tienen parte de esta unidad :\r\n" . $unidadesincorp3;
			$vs = "\r\n\r\nVolumen de salida unidad comercial:\r\n" . $cont . ' Kg';
			if ($cont2 > 0) {
				$at = "\r\n\r\nPromedio de temperatura:\r\n" . $res . ' °';
			} else {
				$at = "\r\n\r\nPromedio de temperatura:\r\n";
			}
			$aut = "\r\n\r\nAlimentos utilizados:\r\n" . $se;
			$enf = "\r\n\r\nEnfermedades:\r\n" . $se2;
			$fyhs = "\r\n\r\nFecha de siembra:\r\n" . date("d/m/Y g:i A", strtotime($g->En_fecha_ingreso_tanque));
			$e = "\r\n\r\nEspecie:\r\n" . $g->Sci_nombre_cientifico;
			$pp = "\r\n\r\nPeso promedio:\r\n" . $g->En_peso_promedio . " gramos";
			$tnq = "\r\n\r\nTanque:\r\n" . $g->Tnq_nombre;
			$data3 = $eo . $undul1 . $vs . $at . $aut . $enf . $fyhs . $e . $pp . $tnq;

			// $empresa="Empresa de origen: ". $emp->Est_nombre."  \r\n";
			// $params['data'] = $empresa."Identificador único comercial:"."  Rep-" . $g->Rep_identificador_unico.";Fecha de siembra:".date("d/m/Y g:i A", strtotime($g->Rep_fecha_ingreso_tanque))."; Fecha de desove:".date("d/m/Y g:i A", strtotime($g->Rep_fecha_desove))."; Empresa de destino:".$g->Soc_nombre;
			$params['data'] = $data3;
			$params['level'] = 'Q';
			$params['size'] = 10;

			//decimos el directorio a guardar el codigo qr, en este 
			//caso una carpeta en la raíz llamada qr_code
			$params['savename'] = FCPATH . "./uploads/qr_code/" . $g->En_identificador_unico . ".png";
			//generamos el código qr
			$this->ciqrcode->generate($params);

			$data = array(
				'uc' => $this->engorda_model->get_informacion_comercial($id_uar),
				'parametros' => $this->engorda_model->get_parametros_unidad_comercial_archivada($id_uar),
				'alimentos' => $this->engorda_model->get_alimentacion_unidad_comercial_archivada($id_uar),
				'enfermedades' => $this->engorda_model->get_enfermedades_unidad_comercial_archivada($id_uar),
				'unidades' => $this->engorda_model->get_unidades_enviadas($id_uar),
				'ul' => $this->engorda_model->get_unidad_logistica_activa($id_ul),
				'proovedor' => $this->engorda_model->get_informacion_socio_proovedor($id_uar),
				'emp' => $this->engorda_model->get_origen_comercial($this->session->userdata('id_establecimiento')),
				'img' => $g->En_identificador_unico . ".png"
			);
			// $data['img'] = "qr_4.png";


			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/ficha-tecnica-uc', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_ficha_tecnica_ul(string $id_u)
	{
		if ($this->session->userdata('logged_in')) {

			$id_uar = base64_decode($id_u);
			$unidades = $this->engorda_model->get_trazabilidad($id_uar);
			$emp = $this->engorda_model->get_origen_comercial($this->session->userdata('id_establecimiento'));

			$this->load->library('ciqrcode');
			//hacemos configuraciones

			// $vcard="BEGIN:VCARD\r\nVERSION:3.0\r\nN:".$emp->Est_nombre.";Empresa de origen:\r\nADR;TYPE=dom,home,postal,parcel: ;;123 Main Street;Any Town;CA;91921;\r\n
			// END:VCARD";
			// $params['data'] = $vcard;
			// $empresa="Empresa de origen: ". $emp->Est_nombre."  \r\n";
			$cont = 0;
			$unidadeslincorp=array();
			foreach ($unidades as $unidad) {
				$cont += $unidad->Det_u_e_eng_kilogramos;
			}

			foreach ($unidades as $uni) {
				array_push($unidadeslincorp, $uni->En_identificador_unico);
			}
			$unidadeslincorp2 = array_unique($unidadeslincorp);
			$unidadeslincorp3 = implode("\n", $unidadeslincorp2);

			
			$eo = "Empresa de origen:\r\n" . $emp->Est_nombre . " \r\n\r\nIdentificador único logístico:\r\n" . $unidades[0]->Ue_identificador_unico_logistico;
			$undul = "\r\n\r\nUnidades comerciales dentro de la unidad logística:\r\n" . $unidadeslincorp3;
			$fyhe = "\r\n\r\nFecha y hora de envío:\r\n" . date("d/m/Y g:i A", strtotime($unidades[0]->Ue_fecha_hora_despacho));
			$e = "\r\n\r\nEspecie:\r\n" . $unidades[0]->Sci_nombre_cientifico;
			$v = "\r\n\r\nVolumen de unidad enviada:\r\n" . $cont . ' Kg';
			$ed = "\r\n\r\nEmpresa de destino:\r\n" . $unidades[0]->Soc_nombre;
			$data3 = $eo . $undul . $fyhe . $e . $v . $ed;
					

			$params['data'] = $data3;
			$params['level'] = 'Q';
			$params['size'] = 10;

			//decimos el directorio a guardar el codigo qr, en este 
			//caso una carpeta en la raíz llamada qr_code
			$params['savename'] = FCPATH . "./uploads/qr_code/" . $unidades[0]->Ue_identificador_unico_logistico . ".png";
			//generamos el código qr
			$this->ciqrcode->generate($params);

			$data = array(
				'unidades' => $this->engorda_model->get_trazabilidad($id_uar),
				'emp' => $this->engorda_model->get_origen_comercial($this->session->userdata('id_establecimiento')),
				'img' => $unidades[0]->Ue_identificador_unico_logistico . ".png"
			);
			// $data['img'] = "qr_4.png";


			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/engorda/ficha-tecnica-ul', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
}
