<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Routes de controlador login
$route['vu'] ="Login/validar";//valida sesion para entrar 
$route['Lo'] ="Login/logout"; //cierra sesion

//Ruta de controlador Dashboard 
$route['h'] ="Dashboard"; // te envia al dashboard

//Rutas de controlador Usuarios
$route['Ru'] ="Usuarios/vista_usuarios_activos";
$route['Av']="Usuarios/vista_agregar_usuario";
$route['Au']="Usuarios/agregar_usuario";
$route['Eu/(:num)/(:num)']="Usuarios/eliminar_usuario/$1/$2";
$route['Viu/(:num)']="Usuarios/vista_ver_usuario_activo/$1";
$route['Veu/(:num)']="Usuarios/vista_editar_usuario/$1";
$route['Edu']['POST']="Usuarios/editar_usuario";
$route['Hu']="Usuarios/vista_usuarios_inactivos";
$route['Vrea/(:num)']="Usuarios/ver_usuario_inactivo/$1";
$route['Reac/(:num)']="Usuarios/reactivausuarios/$1";
$route['Cac']="Usuarios/cambiar_contraseña";
$route['Rsc/(:num)']="Usuarios/reset_contraseña/$1";

//Rutas de controlador socios
$route['Sr']="Socios";
$route['Vas']="Socios/vistaagregarsocio"; 
$route['Asoc']="Socios/agregarsocio";
$route['Vvs/(:num)']="Socios/vistaversocio/$1";
$route['Ves/(:num)']="Socios/vistaeditarsocio/$1";
$route['Eds']['POST']="Socios/editarsocio";
$route['Els']['POST']="Socios/eliminarsocio";
$route['Hs']="Socios/vistasociosinactivos";
$route['Vrs/(:num)']="Socios/vistareactivarsocio/$1";
$route['Reacs/(:num)']="Socios/reactivarsocio/$1";

//Rutas del controlador tanques 
$route['Ta']="Tanques";
$route['At']="Tanques/vista_agregar_tanque";
$route['Agt']="Tanques/agregar_tanque";
$route['Tl/(:num)/(:num)/(:num)']="Tanques/vistaagregarlimpiezatanque/$1/$2/$3";
$route['Tal']="Tanques/agregarlimpiezatanque";
$route['Tpfq/(:any)/(:any)/(:any)']="Tanques/vista_parametros_auto/$1/$2/$3";
$route['Tpfqm/(:any)/(:any)/(:any)']="Tanques/vista_parametros_manual/$1/$2/$3";
$route['Tapfqm']="Tanques/agregar_parametros_manual";
$route['Tapfqa']="Tanques/agregar_parametros_auto";
$route['Tpfqg/(:any)/(:any)/(:any)']="Tanques/vista_parametros_general/$1/$2/$3";
$route['Tlg/(:num)/(:num)/(:num)']="Tanques/vista_limpieza_general/$1/$2/$3";
$route['Taalm/(:num)/(:num)/(:num)']="Tanques/vista_alimentacion_general/$1/$2/$3";
$route['aalm/(:num)/(:num)/(:num)']="Tanques/vista_agregar_alimentacion/$1/$2/$3";
$route['agalm']['POST']="Tanques/agregar_alimentacion";
$route['Venf/(:num)/(:num)/(:num)']="Tanques/vista_enfermedades_general/$1/$2/$3";
$route['Vaenf/(:num)/(:num)/(:num)']="Tanques/vista_agregar_enfermedad/$1/$2/$3";
$route['Veenf/(:num)/(:num)/(:num)/(:num)']="Tanques/vista_editar_enfermedad/$1/$2/$3/$4";
$route['Eenf/(:num)/(:num)/(:num)/(:num)']="Tanques/editar_enfermedad/$1/$2/$3/$4";
$route['Vvenf/(:num)/(:num)/(:num)/(:num)']="Tanques/vista_ver_enfermedad/$1/$2/$3/$4";
$route['Aenf/(:num)/(:num)/(:num)']="Tanques/agregar_enfermedad/$1/$2/$3";
$route['Vgtr/(:num)/(:num)/(:num)/(:num)']="Tanques/vista_tratamientos_general/$1/$2/$3/$4";
$route['Vatr/(:num)/(:num)/(:num)/(:num)']="Tanques/vista_agregar_tratamiento/$1/$2/$3/$4";
$route['Atr/(:num)/(:num)/(:num)/(:num)']="Tanques/agregar_tratamiento/$1/$2/$3/$4";
$route['Vtd']="Tanques/vista_tanques_desactivados";
$route['Actd/(:num)']="Tanques/activar_tanque/$1";
$route['Vafte/(:num)/(:num)/(:num)/(:num)']="Tanques/vista_agregar_termino_enf/$1/$2/$3/$4";
$route['Afte/(:num)/(:num)/(:num)/(:num)']="Tanques/agregar_termino_enf/$1/$2/$3/$4";
$route['Veta/(:num)']="Tanques/vista_editar_tanque/$1";
$route['Etan']['POST']="Tanques/editar_tanque";


