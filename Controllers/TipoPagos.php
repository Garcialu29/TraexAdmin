<?php 
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class TipoPagos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        getPermisos(MPAGO);
    }

    public function TipoPagos()
    {
        if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
            header("Location:" . base_url() . '/inicio');
        }
        // Registro en la bitácora
    $fecha_actual = date("Y-m-d H:i:s");
    $eventoBT = "Acceso a la vista Tipo de pago";
    $descripcionBT = 'El usuario accedió a la vista de tipos de pagos de paquetes';

    $objetoBT = 11; // Valor correspondiente al objeto tipo de seguro
    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
    
        $data['page_tag'] = "Tipo de Pago";
        $data['page_title'] = "Tipos de Pago";
        $data['page_name'] = "Tipo_Pagos";
        $data['page_functions_js'] = "function_TipoPago.js";
        $this->views->getView($this, "tipoPagos", $data);
    }

    // Método para insertar o actualizar un tipo de pago
    public function setTipoPago()
    {
        if ($_POST) {
            if (empty($_POST['txtDescripcion'])) {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.', "alert" => "error");
            } else {
                $id_tipo_pago = intval($_POST['id_tipo_pago']);
                $strDescripcion = strClean($_POST['txtDescripcion']);

                $request_tipopago = "";

                if ($id_tipo_pago == 0) {
                    $option = 1;
                    $request_tipopago = $this->model->insertTipoPago($strDescripcion);
                } else {
                    $option = 2;
                    $request_tipopago = $this->model->updateTipoPago($id_tipo_pago, $strDescripcion);
                }

                if ($request_tipopago > 0) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.', "alert" => "success");

                    // Bitácora
                    $fecha_actual = date("Y-m-d H:i:s");
                    $eventoBT = $option == 1 ? "Agregar tipo de pago" : "Actualizar tipo de pago";
                    $descripcionBT = $option == 1 ? 'Se agregó el nuevo tipo de pago ' . $strDescripcion : 'Se actualizó el tipo de pago ' . $strDescripcion;

                    $objetoBT = 11; // Valor correspondiente al objeto tipo de pago
                    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
                } else if ($request_tipopago == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! el tipo de pago ya existe, ingrese otro.', "alert" => "error");
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.', "alert" => "error");
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    // Método para eliminar un tipo de pago
    public function delTipoPago()
    {
        if ($_POST) {
            $intIdTipoPago = intval($_POST['id_tipo_pago']);
            $requestDelete = $this->model->deleteTipoPago($intIdTipoPago);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tipo de pago', "alert" => "success");

                // Bitácora
                $fecha_actual = date("Y-m-d H:i:s");
                $eventoBT = "Eliminar tipo de pago";
                $descripcionBT = 'Se eliminó el tipo de pago con ID ' . $intIdTipoPago;

                $objetoBT = 11; // Valor correspondiente al objeto tipo de pago
                $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el tipo de pago.', "alert" => "error");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getTipoPago($id_tipo_pago) {
        $id_tipo_pago = intval($id_tipo_pago);
        if ($id_tipo_pago > 0) {
            $arrData = $this->model->selectTipoPago($id_tipo_pago);
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
    public function getTiposPagos()
    {
        $arrData = $this->model->selectTiposPagos();
    
        for ($i = 0; $i < count($arrData); $i++) {
            $btnEdit = '';
            $btnDelete = '';
            if ($_SESSION['permisosMod']['Permiso_Update'] || $_SESSION['userData']['id_usuario'] == 1) {
                $btnEdit = '<button class="btn btn-primary  btn-sm btnEditTipoPago" onClick="fntEditTipoPago(' . $arrData[$i]['id_tipo_pago'] . ')" title="Editar tipo de pago"><i class="fas fa-pencil-alt"></i></button>';
            }
            if ($_SESSION['permisosMod']['Permiso_Delete'] || $_SESSION['userData']['id_usuario'] == 1) {
                $btnDelete = '<button class="btn btn-danger btn-sm btnDelTipoPago" onClick="fntDelTipoPago(' . $arrData[$i]['id_tipo_pago'] . ')" title="Eliminar tipo de pago"><i class="far fa-trash-alt"></i></button>';
            }
            $arrData[$i]['opciones'] = '<div class="text-center">' . $btnEdit . ' ' . $btnDelete . '</div>';
        }
    
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function getTipoPagoR(string $params)
    {
        if ($_SESSION['permisosMod']['Permiso_Get']) {
            $arrParams = explode(',', $params); // por medio de explode convierte a un arreglo toda la cadena
		    $contenido = strClean($arrParams[0]); //valor del arreglo en la posicion 0
            $data = $this->model->selectTiposPagosR($contenido);
            ob_end_clean();
            $html = getFile("Template/Modals/reporteTipoPagoPDF", $data);
            $html2pdf = new Html2Pdf();
            $html2pdf->writeHTML($html);
            $html2pdf->output();
        
            // Bitácora
            $fecha_actual = date("Y-m-d H:i:s");
            $eventoBT = "Generó reporte";
            $descripcionBT = 'Generó un reporte de tipos de pago en formato PDF';

            $objetoBT = 11; // Valor correspondiente al objeto tipo de pago
            $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
        }
        die();
    }
}
?>
