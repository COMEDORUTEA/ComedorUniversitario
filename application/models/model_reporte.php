<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_reporte extends CI_Model {
	public function ListarComensales($sexo,$start_date,$end_date){
		
		$this->db->select('a.*,asis.*');
    	$this->db->from('alumnos a');
    	$this->db->join('asistencia asis', 'a.codigo_alumno = asis.codigo_alumno');
        $this->db->where('a.sexo',$sexo);
        $this->db->where('asis.fecha_Registro BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
    	$this->db->order_by('asis.fecha_Registro DESC');
   		$aResult = $this->db->get()->result();
        return $aResult;

	}
    public function ListarComensalesEXCEL($sexo,$start_date,$end_date){
        
        $this->db->select('a.codigo_alumno AS CODIGO,a.nombres  AS NOMBRES, a.apellidos AS APELLIDOS, a.sexo AS GENERO ,a.carrera_profesional AS ESCUELA_PROFESIONAL, asis.fecha_Registro AS FECHA_ASISTENCIA');
        $this->db->from('alumnos a');
        $this->db->join('asistencia asis', 'a.codigo_alumno = asis.codigo_alumno');
        $this->db->where('a.sexo',$sexo);
        $this->db->where('asis.fecha_Registro BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $this->db->order_by('asis.fecha_Registro DESC');
        $aResult = $this->db->get();
        return $aResult;

    }

}
?>
