<?php
defined('BASEPATH') or exit('No direct script access allowed');
//este controlador se va a encargar de los permisos y la redireccion a los correspondientes controladores

class Tanques extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tanque_model');
	}
	public function index()
	{
		if ($this->session->userdata('logged_in')) {


			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-activos-tanques', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}

	public function vista_agregar_tanque()
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'especies' => $this->tanque_model->getespecies()
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_editar_tanque(int $id)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanque' => $this->tanque_model->get_tanque($id),
				'id_tnq' => $id
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/editar-tanque', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function agregar_tanque()
	{
		if ($this->session->userdata('logged_in')) {

			$nombre =  $this->input->post("nombretanque");
			$fecha = $this->input->post("fecha");
			if ($nombre != "") {
				if ($this->tanque_model->verificar_nombre_add(strtoupper($nombre))) {
					$this->session->set_flashdata("nomr", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'At');
				} else {

					if ($this->tanque_model->addtanque(strtoupper($nombre), $fecha)) {
						redirect(base_url() . 'Ta');
					} else {
						$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					}
				}
			} else {
				redirect(base_url() . 'At');
			}
		} else {
			redirect(base_url());
		}
	}
	public function editar_tanque()
	{
		if ($this->session->userdata('logged_in')) {

			$nombre =  $this->input->post("nombretanque");
			// $especie = $this->input->post("especie");
			$fecha = $this->input->post("fecha");
			$id = $this->input->post("id");
			if ($nombre != "" && $fecha != "" && $id != "") {
				if ($this->tanque_model->verificar_nombre_editar(strtoupper($nombre), $id)) {
					$this->session->set_flashdata("nomr", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Veta/' . $id);
				} else {
					$data = array(
						'Tnq_nombre' => strtoupper($nombre),
						'Tnq_fecha_alta' => $fecha,
					);

					if ($this->tanque_model->update_tanque($data, $id)) {
						redirect(base_url() . 'Ta');
					} else {
						$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
					}
				}
			} else {
				redirect(base_url() . 'Veta');
			}
		} else {
			redirect(base_url());
		}
	}
	public function vistaagregarlimpiezatanque(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'fechai' => $this->tanque_model->get_fecha_ingreso($id_uc, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar-limpieza-tanques', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_agregar_alimentacion(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'fechai' => $this->tanque_model->get_fecha_ingreso($id_uc, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'insumos' => $this->tanque_model->get_insumo(),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar-alimentacion', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_agregar_enfermedad(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'fechai' => $this->tanque_model->get_fecha_ingreso($id_uc, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_editar_enfermedad(int $id_tanque, int $id_uc, int $id_enf, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'enfermedad' => $this->tanque_model->get_enfermedad($id_enf, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'id_enf' => $id_enf,
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-editar-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_ver_enfermedad(int $id_tanque, int $id_uc, int $id_enf, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->get_tratamientos($id_enf, $tipo),
				'enfermedad' => $this->tanque_model->get_enfermedad($id_enf, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'id_enf' => $id_enf,
				'tipo' => $tipo,
				'tnq' => $this->tanque_model->get_tanque($id_tanque),
				'enf' => $this->tanque_model->get_enfermedad($id_enf, $tipo)
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-ver-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_agregar_tratamiento(int $id_tanque, int $id_uc, int $id_enfe, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'insumos' => $this->tanque_model->get_insumos_medicos($id_enfe),
				'fechai' => $this->tanque_model->get_fecha_inicio_enfermedad($id_enfe, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_enfermedad' => $id_enfe,
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo,
				'enf' => $this->tanque_model->get_enfermedad($id_enfe, $tipo)
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar-tratamiento', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_agregar_insumo_medico(int $id)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'insumos' => $this->tanque_model->get_insumos_medico(),
				'id_tanque' => $id
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_limpieza_general(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->get_limpieza_tanque($id_uc, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo,
				'tnq' => $this->tanque_model->get_tanque($id_tanque)

			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-limpieza-general-tanques', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_enfermedades_general(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->get_enfermedades($id_uc, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo,
				'tnq' => $this->tanque_model->get_tanque($id_tanque)

			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-enfermedades-general', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_agregar_termino_enf(int $id_tanque, int $id_uc, int $enf, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'fechai' => $this->tanque_model->get_fecha_inicio_enfermedad($enf, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo,
				'id_enf' => $enf,
				'tnq' => $this->tanque_model->get_tanque($id_tanque),
				'enf' => $this->tanque_model->get_enfermedad($enf, $tipo)

			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-agregar-termino-enfermedad', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_tratamientos_general(int $id_tanque, int $id_uc, int $id_enf, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {
			$data = array(
				'tanques' => $this->tanque_model->get_tratamientos($id_enf, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_enf' => $id_enf,
				'id_uc' => $id_uc,
				'tipo' => $tipo,
				'tnq' => $this->tanque_model->get_tanque($id_tanque),
				'enf' => $this->tanque_model->get_enfermedad($id_enf, $tipo)
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-tratamientos-general', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function agregarlimpiezatanque()
	{
		if ($this->session->userdata('logged_in')) {

			$id_usuario = $this->input->post("usuario");
			$id_tanque = $this->input->post("tanque");
			$id_uc = $this->input->post("uc");
			$fecha = $this->input->post("fecha");
			$tipo = $this->input->post("tipo");


			if ($id_usuario != "" && $id_tanque != "" && $fecha != "" && $tipo != "" && $id_uc != "") {
				switch ($tipo) {
					case 1:
						$data = array(
							'Fecha_limpieza' => $fecha,
							'Id_usuario' => $id_usuario,
							'Id_unidad_creada_reproduccion' => $id_uc
						);

						break;
					case 2:
						$data = array(
							'Fecha_limpieza' => $fecha,
							'Id_usuario' => $id_usuario,
							'Id_unidad_creada_crianza' => $id_uc
						);

						break;
					case 3:
						$data = array(
							'Fecha_limpieza' => $fecha,
							'Id_usuario' => $id_usuario,
							'Id_unidad_creada_engorda' => $id_uc
						);

						break;
				}

				if ($this->tanque_model->addlimpieza($data, $tipo)) {
					redirect(base_url() . 'Tlg/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Tl' . $id_tanque . '/' . $id_uc . '/' . $tipo);
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_alimentacion()
	{
		if ($this->session->userdata('logged_in')) {

			$id_usuario = $this->input->post("usuario");
			$id_tanque = $this->input->post("tanque");
			$id_uc = $this->input->post("uc");
			$insu = $this->input->post("insumo");
			$cantidad = $this->input->post("cantidad");
			$fecha = $this->input->post("fecha");
			$tipo = $this->input->post("tipo");

			// $dein= preg_replace('([^A-Za-z0-9 ])', '',$this->input->post("densidadingreso"));
			if ($id_usuario != "" && $id_tanque != "" && $insu != "" && $cantidad != "" && $fecha != "" && $tipo != "") {
				$cantidadt = intval($cantidad);
				switch ($tipo) {
					case 1:
						$datos = array(
							'Id_unidad_creada_reproduccion' => $id_uc,
							'Id_insumo_alimentario' => $insu,
							'Id_usuario' => $id_usuario,
							'Ali_fecha_hora' => $fecha,
							'Ali_cantidad_de_alimento_gramos' => $cantidadt

						);
						break;
					case 2:
						$datos = array(
							'Id_unidad_creada_crianza' => $id_uc,
							'Id_insumo_alimentario' => $insu,
							'Id_usuario' => $id_usuario,
							'Ali_fecha_hora' => $fecha,
							'Ali_cantidad_de_alimento_gramos' => $cantidadt

						);
						break;
					case 3:
						$datos = array(
							'Id_unidad_creada_engorda' => $id_uc,
							'Id_insumo_alimentario' => $insu,
							'Id_usuario' => $id_usuario,
							'Ali_fecha_hora' => $fecha,
							'Ali_cantidad_de_alimento_gramos' => $cantidadt

						);
						break;
				}


				if ($this->tanque_model->add_alimentacion($datos, $cantidadt, $insu, $tipo)) {
					redirect(base_url() . 'Taalm/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'aalm' . $id_tanque . '/' . $id_uc . '/' . $tipo);
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_enfermedad(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {

			$nombre = $this->input->post("ne");
			$fecha = $this->input->post("fecha");


			if ($nombre != "" && $fecha != "") {

				switch ($tipo) {
					case 1:
						$datos = array(
							'Id_unidad_creada_reproduccion' => $id_uc,
							'Enf_nombre' => strtoupper($nombre),
							'Enf_fecha_inicio' => $fecha,
							'Enf_fecha_termino' => 0

						);
						break;
					case 2:
						$datos = array(
							'Id_unidad_creada_crianza' => $id_uc,
							'Enf_nombre' => strtoupper($nombre),
							'Enf_fecha_inicio' => $fecha,
							'Enf_fecha_termino' => 0

						);
						break;
					case 3:
						$datos = array(
							'Id_unidad_creada_engorda' => $id_uc,
							'Enf_nombre' => strtoupper($nombre),
							'Enf_fecha_inicio' => $fecha,
							'Enf_fecha_termino' => 0

						);
						break;
				}


				if ($this->tanque_model->add_enfermedad($datos, $tipo)) {
					redirect(base_url() . 'Venf/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vaenf/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_termino_enf(int $id_tanque, int $id_uc, int $tipo, int $id_enf)
	{
		if ($this->session->userdata('logged_in')) {

			$fecha = $this->input->post("fecha");

			if ($fecha != "") {

				$datos = array(
					'Enf_fecha_termino' => $fecha
				);

				if ($this->tanque_model->update_termino_enfermedad($datos, $id_enf, $tipo)) {
					redirect(base_url() . 'Venf/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Venf/' . $id_tanque . '/' . $id_uc . '/' . $id_enf . '/' . $tipo);
			}
		} else {
			redirect(base_url());
		}
	}
	public function editar_enfermedad(int $id_tanque, int $id_uc, int $id_enf, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {

			$nombre = $this->input->post("ne");
			$fecha = $this->input->post("fecha");


			if ($nombre != "" && $fecha != "") {

				$datos = array(
					'Enf_nombre' => strtoupper($nombre),
					'Enf_fecha_inicio' => $fecha
				);


				if ($this->tanque_model->update_enfermedad($datos, $id_enf, $tipo)) {
					redirect(base_url() . 'Venf/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vaenf/' . $id_tanque . '/' . $id_uc . '/' . $tipo);
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_tratamiento(int $id_tanque, int $id_uc, int $id_enfermedad, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {

			$cu = $this->input->post("cu");
			$insumo = $this->input->post("insumo");
			$fecha = $this->input->post("fecha");


			if ($cu != "" && $fecha != "" && $insumo != "") {

				switch ($tipo) {
					case 1:
						$datos = array(
							'Id_enfermedad_reproduccion' => $id_enfermedad,
							'Id_insumo_medico' => $insumo,
							'Det_trat_insu_cantidad_utilizada' => $cu,
							'Det_trat_insu_fecha_tratamiento' => $fecha,

						);
						break;
					case 2:
						$datos = array(
							'Id_enfermedad_crianza' => $id_enfermedad,
							'Id_insumo_medico' => $insumo,
							'Det_trat_insu_cantidad_utilizada' => $cu,
							'Det_trat_insu_fecha_tratamiento' => $fecha,

						);
						break;
					case 3:
						$datos = array(
							'Id_enfermedad_engorda' => $id_enfermedad,
							'Id_insumo_medico' => $insumo,
							'Det_trat_insu_cantidad_utilizada' => $cu,
							'Det_trat_insu_fecha_tratamiento' => $fecha,

						);
						break;
				}


				if ($this->tanque_model->add_tratamiento($datos, $insumo, $cu, $tipo)) {
					redirect(base_url() . 'Vgtr/' . $id_tanque . '/' . $id_uc . '/' . $id_enfermedad . '/' . $tipo);
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vatr/' . $id_tanque . '/' . $id_uc . '/' . $id_enfermedad . '/' . $tipo);
			}
		} else {
			redirect(base_url());
		}
	}
	public function vista_parametros_auto(string $id_t, string $id_u, string $t)
	{
		if ($this->session->userdata('logged_in')) {

			$id_tanque = intval(base64_decode($id_t));
			$id_unidad = intval(base64_decode($id_u));
			$tipo = intval(base64_decode($t));

			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_unidad),
				'id_tanque' => $id_tanque,
				'id_unidad' => $id_unidad,
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-parametros-automatico-tanque', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_parametros_manual(string $id_t, string $id_u, string $t)
	{
		$id_tanque = intval(base64_decode($id_t));
		$id_unidad = intval(base64_decode($id_u));
		$tipo = intval(base64_decode($t));

		if ($this->session->userdata('logged_in')) {

			$data = array(
				'tanques' => $this->tanque_model->gettanquesactivos(),
				'fechai' => $this->tanque_model->get_fecha_ingreso($id_unidad, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_unidad),
				'id_tanque' => $id_tanque,
				'id_unidad' => $id_unidad,
				'tipo' => $tipo
			);
			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-parametros-manual-tanque', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_parametros_general(string $id_tanq, string $id_unid, string $tip)
	{
		if ($this->session->userdata('logged_in')) {
			$id_tanque = intval(base64_decode($id_tanq));
			$id_unidad = intval(base64_decode($id_unid));
			$tipo = intval(base64_decode($tip));
			$data = array(
				'id_tanque' => $id_tanque,
				'id_unidad' => $id_unidad,
				'tipo' => $tipo,
				'tanques' => $this->tanque_model->get_parametros_tanque($id_unidad, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_unidad),
				'tnq' => $this->tanque_model->get_tanque($id_tanque)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-parametros-tanque', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_alimentacion_general(int $id_tanque, int $id_uc, int $tipo)
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'tanques' => $this->tanque_model->get_alimentacion($id_uc, $tipo),
				'uc' => $this->tanque_model->get_unidad_comercial($tipo, $id_uc),
				'id_tanque' => $id_tanque,
				'id_uc' => $id_uc,
				'tipo' => $tipo,
				'tnq' => $this->tanque_model->get_tanque($id_tanque)
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/vista-alimentacion-general', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function vista_tanques_desactivados()
	{
		if ($this->session->userdata('logged_in')) {

			$data = array(
				'tanques' => $this->tanque_model->get_tanques_desactivados()
			);

			$this->load->view('admin/template/barra-nav');
			$this->load->view('admin/template/columna');
			$this->load->view('admin/tanques/tanques-desactivados', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function activar_tanque($id)
	{
		if ($this->session->userdata('logged_in')) {
			if ($id != '') {

				if ($this->tanque_model->activar_tanque($id)) {
					redirect(base_url() . 'Vtd');
				} else {
					$this->session->set_flashdata("errordb", "ocurrio un error intente de nuevo");
				}
			} else {
				redirect(base_url() . 'Vtd');
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_parametros_manual()
	{
		if ($this->session->userdata('logged_in')) {

			$id_tanque = $this->input->post("tanque");
			$id_unidad = $this->input->post("unidad");
			$fecha = $this->input->post("fecha");
			$temperatura = $this->input->post("temperatura");
			$oxigeno = $this->input->post("oxigeno");
			$ph = $this->input->post("ph");
			$salinidad = $this->input->post("sal");
			$tipo = $this->input->post("tipo");
			if ($id_tanque != "" && $id_unidad != "" && $fecha != "" && $temperatura != "" && $oxigeno != "" && $ph != "" && $salinidad != "" && $tipo != "") {
				switch ($tipo) {
					case 1:
						$datos = array(
							'Psq_temperatura' => floatval($temperatura),
							'Psq_oxigeno' => floatval($oxigeno),
							'Psq_ph' => floatval($ph),
							'Psq_salinidad' => floatval($salinidad),
							'Psq_fecha_hora' => $fecha,
							'Id_unidad_creada_reproduccion' => intval($id_unidad)
						);
						break;
					case 2:
						$datos = array(
							'Psq_temperatura' => floatval($temperatura),
							'Psq_oxigeno' => floatval($oxigeno),
							'Psq_ph' => floatval($ph),
							'Psq_salinidad' => floatval($salinidad),
							'Psq_fecha_hora' => $fecha,
							'Id_unidad_creada_crianza' => intval($id_unidad)
						);
						break;
					case 3:
						$datos = array(
							'Psq_temperatura' => floatval($temperatura),
							'Psq_oxigeno' => floatval($oxigeno),
							'Psq_ph' => floatval($ph),
							'Psq_salinidad' => floatval($salinidad),
							'Psq_fecha_hora' => $fecha,
							'Id_unidad_creada_engorda' => intval($id_unidad)
						);
						break;
				}

				// $this->tanque_model->addparametros($datos, $tipo, $id_unidad, $fecha);
				if ($this->tanque_model->addparametros($datos, $tipo, $id_unidad, $fecha)) {
					redirect(base_url() . 'Tpfqg/' . base64_encode($id_tanque) . '/' . base64_encode($id_unidad) . '/' . base64_encode($tipo));
				} else {
					$this->session->set_flashdata("edre", "ocurrio un error intente de nuevo");
					redirect(base_url() . 'Tpfqm/' . base64_encode($id_tanque) . '/' . base64_encode($id_unidad) . '/' . base64_encode($tipo));
				}
			}else{
				$this->session->set_flashdata("edv", "ocurrio un error intente de nuevo");
				redirect(base_url() . 'Tpfqm/' . base64_encode($id_tanque) . '/' . base64_encode($id_unidad) . '/' . base64_encode($tipo));
			}
		} else {
			redirect(base_url());
		}
	}
	public function agregar_parametros_auto()
	{
		if ($this->session->userdata('logged_in')) {

			$ids = $this->input->post("tanque");
			$id_unidad = $this->input->post("unidad");
			$tip = $this->input->post("tipo");

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'txt';
			$config['max_size'] = '2084';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("archivo")) {
				// $data['erroArchv'] = $this->upload->display_errors();
				$this->session->set_flashdata("erra", "ocurrio un error intente de nuevo");
				redirect(base_url() . 'Tpfq/' . base64_encode($ids) . '/' . base64_encode($id_unidad) . '/' . base64_encode($tip));
			} else {
				$id = $this->input->post("tanque");
				$unidad = $this->input->post("unidad");
				$tipo = $this->input->post("tipo");
				$file_info = $this->upload->data();
				// echo var_dump($file_info);
				$nombrearchivo = $file_info['file_name'];
				$archivo = "./uploads/" . $nombrearchivo;
				if (file_exists($archivo)) {
					$contenido = file($archivo);

					for ($i = 0; $i < count($contenido); $i++) {
						$contenido2 = $contenido[$i];
						list($fecha, $oxigeno, $ph, $salinidad, $temperatura) = explode(",", $contenido2);
						switch ($tipo) {
							case 1:
								$datos = array(
									'Psq_temperatura' => floatval($temperatura),
									'Psq_oxigeno' => floatval($oxigeno),
									'Psq_ph' => floatval($ph),
									'Psq_salinidad' => floatval($salinidad),
									'Psq_fecha_hora' => $fecha,
									'Id_unidad_creada_reproduccion' => intval($unidad)
								);
								break;
							case 2:
								$datos = array(
									'Psq_temperatura' => floatval($temperatura),
									'Psq_oxigeno' => floatval($oxigeno),
									'Psq_ph' => floatval($ph),
									'Psq_salinidad' => floatval($salinidad),
									'Psq_fecha_hora' => $fecha,
									'Id_unidad_creada_crianza' => intval($unidad)
								);
								break;
							case 3:
								$datos = array(
									'Psq_temperatura' => floatval($temperatura),
									'Psq_oxigeno' => floatval($oxigeno),
									'Psq_ph' => floatval($ph),
									'Psq_salinidad' => floatval($salinidad),
									'Psq_fecha_hora' => $fecha,
									'Id_unidad_creada_engorda' => intval($unidad)
								);
								break;
						}


						$this->tanque_model->addparametros($datos, $tipo, $unidad, $fecha);
					}
				}

				unlink($archivo);
				redirect(base_url() . 'Tpfqg/' . base64_encode($id) . '/' . base64_encode($unidad) . '/' . base64_encode($tipo));
			}
		} else {
			redirect(base_url());
		}
	}
}
