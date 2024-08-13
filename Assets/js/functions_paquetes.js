
let tablaPaquetes;
let rowTable;

tablePaquetes = $('#tablePaquetes').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax": {
        "url": base_url + "/Paquetes/getPaquetes",
        "dataSrc": ""
    },
    "columns": [
        { 
            "data": null, // Columna para números secuenciales
            "render": function (data, type, row, meta) {
                return meta.row + 1; // Número secuencial (1, 2, 3, ...)
            }
        },
        {
            "data": "Nombre_Cliente",
            "render": function(data, type, row, meta) {
                return data + '  ' + row.Apellido_Cliente;
            }
        },
        {"data": "Numero_Casillero"},
        {"data": "Peso_paquete"},
        {"data": "Volumen_paquete"},
        {"data": "Numero_Traking"},
        {"data": "TipoEnvio"},
        {"data": "EstadoEnvio"},
        {"data": "Direccion_Envio"},
        {"data": "Fecha_Entrega"},
        {"data": "Fecha_pedido"},
        {"data": "options"}
    ],
    "columnDefs": [
        {'className': "textcenter", 'targets': [3]},
        {'className': "textright", 'targets': [4]},
        {'className': "textcenter", 'targets': [5]}
    ],
    "responsive": "true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order": [[0, "desc"]]
    
});


function openModal() {
    rowTable = "";
    document.querySelector('#Cod_Envio_Paquetes').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Paquete";
    document.querySelector("#formPaquete").reset();
    $('#modalFormPaquete').modal('show');
}

function fntEditInfo(Cod_Envio_Paquetes) {
    document.querySelector('#titleModal').innerHTML = "Actualizar";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Paquetes/obtener/' + Cod_Envio_Paquetes;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.status == 200) {
                try {
                    let objData = JSON.parse(request.responseText);
                    console.log(objData.Cod_Envio_Paquetes);
                    if (objData) {
                        document.querySelector("#Cod_Envio_Paquetes").value = objData.Cod_Envio_Paquetes;
                        document.querySelector("#Id_Casillero").value = objData.Id_Casillero;
                    
                        if (objData.Cod_Tipo_Envio !== null) {
                            document.querySelector("#Cod_Tipo_Envio").value = objData.Cod_Tipo_Envio;
                        } else {
                            document.querySelector("#Cod_Tipo_Envio").value = '';
                        }
                        if (objData.Peso_paquete !== null) {
                            document.querySelector("#Peso_paquete").value = objData.Peso_paquete;
                        } else {
                            document.querySelector("#Peso_paquete").value = '';
                        }
                        if (objData.Volumen_paquete !== null) {
                            document.querySelector("#Volumen_paquete").value = objData.Volumen_paquete;
                        } else {
                            document.querySelector("#Volumen_paquete").value = '';
                        }
                        document.querySelector("#Numero_Traking").value = objData.Numero_Traking;
                        document.querySelector("#compra").value = objData.compra;
                        document.querySelector("#id_Tipo_Seguro").value = objData.id_Tipo_Seguro;
                        document.querySelector("#Id_Estado_Envio").value = objData.Id_Estado_Envio;
                        document.querySelector("#Direccion_Envio").value = objData.Direccion_Envio;
                        document.querySelector("#Fecha_Entrega").value = objData.Fecha_Entrega;
                        document.querySelector("#Fecha_pedido").value = objData.Fecha_pedido;
                        document.querySelector("#id_tipo_pago").value = objData.id_tipo_pago;

                        $('#modalFormPaquete').modal('show');
                    } else {
                        console.error("Datos no válidos en la respuesta:", objData);
                        swal("Error", "Los datos recibidos del servidor no son válidos", "error");
                    }
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                    swal("Error", "Error al analizar la respuesta JSON del servidor", "error");
                }
            } else {
                console.error("Request failed with status:", request.status);
                swal("Error", "La solicitud al servidor falló con el estado: " + request.status, "error");
            }
        }
    };
}


function actualizarPaquete(Cod_Envio_Paquetes, nuevosDatos) {
    let request = new XMLHttpRequest();
    let ajaxUrl = base_url + '/Paquetes/actualizar/' + Cod_Envio_Paquetes;

    request.open("PUT", ajaxUrl, true);
    request.setRequestHeader("Content-Type", "application/json");

    // Convertir los nuevos datos a formato JSON y enviarlos en el cuerpo de la solicitud
    request.send(JSON.stringify(nuevosDatos));

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                Swal.fire({
                    title: 'Paquetes',
                    text: objData.msg,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    tablePaquetes.api().ajax.reload();
                });
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    };
}


function fntDelPaquete(Cod_Envio_Paquetes) {
    Swal.fire({
        title: "Eliminar Paquete",
        text: "¿Realmente quiere eliminar el Paquete?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!"
    }).then((result) => {
        if (result.isConfirmed) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Paquetes/delPaquete';
            let strData = "Cod_Envio_Paquetes=" + Cod_Envio_Paquetes;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire("Eliminado!", objData.msg, "success");
                        tablePaquetes.api().ajax.reload();
                    } else {
                        Swal.fire("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}


//codigo para el  combobox del rol
//window.addEventListener('load', function () {
//    fntFechaP();
//}, false);


function rastreoPaquete() {
    $("#resPaquete").removeAttr("hidden");
    const searchTxt = $("#ref_no").val();
    $.ajax({
        type: "POST",
        url: base_url + "/Paquetes/filtro/" + searchTxt,
        dataType: "json",
        success: function (response) {
            if (response.error) {
                alert(response.error); // Muestra el mensaje de error en una alerta
            } else {
                // Mostrar los datos del paquete
                $("#id_Casillero").text(response.NumeroCasillero);
                $("#Cod_Tipo_Envio").text(response.nombreTipoEnvio);
                $("#Peso_paquete").text(response.Peso_paquete);
                $("#Volumen_paquete").text(response.Volumen_paquete);
                $("#Dimensiones").text(response.Dimensiones);
                $("#Numero_Traking").text(response.Numero_Traking);
                $("#id_tipo_pago").text(response.nombreTipoPago);
                $("#compra").text(response.compra);
                $("#id_Tipo_Seguro").text(response.nombreTipoSeguro);
                $("#Id_Estado_Envio").text(response.nombreEstadoEnvio);
                $("#Direccion_Envio").text(response.Direccion_Envio);
                $("#Fecha_Envio").text(response.Fecha_Entrega);
                $("#Fecha_pedido").text(response.Fecha_pedido);
            }
        },
        
        error: function (xhr, status, error) {
            console.error("Error en la solicitud Ajax: " + status);
        }
    });

}
function openModal() {
    rowTable = "";
    document.querySelector('#Cod_Envio_Paquetes').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Paquete";
    document.querySelector("#formPaquete").reset();
    $('#modalFormPaquete').modal('show');
}

function fntPDF() {
 
    let  buscador = $('.dataTables_filter input').val();
     var win = window.open( base_url + '/Paquetes/getPaquetesR/'+ buscador, '_blank');
     win.focus();
}
