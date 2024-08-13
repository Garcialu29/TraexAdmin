<!-- Modal --> 
<div class="modal fade" id="modalFormEstadoEnvio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo  Envio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="tile">
            <div class="tile-body">
                <form id="formEstadoEnvio"  name="formEstadoEnvio" class="form-horizontal">
                    <input type="hidden" id="Id_Estado_Envio" name="Id_Estado_Envio" value="">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="control-label">Descripción del Envio *</label>
                                <input class="form-control" type="text" id="txtDescripcion" name="txtDescripcion" onkeyup="mayus(this)" onkeypress="return SoloLetras(event);" oninput="validarNombre(this)" require >
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
                </form>

            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="js/functions_estadoEnvios.js"></script>


<script>
  function SoloLetras(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toString();
    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ.";
    var especiales = [8, 13, 37, 39, 46]; // Códigos de teclas especiales (Backspace, Enter, Flechas, Supr)

    var tecla_especial = false;
    for (var i = 0; i < especiales.length; i++) {
      if (key === especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) === -1 && !tecla_especial) {
      return false; // Impedir la entrada si no es letra ni tecla especial
    }
  }

  function mayus(e) {
    e.value = e.value.toUpperCase();
  }

  function validarNombre(input) {
    var nombre = input.value;
    nombre = nombre.slice(0, 25);
    input.value = nombre;
  }
</script>