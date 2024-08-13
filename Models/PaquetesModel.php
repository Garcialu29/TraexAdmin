<?php

class PaquetesModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCasilleros()
	{
		$sql = "SELECT casillero.*, clientes.* FROM tbl_casillero AS casillero JOIN tbl_cliente AS clientes ON casillero.Id_Cliente = clientes. id_cliente";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getCodigoTipoEnvio()
	{
		$sql = "SELECT * FROM tbl_tipo_envio";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getTipoPago()
	{
		$sql = "SELECT * FROM tbl_tipo_pago";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getTipoSeguros()
	{
		$sql = "SELECT * FROM tbl_tipo_seguro";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getEstadoEnvios()
	{
		$sql = "SELECT * FROM tbl_estado_envio";
		$request = $this->select_all($sql);
		return $request;
	}
	
	public function selectClienteDireccion($Id_Casillero)
{
    $Id_Casillero = intval($Id_Casillero); 
    $sql = "SELECT clientes.direccion 
            FROM tbl_casillero AS casillero 
            JOIN tbl_cliente AS clientes ON casillero.Id_Cliente = clientes.id_cliente 
            WHERE casillero.Id_Casillero = $Id_Casillero";
    
    $result = $this->select_all($sql);

    if (!empty($result)) {
        return $result[0]; // Retorna el array completo
    } else {
        return null; // Retorna null si no se encuentra ningún resultado
    }
}
	

	public function agregarPaquete($arrValues)
{
    // Ajusta la consulta SQL para insertar en la tabla tbl_paquete con los campos correspondientes
    $sql = "INSERT INTO tbl_paquete ( Id_Casillero, Cod_Tipo_Envio, Peso_paquete, Volumen_paquete, Numero_Traking, compra, id_Tipo_Seguro, Id_Estado_Envio, Direccion_Envio, Fecha_Entrega, Fecha_pedido, id_tipo_pago)
                VALUES (?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?)";

    // Realiza la inserción y devuelve el ID del último insertado
    $lastInsertId = $this->insert($sql, $arrValues);
    return $lastInsertId;
}
	

function filtroPaquete($searchTxt)
{
    $sql = "SELECT 
                paquete.*, 
				clientes.nombre AS nombreCliente, 
                clientes.apellido AS apellidoCliente, 
                casillero.Numero_Casillero as NumeroCasillero, 
                tipEnvio.Descripcion as nombreTipoEnvio, 
                tipSeguro.Descripción as nombreTipoSeguro, 
                estadoEnvio.Descripcion as nombreEstadoEnvio,
                tipoPago.Descripcion_pago as nombreTipoPago
            FROM 
                tbl_paquete AS paquete 
                JOIN tbl_casillero AS casillero ON paquete.Id_Casillero = casillero.Id_Casillero
                JOIN tbl_cliente AS clientes ON casillero.id_cliente = clientes.Id_Cliente
                JOIN tbl_tipo_envio as tipEnvio ON paquete.Cod_Tipo_Envio = tipEnvio.Cod_Tipo_Envio
                JOIN tbl_tipo_seguro AS tipSeguro ON paquete.id_Tipo_Seguro = tipSeguro.Id_Tipos_Seguros
                JOIN tbl_estado_envio AS estadoEnvio ON paquete.Id_Estado_Envio = estadoEnvio.Id_Estado_Envio
                JOIN tbl_tipo_pago AS tipoPago ON paquete.id_tipo_pago = tipoPago.id_tipo_pago
            WHERE 
                Numero_Traking = $searchTxt";
    $request = $this->select($sql);
    return $request;
}


//optener el paquete a editar
	function obtenerPaquete($Cod_Envio_Paquetes)
	{
		$sql = "SELECT
			paquete.Cod_Envio_Paquetes,
			paquete.Id_Estado_Envio,
			paquete.Id_Casillero,
			paquete.Cod_Tipo_Envio,
			paquete.Peso_paquete,
			paquete.Volumen_paquete,
			paquete.Numero_Traking,
			paquete.compra,
			paquete.id_Tipo_Seguro,
			paquete.Direccion_Envio,
			paquete.Fecha_Entrega,
			paquete.id_tipo_pago,
			paquete.Fecha_pedido,
			casillero.Id_Cliente,
			casillero.Numero_Casillero,
			estado_envio.Descripcion AS EstadoEnvio,
			tipo_envio.Descripcion AS TipoEnvio,
			pago.Descripcion_pago AS TipoPago
		FROM
			tbl_paquete AS paquete
		JOIN
			tbl_casillero AS casillero ON paquete.id_Casillero = casillero.id_Casillero
		JOIN
			tbl_estado_envio AS estado_envio ON paquete.Id_Estado_Envio = estado_envio.Id_Estado_Envio
		JOIN
			tbl_tipo_envio AS tipo_envio ON paquete.Cod_Tipo_Envio = tipo_envio.Cod_Tipo_Envio
		JOIN
			tbl_tipo_pago AS pago ON paquete.id_tipo_pago = pago.id_tipo_pago
		WHERE
			paquete.Cod_Envio_Paquetes = $Cod_Envio_Paquetes";
	
		$request = $this->select($sql);
		return $request;
	}
	

	public function actualizarPaquete($Cod_Envio_Paquetes, $arrValues)
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
	
		// Consulta SQL para actualizar el paquete
		$sql_update = "UPDATE tbl_paquete SET Id_Estado_Envio = ?, Id_Casillero= ?, Cod_Tipo_Envio= ?, Peso_paquete= ?, Volumen_paquete= ?, Numero_Traking = ?, compra = ?, id_Tipo_Seguro = ?, Direccion_Envio = ?, Fecha_Entrega = ?, Fecha_pedido = ?, id_tipo_pago = ?  WHERE Cod_Envio_Paquetes = ?";
		$arrData_update = array(
			$Id_Estado_Envio,
			$Id_Casillero,
			$Cod_Tipo_Envio,
			$Peso_paquete,
			$Volumen_paquete,
			$Numero_Traking,
			$compra,
			$id_Tipo_Seguro,
			$Direccion_Envio,
			$Fecha_Entrega,
			$Fecha_pedido,
			$id_tipo_pago,
			$Cod_Envio_Paquetes
		);
	
		// Ejecutar la consulta de actualización
		$request_update = $this->update($sql_update, $arrData_update);
	
		// Retornar la respuesta
		return $request_update;
	}
	

//tabla de la vista 
public function selectPaquetes()
{
    $sql = "SELECT
                paquete.Cod_Envio_Paquetes,
                paquete.Id_Estado_Envio,
                paquete.Id_Casillero,
                paquete.Cod_Tipo_Envio,
                paquete.Peso_paquete,
                paquete.Volumen_paquete,
                paquete.Numero_Traking,
                paquete.Direccion_Envio,
                paquete.Fecha_Entrega,
                paquete.Fecha_pedido,
                casillero.Id_Cliente,
                casillero.Numero_Casillero,
                cliente.nombre AS Nombre_Cliente,
                cliente.apellido AS Apellido_Cliente,
				cliente.direccion AS Direccion_Cliente,
                estado_envio.Descripcion AS EstadoEnvio,
                tipo_envio.Descripcion AS TipoEnvio
            FROM
                tbl_paquete AS paquete
            JOIN
                tbl_casillero AS casillero ON paquete.Id_Casillero = casillero.Id_Casillero
            JOIN
                tbl_cliente AS cliente ON casillero.Id_Cliente = cliente.Id_Cliente
            JOIN
                tbl_estado_envio AS estado_envio ON paquete.Id_Estado_Envio = estado_envio.Id_Estado_Envio
            JOIN
                tbl_tipo_envio AS tipo_envio ON paquete.Cod_Tipo_Envio = tipo_envio.Cod_Tipo_Envio";

    $request = $this->select_all($sql);

    // Ajustar los valores NULL en los campos de peso, volumen y dimensiones
    foreach ($request as &$paquete) {
        if ($paquete['Peso_paquete'] === null) {
            $paquete['Peso_paquete'] = 'N/A';
        }
        if ($paquete['Volumen_paquete'] === null) {
            $paquete['Volumen_paquete'] = 'N/A';
        }
        if ($paquete['Cod_Tipo_Envio'] === null) {
            $paquete['Cod_Tipo_Envio'] = 'N/A';
        }
    }
    return $request;
}

	

	//orden
	public function selectPaquete(string $Cod_Envio_Paquetes)
	{
		$request = array();
		$sql = "SELECT
				tp.Cod_Envio_Paquetes,
				tp.Id_Casillero,
				tp.Cod_Tipo_Envio,
				tp.Id_Estado_Envio,
				tp.id_Tipo_Seguro,
				tp.Peso_paquete,
				tp.Volumen_paquete,
				tp.Numero_Traking,
				tp.compra,
				tp.Direccion_Envio,
			    tp.Fecha_Entrega,
			    tp.Fecha_pedido,
				tc.Id_Casillero,
				tc.Id_Cliente,
				tc.Numero_Casillero,
				estado_envio.Descripcion AS EstadoEnvio,
				tipo_envio.monto AS MontoEnvio,
				tipo_envio.Descripcion AS TipoEnvio,
				tipo_pago.Descripcion_pago AS TipoPago,
				ts.precio AS PrecioSeguro
			FROM
				tbl_paquete tp
			JOIN
				tbl_casillero tc ON tp.Id_Casillero = tc.Id_Casillero
			JOIN
				tbl_estado_envio AS estado_envio ON tp.Id_Estado_Envio = estado_envio.Id_Estado_Envio
			JOIN
				tbl_tipo_envio AS tipo_envio ON tp.Cod_Tipo_Envio = tipo_envio.Cod_Tipo_Envio
			JOIN
				tbl_tipo_pago AS tipo_pago ON tp.id_tipo_pago = tipo_pago.id_tipo_pago
			LEFT JOIN
            	tbl_tipo_seguro ts ON tp.id_Tipo_Seguro = ts.Id_Tipos_Seguros
				
				WHERE	Cod_Envio_Paquetes = $Cod_Envio_Paquetes";

		$requestPaquete = $this->select($sql);

		if (!empty($requestPaquete)) {

			$Id_Cliente = $requestPaquete['Id_Cliente'];

			$sql_cliente = "SELECT
										Id_Cliente,
										nombre,
										apellido,
										correo_cliente,
										telefono,
										direccion,
										dni,
										fecha_registro
										password
									FROM tbl_cliente 
									WHERE Id_Cliente = $Id_Cliente";
			$requestCliente = $this->select($sql_cliente);

			if (!empty($requestPaquete)) {

				$Id_Estado_Envio = $requestPaquete['Id_Estado_Envio'];

				$sql_estado = "SELECT
											Id_Estado_Envio,
											Descripcion
											FROM tbl_estado_envio
										WHERE Id_Estado_Envio = $Id_Estado_Envio";
				$requestEstado = $this->select($sql_estado);

				$request = array(
					'cliente' => $requestCliente,
					'orden' => $requestPaquete,
					'estado' => $requestEstado
				);
			}
		}
		return $request;
	}

	public function updatePedido(int $Cod_Envio_Paquetes, $Peso_paquete = NULL, $Volumen_paquete = NULL, string $Cod_Tipo_Envio)
	{
		if ($Cod_Tipo_Envio == 3) {
			$query_insert  = "UPDATE tbl_paquete SET status = ?  WHERE Cod_Envio_Paquetes = $Cod_Envio_Paquetes ";
			$arrData = array($estado);
		} else {
			$query_insert  = "UPDATE pedido SET  Cod_Tipo_Envio = ?,status = ? WHERE Cod_Envio_Paquetes = $Cod_Envio_Paquetes";
			$arrData = array(
				$Peso_paquete,
				$Volumen_paquete,
				$Cod_Tipo_Envio
			);
		}
		$request_insert = $this->update($query_insert, $arrData);
		return $request_insert;
	}

	public function deletePaquete(int $Cod_Envio_Paquetes)
    {
        $query_delete = "DELETE FROM tbl_paquete WHERE Cod_Envio_Paquetes = $Cod_Envio_Paquetes";
        $arrData = array($Cod_Envio_Paquetes);
        $request_delete = $this->delete($query_delete, $arrData);
        return $request_delete;
    }

	public function selectPaqueteR($contenido)
	{
		$sql = "SELECT p.*, 
					   e.Descripcion AS Estado_Envio_Descripcion,
					   tp.Descripcion_pago AS Tipo_Pago_Descripcion,
					   ts.Descripción AS Tipo_Seguro_Descripcion,
					   c.nombre AS Nombre_Cliente,
					   c.apellido AS Apellido_Cliente
				FROM tbl_paquete p
				INNER JOIN tbl_estado_envio e ON e.Id_Estado_Envio = p.Id_Estado_Envio
				INNER JOIN tbl_tipo_pago tp ON tp.id_tipo_pago = p.id_tipo_pago
				LEFT JOIN tbl_tipo_seguro ts ON ts.Id_Tipos_Seguros = p.id_Tipo_Seguro
				LEFT JOIN tbl_casillero cas ON cas.id_casillero = p.id_Casillero
				LEFT JOIN tbl_cliente c ON c.id_cliente = cas.Id_Cliente
				WHERE p.Cod_Envio_Paquetes LIKE '%$contenido%' OR
					  p.id_Casillero LIKE '%$contenido%' OR
					  p.Cod_Tipo_Envio LIKE '%$contenido%' OR
					  p.Peso_paquete LIKE '%$contenido%' OR
					  p.Volumen_paquete LIKE '%$contenido%' OR
					  p.Numero_Traking LIKE '%$contenido%' OR
					  p.compra LIKE '%$contenido%' OR
					  p.id_Tipo_Seguro LIKE '%$contenido%' OR
					  p.Id_Estado_Envio LIKE '%$contenido%' OR
					  p.Direccion_Envio LIKE '%$contenido%' OR
					  p.Fecha_Entrega LIKE '%$contenido%' OR
					  p.Fecha_pedido LIKE '%$contenido%' OR
					  p.id_tipo_pago LIKE '%$contenido%' OR
					  c.nombre LIKE '%$contenido%' OR
					  c.apellido LIKE '%$contenido%'";
	
		$request = $this->select_all($sql);
	
		return $request;
	}
	

	// Bitacora
    public function bitacora(int $intIdUsuario, int $objeto, string $evento, string $descripcion, string $fecha)
    {
        $this->intIdUsuario = $intIdUsuario;
        $this->strEvento = $evento;
        $this->strObjeto = $objeto;
        $this->strDescripcion = $descripcion;
        $this->strFecha = $fecha;

        $sql = "INSERT INTO tbl_bitacora (Id_Usuario, Id_Objeto, Accion, Descripcion, Fecha) VALUES (?,?,?,?,?)";
        $arrData = array($this->intIdUsuario, $this->strObjeto, $this->strEvento, $this->strDescripcion, $this->strFecha);
        $request = $this->insert($sql, $arrData);
        return $request;
    }
}