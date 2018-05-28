<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class usuarios extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_usuarios');
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
          $data['usuarios'] = $this->model_usuarios->ListarUsuarios();         
          $this->load->view('view_usuarios', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el email
			   $VerifyExist = $this->model_usuarios->ExisteEmail($this->input->post("EMAIL"));
               if($VerifyExist==0){
               	    $UsuariosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $UsuariosInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_usuarios->SaveUsuarios($UsuariosInsertar);
               	    redirect("usuarios?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Email Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_usuario');
					$this->load->view('footer');
               }
			
		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_usuario');
			  $this->load->view('footer');
		} 
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("NOMBRE", "Nombre", "trim|required");
		 $this->form_validation->set_rules("APELLIDOS", "Apellidos", "trim|required");
		 $this->form_validation->set_rules("EMAIL", "Email", "trim|required|valid_email");
		 $this->form_validation->set_rules("TIPO", "Tipo", "callback_select_tipo");
		 $this->form_validation->set_rules("ESTATUS", "Estatus", "callback_select_estatus");
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
		
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
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
				$id_insertado = $this->model_usuarios->edit($datos_update,$id);
				redirect('usuarios?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nuevo_usuario',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($id = NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('ID');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("usuarios");
			}else{
                                $this->model_usuarios->Eliminar($id_eliminar);
				redirect("usuarios?delete=true");
			}
		}else{
			$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete',$data);
				$this->load->view('footer');
			}
		}
	}
	public function password($id=NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
		if ($this->input->post()) {
			$this->form_validation->set_rules("PASSWORD", "Password", "trim|required");
			$this->form_validation->set_rules("PASSWORD1", "Confirmar Password", "trim|required");
			if ($this->form_validation->run() == TRUE){
			    $password  = $this->input->post('PASSWORD');
				$password1 = $this->input->post('PASSWORD1');
				if($password==$password1){
				    
                                        $password_update  = array('PASSWORD' => MD5($password));
                                        $this->model_usuarios->edit($password_update,$id);
					redirect('usuarios?password=true');
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
				$data['Modulo']  = "Usuarios";
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
	   if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Usuarios";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			    $id              = $this->input->post("ID");
				$permission_data = $this->input->post("permissions")!=false ? $this->input->post("permissions"):array();
				/*APLICAMOS UPDATE*/
				$this->model_usuarios->DesactivaPermisos($id);
				foreach($permission_data as $Permisos){
				    $ExistePermiso = $this->model_usuarios->ExistePermiso($id,$Permisos);
					/*EXISTE PERMISO ACTUALIZAMOS, SI NO INSERTAMOS*/
				    if($ExistePermiso==1){
						$this->model_usuarios->ActualizaPermiso($id,$Permisos);
					}else{
						$AgregaPermiso  = array(
							'ID_USUARIO' => $id,
							'ID_MENU'    => $Permisos
						);
						$this->model_usuarios->AgregaPermiso($AgregaPermiso);
					}
				}
				/*Si el usuario que se asigno permisos es el que esta logeado entonces refrescamos la sesion*/
				$IdUserLogin = $this->session->userdata('ID');
				if($IdUserLogin==$id){
					$Menu = $this->model_login->PermisosMenu($id);
					$this->session->set_userdata($Menu);
				}
				
				redirect('usuarios?permisos=true');
		}else{
			$data['datos_usuarios'] = $this->model_usuarios->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Usuarios";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$EstatusPermiso = array();
				$DescripcionPerm= array();
				$idMenus		= array();
				$CountPermiso 	= 0;
			    $MenuCargardo 	= $this->model_usuarios->MenuCompleto();
				foreach($MenuCargardo as $Menu){
					$MiMenu = $this->model_usuarios->MiMenu($id,$Menu->ID);
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
				$this->load->view('view_permisos',$data);
				$this->load->view('footer');
			}
		}
		
	 }
}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */