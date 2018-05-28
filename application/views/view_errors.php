
	<div id="container">
	<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend>&nbsp;&nbsp;Error Modulo: ".$Modulo."</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3><center>';
	  echo '<table>';
	  echo '<tr>';
	  echo '<td>';
	  echo '<div class="alert alert-error text-center">&nbsp;&nbsp;&nbsp;'.$Error.'&nbsp;&nbsp;&nbsp;</div>';
	  echo '</td>';
	  echo '</tr>';
	  echo '</table>';
	  echo '</center></td></tr>';
      echo '</table>';
      echo '</center>';
	?>
	</div>