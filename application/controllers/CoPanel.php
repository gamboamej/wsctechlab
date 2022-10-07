<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoPanel extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model("MoPersonas");
	//		$this->load->model("MoClientes");
			if(!$this->session->userdata('in_usuario')){redirect('salir');}

	}

	public function index()
	{
		$datos["usuarios"]	=$this->MoPersonas->filas();
		/*$data['css']=array(
			'web/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
			'web/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
			'web/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
			'web/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'
		   );  */  
		   
		$datos['js']=array(
			 'web/Dark-Admin-Bootstrap-4/vendor/chart.js/Chart.min.js',
			 'web/Dark-Admin-Bootstrap-4/js/charts-home.js',
		   );
		$this->load->view('ViCabeceraPagina', $datos);
		$this->load->view('CaPanel/ViPanel');
		$this->load->view('ViPiePagina');
	}

}
