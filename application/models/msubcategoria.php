<?php
/**
 *
 */
class Msubcategoria extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR subcategoria
  public function mselectsubcategoria(){
      $this->db->select('s.*, c.nombre categoria');
      $this->db->from('subcategoria s');
      $this->db->join('categoria c','s.idcategoria=c.idcategoria');
      $this->db->where('s.estado <=','2');
      $resultado = $this->db->get();
      return $resultado->result();

  }


  //INSERTAR subcategoria
  public function minsertsubcategoria($data){
      return  $this->db->insert('subcategoria',$data);
  }

  //OBTENER DATOS
    public function midupdatesubcategoria($idsubcategoria){

        $this->db->where('idsubcategoria',$idsubcategoria);
        $resultado = $this->db->get('subcategoria');
        return $resultado->row();

    }
    //MODIFICAR subcategoria mupdatesubcategoria
      public function mupdatesubcategoria($idsubcategoria,$data){

          $this->db->where('idsubcategoria',$idsubcategoria);
          return $this->db->update('subcategoria',$data);

      }



}
?>
