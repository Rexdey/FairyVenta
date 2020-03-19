<?php
/**
 *
 */
class Mmarca extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR marca
  public function mselectmarca(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('marca');
      return $resultado->result();

  }


  //INSERTAR marca
  public function minsertmarca($data){
      return  $this->db->insert('marca',$data);
  }

  //OBTENER DATOS
    public function midupdatemarca($idmarca){

        $this->db->where('idmarca',$idmarca);
        $resultado = $this->db->get('marca');
        return $resultado->row();

    }
    //MODIFICAR marca mupdatemarca
      public function mupdatemarca($idmarca,$data){

          $this->db->where('idmarca',$idmarca);
          return $this->db->update('marca',$data);

      }



}
?>
