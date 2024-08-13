let tablaEstadoEnvios;
let rowTable;

tablaEstadoEnvios = $('#tableEstadoEnvios').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/EstadoEnvios/getEstadoEnvios",
        "dataSrc":""
    },
    "columns":[
        {"data":"Id_Estado_Envio"},
        {"data":"Descripcion"},
        {"data":"options"}
    ],
    "columnDefs": [
                    { 'className': "textcenter", "targets": [ 0 ] },
                    { 'className': "textright", "targets": [ 1 ] },
                    { 'className': "textcenter", "targets": [ 2 ] }
                  ],       
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1] 
            }
        },
        {
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1] 
            }
        },
    ],
    "resonsive":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
});

function openModal() {
  rowTable = "";
  document.querySelector("#Id_Estado_Envio").value = "";
  document
    .querySelector(".modal-header")
    .classList.replace("headerUpdate", "headerRegister");
  document
    .querySelector("#btnActionForm")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar";
  document.querySelector("#titleModal").innerHTML = "Nuevo Estado de envio";
  document.querySelector("#formEstadoEnvio").reset();
  $("#modalFormEstadoEnvio").modal("show");
}
