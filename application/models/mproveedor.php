<?php
/**
 *
 */
class Mproveedor extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR proveedor
  public function mselectproveedor(){
      $this->db->select('c.*, tpd.codigo codtipo_documento, tpd.nombre tipo_documento, tpc.codigo codtipo_proveedor, tpc.nombre tipo_proveedor');
      $this->db->from('proveedor c');
      $this->db->join('tipo_documento tpd','c.idtipo_documento=tpd.idtipo_documento');
      $this->db->join('tipo_cliente tpc','c.idtipo_cliente=tpc.idtipo_cliente');
      $this->db->where('c.estado <=','2');
      $resultado = $this->db->get();
      return $resultado->result();

  }


  //INSERTAR proveedor
  public function minsertproveedor($data){
      return  $this->db->insert('proveedor',$data);
  }

  //OBTENER DATOS
    public function midupdateproveedor($idproveedor){

        $this->db->where('idproveedor',$idproveedor);
        $resultado = $this->db->get('proveedor');
        return $resultado->row();

    }
    //MODIFICAR proveedor mupdateproveedor
      public function mupdateproveedor($idproveedor,$data){

          $this->db->where('idproveedor',$idproveedor);
          return $this->db->update('proveedor',$data);

      }



}
?>
