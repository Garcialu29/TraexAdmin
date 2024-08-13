<?php 
require 'Libraries/html2pdf/vendor/autoload.php';
	class Rastreo extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MRASTREO);
		}

		public function rastreo()
		{
			if (empty($_SESSION['permisosMod']['Permiso_Get'] )) {
				header("Location:" . base_url() . '/inicio');
			}
			// Registro en la bitácora
			$fecha_actual = date("Y-m-d H:i:s");
			$eventoBT = "Acceso a la vista rastres";
			$descripcionBT = 'El usuario accedió a la vista de rastreo/etiqueta de paquete';
		
			$objetoBT = 7; // Valor correspondiente al objeto tipo de seguro
			$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
			
			$data['page_id'] = "";
			$data['page_tag'] = "Rastreo";
			$data['page_title'] = "Rastreo de Paquetes";
			$data['page_name'] = "home";
			$data['page_functions_js'] = "functions_paquetes.js";

			$this->views->getView($this,"rastreo",$data);
		}


		

	}
 ?>