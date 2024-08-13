var tableEstadoEnvios;
let rowTable;

document.addEventListener('DOMContentLoaded', function () {
    tableEstadoEnvios = $('#tableEstadoEnvios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/EstadoEnvios/getEstadosEnvios",
            "dataSrc": ""
        },
        "columns": [
            {
                "data": null, // Columna para números secuenciales
                "render": function (data, type, row, meta) {
                    return meta.row + 1; // Número secuencial (1, 2, 3, ...)
                }
            },
            { "data": "Descripcion" },
            { "data": "opciones" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});

var formEstadoEnvio = document.querySelector('#formEstadoEnvio');
formEstadoEnvio.onsubmit = function (e) {
    e.preventDefault();

    var strDescripcion = document.querySelector('#txtDescripcion').value;

    if (strDescripcion == '') {
        Swal.fire({
            title: 'Atención',
            text: 'Todos los campos son obligatorios.',
            icon: 'error',
            confirmButtonText: 'Ok'
        });
        return false;
    }

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/EstadoEnvios/setEstadoEnvio';
    var formData = new FormData(formEstadoEnvio);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var objData = JSON.parse(request.responseText || '{}');
            if (request.status == 200 && objData.status) {
                $('#modalFormEstadoEnvio').modal("hide");
                formEstadoEnvio.reset();
                Swal.fire({
                    title: 'Estado de Envío',
                    text: objData.msg,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    tableEstadoEnvios.api().ajax.reload();
                });
            } else {
                var errorMsg = objData.msg || "Error en la solicitud: " + request.status;
                Swal.fire({
                    title: 'Error',
                    text: errorMsg,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        }
    }
}

// JavaScript function to edit EstadoEnvio
function fntEditEstadoEnvio(Id_Estado_Envio) {
    var Id_Estado_Envio = Id_Estado_Envio;
    document.querySelector('#titleModal').innerHTML = "Actualizar Estado de Envío";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/EstadoEnvios/getEstadoEnvio/' + Id_Estado_Envio;

    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                $('#modalFormEstadoEnvio').modal('show');

                setTimeout(function () {
                    document.querySelector('#Id_Estado_Envio').value = objData.data.Id_Estado_Envio;
                    document.querySelector('#txtDescripcion').value = objData.data.Descripcion;
                }, 500); // Ajustar tiempo según sea necesario
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelEstadoEnvio(Id_Estado_Envio) {
    Swal.fire({
        title: "Eliminar Estado de Envío",
        text: "¿Realmente quiere eliminar este estado de envío?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/EstadoEnvios/delEstadoEnvio';
            var strData = "Id_Estado_Envio=" + Id_Estado_Envio;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire("Eliminar!", objData.msg, "success").then(() => {
                            tableEstadoEnvios.api().ajax.reload();
                        });
                    } else {
                        Swal.fire("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}

function openModal() {
    rowTable = "";
    document.querySelector('#Id_Estado_Envio').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Estado de Envío";
    document.querySelector("#formEstadoEnvio").reset();
    $('#modalFormEstadoEnvio').modal('show');
}

function fntPDF() {
    let buscador = $('.dataTables_filter input').val();
    var win = window.open(base_url + '/EstadoEnvios/getEstadoEnvioR/' + buscador, '_blank');
    win.focus();
}
