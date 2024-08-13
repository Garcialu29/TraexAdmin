<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- SweetAlert2 CSS -->
   <!-- SweetAlert2 -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f3f4f6;
    }

    .login-content {
      margin-top: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .login-box {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
      padding: 40px;
      text-align: center;
    }

    .login-form  {
      text-align: start;
      margin-top: 90px; 
    }

    .login-image {
      width: 230px;
      height: auto;
      margin-bottom: 50px;
    }

    .login-head {
      font-size: 15px;
      margin-bottom: 10px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 20px;
      padding: 15px;
    }

    .btn-primary {
      border-radius: 10px;
      padding: 8px;
      background-color: #121481;
      border: none;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #121481;
    }

    .forget-form {
      display: none;
    }

    .mt-3 {
      margin-top: 20px;
    }

    .semibold-text {
      font-weight: 600;
    }

    a {
      color: #121481;
    }

    a:hover {
      color: #121481;
    }

    body {
      font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
    }
  </style>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="login-box">
      <img src="./Assets/images/logo.png" alt="" class="login-image">
      <form id="formLogin" class="login-form" name="formLogin" action="">
        <!-- Aquí se muestra la imagen -->
        <div class="form-group">
          <h3 class="login-head"> INICIAR SESIÓN</h3>
          <label class="control-label">CORREO ELÉCTRONCO</label>
          <input id="txtEmail" class="form-control" type="email" name="txtEmail" placeholder="" autofocus="" oninput="validateEmail(this)">
        </div>
        <div class="form-group">
          <label class="control-label">CONTRASEÑA</label>
          <div class="input-group">
            <input class="form-control" type="password" id="txtPasswordl" name="txtPasswordl" placeholder="" oninput="validatePasswordLength(this)">
            <div class="input-group-append">
              <button id="viewPassword" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="utility">
            <div class="animated-checkbox"></div>
            <center>
              <p class="semibold-text mb-2"><a href="reiniciar_contraseña">¿OLVIDÓ SU CONTRASEÑA ?</a></p>
            </center>
          </div>
        </div>
        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
        </div>
      </form>
      <form class="forget-form" id="form_reiniciar_contraseñas" name="form_reiniciar_contraseñas" action="">
        <center>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidó su contraseña ?</h3>
        </center>
        <div class="form-group">
          <label class="control-label">Correo de usuario</label>
          <input class="form-control" id="txt_correo_reiniciar" name="txt_correo_reiniciar" type="text" placeholder="Email">
        </div>
        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>ACEPTAR</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar al login</a></p>
        </div>
      </form>
    </div>
  </section>

  <script>
    const base_url = "<?= base_url(); ?>"; // nos ayuda a usar la funcion base url donde nos devuelve la ruta raiz del proyecto y por lo tanto se puede usar en archivo js de login
  </script>
  <!-- Essential javascripts for application to work-->
  <script src="Assets/js/jquery-3.3.1.min.js"></script>
  <script src="Assets/js/popper.min.js"></script>
  <script src="Assets/js/bootstrap.min.js"></script>
  <script src="Assets/js/main.js"></script>

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

  
  <!-- Tu script functions_login.js -->
  <script src="Assets/js/functions_login.js"></script>

  <script>
    let password = document.getElementById("txtPasswordl");
    let viewPassword = document.getElementById('viewPassword');
    let click = false;

    viewPassword.addEventListener('click', (e) => {
      if (!click) {
        password.type = 'text'
        click = true
      } else if (click) {
        password.type = 'password'
        click = false
      }
    });

    $(document).ready(function() {
      // Mostrar/ocultar contraseña
      $('#viewPassword').click(function() {
        var passwordField = $('#txtPasswordl');
        var fieldType = passwordField.attr('type');
        if (fieldType === 'password') {
          passwordField.attr('type', 'text');
          $(this).html('<i class="fa fa-eye icon"></i>');
        } else {
          passwordField.attr('type', 'password');
          $(this).html('<i class="fa fa-eye-slash icon"></i>');
        }
      });

      // Función para validar la longitud y los caracteres del correo electrónico
      function validateEmail(input) {
        var value = input.value;
        if (value.length > 50) {
          Swal.fire({
            icon: 'warning',
            title: 'Límite excedido',
            text: 'Se ha excedido el límite de 50 caracteres en el campo de correo electrónico',
          });
          input.value = value.slice(0, 50);
        }
        var validChars = /^[a-zA-Z0-9@._!$%*?&]+$/;
        if (!validChars.test(value)) {
          Swal.fire({
            icon: 'error',
            title: 'Caracteres no permitidos',
            text: 'El correo electrónico contiene caracteres no permitidos',
          });
          input.value = value.slice(0, -1);
        }
      }

      // Validación de la longitud de la contraseña
      function validatePasswordLength(input) {
        var value = input.value;
        if (value.length > 50) {
          input.value = value.slice(0, 50);
        }
      }
    });
  </script>
</body>
</html>

