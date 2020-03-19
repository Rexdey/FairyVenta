<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

/**
 *
 */
class Cdashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('login')){
      redirect(base_url());
    }
  }

  public function index(){


      $this->load->view('layout/header');
      $this->load->view('admin/vdashboard');
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');




  }







}
?>
