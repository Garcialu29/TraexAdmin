<?php
// Define la constante MRESTORE con el valor 1
define('MRESTORE', 1);

class Restorer extends Controllers {
    public function __construct() {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
            die();
        }
        getPermisos(MRESTORE);
    }

    public function restorer() {
        if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
            header("Location:" . base_url() . '/inicio');
        }

        // Verificar si se ha enviado el formulario para la restauración
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["backup_file"])) {
            $backup_file = $_FILES["backup_file"]["tmp_name"];

            // Verificar si se seleccionó un archivo
            if (empty($backup_file)) {
                $data['error'] = "Por favor, selecciona un archivo de respaldo.";
            } else {
                // Ruta donde se almacenan los backups
                $backup_dir = 'C:/xampp/htdocs/admintraex/BRM-master/backups/';

                // Restaurar la base de datos
                exec("mysql -u tu_usuario -ptu_contraseña tu_base_de_datos < $backup_file", $output, $return_var);

                if ($return_var === 0) {
                    $data['message'] = "La base de datos se ha restaurado correctamente.";
                } else {
                    $data['error'] = "Se produjo un error al intentar restaurar la base de datos.";
                }
            }
        }

        // Registro en la bitácora
			 $fecha_actual = date("Y-m-d H:i:s");
			 $eventoBT = "Acceso a la Restore";
			 $descripcionBT = 'El usuario accedió a la vista de restauracion de datos';
		 
			 $objetoBT = 9; // Valor correspondiente al objeto tipo de seguro
			 $insertBitacora = $this->model->bitacora($_SESSION['userData']['id_usuario'], $objetoBT, $eventoBT, $descripcionBT, $fecha_actual);

        $data['page_id'] = 2;
        $data['page_tag'] = "Restore - TRAEX";
        $data['page_title'] = "Restore - TRAEX";
        $data['page_name'] = "Restore";

        $this->views->getView($this, "restorer", $data);
    }
}
?>
