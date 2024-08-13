<?php headerAdmin($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 100%;
        }
        .btn-update, .btn-primary, .upload-btn {
            background-color: #ff5b5b;
            color: #fff;
        }
        .btn-update:hover, .btn-primary:hover, .upload-btn:hover {
            background-color: #ff3b3b;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="pagetitle">
            <h1>Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img class="avatar mb-3" src="assets/images/avatar.png" alt="Profile">
                        <p class="app-sidebar__user-name"><?= $_SESSION['userData']['Nombre']; ?></p>
                        <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['Nombre_Rol']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" id="profile-tab">Perfil</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="password-tab">Cambiar contraseña</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <form id="form-profile">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Nombre del Usuario</label>
                                        <input class="form-control" id="inputUsername" name="txtNombreM" type="text" value="<?= $_SESSION['userData']['Nombre'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputDireccion">Dirección del Usuario</label>
                                        <input class="form-control" id="inputDireccion" name="txtDireccionM" type="text" value="<?= $_SESSION['userData']['Direccion'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputTelefono">Teléfono del Usuario</label>
                                        <input class="form-control" id="inputTelefono" name="txtTelefonoM" type="text" value="<?= $_SESSION['userData']['Telefono'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputCorreo">Correo Electrónico del Usuario</label>
                                        <input class="form-control" id="inputCorreo" name="txtEmailM" type="text" value="<?= $_SESSION['userData']['Correo_Electronico'] ?>">
                                    </div>
                                    
                                    <button type="button" class="btn btn-update mt-3" onclick="updateProfile()">Actualizar Información</button>
                                </form>
                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form id="form-password">
                                    <div class="mb-3">
                                        <label class="small mb-1" for="newPassword">Nueva contraseña</label>
                                        <input class="form-control" id="newPassword" type="password" name="newPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="repeatPassword">Repetir nueva contraseña</label>
                                        <input class="form-control" id="repeatPassword" type="password" name="repeatPassword">
                                    </div>
                                    
                                    <button type="button" class="btn btn-primary" onclick="changePassword()">Cambiar contraseña</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= media(); ?>/js/functions_perfiles.js"></script>
</body>
</html>
<?php footerAdmin($data); ?>
