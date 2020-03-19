<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Ccliente extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mcliente');
        $this->load->model('mcombo');
      }
    }

    public function index(){
      $data = array(
        'clienteindex' => $this->mcliente->mselectcliente(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/cliente/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
        $data = array(
          'tipo_documentocombo' => $this->mcombo->mcombotabla('tipo_documento'),
          'tipo_clientecombo' => $this->mcombo->mcombotabla('tipo_cliente'),
        );

       $this->load->view('layout/header');
       $this->load->view('admin/cliente/vadd',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cinsert(){
      $idtipo_cliente      = $this->input->post('txttipo_cliente');
      $idtipo_documento    = $this->input->post('txttipo_documento');
      $codigo              = $this->input->post('txtcodigo');
      $nombre              = $this->input->post('txtnombre');
      $direccion           = $this->input->post('txtdireccion');
      $telefono           = $this->input->post('txttelefono');


              $config = array(
                array(
                        'field' => 'txtcodigo',
                        'label' => 'Código',
                        'rules' => 'required|is_unique[cliente.codigo]|numeric|max_length[11]'
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
                'idtipo_documento'  => $idtipo_documento ,
                'idtipo_cliente'    => $idtipo_cliente ,
                'codigo'            => $codigo ,
                'nombre'            => $nombre ,
                'direccion'         => $direccion ,
                'telefono'          => $telefono ,
                'estado'            => 1
              );
              $res = $this->mcliente->minsertcliente($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/ccliente');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/ccliente/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la cliente');
                  $this->cadd();
                    }
                  }

    public function cedit($idcliente){
      $data = array(
        'clienteedit'         => $this->mcliente->midupdatecliente($idcliente),
        'tipo_documentocombo' => $this->mcombo->mcombotabla('tipo_documento'),
        'tipo_clientecombo'   => $this->mcombo->mcombotabla('tipo_cliente'),
      );
      $this->load->view('layout/header');
      $this->load->view('admin/cliente/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idtipo_cliente      = $this->input->post('txttipo_cliente');
      $idtipo_documento    = $this->input->post('txttipo_documento');
      $idcliente         = $this->input->post('txtidcliente');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $direccion       = $this->input->post('txtdireccion');
      $telefono       = $this->input->post('txttelefono');
      $estado            = $this->input->post('txtestado');
      $clienteActual     = $this->mcliente->midupdatecliente($idcliente);
          if ($codigo == $clienteActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[cliente.codigo]';
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
                  'idtipo_documento'  => $idtipo_documento ,
                  'idtipo_cliente'    => $idtipo_cliente ,
                  'codigo'            => $codigo ,
                  'nombre'            => $nombre ,
                  'direccion'         => $direccion ,
                  'telefono'          => $telefono ,
                  'estado'            => $estado
                );
                $res = $this->mcliente->mupdatecliente($idcliente,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/ccliente');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/ccliente/cedit'.$idcliente);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idcliente);
              }
            }

            public function cdelete($idcliente){
              $data = array(
                'estado' => "10",
              );
              $this->mcliente->mupdatecliente($idcliente,$data);
              redirect(base_url().'mantenimiento/ccliente');
            }

  }
 ?>
