<?php
/**
 *
 */
class Clogin extends CI_Controller
{

    function __construct()
    {
      parent::__construct();
      $this->load->model('mlogin');
    }
    public function index(){
      if($this->session->userdata('login')){
        redirect(base_url().'cdashboard');
      }else {
        $this->load->view('vlogin');
      }

    }
    public function ingresar(){
      $usu = $this->input->post('txtUser');
      $pass = $this->input->post('txtPass');

      $res = $this->mlogin->ingresar($usu,$pass);

      if($res == 1){
        redirect(base_url().'cdashboard');
      }else {
        // $data['mensaje'] = "Usuario o contraseña erronea";
        $this->session->set_flashdata('error','el usuario o contraseña son incorrectas');
        // $this->load->view('vlogin',$data);
        redirect(base_url());
        }
      }

      public function clogout(){
        $this->session->sess_destroy();
        redirect(base_url());
      }

}
