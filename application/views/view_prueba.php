
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#alumnos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">CATALOGO DE COMENSALES</h2>
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
<table id="alumnos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>CODIGO</th>
<th>DNI</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>ESCUELA PROFESIONAL</th>
<th>GENERO</th>
<th>ESTADO</th>
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
		<a href="<?php echo base_url();?>alumnos/editar/#/" class="btn btn-success">Editar</a>

<?php		
		echo '</td>';
 		echo '<td>'.$alumno[codigo_alumno].'</td>';
		echo '<td>'.$alumno->dni.'</td>';
		echo '<td>'.$alumno->correo.'</td>';
		echo '<td>'.$alumno->nombres.'</td>';
		echo '<td>'.$alumno->apellidos.'</td>';
 		echo '<td>'.$alumno->carrera_profesional.'</td>';	
 		echo '<td>'.$alumno->sexo.'</td>';
 		 	/*Si es estatus mostramos en texto*/
			if($alumno->estado==0){
			echo '<td>Activo</td>';
			}
			if($alumno->estado==1){
			echo '<td>Inactivo</td>';
			}
 			
 	
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>
