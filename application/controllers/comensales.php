<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class comensales  extends CI_Controller
{

     public function __construct()
     {
     	  parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_comensales');
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
          $data['comensales'] = $this->model_comensales->ListarComensales();         
          $this->load->view('view_comensales', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el CODIGO_COMENSAL
			   $VerifyExist = $this->model_comensales->ExisteCodigo_comensal($this->input->post("CODIGO_COMENSAL"));
			   if($VerifyExist==0 ) {
               	    $UsuariosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    //$UsuariosInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_comensales->SaveComensales($UsuariosInsertar);
               	    redirect("comensales?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Codigo de comensal Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_comensal');
					$this->load->view('footer');
               }
			
		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_comensal');
			  $this->load->view('footer');
		} 
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("CODIGO_COMENSAL", "CODIGO_COMENSAL", "trim|required");
		
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
		
		if ($id == NULL){
			$data['Modulo']  = "Comensales";
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
				$id_insertado = $this->model_comensales->edit($datos_update,$id);
				redirect('comensales?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_usuarios'] = $this->model_comensales->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Comensales";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_editar_comensal',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($id = NULL){
		if ($id == NULL){
			$data['Modulo']  = "Comensales";
			$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('CODIGO_COMENSAL');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("Comensales");
			}else{
                                $this->model_comensales->Eliminar($id_eliminar);
				redirect("comensales?delete=true");
			}
		}else{
			$data['datos_usuarios'] = $this->model_comensales->BuscarID($id);
			if (empty($data['datos_usuarios'])){
				$data['Modulo']  = "Comensales";
				$data['Error']   = "Error: El ID <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_comensales',$data);
				$this->load->view('footer');
			}
		}
	}
	
}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */
