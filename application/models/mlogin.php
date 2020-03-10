<?php
/**
 *
 */
class Mlogin extends CI_Model
{

  public function ingresar($usu,$pass){
    $this->db->select('*');
    $this->db->from('usuario u');
    $this->db->where('u.user',$usu);
    // $this->db->where('u.clave',$pass);

    $resultado = $this->db->get();

    if ($resultado->num_rows() == 1) {
      $r = $resultado->row();
        if (password_verify($pass, $r->pass)) {
          $s_usuario = array(
          's_idusuario' => $r->idusuario,
          's_usuario' => $r->user,
          's_nombre' => $r->nombre,
          's_idrol' => $r->idrol,
          'login'   =>  TRUE
          );

          $this->session->set_userdata($s_usuario);

          // $this->session->userdata('s_idUsuario',$r->idUsuario);
          // $this->session->userdata('s_usuario',$r->nombre. ", ".$r->appaterno);

            return 1;
        }else{
          return 0;
        }

      }else {
        return 0;
      }

      return $resultado->result();

  }
}
 ?>
