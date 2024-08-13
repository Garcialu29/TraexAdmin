<?php 
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class TipoEnvios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        getPermisos(MENVIO);
    }

    public function TipoEnvios()
    {
        if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
            header("Location:" . base_url() . '/inicio');
        }
        // Registro en la bitácora
    $fecha_actual = date("Y-m-d H:i:s");
    $eventoBT = "Acceso a la vista Tipo de envios";
    $descripcionBT = 'El usuario accedió a la vista de tipos de envios para paquetes';

    $objetoBT = 10; // Valor correspondiente al objeto tipo de seguro
    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
    
        $data['page_tag'] = "Tipo de Envío";
        $data['page_title'] = "Tipos de Envío";
        $data['page_name'] = "Tipo_Envios";
        $data['page_functions_js'] = "functions_tipoEnvios.js";
        $this->views->getView($this, "tipoEnvios", $data);
    }

    // Método para insertar o actualizar un tipo de envío
    public function setTipoEnvio()
    {
        if ($_POST) {
            if (empty($_POST['txtDescripcion']) || empty($_POST['txtMonto'])) {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.', "alert" => "error");
            } else {
                $Cod_Tipo_Envio = intval($_POST['Cod_Tipo_Envio']);
                $strDescripcion = strClean($_POST['txtDescripcion']);
                $intMonto = intval($_POST['txtMonto']);

                $request_tipoenvio = "";

                if ($Cod_Tipo_Envio == 0) {
                    $option = 1;
                    $request_tipoenvio = $this->model->insertTipoEnvio($strDescripcion, $intMonto);
                } else {
                    $option = 2;
                    $request_tipoenvio = $this->model->updateTipoEnvio($Cod_Tipo_Envio, $strDescripcion, $intMonto);
                }

                if ($request_tipoenvio > 0) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.', "alert" => "success");

                    // Bitácora
                    $fecha_actual = date("Y-m-d H:i:s");
                    $eventoBT = $option == 1 ? "Agregar tipo de envío" : "Actualizar tipo de envío";
                    $descripcionBT = $option == 1 ? 'Se agregó el nuevo tipo de envío ' . $strDescripcion : 'Se actualizó el tipo de envío ' . $strDescripcion;

                    $objetoBT = 10; // Valor correspondiente al objeto tipo de envío
                    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
                } else if ($request_tipoenvio == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! el tipo de envío ya existe, ingrese otro.', "alert" => "error");
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.', "alert" => "error");
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    // Método para eliminar un tipo de envío
    public function delTipoEnvio()
    {
        if ($_POST) {
            $intCodTipoEnvio = intval($_POST['Cod_Tipo_Envio']);
            $requestDelete = $this->model->deleteTipoEnvio($intCodTipoEnvio);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tipo de envío', "alert" => "success");

                // Bitácora
                $fecha_actual = date("Y-m-d H:i:s");
                $eventoBT = "Eliminar tipo de envío";
                $descripcionBT = 'Se eliminó el tipo de envío con ID ' . $intCodTipoEnvio;

                $objetoBT = 10; // Valor correspondiente al objeto tipo de envío
                $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el tipo de envío.', "alert" => "error");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getTipoEnvio($Cod_Tipo_Envio) {
            $Cod_Tipo_Envio = intval($Cod_Tipo_Envio);
            if ($Cod_Tipo_Envio > 0) {
                $arrData = $this->model->selectTipoEnvio($Cod_Tipo_Envio);
                if (empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                } else {
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        
        die();
    }
    

    // Método para obtener los datos para la tabla
    public function getTiposEnvios()
    {
        $arrData = $this->model->selectTiposEnvios();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnEdit = '';
            $btnDelete = '';
            if ($_SESSION['permisosMod']['Permiso_Update'] || $_SESSION['userData']['id_usuario'] == 1) {
                $btnEdit = '<button class="btn btn-primary  btn-sm btnEditTipoEnvio" onClick="fntEditTipoEnvio(' . $arrData[$i]['Cod_Tipo_Envio'] . ')" title="Editar tipo de envío"><i class="fas fa-pencil-alt"></i></button>';
            }
            if ($_SESSION['permisosMod']['Permiso_Delete'] || $_SESSION['userData']['id_usuario'] == 1) {
                $btnDelete = '<button class="btn btn-danger btn-sm btnDelTipoEnvio" onClick="fntDelTipoEnvio(' . $arrData[$i]['Cod_Tipo_Envio'] . ')" title="Eliminar tipo de envío"><i class="far fa-trash-alt"></i></button>';
            }
            $arrData[$i]['opciones'] = '<div class="text-center">' . $btnEdit . ' ' . $btnDelete . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getTipoEnvioR(string $params)
	{
        if($_SESSION['permisosMod']['Permiso_Get']){
        $arrParams = explode(',', $params); // por medio de explode convierte a un arreglo toda la cadena
		$contenido = strClean($arrParams[0]); //valor del arreglo en la posicion 0
		$data = $this->model->selectTiposEnviosR($contenido);
		ob_end_clean();
		$html = getFile("Template/Modals/reporteTipoEnvioPDF", $data);
		$html2pdf = new Html2Pdf();
		$html2pdf->writeHTML($html);
		$html2pdf->output();
		
             // Bitácora
             $fecha_actual = date("Y-m-d H:i:s");
             $eventoBT = "Generó reporte";
             $descripcionBT = 'Generó un reporte de tipo en envios en formato PDF';

             $objetoBT = 10; // Valor correspondiente al objeto tipo de envío
             $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
		}
		die();
	}
}
?>
