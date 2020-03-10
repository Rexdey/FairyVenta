<?php
/**
 *
 */
class Cpersona extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('mpersona');
		$this->load->model('musuario');


	}

	public function index(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('persona/vpersona');
		$this->load->view('layout/footer');
	}
	public function guardar(){
		//persona
		$param['codigo'] = $this->input->post('txtCodigo');
		$param['nombre'] = $this->input->post('txtNombre');
		$param['apellido'] = $this->input->post('txtApellido');
		$param['user'] = $this->input->post('txtUser');
		$param['pass'] = password_hash($this->input->post('txtPass'),PASSWORD_DEFAULT);

		//a llenar
		//idusuario	codigo	nombre	apellido	telefono	user	pass	idrol	estado

		$lastId = $this->mpersona->guardar($param);

	}

	public function actualizarDatos(){
		$param['nombre'] = $this->input->post('txtNombre');
		$param['appaterno'] = $this->input->post('txtApPaterno');
		$param['apmaterno'] = $this->input->post('txtApMaterno');
		$param['email'] = $this->input->post('txtEmail');

		$this->mpersona->actualizarDatos($param);
		$this->load->view('persona/vpersona');
		// redirect('cpersona/index');
	}


	public function eliminarPersona(){
		$idP = $this->input->post('txtIdPersona');

		$this->musuario->eliminarUsuario($idP);
		$this->mpersona->eliminarPersona($idP);
	}


	public function getPersonas(){
		echo json_encode($this->mpersona->getPersonas());
	}
}
