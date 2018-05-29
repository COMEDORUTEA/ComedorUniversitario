<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_comensales extends CI_Model {

  /*MODELO LISTAR*/
  public function ListarComensales()
  {
    $this->db->order_by('CODIGO ASC');
    return $this->db->get('comensales')->result();
  }
  /*MODELO PARA VERIFICAR EXISTENCIA DE CODIGO*/
  public function ExisteCodigo($codigo){
          $this->db->from('comensales');
          $this->db->where('CODIGO',$codigo);
          return $this->db->count_all_results();
  }

  /*MODELO PARA GUARDAR COMENSALES*/
  public function SaveComensales($arrayComensal){
      /*Nos aseguramos si realizamos todo o no*/
      $this->db->trans_start();
      $this->db->insert('comensales', $arrayComensal);
      $this->db->trans_complete();  
  }

  /*MODELO PARA BUSCAR COMENSAL POR CODIGO*/
  function BuscarCODIGO($codigo){
    $query = $this->db->where('CODIGO',$codigo);
    $query = $this->db->get('comensales');
    return $query->result();  
  }

  /*MODELO PARA EDITAR COMENSAL*/
  function edit($data,$codigo){
    $this->db->where('CODIGO',$codigo);
    $this->db->update('comensales',$data);
  }

  /*MODELO PARA ELIMINAR COMENSAL*/
  function Eliminar($codigo){
    $this->db->where('CODIGO',$codigo);
    $this->db->delete('comensales');  
  }
  function MenuCompleto()
  {
    $this->db->order_by('ORDENAMIENTO ASC');
    return $this->db->get('menu_sistema')->result();
  }
  function MiMenu($id,$id_menu)
  {
    $this->db->from('permisosmenu');
    $this->db->where('ID_USUARIO',$id);
    $this->db->where('ID_MENU',$id_menu);
    $this->db->where('ESTATUS',0);
    return $this->db->count_all_results();
  }
}
?>
