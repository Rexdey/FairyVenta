<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Csubcategoria extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('msubcategoria');
        $this->load->model('mcombo');
      }
    }

    public function index(){
      $data = array(
        'subcategoriaindex' => $this->msubcategoria->mselectsubcategoria(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/subcategoria/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
      $data = array(
        'categoriacombo' => $this->mcombo->mcombotabla('categoria'),

      );
       $this->load->view('layout/header');
       $this->load->view('admin/subcategoria/vadd',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cinsert(){
      $codigo = $this->input->post('txtcodigo');
      $nombre = $this->input->post('txtnombre');
      $descripcion = $this->input->post('txtdescripcion');
      $idcategoria = $this->input->post('txtcategoria');

              $config = array(
                array(
                        'field' => 'txtcodigo',
                        'label' => 'Código',
                        'rules' => 'required|is_unique[subcategoria.codigo]|numeric|max_length[11]'
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
                'idcategoria' => $idcategoria ,
                'estado' => 1
              );
              $res = $this->msubcategoria->minsertsubcategoria($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/csubcategoria');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/csubcategoria/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la subcategoria');
                  $this->cadd();
                    }
                  }

    public function cedit($idsubcategoria){
      $data = array(
        'categoriacombo' => $this->mcombo->mcombotabla('categoria'),
        'subcategoriaedit' => $this->msubcategoria->midupdatesubcategoria($idsubcategoria)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/subcategoria/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idsubcategoria       = $this->input->post('txtidsubcategoria');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $idcategoria       = $this->input->post('txtcategoria');
      $subcategoriaActual   = $this->msubcategoria->midupdatesubcategoria($idsubcategoria);
          if ($codigo == $subcategoriaActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[subcategoria.codigo]';
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
                  'idcategoria' => $idcategoria ,
                  'estado' => $estado
                );
                $res = $this->msubcategoria->mupdatesubcategoria($idsubcategoria,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/csubcategoria');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/csubcategoria/cedit'.$idsubcategoria);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idsubcategoria);
              }
            }

            public function cdelete($idsubcategoria){
              $data = array(
                'estado' => "10",
              );
              $this->msubcategoria->mupdatesubcategoria($idsubcategoria,$data);
              redirect(base_url().'mantenimiento/csubcategoria');
            }

  }
 ?>
