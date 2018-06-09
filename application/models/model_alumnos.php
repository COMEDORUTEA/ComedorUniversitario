<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_alumnos extends CI_Model {
	public function ListarAlumnos(){
		$this->db->order_by('FECHA_REGISTRO DESC');
		return $this->db->get('alumnos')->result();
	}
	public function ExisteEmail($email){
          $this->db->from('alumnos');
          $this->db->where('codigo_alumno',$email);
          return $this->db->count_all_results();
     }
     public function SaveAlumnos($arrayCliente){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('alumnos', $arrayCliente);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id){

		$query = $this->db->where('codigo_alumno',$id);
		$query = $this->db->get('alumnos');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('codigo_alumno',$id);
		$this->db->update('alumnos',$data);
		
	}
	function Eliminar($id){

		$this->db->where('codigo_alumno',$id);
		$this->db->delete('alumnos');
		
	}
	function MenuCompleto(){
		$this->db->order_by('ORDENAMIENTO ASC');
		return $this->db->get('menu_sistema')->result();
	}
	function MiMenu($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$this->db->where('ESTATUS',0);
		return $this->db->count_all_results();
	}
	function DesactivaPermisos($id){
		$this->db->where('ID_USUARIO',$id);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 1));
	}
	function ExistePermiso($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		return $this->db->count_all_results();
	}
	function ActualizaPermiso($id,$id_menu){
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 0));
	}
	function AgregaPermiso($arraypermisos){
		$this->db->trans_start();
     	$this->db->insert('permisosmenu', $arraypermisos);
     	$this->db->trans_complete();
	}
}
?>
