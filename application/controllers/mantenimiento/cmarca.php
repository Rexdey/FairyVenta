<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Cmarca extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mmarca');
      }
    }

    public function index(){
      $data = array(
        'marcaindex' => $this->mmarca->mselectmarca(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/marca/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
       $this->load->view('layout/header');
       $this->load->view('admin/marca/vadd');
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cinsert(){
      $codigo = $this->input->post('txtcodigo');
      $nombre = $this->input->post('txtnombre');
      $descripcion = $this->input->post('txtdescripcion');

              $config = array(
                array(
                        'field' => 'txtcodigo',
                        'label' => 'Código',
                        'rules' => 'required|is_unique[marca.codigo]|numeric|max_length[11]'
                ),
                array(
                        'field' => 'txtnombre',
                        'label' => 'Nombre',
                        'rules' => 'required',
                )

              );

              $this->form_validation->set_rules($config);
              if($this->form_validation->run()){

              $data = array(
                'codigo' => $codigo ,
                'nombre' => $nombre ,
                'descripcion' => $descripcion ,
                'estado' => 1
              );
              $res = $this->mmarca->minsertmarca($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/cmarca');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/cmarca/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la marca');
                  $this->cadd();
                    }
                  }

    public function cedit($idmarca){
      $data = array(
        'marcaedit' => $this->mmarca->midupdatemarca($idmarca)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/marca/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idmarca       = $this->input->post('txtidmarca');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $marcaActual   = $this->mmarca->midupdatemarca($idmarca);
          if ($codigo == $marcaActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[marca.codigo]';
          }


          $config = array(
            array(
                    'field' => 'txtcodigo',
                    'label' => 'Código',
                    'rules' => 'required'.$unique.'|numeric|max_length[11]'
            ),
            array(
                    'field' => 'txtnombre',
                    'label' => 'Nombre',
                    'rules' => 'required',
            )
          );

          $this->form_validation->set_rules($config);
              if ($this->form_validation->run()) {
                $data = array(
                  'codigo' => $codigo ,
                  'nombre' => $nombre ,
                  'descripcion' => $descripcion ,
                  'estado' => $estado
                );
                $res = $this->mmarca->mupdatemarca($idmarca,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/cmarca');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/cmarca/cedit'.$idmarca);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idmarca);
              }
            }

            public function cdelete($idmarca){
              $data = array(
                'estado' => "10",
              );
              $this->mmarca->mupdatemarca($idmarca,$data);
              redirect(base_url().'mantenimiento/cmarca');
            }

  }
 ?>
