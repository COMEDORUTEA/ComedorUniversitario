'<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>Cambiar Password a ".@$datos_usuarios[0]->NOMBRE." ".@$datos_usuarios[0]->APELLIDOS." </legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	$password 	  = array(
	'name'        => 'PASSWORD',
	'id'          => 'PASSWORD',
	'size'        => 50,
	'value'		  => set_value('PASSWORD'),
	'placeholder' => 'Password',
	'type'        => 'password',
	);
	echo '<tr>';
	echo '<td>'.form_label("Password:",'PASSWORD').'</td>';
	echo '<td>';
	echo form_input($password);
	echo '</td>';
	echo '<td><font color="red">'.form_error('PASSWORD').'</font></td>';
	echo '</tr>';
	
	$cpassword = array(
	'name'        => 'PASSWORD1',
	'id'          => 'PASSWORD1',
	'size'        => 50,
	'value'		  => set_value('PASSWORD1'),
	'placeholder' => 'Confirmar Password',
	'type'        => 'password',
	);
	echo '<tr>';
	echo '<td>'.form_label("Confirmar Password:",'PASSWORD1').'</td>';
	echo '<td>';
	echo form_input($cpassword);
	echo '</td>';
	echo '<td><font color="red">'.form_error('PASSWORD1').'</font></td>';
	echo '</tr>';
	
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