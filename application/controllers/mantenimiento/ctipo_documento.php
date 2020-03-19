<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Ctipo_documento extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mtipo_documento');
      }
    }

    public function index(){
      $data = array(
        'tipo_documentoindex' => $this->mtipo_documento->mselecttipo_documento(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/tipo_documento/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
       $this->load->view('layout/header');
       $this->load->view('admin/tipo_documento/vadd');
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
                        'rules' => 'required|is_unique[tipo_documento.codigo]|numeric|max_length[11]'
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
              $res = $this->mtipo_documento->minserttipo_documento($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/ctipo_documento');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/ctipo_documento/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la tipo_documento');
                  $this->cadd();
                    }
                  }

    public function cedit($idtipo_documento){
      $data = array(
        'tipo_documentoedit' => $this->mtipo_documento->midupdatetipo_documento($idtipo_documento)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/tipo_documento/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idtipo_documento       = $this->input->post('txtidtipo_documento');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $tipo_documentoActual   = $this->mtipo_documento->midupdatetipo_documento($idtipo_documento);
          if ($codigo == $tipo_documentoActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[tipo_documento.codigo]';
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
                $res = $this->mtipo_documento->mupdatetipo_documento($idtipo_documento,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/ctipo_documento');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/ctipo_documento/cedit'.$idtipo_documento);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idtipo_documento);
              }
            }

            public function cdelete($idtipo_documento){
              $data = array(
                'estado' => "10",
              );
              $this->mtipo_documento->mupdatetipo_documento($idtipo_documento,$data);
              redirect(base_url().'mantenimiento/ctipo_documento');
            }

  }
 ?>
