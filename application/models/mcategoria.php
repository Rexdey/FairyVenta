<?php
/**
 *
 */
class Mcategoria extends CI_Model
{

  function __construct()
  {
    // code...
  }

  public function mselectcategoria(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('categoria');
      return $resultado->result();

  }



}

 ?>