//Rutas del controlador almacen
$route['Al']="Almacen";
$route['Aal']="Almacen/vista_agregar_alimento";
$route['Aalm']['POST']="Almacen/agregar_alimento";
$route['almd/(:num)/(:num)']="Almacen/vista_ver_alimento/$1/$2";
$route['edalm/(:num)']="Almacen/vista_editar_alimento/$1";
$route['Ralm/(:num)']="Almacen/editar_alimento/$1";
$route['Alme']="Almacen/vista_general_medico";
$route['Alam']="Almacen/vista_agregar_medico";
$route['Amed']="Almacen/agregar_medico";
$route['Emed/(:num)']="Almacen/vista_editar_medico/$1";
$route['Eme/(:num)']="Almacen/editar_medico/$1";
$route['Vmed/(:num)/(:num)']="Almacen/vista_ver_medico/$1/$2";
$route['Vaarch']="Almacen/vista_alimentos_archivados";
$route['Vmarch']="Almacen/vista_medicos_archivados";

//Rutas del controlador Reproduccion
$route['Uc']="Reproduccion";
$route['Vaur']="Reproduccion/vista_agregar_unidad_comercial";
$route['Aur']="Reproduccion/agregar_unidad_comercial";
$route['Veur']="Reproduccion/vista_editar_unidad_comercial";
$route['Venvur']="Reproduccion/vista_agregar_unidad_logistica";
$route['Venvurg']="Reproduccion/vista_unidades_enviadas_activas";
$route['Aenvur']="Reproduccion/agregar_unidad_logistica";
$route['Vaucl/(:num)']="Reproduccion/vista_agregar_unidad_comercial_a_logistica/$1";
$route['Aucl']="Reproduccion/agregar_unidad_comercial_a_logistica";
$route['Vula/(:num)']="Reproduccion/vista_ver_unidad_logistica/$1";
$route['Vularch/(:num)']="Reproduccion/vista_ver_unidad_logistica_archivada/$1";
$route['Vela/(:num)']="Reproduccion/Vista_editar_unidad_logistica/$1";
$route['Eul']="Reproduccion/editar_unidad_logistica";
$route['Vecl/(:num)/(:num)']="Reproduccion/Vista_editar_unidad_comercial_a_logistica/$1/$2";
$route['Edcl']="Reproduccion/editar_unidad_comercial_a_logistica";
$route['Gul/(:num)']="Reproduccion/archivar_unidad_logistica/$1";
$route['Vuard']="Reproduccion/vista_unidades_comerciales_archivadas";
$route['Vularc']="Reproduccion/vista_unidades_logisticas_archivadas";
$route['Vparc/(:any)/(:any)']="Reproduccion/vista_parametros_unidad_comercial_archivada/$1/$2";
$route['Vlimarc/(:any)/(:any)']="Reproduccion/vista_limpieza_unidad_comercial_archivada/$1/$2";
$route['Vaarc/(:any)/(:any)']="Reproduccion/vista_alimentacion_unidad_comercial_archivada/$1/$2";
$route['Venarc/(:any)/(:any)']="Reproduccion/vista_enfermedades_unidad_comercial_archivada/$1/$2";
$route['Vtratarc/(:any)/(:any)/(:any)']="Reproduccion/vista_tratamientos_unidad_comercial_archivada/$1/$2/$3";
$route['Vafd/(:num)']="Reproduccion/vista_agregar_fecha_desove/$1";
$route['Afd']['POST']="Reproduccion/agregar_fecha_desove";
$route['Vtrs/(:any)/(:any)']="Reproduccion/vista_ficha_tecnica/$1/$2";
$route['Vtul/(:any)']="Reproduccion/vista_ficha_tecnica_ul/$1";
$route['Vgde/(:num)']="Reproduccion/vista_grafica_desove/$1";
$route['Bauc/(:num)']="Reproduccion/boton_archivar_unidad_comercial/$1";


