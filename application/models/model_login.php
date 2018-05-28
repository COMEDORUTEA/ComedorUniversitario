<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_login extends CI_Model
{
     function __construct()
     {
          parent::__construct();
     }
     //FUNCION PARA VALIDAR EL LOGIN
     function LoginBD($username, $password)
     {
          $this->db->where('EMAIL', $username);
          $this->db->where('PASSWORD', $password);
          return $this->db->get('usuarios')->row();
     }
     //FUNCION QUE CARGA EL CATALOGO DEL MENU
     function PermisosMenu($Id){
          $this->db->select('m.ID as ID, m.DESCRIPCION as DESCRIPCION,m.IMAGEN as IMAGEN,m.URL as URL,p.ESTATUS as ESTATUS');
          $this->db->from('menu_sistema as m');
          $this->db->join('permisosmenu as p', 'm.ID=p.ID_MENU');
          $this->db->where('p.ID_USUARIO', $Id);
          $this->db->where('p.ESTATUS', 0);
		  $this->db->order_by("m.ORDENAMIENTO", "asc");
          $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data['Permisos'] =  $query->result_array();
         }else{
             $data['Permisos'] =  Array (0 => Array("ID" =>"Error"));
         }
         $query->free_result();
         //return the array to the controller
         return $data;
     }
}?>