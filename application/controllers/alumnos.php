<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class alumnos extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_alumnos');
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
          $data['alumnos'] = $this->model_alumnos->ListarAlumnos();         
          $this->load->view('view_alumnos', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el email
			   $VerifyExist = $this->model_alumnos->ExisteEmail($this->input->post("codigo_alumno"));
               if($VerifyExist==0){
               	    $UsuariosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $UsuariosInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_alumnos->SaveAlumnos($UsuariosInsertar);
               	    redirect("alumnos?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">El Código del alumno ya existe </div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_alumno');
					$this->load->view('footer');
               }
			
		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_alumno');
			  $this->load->view('footer');
		} 
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("codigo_alumno", "codigo_alumno", "trim|required|valid_codigo_alumno");
		 $this->form_validation->set_rules("dni", "dni", "trim|required");
		 $this->form_validation->set_rules("nombres", "nombres", "trim|required");
		 $this->form_validation->set_rules("apellidos", "apellidos", "trim|required");
		 $this->form_validation->set_rules("carrera_profesional", "carrera_profesional", "trim|required");
		 $this->form_validation->set_rules("sexo", "sexo", "trim|required");
		 $this->form_validation->set_rules("estado", "estado", "callback_select_estado");
		
	 }
	 function select_tipo($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_tipo', 'El Campo Tipo Es Obligatorio.');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
	function select_estatus($campo)
	{
		// Validamos Estatus
		if($campo=="NONE"){
			$this->form_validation->set_message('select_estatus', 'El Campo Estatus es Obligatorio.');
			return false;
		} else{
		// 
		return true;
		}
	}
	 public function editar($id = NULL){
		
		if ($id == NULL ){
			$data['Modulo']  = "Alumnos";
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
				$id_insertado = $this->model_alumnos->edit($datos_update,$id);
				redirect('alumnos?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_usuarios'] = $this->model_alumnos->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Alumnos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_editar_alumnos',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($id = NULL){
		if ($id == NULL ){
			$data['Modulo']  = "Alumnos";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('codigo_alumno');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("Alumnos");
			}else{
                                $this->model_alumnos->Eliminar($id_eliminar);
				redirect("alumnos?delete=true");
			}
		}else{
			$data['datos_usuarios'] = $this->model_alumnos->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Alumnos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_alumnos',$data);
				$this->load->view('footer');
			}
		}
	}
	public function password($id=NULL){
		if ($id == NULL ){
			$data['Modulo']  = "Alumnos";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		$data['datos_usuarios'] = $this->model_alumnos->BuscarID($id);
		if ($this->input->post()) {
			$this->form_validation->set_rules("PASSWORD", "Password", "trim|required");
			$this->form_validation->set_rules("PASSWORD1", "Confirmar Password", "trim|required");
			if ($this->form_validation->run() == TRUE){
			    $password  = $this->input->post('PASSWORD');
				$password1 = $this->input->post('PASSWORD1');
				if($password==$password1){
				    
                                        $password_update  = array('PASSWORD' => MD5($password));
                                        $this->model_alumnos->edit($password_update,$id);
					redirect('alumnos?password=true');
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-error text-center">La Contraseña No coincide</div>');
                    $this->load->view('header');
					$this->load->view('view_password',$data);
					$this->load->view('footer');
				}
			}else{
				$this->load->view('header');
				$this->load->view('view_password',$data);
				$this->load->view('footer');
			}
			
		}else{
			
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Alumnos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_password',$data);
				$this->load->view('footer');
			}
		}
	
	}
	public function permisos($id = NULL){
	   if ($id == NULL ){
			$data['Modulo']  = "Alumnos";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			    $id              = $this->input->post("codigo_alumno");
				$permission_data = $this->input->post("permissions")!=false ? $this->input->post("permissions"):array();
				/*APLICAMOS UPDATE*/
				$this->model_alumnos->DesactivaPermisos($id);
				foreach($permission_data as $Permisos){
				    $ExistePermiso = $this->model_alumnos->ExistePermiso($id,$Permisos);
					/*EXISTE PERMISO ACTUALIZAMOS, SI NO INSERTAMOS*/
				    if($ExistePermiso==1){
						$this->model_alumnos->ActualizaPermiso($id,$Permisos);
					}else{
						$AgregaPermiso  = array(
							'ID_USUARIO' => $id,
							'ID_MENU'    => $Permisos
						);
						$this->model_alumnos->AgregaPermiso($AgregaPermiso);
					}
				}
				/*Si el usuario que se asigno permisos es el que esta logeado entonces refrescamos la sesion*/
				$IdUserLogin = $this->session->userdata('codigo_alumno');
				if($IdUserLogin==$id){
					$Menu = $this->model_login->PermisosMenu($id);
					$this->session->set_userdata($Menu);
				}
				
				redirect('alumnos?permisos=true');
		}else{
			$data['datos_usuarios'] = $this->model_alumnos->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Alumnos";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$EstatusPermiso = array();
				$DescripcionPerm= array();
				$idMenus		= array();
				$CountPermiso 	= 0;
			    $MenuCargardo 	= $this->model_alumnos->MenuCompleto();
				foreach($MenuCargardo as $Menu){
					$MiMenu = $this->model_alumnos->MiMenu($id,$Menu->ID);
					$EstatusPermiso[$CountPermiso] = array();
					$DescripcionPerm[$CountPermiso]= array();
					$idMenus[$CountPermiso]		   = array();
					$EstatusPermiso[$CountPermiso] = $MiMenu;
					$DescripcionPerm[$CountPermiso]= $Menu->DESCRIPCION;
					$idMenus[$CountPermiso]		   = $Menu->ID;
					$CountPermiso = $CountPermiso + 1;
					
				}
				$data['estatus_menu']     = $EstatusPermiso;
				$data['descripcion_menu'] = $DescripcionPerm;
				$data['id_menu']		  = $idMenus;
				$this->load->view('header');
				$this->load->view('view_permisos_alumnos',$data);
				$this->load->view('footer');
			}
		}
		
	 }
}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */
