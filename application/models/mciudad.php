<?php
/**
 *
 */
class Mciudad extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }
  public function getCiudades($s){
    $s = $this->db->get_where('ciudades',array('sitReg' => $s));
    return $s->result();
  }
}

 ?>