//Rutas del controlador crianza
$route['Uccr']="Crianza";
$route['Vaucc']="Crianza/vista_agregar_unidad_comercial";
$route['Vgurc']="Crianza/vista_general_unidades_recibidas";
$route['Vgurcd']="Crianza/vista_general_unidades_recibidas_archivadas";
$route['Vvurcd/(:num)']="Crianza/vista_ver_unidad_recibida_archivada/$1";
$route['Vafee/(:num)']="Crianza/vista_agregar_fecha_eclosion/$1";
$route['Afee']['post']="Crianza/agregar_fecha_eclosion";
$route['Vaurc']="Crianza/vista_agregar_unidad_recibida";
$route['Veurc/(:num)']="Crianza/vista_editar_unidad_recibida/$1";
$route['Vvurc/(:num)']="Crianza/vista_ver_unidad_recibida_activa/$1";
$route['Eurc']="Crianza/editar_unidad_recibida";
$route['Aurc']="Crianza/agregar_unidad_recibida";
$route['Vaucom']="Crianza/vista_agregar_unidad_comercial";
$route['Aucom']="Crianza/agregar_unidad_comercial";
$route['Vauclc/(:num)']="Crianza/vista_agregar_unidad_comercial_a_enviada/$1";
$route['Auclc']="Crianza/agregar_unidad_comercial_a_enviada";
$route['Vueac']="Crianza/vista_unidades_enviadas_activas";
$route['Vaul']="Crianza/vista_agregar_unidad_enviada";
$route['Aauec']="Crianza/agregar_unidad_enviada";
$route['Vvula/(:num)']="Crianza/vista_ver_unidad_logistica/$1";
$route['Veula/(:num)']="Crianza/vista_editar_unidad_logistica/$1";
$route['Eula']="Crianza/editar_unidad_logistica";
$route['Veulauc/(:num)/(:num)']="Crianza/vista_editar_unidad_comercial_a_logistica/$1/$2";
$route['Eulauc']="Crianza/editar_unidad_comercial_a_logistica";
$route['Aulac/(:num)']="Crianza/archivar_unidad_logistica/$1";
$route['Vulacr']="Crianza/vista_unidades_logisticas_archivadas";
$route['Vvueacr/(:any)']="Crianza/vista_ver_unidad_logistica_archivada/$1";
$route['Vuarc']="Crianza/vista_unidades_comerciales_archivadas";
$route['Vpac/(:any)/(:any)']="Crianza/vista_parametros_unidad_comercial_archivada/$1/$2";
$route['Vlimpc/(:any)/(:any)']="Crianza/vista_limpieza_unidad_comercial_archivada/$1/$2";
$route['Vac/(:any)/(:any)']="Crianza/vista_alimentacion_unidad_comercial_archivada/$1/$2";
$route['Venc/(:any)/(:any)']="Crianza/vista_enfermedades_unidad_comercial_archivada/$1/$2";
$route['Vtrenc/(:any)/(:any)/(:any)']="Crianza/vista_tratamientos_unidad_comercial_archivada/$1/$2/$3";
$route['Vftlc/(:any)/(:any)']="Crianza/vista_ficha_tecnica/$1/$2";
$route['Vftcc/(:any)']="Crianza/vista_ficha_tecnica_ul/$1";
$route['Vctuc/(:any)/(:any)']="Crianza/vista_cambiar_tanque/$1/$2";
$route['Vht/(:any)']="Crianza/vista_historial_tanques/$1";
$route['Ctc']['POST']="Crianza/cambiar_tanque";


