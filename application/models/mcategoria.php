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

//MOSTRAR CATEGORIA
  public function mselectcategoria(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('categoria');
      return $resultado->result();

  }


  //INSERTAR CATEGORIA
  public function minsertcategoria($data){
      return  $this->db->insert('categoria',$data);
  }

  //OBTENER DATOS
    public function midupdatecategoria($idcategoria){

        $this->db->where('idcategoria',$idcategoria);
        $resultado = $this->db->get('categoria');
        return $resultado->row();

    }
    //MODIFICAR CATEGORIA mupdatecategoria
      public function mupdatecategoria($idcategoria,$data){

          $this->db->where('idcategoria',$idcategoria);
          return $this->db->update('categoria',$data);

      }



}
?>
