<!-- Modal -->
<div class="modal fade" id="modalFormPaquete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva Paquete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form id="formPaquete" action="<?= base_url(); ?>/Paquetes/agregar" method="POST" name="formPaquete" class="form-horizontal">
                    <input type="hidden" id="Cod_Envio_Paquetes" name="Cod_Envio_Paquetes" value="">
                    <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="Id_Casillero">Casillero del Cliente <span class="required">*</span></label>
                                <select class="form-control" id="Id_Casillero" name="Id_Casillero" onchange="getClienteDireccion(this.value)">
                                    <?php
                                    foreach ($data['casilleros'] as $row) { ?>
                                        <option value="<?= $row['Id_Casillero'] ?>"><?= $row['nombre'] ?> <?= $row['apellido'] ?> - <?= $row['Numero_Casillero'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tipo_pago">Tipo de pago<span class="required">*</span></label>
                                <select class="form-control" id="id_tipo_pago" name="id_tipo_pago">
                                    <?php
                                    foreach ($data['id_tipo_pago'] as $row) { ?>
                                        <option value="<?= $row['id_tipo_pago'] ?>"><?= $row['Descripcion_pago'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Dirección de envió</label>
                                <textarea class="form-control" id="Direccion_Envio" name="Direccion_Envio" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Compra total</label>
                                <input class="form-control" id="compra" name="compra" type="number" placeholder="Cuando se gastó en la compra asistida" pattern="\d*" oninput="validarCpmpra(this)" required title="Por favor, ingrese solo números">
                            </div>
                            <div class="form-group">
                                <label for="id_Tipo_Seguro">¿Quiere agregar algún seguro? <span class="required"></span></label>
                                <select class="form-control" id="id_Tipo_Seguro" name="id_Tipo_Seguro">
                                    <?php
                                    foreach ($data['tipo_seguros'] as $row) { ?>
                                        <option value="<?= $row['Id_Tipos_Seguros'] ?>"><?= $row['Descripción'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Cod_Tipo_Envio">Tipo Envío <span class="required">*</span></label>
                                <select class="form-control" id="Cod_Tipo_Envio" name="Cod_Tipo_Envio" required="">
                                    <?php
                                    foreach ($data['Cod_Tipo_Envio'] as $row) { ?>
                                        <option value="<?= $row['Cod_Tipo_Envio'] ?>"><?= $row['Descripcion'] ?> - $<?= $row['monto'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Peso Real lb<span class="required">*</span></label>
                                    <input class="form-control" id="Peso_paquete" name="Peso_paquete" type="number" step="0.01" pattern="[1-9]\d*" placeholder="Peso Real del paquete" oninput="validarPesos(this)" required title="Por favor, ingrese solo números">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Volumen <span class="required">*</span></label>
                                    <input class="form-control" id="Volumen_paquete" name="Volumen_paquete" type="number" step="0.01" pattern="[1-9]\d*"placeholder="Peso Volumenétrico del paquete" oninput="validarPesos(this)" required title="Por favor, ingrese solo números">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Numero_Traking">Traking <span class="required">*</span></label>
                                    <input class="form-control" id="Numero_Traking" name="Numero_Traking" type="text" onkeyup="mayus(this)" oninput="validarTracking(this)" onkeypress="return SoloLetrasYNumeros(event);" required>
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="form-group col-md-6">
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
                                  <div class="form-group col-md-6">
                                    <label for="Fecha_pedido">Fecha de realización de paquete </label>
                                    <input class="form-control" id="Fecha_pedido" name="Fecha_pedido" type="date" readonly value="<?= date('Y-m-d'); ?>">
                                </div> 
                                <div class="form-group col-md-6">
                                    <label for="Fecha_pedido">Fecha de Entrega </label>
                                    <input class="form-control" id="Fecha_Entrega" name="Fecha_Entrega" type="date" placeholder="Fecha de realización de paquete" required="">
                                </div> 
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
    </form>
</div>
</div>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


<script>
// Obtener la fecha actual en el formato AAAA-MM-DD
document.addEventListener("DOMContentLoaded", function() {
    const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        // Asignar la fecha al campo de fecha
        document.getElementById('Fecha_pedido').value = formattedDate;
    });

    // Para que se coloque la dirección del cliente segun el casillero
function getClienteDireccion(Id_Casillero) {
    if (Id_Casillero !== "") {
        var request = new XMLHttpRequest();
        var ajaxUrl = base_url + '/Paquetes/getClienteDireccion/' + Id_Casillero;
        request.open("GET", ajaxUrl, true);
        request.send();

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        document.getElementById('Direccion_Envio').value = objData.data.direccion; // Accediendo correctamente a la propiedad 'direccion'
                    } else {
                        console.log(objData.msg); // Puedes usar alert() o mostrar en un mensaje modal
                        document.getElementById('Direccion_Envio').value = "";
                    }
                } else {
                    console.log('Error en la solicitud');
                    document.getElementById('Direccion_Envio').value = "";
                }
            }
        };
    } else {
        document.getElementById('Direccion_Envio').value = "";
    }
}
function SoloLetrasYNumeros(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toString();
    var caracteresPermitidos = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789."; // Incluye números
    var especiales = [8, 13, 37, 39, 46]; // Códigos de teclas especiales (Backspace, Enter, Flechas, Supr)

    var tecla_especial = false;
    for (var i = 0; i < especiales.length; i++) {
      if (key === especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (caracteresPermitidos.indexOf(tecla) === -1 && !tecla_especial) {
      return false; // Impedir la entrada si no es letra, número, o tecla especial
    }
}



 function mayus(e) {
    e.value = e.value.toUpperCase();
  }

  function validarPesos(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 10.2);
    input.value = nombre;
  }

  function validarTracking(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 30);
    input.value = nombre;
  }

  function validarCpmpra(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 6);
    input.value = nombre;
  }

</script>
<!-- Modal -->