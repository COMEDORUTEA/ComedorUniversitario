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
