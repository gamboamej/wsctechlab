<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase CoPersonas.
 * Funciones: 1.
 * __construct.
 */

class CoPersonas extends CI_Controller
{

    /**
     * Constructor de la clase.
     * Conecta la con el modelo MoPersonas, MoPersonas, MoTipoUsuario.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("MoPersonas");
      if(!$this->session->userdata('in_usuario')){redirect('salir');}
      else{if (($this->session->userdata("co_tipo_usuario")!=1)){show_404();}}

    }

    public function index()
    {
        $datos["listar_usuarios"]	    =$this->MoPersonas->listar();
        $datos['css']=array(
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/css/responsive.bootstrap4.min.css',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
          'web/Dark-Admin-Bootstrap-4/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css',
          'web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.css');
           
            $datos['js']=array(
            'web/Dark-Admin-Bootstrap-4/vendor/datatables/jquery.dataTables.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/js/dataTables.responsive.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/js/responsive.bootstrap4.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/dataTables.buttons.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.bootstrap4.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/jszip/jszip.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/pdfmake/pdfmake.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/pdfmake/vfs_fonts.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.html5.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.print.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.colVis.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/jquery-validation/jquery.validate.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.js',
            'web/Dark-Admin-Bootstrap-4/vendor/bootstrap-fileupload/bootstrap-fileupload.js',
            'web/js/IuViPersonas.js',
            );
        $this->load->view('ViCabeceraPagina', $datos);
        $this->load->view('CaPersonas/ViPersonas');
        $this->load->view('ViPiePagina');
        //$this->load->view('IuPagina');
        //$this->load->view('CaPersonas/IuPersonas');
    }

    public function registro()
    {
      $datos['css']=array(
        'web/Dark-Admin-Bootstrap-4/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css',
        'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/css/responsive.bootstrap4.min.css',
        'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
        'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
        'web/Dark-Admin-Bootstrap-4/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css',
        'web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.css');
         
          $datos['js']=array(
          'web/Dark-Admin-Bootstrap-4/vendor/datatables/jquery.dataTables.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/js/dataTables.responsive.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/js/responsive.bootstrap4.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/dataTables.buttons.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.bootstrap4.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/jszip/jszip.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/pdfmake/pdfmake.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/pdfmake/vfs_fonts.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.html5.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.print.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/js/buttons.colVis.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/jquery-validation/jquery.validate.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.js',
          'web/Dark-Admin-Bootstrap-4/vendor/bootstrap-fileupload/bootstrap-fileupload.js',
          'web/js/IuFrmPersonas.js',
          );
    $datos["list_user_active"]	=$this->MoPersonas->list_user_active();
    $this->load->view('ViCabeceraPagina', $datos);
    $this->load->view('CaPersonas/ViFrmPersonas');
    $this->load->view('ViPiePagina');
    }

    public function save()
    {
      if  (empty($this->input->post('id'))){
        $findnu_rut     =$this->MoPersonas->findnu_rut();
        if ($findnu_rut){
          $estado = False;
          $mensaje = 'RUT no disponible, Cambielo!';
        } 
        else{
          $findtx_correo  =$this->MoPersonas->findtx_correo();
          if ($findtx_correo){
             $estado = False;
             $mensaje = 'Correo no disponible, Cambielo!';
           } 
           else {
            $checkavatar=$this->checkavatar();
            if ($checkavatar) {
            $nb_foto=$this->imageupload();
            }
            else {
              $nb_foto="no-user.jpg";
            }
              $add =$this->MoPersonas->add($nb_foto);
              if ($add) {
              $estado = True;
              $mensaje = 'Guardado!';
              } else {
              $estado = False;
              $mensaje = 'No Guardado!';
              }
            }
        }
      }
      else
      {
        $findbyid  =$this->MoPersonas->findbyid();
        if (!$findbyid) {
          $estado = False;
          $mensaje = 'Persona no Encontrada!';
           } 
          else {
            $findbyidnonu_rut     =$this->MoPersonas->findbyidnonu_rut();
           if ($findbyidnonu_rut){
              $estado = False;
              $mensaje = 'RUT no disponible, Cambielo!';
            } 
            else {
              $findbyidnotx_correo  =$this->MoPersonas->findbyidnotx_correo();
              if ($findbyidnotx_correo){
                 $estado = False;
                 $mensaje = 'Correo no disponible, Cambielo!';
               } 
               else{
                $this->form_validation->set_rules('id', 'id', 'required|min_length[1]|max_length[20]');  
                $this->form_validation->set_rules('nu_rut', 'RUT', 'required|min_length[1]|max_length[20]');
                $this->form_validation->set_rules('tx_nombre', 'Nombre', 'required|min_length[1]|max_length[60]');
                $this->form_validation->set_rules('tx_apellido', 'Apellido', 'required|min_length[1]|max_length[100]');
                $this->form_validation->set_rules('tx_correo', 'Correo', 'required|min_length[1]|max_length[100]');
                $this->form_validation->set_rules('co_usuario_rol', 'Rol', 'required');
                $this->form_validation->set_rules('in_status', 'Activo', 'required');
                if ($this->form_validation->run() == false) {
                $estado = False;
                $mensaje = 'Datos Requeridos!';
                } 
                else 
                {
                  $checkavatar=$this->checkavatar();
                  if ($checkavatar) {
                  $nb_foto=$this->imageupload();
                  }
                  else {
                    $nb_foto=null;
                  }
                  $upd =$this->MoPersonas->edit($nb_foto);
                  if ($upd) {
                  $estado = True;
                  $mensaje = 'Guardado!';
                  } else {
                  $estado = False;
                  $mensaje = 'No pudo ser editado!';
                  }
                }
               }
            }
          }
      }
    echo json_encode($this->respuesta($estado,$mensaje));
    }

    public function checkavatar(){
      $useravatar=!empty($_FILES['userfile']['name']);
      if ($useravatar) {
      $checkavatar = true;
      } else {
      $checkavatar = false;
      }
      return $checkavatar;
    }

    public function repassword($id)
    {
      if  ((!empty($id)) and (is_numeric($id)))
    {
    $findbyid = $this->MoPersonas->findbyid();
    if ($findbyid==false) {
    $estado = False;
    $mensaje = 'Persona no Encontrada!';
    } else
    {
    $repassword			=$this->MoPersonas->repassword();
    if ($repassword) {
    $estado = True;
    $mensaje = 'Reset Exitoso!';
    } else {
    $estado = False;
    $mensaje = 'Reset Fallido!';
    }
    }
    }
    else {
    $estado = false;
    $mensaje = 'Parametro Incorrecto!';
    }
    echo json_encode($this->respuesta($estado,$mensaje));
    }

    public function active($id)
    {
      if  ((!empty($id)) and (is_numeric($id))) {
    $findbyid = $this->MoPersonas->findbyid();
    if ($findbyid==false) {
    $estado = False;
    $mensaje = 'Persona no Encontrada!';
    } else {
    $active = $this->MoPersonas->active($id);
    if ($active == true) {
    $estado = True;
    $mensaje = 'Activado!';
    } else {
    $estado = false;
    $mensaje = 'No pudo ser Activado!';
    }
    }
    }
    else {
    $estado = false;
    $mensaje = 'Parametro Incorrecto!';
    }
    echo json_encode($this->respuesta($estado,$mensaje));
    }

    public function inactive($id)
    {
    if  ((!empty($id)) and (is_numeric($id))) {
    $findbyid = $this->MoPersonas->findbyid();
    if ($findbyid==false) {
    $estado = False;
    $mensaje = 'Persona no Encontrada!';
    } else {
    $inactive = $this->MoPersonas->inactive($id);
    if ($inactive == true) {
    $estado = True;
    $mensaje = 'Desactivado!';
    } else {
    $estado = false;
    $mensaje = 'No pudo ser Desactivado!';
    }
    }
    }
    else {
    $estado = false;
    $mensaje = 'Parametro Incorrecto!';
    }
    echo json_encode($this->respuesta($estado,$mensaje));
    }

    public function del($id)
    {
    if (is_numeric($id)) {
    $findbyid = $this->MoPersonas->findbyid();
    if ($findbyid==false) {
    $estado = False;
    $mensaje = 'Persona no encontrada!';
    } else {
    $del = $this->MoPersonas->del($id);
    if ($del) {
    $estado = true;
    $mensaje = 'Borrado!';
    } else {
    $deltemporarily = $this->MoPersonas->deltemporarily($id);
    if ($deltemporarily) {
      $estado = true;
      $mensaje = 'Borrado Temporalmente!';
    }
    else{
    $estado = false;
    $mensaje = 'No puedo ser Borrado!';
    }
    }
    }
    }
    else {
    $estado = false;
    $mensaje = 'Parametro Incorrecto!';
    }
    echo json_encode($this->respuesta($estado,$mensaje));
    }

    public function imageupload()
    {
      if(isset($_FILES['userfile']['name'])){
      $config['upload_path']      = './web/img/personas';
      $config['allowed_types']    = 'gif|jpg|jpeg|png|webp';
      $config['max_size']         = '0';
      $config['encrypt_name']     = true;
      $config['remove_spaces']    = true;
      $this->upload->initialize($config);
      if($this->upload->do_upload())
      {
      $data = array('upload_data' => $this->upload->data());
      foreach($data as $index => $value){
      $foto = $value['file_name'];
      }
      }
      else
      {
      $foto = "error.jpg";
      }
    }
    else{
      $foto = "no-user.jpg";
    }
      return $foto;
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
