<?php 
headerAdmin($data); 
getModal('modalPaquetes', $data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1><i class="fas fa-archive"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['Permiso_Insert']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();">Nuevo</button>
        <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/paquetes"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
          <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
              <div class="row"> 
                <div class="col-sm-12">
                  <table class="table table-hover table-bordered dataTable no-footer" role="grid" aria-describedby="sampleTable_info" id="tablePaquetes">
                  <?php if($_SESSION['permisosMod']['Permiso_Get'] ||  $_SESSION['userData']['id_usuario'] == 1){ ?>
                  <button class="btn btn-danger" type="button"  onclick="fntPDF()"  ><a style="color:white;"> PDF</a></button>
                  <?php } ?> 
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Cliente</th>
                  <th>Casillero</th>
                  <th>Peso lb</th>
                  <th>Volumen</th>
                  <th>Traking</th>
                  <th>Envio</th>
                  <th>Estado</th>
                  <th>Dirección</th>
                  <th>Entrega</th>
                  <th>Pedido Realizado</th>
                  <th>Acciones</th>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="updateStateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Estado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="updateStateForm">
                          <div class="form-group">
                                    <label for="Id_Estado_Envio">Estado <span class="required">*</span></label>
                                    <select class="form-control" id="Id_Estado_Envio" name="Id_Estado_Envio" required="">
                                    <?php
                                    foreach ($data['estado_envios'] as $row) { ?>
                                        <option value="<?= $row['Id_Estado_Envio'] ?>"><?= $row['Descripcion'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="submitStateChange()">Actualizar</button>
                      </div>
                    </div>
                  </div>
                </div>
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
