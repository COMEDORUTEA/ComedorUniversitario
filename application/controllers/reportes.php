<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class reportes extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_reporte');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
          $this->load->library('export_excel');
     }
     function Seguridad(){
      $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }

 public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');    
          //$data['alumnos'] = $this->model_asistencia->ListarComensales();     
          $this->load->view('view_reportes');
          $this->load->view('footer');
  }
 public function pdf(){
          $this->Seguridad();
          $this->load->view('header');    
          //$data['alumnos'] = $this->model_asistencia->ListarComensales();     
          $this->load->view('view_reporte_pdf');
          $this->load->view('footer');
}

 public function reportedinamico(){
          $this->Seguridad();
          $this->load->view('header'); 
          $data['alumnos'] = $this->model_reporte->ListarComensales($this->input->post("sexo") ,$this->input->post("fechaI") ,$this->input->post("fechaF") );   
          
          
          $this->load->view('view_reporte_dinamico',$data);
          $this->load->view('footer');
}
    
  public function action()
 {
  $this->load->model("model_reporte");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("CODIGO", "NOMBRES", "APELLIDOS", "SEXO", "CARRERA PROFESINAL", "FECHA DE ASISTENCIA");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $data['alumnos'] = $this->model_reporte->ListarComensales($this->input->post("sexo") ,$this->input->post("fechaI") ,$this->input->post("fechaF") );

  $excel_row = 2;

  foreach($alumnos as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row,  $row['codigo_alumno'] );
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nombres']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['apellidos']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['sexo']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['carrera_profesional']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['FECHA_REGISTRO']);
   $excel_row++;
  }

  //$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  IOFactory::createWriter($objPHPexcel, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Employee Data.xls"');
  $object_writer->save('php://output');
 }




    public function descargar(){
    $this->Seguridad();

    if($_POST['boton2'] =='EXCEL'){
        
        $result = $this->model_reporte->ListarComensalesEXCEL($this->input->post("sexo") ,$this->input->post("fechaI") ,$this->input->post("fechaF") );
        $this->export_excel->to_excel($result, 'lista_de_personas');
  }
    

    else if ($_POST['boton1'] =='PDF'){
    $data['alumnos'] = $this->model_reporte->ListarComensales($this->input->post("sexo") ,$this->input->post("fechaI") ,$this->input->post("fechaF") );  

    $hoy = date("dmyhis");


        //load the view and saved it into $html variable
        $html =$this->load->view('view_reporte_dinamico',$data,true);    
          //$data['alumnos'] = $this->model_asistencia->ListarComensales();     
          
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, "D");
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);
 
       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
    }
  
  }

}
