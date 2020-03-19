<?php
/**
 *
 */
class Mcombo extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR marca
  public function mcombotabla($tabla){

      $this->db->where('estado','1');
      $resultado = $this->db->get($tabla);
      return $resultado->result();

  }





}
?>
