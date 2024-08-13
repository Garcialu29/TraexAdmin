 <?php headerAdmin($data); 
getModal('modalClientes', $data);
?>
<main class="app-content">
    <div class="app-title">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <div>
        <h1><i class="fas fa-archive"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['Permiso_Insert']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();">Nuevo</button>
          <?php } ?>
        </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/clientes"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <button class="btn btn-danger mb-2" type="button" onclick="fntPDF()"><a style="color:white;">PDF</a></button>
                        <table class="table table-hover table-bordered" id="tableClientes">
                            <thead>
                                <tr>
                                    <th>Id Cliente</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th> 
                                    <th>Numero ID</th>
                                    <th>Numero_Casillero</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php footerAdmin($data); ?>
 