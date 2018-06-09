<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
<link href="<?php echo base_url();?>css/Estilo.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/Tablas.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.js"></script>	

<title>Codeigniter y Mysqli</title>
</head>
<body>
	<h3 align="center">UNIVERSIDAD TECNOLOGICA DE LOS ANDES <br/> COMEDOR UNIVERSITARIO</h3>
	<?php
		if ($this->session->userdata('is_logged_in')){
				
		
		}else{
			echo '<hr/>';
		}
		
	 ?>

<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#asistencia').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>
<div id="container">

<center>
<table id="asistencia" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>


<th>CODIGO</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>GENERO</th>
<th>ESCUELA PROFESIONAL</th>
<th>FECHA DE ASISTENCIA</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($alumnos)){
 	foreach($alumnos as $alumno){
 		echo '<tr>';
		//echo '<td>'
?>
		
    	<td><?php echo $alumno->codigo_alumno; ?></td>
		 <td><?php echo $alumno->nombres; ?></td>
		 <td><?php echo $alumno->apellidos; ?></td>
		 <td><?php echo $alumno->sexo; ?></td>
		 <td><?php echo $alumno->carrera_profesional; ?></td>
		 <td><?php  
		        $fecha = $alumno->fecha_Registro;
		        $ano = substr($fecha, -10, 4);
		 		$mes = substr($fecha, -5, 2);
		 		$dia = substr($fecha, -2, 2);
		 		echo $dia."-".$mes."-".$ano;

		  ?></td>

 		</tr>
<?php 		
 	} 
 }
?>
</tbody>
</table>
</center>
</div>


