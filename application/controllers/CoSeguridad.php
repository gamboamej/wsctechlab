<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase CoSeguridad.
 * Conecta la con el modelo MoSeguridad.
 * Funciones: 1.
 * __construct.
 */

class CoSeguridad extends CI_Controller
{

    /**
     * Constructor de la clase.
     * Conecta la con el modelo MoSeguridad
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("MoPersonas");
        $this->load->model("MoSeguridad");
        if(!$this->session->userdata('in_usuario')){redirect('salir');}

    }

    public function sesion()
    {
      $co_usuario			  =$this->session->userdata('co_usuario');
      $sesion_usuario 	=$this->MoSeguridad->sesionusuario($co_usuario);
      //$menu_usuario 	  =$this->MoSeguridad->menu_usuario($co_usuario);
      if($sesion_usuario == true)
      {
        $data = array(
        //'menu_usuario'  => $menu_usuario,
        'tx_nombre' 		  => $sesion_usuario->tx_nombre,
        'tx_apellido' 	  => $sesion_usuario->tx_apellido,
        //'url_avatar' 	  => $sesion_usuario->url_avatar,
        'nu_rut' 		      => $sesion_usuario->nu_rut,
        'co_tipo_usuario' => $sesion_usuario->co_usuario_rol,
        'tx_rol'          => $sesion_usuario->tx_rol,);
        $this->session->set_userdata($data);
        redirect('panel');
      }
      else
      {
        redirect('salir');
      }
    }

    public function changepassword()
    {
      $this->form_validation->set_rules('tx_clave', 'Contrasena Actual', 'required|min_length[5]|max_length[20]');
      $this->form_validation->set_rules('tx_clave_nueva', 'Nueva Contrasena', 'required|min_length[5]|max_length[20]');
      $this->form_validation->set_rules('tx_clave_nueva_repetida', 'Nueva Contrasena Repetida', 'required|min_length[5]|max_length[20]');
      if($this->form_validation->run() == false)
      {
        $estado = False;
        $mensaje = '!Datos Requeridos!';
      }
      else
      {
        $tx_usuario				  = $this->session->userdata('nu_rut');
        $tx_clave			      = md5($this->input->post('tx_clave'));
        $valida_usuario			= $this->MoPersonas->validausuario($tx_usuario,$tx_clave);
        if (!$valida_usuario) {
          $estado = False;
          $mensaje = '!Usuario o Contraseña incorrectos!';
        }
        else
        {
          $co_usuario					= $this->session->userdata('co_usuario');
          $tx_clave_nueva	    = md5($this->input->post('tx_clave_nueva'));
          $cambiar_clave			= $this->MoPersonas->changepassword($co_usuario,$tx_clave_nueva);
          if ($cambiar_clave) {
            $estado = True;
            $mensaje = '!Cambio realizado con exito!';
          }
          else {
            $estado = True;
            $mensaje = '!No logro realizar el cambio!';
          }
        }
      }
     echo json_encode($this->respuesta($estado,$mensaje));
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
