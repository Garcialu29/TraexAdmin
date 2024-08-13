let tableClientes;
let rowTable = "";
let idclienteGlobal= 0;

document.addEventListener('DOMContentLoaded', function(){
    tableClientes = $('#tableClientes').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/Clientes/getclientes",
            "dataSrc": ""
        },
        "columns": [
            { 
                "data": null, // Columna para números secuenciales
                "render": function (data, type, row, meta) {
                    return meta.row + 1; // Número secuencial (1, 2, 3, ...)
                }
            },
            //{ "data": "id_cliente" },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "correo_cliente" },
            { "data": "telefono" },
            { "data": "direccion" },
            { "data": "dni" },
            { "data": "Numero_Casillero" },
            { "data": "options" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    });


    var formClientes = document.querySelector('#formClientes');

    formClientes.onsubmit = function (e) {
        e.preventDefault();
        
        var idCliente = document.querySelector('#idCliente').value; // Este campo debería estar vacío o con valor 0 para nuevas inserciones
        var ajaxUrl = base_url + '/Clientes/setClientes'; // Asegúrate de que la URL es correcta
        var formData = new FormData(formClientes);
    
        // Determinar si es una creación o una actualización
        var isUpdate = idCliente > 0;
    
        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                $('#ModalClientes').modal('hide');
                formClientes.reset();
                if (isUpdate) {
                    swal("Clientes", "Cliente actualizado correctamente.", "success");
                } else {
                    swal("Clientes", "Cliente creado correctamente.", "success");
                }
              tableClientes.ajax.reload();
            } 
        })
        .catch(error => {
            console.error('Error:', error);
            swal("Error", "Hubo un problema al procesar la solicitud.", "error");
        });
    };
}, false);

function fntEditInfo( idCliente) {
    idclienteGlobal = idCliente;
    //rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Cliente";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.querySelector('#idCliente').value = idCliente;
       console.log(idCliente)
    fetch(base_url + '/Clientes/getCliente/' + idCliente)
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            $('#ModalClientes').modal('show');
            document.querySelector('#idCliente').value = data.data.id_cliente;
            document.querySelector('#txtNombre').value = data.data.nombre;
            document.querySelector('#txtApellido').value = data.data.apellido;
            document.querySelector('#txtcorreo_cliente').value = data.data.correo_cliente;
            document.querySelector('#txtTelefono').value = data.data.telefono;
            document.querySelector('#txtDireccion').value = data.data.direccion;
            document.querySelector('#txtdni').value = data.data.dni;
        } else {
            swal("Error", data.msg, "error");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        swal("Error", "Hubo un problema al cargar los datos del cliente.", "error");
    });
}

function fntPDF() {
    let buscador = $('.dataTables_filter input').val();
    var win = window.open(base_url + '/Clientes/getClienteR/' + buscador, '_blank');
    win.focus();
}

function fntDelInfo(idCliente) {
    swal({
        title: "Eliminar cliente",
        text: "¿Realmente quiere el cliente?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            fetch(base_url + '/Clientes/delCliente', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "idCliente=" + idCliente
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    swal("Eliminar!", data.msg, "success");
                    tableClientes.ajax.reload();
                } else {
                    swal("Atención!", data.msg, "error");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal("Error", "No se puede eliminar Clientes con paquetes.", "error");
            });
        }
    });
}

function openModal() {
    rowTable = "";
    document.querySelector('#idCliente').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
    document.querySelector("#formClientes").reset();
    $('#ModalClientes').modal('show');
}
