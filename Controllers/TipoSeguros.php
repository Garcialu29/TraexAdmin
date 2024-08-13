<?php
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class TipoSeguros extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        //getPermisos(MSEGURO);
    }

    public function TipoSeguros()
    {
        if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
            header("Location:" . base_url() . '/inicio');
        }
        // Registro en la bitácora
    $fecha_actual = date("Y-m-d H:i:s");
    $eventoBT = "Acceso a la vista Tipo Seguros";
    $descripcionBT = 'El usuario accedió a la vista de tipos de seguros';

    $objetoBT = 12; // Valor correspondiente al objeto tipo de seguro
    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
    
        $data['page_tag'] = "Tipo de Seguro";
        $data['page_title'] = "Tipos de Seguro";
        $data['page_name'] = "Tipo_Seguros";
        $data['page_functions_js'] = "function_TipoSeguro.js";
        $this->views->getView($this, "tipoSeguros", $data);
    }

    public function setTipoSeguro()
    {
        if ($_POST) {
            if (empty($_POST['txtDescripcion']) || empty($_POST['txtPrecio'])) {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.', "alert" => "error");
            } else {
                $Id_Tipos_Seguros = intval($_POST['Id_Tipos_Seguros']);
                $strDescripcion = strClean($_POST['txtDescripcion']);
                $intPrecio = intval($_POST['txtPrecio']);

                $request_tiposeguro = "";

                if ($Id_Tipos_Seguros == 0) {
                    $option = 1;
                    $request_tiposeguro = $this->model->insertTipoSeguro($strDescripcion, $intPrecio);
                } else {
                    $option = 2;
                    $request_tiposeguro = $this->model->updateTipoSeguro($Id_Tipos_Seguros, $strDescripcion, $intPrecio);
                }

                if ($request_tiposeguro > 0) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.', "alert" => "success");

                    // Bitácora
                    $fecha_actual = date("Y-m-d H:i:s");
                    $eventoBT = $option == 1 ? "Agregar tipo de seguro" : "Actualizar tipo de seguro";
                    $descripcionBT = $option == 1 ? 'Se agregó el nuevo tipo de seguro ' . $strDescripcion : 'Se actualizó el tipo de seguro ' . $strDescripcion;

                    $objetoBT = 12; // Valor correspondiente al objeto tipo de seguro
                    $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
                } else if ($request_tiposeguro == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! el tipo de seguro ya existe, ingrese otro.', "alert" => "error");
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.', "alert" => "error");
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delTipoSeguro()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['Permiso_Delete']) {
            $intIdTipoSeguro = intval($_POST['Id_Tipos_Seguros']);
            $requestDelete = $this->model->deleteTipoSeguro($intIdTipoSeguro);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tipo de seguro', "alert" => "success");

                // Bitácora
                $fecha_actual = date("Y-m-d H:i:s");
                $eventoBT = "Eliminar tipo de seguro";
                $descripcionBT = 'Se eliminó el tipo de seguro con ID ' . $intIdTipoSeguro;

                $objetoBT = 12; // Valor correspondiente al objeto tipo de seguro
                $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el tipo de seguro.', "alert" => "error");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
      }  
      die();
    }

    public function getTipoSeguro($Id_Tipos_Seguros) {
        $Id_Tipos_Seguros = intval($Id_Tipos_Seguros);
        if ($Id_Tipos_Seguros > 0) {
            $arrData = $this->model->selectTipoSeguro($Id_Tipos_Seguros);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getTiposSeguros()
    {
        $arrData = $this->model->selectTiposSeguros();
        
        for ($i = 0; $i < count($arrData); $i++) {
            $btnEdit = '';
            $btnDelete = '';
            if ($_SESSION['permisosMod']['Permiso_Update'] || $_SESSION['userData']['id_usuario'] == 1) {
                $btnEdit = '<button class="btn btn-primary btn-sm btnEditTipoSeguro" onClick="fntEditTipoSeguro(' . $arrData[$i]['Id_Tipos_Seguros'] . ')" title="Editar tipo de seguro"><i class="fas fa-pencil-alt"></i></button>';
            }
            if ($_SESSION['permisosMod']['Permiso_Delete'] || $_SESSION['userData']['id_usuario'] == 1) {
                $btnDelete = '<button class="btn btn-danger btn-sm btnDelTipoSeguro" onClick="fntDelTipoSeguro(' . $arrData[$i]['Id_Tipos_Seguros'] . ')" title="Eliminar tipo de seguro"><i class="far fa-trash-alt"></i></button>';
            }
            $arrData[$i]['opciones'] = '<div class="text-center">' . $btnEdit . ' ' . $btnDelete . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getTipoSeguroR(string $params)
    {
        if ($_SESSION['permisosMod']['Permiso_Get']) {
            $arrParams = explode(',', $params); // por medio de explode convierte a un arreglo toda la cadena
		    $contenido = strClean($arrParams[0]); //valor del arreglo en la posicion 0
            $data = $this->model->selectTiposSegurosR($contenido);
            
            ob_end_clean();
            $html = getFile("Template/Modals/reporteTipoSeguroPDF", $data);
            $html2pdf = new Html2Pdf();
            $html2pdf->writeHTML($html);
            $html2pdf->output();
        
            // Bitácora
            $fecha_actual = date("Y-m-d H:i:s");
            $eventoBT = "Generó reporte";
            $descripcionBT = 'Generó un reporte de tipos de seguro en formato PDF';

            $objetoBT = 12; // Valor correspondiente al objeto tipo de seguro
            $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
        }
        die();
    }
}
?>
