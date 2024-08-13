var tableTipoEnvio;

document.addEventListener('DOMContentLoaded', function () {

    tableTipoEnvio = $('#tableTipoEnvio').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/TipoEnvios/getTiposEnvios",
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
            { "data": "monto" },
            { "data": "opciones" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});

var formTipoEnvio = document.querySelector('#formTipoEnvio');
formTipoEnvio.onsubmit = function (e) {
    e.preventDefault();

    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var strMonto = document.querySelector('#txtMonto').value;

    if (strDescripcion == '' || strMonto == '') {
        Swal.fire({
            title: 'Atención',
            text: 'Todos los campos son obligatorios.',
            icon: 'error',
            confirmButtonText: 'Ok'
        });
        return false;    
    }

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/TipoEnvios/setTipoEnvio';
    var formData = new FormData(formTipoEnvio);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var objData = JSON.parse(request.responseText || '{}');
            if (request.status == 200 && objData.status) {
                $('#modalFormTipoEnvio').modal("hide");
                formTipoEnvio.reset();
                Swal.fire({
                    title: 'Tipo de Envío',
                    text: objData.msg,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(() => {
                  tableTipoEnvio.api().ajax.reload();
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

function fntEditTipoEnvio(Cod_Tipo_Envio) {
    //var Cod_Tipo_Envio = Cod_Tipo_Envio;
    document.querySelector('#titleModal').innerHTML = "Actualizar Tipo de Envío";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/TipoEnvios/getTipoEnvio/' + Cod_Tipo_Envio;

    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            
            if (objData.status) {
              
                document.querySelector('#Cod_Tipo_Envio').value = objData.data.Cod_Tipo_Envio;
                document.querySelector('#txtDescripcion').value = objData.data.Descripcion;
                document.querySelector('#txtMonto').value = objData.data.monto;
                $('#modalFormTipoEnvio').modal('show');
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelTipoEnvio(Cod_Tipo_Envio) {
  Swal.fire({
      title: "Eliminar Tipo de Envío",
      text: "¿Realmente quiere eliminar este tipo de envío?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, eliminar!",
      cancelButtonText: "No, cancelar!",
  }).then((result) => {
      if (result.isConfirmed) {
          var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          var ajaxUrl = base_url + '/TipoEnvios/delTipoEnvio';
          var strData = "Cod_Tipo_Envio=" + Cod_Tipo_Envio;
          request.open("POST", ajaxUrl, true);
          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function() {
              if (request.readyState == 4 && request.status == 200) {
                  var objData = JSON.parse(request.responseText);
                  if (objData.status) {
                      Swal.fire("Eliminar!", objData.msg, "success").then(() => {
                        tableTipoEnvio.api().ajax.reload();
                    });
                      tableRoles.api().ajax.reload();
                  } else {
                      Swal.fire("Atención!", objData.msg, "error");
                  }
              }
          }
      }
  });
}



function openModal() {
    document.querySelector('#Cod_Tipo_Envio').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tipo de Envío";
    document.querySelector("#formTipoEnvio").reset();
    $('#modalFormTipoEnvio').modal('show');
}

function fntPDF() {
    let buscador = $('.dataTables_filter input').val();
    var win = window.open(base_url + '/TipoEnvios/getTipoEnvioR/' + buscador, '_blank');
    win.focus();
}
