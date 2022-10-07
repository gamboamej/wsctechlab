<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoDocumentos extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model("MoPersonas");
			$this->load->model("MoDocumentos");
			if(!$this->session->userdata('in_usuario')){redirect('salir');}

	}

	public function index()
	{
		$datos["listar_documentos"]	=$this->MoDocumentos->listar();
		$datos['css']=array(
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/css/responsive.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
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
        'web/js/IuDocumentos.js',
        );
		$this->load->view('ViCabeceraPagina', $datos);
		$this->load->view('CaDocumentos/ViDocumentos');
		$this->load->view('ViPiePagina');
	}

	public function misdocumentos()
	{
		$datos["listar_documentos"]	=$this->MoDocumentos->misdocumentos();
		$datos['css']=array(
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/css/responsive.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
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
        'web/js/IuDocumentos.js',
        );
		$this->load->view('ViCabeceraPagina', $datos);
		$this->load->view('CaDocumentos/ViDocumentos');
		$this->load->view('ViPiePagina');
	}

	public function permisos()
	{
		$datos["listar_permisos_documentos"]	=$this->MoDocumentos->lst_permisos_documentos();
		$datos['css']=array(
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-responsive/css/responsive.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
			'web/Dark-Admin-Bootstrap-4/vendor/datatables-buttons/css/buttons.bootstrap4.min.css',
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
        'web/js/IuDocumentos-Permisos.js',
        );
		$this->load->view('ViCabeceraPagina', $datos);
		$this->load->view('CaDocumentos/ViDocumentosPermiso');
		$this->load->view('ViPiePagina');
	}


	public function docs($tx_url)
	{
		if (($this->session->userdata("co_tipo_usuario")==1))
		{$estado = False;
		$mensaje = $tx_url;}
		else
		{
			{$estado = True;
				$mensaje = 'Hola!'.$tx_url;}
		}
	}

	public function save()
	{

	$this->form_validation->set_rules('tx_nombre_documento', 'Nombre de Documento', 'required|min_length[1]|max_length[160]');
	if (empty($_FILES['userfile']['name']))
	{
		$this->form_validation->set_rules('userfile', 'Documento', 'required');
	}
	if ($this->form_validation->run() == false) {
	$estado = False;
	$mensaje = 'Informacion Requerida!';
	} else {
	$nb_archivo=$this->fileupload();
	$add =$this->MoDocumentos->add($nb_archivo);
	if ($add) {
	$estado = True;
	$mensaje = '¡Documento subido con exito!';
	} else {
	$estado = False;
	$mensaje = 'Documento No pudo Subirse!';
	}
	}
	echo json_encode($this->respuesta($estado,$mensaje));
	}

	public function del($id)
	{
	if (is_numeric($id)) {
	$findid = $this->MoDocumentos->findid($id);
	if (!$findid) {
	$estado = False;
	$mensaje = 'Documento NO encontrado!';
	} else {
	$datos_documento	=$this->MoDocumentos->urlid($id);
	$nb_documento		=$datos_documento->tx_url;	
	$ruta_archivo=$_SERVER['DOCUMENT_ROOT'].'/wsctechlab/web/docs/'.$nb_documento;
	if(file_exists($ruta_archivo)){
		if (unlink($ruta_archivo)) {
			$del = $this->MoDocumentos->del($id);
			if ($del) {
			$estado = true;
			$mensaje = '¡Registro Borrado con exito!';
			} else {
			$estado = false;
			$mensaje = 'Documento NO pudo ser eliminado!';
			}
	
		}
		
		} else {
		$estado = false;
		$mensaje = '¡Documento NO encontrado!';
		}
	}
	}
	else {
	$estado = false;
	$mensaje = '¡Parametro Incorrecto!';
	}
	echo json_encode($this->respuesta($estado,$mensaje));
	}

	public function permisar()
	{
		$this->form_validation->set_rules('co_documento', 'id', 'required|min_length[1]|max_length[20]');  
		$this->form_validation->set_rules('nu_rut', 'RUT', 'required|min_length[1]|max_length[20]');
		if ($this->form_validation->run() == false) {
			$estado = False;
			$mensaje = '!Datos Requeridos!';
			} 
			else 
			{
				$findid = $this->MoDocumentos->findid($this->input->post('co_documento'));
				if (!$findid) {
				$estado = False;
				$mensaje = '!Documento NO encontrado!';
				} else {
		

					$findCoUsuariobynu_rut  =$this->MoPersonas->findCoUsuariobynu_rut();
					if (!$findCoUsuariobynu_rut) {
					  $estado = False;
					  $mensaje = '!Persona no Encontrada!';
					   } 
					   else {

						$data = array('co_usuario_permiso_documento' => $findCoUsuariobynu_rut->co_usuario);
						$this->session->set_userdata($data);

						$add =$this->MoDocumentos->add_permiso_documento();
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

	echo json_encode($this->respuesta($estado,$mensaje));
	}


	public function del_documento_permiso($id)
    {
    if (is_numeric($id)) {
    $findbyid = $this->MoDocumentos->findbyid_documento_permiso($id);
    if ($findbyid==false) {
    $estado = False;
    $mensaje = '!Registro no encontrado!';
    } else {
    $del = $this->MoDocumentos->del_documento_permiso($id);
    if ($del) {
    $estado = true;
    $mensaje = '!Borrado!';
    } else {
    $estado = false;
    $mensaje = '!No puedo ser Borrado!';
    }
    }
    }
    else {
    $estado = false;
    $mensaje = '!Parametro Incorrecto!';
    }
    echo json_encode($this->respuesta($estado,$mensaje));
    }

	public function fileupload()	
	{
	$archivo  = $this->input->post('userfile');
	$config['upload_path']      = './web/docs';
	$config['allowed_types']    = '*';
	$config['max_size']         = '0';
	$config['encrypt_name']     = true;
	$config['remove_spaces']    = true;
	$this->upload->initialize($config);
	if($this->upload->do_upload())
	{
	$data = array('upload_data' => $this->upload->data());
	foreach($data as $index => $value){
	$archivo = $value['file_name'];
	}
	}
	else
	{
	$archivo = "error.jpg";
	}
	return $archivo;
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
