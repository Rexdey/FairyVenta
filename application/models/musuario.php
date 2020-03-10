<?php
/**
 *
 */
class Musuario extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function guardarUsuario($param){
		$campos = array(
			'nomUsuario' => $param['nomUsuario'],
			'clave' => $param['clave'],
			'idPersona' => $param['idPersona']
		);

		$this->db->insert('usuario',$campos);
	}

	public function eliminarUsuario($idP){
		$this->db->where('idPersona',$idP);
		$this->db->delete('usuario');


	}
}
