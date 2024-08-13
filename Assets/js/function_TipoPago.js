var tableTipoPago;

document.addEventListener('DOMContentLoaded', function () {

    tableTipoPago = $('#tableTipoPago').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/TipoPagos/getTiposPagos",
            "dataSrc": ""
        },
        "columns": [
          { 
            "data": null, // Columna para números secuenciales
            "render": function (data, type, row, meta) {
                return meta.row + 1; // Número secuencial (1, 2, 3, ...)
            }
        },
            { "data": "Descripcion_pago" },
            { "data": "opciones" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});


var formTipoPago = document.querySelector('#formTipoPago');
formTipoPago.onsubmit = function (e) {
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
    var ajaxUrl = base_url + '/TipoPagos/setTipoPago';
    var formData = new FormData(formTipoPago);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var objData = JSON.parse(request.responseText || '{}');
            if (request.status == 200 && objData.status) {
                $('#modalFormTipoPago').modal("hide");
                formTipoPago.reset();
                Swal.fire({
                    title: 'Tipo de Pago',
                    text: objData.msg,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(() => {
                  tableTipoPago.api().ajax.reload();
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

function fntEditTipoPago(id_tipo_pago) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Tipo de Pago";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/TipoPagos/getTipoPago/' + id_tipo_pago;

    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            
            if (objData.status) {
                document.querySelector('#id_tipo_pago').value = objData.data.id_tipo_pago;
                document.querySelector('#txtDescripcion').value = objData.data.Descripcion_pago;
                $('#modalFormTipoPago').modal('show');
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelTipoPago(id_tipo_pago) {
  Swal.fire({
      title: "Eliminar Tipo de Pago",
      text: "¿Realmente quiere eliminar este tipo de pago?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, eliminar!",
      cancelButtonText: "No, cancelar!",
  }).then((result) => {
      if (result.isConfirmed) {
          var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          var ajaxUrl = base_url + '/TipoPagos/delTipoPago';
          var strData = "id_tipo_pago=" + id_tipo_pago;
          request.open("POST", ajaxUrl, true);
          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function() {
              if (request.readyState == 4 && request.status == 200) {
                  var objData = JSON.parse(request.responseText);
                  if (objData.status) {
                      Swal.fire("Eliminar!", objData.msg, "success").then(() => {
                        tableTipoPago.api().ajax.reload();
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
    document.querySelector('#id_tipo_pago').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tipo de Pago";
    document.querySelector("#formTipoPago").reset();
    $('#modalFormTipoPago').modal('show');
}

function fntPDF() {
    let buscador = $('.dataTables_filter input').val();
    var win = window.open(base_url + '/TipoPagos/getTipoPagoR/' + buscador, '_blank');
    win.focus();
}
