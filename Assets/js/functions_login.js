window.addEventListener('load', function () {
    //fntPreguntas();
    // initEvents(); //aquí

}, false);
var variableG;

// con addEventlistener se van a ir agregando todos los eventos que vayan dentro de la función creada al momento de cargar el documento
document.addEventListener('DOMContentLoaded', function () {

    // validamos que exista el formulario del login en la vista.
    if (document.querySelector("#formLogin")) {
        // si existe, agregamos el evento con una variable con let, indica que se va utilizar solo en esta función
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {
            e.preventDefault(); // prevenir que se recargue la página al momento de darle submit

            let strEmail = document.querySelector('#txtEmail').value;
            let strPassword = document.querySelector('#txtPasswordl').value;

            if (strEmail == "" || strPassword == "") { // validamos que se hayan llenado los campos de correo y de la contraseña
                Swal.fire({
                    title:'Por favor', // Título del alert
                    text:'Escriba usuario y contraseña.', // Texto del alert
                    icon:'error', // Tipo de alert (icono)
                    confirmButtonText: 'Ok'
                });
                  
                return false;
            } else { // cuando los datos estén llenos, se especifica los siguientes datos 
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/loginUser';
                var formData = new FormData(formLogin); // obtiene los campos del form login
                request.open("POST", ajaxUrl, true); // abre la conexión e indica que se va enviar la información
                request.send(formData); // envía la información 

                request.onreadystatechange = function () {

                    if (request.readyState != 4) return; // si es diferente de 4 no va hacer nada 
                    if (request.status == 200) { // si la conexión es exitosa convierte en formato json lo obtenido
                        var objData = JSON.parse(request.responseText); // JSON.PARSE lo que hace es parsear para que sea un objeto de formato JSON que viene del response text.
                        if (objData.status) { // valida que si el status que viene en el formato Json que corresponde a lo que viene del controlador, está en true, quiere decir que hizo login de manera correcta
                            if (objData.msg == 'mostrar preguntas') {

                                window.location = base_url + '/Login/confirmPrimera'; // direcciona hacia el método de preguntas de seguridad para que las ingrese

                            } else if (objData.msg == 'mostrar cambio') {

                                window.location = base_url + '/Login/CambioPassword'; // direcciona hacia el método de preguntas de seguridad para que las ingrese

                            } else {
                                if (objData.msg == 'mostrar default') {

                                    window.location = base_url + '/Login/default'; // direcciona hacia el dashboard
                                } else {
                                    window.location = base_url + '/inicio'; // direcciona hacia el dashboard

                                }
                            }
                        } else {
                            Swal.fire(
                                'Atención', // Título del alert
                                objData.msg, // Texto del alert
                                'error' // Tipo de alert (icono)
                              );
                              
                            document.querySelector('#txtPasswordl').value = ""; // limpiar el campo de la contraseña
                        }
                    } else {
                        swal("Atencion", "Error en el proceso", "error");
                    }

                    return false;
                }
            }
        }
    }

    if (document.querySelector("#form_reiniciar_contraseñas")) { // se dirige hacia el elemento reiniciar contraseña de la vista
        let form_reiniciar_contraseñas = document.querySelector("#form_reiniciar_contraseñas"); // si existe ese elemento hace la validacion y le asigna a una variable que obtiene el id del formulario
        form_reiniciar_contraseñas.onsubmit = function (e) {
            e.preventDefault(); // previene que se recargue la página al darle al botón de aceptar

            let strEmail = document.querySelector('#txt_correo_reiniciar').value; // obtiene el valor del input del correo
            let rbPreguntas = document.querySelector('#op_preguntas').value;
            let rbCorreo = document.querySelector('#op_correo').value;

            if (strEmail == "") // si el valor está vacío entonces no deja continuar el programa
            {
                swal("Por favor", "Escribe tu correo electrónico.", "error");
                return false;
            } else if (rbPreguntas == "true" || $('#op_preguntas').is(':checked')) {
                var request = (window.XMLHttpRequest) ? // esta variable indica en qué navegador se encuentra
                    new XMLHttpRequest() :
                    new ActiveXObject('Microsoft.XMLHTTP');

                var ajaxUrl = base_url + '/login/resetPassPreguntas'; // a la variable ajaxurl se le asigna el método resetPass
                var formData = new FormData(form_reiniciar_contraseñas);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {

                    //   console.log(request);
                    if (request.readyState != 4) return; // no devuelve nada
                    if (request.status == 200) { // si la petición es exitosa 
                        var objData = JSON.parse(request.responseText); // convierte a objeto lo que obtiene en formato JSON
                    }
                    if (objData.status) { // si el estado es verdadero quiere decir que se envió el correo y muestra el mensaje
                        window.location = base_url + '/Login/ConfirmPassPreguntas/' + strEmail;

                    } else {
                        swal("Atencion", objData.msg, "error");
                        return false;
                    }
                }

            } else if ((rbCorreo == "true" || $('#op_correo').is(':checked'))) {

                // swal("", "ha seleccionado recuperación por correo", "success");
                var request = (window.XMLHttpRequest) ? // esta variable indica en qué navegador se encuentra
                    new XMLHttpRequest() :
                    new ActiveXObject('Microsoft.XMLHTTP');

                var ajaxUrl = base_url + '/login/resetPass'; // a la variable ajaxurl se le asigna el método resetPass
                var formData = new FormData(form_reiniciar_contraseñas);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function () {
                    //console.log(request);
                    if (request.readyState != 4) return; // no devuelve nada
                    if (request.status == 200) { // si la petición es exitosa 
                        var objData = JSON.parse(request.responseText); // convierte a objeto lo que obtiene en formato JSON
                        if (objData.status) { // si el estado es verdadero quiere decir que se envió el correo y muestra el mensaje
                            swal({
                                title: "",
                                text: objData.msg, // coloca el texto del formato json
                                type: "success", // tipo de mensaje
                                confirmButtonText: "Aceptar", // botón de confirmación
                                CloseOnConfirm: false,
                            }, function (isConfirm) {
                                if (isConfirm) {
                                    window.location = base_url; // redirecciona a la ruta raíz del proyecto
                                }
                            });
                        } else {
                            swal("Atencion", objData.msg, "error");
                        }
                    } else {
                        swal("Atencion", "Error en el proceso", "error"); // en caso de que no haya status 200
                    }
                    return false;

                }

            } else {
                swal("Por favor", "Selecciona el método de recuperación de contraseña", "error");
                return false;
            }

        }
    }

    if (document.querySelector('#formCambiarPass')) {

        let formCambiarPass = document.querySelector('#formCambiarPass'); // con esta variable asignamos el formulario de cambiar contraseña
        formCambiarPass.onsubmit = function (e) {
            e.preventDefault(); // previene que se recargue la página al momento de darle aceptar al formulario
            let strPassword = document.querySelector('#txtPassword').value; // asignamos los valores que obtenemos de los inputs
            let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;
            let idUsuario = document.querySelector('#id_Usuario').value;

            if (strPassword == "" || strPasswordConfirm == "") {
                swal("Por Favor", "Escriba la nueva contraseña", "error");
                return false;
            } else {
                if (strPassword != strPasswordConfirm) {

                    swal("Atencion", "Las contraseñas no son iguales", "error");
                    return false;
                }
                if (variableG == false) {
                    swal("Atencion", "No ha introducido los caracteres requeridos", "error");
                    return false;
                }

                var request = (window.XMLHttpRequest) ? // Valida en qué navegador está
                    new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/setPassword'; // obtiene el método setPassword del controlador para crear la contraseña
                var formData = new FormData(formCambiarPass); // con este objeto encapsulamos todos los datos obtenidos
                request.open("POST", ajaxUrl, true); // enviamos los datos por el método post por medio de la url
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            swal({
                                title: "",
                                text: objData.msg,
                                type: "success",
                                confirmButtonText: "Iniciar sesión",
                                closeOnConfirm: false,
                            }, function (isConfirm) {
                                if (isConfirm) {
                                    window.location = base_url + '/login';
                                }

                            });
                        } else {
                            swal("Atencion", objData.msg, "error");
                        }

                    } else {
                        swal("Atencion", "Error en el proceso", "error");
                    }
                }
            }
        }
        variableG == false
    }
    if (document.querySelector('#formCambiarPass2')) {//Funcion que realiza el cambio de password
        let formCambiarPass = document.querySelector('#formCambiarPass2'); // con esta variable asignamos el formulario de cambiar contraseña
        formCambiarPass.onsubmit = function (e) {
            e.preventDefault(); // previene que se recargue la página al momento de darle aceptar al formulario
            let strPassword = document.querySelector('#txtPassword').value; // asignamos los valores que obtenemos de los inputs
            let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;
            let strPasswordAnterior = document.querySelector('#txtPasswordAnterior').value;
            let idUsuario = document.querySelector('#id_Usuario').value;

            if (strPassword == "" || strPasswordConfirm == "") {
                swal("Por Favor", "Escriba la nueva contraseña", "error");
                return false;
            } else if (strPasswordAnterior == "") {
                swal("Por Favor", "Escriba la contraseña anterior", "error");
                return false;

            }
            if (variableG == false) {
                swal("Atencion", "No ha introducido los caracteres requeridos", "error");
                return false;
            } else {

                if (strPassword != strPasswordConfirm) {
                    swal("Atencion", "Las contraseñas no son iguales", "error");
                    return false;
                }
                var request = (window.XMLHttpRequest) ? // Valida en qué navegador está
                    new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/setPasswordPrimera'; // obtiene el método setPassword del controlador para crear la contraseña
                var formData = new FormData(formCambiarPass); // con este objeto encapsulamos todos los datos obtenidos
                request.open("POST", ajaxUrl, true); // enviamos los datos por el método post por medio de la url
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            swal({
                                title: "",
                                text: objData.msg,
                                type: "success",
                                confirmButtonText: "Iniciar sesión",
                                closeOnConfirm: false,
                            }, function (isConfirm) {
                                if (isConfirm) {
                                    window.location = base_url + '/login';
                                }

                            });
                        } else {
                            swal("Atencion", objData.msg, "error");
                        }

                    } else {
                        swal("Atencion", "Error en el proceso", "error");
                    }
                }
            }
        }
        variableG == false
    }
    if (document.querySelector('#formPreguntas')) {
        let formPreguntas = document.querySelector('#formPreguntas'); // con esta variable asignamos el formulario de cambiar contraseña
        formPreguntas.onsubmit = function (e) {
            e.preventDefault(); // previene que se recargue la página al momento de darle aceptar al formulario
            let strRespuesta = document.querySelector('#txtRespuestaPregunta').value; // asignamos los valores que obtenemos de los inputs

            if (strRespuesta == "") {
                swal("Por Favor", "Escriba la respuesta a la pregunta ", "error");
                return false;
            } else {
                var request = (window.XMLHttpRequest) ? // Valida en qué navegador está
                    new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/ConfirmarPregunta'; // obtiene la función
                var formData = new FormData(formPreguntas); // con este objeto encapsulamos todos los datos obtenidos
                request.open("POST", ajaxUrl, true); // enviamos los datos por el método post por medio de la url
                request.send(formData);
                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {

                            window.location = base_url + '/Login/confirmCambioContrasena2';
                        } else {
                            swal("Atencion", objData.msg, "error");
                        }

                    } else {
                        swal("Atencion", "Error en el proceso", 
                        //(código existente)
                        )}
                    }
                        function initEvents() {
                            if (document.getElementById("txtPassword")) {
                                document.getElementById("txtPassword").addEventListener("keyup", function () {
                                    checkPassword();
                                })
                            }
                            if (document.getElementById("txtPasswordConfirm")) {
                                document.getElementById("txtPasswordConfirm").addEventListener("keyup", function () {
                                    checkPassword();
                                })
                            }
                        }
                    }
                        function checkPassword (){
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
                        
                        function fntPreguntas() {
                            if (document.querySelector('#form_list_preguntas')) {
                                let formPreguntas = document.querySelector("#formPreguntas");
                                let ajaxUrl = base_url + '/Login/getSelectPreguntas';
                                let request = (window.XMLHttpRequest) ?
                                    new XMLHttpRequest() :
                                    new ActiveXObject('Microsoft.XMLHTTP');
                                var formData = new FormData(formPreguntas);
                                request.open("POST", ajaxUrl, true);
                                request.send(formData);
                                request.onreadystatechange = function () {
                                    if (request.readyState == 4 && request.status == 200) {
                                        document.querySelector('#form_list_preguntas').innerHTML = request.responseText;
                                        $('#form_list_preguntas');
                                    }
                                }
                            }}
                        
                            if (document.querySelector('#formPrimer_Ingreso')) {
                                let formPrimer_Ingreso = document.querySelector("#formPrimer_Ingreso");
                                let ajaxUrl = base_url + '/Login/getSelectPreguntas';
                                let request = (window.XMLHttpRequest) ?
                                    new XMLHttpRequest() :
                                    new ActiveXObject('Microsoft.XMLHTTP');
                                var formData = new FormData(formPrimer_Ingreso);
                                request.open("POST", ajaxUrl, true);
                                request.send(formData);
                                request.onreadystatechange = function () {
                                    if (request.readyState == 4 && request.status == 200) {
                                        document.querySelector('#form_list_preguntasP').innerHTML = request.responseText;
                                        $('#form_list_preguntasP');
                                    }
                                }
                            }
                        }}})