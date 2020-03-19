<?php
/**
 *
 */
class Mcliente extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR cliente
  public function mselectcliente(){
      $this->db->select('c.*, tpd.codigo codtipo_documento, tpd.nombre tipo_documento, tpc.codigo codtipo_cliente, tpc.nombre tipo_cliente');
      $this->db->from('cliente c');
      $this->db->join('tipo_documento tpd','c.idtipo_documento=tpd.idtipo_documento');
      $this->db->join('tipo_cliente tpc','c.idtipo_cliente=tpc.idtipo_cliente');
      $this->db->where('c.estado <=','2');
      $resultado = $this->db->get();
      return $resultado->result();

  }


  //INSERTAR cliente
  public function minsertcliente($data){
      return  $this->db->insert('cliente',$data);
  }

  //OBTENER DATOS
    public function midupdatecliente($idcliente){

        $this->db->where('idcliente',$idcliente);
        $resultado = $this->db->get('cliente');
        return $resultado->row();

    }
    //MODIFICAR cliente mupdatecliente
      public function mupdatecliente($idcliente,$data){

          $this->db->where('idcliente',$idcliente);
          return $this->db->update('cliente',$data);

      }



}
?>
