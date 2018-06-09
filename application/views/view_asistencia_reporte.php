
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
	<h2 align="center">LISTA DE ALUMNOS QUE ASISTIERON AL COMEDOR</h2>
	<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">La Información  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">La Información  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">La Información  se Actualizo Correctamente</div>';
}
if(isset($_GET['permisos'])){
		echo '<div class="alert alert-success text-center">Los Permisos fueron Asignados Correctamente</div>';
	}
	if(isset($_GET['password'])){
		echo '<div class="alert alert-success text-center">La Contraseña fue actualizado Correctamente</div>';
	}
?>
<center>
<table id="asistencia" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCIONES</th>
<th>ID</th>
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
		echo '<td>'
?>
		<a href="<?php echo base_url();?>asistencia/editar/<?php echo $alumno['id_asistencia']; ?>" class="btn btn-success">Editar</a>
		<!--<a href="<?php echo base_url();?>index.php/alumnos/password/<?php echo $alumno->codigo_alumno ?>" class="btn btn-default">Password</a>
		<a href="<?php echo base_url();?>index.php/alumnos/permisos/<?php echo $alumno->codigo_alumno;?>" class="btn btn-info">Permisos</a> -->
		<a href="<?php echo base_url();?>asistencia/eliminar/<?php echo $alumno['id_asistencia']; ?>" class="btn btn-danger">Eliminar</a>


		<td><?php echo $alumno['id_asistencia']; ?></td>
    	<td><?php echo $alumno['codigo_alumno']; ?></td>
		 <td><?php echo $alumno['nombres']; ?></td>
		 <td><?php echo $alumno['apellidos']; ?></td>
		 <td><?php echo $alumno['sexo']; ?></td>
		 <td><?php echo $alumno['carrera_profesional']; ?></td>
		 <td><?php  
		        $fecha = $alumno['fecha_Registro'];
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
