<?php 
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
	class Objetos extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			//session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MOBJETOS);
		}
		
		public function Objetos()//muestra la vista
		{
			if(empty($_SESSION['permisosMod']['Permiso_Get'] ||  $_SESSION['userData']['id_usuario'] == 1)){
				header("Location:".base_url().'/inicio');
			}
			// Registro en la bitácora
			$fecha_actual = date("Y-m-d H:i:s");
			$eventoBT = "Acceso a la vista de Objetos";
			$descripcionBT = 'El usuario accedió a la vista de objetos del sistema';
		
			$objetoBT = 1; // Valor correspondiente al objeto tipo de seguro
			$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
			
			$data['page_tag'] = "Objetos";
			$data['page_name'] = "Objetos";
			$data['page_title'] = "Objetos";
			$data['page_functions_js'] = "functions_objetos.js";
			$this->views->getView($this,"objetos",$data);
		}

	
		public function getObjetos() {
			if ($_SESSION['permisosMod']['Permiso_Get'] || $_SESSION['userData']['id_usuario'] == 1) {
				$arrData = $this->model->selectObjetos();
				
				for ($i = 0; $i < count($arrData); $i++) {
					$btnEdit = '';
					$btnDelete = '';
					if ($_SESSION['permisosMod']['Permiso_Update'] || $_SESSION['userData']['id_usuario'] == 1) {
						$btnEdit = '<button class="btn btn-info btn-sm btnEditRol" onClick="fntEditParametro(' . $arrData[$i]['Id_Objeto'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					}
					if ($_SESSION['permisosMod']['Permiso_Delete'] || $_SESSION['userData']['id_usuario'] == 1) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelParametro(' . $arrData[$i]['Id_Objeto'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">' . $btnEdit . ' ' . $btnDelete . '</div>';
				}
		
				// Ensure a clean JSON response
				ob_end_clean();
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		

		public function getSelectRoles()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectRoles();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getObjetosM(int $idparametro)
		{
			if($_SESSION['permisosMod']['Permiso_Get'] || $_SESSION['userData']['id_usuario'] == 1 ){
				$intidparametro = intval(strClean($idparametro));
				if($idparametro > 0)
				{
					$arrData = $this->model->selectObjeto($idparametro);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
//codigo para mostrar en la tabla
public function getObjetosR(string $params)
{
    if ($_SESSION['permisosMod']['Permiso_Get']) {
		$arrParams = explode(',', $params); // por medio de explode convierte a un arreglo toda la cadena
		$contenido = strClean($arrParams[0]); //valor del arreglo en la posicion 0
        $data = $this->model->selectObjetosR($contenido);
        ob_end_clean();
        $html = getFile("Template/Modals/reporteObjetosPDF", $data);
        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML($html);
        $html2pdf->output();

        // Bitácora
        $fecha_actual = date("Y-m-d H:i:s");
        $eventoBT = "Generación de reporte PDF";
        $descripcionBT = 'El usuario generó un reporte PDF de objetos.';
        $objetoBT = 1; // Valor correspondiente al objeto tipo de envío (cambiar según tu tabla)
        $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
    }
    die();
}
//fin 

	public function setObjeto(){
				$intParametro = intval($_POST['idObjeto']);
				$strParametro =  strClean($_POST['txtNombreParametro']);
				$strDescipcion = strClean($_POST['txtDescripcion']);
				
				$fecha = strClean($_POST['txtCreacionParametro']);
				$request_rol = "";
				if($intParametro == 0)
				{
					//Crear
					if($_SESSION['permisosMod']['Permiso_Insert'] ||  $_SESSION['userData']['id_usuario'] == 1){


						if($strParametro == "" || $strDescipcion == ""  || $fecha =""){

							$arrResponse = array("status" => false, "msg" => 'Debe ingresar todos los campos');

						}else{
							$idRol = 1;
							$fecha = date("Y-m-d");
							$UsuarioBt = $_SESSION['userData']['Nombre'];
							$contador = 0;
							$rol = 0;
							$request_inserobjeto = $this->model->InsertObjeto($strParametro, $strDescipcion, $UsuarioBt, $fecha,  $idRol);
							$request_roles = $this->model->selectroles();
							
							
						

							foreach ($request_roles as $roles) {
							
								$rol =$request_roles[$contador]['Id_Rol'];
							
								$r = 0;
								$w = 0;
								$u = 0;
								$d = 0;
								$requestPermiso = $this->model->insertPermisos($rol,$request_inserobjeto, $r, $w, $u, $d);
								$contador += 1;
								$request_rol =1;
							}

							$option = 1;

						}
					
					}
				}else{
					//Actualizar
					if($_SESSION['permisosMod']['Permiso_Update'] ||  $_SESSION['userData']['id_usuario'] == 1){

						$request_rol = $this->model->updateObjeto($intParametro, $strParametro, $strDescipcion);
						$option = 2;
					}
				}

				if($request_rol > 0 )
				{
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
					}
					// Bitácora
					$fecha_actual = date("Y-m-d H:i:s");
					$eventoBT = $option == 1 ? "Agregar objeto" : "Actualizar objeto";
					$descripcionBT = $option == 1 ? 'Se agregó el nuevo objeto ' . $strParametro : 'Se actualizó el objeto ' . $strParametro;
					$objetoBT = 1; // Valor correspondiente al objeto
					$insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

				}else if($request_rol == 'exist'){
					
					$arrResponse = array('status' => false, 'msg' => '¡Atención! El Objeto ya existe.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function delObjeto()
{
    if ($_POST) {
        if ($_SESSION['permisosMod']['Permiso_Delete'] || $_SESSION['userData']['id_usuario'] == 1) {
            $intParametro = intval($_POST['idObjeto']);
            $requestDelete = $this->model->deleteParametro($intParametro);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Objeto');
                
                // Bitácora
                $fecha_actual = date("Y-m-d H:i:s");
                $eventoBT = "Eliminar objeto";
                $descripcionBT = 'El usuario ' . $_SESSION['userData']['Nombre'] . ' eliminó el objeto con ID ' . $intParametro;
                $objetoBT = 10; // Valor correspondiente al objeto
                $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);
                
            } else if ($requestDelete == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Objeto asociado a otros módulos.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Objeto.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    die();
}


	}
 ?>