<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Cformato extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mformato');
      }
    }

    public function index(){
      $data = array(
        'formatoindex' => $this->mformato->mselectformato(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/formato/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
       $this->load->view('layout/header');
       $this->load->view('admin/formato/vadd');
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
                        'rules' => 'required|is_unique[formato.codigo]|numeric|max_length[11]'
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
              $res = $this->mformato->minsertformato($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/cformato');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/cformato/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la formato');
                  $this->cadd();
                    }
                  }

    public function cedit($idformato){
      $data = array(
        'formatoedit' => $this->mformato->midupdateformato($idformato)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/formato/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idformato       = $this->input->post('txtidformato');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $formatoActual   = $this->mformato->midupdateformato($idformato);
          if ($codigo == $formatoActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[formato.codigo]';
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
                $res = $this->mformato->mupdateformato($idformato,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/cformato');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/cformato/cedit'.$idformato);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idformato);
              }
            }

            public function cdelete($idformato){
              $data = array(
                'estado' => "10",
              );
              $this->mformato->mupdateformato($idformato,$data);
              redirect(base_url().'mantenimiento/cformato');
            }

  }
 ?>
