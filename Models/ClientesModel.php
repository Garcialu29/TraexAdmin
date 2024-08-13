<?php
class ClientesModel extends Mysql
{
    public $idCliente;
    public $nombre;
    public $apellido;
    public $correo_cliente;
    public $telefono;
    public $direccion;
    public $dni;
    public $fecha_registro;
    public $password;


    public function __construct()
    {
        parent::__construct();
    }

    public function getCasilleros($idCliente)
    {
        $sql = "SELECT Numero_Casillero FROM tbl_casillero WHERE id_cliente = $idCliente";
        $result = $this->select($sql, array($idCliente)); // Asegúrate de que $idCliente sea válido
        if ($result) {
            return $result['Numero_Casillero'];
        } else {
            return 0; // O maneja el caso de error de acuerdo a tu lógica
        }
    }
    


public function selectClientes()
    {
        $sql = "SELECT * FROM tbl_cliente";
        $request = $this->select_all($sql);
        return $request;
    }


    public function insertCliente(string $nombre, string $apellido, string $correo_cliente, string $telefono, string $direccion, string $dni) {
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->strCorreoCliente = $correo_cliente;
        $this->intTelefono = $telefono;
        $this->strDireccion = $direccion;
        $this->strdni = $dni;
    
        // Verificar si el cliente ya existe
        $sql = "SELECT * FROM tbl_cliente WHERE nombre = '$this->strNombre' AND dni = $this->strdni";
        $request = $this->select($sql);
    
        if (empty($request)) {
            // Insertar el nuevo cliente
            $query_insert = "INSERT INTO tbl_cliente (nombre, apellido, correo_cliente, telefono, direccion, dni) VALUES (?,?,?,?,?,?)";
            $arrData = array(
                $this->strNombre,
                $this->strApellido,
                $this->strCorreoCliente,
                $this->intTelefono,
                $this->strDireccion,
                $this->strdni
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
    
        return $return;
    }
    
    


    public function selectCliente(int $idCliente)
    {
        $this->idCliente = $idCliente;
        $sql = "SELECT * FROM tbl_cliente
					WHERE id_cliente = $this->idCliente";
        $request = $this->select($sql);
        return $request;
    }

    public function updateCliente(string $idCliente, string $nombre, string $apellido, string $correo_cliente,  int $telefono, string $direccion, string $dni)
{
    $this->idCliente = $idCliente;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->correo_cliente = $correo_cliente;
    $this->telefono = $telefono;
    $this->direccion = $direccion;
    $this->dni = $dni;

    // Preparar la consulta de actualización
    $sql = "UPDATE tbl_cliente SET nombre=?, apellido=?, correo_cliente=?, telefono=?, direccion=?, dni=? WHERE id_cliente = ?";
    $arrData = array($this->nombre, $this->apellido, $this->correo_cliente, $this->telefono, $this->direccion, $this->dni, $this->idCliente);

    // Ejecutar la consulta de actualización
    $request = $this->update($sql, $arrData);
    error_log($request);
    // Devolver true si la actualización fue exitosa, de lo contrario, false
    return $request;
}

    

public function deleteCliente(int $idCliente)
{
    $this->id_cliente = $idCliente;

    // Primero, obtener el Id_Casillero asociado al cliente
    $sql = "SELECT id_Casillero FROM tbl_casillero WHERE id_cliente = ?";
    $arrDataCasillero = array($this->idCliente);
    $requestCasillero = $this->select($sql, $arrDataCasillero);

    if ($requestCasillero) {
        $idCasillero = $requestCasillero['id_Casillero'];

        // Verificar si existen paquetes asociados al casillero del cliente
        $sqlPaquetes = "SELECT * FROM tbl_paquetes WHERE id_Casillero = ?";
        $arrDataPaquetes = array($idCasillero);
        $requestPaquetes = $this->select_all($sqlPaquetes, $arrDataPaquetes);

        if (empty($requestPaquetes)) {
            // No existen paquetes, proceder con la eliminación del cliente
            $sql = "DELETE FROM tbl_cliente WHERE id_cliente = ?";
            $arrDataDelete = array($this->id_cliente);
            $requestDelete = $this->delete($sql, $arrDataDelete);

            if ($requestDelete) {
                $response = 'ok';
            } else {
                $response = 'error';
            }
        } else {
            // Existen paquetes, no se puede eliminar el cliente
            $response = 'exist';
        }
    } else {
        // No se encontró un casillero para el cliente, posible error de datos
        $response = 'nocasillero';
    }

    return $response;
}

    public function selectClienteR($contenido)
    {

        $sql = "SELECT * FROM tbl_cliente 
            WHERE id_cliente like '%$contenido%' or 
            nombre like '%$contenido%' or 
            apellido like '%$contenido%' or 
            correo_cliente like '%$contenido%' or
            telefono like '%$contenido%' or 
            direccion like '%$contenido%' or 
            dni like'%$contenido%'";
        $request = $this->select_all($sql);

        return $request;
    }

    public function bitacora(int $intIdUsuario, int $objeto, string $evento, string $descripcion, string $fecha)
    {
        $this->idusuario = $intIdUsuario;
        $this->evento = $evento;
        $this->objeto = $objeto;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;

        $sql = "INSERT INTO tbl_bitacora (id_usuario, Id_Objeto, Accion, Descripcion, Fecha)
			 VALUES (?,?,?,?,?)";
        $arrData = array($this->idusuario,
            $this->objeto,
            $this->evento,
            $this->descripcion,
            $this->fecha);
        $request = $this->insert($sql, $arrData);
        return $request;
    }
}

?>