//Rutas del controlador engorda
$route['Uen']="Engorda";
$route['Vure']="Engorda/vista_general_unidades_recibidas";
$route['Vaure']="Engorda/vista_agregar_unidad_recibida";
$route['Aure']['POST']="Engorda/agregar_unidad_recibida";
$route['Vvure/(:num)']="Engorda/vista_ver_unidad_recibida_activa/$1";
$route['Veure/(:num)']="Engorda/vista_editar_unidad_recibida/$1";
$route['Eure']['POST']="Engorda/editar_unidad_recibida";
$route['Vurae']="Engorda/vista_general_unidades_recibidas_archivadas";
$route['Vvurearc/(:num)']="Engorda/vista_ver_unidad_recibida_archivada/$1";
$route['Vauce']="Engorda/vista_agregar_unidad_comercial";
$route['Auce']['POST']="Engorda/agregar_unidad_comercial";
$route['Vunle']="Engorda/vista_unidades_enviadas_activas";
$route['Vaunle']="Engorda/vista_agregar_unidad_enviada";
$route['Aunle']="Engorda/agregar_unidad_enviada";
$route['Veunle/(:num)']="Engorda/vista_editar_unidad_logistica/$1";
$route['Eunle']['POST']="Engorda/editar_unidad_logistica";
$route['Vvunle/(:num)']="Engorda/vista_ver_unidad_logistica/$1";
$route['Veucle/(:num)/(:num)']="Engorda/vista_editar_unidad_comercial_a_logistica/$1/$2";
$route['Eucle']['POST']="Engorda/editar_unidad_comercial_a_logistica";
$route['Aule/(:num)']="Engorda/archivar_unidad_logistica/$1";
$route['Vulearc']="Engorda/vista_unidades_logisticas_archivadas";
$route['Vvulearc/(:any)']="Engorda/vista_ver_unidad_logistica_archivada/$1";
$route['Vaucle/(:num)']="Engorda/vista_agregar_unidad_comercial_a_enviada/$1";
$route['Aucle']['POST']="Engorda/agregar_unidad_comercial_a_enviada";
$route['Vucearc']="Engorda/vista_unidades_comerciales_archivadas";
$route['Vpucear/(:any)/(:any)']="Engorda/vista_parametros_unidad_comercial_archivada/$1/$2";
$route['Vlucear/(:any)/(:any)']="Engorda/vista_limpieza_unidad_comercial_archivada/$1/$2";
$route['Vaucear/(:any)/(:any)']="Engorda/vista_alimentacion_unidad_comercial_archivada/$1/$2";
$route['Venfucear/(:any)/(:any)']="Engorda/vista_enfermedades_unidad_comercial_archivada/$1/$2";
$route['Vtratucear/(:any)/(:any)/(:any)']="Engorda/vista_tratamientos_unidad_comercial_archivada/$1/$2/$3";
$route['Vftce/(:any)/(:any)']="Engorda/vista_ficha_tecnica/$1/$2";
$route['Vftle/(:any)']="Engorda/vista_ficha_tecnica_ul/$1";
//Rutas del controlador establecimiento
$route['Vpe']="Establecimiento";
$route['Vees/(:num)']="Establecimiento/vista_editar_establecimiento/$1";
$route['Ees']['POST']="Establecimiento/editar_establecimiento";
$route['Vaes']="Establecimiento/vista_añadir_establecimiento";
$route['Aes']['POST']="Establecimiento/añadir_establecimiento";
//Rutas del controlador SIGETA
$route['IniSige'] = 'SIGETAcontroller';