<?php
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class EstadoEnvios extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MESTADO);
	}

	public function estadoEnvios()
	{
		if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
			header("Location:" . base_url() . '/inicio');
		}
        // Registro en la bitácora
    $fecha_actual = date("Y-m-d H:i:s");
    $eventoBT = "Acceso a la vista Estaid de envios";
    $descripcionBT = 'El usuario accedió a la vista de estados de envio de paquetes';

    $objetoBT = 13; // Valor correspondiente al objeto tipo de seguro
    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
    
		$data['page_id'] = "";
		$data['page_tag'] = "Tipo de Envios";
		$data['page_title'] = "Tipo de Envios";
		$data['page_name'] = "";
		$data['page_functions_js'] = "function_estadoEnvios.js";

		$this->views->getView($this, "estadoEnvios", $data);
	}

	public function getEstadosEnvios()
{
    $arrData = $this->model->selectEstadosEnvios();

    for ($i = 0; $i < count($arrData); $i++) {
        $btnView = '';
        $btnEdit = '';
        $btnDelete = '';
        if ($_SESSION['permisosMod']['Permiso_Update'] || $_SESSION['userData']['id_usuario'] == 1) {
        $btnEdit = '<button class="btn btn-primary btn-sm btnEditEstadoEnvio" onClick="fntEditEstadoEnvio(' . $arrData[$i]['Id_Estado_Envio'] . ')" title="Editar"><i class="fa fa-pencil"></i></button>';
        }
        if ($_SESSION['permisosMod']['Permiso_Delete'] || $_SESSION['userData']['id_usuario'] == 1) {
        $btnDelete = '<button class="btn btn-danger btn-sm btnDelEstadoEnvio" onClick="fntDelEstadoEnvio(' . $arrData[$i]['Id_Estado_Envio'] . ')" title="Eliminar"><i class="fa fa-trash"></i></button>';
        }
        $arrData[$i]['opciones'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
    }
    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
}


public function setEstadoEnvio()
{
    if ($_POST) {
        if (empty($_POST['txtDescripcion'])) {
            $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.', "alert" => "error");
        } else {
            $Id_Estado_Envio = intval($_POST['Id_Estado_Envio']);
            $strDescripcion = strClean($_POST['txtDescripcion']);

            $request_estadoenvio = "";

            if ($Id_Estado_Envio == 0) {
                $option = 1;
                $request_estadoenvio = $this->model->insertEstadoEnvio($strDescripcion);
            } else {
                $option = 2;
                $request_estadoenvio = $this->model->updateEstadoEnvio($Id_Estado_Envio, $strDescripcion);
            }
            error_log("Resultado de la operación: " . print_r($request_estadoenvio, true));
            if ($request_estadoenvio > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.', "alert" => "success");

                // Bitácora
                $fecha_actual = date("Y-m-d H:i:s");
                $eventoBT = $option == 1 ? "Agregar estado de envío" : "Actualizar estado de envío";
                $descripcionBT = $option == 1 ? 'Se agregó el nuevo estado de envío ' . $strDescripcion : 'Se actualizó el estado de envío ' . $strDescripcion;

                $objetoBT = 13; // Valor correspondiente al objeto estado de envío
                $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
            } else if ($request_estadoenvio == 'exist') {
                $arrResponse = array('status' => false, 'msg' => '¡Atención! el estado de envío ya existe, ingrese otro.', "alert" => "error");
            } else {
                $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.', "alert" => "error");
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
}

public function delEstadoEnvio()
{
    if ($_POST) {
        $intIdEstadoEnvio = intval($_POST['Id_Estado_Envio']);
        $requestDelete = $this->model->deleteEstadoEnvio($intIdEstadoEnvio);
        if ($requestDelete) {
            $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el estado de envío', "alert" => "success");

            // Bitácora
            $fecha_actual = date("Y-m-d H:i:s");
            $eventoBT = "Eliminar estado de envío";
            $descripcionBT = 'Se eliminó el estado de envío con ID ' . $intIdEstadoEnvio;

            $objetoBT = 13; // Valor correspondiente al objeto estado de envío
            $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el estado de envío.', "alert" => "error");
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
}


    public function getEstadoEnvio($Id_Estado_Envio)
{
    $Id_Estado_Envio = intval($Id_Estado_Envio);
    if ($Id_Estado_Envio > 0) {
        $arrData = $this->model->selectEstadoEnvio($Id_Estado_Envio);
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        } else {
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
}
public function getEstadoEnvioR(string $params)
{
        if($_SESSION['permisosMod']['Permiso_Get']){
        $arrParams = explode(',', $params); // por medio de explode convierte a un arreglo toda la cadena
		$contenido = strClean($arrParams[0]); //valor del arreglo en la posicion 0
		$data = $this->model->selectEstadosEnviosR($contenido);
		ob_end_clean();
		$html = getFile("Template/Modals/reporteEstadoEnvioPDF", $data);
		$html2pdf = new Html2Pdf();
		$html2pdf->writeHTML($html);
		$html2pdf->output();
    
        // Bitácora
        $fecha_actual = date("Y-m-d H:i:s");
        $eventoBT = "Generó reporte";
        $descripcionBT = 'Generó un reporte de estados de envío en formato PDF';

        $objetoBT = 13; // Valor correspondiente al objeto estado de envío
        $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
    }
    die();
}


}
