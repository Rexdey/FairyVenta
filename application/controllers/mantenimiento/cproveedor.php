<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Cproveedor extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mproveedor');
        $this->load->model('mcombo');
      }
    }

    public function index(){
      $data = array(
        'proveedorindex' => $this->mproveedor->mselectproveedor(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/proveedor/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cadd(){
        $data = array(
          'tipo_documentocombo' => $this->mcombo->mcombotabla('tipo_documento'),
          'tipo_clientecombo' => $this->mcombo->mcombotabla('tipo_cliente'),
        );

       $this->load->view('layout/header');
       $this->load->view('admin/proveedor/vadd',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cinsert(){
      $idtipo_cliente      = $this->input->post('txttipo_proveedor');
      $idtipo_documento    = $this->input->post('txttipo_documento');
      $codigo              = $this->input->post('txtcodigo');
      $nombre              = $this->input->post('txtnombre');
      $direccion           = $this->input->post('txtdireccion');
      $telefono           = $this->input->post('txttelefono');


              $config = array(
                array(
                        'field' => 'txtcodigo',
                        'label' => 'Código',
                        'rules' => 'required|is_unique[proveedor.codigo]|numeric|max_length[11]'
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
              $res = $this->mproveedor->minsertproveedor($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/cproveedor');
                }else{
                  $this->session->set_flashdata('error', 'No Guardó Registro');
                  redirect(base_url().'mantenimiento/cproveedor/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar la proveedor');
                  $this->cadd();
                    }
                  }

    public function cedit($idproveedor){
      $data = array(
        'proveedoredit'         => $this->mproveedor->midupdateproveedor($idproveedor),
        'tipo_documentocombo' => $this->mcombo->mcombotabla('tipo_documento'),
        'tipo_clientecombo'   => $this->mcombo->mcombotabla('tipo_cliente'),
      );
      $this->load->view('layout/header');
      $this->load->view('admin/proveedor/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idtipo_cliente      = $this->input->post('txttipo_proveedor');
      $idtipo_documento    = $this->input->post('txttipo_documento');
      $idproveedor         = $this->input->post('txtidproveedor');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $direccion       = $this->input->post('txtdireccion');
      $telefono       = $this->input->post('txttelefono');
      $estado            = $this->input->post('txtestado');
      $proveedorActual     = $this->mproveedor->midupdateproveedor($idproveedor);
          if ($codigo == $proveedorActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[proveedor.codigo]';
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
                $res = $this->mproveedor->mupdateproveedor($idproveedor,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/cproveedor');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/cproveedor/cedit'.$idproveedor);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idproveedor);
              }
            }

            public function cdelete($idproveedor){
              $data = array(
                'estado' => "10",
              );
              $this->mproveedor->mupdateproveedor($idproveedor,$data);
              redirect(base_url().'mantenimiento/cproveedor');
            }

  }
 ?>
