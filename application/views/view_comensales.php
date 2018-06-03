
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#comensales').dataTable( {
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
<table id="comensales" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>CODIGO</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>ESCUELA PROFESIONAL</th>
<th>EMAIL</th>
<th>GENERO</th>
<th>ESTADO</th>
</tr>
</thead>
<tbody>
<?php 
 $contador = 0;
 if(!empty($comensales)){
 	foreach($comensales as $comensal){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/comensales/editar/<?php echo $comensal->CODIGO_COMENSAL;?>/" class="btn btn-success">Editar</a>
		<!--<a href="<?php echo base_url();?>index.php/comensales/password/<?php echo $comensal->CODIGO_COMENSAL ?>" class="btn btn-default">Password</a>
		<a href="<?php echo base_url();?>index.php/comensales/permisos/<?php echo $comensal->CODIGO_COMENSAL;?>" class="btn btn-info">Permisos</a> -->
		<a href="<?php echo base_url();?>index.php/comensales/eliminar/<?php echo $comensal->CODIGO_COMENSAL ?>" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
 		echo '<td>'.$comensal->CODIGO_COMENSAL.'</td>';
		echo '<td>'.$comensal->NOMBRES.'</td>';
		echo '<td>'.$comensal->APELLIDOS.'</td>';
 		echo '<td>'.$comensal->ESCUELA_PROFESIONAL.'</td>';	
 		echo '<td>'.$comensal->EMAIL.'</td>';
 		echo '<td>'.$comensal->GENERO.'</td>';
 		 	/*Si es estatus mostramos en texto*/
			if($comensal->ESTADO==0){
			echo '<td>Activo</td>';
			}
			if($comensal->ESTADO==1){
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
