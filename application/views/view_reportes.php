<?php
	date_default_timezone_set('America/Mexico_City'); 
	$hoy    = date("Y")."-".date("m")."-".date("d");?>
	  <center>
	  <form method="POST" action= <?php echo base_url();?>reportes/descargar/ /> 
	  <table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">
	  <tr>
	  <td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>GENERAR REPORTE POR DIA</legend></td>
	  </tr>
	  <tr><td colspan=3>

	  <center>
	  <table border=0>
	  <tr>
	  	     <td> 
	  	     	<labe>SELECCIONA EL GENERO  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	  	     	</labe>                
                <select name="sexo" id="sexo" value="Hombre">
  				<option>Masculino</option>
  				<option>Femenino</option>
				</select> 
                
            </td>
	  </tr>
	  <tr>
            <td> 
	  	     	<labe>SELECCIONA LA FECHA INICIAL</labe>                   
                <input type="date" name="fechaI" value= <?php echo $hoy;?> > 
         
            </td>
      </tr>
      <tr>
            <td> 
	  	     	<labe>SELECCIONA LA FECHA FINAL &nbsp</labe>                   
                <input type="date" name="fechaF" value= <?php echo $hoy;?>> 
                <br><br>
            </td>
       </table>
      </tr>
      </td> 
      </tr> 
	<td colspan=3><center>

	<input type="submit" class="btn btn-success" name='boton1' value="PDF">
	<input type="submit" class="btn btn-success" name='boton2' value="EXCEL">

    </center></td></tr>
    </table>

   </form>

<?php
	if(isset($_POST['boton1'])) 
	{ 
      $condicion='pdf';
	} 
	else if(isset($_POST['boton2'])) 
	{ 
  	  $condicion='excel';
  	  
	}  
?>
    </center>

