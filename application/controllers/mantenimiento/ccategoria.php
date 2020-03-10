<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Ccategoria extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mcategoria');
      }
    }

    public function index(){
      $data = array(
        'categoriasindex' => $this->mcategoria->mselectcategoria(),
       );
       $this->load->view('layout/header');
       $this->load->view('layout/menu');
       $this->load->view('admin/categoria/vlist',$data);
       $this->load->view('layout/footer');

       
    }











  }


 ?>
