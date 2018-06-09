<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'> NUEVO COMENSAL</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  //echo form_open("clientes/Save", $attributes);
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';


	 	#dibujamos campos texto
	$Codigo	  = array(
	'name'        => 'codigo_alumno',
	'id'          => 'codigo_alumno',
	'readonly'    => 'readonly',
	'size'        => 50,
	'maxlength'   => 11,
	'value'		  => set_value('codigo_alumno',@$datos_usuarios[0]->codigo_alumno),
	'placeholder' => 'Codigo Alumno',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("CODIGO:",'codigo_alumno').'</td>';
	echo '<td>';
	echo form_input($Codigo);
	echo '</td>';
	echo '<td><font color="red">'.form_error('codigo_alumno').'</font></td>';
	echo '</tr>';



	$dni	  = array(
	'name'        => 'dni',
	'id'          => 'dni',
	'size'        => 8,
	'maxlength'   => 8,
	'value'		  => set_value('dni',@$datos_usuarios[0]->dni),
	'placeholder' => 'dni',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("DNI:",'dni').'</td>';
	echo '<td>';
	echo form_input($dni);
	echo '</td>';
	echo '<td><font color="red">'.form_error('dni').'</font></td>';
	echo '</tr>';


	#dibujamos campos texto
	$Nombre 	  = array(
	'name'        => 'nombres',
	'id'          => 'nombres',
	'size'        => 50,
	'value'		  => set_value('nombres',@$datos_usuarios[0]->nombres),
	'placeholder' => 'Nombre',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("NOMBRES:",'nombres').'</td>';
	echo '<td>';
	echo form_input($Nombre);
	echo '</td>';
	echo '<td><font color="red">'.form_error('nombres').'</font></td>';
	echo '</tr>';
	
	$Apellidos = array(
	'name'        => 'apellidos',
	'id'          => 'apellidos',
	'size'        => 50,
	'value'		  => set_value('apellidos',@$datos_usuarios[0]->apellidos),
	'placeholder' => 'Apellidos',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("APELLIDOS:",'apellidos').'</td>';
	echo '<td>';
	echo form_input($Apellidos);
	echo '</td>';
	echo '<td><font color="red">'.form_error('apellidos').'</font></td>';
	echo '</tr>';


	$carrera = array(
	'NONE'   => '---SELECCIONE ESCUELA---',
	'ING DE SISTEMAS E INFORMATICA'=> 'ING DE SISTEMAS E INFORMATICA',
	'ING CIVIL'      => 'ING CIVIL',
	'ING AMBIENTAL R.N'      => 'ING AMBIENTAL R.N',
	'ENFERMERIA'      => 'ENFERMERIA',
	'CONTABILIDAD'      => 'CONTABILIDAD',
	'AGRONOMIA'      => 'AGRONOMIA',
	'EDUCACION'      => 'EDUCACION',
	'TURISMO'      => 'TURISMO',
	'DERECHO'      => 'DERECHO',
	'ESTOMATOLOGIA'      => 'ESTOMATOLOGIA',

	);
	echo '<tr>';
	echo '<td>'.form_label("ESCUELA PROFESIONAL:",'carrera_profesional').'</td>';
	echo '<td>';
	echo  form_dropdown('carrera_profesional', $carrera, set_value('carrera_profesional',@$datos_usuarios[0]->carrera_profesional));
	echo '</td>';
	echo '<td><font color="red">'.form_error('carrera_profesional').'</font></td>';
	echo '</tr>'; 
	

	$sexo = array(
	'NONE'   => '---ELIJA SU GENERO---',
	'Masculino'	    => 'Masculino',
	'Femenino'      => 'Femenino',
	);
	echo '<tr>';
	echo '<td>'.form_label("GENERO:",'sexo').'</td>';
	echo '<td>';
	echo  form_dropdown('sexo', $sexo, set_value('sexo',@$datos_usuarios[0]->sexo));
	echo '</td>';
	echo '<td><font color="red">'.form_error('sexo').'</font></td>';
	echo '</tr>'; 

	
	
	$Estatus = array(
	'NONE'   => '---SELECCIONE ESTADO---',
	'0'	     => 'Activo',
	'1'      => 'Inactivo',
	);
	echo '<tr>';
	echo '<td>'.form_label("ESTADO:",'estado').'</td>';
	echo '<td>';
	echo  form_dropdown('estado', $Estatus, set_value('estado',@$datos_usuarios[0]->estado));
	echo '</td>';
	echo '<td><font color="red">'.form_error('estado').'</font></td>';
	echo '</tr>';     
		
	echo '<tr>';
	echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';
	echo '</tr>';
	echo '<tr><td colspan=3><hr/></td></tr>';
	echo '<tr>';
	echo '<td colspan=3><center>';
	echo '<input type="submit" class="btn btn-success" value="Guardar">';
    echo '</center></td></tr>';
    echo '</table></center>';
    echo form_close(); 
    echo '</td></tr>';
    echo '</table>';
    echo '</center>';
?>
