<?php
/**
 *
 */
class Munmedida extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR unmedida
  public function mselectunmedida(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('unmedida');
      return $resultado->result();

  }


  //INSERTAR unmedida
  public function minsertunmedida($data){
      return  $this->db->insert('unmedida',$data);
  }

  //OBTENER DATOS
    public function midupdateunmedida($idunmedida){

        $this->db->where('idunmedida',$idunmedida);
        $resultado = $this->db->get('unmedida');
        return $resultado->row();

    }
    //MODIFICAR unmedida mupdateunmedida
      public function mupdateunmedida($idunmedida,$data){

          $this->db->where('idunmedida',$idunmedida);
          return $this->db->update('unmedida',$data);

      }



}
?>
