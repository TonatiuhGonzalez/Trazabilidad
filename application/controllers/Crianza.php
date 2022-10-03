<?php
defined('BASEPATH') or exit('No direct script access allowed');
//este controlador se va a encargar del submodulo de Hormonado, que esta en el modulo de actividades

class Crianza extends CI_Controller
{
	// este es el metodo constructor
	public function __construct()
	{
		parent::__construct();
		// con esta funcion manda a llamar al modelo 
		$this->load->model('crianza_model');
	}
	// esta funcion carga la pagina de unidades producidas
	public function index()
	{
		// verifica si el usuario inicio sesion en el sistema
		if ($this->session->userdata('logged_in')) {

			// manda a traer los datos del modelo
			$data = array(
				'unidades' => $this->crianza_model->get_unidades_activas_comerciales()
			);
			// envia la parte del encabezado
			$this->load->view('admin/template/barra-nav');
			// envia la parte de la columna de navegacion
			$this->load->view('admin/template/columna');
			// envia el contenido
			$this->load->view('admin/crianza/unidades-creadas-crianza', $data);
			// envia el pie de pagina
			$this->load->view('admin/template/footer');
		} else {
			// lo envia al login para que inice sesion
			redirect(base_url());
		}
	}
	// carga la pagina para cambiar tanque 
	public function vista_cambiar_tanque(string $id_uc2, string $id_t2)
	{
		if ($this->session->userdata('logged_in')) {
			// decodifica los ides, para poder hacer las consultas en el modelo
			$id_uc = intval(base64_decode($id_uc2));
			$id_t = intval(base64_decode($id_t2));

			$data = array(
				'tanques' => $this->crianza_model->get_tanques(),
				'uc' => $this->crianza_model->get_unidad_comercial_ct($id_uc),
				'id_t' => $id_t,

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/cambiar-tanque', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de historico de tanques
	public function vista_historial_tanques(string $id_uc2)
	{
		if ($this->session->userdata('logged_in')) {


			$id_uc = intval(base64_decode($id_uc2));


			$data = array(
				'tanques' => $this->crianza_model->get_historial_tanques($id_uc),
				'uc' => $this->crianza_model->get_unidad_comercial($id_uc),
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/historial-tanques', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de unidades enviadas
	public function vista_unidades_enviadas_activas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->crianza_model->get_unidades_activas_enviadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/unidades-enviadas-activas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina del historico de las unidades producidas
	// esta vista se oculto porque se determino que es mejor buscarlas segun la unidad enviada en la cual se cargo 
	public function vista_unidades_comerciales_archivadas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->crianza_model->get_unidades_comerciales_desactivadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/unidades-comerciales-archivadas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina del histórico de las unidades enviadas
	public function vista_unidades_logisticas_archivadas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->crianza_model->get_unidades_logisticas_desactivadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/unidades-logisticas-archivadas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar una nueva unidad producida
	public function vista_agregar_unidad_comercial()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'tanques' => $this->crianza_model->get_tanques(),
				'especies' => $this->crianza_model->get_especies(),
				'unidades' => $this->crianza_model->get_unidades_recibidas(),
				'identificadores' => $this->crianza_model->get_identificadores_unicos_comerciales()

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/agregar-unidad-comercial', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina en la que se muestran las unidades recibidas activas
	// esta pagina se oculto al usuario, porque se determino que el sistema lo hiciera de manera automatica
	// cuando enviara una unidad comercial al socio Acuicola Maria del Carmen, para reducir tiempos de registro
	public function vista_general_unidades_recibidas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->crianza_model->get_unidades_recibidas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/unidades-recibidas-general', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga el historico de las unidades recibidas archivadas
	// esta pagina se oculto al usuario, porque se determino que el sistema lo hiciera de manera automatica
	// cuando enviara una unidad comercial al socio Acuicola Maria del Carmen, para reducir tiempos de registro
	public function vista_general_unidades_recibidas_archivadas()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->crianza_model->get_unidades_recibidas_archivadas()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/unidades-recibidas-archivadas', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la vista de cada unidad recibida archivada
	// esta pagina se oculto al usuario, porque se determino que el sistema lo hiciera de manera automatica
	// cuando enviara una unidad comercial al socio Acuicola Maria del Carmen, para reducir tiempos de registro
	public function vista_ver_unidad_recibida_archivada(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->crianza_model->get_unidad_recibida_archivada($id)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/ver-unidad-recibida-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de ver unidad recibida activa
	// esta pagina se oculto al usuario, porque se determino que el sistema lo hiciera de manera automatica
	// cuando enviara una unidad comercial al socio Acuicola Maria del Carmen, para reducir tiempos de registro
	public function vista_ver_unidad_recibida_activa(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidad' => $this->crianza_model->get_unidad_recibida($id)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/ver-unidad-recibida-activa', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar la fecha de eclosion de los alevines
	// esta funcionalidad se descarto debido a que sube existen altas temperaturas y es dificil el saber cuando
	// eclosionan los huevos de tilapia
	public function vista_agregar_fecha_eclosion(int $id_uc)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'id_uc' => $id_uc,
				'fecha' => $this->crianza_model->get_fecha_min_eclosion($id_uc),
				'uc' => $this->crianza_model->get_unidad_comercial($id_uc),

			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/agregar-fecha-eclosion', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para agregar una unidad recibida
	// esta pagina se oculto al usuario, porque se determino que el sistema lo hiciera de manera automatica
	// cuando enviara una unidad comercial al socio Acuicola Maria del Carmen, para reducir tiempos de registro
	public function vista_agregar_unidad_recibida()
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'socios' => $this->crianza_model->get_socios()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/agregar-unidad-recibida', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para editar una unidad recibida
	// esta pagina se oculto al usuario, porque se determino que el sistema lo hiciera de manera automatica
	// cuando enviara una unidad comercial al socio Acuicola Maria del Carmen, para reducir tiempos de registro
	public function vista_editar_unidad_recibida(int $id_ur)
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'socios' => $this->crianza_model->get_socios(),
				'unidad' => $this->crianza_model->get_unidad_recibida($id_ur),
				'id_ur' => $id_ur
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/editar-unidad-recibida', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	//carga la pagina para agregar una unidad enviada 
	public function vista_agregar_unidad_enviada()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->crianza_model->get_unidades_activas_comerciales(),
				'socios' => $this->crianza_model->get_socios(),
				'identificadores' => $this->crianza_model->get_identificadores_unicos_logisticos()

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/agregar-unidad-enviada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para registrar una la unidad producida dentro de una unidad enviada
	public function vista_agregar_unidad_comercial_a_enviada(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->crianza_model->get_unidades_activas_enviadas(),
				'uc' => $this->crianza_model->get_unidad_comercial($id),
				'id_unidad' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/agregar-unidad-comercial-a-enviada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para editar el registro de la unidad producida dentro de la unidad enviada
	public function Vista_editar_unidad_comercial_a_logistica(int $ul, int $de)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(

				'unidades' => $this->crianza_model->get_unidades_activas_enviadas(),
				'uc' => $this->crianza_model->get_detalle_envio_comercial($de),
				'id_unidad_enviada' => $ul
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/editar-unidad-comercial-a-logistica', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para  editar una unidad enviada 
	public function Vista_editar_unidad_logistica(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->crianza_model->get_unidad_logistica_activa($id),
				'socios' => $this->crianza_model->get_socios(),
				'ul' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/editar-unidad-logistica', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para ver una unidad enviada activa
	public function vista_ver_unidad_logistica(int $id)
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'unidades' => $this->crianza_model->get_unidad_logistica_activa($id),
				'socios' => $this->crianza_model->get_socios(),
				'ul' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/ver-unidad-logistica', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de la unidad logistica archivada
	public function vista_ver_unidad_logistica_archivada(string $id2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));

			$data = array(
				'unidades' => $this->crianza_model->get_unidad_logistica_activa($id),
				'ul' => $id
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/ver-unidad-logistica-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// cargar la pagina de los parametros del agua, por cada unidad producida archivada
	public function vista_parametros_unidad_comercial_archivada(string $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->crianza_model->get_parametros_unidad_comercial_archivada($id),
				'historial' => $this->crianza_model->get_historial_tanques($id),
				'uc' => $this->crianza_model->get_unidad_comercial($id),
				'id_ul' => $this->crianza_model->get_unidad_logistica_activa($id_ul)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/parametros-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	//  cargar los datos de limpieza por cada unidad producida archivada
	public function vista_limpieza_unidad_comercial_archivada(string  $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {

			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->crianza_model->get_limpieza_unidad_comercial_archivada($id),
				'uc' => $this->crianza_model->get_unidad_comercial($id),
				'historial' => $this->crianza_model->get_historial_tanques($id),
				'id_ul' => $this->crianza_model->get_unidad_logistica_activa($id_ul)

			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/limpieza-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga los datos de la alimentacion para cada unidad producida archivada
	public function vista_alimentacion_unidad_comercial_archivada(string $id2, string $id_ul2)
	{

		if ($this->session->userdata('logged_in')) {

			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->crianza_model->get_alimentacion_unidad_comercial_archivada($id),
				'uc' => $this->crianza_model->get_unidad_comercial($id),
				'historial' => $this->crianza_model->get_historial_tanques($id),
				'id_ul' => $this->crianza_model->get_unidad_logistica_activa($id_ul)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/alimentacion-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga los datos de las enfermedades que tuvo una unidad producida archivada
	public function vista_enfermedades_unidad_comercial_archivada(string $id2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));

			$data = array(
				'tanques' => $this->crianza_model->get_enfermedades_unidad_comercial_archivada($id),
				'id_uar' => $id,
				'historial' => $this->crianza_model->get_historial_tanques($id),
				'uc' => $this->crianza_model->get_unidad_comercial($id),
				'id_ul' => $this->crianza_model->get_unidad_logistica_activa($id_ul)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/enfermedades-unidad-comercial-archivada', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga los tratamientos para cada enfermedad generada en una unidad producida archivada
	public function vista_tratamientos_unidad_comercial_archivada(string $id2, string $id_uar2, string $id_ul2)
	{
		if ($this->session->userdata('logged_in')) {
			$id = intval(base64_decode($id2));
			$id_ul = intval(base64_decode($id_ul2));
			$id_uar = intval(base64_decode($id_uar2));

			$data = array(
				'tanques' => $this->crianza_model->get_tratamientos_unidad_comercial_archivada($id),
				'id_uar' => $id_uar,
				'historial' => $this->crianza_model->get_historial_tanques($id),
				'uc' => $this->crianza_model->get_unidad_comercial($id_uar),
				'enf' => $this->crianza_model->get_enfermedad($id),
				'id_ul' => $this->crianza_model->get_unidad_logistica_activa($id_ul)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/tratamientos-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST desde el formulario y se encarga de enviarlos al modelo para agregar una unidad producida
	public function agregar_unidad_comercial()
	{
		if ($this->session->userdata('logged_in')) {

			// $pp=  $this->input->post("pp");
			// $tp=  $this->input->post("tp");
			$ul =  $this->input->post("ul");
			$es =  $this->input->post("especie");
			$di =  $this->input->post("di");
			$po =  $this->input->post("po");
			$ko =  $this->input->post("ko");
			$fi =  $this->input->post("fi");
			$tanque = $this->input->post("tanque");
			$nu = $this->input->post("nu");
			// verifica que los campos recibidos, no esten vacios
			if ($di != "" && $fi != "" && $tanque != "" && $nu != "" &&  $ul != "" && $po != "" && $ko != "" && $es != "") {

				$data = array(

					'Id_unidad_recibida' => $ul,
					'Det_u_r_c_porcentaje_ocupados' => $po,
					'Det_u_r_c_kilogramos_ocupados' => $ko

				);

				$data2 = array(
					'Cri_identificador_unico' => $nu,
					'Cri_peso_promedio' => 0,
					'Cri_tamaño_promedio' => 0,
					'Cri_fecha_eclosion' => 0,
					'Cri_periodo_hambre' => 0,
					'Cri_densidad_ingreso_tanque' => $di,
					'Cri_porcentaje' => 100,
					'Cri_estado_logico' => 1,
					'Id_especie' => $es

				);
				$data3 = array(
					'Id_tanque' => $tanque,
					'Cri_fecha_ingreso_tanque' => $fi,
					'Cri_fecha_egreso_tanque' => 0
				);
				// verifica que se haga correctamente el registro de los datos 
				if ($this->crianza_model->add_unidad_comercial($data, $data2, $tanque, $ul, $po, $data3)) {
					// envia al usuario ala pagina de unidades producidas hormonado
					redirect(base_url() . 'Uccr');
				} else {
					// envia el mensaje diciendo que hubo un error al momento de hacer el registro en la base de datos
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					// reenvia al usuario a la pagina en la que agrega una unidad producida
					redirect(base_url() . 'Vaucom');
				}
			} else {
				// si estan vacios el sistema redirige al usuario a la pagina en la que agrega una unidad producida
				redirect(base_url() . 'Vaucom');
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST y se encarga de mandarlos al modelo para que agregue una unidad recibida
	// este funcionalidad se oculto para el caso de la granja Maria del Carmen, con el objetivo de agilizar los registros
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
					'Ur_kilogramos' => $kr,
					'Ur_identificador_unico_logistico' => $iul,
					'Ur_registro_temperatura' => $tr,
					'Ur_tipo' => 2,
					'Ur_estado_logico' => 0,
					'Ur_porcentaje' => 100,
				);

				if ($this->crianza_model->add_unidad_recibida($data, $iul)) {
					redirect(base_url() . 'Vgurc');
				} else {
					$this->session->set_flashdata("nomr", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Vaurc');
				}
			} else {
				redirect(base_url() . 'Vaurc');
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST y se encarga de mandarlos al modelo para actualizar el registro en la base de datos
	// este funcionalidad se oculto para el caso de la granja Maria del Carmen, con el objetivo de agilizar los registros
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

				if ($this->crianza_model->update_unidad_recibida($data, $id_ur, $iul)) {
					redirect(base_url() . 'Vgurc');
				} else {
					$this->session->set_flashdata("nomr", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Veurc/' . $id_ur);
				}
			} else {
				redirect(base_url() . 'Veurc/' . $id_ur);
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST para agregar la fecha de eclosion
	// este funcionalidad se oculto para el caso de la granja Maria del Carmen, debido a que alas altas temperaturas
	// hacen dificil distinguir esta accion
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

				if ($this->crianza_model->update_fecha_eclosion($data, $id_uc)) {
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
	// recibe los datos via POST, para despues enviarlos al modelo, y se haga el registro de la unidad enviada
	public function agregar_unidad_enviada()
	{
		if ($this->session->userdata('logged_in')) {

			$socio =  $this->input->post("socio");
			$fe =  $this->input->post("fe");
			$nil = $this->input->post("nil");
			// verifica que los datos que recibido no esten vacios
			if ($socio != "" && $fe != "" && $nil != "") {

				$data = array(
					'Id_socio' => $socio,
					'Ue_fecha_hora_despacho' => $fe,
					'Ue_identificador_unico_logistico' => $nil,
					'Ue_estado_logico' => 1,
					'Ue_tipo' => 2
				);
				// verifica que efectivamente se haya hecho el registro en la base de datos
				if ($this->crianza_model->add_unidad_enviada($data)) {
					// envia al usuario a la pagina de unidades enviadas activas
					redirect(base_url() . 'Vueac');
				} else {
					// envia el mensaje diciendo que ocurrio un problema al hacer el registro
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					// recarga la pagina para agregar una nueva unidad enviada
					redirect(base_url() . 'Vaul');
				}
			} else {
				// si esta vacio un dato, recarga la pagina para agregar una nueva unidad enviada
				redirect(base_url() . 'Vaul');
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST, posteriormente los reenvia al modelo para editar el registro de una unidad enviada
	public function editar_unidad_logistica()
	{
		if ($this->session->userdata('logged_in')) {

			$socio =  $this->input->post("socio");
			$fe =  $this->input->post("fe");
			$nl =  $this->input->post("nl");
			// verifica que los datos que recibio o esten vacios
			if ($socio != "" && $fe != "" && $nl != "") {

				$data = array(
					'Id_socio' => $socio,
					'Ue_fecha_hora_despacho' => $fe
				);
				// verifica que se haya hecho la actualizacion en la base de datos
				if ($this->crianza_model->update_unidad_logistica($data, $nl)) {
					// manda al usuario ala pagina de unidades enviadas activas
					redirect(base_url() . 'Vueac');
				} else {
					// envia mensaje de que ocurrio un error al hacer la actualizacion en la base de datos
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					// reenvia ala pagina para editar unidad enviada
					redirect(base_url() . 'Veula/' . $nl);
				}
			} else {
				// reenvia ala pagina para editar unidad enviada
				redirect(base_url() . 'Veula/' . $nl);
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos para cambiar el tanque via POST y los envia al modelo
	public function cambiar_tanque()
	{
		if ($this->session->userdata('logged_in')) {

			$t_nuevo =  $this->input->post("tanque");
			$porcentaje =  $this->input->post("porcentaje");
			$alevines =  $this->input->post("alevines");
			$t_viejo =  $this->input->post("id_t");
			$fe =  $this->input->post("fe");
			$id_uc =  $this->input->post("id_uc");
			// verifica que los datos no esten vacios
			if ($t_nuevo != "" && $fe != "" && $id_uc != "" && $t_viejo != "" && $porcentaje != "") {
				// genero una consulta para comparar el porcentaje que escribio el usuario y el que esta en la base de datos
				$uc = $this->crianza_model->get_unidad_comercial_ct($id_uc);
				if ($porcentaje == $uc->Cri_porcentaje) {
					$data = array(
						'Id_tanque' => $t_nuevo,
						'Id_unidad_creada_crianza' => $id_uc,
						'Cri_fecha_ingreso_tanque' => $fe,
						'Cri_fecha_egreso_tanque' => 0
					);
					$tipo = 1;
					$data2 = array();
					$data3 = array();
					$aleact = $uc->Cri_densidad_ingreso_tanque;
					$aleact = $aleact - $alevines;
					$porcentajeact = $uc->Cri_porcentaje;
				}
				if ($porcentaje > 2 && $porcentaje < $uc->Cri_porcentaje) {
					$data2 = array(
						'Id_detalle_unidad_recibida_creada' => $uc->Id_detalle_unidad_recibida_creada,
						'Id_especie' => $uc->Id_especie,
						'Cri_identificador_unico' => $uc->Cri_identificador_unico,
						'Cri_peso_promedio' => 0,
						'Cri_tamaño_promedio' => 0,
						'Cri_fecha_eclosion' => 0,
						'Cri_periodo_hambre' => 0,
						'Cri_densidad_ingreso_tanque' => $uc->Cri_densidad_ingreso_tanque,
						'Cri_porcentaje' => $porcentaje,
						'Cri_estado_logico' => 1,
					);
					$data3 = array(
						'Id_tanque' => $t_nuevo,
						'Cri_fecha_ingreso_tanque' => $fe,
						'Cri_fecha_egreso_tanque' => 0
					);
					$tipo = 2;
					$porcentajeact = $uc->Cri_porcentaje;
					$aleact = $uc->Cri_densidad_ingreso_tanque;
					$aleact = $aleact - $alevines;
					$data = "";
				}

				// verifica que se haya hecho el cambio de tanque en la base de datos
				if ($this->crianza_model->update_tanque($data, $fe, $id_uc, $t_viejo, $t_nuevo, $tipo, $data2, $porcentaje, $data3, $porcentajeact, $aleact)) {
					// envia al usuario a las unidades producidas de hormonado
					redirect(base_url() . 'Uccr');
				} else {
					// envia mensaje que hubo un problema al registrar en la base de datos
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					// envia al usuario ala pagina para hacer el cambio de tanque
					redirect(base_url() . 'Vctuc/' . base64_encode($id_uc) . '/' . base64_encode($t_viejo));
				}
			} else {
				// envia al usuario ala pagina para hacer el cambio de tanque
				redirect(base_url() . 'Vctuc/' . base64_encode($id_uc) . '/' . base64_encode($t_viejo));
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los datos via POST y los envia al modelo para cargar una unidad producida a una unidad enviada
	public function agregar_unidad_comercial_a_enviada()
	{
		if ($this->session->userdata('logged_in')) {

			$pp =  $this->input->post("pp");
			// $tp=  $this->input->post("tp");
			$ul =  $this->input->post("ul");
			$uc =  $this->input->post("uc");
			$kilogramos =  $this->input->post("k");
			$porcentaje = $this->input->post("p");
			$pa = $this->input->post("pa");
			// verifica que ningun campo este vacio
			if ($ul != "" && $kilogramos != "" && $pp != "" && $porcentaje != "" && $uc != "" && $pa != "") {

				$data = array(
					'Id_unidad_creada_crianza' => $uc,
					'Id_unidad_enviada' => $ul,
					'Det_u_e_cr_kilogramos' => intval($kilogramos),
					'Det_u_e_cr_porcentaje' => intval($porcentaje)

				);
				// verifica que se realizo con exito el registro en la base de datos
				if ($this->crianza_model->add_detalle_enviada_crianza($data, $uc, $ul, $pa, $pp)) {
					// redirecciona al usuario a la pagina de unidades producidas activas hormonado
					redirect(base_url() . 'Uccr');
				} else {
					// envia mensaje de error al registrar en la base de datos
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					// envia al usuario ala pagina de cargar unidad producida a unidad enviada
					redirect(base_url() . 'Vauclc/' . $uc);
				}
			} else {
				// envia al usuario ala pagina de cargar unidad	producida a unidad enviada
				redirect(base_url() . 'Vauclc/' . $uc);
			}
		} else {
			redirect(base_url());
		}
	}
	// recibe los campos via POST y los envia al modelo para hacer la actualizacion del registro en la base de datos
	public function editar_unidad_comercial_a_logistica()
	{
		if ($this->session->userdata('logged_in')) {


			$d = $this->input->post("d");
			$kilogramos =  $this->input->post("k");
			$porcentaje = $this->input->post("p");
			$id_ue = $this->input->post("id_ue");
			// verifica que los datos no esten vacios
			if ($kilogramos != "" && $porcentaje != "" && $d != "" && $id_ue != "") {

				$data = array(
					'Det_u_e_cr_kilogramos' => intval($kilogramos),
					'Det_u_e_cr_porcentaje' => intval($porcentaje)
				);
				// verifica que se haya hecho la actualizacion en la base de datos
				if ($this->crianza_model->update_detalle_enviada_crianza($data, $d)) {
					// reenvia al usuario ala pagina para editar la unidad enviada
					redirect(base_url() . 'Veula/' . $id_ue);
				} else {
					// envia un mensaje donde indica que no se actualizo en la base de datos
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					// envia al usuario ala pagina de editar unidad producida a unidad enviada
					redirect(base_url() . 'Veulauc/' . $id_ue . '/' . $d);
				}
			} else {
				// envia al usuario ala pagina de editar unidad producida a unidad enviada
				redirect(base_url() . 'Veulauc/' . $id_ue . '/' . $d);
			}
		} else {
			redirect(base_url());
		}
	}
	// se encarga de archivar la unidad enviada, recibiendo via POST
	public function archivar_unidad_logistica(int $id)
	{
		if ($this->session->userdata('logged_in')) {
			// verifica que el campo no este vacio
			if ($id != "") {
				// verifica que haya hecho el registro en la base de datos
				if ($this->crianza_model->archivar_unidad_logistica($id) == 'ok') {
					// envia al usuario a la vista de unidades enviadas activas
					redirect(base_url() . 'Vueac');
				} else {
					// envia un mensaje donde indica que hubo un problema al registrar en la base de datos
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				// envia al usuario a la vista de unidades enviadas activas
				redirect(base_url() . 'Vueac');
			}
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina para ver la ficha tecnica comercial
	public function vista_ficha_tecnica(string $id_u, string $ul)
	{
		if ($this->session->userdata('logged_in')) {

			$id_uar = base64_decode($id_u);
			$id_ul = base64_decode($ul);
			$g = $this->crianza_model->get_informacion_comercial($id_uar);
			// $g2=$this->crianza_model->get_informacion_comercial_tanque($id_uar);
			$unidades = $this->crianza_model->get_unidades_enviadas($g->Cri_identificador_unico);
			$tnmombre = $this->crianza_model->get_historial_tanques($id_uar);
			$emp = $this->crianza_model->get_origen_comercial($this->session->userdata('id_establecimiento'));
			$parametros = $this->crianza_model->get_parametros_unidad_comercial_archivada($id_uar);
			$alimentos = $this->crianza_model->get_alimentacion_unidad_comercial_archivada($id_uar);
			$enfermedades = $this->crianza_model->get_enfermedades_unidad_comercial_archivada($id_uar);
			$proovedort = $this->crianza_model->get_informacion_socio_proovedor($id_uar);

			// cargamos la libreria a utilizar para generar el codigo QR
			$this->load->library('ciqrcode');

			//hacemos configuraciones de prueba

			//  echo strtotime($tnmombre[0]->Cri_fecha_ingreso_tanque);
			// $vcard="BEGIN:VCARD\r\nVERSION:3.0\r\nN:".$emp->Est_nombre.";Empresa de origen:\r\nADR;TYPE=dom,home,postal,parcel: ;;123 Main Street;Any Town;CA;91921;\r\n
			// END:VCARD";
			// $params['data'] = $vcard;

			$cont2 = 0;
			$cont = 0;
			$prom = 0;
			$ar = array();
			$unidadesdentro = array();
			$tnnombred = array();
			$ar2 = array();

			// sumamos los kilogramos en total de toda esa unidad 
			foreach ($unidades as $unidad) {
				$cont += $unidad->Det_u_e_cr_kilogramos;
			}

			// sumamos todos los parametros de temperatura al mismo tiempo contamos cuantos son
			foreach ($parametros as $parametro) {
				$cont2 += 1;
				$prom += $parametro->Psq_temperatura;
			}
			// sacamos el promedio de parametros de temperatura
			if ($prom > 0) {
				$res = $prom / $cont2;
			} else {
				$res = 0;
			}

			// juntamos todos los nombres de los tanques en un array
			foreach ($tnmombre as $tnqn) {
				array_push($tnnombred, $tnqn->Tnq_nombre);
			}
			// eliminamos los nombres de los tanques repetidos
			$resultados45 = array_unique($tnnombred);
			// ingresamos los nombres de los tanques en una vaiable separandola por comas 
			$tnqn3 = implode(",", $resultados45);
			// echo $tnqn3;

			// colocamos todos los nombres de los alimentos en un array
			foreach ($alimentos as $alimento) {
				array_push($ar, $alimento->Ia_nombre_comercial);
			}
			// verificamos que no se repitan los nombres
			$resultados = array_unique($ar);
			// separamos por comas los nombres y los colocamos en una variable
			$se = implode(",", $resultados);

			// cargamos todos los nombres de las enfermedades en un array
			foreach ($enfermedades as $enfermedad) {
				array_push($ar2, $enfermedad->Enf_nombre);
			}
			// verificamos que no se repitan los nombres
			$resultados2 = array_unique($ar2);
			// guardamos en una variable los nombres, separados por coma
			$se2 = implode(",", $resultados2);                                                                                            //                                                                                           //   


			// colocamos todas las unidades logisticas en un array
			foreach ($unidades as $uni) {
				array_push($unidadesdentro, $uni->Ue_identificador_unico_logistico);
			}
			// verificamos que no se repitan los nombres
			$unidadesdentro2 = array_unique($unidadesdentro);
			// separamos por salto de linea las unidades y las colocamos en una vaiable
			$unidadesdentro3 = implode("\n", $unidadesdentro2);
			
			//Colocamos todo el texto con las variables para generar el Qr 
			$eo = "Empresa de origen:\r\n" . $emp->Est_nombre . "\r\n\r\nIdentificador único comercial:\r\n" . $g->Cri_identificador_unico;
			$undul1 = "\r\n\r\nUnidades enviadas que tienen parte de esta unidad :\r\n" . $unidadesdentro3;
			$vs = "\r\n\r\nVolumen de salida unidad comercial:\r\n" . $cont . ' Kg';
			$at = "\r\n\r\nPromedio de temperatura:\r\n" . $res . ' °';
			$aut = "\r\n\r\nAlimentos utilizados:\r\n" . $se;
			$enf = "\r\n\r\nEnfermedades:\r\n" . $se2;
			$fyhs = "\r\n\r\nFecha de siembra:\r\n" . date("d/m/Y g:i A", strtotime($tnmombre[0]->Cri_fecha_ingreso_tanque));
			$e = "\r\n\r\nEspecie:\r\n" . $g->Sci_nombre_cientifico;
			$pp = "\r\n\r\nPeso promedio:\r\n" . $g->Cri_peso_promedio . " gramos";
			$tnq = "\r\n\r\nTanque:\r\n" . $tnqn3;

			// juntamos todo el texto en una sola variable
			$data3 = $eo . $undul1 . $vs . $at . $aut . $enf . $fyhs . $e . $pp . $tnq;
			// cargamos los datos al Qr
			$params['data'] = $data3;
			$params['level'] = 'Q';
			// definimos el tamaño del codigo Qr
			$params['size'] = 10;

			//decimos el directorio a guardar el codigo qr, en este 
			//caso una carpeta en la raíz Trazabilidad/uploads/qr_code
			// colocamos el identificador logistico en la imagen Qr
			$params['savename'] = FCPATH . "./uploads/qr_code/" . $g->Cri_identificador_unico . ".png";
			//generamos el código qr
			$this->ciqrcode->generate($params);

			$data = array(
				'uc' => $this->crianza_model->get_informacion_comercial($id_uar),
				'parametros' => $this->crianza_model->get_parametros_unidad_comercial_archivada($id_uar),
				'alimentos' => $this->crianza_model->get_alimentacion_unidad_comercial_archivada($id_uar),
				'enfermedades' => $this->crianza_model->get_enfermedades_unidad_comercial_archivada($id_uar),
				'unidades' => $this->crianza_model->get_unidades_enviadas($g->Cri_identificador_unico),
				'proovedor' => $this->crianza_model->get_informacion_socio_proovedor($id_uar),
				'ul' => $this->crianza_model->get_unidad_logistica_activa($id_ul),
				'historial' => $this->crianza_model->get_historial_tanques($id_uar),
				'emp' => $this->crianza_model->get_origen_comercial($this->session->userdata('id_establecimiento')),
				'img' => $g->Cri_identificador_unico . ".png"
			);
			// $data['img'] = "qr_4.png";


			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/ficha-tecnica-uc', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	// carga la pagina de la ficha logistica, creando a la vez el codigo QR
	public function vista_ficha_tecnica_ul(string $id_u)
	{
		if ($this->session->userdata('logged_in')) {

			$id_uar = base64_decode($id_u);
			$unidades = $this->crianza_model->get_trazabilidad($id_uar);
			$emp = $this->crianza_model->get_origen_comercial($this->session->userdata('id_establecimiento'));
			$identificadores = $this->crianza_model->get_identificadores_unidades_comerciales($unidades[0]->Ue_identificador_unico_logistico);
			
			// Carga la libreria que ocupamos para generar el codigo qr
			$this->load->library('ciqrcode');

			//hacemos configuraciones
			// $vcard="BEGIN:VCARD\r\nVERSION:3.0\r\nN:".$emp->Est_nombre.";Empresa de origen:\r\n ;Empresa de destino: ".$g[0]->Soc_nombre."\r\n;TYPE=dom,home,postal,parcel: ;;123 Main Street;Any Town;CA;91921;\r\n
			// END:VCARD";
			// $params['data'] = $vcard;

			
			$cont = 0;
			// sumamos todos los kilogramos de cada unidad producida y los colocamos en una variable
			foreach ($unidades as $unidad) {
				$cont += $unidad->Det_u_e_cr_kilogramos;
			}

			$ar34 = array();
			// colocamos todos los identificadores en un array
			foreach ($identificadores as $unidad) {
				array_push($ar34, $unidad->Cri_identificador_unico);
			}
			// eliminas identificadores repetidos y los ingresamos en una variable
			$resultados34 = array_unique($ar34);
			// separamos por comas
			$identificadoresucdul = implode(",", $resultados34);
			// var_dump($identificadoresucdul);

			// definimos el texto que llevara el codigo QR
			$eo = "Empresa de origen:\r\n" . $emp->Est_nombre . " \r\n\r\nIdentificador único logístico:\r\n" . $unidades[0]->Ue_identificador_unico_logistico;
			$undul = "\r\n\r\nUnidades comerciales dentro de la unidad logística:\r\n" . $identificadoresucdul;
			$fyhe = "\r\n\r\nFecha y hora de envío:\r\n" . date("d/m/Y g:i A", strtotime($unidades[0]->Ue_fecha_hora_despacho));
			$e = "\r\n\r\nEspecie:\r\n" . $unidades[0]->Sci_nombre_cientifico;
			$v = "\r\n\r\nVolumen de unidad enviada:\r\n" . $cont . ' Kg';
			$ed = "\r\n\r\nEmpresa de destino:\r\n" . $unidades[0]->Soc_nombre;
			// colocamos toda la informacion en una sola variable
			$data3 = $eo . $undul . $fyhe . $e . $v . $ed;
			// cargamos la informacion al QR
			$params['data'] = $data3;
			$params['level'] = 'Q';
			$params['size'] = 10;

			//decimos el directorio a guardar el codigo qr, en este 
			//caso una carpeta en la raíz trazabilidad/uploads/qr_code
			$params['savename'] = FCPATH . "./uploads/qr_code/" . $unidades[0]->Ue_identificador_unico_logistico . ".png";
			//generamos el código qr
			$this->ciqrcode->generate($params);
			
			
			$data = array(
				'unidades' => $this->crianza_model->get_trazabilidad($id_uar),
				'emp' => $this->crianza_model->get_origen_comercial($this->session->userdata('id_establecimiento')),
				'img' => $unidades[0]->Ue_identificador_unico_logistico . ".png",
				'identificadores' => $this->crianza_model->get_identificadores_unidades_comerciales($unidades[0]->Ue_identificador_unico_logistico)
			);
			// $data['img'] = "qr_4.png";


			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/crianza/ficha-tecnica-ul', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
}
