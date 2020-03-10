<?php
/**
 *
 */
class Cnotas extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('mnotas');
  }

  public function index(){
    $this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('vnotas');
		$this->load->view('layout/footer');
  }

  public function getNotas(){
    echo json_encode($this->mnotas->getNotas());
  }

  public function saveNotas(){
    $param['idPer'] = $this->input->post('idPer');
    $param['n1'] = $this->input->post('n1');
    $param['n2'] = $this->input->post('n2');
    $param['n3'] = $this->input->post('n3');
    $param['n4'] = $this->input->post('n4');
    $param['nf'] = $this->input->post('nf');

    $this->mnotas->saveNotas($param);
  }



}
 ?>
