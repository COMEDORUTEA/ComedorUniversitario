<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Nuevo Usuario :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  //echo form_open("clientes/Save", $attributes);
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	$Nombre 	  = array(
	'name'        => 'NOMBRE',
	'id'          => 'NOMBRE',
	'size'        => 50,
	'value'		  => set_value('NOMBRE',@$datos_usuarios[0]->NOMBRE),
	'placeholder' => 'Nombre',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre:",'NOMBRE').'</td>';
	echo '<td>';
	echo form_input($Nombre);
	echo '</td>';
	echo '<td><font color="red">'.form_error('NOMBRE').'</font></td>';
	echo '</tr>';
	
	$Apellidos = array(
	'name'        => 'APELLIDOS',
	'id'          => 'APELLIDOS',
	'size'        => 50,
	'value'		  => set_value('APELLIDOS',@$datos_usuarios[0]->APELLIDOS),
	'placeholder' => 'Apellidos',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Apellidos:",'APELLIDOS').'</td>';
	echo '<td>';
	echo form_input($Apellidos);
	echo '</td>';
	echo '<td><font color="red">'.form_error('APELLIDOS').'</font></td>';
	echo '</tr>';
	
	$Email 		  = array(
	'name'        => 'EMAIL',
	'id'          => 'EMAIL',
	'size'        => 50,
	'value'		  => set_value('EMAIL',@$datos_usuarios[0]->EMAIL),
	'placeholder' => 'Email',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Email:",'EMAIL').'</td>';
	echo '<td>';
	echo form_input($Email);
	echo '</td>';
	echo '<td><font color="red">'.form_error('EMAIL').'</font></td>';
	echo '</tr>';
	
	$CampoOpcionesTipo = array(
	'0'               	=> '---SELECCIONE TIPO DE USUARIO---',
	'Administrador'		=> 'Administrador',
	'Invitado'	    	=> 'Invitado',
	);
	echo '<tr>';
    echo '<td>'.form_label("Tipo:",'TIPO').'</td>';
    echo '<td>';
    echo  form_dropdown('TIPO', $CampoOpcionesTipo, set_value('TIPO',@$datos_usuarios[0]->TIPO));
    echo '</td>';
    echo '<td><font color="red">'.form_error('TIPO').'</font></td>';
    echo '</tr>';
	
	$Estatus = array(
	'NONE'   => '---SELECCIONE ESTATUS---',
	'0'	     => 'Activo',
	'1'      => 'Inactivo',
	);
	echo '<tr>';
	echo '<td>'.form_label("Estatus:",'ESTATUS').'</td>';
	echo '<td>';
	echo  form_dropdown('ESTATUS', $Estatus, set_value('ESTATUS',@$datos_usuarios[0]->ESTATUS));
	echo '</td>';
	echo '<td><font color="red">'.form_error('ESTATUS').'</font></td>';
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