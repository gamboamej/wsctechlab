<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoInicio extends CI_Controller {

	public function __construct()
	{
					parent::__construct();
					$this->load->model("MoPersonas");
	}

	public function index()
	{
		$datos['tx_token'] 	= $this->token();
		$this->load->view('ViInicio',$datos);
	}

	public function ingreso()
	{

		if($this->input->post('tx_token') && $this->input->post('tx_token') == $this->session->userdata('tx_token'))
		{
						$this->form_validation->set_rules('rutuser', 'Indicador de usuario', 'required|trim|min_length[2]|max_length[150]');
						$this->form_validation->set_rules('rutuser-password', 'Clave de Usuario', 'required|min_length[4]|max_length[150]');
						if($this->form_validation->run() == false)
			{
				$estado = False;
				$mensaje = '¡Datos Requeridos!';
			}
			else
			{
				if($this->input->post('tx_token') == $this->session->userdata('tx_token')) { /// Fin del Captcha
				$tx_usuario 			= $this->input->post('rutuser');
				$tx_clave 				= md5($this->input->post('rutuser-password'));
				$valida_usuario		= $this->MoPersonas->validausuario($tx_usuario,$tx_clave);
				if($valida_usuario)
				{
					$usuario_activo	= $this->MoPersonas->usuarioactivo($tx_usuario,$tx_clave);
					if(!$usuario_activo)
					{
					$usuario_eliminado	= $this->MoPersonas->usuarioeliminado($tx_usuario,$tx_clave);
					if($usuario_eliminado)
					{	$estado = False;
						$mensaje = '¡Usuario Borrado!';
					}
						else
						{
						$estado = False;
						$mensaje = '¡Usuario Desactivado!';
						}

					}
					else
					{
					$data = array(
					'in_usuario' 		=> true,
					'co_usuario' 		=> $valida_usuario->co_usuario);
					$this->session->set_userdata($data);
					$estado = True;
					$mensaje = '¡Bienvenido!';
					}
				}
				else{
					$indicador_usuario	= $this->MoPersonas->indicadorusuario($tx_usuario);
					if($indicador_usuario)
					{
						$estado = False;
						$mensaje = '¡Usuario o clave incorrectos!';

					}
						else{
							$estado = False;
							$mensaje = '¡Usuario no Registrado!';

					}
				}
			}
			else
			{
				$estado = False;
				$mensaje = '¡Token Vencido!';
			}
			}
		}
		else
		{
			$estado = False;
			$mensaje = '¡Token Invalido!';
		}
		  echo json_encode($this->respuesta($estado,$mensaje));
	}

	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('tx_token',$token);
		return $token;
	}

	public function salir()
	{
		$this->session->unset_userdata('');
		$this->session->sess_destroy();
		redirect('inicio');
	}

	public function respuesta($estado,$mensaje)
	{
		if (!isset($respuesta)) {
			$respuesta = (object)array();}
			$respuesta->resultado = $estado;
			$respuesta->mensaje   = $mensaje;
			return $respuesta;
	}

}
