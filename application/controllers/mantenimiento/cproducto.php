<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   *
   */
  class Cproducto extends CI_Controller
  {
    private $permisos;

    function __construct()
    {
      parent:: __construct();
      if(!$this->session->userdata('login')){
        redirect(base_url());
      }else {
        $this->load->model('mproducto');
        $this->load->model('mcombo');
      }
    }

    public function index(){
      $data = array(
        'productoindex' => $this->mproducto->mselectproducto(),
       );
       $this->load->view('layout/header');
       $this->load->view('admin/producto/vlist',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }
      // idcategoria, idformato, idmarca, idunmedida, idmedida
    public function cadd(){
      $data = array(
        'categoriacombo' => $this->mcombo->mcombotabla('categoria'),
        'formatocombo' => $this->mcombo->mcombotabla('formato'),
        'marcacombo' => $this->mcombo->mcombotabla('marca'),
        'unmedidacombo' => $this->mcombo->mcombotabla('unmedida'),
        'medidacombo' => $this->mcombo->mcombotabla('medida')
      );


       $this->load->view('layout/header');
       $this->load->view('admin/producto/vadd',$data);
       $this->load->view('layout/menu');
       $this->load->view('layout/footer');


    }

    public function cinsert(){
       $codigo      = $this->input->post('txtcodigo');
       $idcategoria = $this->input->post('txtcategoria');
       $idmarca     = $this->input->post('txtmarca');
       $idformato   = $this->input->post('txtformato');
       $idmedida    = $this->input->post('txtmedida');
       $idunmedida  = $this->input->post('txtunmedida');
       $precio      = $this->input->post('txtprecio');

              $config = array(
                array(
                        'field' => 'txtcodigo',
                        'label' => 'Código',
                        'rules' => 'required|is_unique[producto.codigo]|max_length[15]'
                )
              );

              $this->form_validation->set_rules($config);
              if($this->form_validation->run()){

              $data = array(
                'codigo'       => $codigo ,
                'idcategoria'  => $idcategoria ,
                'idmarca'      => $idmarca ,
                'idformato'    => $idformato ,
                'idmedida'     => $idmedida ,
                'idunmedida'   => $idunmedida ,
                'precio'       => $precio ,
                'estado'       => 1
              );
              $res = $this->mproducto->minsertproducto($data);
                if ($res) {
                  $this->session->set_flashdata('correcto', 'Se Guardó Correctamente');
                  redirect(base_url().'mantenimiento/cproducto');
                }else{
                  $this->session->set_flashdata('error', 'No se guardó el producto.');
                  redirect(base_url().'mantenimiento/cproducto/cadd');
                  }

                }else{
                  $this->session->set_flashdata('error','No se pudo guardar el producto');
                  $this->cadd();
                    }
                  }

    public function cedit($idproducto){
      $data = array(
        'productoedit' => $this->mproducto->midupdateproducto($idproducto)
      );
      $this->load->view('layout/header');
      $this->load->view('admin/producto/vedit',$data);
      $this->load->view('layout/menu');
      $this->load->view('layout/footer');
    }

    public function cupdate(){
      $idproducto       = $this->input->post('txtidproducto');
      $codigo            = $this->input->post('txtcodigo');
      $nombre            = $this->input->post('txtnombre');
      $descripcion       = $this->input->post('txtdescripcion');
      $estado            = $this->input->post('txtestado');
      $productoActual   = $this->mproducto->midupdateproducto($idproducto);
          if ($codigo == $productoActual->codigo) {
            $unique = '';
          }else{
            $unique = '|is_unique[producto.codigo]';
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
                $res = $this->mproducto->mupdateproducto($idproducto,$data);
                  if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardó Correctamente');
                    redirect(base_url().'mantenimiento/cproducto');
                  }else {
                    $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                    redirect(base_url().'mantenimiento/cproducto/cedit'.$idproducto);
                  }
              }else {
                $this->session->set_flashdata('error','No se pudo actualizar la categoría');
                $this->cedit($idproducto);
              }
            }

            public function cdelete($idproducto){
              $data = array(
                'estado' => "10",
              );
              $this->mproducto->mupdateproducto($idproducto,$data);
              redirect(base_url().'mantenimiento/cproducto');
            }

  }
 ?>
