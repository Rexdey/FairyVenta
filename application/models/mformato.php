<?php
/**
 *
 */
class Mformato extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR formato
  public function mselectformato(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('formato');
      return $resultado->result();

  }


  //INSERTAR formato
  public function minsertformato($data){
      return  $this->db->insert('formato',$data);
  }

  //OBTENER DATOS
    public function midupdateformato($idformato){

        $this->db->where('idformato',$idformato);
        $resultado = $this->db->get('formato');
        return $resultado->row();

    }
    //MODIFICAR formato mupdateformato
      public function mupdateformato($idformato,$data){

          $this->db->where('idformato',$idformato);
          return $this->db->update('formato',$data);

      }



}
?>
