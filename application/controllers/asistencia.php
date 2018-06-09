
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class asistencia extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_asistencia');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
     }
     function Seguridad(){
      $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }

 public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');    
          $data['alumnos'] = $this->model_asistencia->ListarComensales();     
          $this->load->view('view_asistencia_reporte',$data);
          $this->load->view('footer');
  }


    public function nuevo(){
        
  /*Si el usuario esta logeado*/
        $this->Seguridad();
    $hoy    = date("Y")."-".date("m")."-".date("d");

    $this->ValidaCampos();
    if($this->form_validation->run() == TRUE){
        //Verificamos si existe el email
         $VerifyExist = $this->model_asistencia->ExisteEmail($this->input->post("codigo_alumno"));
         $RegistroHoy = $this->model_asistencia->SeRegistroHoy($this->input->post("codigo_alumno"), $this->input->post("fecha_Registro"));
        
        if($RegistroHoy>0){
                  $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">El usuario ya se registro hoy </div>');
                    $this->load->view('header');
                  $this->load->view('view_asistencia',$hoy);
                  $this->load->view('footer');
            }else {

                    if($VerifyExist>0){
                    $UsuariosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
                    //$UsuariosInsertar["fecha_Registro"] = $hoy;//le agregamos la fecha de registro
                    //guardamos los registros
                    $this->model_asistencia->save($UsuariosInsertar);
                    redirect("asistencia?save=true"); 
                    }
                    else {
                      if($VerifyExist==0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">El usuario no esta registrado</div>');
                    $this->load->view('header');
                    $this->load->view('view_asistencia');
                    $this->load->view('footer');
                     }
                     else {

                    $UsuariosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
                    //$UsuariosInsertar["fecha_Registro"] = $hoy;//le agregamos la fecha de registro
                    //guardamos los registros
                    $this->model_asistencia->save($UsuariosInsertar);
                    redirect("asistencia?save=true");
                     }

                    }
                 }
      
    }else{
        $this->load->view('header');
        $this->load->view('view_asistencia');
        $this->load->view('footer');
    }
     }



      function ValidaCampos(){
    /*Campos para validar que no esten vacio los campos*/
     $this->form_validation->set_rules("codigo_alumno", "codigo_alumno", "trim|required|valid_codigo_alumno");

    }
    public function editar($id = NULL){
    
    if ($id == NULL ){
      $data['Modulo']  = "Asistencia";
      $data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
      $this->load->view('header');
      $this->load->view('view_errors',$data);
      $this->load->view('footer');
      return;
    }
    if ($this->input->post()) {
      
      $this->ValidaCampos();
        
      if ($this->form_validation->run() == TRUE){
        $datos_update = $this->input->post();
        $id_insertado = $this->model_asistencia->edit($datos_update,$id);
        redirect('asistencia?update=true');
        
      }else{
        $this->Nuevo();
      }
      
    }else{
      $data['datos_usuarios'] = $this->model_asistencia->BuscarID($id);
      if (empty($data['datos_usuarios'])){
        $data['Modulo']  = "Asistencia";
        $data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
        $this->load->view('header');
        $this->load->view('view_errors',$data);
        $this->load->view('footer');
      }else{
        $this->load->view('header');
        $this->load->view('view_edit_asistencia',$data);
        $this->load->view('footer');
      }
    }
    
  }

    public function eliminar($id = NULL){
    if ($id == NULL ){
      $data['Modulo']  = "Asistencia";
      $data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
      $this->load->view('header');
      $this->load->view('view_errors',$data);
      $this->load->view('footer');
      return;
    }
    if ($this->input->post()) {
      $id_eliminar = $this->input->post('id_asistencia');
      $boton       = strtoupper($this->input->post('btn_guardar'));
      if($boton=="NO"){
        redirect("Asistencia");
      }else{
                                $this->model_asistencia->Eliminar($id_eliminar);
        redirect("asistencia?delete=true");
      }
    }else{
      $data['datos_usuarios'] = $this->model_asistencia->BuscarID($id);
      if (empty($data['datos_usuarios'])){
        $data['Modulo']  = "Asistencia";
        $data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
        $this->load->view('header');
        $this->load->view('view_errors',$data);
        $this->load->view('footer');
      }else{
        $this->load->view('header');
        $this->load->view('view_delete_asistencia',$data);
        $this->load->view('footer');
      }
    }
  }


}
