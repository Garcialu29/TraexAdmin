window.addEventListener('load', function () {
    initEvents();

}, false);
var variableG;

var formregistroUsuario = document.querySelector('#formregistroUsuario');
formregistroUsuario.onsubmit = function (e) {
    e.preventDefault();

    var strNombre = document.querySelector('#txtNombre').value; //capturar el valor de Nombre
    var strEmail = document.querySelector('#txtEmail').value; //capturar el valor de email
    var strContrasena = document.querySelector('#txtcontrasena').value; //capturar el valor de contraseña
    var strContrasenaM = document.querySelector('#txtcontrasenaM').value; //capturar el valor de contraseña
    var strTelefono = document.querySelector('#txtTelefono').value;  //capturar el valor de telefono
    var strDireccion = document.querySelector('#txtDireccion').value; //capturar el valor de direccion
  

    //validacion que los datos esten llenos
    if ( strNombre == '' ||  strEmail == '' ||  strContrasena == '' ||  strContrasenaM == '' || strTelefono == '' || strDireccion == '' ) {
        swal("Atencion", "Todos los campos son obligatorio.", "error");
        return false;
    }

    if(strContrasena !=  strContrasenaM){
        swal("Atencion", "Las contraseñas no son iguales", "error");
        return false;
    }
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Registro_usuario/setRegistroUsuario'; //URL para acceder al metodo
    var formData = new FormData(formregistroUsuario);
    request.open("POST", ajaxUrl, true); //enviar datos por el metodo post
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            try {
                var objData = JSON.parse(request.responseText);
            } catch (error) {
                console.error("Error parsing JSON: " + error.message);
            }
        } else {
            console.error("Request failed with status: " + request.status);
        }
            

            if (objData.status) {  
                formregistroUsuario.reset();
                swal("Usuarios", objData.msg, "success");
               
            } else {
                swal("Error", objData.msg, "error");
            }
        } //else {
            //console.log("Error");
        }

    //}

//}

//clave
function initEvents(){
    if(document.getElementById("txtcontrasena")){
        document.getElementById("txtcontrasena").addEventListener("keyup",function () {
            checkPassword();
          })
          
    }
    if(document.getElementById("txtcontrasenaM")){
        document.getElementById("txtcontrasenaM").addEventListener("keyup",function () {
            checkPassword();
          })
          
    }

}



function checkPassword() {
    let value = document.getElementById("txtPassword").value;
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#])[A-Za-z\d$@$!%*?&#]{8,15}$/;

    if (regex.test(value)) {
        document.getElementById("txtPassword").classList.remove("is-invalid");
        document.getElementById("txtPassword").classList.add("is-valid");
        variableG = true;
    } else {
        document.getElementById("txtPassword").classList.remove("is-valid");
        document.getElementById("txtPassword").classList.add("is-invalid");
        variableG = false;
    }
}