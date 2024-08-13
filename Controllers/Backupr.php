<?php 

	class Backupr extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login'])){//validamos si existe la variable de session que seria login y lo que va hacer es redireccionar al login 
				header('Location: '.base_url().'/login');//muestra la vista 
			}
			getPermisos(MBACKUP);
		}
 
		public function backupr()
		{
			if(empty($_SESSION['permisosMod']['Permiso_Get'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_id'] = 2;
			$data['page_tag'] = "Backupr - Traex";
			$data['page_title'] = "Backupr - Traex";
			$data['page_name'] = "Backupr";

			 // Registro en la bitácora
			 $fecha_actual = date("Y-m-d H:i:s");
			 $eventoBT = "Acceso a la Backup";
			 $descripcionBT = 'El usuario accedió a la vista de Backup';
		 
			 $objetoBT = 8; // Valor correspondiente al objeto tipo de seguro
			 $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
			
			$this->views->getView($this,"backupr",$data);
		}



	}
 ?>