<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'> NUEVO COMENSAL </legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  //echo form_open("clientes/Save", $attributes);
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';

	 	#dibujamos campos texto
	$CODIGO	  = array(
	'name'        => 'CODIGO_COMENSAL',
	'id'          => 'CODIGO_COMENSAL',
	'readonly'    =>  'readonly',
	'size'        => 50,
	'value'		  => set_value('CODIGO_COMENSAL',@$datos_usuarios[0]->CODIGO_COMENSAL),
	'placeholder' => 'CODIGO COMENSAL',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("CODIGO:",'CODIGO_COMENSAL').'</td>';
	echo '<td>';
	echo form_input($CODIGO);
	echo '</td>';
	echo '<td><font color="red">'.form_error('CODIGO_COMENSAL').'</font></td>';
	echo '</tr>';



	#dibujamos campos texto
	$NOMBRES 	  = array(
	'name'        => 'NOMBRES',
	'id'          => 'NOMBRES',

	'size'        => 50,
	'value'		  => set_value('NOMBRES',@$datos_usuarios[0]->NOMBRES),
	'placeholder' => 'NOMBRES',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("NOMBRES:",'NOMBRES').'</td>';
	echo '<td>';
	echo form_input($NOMBRES);
	echo '</td>';
	echo '<td><font color="red">'.form_error('NOMBRES').'</font></td>';
	echo '</tr>';
	
	#dibujamos campos texto
	$APELLIDOS = array(
	'name'        => 'APELLIDOS',
	'id'          => 'APELLIDOS',
	'size'        => 50,
	'value'		  => set_value('APELLIDOS',@$datos_usuarios[0]->APELLIDOS),
	'placeholder' => 'APELLIDOS',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("APELLIDOS:",'APELLIDOS').'</td>';
	echo '<td>';
	echo form_input($APELLIDOS);
	echo '</td>';
	echo '<td><font color="red">'.form_error('APELLIDOS').'</font></td>';
	echo '</tr>';
	
	#dibujamos campos texto
	$ESCUELA_PROFESIONAL = array(
	'name'        => 'ESCUELA_PROFESIONAL',
	'id'          => 'ESCUELA_PROFESIONAL',
	'size'        => 50,
	'value'		  => set_value('ESCUELA_PROFESIONAL',@$datos_usuarios[0]->ESCUELA_PROFESIONAL),
	'placeholder' => 'ESCUELA_PROFESIONAL',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("ESCUELA PROFESIONAL:",'ESCUELA_PROFESIONAL').'</td>';
	echo '<td>';
	echo form_input($ESCUELA_PROFESIONAL);
	echo '</td>';
	echo '<td><font color="red">'.form_error('ESCUELA_PROFESIONAL').'</font></td>';
	echo '</tr>';

	#dibujamos campos texto
	$EMAIL = array(
	'name'        => 'EMAIL',
	'id'          => 'EMAIL',
	'size'        => 50,
	'value'		  => set_value('EMAIL',@$datos_usuarios[0]->EMAIL),
	'placeholder' => 'EMAIL',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("EMAIL:",'EMAIL').'</td>';
	echo '<td>';
	echo form_input($EMAIL);
	echo '</td>';
	echo '<td><font color="red">'.form_error('EMAIL').'</font></td>';
	echo '</tr>';

	#dibujamos campos texto
	$GENERO = array(
	'NONE'   => '---ELIJA SU GENERO---',
	'Masculino'	    => 'Masculino',
	'Femenino'      => 'Femenino',
	);
	echo '<tr>';
	echo '<td>'.form_label("GENERO:",'GENERO').'</td>';
	echo '<td>';
	echo  form_dropdown('GENERO', $GENERO, set_value('GENERO',@$datos_usuarios[0]->GENERO));
	echo '</td>';
	echo '<td><font color="red">'.form_error('GENERO').'</font></td>';
	echo '</tr>'; 

	#dibujamos campos texto
	$Estatus = array(
	'NONE'   => '---SELECCIONE ESTADO---',
	'0'	     => 'Activo',
	'1'      => 'Inactivo',
	);
	echo '<tr>';
	echo '<td>'.form_label("ESTADO:",'ESTADO').'</td>';
	echo '<td>';
	echo  form_dropdown('ESTADO', $Estatus, set_value('ESTADO',@$datos_usuarios[0]->ESTADO));
	echo '</td>';
	echo '<td><font color="red">'.form_error('ESTADO').'</font></td>';
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
