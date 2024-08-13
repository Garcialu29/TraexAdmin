var tableTipoSeguros;

document.addEventListener('DOMContentLoaded', function () {

    tableTipoSeguros = $('#tableTipoSeguros').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/TipoSeguros/getTiposSeguros",
            "dataSrc": ""
        },
        "columns": [
            { 
                "data": null, // Columna para números secuenciales
                "render": function (data, type, row, meta) {
                    return meta.row + 1; // Número secuencial (1, 2, 3, ...)
                }
            },
            { "data": "Descripción" },
            { "data": "precio" },
            { "data": "opciones" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});

var formTipoSeguro = document.querySelector('#formTipoSeguro');
formTipoSeguro.onsubmit = function (e) {
    e.preventDefault();

    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var intPrecio = document.querySelector('#txtPrecio').value;

    if (strDescripcion == '' || intPrecio == '') {
        Swal.fire({
            title: 'Atención',
            text: 'Todos los campos son obligatorios.',
            icon: 'error',
            confirmButtonText: 'Ok'
        });
        return false;
    }

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/TipoSeguros/setTipoSeguro';
    var formData = new FormData(formTipoSeguro);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var objData = JSON.parse(request.responseText || '{}');
            if (request.status == 200 && objData.status) {
                $('#modalFormTipoSeguro').modal("hide");
                formTipoSeguro.reset();
                Swal.fire({
                    title: 'Tipo de Seguro',
                    text: objData.msg,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    tableTipoSeguros.api().ajax.reload();
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

function fntEditTipoSeguro(Id_Tipos_Seguros) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Tipo de Seguro";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/TipoSeguros/getTipoSeguro/' + Id_Tipos_Seguros;

    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            
            if (objData.status) {
                document.querySelector('#Id_Tipos_Seguros').value = objData.data.Id_Tipos_Seguros;
                document.querySelector('#txtDescripcion').value = objData.data.Descripción;
                document.querySelector('#txtPrecio').value = objData.data.precio;
                $('#modalFormTipoSeguro').modal('show');
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelTipoSeguro(Id_Tipos_Seguros) {
    Swal.fire({
        title: "Eliminar Tipo de Seguro",
        text: "¿Realmente quiere eliminar este tipo de seguro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/TipoSeguros/delTipoSeguro';
            var strData = "Id_Tipos_Seguros=" + Id_Tipos_Seguros;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire("Eliminar!", objData.msg, "success").then(() => {
                            tableTipoSeguros.api().ajax.reload();
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
    document.querySelector('#Id_Tipos_Seguros').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tipo de Seguro";
    document.querySelector("#formTipoSeguro").reset();
    $('#modalFormTipoSeguro').modal('show');
}

function fntPDF() {
    let buscador = $('.dataTables_filter input').val();
    var win = window.open(base_url + '/TipoSeguros/getTipoSeguroR/' + buscador, '_blank');
    win.focus();
}
