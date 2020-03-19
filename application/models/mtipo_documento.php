<?php
/**
 *
 */
class Mtipo_documento extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR tipo_documento
  public function mselecttipo_documento(){

      $this->db->where('estado <=','2');
      $resultado = $this->db->get('tipo_documento');
      return $resultado->result();

  }


  //INSERTAR tipo_documento
  public function minserttipo_documento($data){
      return  $this->db->insert('tipo_documento',$data);
  }

  //OBTENER DATOS
    public function midupdatetipo_documento($idtipo_documento){

        $this->db->where('idtipo_documento',$idtipo_documento);
        $resultado = $this->db->get('tipo_documento');
        return $resultado->row();

    }
    //MODIFICAR tipo_documento mupdatetipo_documento
      public function mupdatetipo_documento($idtipo_documento,$data){

          $this->db->where('idtipo_documento',$idtipo_documento);
          return $this->db->update('tipo_documento',$data);

      }



}
?>
