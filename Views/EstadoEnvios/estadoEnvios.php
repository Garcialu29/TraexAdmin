<?php
headerAdmin($data);
getModal('modalEstadoEnvios', $data); ?>
?>
<main class="app-content">
    <div class="app-title">
        <div>

            <h1><i class="fas fa-clipboard-check"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['Permiso_Insert'] ){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" >Nuevo</button>
                <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/estadoEnvios"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
            <?php if($_SESSION['permisosMod']['Permiso_Get'] ||  $_SESSION['userData']['id_usuario'] == 1){ ?>
                  <button class="btn btn-danger" type="button"  onclick="fntPDF()"  ><a style="color:white;"> PDF</a></button>
                  <?php } ?> 

                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableEstadoEnvios">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
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