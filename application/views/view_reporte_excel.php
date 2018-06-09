<html>
<?php 
$this->load->library('export_excel');
$this->load->library("excel");
$object = new PHPExcel();
$object->setActiveSheetIndex(0);

  $table_columns = array("CODIGO", "NOMBRES", "APELLIDOS", "GENERO", "ESCUELA PROFESINAL", "FECHA DE ASISTENCIA");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $excel_row = 2;

  foreach($alumnos as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['codigo_alumno']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nombres']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['apellidos']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row,$row['sexo']);
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['carrera_profesional']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['FECHA_REGISTRO']);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Employee Data.xls"');
  $object_writer->save('php://output');
  ?>
</html>
