<?php
/**
 *
 */
class Mtipo_cliente extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR tipo_cliente
  public function mselecttipo_cliente(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('tipo_cliente');
      return $resultado->result();

  }


  //INSERTAR tipo_cliente
  public function minserttipo_cliente($data){
      return  $this->db->insert('tipo_cliente',$data);
  }

  //OBTENER DATOS
    public function midupdatetipo_cliente($idtipo_cliente){

        $this->db->where('idtipo_cliente',$idtipo_cliente);
        $resultado = $this->db->get('tipo_cliente');
        return $resultado->row();

    }
    //MODIFICAR tipo_cliente mupdatetipo_cliente
      public function mupdatetipo_cliente($idtipo_cliente,$data){

          $this->db->where('idtipo_cliente',$idtipo_cliente);
          return $this->db->update('tipo_cliente',$data);

      }



}
?>
