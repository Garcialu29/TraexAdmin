<?php

class Perfiles extends Controllers {


     public function __construct() {
            parent::__construct();

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
    }
    

    public function perfiles()
	{
		$_SESSION['id_usuario'] = "";
		$data['page_id'] = 2;
		$data['page_tag'] = "Login";
		$data['page_title'] = "";
		$data['page_name'] = "";
		$data['page_functions_js'] = "functions_perfiles.js";
		$this->views->getView($this, "perfiles", $data);
	}
    
       // Método para actualizar el perfil
       public function updateProfile()
       {
           if ($_POST) {
               if (isset($_SESSION['userData']['id_usuario'])) {
                   $id_usuario = $_SESSION['userData']['id_usuario'];
                   $nombre = $_POST['txtNombreM'];
                   $direccion = $_POST['txtDireccionM'];
                   $telefono = $_POST['txtTelefonoM'];
                   $correo = $_POST['txtEmailM'];
   
                   $request = $this->model->updateProfile($id_usuario, $nombre, $direccion, $telefono, $correo);
                   echo json_encode($request, JSON_UNESCAPED_UNICODE);
               } else {
                   echo json_encode(array('status' => false, 'msg' => 'ID de usuario no encontrado en la sesión'), JSON_UNESCAPED_UNICODE);
               }
           }
           die();
       }
   
       // Método para cambiar la contraseña
       public function changePassword() {
        if ($_POST) {
            // Verificar que el usuario está autenticado
            if (isset($_SESSION['userData']['id_usuario'])) {
                $id_usuario = $_SESSION['userData']['id_usuario'];
                $newPassword = $_POST['newPassword'];
                $repeatPassword = $_POST['repeatPassword'];
    
                // Registrar los datos recibidos
                error_log("ID de Usuario: " . $id_usuario);
                error_log("Nueva Contraseña: " . $newPassword); // Ten en cuenta que esto puede ser inseguro; usa con precaución en entornos de producción
    
                // Validar que las contraseñas no estén vacías y coincidan
                if (empty($newPassword) || empty($repeatPassword)) {
                    echo json_encode(['status' => false, 'msg' => 'Por favor, complete todos los campos.']);
                    exit;
                }
    
                if ($newPassword !== $repeatPassword) {
                    echo json_encode(['status' => false, 'msg' => 'Las contraseñas nuevas no coinciden.']);
                    exit;
                }
    
                // Validar que la nueva contraseña cumple con los requisitos
                $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#])[A-Za-z\d$@$!%*?&#]{8,15}$/';
                if (!preg_match($passwordRegex, $newPassword)) {
                    echo json_encode(['status' => false, 'msg' => 'La nueva contraseña no cumple con los requisitos de seguridad.']);
                    exit;
                }
    
                // Encriptar la nueva contraseña
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
                // Registrar la contraseña encriptada
                error_log("Contraseña Encriptada: " . $hashedPassword);
    
                // Instanciar el modelo
                $model = $this->model;
    
                // Actualizar la contraseña en la base de datos
                $result = $model->changePassword($id_usuario, $hashedPassword);
    
                // Registrar el resultado de la actualización
                error_log("Resultado de la actualización: " . json_encode($result));
    
                if ($result) {
                    echo json_encode(['status' => true, 'msg' => 'Contraseña cambiada con éxito.']);
                } else {
                    echo json_encode(['status' => false, 'msg' => 'Ocurrió un error al cambiar la contraseña.']);
                }
            } else {
                echo json_encode(['status' => false, 'msg' => 'Usuario no autenticado.']);
            }
        } else {
            echo json_encode(['status' => false, 'msg' => 'Método no permitido.']);
        }
    }
    
   }
   ?>