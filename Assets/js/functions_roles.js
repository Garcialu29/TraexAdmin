var tableRoles;

document.addEventListener('DOMContentLoaded', function(){

	tableRoles = $('#tableRoles').DataTable({
		"aProcessing": true,
		"aServerSide": true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url+"/Roles/getRoles",
            "dataSrc": ""
        },
        "columns": [
            {
                "data": null,
                "render": function (data, type, row, meta) {
                  return meta.row + 1;
                },
                "orderable": false // Para que la columna de orden no se pueda ordenar
              },
            
            {"data": "Nombre_Rol"},
            {"data": "Descripcion_Rol"},
            {"data": "estado_rol"},
            {"data": "options"}
        ],
        "responsive": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]  
    });

    // NUEVO ROL
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e) {
        e.preventDefault();

        var intIdRol = document.querySelector('#idRol').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
        
        if(strNombre == '' || strDescripcion == '' || intStatus == '') {
            Swal.fire({
                title: 'Atención',
                text: 'Todos los campos son obligatorios.',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
            return false; 
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Roles/setRol'; 
        var formData = new FormData(formRol);
        request.open("POST", ajaxUrl, true);
        request.send(formData);

        request.onreadystatechange = function() {

           if(request.readyState == 4){
            var objData = JSON.parse(request.responseText || '{}');
             if ( request.status == 200 && objData.status){ 
               // var objData = JSON.parse(request.responseText);
                //if(objData.status) {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    Swal.fire({
                        title: 'Roles de usuario',
                        text: objData.msg,
                        icon: 'success'
                    }).then(() => {
                        tableRoles.api().ajax.reload();
                    });
                } else {
                    Swal.fire("Error", objData.msg, "error");
                }              
            } 
        }
    }
});

function openModal() {
    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
    $('#modalFormRol').modal('show');
}

function fntEditRol(idrol) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Guardar";

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Roles/getRol/' + idrol;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if(objData.status) {
                document.querySelector("#idRol").value = objData.data.Id_Rol;
                document.querySelector("#txtNombre").value = objData.data.Nombre_Rol;
                document.querySelector("#txtDescripcion").value = objData.data.Descripcion_Rol;

                var optionSelect = objData.data.estado_rol == 1 
                    ? '<option value="1" selected class="notBlock">Activo</option>'
                    : '<option value="2" selected class="notBlock">Inactivo</option>';
                
                var htmlSelect = `${optionSelect}
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>`;
                document.querySelector("#listStatus").innerHTML = htmlSelect;
                $('#modalFormRol').modal('show');
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelRol(idrol) {
    swal({
        title: "Eliminar Rol",
        text: "¿Realmente quiere inactivar el Rol?",
        icon: "warning",
        buttons: ["No, cancelar!", "Si, eliminar!"],
        dangerMode: true,
    }).then((isConfirm) => {
        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Roles/delRol/';
            var strData = "idrol=" + idrol;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if(objData.status) {
                        Swal.fire({
                            title: 'Inactivo!',
                            text: objData.msg,
                            icon: 'success'
                        }).then(() => {
                            tableRoles.api().ajax.reload();
                        });
                    } else {
                        Swal.fire("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}

function fntPermisos(idrol) {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Permisos/getPermisosRol/' + idrol;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            document.querySelector('#contentAjax').innerHTML = request.responseText;
            $('.modalPermisos').modal('show');
            document.querySelector('#formPermisos').addEventListener('submit', fntSavePermisos, false);
        }
    }
}

function fntSavePermisos(event) {
    event.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Permisos/setPermisos'; 
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if(objData.status) {
                Swal.fire("Permisos de usuario", objData.msg, "success");
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
    }
}

function fntPDF() {
 
    let  buscador = $('.dataTables_filter input').val();
     var win = window.open( base_url + '/Roles/getRolesR/'+ buscador, '_blank');
     win.focus();
}
