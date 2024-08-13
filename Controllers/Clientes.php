<?php
require 'Libraries/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

class Clientes extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MCLIENTES);
	}

	public function Clientes()
	{
		if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
			header("Location:" . base_url() . '/inicio');
		}
         // Registro en la bitácora
		   $fecha_actual = date("Y-m-d H:i:s");
		   $eventoBT = "Acceso a la vista Clientes";
		   $descripcionBT = 'El usuario accedió a la vista de Clientes';
	   
		   $objetoBT = 5; // Valor correspondiente al objeto tipo de seguro
		   $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
		  

		$data['page_tag'] = "Clientes";
		$data['page_title'] = "Clientes";
		$data['page_name'] = "clientes";
		$data['page_functions_js'] = "functions_cliente.js";
		$this->views->getView($this, "clientes", $data);

	}


	public function getClientes()
{
    $arrData = $this->model->selectClientes();

    foreach ($arrData as &$cliente) {
        $idCliente = $cliente['id_cliente'];
        $numeroCasillero = $this->model->getCasilleros($idCliente);
        $cliente['Numero_Casillero'] = $numeroCasillero;

        // Inicializar botones de edición y eliminación
        $btnEdit = '';
        $btnDelete = '';

        // Verificar permisos de la sesión
        if ($_SESSION['permisosMod']['Permiso_Update'] ) {
            $btnEdit = '<button class="btn btn-info btn-sm" onClick="fntEditInfo('. $idCliente .')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
        }

        if ($_SESSION['permisosMod']['Permiso_Delete'] ) {
            $btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelInfo(' . $idCliente. ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
        }

        // Agregar los botones al array de datos del cliente
        $cliente['options'] = '<div class="text-center">'. $btnEdit . ' ' . $btnDelete . '</div>';
    }

    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
}


public function setClientes() {
    header('Content-Type: application/json');

    $arrResponse = array("status" => false, "msg" => "Error interno.", "alert" => "error");

    if ($_POST) {
        if (empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtcorreo_cliente']) || empty($_POST['txtTelefono']) || empty($_POST['txtDireccion']) || empty($_POST['txtdni'])) {
            $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.', "alert" => "error");
        } else {
            $idCliente = intval($_POST['idCliente']); // Debería ser 0 para nuevas inserciones
            $strNombre = $_POST['txtNombre'];
            $strApellido = $_POST['txtApellido'];
            $strEmail = $_POST['txtcorreo_cliente'];
            $intTelefono = $_POST['txtTelefono'];
            $strDireccion = $_POST['txtDireccion'];
            $intdni = $_POST['txtdni'];

            if ($idCliente == 0) {
                // Crear un nuevo cliente
                $request_rol = $this->model->insertCliente($strNombre, $strApellido, $strEmail, $intTelefono, $strDireccion, $intdni);

                if ($request_rol && $request_rol > 0) {
                    // Obtener el Numero_Casillero para el nuevo cliente
                    $numeroCasillero = $this->model->getCasilleros($request_rol);
                
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.', "alert" => "success", "Numero_Casillero" => $numeroCasillero);
                    
                    // Registro en la bitácora
                    $fecha_actual = date("Y-m-d H:i:s");
                    $eventoBT = "Agregar un cliente";
                    $descripcionBT = 'Se agregó el nuevo cliente ' . $strNombre;

                    $objetoBT = 5; // Valor correspondiente al objeto tipo de seguro (ajustar si es necesario)
                    $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
                
                
                } else if ($request_cliente == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! El cliente ya existe, ingrese otro.', "alert" => "error");
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.', "alert" => "error");
                }
            } else {
                // Actualizar cliente existente
                $request_cliente = $this->model->updateCliente($idCliente, $strNombre, $strApellido, $strEmail, $intTelefono, $strDireccion, $intdni);

                if ($request_cliente > 0) {
                    
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.', "alert" => "success");
                    // Registro en la bitácora
                    $fecha_actual = date("Y-m-d H:i:s");
                    $eventoBT = "Actualizar un cliente";
                    $descripcionBT = 'Se actualizó el cliente ' . $strNombre;

                    $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.', "alert" => "error");
                }
            }
        }
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
}


public function setCliente()
{
    $idCliente = ($_POST['idCliente']);
    $strNombre = ($_POST['txtNombre']);
    $strApellido = ($_POST['txtApellido']);
    $strEmail = ($_POST['txtcorreo_cliente']);
    $intTelefono = ($_POST['txtTelefono']);
    $strDireccion = ($_POST['txtDireccion']);
    $strdni = ($_POST['txtdni']);
    $request_rol = "";

    if ($idCliente > 0) {
        // Solo actualiza si idCliente es mayor que 0
        $request_rol = $this->model->createCliente( $idCliente, $strNombre, $strApellido, $strEmail, $intTelefono, $strDireccion, $strdni);

        if ($request_rol) {
            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
        }
    } else {
        // Si el idCliente no es mayor que 0, devuelve un error
        $arrResponse = array("status" => false, "msg" => 'El id del cliente no es válido para actualizar.');
    }

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
}



	// En tu controlador PHP
	public function selectClientesForDataTable()
{
    $arrData = $this->model->selectClientes(); // Obtener datos de los clientes

    // Ahora, por cada cliente, obtenemos el Numero_Casillero y lo agregamos al array
    foreach ($arrData as &$cliente) {
        $idCliente = $cliente['id_cliente'];
        $numeroCasillero = $this->model->getCasilleros($idCliente);
        $cliente['Numero_Casillero'] = $numeroCasillero;
    }

    // Construir el array de respuesta con las columnas requeridas
    $response = [];
    foreach ($arrData as $cliente) {
        $response[] = [
            'id_cliente' => $cliente['id_cliente'],
            'nombre' => $cliente['nombre'],
            'apellido' => $cliente['apellido'],
            'correo_cliente' => $cliente['correo_cliente'],
            'telefono' => $cliente['telefono'],
            'direccion' => $cliente['direccion'],
            'dni' => $cliente['dni'],
            'Numero_Casillero' => $cliente['Numero_Casillero'], // Asegúrate de que este campo se esté agregando correctamente
            //'options' => $cliente['options']
        ];
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}


	public function getCliente($id_Cliente)
	{
		//if($_SESSION['permisosMod']['Permiso_Get']){
		$intid_cliente = intval($id_Cliente);
		if ($intid_cliente > 0) {
			$arrData = $this->model->selectCliente($id_Cliente);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		//}
		}
		die();
	}

	public function actualizarCliente()
    {
        // Obtener los datos del formulario
        $idCliente = ($_POST['id_Cliente']);
        $strNombre = ($_POST['txtNombre']);
        $strApellido = ($_POST['txtApellido']);
        $strEmail = $_POST['txtEmail'];
        $intTelefono = ($_POST['txtTelefono']);
        $strDireccion = ($_POST['txtDireccion']);
        $strdni = ($_POST['txtIdentidad']);

        // Verificar si se proporcionaron todos los campos necesarios
        if ($idCliente == "" || $strNombre == "" || $strApellido == "" || $strNumeroid == "" || $intTelefono == "" || $strDireccion == "" || $strEmail == "") {
            $arrResponse = array("status" => false, "msg" => 'Debe ingresar todos los campos');
        } else {
            // Llamar al método de actualización del modelo
            $request_rol = $this->model->updateCliente($idCliente, $strNombre, $strApellido, $strEmail, $intTelefono, $strDireccion, $strdni);

            // Verificar el resultado de la actualización
            if ($request_rol) {
                //$msg = 'Datos Actualizados correctamente.';
                $arrResponse = array('status' => true, 'msg' => $msg);
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar los datos.');
            }
        }

        // Devolver la respuesta en formato JSON
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }


	public function delCliente()
	{
		if ($_POST) {
			//if($_SESSION['permisosMod']['Permiso_Delete']){
			$idCliente = intval($_POST['idCliente']);
			$requestDelete = $this->model->deleteCliente($idCliente);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Cliente');
				//bitacora este codigo se pondra en cada uno de las acciones si se agrego o si actualizo o si se elimmino
				$fecha_actual = (date("Y-m-d"));
				$UsuarioBt = $_SESSION['userData']['id_usuario']; //aqui es el usuario que hizo el cambio
				$eventoBT = "Elimino cliente"; // evento de si se ingreso, actualizo o elimino
				$descripcionBT = 'El usuario ' . $_SESSION['userData']['Nombre'] . ' Elimino el cliente' . $intid_cliente . ''; //descripcion de lo que se hizo

				$objetoBT = 4; //le manda el valor de 1 que significa que esta en el objeto de login, eso varia depende donde se encuentre el usuario
				$insertBitacora = $this->model->bitacora($UsuarioBt, $objetoBT, $eventoBT, $descripcionBT, $fecha_actual); //hace el insert en bitacora
				//fin bitacora
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el cliente porque esta asociado a otra tabla.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el cliente porque esta asociado a otra tabla');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			//}
		}
		die();
	}
	
	public function getClienteR(string $params)
{
    $arrParams = explode(',', $params); // por medio de explode convierte a un arreglo toda la cadena
    $contenido = strClean($arrParams[0]); //valor del arreglo en la posicion 0
    $data = $this->model->selectClienteR($contenido); //aqui
    ob_end_clean();

    // Cargar el contenido de la plantilla HTML para el PDF
   // $html = get_file("Template/Modals/reporteClientesPDF",$data);
    // Crear instancia de Html2Pdf y generar el PD

	$html = getFile("Template/Modals/reporteClientesPDF", $data);
	$html2pdf = new Html2Pdf();
	$html2pdf->writeHTML($html);
	$html2pdf->output();
    die();
	// Bitácora
	$fecha_actual = date("Y-m-d H:i:s");
	$eventoBT = "Generó reporte";
	$descripcionBT = 'Generó un reporte de clientes en formato PDF';

	$objetoBT =5; // Valor correspondiente al objeto tipo de envío
	$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

}

}	
?>
