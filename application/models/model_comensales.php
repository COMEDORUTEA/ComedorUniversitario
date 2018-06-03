<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_comensales extends CI_Model {
	public function ListarComensales(){
		$this->db->order_by('CODIGO_COMENSAL ASC');
		return $this->db->get('comensales')->result();
	}
	public function ExisteCodigo_comensal($Codigo_comensal){
          $this->db->from('comensales');
          $this->db->where('CODIGO_COMENSAL',$Codigo_comensal);
          return $this->db->count_all_results();
     }
        public function SaveComensales($arrayCliente){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('comensales', $arrayCliente);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id){

		$query = $this->db->where('CODIGO_COMENSAL',$id);
		$query = $this->db->get('comensales');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('CODIGO_COMENSAL',$id);
		$this->db->update('comensales',$data);
		
	}
	function Eliminar($id){

		$this->db->where('CODIGO_COMENSAL',$id);
		$this->db->delete('comensales');
		
	}
}
?>
