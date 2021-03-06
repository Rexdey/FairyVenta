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
        'categoriaindex' => $this->mcategoria->mselectcategoria(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/categoria/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
       $this->load->view('layout/header');
       $this->load->view('admin/categoria/vadd');
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
                        'rules' => 'required|is_unique[categoria.codigo]|numeric|max_length[11]'
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
              $res = $this->mcategoria->minsertcategoria($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/ccategoria');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/ccategoria/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la categoria');
                  $this->cadd();
                    }
                  }

    public function cedit($idcategoria){
      $data = array(
        'categoriaedit' => $this->mcategoria->midupdatecategoria($idcategoria)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/categoria/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idcategoria       = $this->input->post('txtidcategoria');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $categoriaActual   = $this->mcategoria->midupdatecategoria($idcategoria);
          if ($codigo == $categoriaActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[categoria.codigo]';
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
                $res = $this->mcategoria->mupdatecategoria($idcategoria,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/ccategoria');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/ccategoria/cedit'.$idcategoria);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idcategoria);
              }
            }

            public function cdelete($idcategoria){
              $data = array(
                'estado' => "10",
              );
              $this->mcolor->mupdatecategoria($idcategoria,$data);
              redirect(base_url().'mantenimiento/ccategoria');
            }

  }
 ?>
