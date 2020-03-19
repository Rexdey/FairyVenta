<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Cunmedida extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('munmedida');
      }
    }

    public function index(){
      $data = array(
        'unmedidaindex' => $this->munmedida->mselectunmedida(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/unmedida/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
       $this->load->view('layout/header');
       $this->load->view('admin/unmedida/vadd');
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
                        'rules' => 'required|is_unique[unmedida.codigo]|numeric|max_length[11]'
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
              $res = $this->munmedida->minsertunmedida($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/cunmedida');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/cunmedida/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la unmedida');
                  $this->cadd();
                    }
                  }

    public function cedit($idunmedida){
      $data = array(
        'unmedidaedit' => $this->munmedida->midupdateunmedida($idunmedida)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/unmedida/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idunmedida       = $this->input->post('txtidunmedida');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $unmedidaActual   = $this->munmedida->midupdateunmedida($idunmedida);
          if ($codigo == $unmedidaActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[unmedida.codigo]';
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
                $res = $this->munmedida->mupdateunmedida($idunmedida,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/cunmedida');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/cunmedida/cedit'.$idunmedida);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idunmedida);
              }
            }

            public function cdelete($idunmedida){
              $data = array(
                'estado' => "10",
              );
              $this->munmedida->mupdateunmedida($idunmedida,$data);
              redirect(base_url().'mantenimiento/cunmedida');
            }

  }
 ?>
