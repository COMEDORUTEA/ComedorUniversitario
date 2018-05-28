<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Asignar Permisos a ".$datos_usuarios[0]->NOMBRE.' '.$datos_usuarios[0]->APELLIDOS." :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  echo form_open();
	  echo '<center>';
	  echo '<div id="container">';
	  echo '<table border=0 class="pretty">';
	  echo '<thead><tr><th>ESTATUS</th><th>MENU</th><th>PERMISO</th></tr></thead>';
	  echo '<tbody>';
	  for($i=0;$i<=count($estatus_menu)-1;$i++){
	    $body  		= "#bcd9e1";
		$booleano   = false;
		$CheckText  = "<font color='red'>Permiso No Asignado</font>";
		if($i%2){$body="#ffffff";}
		if($estatus_menu[$i]=="1"){
			$booleano = true;
			$CheckText= "<font color='green'>Permiso Asignado</font>";
		}
		echo '<tr bgcolor="'.$body.'">';
		echo '<td>'.form_checkbox("permissions[]",$id_menu[$i],$booleano).' '.$CheckText.'</td>';
		echo '<td>'.$descripcion_menu[$i].'</td>';
		echo '<td>'.$id_menu[$i].form_hidden("ID",$datos_usuarios[0]->ID).'</td>';
		echo '</tr>';
	  }
	  echo '<tr><td colspan=3><hr/></td></tr>';
	  echo '<tr>';
	  echo '<td colspan=3><center>';
	  echo '<input type="submit" class="btn btn-success" value="Guardar Permisos">';
      echo '</center></td></tr>';
	  echo '</tbody>';
      echo '</table>';
	  echo '</div>';
	  echo '</center>';
      echo form_close(); 
      echo '</td></tr>';
      echo '</table>';
      echo '</center>';
?>