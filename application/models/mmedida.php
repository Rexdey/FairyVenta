<?php
/**
 *
 */
class Mmedida extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR medida
  public function mselectmedida(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('medida');
      return $resultado->result();

  }


  //INSERTAR medida
  public function minsertmedida($data){
      return  $this->db->insert('medida',$data);
  }

  //OBTENER DATOS
    public function midupdatemedida($idmedida){

        $this->db->where('idmedida',$idmedida);
        $resultado = $this->db->get('medida');
        return $resultado->row();

    }
    //MODIFICAR medida mupdatemedida
      public function mupdatemedida($idmedida,$data){

          $this->db->where('idmedida',$idmedida);
          return $this->db->update('medida',$data);

      }



}
?>
