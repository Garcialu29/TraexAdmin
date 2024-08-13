<?php headerAdmin($data);?>
<main class="app-content">
   <div class="app-title">
      <div>
         <h1><i class="fa fa-map-marker"></i> <?= $data['page_title'] ?></h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
         <li class="breadcrumb-item"><a href="<?= base_url(); ?>/paquetes"> Paquetes</a></li>
      </ul>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <?php
            if (empty($data['arrPaquete'])) {
            ?>
               <p>Datos no encontrados</p>
            <?php } else {
               $cliente = $data['arrPaquete']['cliente'];
               $orden = $data['arrPaquete']['orden'];
               $estado = $data['arrPaquete']['estado']
            ?>
               <section id="sPaquete" class="invoice">
                  <div class="row mb-0">
                     <div class="col-6">
                        <h2 class="page-header"><img class="logo_login" style="max-width: 300px;" src="<?= base_url(); ?>/Assets/images/avatar.png"></h2>
                     </div>
                     <div class="col-6">
                        <h5 class="text-right">Reporte de envío <br>
                           <?php
                           // Supongamos que $codigoPaquete es el código de paquete que obtienes de tu base de datos
                           $codigoPaquete = $orden['Cod_Envio_Paquetes'];
                           // Generar un número de reporte único usando md5
                           $numeroReporte = md5($codigoPaquete);

                           $numeroReporteCorto = substr($numeroReporte, 0, 8);
                           // Luego puedes usar $numeroReporte en tu aplicación
                           echo   $numeroReporteCorto;
                           ?>
                        </h5>
                        <h5 class="text-right">Fecha: <?= $orden['Fecha_pedido'] ?> </h5>
                     </div>
                  </div>
                  <div class="row invoice-info">
                     <div class="col-4">
                        <address><strong>Transpor Express</strong><br>
                           <?= DIRECCION ?><br>
                           <?= TELEMPRESA ?><br>
                           <?= EMAIL_EMPRESA ?><br>
                           <?= WEB_EMPRESA ?>
                        </address>
                     </div>
                     <div class="col-4">
                        <b>Orden #<?= $orden['Cod_Envio_Paquetes'] ?></b><br>
                        <b>Estado:</b> <?= $estado['Descripcion'] ?> <br>
                     </div>
                     <div class="col-4">
                        <address><strong>Nombre: <?= $cliente['nombre'] . '&nbsp;' . $cliente['apellido'] ?></strong><br>
                           Envío: <?= $orden['Direccion_Envio'] ?><br>
                           Tel: <?= $cliente['telefono'] ?><br>
                           Email: <?= $cliente['correo_cliente'] ?>
                        </address>
                     </div>
                  </div>
                  <div class="center">
                     <div class="row">
                        <div class="col-12 table-responsive">
                           <table class="table table-striped">
                              <thead>
                                 <tr>

                                    <th>Descripción</th>
                                    <th class="text-right">Traking</th>
                                    <th class="text-right">Volumen</th>
                                    <th class="text-right">Peso</th>
                                    <th class="text-right">Tipo envío</th>
                                    <th class="text-right">Compra</th>
                                    <th class="text-right">Estado</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                              <tbody>
                  <?php
                     $subtotal = 0;
                     $Envio = 0;
               if (count($orden) > 0) {
                  foreach ($orden as $producto) {
                     // Calcula el costo de envío basado en el mayor entre Peso_paquete y Volumen_paquete
                     if ($orden['Peso_paquete'] > $orden['Volumen_paquete']) {
                           $Envio = $orden['Peso_paquete'] * $orden['MontoEnvio'];
                     } else {
                           $Envio = $orden['Volumen_paquete'] * $orden['MontoEnvio'];
                     }
                     // Calcula el subtotal sumando el costo de envío y el monto de la compra
                     $subtotal = $Envio + $orden['compra'];
                  }
               ?>
               <tr>
                  <td><?= $orden['TipoPago'] ?></td>
                  <td class="text-right"><?= $orden['Numero_Traking'] ?></td>
                  <td class="text-right"><?= $orden['Volumen_paquete'] ?></td>
                  <td class="text-right"><?= $orden['Peso_paquete'] ?></td>
                  <td class="text-right"><?= $orden['TipoEnvio'] ?> <?= $orden['MontoEnvio'] ?></td>
                  <td class="text-right"><?= $orden['compra'] ?></td>
                  <td class="text-right"><?= $estado['Descripcion'] ?></td>
                  <td></td>
               </tr>
               <?php } ?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th colspan="3" class="text-right">Sub-Total:</th>
                                    <?php
                                    function formatMoney($amount)
                                    {
                                       return '' . number_format($amount, 2);
                                    }
                                    ?>
                                    <td class="text-right"><?= SMONEY . ' ' . formatMoney($subtotal) ?></td>
                                 </tr>
                                 <tr>
                                    <th colspan="3" class="text-right">Seguro:</th>
                                    <td class="text-right"><?= SMONEY . ' ' . formatMoney($Envio = $orden['PrecioSeguro']) ?></td>
                                 </tr>
                                 <tr>
                                    <th colspan="3" class="text-right">Total:</th>
                                    <td class="text-right"><?= SMONEY . ' ' . formatMoney($subtotal + $Envio) ?></td>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                     <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print('#sPaquete');"> Imprimir</a></div>
                     </div>
               </section>
            <?php } ?>
         </div>
      </div>
   </div>
   </div>
</main>
<?php footerAdmin($data); ?>