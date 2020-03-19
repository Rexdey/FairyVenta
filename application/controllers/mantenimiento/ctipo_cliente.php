<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Ctipo_cliente extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mtipo_cliente');
      }
    }

    public function index(){
      $data = array(
        'tipo_clienteindex' => $this->mtipo_cliente->mselecttipo_cliente(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/tipo_cliente/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
       $this->load->view('layout/header');
       $this->load->view('admin/tipo_cliente/vadd');
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
                        'rules' => 'required|is_unique[tipo_cliente.codigo]|numeric|max_length[11]'
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
              $res = $this->mtipo_cliente->minserttipo_cliente($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/ctipo_cliente');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/ctipo_cliente/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la tipo_cliente');
                  $this->cadd();
                    }
                  }

    public function cedit($idtipo_cliente){
      $data = array(
        'tipo_clienteedit' => $this->mtipo_cliente->midupdatetipo_cliente($idtipo_cliente)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/tipo_cliente/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idtipo_cliente       = $this->input->post('txtidtipo_cliente');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $tipo_clienteActual   = $this->mtipo_cliente->midupdatetipo_cliente($idtipo_cliente);
          if ($codigo == $tipo_clienteActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[tipo_cliente.codigo]';
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
                $res = $this->mtipo_cliente->mupdatetipo_cliente($idtipo_cliente,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/ctipo_cliente');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/ctipo_cliente/cedit'.$idtipo_cliente);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idtipo_cliente);
              }
            }

            public function cdelete($idtipo_cliente){
              $data = array(
                'estado' => "10",
              );
              $this->mtipo_cliente->mupdatetipo_cliente($idtipo_cliente,$data);
              redirect(base_url().'mantenimiento/ctipo_cliente');
            }

  }
 ?>
