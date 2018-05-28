
<center>
    
<?php 
           $usuario = array(
              'name'        => "username",
              'id'          => "username",
              'size'        => "50",
              'value'       => set_value("username"),
              'placeholder' => "Teclea tu Email",
             );
           $password = array(
              'name'        => "password",
              'id'          => "password",
              'size'        => "50",
              'value'       => set_value("password"),
              'type'        => "password",
             );
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("login/ValidarAcceso", $attributes);
?>
<table width='450' border='0' class='ventanas' cellspacing='0' cellpadding='0'>
<tr>
     <td colspan='3' class='tabla_ventanas_login' height='10' colspan='3'><legend align="center">::: LOGIN ::: </legend></td>

</tr>
<tr><td colspan=3><br/></td></tr>
<tr>
<td colspan='3'>
     <center>
     <table>
     <tr>
          <td><?php echo form_label("Email:","lblEmail"); ?></td>
          <td>
               <?php echo form_input($usuario); ?>
               <font color="red"><?php echo form_error('username'); ?></font>
          </td> 

     </tr>
     <tr>
          <td><?php echo form_label("Password:","lblPassword"); ?></td>
          <td>
               <?php echo form_input($password); ?>
               <font color="red"><?php echo form_error('password'); ?></font>
          </td>

     </tr>
     </table>
     </center>
</td>
</tr>
<tr>
<!--<td height='50' colspan=3 align='center'><button class="clean-gray"> LOGIN </button></td>-->
<td colspan="3" align ='center'>
        <input id="btn_login" name="btn_login" type="submit" class="btn btn-sm btn-success" value="Login">
        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Limpiar">
</td>
</tr>
<tr>
     <td colspan="3" align ='center'>
          <table>
          <tr>
          <td>
               <?php echo $this->session->flashdata('msg'); ?>
          </td>
          </tr>
          </table>
     </td>
</tr>
</table>
 <?php echo form_close(); ?>
          
</center>
