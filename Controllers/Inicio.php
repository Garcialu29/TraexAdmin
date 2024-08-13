<?php 
	
class Inicio extends Controllers {
		
	public function __construct() {
		parent::__construct();

		session_start();
		if(empty($_SESSION['login'])) {
			header('Location: '.base_url().'/login');
			die();
		}
	}

	public function inicio() {
		$data['page_id'] = '';
		$data['page_tag'] = "Inicio - traex";
		$data['page_title'] = "Inicio - traex";
		$data['page_name'] = "Inicio";

		// Cargar el modelo
		$this->loadModel("InicioModel");
		
		// Obtener datos para los gráficos
		$data['paquetesPorMes'] = $this->model->getPaquetesPorMes();
		$data['paquetesPorEstado'] = $this->model->getPaquetesPorEstado();
		$data['paquetesPorTipoEnvio'] = $this->model->getPaquetesPorTipoEnvio();
		$data['paquetesPorTipoPago'] = $this->model->getPaquetesPorTipoPago();
		$data['paquetesPorSeguro'] = $this->model->getPaquetesPorSeguro();
		
		
		// Cargar la vista
		$this->views->getView($this,"inicio",$data);
	}

}
?>