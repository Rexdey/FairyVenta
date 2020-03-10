<?php
/**
 *
 */
class Mnotas extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function getNotas(){
    // $q = "SELECT
    //     p.idPersona, CONCAT(p.nombre, ', ', p.appaterno, ' ' , p.apmaterno) alumno,
    //     n.1B, n.2B, n.3B, n.4B, n.notafinal
    //     FROM notas n
    //     RIGHT JOIN persona p ON p.idPersona = n.idPersona"
      $this->db->select("p.idPersona, CONCAT(p.nombre, ', ', p.appaterno, ' ' , p.apmaterno) alumno,
        IFNULL(n.1B,'') a, IFNULL(n.2B,'') b, IFNULL(n.3B,'') c, IFNULL(n.4B,'') d, IFNULL(n.notafinal,'') notafinal",false);
      $this->db->from('notas n');
      $this->db->join('persona p', 'p.idPersona = n.idPersona', 'right');
      $r = $this->db->get();

      return $r->result();

  }


  public function saveNotas($param){
    $campos = array(
      'idPersona' => $param['idPer'],
      '1B' => $param['n1'],
      '2B' => $param['n2'],
      '3B' => $param['n3'],
      '4B' => $param['n4'],
      'notafinal' => $param['nf']
   );
   $this->db->insert('notas',$campos);
  }
}
 ?>
