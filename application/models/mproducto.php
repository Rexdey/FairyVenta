<?php
/**
 *
 */
class Mproducto extends CI_Model
{

  function __construct()
  {
    // code...
  }

//MOSTRAR producto
  public function mselectproducto(){
      $this->db->select('p.*,
      c.nombre categoria,
      f.nombre formato,
      ma.nombre marca,
      u.nombre unmedida,
      me.nombre medida');
      $this->db->from('producto p');
      $this->db->join('categoria c','p.idcategoria=c.idcategoria');
      $this->db->join('formato f','p.idformato=f.idformato');
      $this->db->join('marca ma','p.idmarca=ma.idmarca');
      $this->db->join('unmedida u','p.idunmedida=u.idunmedida');
      $this->db->join('medida me','p.idmedida=me.idmedida');
      $this->db->where('p.estado <=','2');
      $resultado = $this->db->get();
      return $resultado->result();

  }


  //INSERTAR producto
  public function minsertproducto($data){
      return  $this->db->insert('producto',$data);
  }

  //OBTENER DATOS
    public function midupdateproducto($idproducto){

        $this->db->where('idproducto',$idproducto);
        $resultado = $this->db->get('producto');
        return $resultado->row();

    }
    //MODIFICAR producto mupdateproducto
      public function mupdateproducto($idproducto,$data){

          $this->db->where('idproducto',$idproducto);
          return $this->db->update('producto',$data);

      }



}
?>
