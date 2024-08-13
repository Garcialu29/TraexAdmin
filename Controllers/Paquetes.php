<?php
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class Paquetes extends Controllers
{
	public function __construct()
	{
		parent::__construct();

		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MPAQUETES);
	}

	public function paquetes()
	{
		if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
			header("Location:" . base_url() . '/inicio');
		}

		   // Registro en la bitácora
		   $fecha_actual = date("Y-m-d H:i:s");
		   $eventoBT = "Acceso a la vista Paquetes";
		   $descripcionBT = 'El usuario accedió a la vista de Paquetes';
	   
		   $objetoBT = 6; // Valor correspondiente al objeto tipo de seguro
		   $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
		  
		   
		$data['page_id'] = "";
		$data['page_tag'] = "Paquetes";
		$data['page_title'] = "Paquetes clientes";
		$data['page_name'] = "";
		$data['page_functions_js'] = "functions_paquetes.js";
		$data['casilleros'] = $this->model->getCasilleros();
		$data['Cod_Tipo_Envio'] = $this->model->getCodigoTipoEnvio();
		$data['id_tipo_pago'] = $this->model->getTipoPago();
		$data['tipo_seguros'] = $this->model->getTipoSeguros();
		$data['estado_envios'] = $this->model->getEstadoEnvios();

		$this->views->getView($this, "paquetes", $data);
	}


	public function getPaquetes()
	{
		if ($_SESSION['permisosMod']['Permiso_Get']) {

			$arrData = $this->model->selectPaquetes();

			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';


				$btnView .= ' <a title="Detalle" href="' . base_url() . '/paquetes/orden/' . $arrData[$i]['Cod_Envio_Paquetes'] . '" target="_blanck"class="btn btn-info btn-sm"> <i class="far fa-eye"></i> </a>';
					
					if($_SESSION['permisosMod']['Permiso_Update']){
				if ($arrData[$i]['Id_Estado_Envio'] == 5) {
					$btnEdit = '<button class="btn btn-secondary btn-sm" disabled="" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
				} else {
					$btnEdit = '<button class="btn btn-info btn-sm" onClick="fntEditInfo('. $arrData[$i]['Cod_Envio_Paquetes'] .')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
				}
			}
				if($_SESSION['permisosMod']['Permiso_Delete']){
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol"  onClick="fntDelPaquete(' . $arrData[$i]['Cod_Envio_Paquetes'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
					</div>';
				}
				
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	

	public function orden(int $Cod_Envio_Paquetes)
	{
		if (!is_numeric($Cod_Envio_Paquetes)) {
			header("Location:" . base_url() . '/paquetes');
		}
		if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
			header("Location:" . base_url() . '/inicio');
		}
		   // Registro en la bitácora
		   $fecha_actual = date("Y-m-d H:i:s");
		   $eventoBT = "Acceso a la orden de paquete";
		   $descripcionBT = 'El usuario accedió a la orden de un paquete';
	   
		   $objetoBT = 6; // Valor correspondiente al objeto tipo de seguro
		   $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
		   
		//$paquete = $this->model->selecPaquete($Cod_Envio_Paquetes);

		$data['page_tag'] = "Paquete";
		$data['page_title'] = "Paquete ";
		$data['page_name'] = "paquete";
		$data['arrPaquete'] = $this->model->selectPaquete($Cod_Envio_Paquetes);
		$this->views->getView($this, "orden", $data);
	}


	public function getPaquete(string $Cod_Envio_Paquetes)
	{
		if ($_SESSION['permisosMod']['Permiso_Get'] ) {
			if ($Cod_Envio_Paquetes == "") {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$requestPaquete = $this->model->selectPaquete($Cod_Envio_Paquetes, "");

				if (empty($requestPaquete)) {
					$arrResponse = array("status" => false, "msg" => "Datos no disponibles.");
				} else {
					$htmlModal = getFile("Template/Modals/modalPaquetes", $requestPaquete);
					$arrResponse = array("status" => true, "html" => $htmlModal);
				}

			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	
	}


	function filtro($searchTxt) 
	{
		$requestFiltro = $this->model->filtroPaquete($searchTxt);
		
		if ($requestFiltro) {
			echo json_encode($requestFiltro, JSON_UNESCAPED_UNICODE);
		} else {
			// Número de rastreo no encontrado
			echo json_encode(array('error' => 'Número de rastreo no encontrado'));
		}
	
		die();
	}
	



	function obtener($Cod_Envio_Paquetes, $nuevosDatos = null) 
{
    if ($nuevosDatos !== null) {
        // Si se proporcionan nuevos datos, realizar la actualización
        $requestActualizar = $this->model->actualizarPaquete($Cod_Envio_Paquetes, $nuevosDatos);
        echo json_encode($requestActualizar, JSON_UNESCAPED_UNICODE);
    } else {
        // Si no se proporcionan nuevos datos, realizar la obtención
        $requestObtener = $this->model->obtenerPaquete($Cod_Envio_Paquetes);
        echo json_encode($requestObtener, JSON_UNESCAPED_UNICODE);
    }


}

// Método para obtener la dirección del cliente
public function getClienteDireccion($Id_Casillero)
{
    $data = $this->model->selectClienteDireccion($Id_Casillero);
    if ($data) {
        $arrResponse = array('status' => true, 'data' => array('direccion' => $data['direccion']));
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
}


	public function agregar()
	{
		$Cod_Envio_Paquetes = $_POST['Cod_Envio_Paquetes'];
		$Id_Casillero = $_POST['Id_Casillero'];
		$Cod_Tipo_Envio = $_POST['Cod_Tipo_Envio'];
		$Peso_paquete = $_POST['Peso_paquete'];
		$Volumen_paquete = $_POST['Volumen_paquete'];
		$Numero_Traking = $_POST['Numero_Traking'];
		$compra = $_POST['compra'];
		$id_Tipo_Seguro = $_POST['id_Tipo_Seguro'];
		$Id_Estado_Envio = $_POST['Id_Estado_Envio'];
		$Direccion_Envio = $_POST['Direccion_Envio'];
		$Fecha_Entrega = $_POST['Fecha_Entrega'];
		$Fecha_pedido = $_POST['Fecha_pedido'];	
		$id_tipo_pago = $_POST['id_tipo_pago'];

		// Validaciones para Peso_paquete, Volumen_paquete y compra
		if ($Peso_paquete <= 0 || $Volumen_paquete <= 0 || $compra < 0 || $Numero_Traking <= 0) {
			// Si alguno de los valores es negativo o igual a 0, redirigir a la página de paquetes
			header("Location:" . base_url() . '/paquetes?error=Datos negativos no permitidos');
			return;
		}
		$arrValues = [
			//$Cod_Envio_Paquetes,
			$Id_Casillero,
			$Cod_Tipo_Envio,
			$Peso_paquete,
			$Volumen_paquete,
			$Numero_Traking,
			$compra,
			$id_Tipo_Seguro,
			$Id_Estado_Envio,
			$Direccion_Envio,
			$Fecha_Entrega,
			$Fecha_pedido,
			$id_tipo_pago
		];

		if ($Cod_Envio_Paquetes = $_POST['Cod_Envio_Paquetes'] > 0 ) {
			$res = $this->model->actualizarPaquete($Cod_Envio_Paquetes, $arrValues);
			$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			// Bitácora
			$fecha_actual = date("Y-m-d H:i:s");
			$eventoBT =  "Paquete Actualizado";
			$descripcionBT = 'Se actualizó el paqueten con tracking ' . $Numero_Traking;

			$objetoBT = 6; // Valor correspondiente al objeto tipo de envío
			$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

		}else{
			$res = $this->model->agregarPaquete($arrValues);
			$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			// Bitácora
			$fecha_actual = date("Y-m-d H:i:s");
			$eventoBT = "Agregar nuevo paquete" ;
			$descripcionBT = 'Se agregó un nuevo paquete ' . $Numero_Traking ;

			$objetoBT = 10; // Valor correspondiente al objeto tipo de envío
			$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
		}
		header("Location:" . base_url() . '/paquetes');
	}

	function actualizar()
	{
		$Cod_Envio_Paquetes = $_POST['Cod_Envio_Paquetes'];
		$Id_Casillero = $_POST['Id_Casillero'];
		$Cod_Tipo_Envio = $_POST['Cod_Tipo_Envio'];
		$Peso_paquete = $_POST['Peso_paquete'];
		$Volumen_paquete = $_POST['Volumen_paquete'];
		$Numero_Tracking = $_POST['Numero_Traking'];
		$compra = $_POST['compra'];
		$id_Tipo_Seguro = $_POST['id_Tipo_Seguro'];
		$Id_Estado_Envio = $_POST['Id_Estado_Envio'];
		$Direccion_Envio = $_POST['Direccion_Envio'];
		$Fecha_Entrega = $_POST['Fecha_Entrega'];
		$Fecha_pedido = $_POST['Fecha_pedido'];
		$id_tipo_pago = $_POST['id_tipo_pago'];
	
		$arrValues = [
			$Cod_Envio_Paquetes,
			$Id_Casillero,
			$Cod_Tipo_Envio,
			$Peso_paquete,
			$Volumen_paquete,
			$Numero_Tracking,
			$compra,
			$id_Tipo_Seguro,
			$Id_Estado_Envio,
			$Direccion_Envio,
			$Fecha_Entrega,
			$Fecha_pedido,
			$id_tipo_pago, // Asegúrate de incluir el campo id_tipo_pago aquí
		];
		$res = $this->model->actualizarPaquete($Cod_Envio_Paquetes, $arrValues);
		header("Location:" . base_url() . '/paquetes');
		$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
		// Bitácora
		$fecha_actual = date("Y-m-d H:i:s");
		$eventoBT =  "Paquete Actualizado";
		$descripcionBT = 'Se actualizó el paqueten con tracking ' . $Numero_Traking;

		$objetoBT = 6; // Valor correspondiente al objeto tipo de envío
		$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

	}
	


	public function delPaquete()
{
    if ($_POST) {
        if ($_SESSION['permisosMod']['Permiso_Delete']) {
            $intCod_Envio_Paquetes = intval($_POST['Cod_Envio_Paquetes']);
            $requestDelete = $this->model->deletePaquete($intCod_Envio_Paquetes);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el paquete.');
                // Bitácora
                $fecha_actual = date("Y-m-d H:i:s");
                $eventoBT = "Eliminar paquete";
                $descripcionBT = 'Se eliminó el paquete con ID ' . $intCod_Envio_Paquetes;
                $objetoBT = 6; // Valor correspondiente al objeto tipo de envío
                $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el paquete.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    die();
}

public function getPaquetesR(string $params)
{
    if($_SESSION['permisosMod']['Permiso_Get']) {
        // Limpia el buffer de salida antes de comenzar
        ob_end_clean();

        $arrParams = explode(',', $params); // Convierte a un arreglo toda la cadena
        $contenido = strClean($arrParams[0]);
        $data = $this->model->selectPaqueteR($contenido);

        // Obtén el contenido HTML para el PDF
        $html = getFile("Template/Modals/reportePaquetePDF", $data);

        // Genera el PDF
        try {
            $html2pdf = new Html2Pdf();
            $html2pdf->writeHTML($html);
            $html2pdf->output();
        } catch (Exception $e) {
            // Manejo de errores si ocurre algún problema con la generación del PDF
            echo 'Error al generar el PDF: ', $e->getMessage();
        }

        // Bitácora
        $fecha_actual = date("Y-m-d H:i:s");
        $eventoBT = "Generó reporte";
        $descripcionBT = 'Generó un reporte de paquetes en formato PDF';
        $objetoBT = 6; // Valor correspondiente al objeto tipo de envío
        $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

        // Termina el script después de la generación del PDF
        die();
    }
}


	public function cambiarEstado()
	{
		// Obtener datos en formato JSON
		$input = json_decode(file_get_contents('php://input'), true);
		
		if (isset($input['ids']) && isset($input['Id_Estado_Envio'])) {
			$ids = $input['ids']; // IDs de paquetes
			$Id_Estado_Envio = $input['Id_Estado_Envio']; // Nuevo estado
	
			if (!empty($ids)) {
				$result = $this->model->actualizarEstadoPaquetes($ids, $Id_Estado_Envio);
				$response = ['status' => $result];
			} else {
				$response = ['status' => false, 'msg' => 'No se recibieron IDs'];
			}
		} else {
			$response = ['status' => false, 'msg' => 'No se recibieron datos'];
		}
		
		echo json_encode($response);
		die();
	}
		
	
	public function getPaquetesExcel()
    {
            $data = $this->model->selectPaquetes();
			ob_end_clean();
			$html = getFile("Template/Modals/reportePaquetePDF",$data);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

}
